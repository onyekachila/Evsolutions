<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Modules\Event\Event;

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
}
