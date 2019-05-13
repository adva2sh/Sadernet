@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">ניהול צי רכב</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($cars) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">מספר רכב</th>
                                <th scope="col"  style="direction:RTL; text-align: right">תאריך טיפול אחרון</th>
                                <th scope="col"  style="direction:RTL; text-align: right">תאריך טיפול הבא</th>
                                <th scope="col"  style="direction:RTL; text-align: right">תאריך שטיפה אחרון</th>
                                <th scope="col"  style="direction:RTL; text-align: right"></th>
                                <th scope="col"  style="direction:RTL; text-align: right"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{$car->number}}</td>
                                <td  style="direction:RTL; text-align: right">{{$car->last_treat}}</td>
                                <td  style="direction:RTL; text-align: right">{{$car->next_treat}}</td>
                                <td  style="direction:RTL; text-align: right">{{$car->last_wash}}</td>
                                <td  style="direction:RTL; text-align: right"><a href="/problems/{{$car->number}}" class="btn btn-warning">תקלות</a></td>
                                <td  style="direction:RTL; text-align: right"><a href="/problem/{{$car->number}}" class="btn btn-danger">דווח</a></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין מכוניות להצגה</p>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection