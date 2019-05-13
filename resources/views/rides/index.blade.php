@extends('layouts.app')

@section('content')
    <h1>Rides</h1>
    @if(Session::has('flighttime'))
        <h2>Your flight time is: <b>{{ session('flighttime') }}</b></h2>
        <a href="/rides/noflighttime" class="btn btn-danger" onclick="event.preventDefault();
                                                document.getElementById('noft-form').submit();">Remove Flight Time</a>
                                <form id="noft-form" action="/rides/noflighttime" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
        <h3>Showing rides with leaving time of 3 to 10 hours before your flight time OR rides that your are the driver</h3>
    @endif
    @if(count($rides) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Leaving time</th>
                    <th scope="col">Address</th>
                    <th scope="col"># Avail. seats</th>
                    <th scope="col"># Avail. suitcases</th>
                    <th scope="col"># Comments</th>
                    @if (Auth::check())
                        <th scope="col"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
        @foreach($rides as $ride)
                <tr>
                    <th scope="row">{{$ride->id}}</th>
                    <td>{{$ride->timeleave}}</td>
                    <td>{{$ride->address}}</td>
                    <td>{{$ride->numavailableseats()}}</td>
                    <td>{{$ride->numavailablesuitcases()}}</td>
                    <td>{{$ride->comments}}</td>
                    @if (Auth::check())
                        <td>    
                            @if(Auth::user()->already_joined($ride->id))
                                <a href="/bookings/delete/{{$ride->id}}" onclick="event.preventDefault();
                                                document.getElementById('leave-form').submit();"  class="btn btn-danger">Leave</a>
                                    
                                <form id="leave-form" action="/bookings/delete/{{$ride->id}}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            @elseif($ride->numavailableseats() != 0 && $ride->user_id != Auth::user()->id)
                                <a href="/bookings/create/{{$ride->id}}" class="btn btn-success">Join</a>
                            @endif
                            @if($ride->user_id == Auth::user()->id)
                                <a href="/rides/delete/{{$ride->id}}" class="btn btn-danger" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();">Delete</a>
                                <form id="delete-form" action="/rides/delete/{{$ride->id}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            @else
                                <a href="/sendemail/{{$ride->id}}" class="btn btn-success">Send email</a>
                            @endif
                        </td>
                    @endif
                </tr>
        @endforeach
            </tbody>
        </table>
    @else
        <p>No rides</p>
    @endif
@endsection