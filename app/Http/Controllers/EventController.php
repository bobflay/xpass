<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with(['organizer','bookings.user'])->get();

        return view('events', compact('events'));

    }


    public function show($id)
    {
        $event = Event::with(['organizer','bookings.user'])->findOrFail($id);

        return view('event_detail', compact('event'));
    }
}
