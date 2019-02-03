@extends('html')

@section('content')

    <div class="row">
        <div class="col-sm-8 col-sm-push-2">
            <h1>Upcoming Events</h1>
            @foreach($upComingEvents as $upComingEvent)
           <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-heading">{{ $upComingEvent->title }}</h3>
                    <small>{{ $upComingEvent->address }}</small>
                </div>
                <div class="panel-body">
                    {{ $upComingEvent->description }}
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection