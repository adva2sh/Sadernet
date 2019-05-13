@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-6 col-md-offset-3"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">התחברות</div>
                <div class="panel-body"  style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/dologin">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('enternum') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6  col-md-offset-2">
                                <input id="enternum" type="text" class="form-control" name="enternum" value="{{ old('enternum') }}" required autofocus>

                                @if ($errors->has('enternum'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('enternum') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="enternum" class=" col-md-3 control-label">מספר זיהוי</label>

                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button style="text-align: center;" class="btn btn-block  btn-social btn-twitter" type="submit">
                                    התחבר
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                
                            </div>
                        </div>
                        <div class="form-group" style="direction:RTL; text-align: right"    >
                            <div class="col-md-6 col-md-offset-2"  style="direction:RTL; text-align: right">
                                <a class="btn btn-block btn-social btn-facebook" href="/login/facebook">התחבר עם Facebook</a>
                            </div>
                        </div>
                        <div class="form-group" style="direction:RTL; text-align: right">
                            <div class="col-md-6 col-md-offset-2" style="direction:RTL; text-align: right">
                                <a class="btn btn-block btn-social btn-google" href="/login/google">
                                    התחבר עם Google
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
