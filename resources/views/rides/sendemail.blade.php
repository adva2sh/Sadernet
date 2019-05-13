@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Send email to the driver</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/sendemail">
                        {{ csrf_field() }}

    
                        <div class="form-group">
                            <label for="to" class="col-md-4 control-label">To</label>
                            <div class="col-md-6">
                                <input readonly="true" value="{{$email}}" id="to" type="text" name="to" class="form-control"  autocomplete="off"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-md-4 control-label">Subject</label>
                            <div class="col-md-6">
                                <input id="subject" type="text" name="subject" class="form-control"  autocomplete="off"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="col-md-4 control-label">Body</label>
                            <div class="col-md-6">
                                <textarea id="body" type="text" name="body" class="form-control"  autocomplete="off"  required>
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
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