<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $errorMessages = [
            "name.required" => "Name is required",
            "name.min" => "Name is too short",
            "name.max" => "Name is too long",
            "email.required" => "Email is required",
            "email.email" => "Email must be a valid email",
            "password.required" => "Password is required",
            "password.min" => "Password is too short",
            "password.max" => "Password is too long",
        ];

        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
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
            return redirect()->back()->withInput($request->only("email"))->withErrors(['approve' => 'Wrong email or password']);
        }
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
