@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">תקלות לרכב {{$car_id}}</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($problems) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">שם מזמין</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן</th>
                                <th scope="col"  style="direction:RTL; text-align: right">סוג</th>
                                <th scope="col"  style="direction:RTL; text-align: right">הערות</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($problems as $problem)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{$problem->user_name}}</td>
                                <td  style="direction:RTL; text-align: right">{{$problem->time}}</td>
                                <td  style="direction:RTL; text-align: right">{{$problem->type}}</td>
                                <td  style="direction:RTL; text-align: right">{{$problem->comments}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין תקלות להצגה</p>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection