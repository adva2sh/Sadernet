@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">דו"חות</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/makereport">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <select id="type" class="form-control" name="type" required>
                                    <option value="0" selected>הזמנות</option>
                                    <option value="1">תקלות</option>
                                    <option value="2">סנקציות</option>
                                </select>
                            </div><label for="name" class="col-md-4 control-label">שם מלא</label>

                        </div>

                        <div class="form-group"  style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="fromdate" type="text" class="form-control" name="fromdate" required>
                            </div><label for="fromdate" class="col-md-4 control-label">מתאריך (פורמט: dd/mm/YYYY)</label>

                        </div>

                        <div class="form-group"  style="direction:RTL; text-align: right">                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="todate" type="text" class="form-control" name="todate" required>
                            </div><label for="todate" class="col-md-4 control-label">עד תאריך (פורמט: dd/mm/YYYY)</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    הורד דו"ח
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