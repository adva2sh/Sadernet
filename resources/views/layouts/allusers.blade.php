@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">כל המשתמשים</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">שם</th>
                                <th scope="col"  style="direction:RTL; text-align: right">Gmail</th>
                                <th scope="col"  style="direction:RTL; text-align: right">Facebook</th>
                                <th scope="col"  style="direction:RTL; text-align: right">מס' תקציב קיבוץ</th>
                                <th scope="col"  style="direction:RTL; text-align: right">מס' רשיון</th>
                                <th scope="col"  style="direction:RTL; text-align: right">ת"ז</th>
                                <th scope="col"  style="direction:RTL; text-align: right">טלפון</th>
                                <th scope="col"  style="direction:RTL; text-align: right">מזהה כניסה</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{$user->name}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->gmail}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->facebook}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->numfin}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->license}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->idnum}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->phone}}</td>
                                <td  style="direction:RTL; text-align: right">{{$user->enternum}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection