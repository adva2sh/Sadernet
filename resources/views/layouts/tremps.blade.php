@extends('layouts.app')

@section('content')
<div class="container"  style="direction:RTL; text-align: right">
    <div class="row"  style="direction:RTL; text-align: right">
        <div class="col-md-10 col-md-offset-1"  style="direction:RTL; text-align: right">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">אפשרות סינון</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
                    <form class="form-horizontal" role="form" method="POST" action="/filtertremps">
                        {{ csrf_field() }}
                        <div class="form-group" style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <select id="hourfrom" class="form-control" name="hourfrom">
                                <option value="00:00" selected>0:00</option>
  <option value="01:00">1:00</option>
  <option value="02:00">2:00</option>
  <option value="03:00">3:00</option>
  <option value="04:00">4:00</option>
  <option value="05:00">5:00</option>
  <option value="06:00">6:00</option>
  <option value="07:00">7:00</option>
  <option value="08:00">8:00</option>
  <option value="09:00">9:00</option>
  <option value="10:00">10:00</option>
  <option value="11:00">11:00</option>
  <option value="12:00">12:00</option>
  <option value="13:00">13:00</option>
  <option value="14:00">14:00</option>
  <option value="15:00">15:00</option>
  <option value="16:00">16:00</option>
  <option value="17:00">17:00</option>
  <option value="18:00">18:00</option>
  <option value="19:00">19:00</option>
  <option value="20:00">20:00</option>
  <option value="21:00">21:00</option>
  <option value="22:00">22:00</option>
  <option value="23:00">23:00</option>
                                </select>
                            </div><label for="hourfrom" class="col-md-4 control-label">משעה</label>

                        </div>
                        <div class="form-group" style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <select id="hourto" class="form-control" name="hourto">
                                <option value="00:00">0:00</option>
  <option value="01:00">1:00</option>
  <option value="02:00">2:00</option>
  <option value="03:00">3:00</option>
  <option value="04:00">4:00</option>
  <option value="05:00">5:00</option>
  <option value="06:00">6:00</option>
  <option value="07:00">7:00</option>
  <option value="08:00">8:00</option>
  <option value="09:00">9:00</option>
  <option value="10:00">10:00</option>
  <option value="11:00">11:00</option>
  <option value="12:00">12:00</option>
  <option value="13:00">13:00</option>
  <option value="14:00">14:00</option>
  <option value="15:00">15:00</option>
  <option value="16:00">16:00</option>
  <option value="17:00">17:00</option>
  <option value="18:00">18:00</option>
  <option value="19:00">19:00</option>
  <option value="20:00">20:00</option>
  <option value="21:00">21:00</option>
  <option value="22:00">22:00</option>
  <option value="23:00" selected>23:00</option>
                                </select>
                            </div><label for="hourto" class="col-md-4 control-label">עד שעה</label>
                        </div>
                        <div class="form-group" style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="date" type="text" class="form-control" name="date" value="{{isset($date) ? $date :Carbon\Carbon::now()->format('d/m/Y')}}" />
                            </div><label for="hourto" class="col-md-4 control-label">בתאריך (פורמט: dd/mm/YYYY)</label>
                        </div>
                        <div class="form-group" style="direction:RTL; text-align: right">
                            
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input id="destination" type="text" class="form-control" name="destination" />
                            </div><label for="destination" class="col-md-4 control-label">יעד</label>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    סנן
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">טרמפים</div>
                
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($tremps) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">שם מבצע ההזמנה</th>
                                <th scope="col"  style="direction:RTL; text-align: right">Gmail</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tremps as $tremp)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{App\User::find($tremp->userid)->name}}</td>
                                <td  style="direction:RTL; text-align: right">{{App\User::find($tremp->userid)->gmail}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין טרמפים להצגה</p>
                @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection