<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use App\Models\Event;
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
        return view("admin.view_guides");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.add_guide");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'date_of_birth'=>$request->date_of_birth,
            'joining_date'=>$request->joining_date,
            'photo'=>$request->photo,
            'profession'=>$request->profession,
            'status'=>$request->status
        ]);
        return view("admin.view_guides");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return view("admin.view_guides");
    }
    public function guideEvents(Guide $guide){
        $events= $guide->events;
        return view('guide.events', ['events'=>$events, 'guide'=>$guide]);
    }
    public function allEvents(Guide $guide){
        $events= Event::all();
        return view('guide.events', ['events'=>$events, 'guide'=>$guide]);
    }
}
