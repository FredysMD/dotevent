<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255',
            'instructors' => 'required|max:255',
            'cost' => 'required',
            'limit' => 'required|integer',
        ]);
        
        $validatedData['state'] = true;

        Event::create($validatedData);
    
        return redirect()
            ->route('home')
            ->with('success', 'El evento ha sido creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $event = Event::findOrFail($id);
        $userRegistered = $event->users()->where('user_id', $user->id)->exists();
        return view('events.show', compact('event', 'userRegistered'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */

    public function join(Request $request)
    {
        $user = auth()->user();
        $eventId = $request->input('event_id');
        
        if (!$eventId) {
            return back()->with('error', 'El ID del evento es nulo');
        }
    
        $event = Event::find($eventId);
        $userRegistered = $event->users()->where('user_id', $user->id)->exists();
    
        if ($userRegistered) {
            return back()->with('error', 'Ya te has unido a este evento');
        }
    
        $event->users()->attach($user->id);
    
        return back()->with('success', 'Te has unido al evento!');
    }

    public function unJoin(Event $event)
    {
        $user = auth()->user();
        $userRegistered = $event->users()->where('user_id', $user->id)->exists();

        $event->users()->detach($user->id);

        return back()->with('success', 'Te has desunido del evento!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required|numeric',
            'location' => 'required',
            'instructor' => 'required',
            'cost' => 'required|numeric',
            'limit' => 'required|numeric'
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'event actualizada exitosamente.');
    }

}
