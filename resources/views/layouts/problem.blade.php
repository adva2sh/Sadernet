@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">דווח על תקלה</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/doproblem">
                        {{ csrf_field() }}
                                <input id="user_name" type="hidden" class="form-control" name="user_name" value="{{Auth::user()->name}}" />

                        <div class="form-group" style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="carid" type="text" class="form-control" name="carid" value="{{ $car_number }}" readonly>
                            </div><label for="carid" class="col-md-4 control-label">מס' רכב</label>

                        </div>

                        <div class="form-group">
                            
                            <div class="col-md-6">
                                <select id="type" class="form-control" name="type" required>
                                    <option value="תאונה">תאונה</option>
                                    <option value="תקר בגלגל">תקר בגלגל</option>
                                    <option value="נורה נדלקה">נורה נדלקה</option>
                                    <option value="תקלה ברכב">תקלה ברכב</option>
                                </select>
                            </div><label for="type" class="col-md-4 control-label">סוג התקלה</label>

                        </div>

                        
                        <div class="form-group">
                            
                            <div class="col-md-6">

                                <textarea id="comments" class="form-control" name="comments">
                                </textarea>
                            </div><label for="facebook" class="col-md-4 control-label">הערות</label>

                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    דווח
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
