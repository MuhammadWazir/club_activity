<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
        ]);
        // Create the user...
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender'=>$request->gender,
            'date_of_birth'=>$request->date_of_birth,
            'joining_date'=>$request->joining_date,
            'mobile_number'=>$request->mobile_number,
            'emergency_number'=>$request->emergency_number,
            'photo'=>$request->photo,
            'profession'=>$request->profession,
            'nationality'->$request->nationality,
            'is_admin'=>$request->is_admin
        ]);
        auth()->login($user);
        return to_route('public/event/list');
    }
}
