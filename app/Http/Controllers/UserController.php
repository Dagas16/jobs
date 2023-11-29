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
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'max:64'],
        ]);

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
        $incomingFields = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt([
            'email' => $incomingFields['loginemail'],
            'password' => $incomingFields['loginpassword']
        ])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/login');
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
