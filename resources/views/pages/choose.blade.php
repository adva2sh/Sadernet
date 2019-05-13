@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Your flight time is: <b>{{ $flighttime }}</b></h1>
        <h2>Pick the right option for you</h2>
        <div class="col-lg-4 col-lg-offset-4">
            <p>
                <a class="btn btn-primary btn-lg btn-block" href="/rides">
                    Join as a <b>Passenger</b>
                </a>                    
                <a class="btn btn-default btn-lg btn-block" href="/rides/create">
                    Suggest yourself as a <b>Driver</b>
                </a>
            </p>
        </div>
    </div>
@endsection