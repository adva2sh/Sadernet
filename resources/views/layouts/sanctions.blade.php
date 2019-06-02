@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">סנקציה חדשה</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/dosanction">
            
                        <div class="form-group" style="direction:RTL; text-align: right">                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="userid" type="text" class="form-control" name="userid">
                            </div><label for="userid" class="col-md-4 control-label">מזהה משתמש</label>
                        </div>

                        <div class="form-group">                            
                            <div class="col-md-6">
                                <select id="reason" class="form-control" name="reason" required>
                                    <option selected disabled hidden></option>
                                    <option>איחור בהגעה</option>
                                    <option>איחור בהחזרה</option>
                                    <option>אי הגעה</option>
                                </select>
                            </div><label for="reason" class="col-md-4 control-label">סיבה לסנקציה</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    שלח
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    

<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">סנקציות משתמשים</div>
                <div class="panel-heading"  style="direction:RTL; text-align: right">סה"כ: {{count($sanctions)}}</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($sanctions) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">מזהה משתמש</th>
                                <th scope="col"  style="direction:RTL; text-align: right">שם</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן</th>
                                <th scope="col"  style="direction:RTL; text-align: right">סיבה</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sanctions as $sanction)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{$sanction->user_id}}</td>
                                <td  style="direction:RTL; text-align: right">{{App\User::find($sanction->user_id)->name}}</td>
                                <td  style="direction:RTL; text-align: right">{{$sanction->time}}</td>
                                <td  style="direction:RTL; text-align: right">{{$sanction->reason}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין סנקציות להצגה</p>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection