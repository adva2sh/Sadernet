@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">עריכת הזמנה</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
            
                    <form class="form-horizontal" role="form" method="POST" action="/doedit">
                        {{ csrf_field() }}
                        <input id="order_id" type="text" name="order_id" value="{{ $order->id }}" hidden>

                        <div class="form-group" style="direction:RTL; text-align: right">
                    
                    <h5>פורמט זמן : dd/mm/YYYY HH:ii (לדוגמה 13/02/2019 19:35)</h5>
                </div>
                        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="start_time" type="text" class="form-control" name="start_time" value="{{ $order->start_time }}" required autofocus>

                                @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif

                            </div><label for="start_time" class="col-md-4 control-label">זמן התחלה</label>
                            

                        </div>

                        <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="end_time" type="text" class="form-control" name="end_time" value="{{ $order->end_time }}" required autofocus>

                                @if ($errors->has('end_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_time') }}</strong>
                                    </span>
                                @endif
                            </div><label for="end_time" class="col-md-4 control-label">זמן סיום</label>

                        </div>

                        
                        <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="destination" type="text" class="form-control" name="destination" value="{{ $order->destination }}" autofocus>
                                
                                @if ($errors->has('destination'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('destination') }}</strong>
                                    </span>
                                @endif
                            </div><label for="destination" class="col-md-4 control-label">יעד</label>

                        </div>
                        
                        <div class="form-group{{ $errors->has('tremp') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input  id="tremp" type="checkbox" name="tremp" {{$order->tremp ? "checked":""}}>
                                
                                @if ($errors->has('tremp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tremp') }}</strong>
                                    </span>
                                @endif
                            </div> <label for="tremp" class="col-md-4 control-label">להציג כטרמפ?</label>

                        </div>
                        <div class="form-group{{ $errors->has('userspay') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="userspay" type="userspay" class="form-control" name="userspay" value="{{ $order->userspay }}" required>

                                @if ($errors->has('userspay'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userspay') }}</strong>
                                    </span>
                                @endif
                            </div> <label for="userspay" class="col-md-4 control-label">חיוב משתמשים נוספים (הפרד מספרי ת"ז בפסיקים)</label>

                        </div>

                        <div class="form-group{{ $errors->has('autopay') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input  id="autopay" type="checkbox" name="autopay" {{$order->autopay ? "checked":""}}>
                                @if ($errors->has('autopay'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('autopay') }}</strong>
                                    </span>
                                @endif
                            </div><label for="autopay" class="col-md-4 control-label">לחייב אוטומטית?</label>

                        </div>

                                
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                    שמור שינויים
                                </button>
                    </form>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <form class="form-horizontal" role="form" method="POST" action="/deleteorder/{{$order->id}}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger" style="width: 100px;">
                                        מחק הזמנה
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection