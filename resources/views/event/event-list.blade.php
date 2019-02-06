@extends('html')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming Events</h1>
            @foreach($upComingEvents as $upComingEvent)
           <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">
                        <a href="{{ route('event-view', $upComingEvent->slug) }}">
                            {{ $upComingEvent->title }}
                        </a>
                    </h3>
                    <small class="padding-left-10">{{ $upComingEvent->address }}</small>
                </div>
                <div class="panel-body">
                    <div class="meta-data margin-bottom-20">
                        <strong>Start date:</strong> {{ $upComingEvent->start_date }}
                        <br>
                        <strong>End date:</strong> {{ $upComingEvent->end_date }}
                        <br>
                        <strong>Created by:</strong> {{ $upComingEvent->creator->name }}
                    </div>
                    <div class="description">
                    {!! limit_words($upComingEvent->description, 50) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Past Events</h1>

            @if(count($pastEvents) == 0 )
                <h1>No past event</h1>
            @else
                @foreach($pastEvents as $pastEvent)
            <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-heading">
                        <a href="{{ route('event-view', $pastEvent->slug) }}">
                            {{ $pastEvent->title }}
                        </a>
                    </h3>
                    <small class="padding-left-10">{{ $upComingEvent->address }}</small>
                </div>
                    <div class="panel-body">
                        <div class="meta-data margin-bottom-20">
                            <strong>Start date:</strong> {{ $pastEvent->start_date }}
                            <br>
                            <strong>End date:</strong> {{ $pastEvent->end_date }}
                            <br>
                            <strong>Created by</strong> {{ $pastEvent->creator->name }}
                        </div>
                        <div class="description">
                        {!! limit_words($pastEvent->description, 50) !!}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
 
       
@endsection