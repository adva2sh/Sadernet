@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">רשום חבר חדש</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/doregister">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            </div><label for="name" class="col-md-4 control-label">שם מלא</label>

                        </div>

                        <div class="form-group{{ $errors->has('gmail') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="gmail" type="email" class="form-control" name="gmail" value="{{ old('gmail') }}" required autofocus>

                            </div><label for="gmail" class="col-md-4 control-label">אימייל Gmail</label>

                        </div>

                        
                        <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="facebook" type="text" class="form-control" name="facebook" value="{{ old('facebook') }}" autofocus>

                            </div><label for="facebook" class="col-md-4 control-label">אי-מייל Facebook (אופציונאלי)</label>

                        </div>
                        
                        <div class="form-group{{ $errors->has('numfin') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="numfin" autocomplete="off" class="form-control"  type="text" name="numfin" required>

                            </div> <label for="numfin" class="col-md-4 control-label">מס' תקציב קיבוץ</label>

                        </div>

                        <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="license" type="license" class="form-control" name="license" value="{{ old('license') }}" required>

                            </div> <label for="license" class="col-md-4 control-label">מס' רשיון</label>

                        </div>
                        <div class="form-group{{ $errors->has('enternum') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="enternum" type="enternum" class="form-control" name="enternum" value="{{ old('enternum') }}" required>
                            </div> <label for="enternum" class="col-md-4 control-label">מס' זיהוי לכניסה למערכת</label>

                        </div>

                        <div class="form-group{{ $errors->has('idnum') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="idnum" type="text" class="form-control" name="idnum" required>

                            </div><label for="idnum" class="col-md-4 control-label">ת"ז</label>

                        </div>

                        <div class="form-group" class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>

                            </div><label for="phone" class="col-md-4 control-label">מס' טלפון</label>

                        </div>

                        <div class="form-group" class="form-group">
                            
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control" name="img" required>
                            </div><label for="img" class="col-md-4 control-label">תמונה</label>

                        </div>

                        <div class="form-group" class="form-group{{ $errors->has('agreement') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6    ">
                                <textarea readonly>
                                </textarea>
                            </div>  
                           
                            <label for="agreement" class="col-md-4 control-label">תנאי סידור הרכב</label>


                        </div>

                        <div class="form-group" class="form-group{{ $errors->has('agreement') ? ' has-error' : '' }}">
                           
                            
                            <div class="col-md-6">
                                סמן כדי להסכים לתנאים <input  id="agreement" type="checkbox" name="agreement" required>  
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    בצע רישום
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
