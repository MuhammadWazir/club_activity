<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades;
class GuideController
{
    /**
     * Display a listing of the resource.
     */
    public function indexForPublic()
    {
        $guides= Guide::all();
        return view("public.view_guides", ['guides'=>$guides]);
    }

    public function indexForAdmin()
    {
        $guides= Guide::all();
        return view("admin.view_guides", ['guides'=>$guides]);
    }
    public function update(Request $request, Guide $guide)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users,email,' . $guide->id,
            'password' => ['nullable', 'string', 'min:8', 'confirmed', Password::defaults()],
            'date_of_birth' => 'nullable|date',
            'joining_date' => 'nullable|date',
            'photo' => 'nullable|string|max:255',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

        $guide->update($validated);

        return to_route('guide.events.all', ['guide'=>$guide]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.add_guide");
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:5'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'string', 'min:8',  Password::defaults()],
        ]);
        // Create the user...
        $guide = Guide::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth'=>$request->date_of_birth,
            'joining_date'=>$request->joining_date,
            'photo'=>$request->photo,
        ]);
        $guides = Guide::all();
        return view("admin.view_guides", ['guides'=>$guides]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        $guides = Guide::all();
        return view("admin.view_guides", ['guides'=>$guides]);
    }
    public function guideEvents(Guide $guide){
        $events= $guide->events;
        return view('guide.events', ['events'=>$events, 'guide'=>$guide]);
    }
    public function allEvents(Guide $guide){
        $events= Event::all();
        return view('guide.events', ['events'=>$events, 'guide'=>$guide]);
    }
    public function edit(Guide $guide){
        return view('guide.edit_profile', ['guide'=>$guide]);
    }
}
