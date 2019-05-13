@extends('layouts.app')

@section('content')

@if(isset($car_number))
    <div class="form-group">    
        <div class="col-md-6 col-md-offset-5">
            <button onclick="window.location = '/problem/{{$car_number}}'" style="width: 100px;"  class="btn btn-danger">דווח על תקלה</button >
        </div> 
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">לקיחת / החזרת רכב</div>
                    <div class="panel-body">
                        <div class="form-group">  
                            <div class="col-md-6 col-md-offset-5">
                                <button onclick="window.location = '/take'" style="width: 100px;"  class="btn btn-primary">לקח רכב</button >
                            </div> 
                        </div>
                        <div class="form-group">       
                            <div class="col-md-6 col-md-offset-5" style="height: 50px;">
                            </div>    
                        </div>
                        <div class="form-group">                   
                            <div class="col-md-6 col-md-offset-5">
                                <button onclick="window.location = '/return'" style="width: 100px;" class="btn btn-primary">החזר רכב</button >
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
