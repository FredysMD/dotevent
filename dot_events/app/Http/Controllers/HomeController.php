<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $events = Event::where('state', true)->orderBy('created_at', 'desc')->get();

        return view('home', compact('events'));
    }
}
