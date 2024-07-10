<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $events= Event::all();
        return view('public.event_list', ['events' => $events]);
    }
    public function adminEvents()
    {   $events= Event::all();
        return view('admin.event_list', ['events' => $events]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_event');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'cost' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $event = Event::create($validated);

        return redirect()->route('admin.events')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {   $user = Auth::user();
        $joined = $event->users()->where('user_id', $user->id)->exists();
        return view('public.event_details', ['event' => $event, 'joined'=>$joined]);
    }
    public function showAdmin(Event $event)
    {
        return view('admin.event', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    { 
        return view('admin.edit_event', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'cost' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully');
    }
    public function join(Event $event)
    {
        $user = Auth::user();

        // Attach the user to the event
        $event->users()->attach($user);

        return redirect()->route('public.home', $event)->with('success', 'You have successfully joined the event');
    }
    public function leave(Event $event)
    {
        $user = Auth::user();

        // Attach the user to the event
        $event->users()->detach($user);

        return redirect()->route('public.home', $event)->with('success', 'You have successfully left the event');
    }
}
?>
