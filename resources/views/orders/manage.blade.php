@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">{{$header}}</div> 
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($orders) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">מספר הזמנה</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן התחלה</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן סיום</th>
                                <th scope="col"  style="direction:RTL; text-align: right">יעד</th>
                                <th scope="col"  style="direction:RTL; text-align: right">טרמפ?</th>
                                <th scope="col"  style="direction:RTL; text-align: right">משתמשים מחויבים</th>
                                <th scope="col"  style="direction:RTL; text-align: right">תשלום אוטומטי?</th>
                                <th scope="col"  style="direction:RTL; text-align: right">סטאטוס</th>
                                <th scope="col"  style="direction:RTL; text-align: right">מזהה משתמש מזמין</th>
                                <th scope="col"  style="direction:RTL; text-align: right">עלות (בשקלים)</th>
                                <th scope="col"  style="direction:RTL; text-align: right"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{$order->id}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->start_time}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->end_time}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->destination}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->tremp == '0' ? 'לא' : 'כן'}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->userspay}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->autopay == '0' ? 'לא' : 'כן'}}</td>
                                <td  style="direction:RTL; text-align: right">
                                @if($order->status == '1')
                                    <p style="color: red">בהמתנה</p>
                                @elseif($order->status == '2')
                                    <p style="color: green">אושר</p>
                                @elseif($order->status == '3')
                                    <p style="color: orange">נלקח מפתח</p>
                                @elseif($order->status == '4')
                                    <p style="color: blue">הוחזר מפתח</p>
                                @endif
                                </td>
                                <td  style="direction:RTL; text-align: right">{{$order->userid}}</td>
                                <td  style="direction:RTL; text-align: right">{{$order->cost}}</td>
                                <td  style="direction:RTL; text-align: right"><a href="/edit/{{$order->id}}" class="btn btn-danger">ערוך</a></td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין הזמנות להצגה</p>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection