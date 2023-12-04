<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\File;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $errorMessages = [
            "first_name.required" => "First name is required",
            "first_name.min" => "First name is too short",
            "first_name.max" => "First name is too long",
            "last_name.required" => "Last name is required",
            "last_name.min" => "Last name is too short",
            "last_name.max" => "Last name is too long",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email",
            "phone.required" => "Phone is required",
            "password.required" => "Password is required",
            "password.min" => "Password is too short",
            "password.max" => "Password is too long",
        ];

        $incomingFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'phone' => ['required', 'min:6', 'max:64'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:64'],
        ], $errorMessages);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $errorMessages = [
            "loginemail.required" => "Email is required",
            "loginpassword.required" => "Password is required"
        ];

        $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ], $errorMessages);

        if (auth()->attempt([
            'email' => $incomingFields['loginemail'],
            'password' => $incomingFields['loginpassword']
        ])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect()->back()->withInput($request->only("loginemail"))->withErrors(['approve' => 'Wrong email or password']);
        }
    }

    public function updateUser(Request $request)
    {
        $errorMessages = [
            "first_name.required" => "First name is required",
            "last_name.required" => "Last name is required",
            "first_name.min" => "First name is too short",
            "last_name.min" => "Last name is too short",
            "first_name.max" => "First name is too long",
            "last_name.max" => "Last name is too long",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email",
        ];

        $user = User::find(Auth::id());
        $incomingFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:25'],
            'last_name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => 'required',
            'profile_img_path' => 'image'
        ], $errorMessages);

        if ($request->profile_img_path != null) {

            $image = $request->file('profile_img_path')->store('public');
            $imgPath = Storage::url($image);
            $incomingFields['profile_img_path'] = $imgPath;
        }


        $user->update($incomingFields);
        return redirect()->back()->withInput();
    }

    public function createExperience(Request $request)
    {
        $incomingFields = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'institution' => 'required',
            'description' => 'required',
            'start_date' => ["required", "date"],
            'end_date' => ['nullable', 'date'],
        ]);

        $incomingFields["type"] = strip_tags($incomingFields["type"]);
        $incomingFields["title"] = strip_tags($incomingFields["title"]);
        $incomingFields["institution"] = strip_tags($incomingFields["institution"]);
        $incomingFields["description"] = strip_tags($incomingFields["description"]);
        $incomingFields["start_date"] = strip_tags($incomingFields["start_date"]);
        // $incomingFields["end_date"] = strip_tags($incomingFields["end_date"]);
        $incomingFields["user_id"] = auth()->id();

        Experience::create($incomingFields);

        return redirect('/profile');
    }
}
