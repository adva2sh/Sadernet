@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">עדכון פרטים אישיים</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/doupdate">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div><label for="name" class="col-md-4 control-label">שם מלא</label>

                        </div>

                        <div class="form-group{{ $errors->has('gmail') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="gmail" type="email" class="form-control" name="gmail" value="{{ $user->gmail }}" required autofocus>

                                @if ($errors->has('gmail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gmail') }}</strong>
                                    </span>
                                @endif
                            </div><label for="gmail" class="col-md-4 control-label">Gmail</label>

                        </div>

                        
                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control" name="facebook" value="{{ $user->facebook }}" autofocus>

                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div><label for="facebook" class="col-md-4 control-label">משתמש Facebook (אופציונאלי)</label>

                        </div>
                        
                        <div class="form-group{{ $errors->has('numfin') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="numfin" class="form-control"  type="text" value="{{ $user->numfin }}" name="numfin" readonly required>

                                @if ($errors->has('numfin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numfin') }}</strong>
                                    </span>
                                @endif
                            </div> <label for="numfin" class="col-md-4 control-label">מס' תקציב קיבוץ</label>

                        </div>

                        <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="license" type="license" class="form-control" name="license" value="{{ $user->license }}" required>

                                @if ($errors->has('license'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('license') }}</strong>
                                    </span>
                                @endif
                            </div> <label for="license" class="col-md-4 control-label">מס' רשיון</label>

                        </div>
                        <div class="form-group{{ $errors->has('enternum') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="enternum" type="enternum" class="form-control" name="enternum" value="{{ $user->enternum }}" readonly>

                                @if ($errors->has('enternum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enternum') }}</strong>
                                    </span>
                                @endif
                            </div> <label for="enternum" class="col-md-4 control-label">מס' זיהוי לכניסה למערכת</label>

                        </div>
 
                        <div class="form-group{{ $errors->has('idnum') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="idnum" type="text" class="form-control" name="idnum" value="{{ $user->idnum }}" required readonly>

                                @if ($errors->has('idnum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idnum') }}</strong>
                                    </span>
                                @endif
                            </div><label for="idnum" class="col-md-4 control-label">ת"ז</label>

                        </div>

                        <div class="form-group" class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" value="{{ $user->phone }}" name="phone" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div><label for="phone" class="col-md-4 control-label">מס' טלפון</label>

                        </div>

                        <div class="form-group" class="form-group">
                            
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control" name="img" value="{{ $user->img }}" >
                            </div><label for="img" class="col-md-4 control-label">תמונה (השאר ריק אם ברצונך להשאיר את התמונה הנוכחית)</label>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    עדכן
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
