<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('is_admin', false)->get();
        return view('admin.members', ['members' => $members]);
    }
    public function indexAdmin()
    {
        $admins = User::where('is_admin', true)->get();
        return view('admin.view_admins', ['admins' => $admins]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("admin.view_joined_events", ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   $user = Auth::user();
        return view("public.edit_profile", ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {   $user = Auth::user();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => ['nullable', 'string', 'min:8', 'confirmed', Password::defaults()],
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'joining_date' => 'nullable|date',
            'mobile_number' => 'nullable|string|max:20',
            'emergency_number' => 'nullable|string|max:20',
            'photo' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'nationality' => 'nullable|string|max:255',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return to_route('public.home');
    }

    /**
     * Show the registration form.
     */
    public function register()
    {
        return view('auth.register');
    }
    public function registerAdmin()
    {
        return view('admin.add_admin');
    }
    /**
     * Store a newly created user in storage.
     */
    public function storeAdmin(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', Password::defaults()],
        ]);

        // Create the user...
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'joining_date' => $request->joining_date,
            'mobile_number' => $request->mobile_number,
            'emergency_number' => $request->emergency_number,
            'photo' => $request->photo,
            'profession' => $request->profession,
            'nationality' => $request->nationality,
            'is_admin' => true,
        ]);
        // Redirect to a specific route or page after registration
        return to_route("admin.admins");
    }
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8', Password::defaults()],
        ]);

        // Create the user...
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'joining_date' => $request->joining_date,
            'mobile_number' => $request->mobile_number,
            'emergency_number' => $request->emergency_number,
            'photo' => $request->photo,
            'profession' => $request->profession,
            'nationality' => $request->nationality,
            'is_admin' => false,
        ]);

        // Log in the user after registration
        auth()->login($user);

        // Redirect to a specific route or page after registration
        return to_route("public.home");
    }
    public function adminMembers(){
        $nonAdminUsers = User::where('is_admin', 0)->get();
        return view('admin.members', ['members'=>$nonAdminUsers]);
    }
    public function memberEvents(User $member){
        $events = $member->events;
        return view('admin.view_joined_events', ['events'=>$events, 'member'=>$member]);
    }
    public function removeMemberFromEvent(Event $event, User $member){
        $event->users()->detach($member);
        $events = $member->events;
        return view('admin.view_joined_events', ['events'=>$events, 'member'=>$member]);
    }
    public function destroy(User $member)
    {
        // Check if the user exists
        if ($member) {
            // Delete the user
            $member->delete();
            
            // Redirect back with a success message
            return redirect()->route('admin.members')
                             ->with('success', 'User deleted successfully.');
        }

        // Redirect back with an error message if user not found
        return redirect()->route('admin.members')
                         ->with('error', 'User not found.');
    }
    public function destroyAdmin(User $admin)
    {
        // Check if the user exists
        if ($admin) {
            // Delete the user
            $admin->delete();
            
            // Redirect back with a success message
            return redirect()->route('admin.admins')
                             ->with('success', 'User deleted successfully.');
        }

        // Redirect back with an error message if user not found
        return redirect()->route('admin.admins')
                         ->with('error', 'User not found.');
    }
}
