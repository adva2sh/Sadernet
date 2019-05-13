@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add a ride</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('rides.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-md-6">
                                @if(Auth::check())
                                    Your distance from Natbag Airport: <b>{{ $distance_and_time }}</b>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('timeleave') ? ' has-error' : '' }}">
                            <label for="timeleave" class="col-md-4 control-label">Estimated leaving time</label>

                            <div class="col-md-6">
                                <input id="timeleave" type="text" name="timeleave" class="form-control" value="{{ old('timeleave') }}"  autocomplete="off" placeholder="dd/mm/YYYY HH:ii (e.g. 13/02/2019 19:35)" required>
                                @if ($errors->has('timeleave'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('timeleave') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Ride's start location</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('numseats') ? ' has-error' : '' }}">
                            <label for="numseats" class="col-md-4 control-label">Number of seats</label>

                            <div class="col-md-6">
                                <input id="numseats" type="text" class="form-control" name="numseats" value="{{ old('numseats') }}" required autofocus>

                                @if ($errors->has('numseats'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numseats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('numsuitcases') ? ' has-error' : '' }}">
                            <label for="numsuitcases" class="col-md-4 control-label">Number of suitcases</label>

                            <div class="col-md-6">
                                <input id="numsuitcases" type="text" class="form-control" name="numsuitcases" value="{{ old('numsuitcases') }}" required autofocus>

                                @if ($errors->has('numsuitcases'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numsuitcases') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                            <label for="comments" class="col-md-4 control-label">Comments</label>

                            <div class="col-md-6">
                                <textarea id="comments" type="text" class="form-control" name="comments" value="{{ old('comments') }}" autofocus>
                                </textarea>
                                @if ($errors->has('comments'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Suggest yourself
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection