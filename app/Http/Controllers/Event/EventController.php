<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Modules\Event\Event;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');

        $upComingEvents = Event::where('start_date', '>', '$today')
            ->orderBy('start_date', 'desc')
            ->get();

        $pastEvents = Event::where('start_date', '<', $today)
            ->orderBy('start_date', 'desc')
            ->limit(3)
            ->get();

        return view('event.event-list')
            ->with('upComingEvents', $upComingEvents)
            ->with('pastEvents', $pastEvents);
    }

    public function view(Event $event)
    {
        return view('event.event-view')->with('event', $event);
    }

    public function add()
    {
        return view('event.event-add'); 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',           
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'user_id' => $request->user()->id,            
        ]);

        return redirect()->route('events');
    }
}
