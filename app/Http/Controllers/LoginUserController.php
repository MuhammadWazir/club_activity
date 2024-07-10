<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guide;
use Illuminate\Support\Facades\Hash;
class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginGuide()
    {
        return view('auth.loginGuide');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8, string'
        ]);

        // Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('public.home'));
        } else {
            // if unsuccessful, then redirect back to the login with the form data
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    public function storeGuide(Request $request)
{
    // Validate the form data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

    // Find the guide by email
    $guide = Guide::where('email', $request->email)->first();

    // Check if the guide exists and the password matches
    if ($guide && Hash::check($request->password, $guide->password)) {
        // Log the guide in (you might want to set a session or something similar)
        // For example:
        session(['guide_id' => $guide->id]);
        
        // Redirect to the intended location
        return redirect()->intended(route('guide.events.all', ['guide'=>$guide]));
    } else {
        // If unsuccessful, then redirect back to the login with the form data and an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }
}
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('welcome');
    }
}
