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
                            <select id="destination" class="form-control" name="destination" required >
                                    <option disabled selected hidden></option>
                                    <option value="אום אל-פחם">אום אל-פחם</option>
<option value="אופקים">אופקים</option>
<option value="אור יהודה">אור יהודה</option>
<option value="אור עקיבא">אור עקיבא</option>
<option value="אילת">אילת</option>
<option value="אריאל">אריאל</option>
<option value="אשדוד">אשדוד</option>
<option value="אשקלון">אשקלון</option>
<option value="באר שבע">באר שבע</option>
<option value="בית שאן">בית שאן</option>
<option value="בית שמש">בית שמש</option>
<option value="בני ברק">בני ברק</option>
<option value="בת ים">בת ים</option>
<option value="גבעת שמואל">גבעת שמואל</option>
<option value="גבעתיים">גבעתיים</option>
<option value="דימונה">דימונה</option>
<option value="הוד השרון">הוד השרון</option>
<option value="הרצליה">הרצליה</option>
<option value="חדרה">חדרה</option>
<option value="חולון">חולון</option>
<option value="חיפה">חיפה</option>
<option value="טבריה">טבריה</option>
<option value="טירת כרמל">טירת כרמל</option>
<option value="יבנה">יבנה</option>
<option value="יהוד-מונוסון">יהוד-מונוסון</option>
<option value="יקנעם">יקנעם</option>
<option value="ירושלים">ירושלים</option>
<option value="כפר יונה">כפר יונה</option>
<option value="כפר סבא">כפר סבא</option>
<option value="כפר קאסם">כפר קאסם</option>
<option value="כרמיאל">כרמיאל</option>
<option value="לוד">לוד</option>
<option value="מודיעין-מכבים-רעות">מודיעין-מכבים-רעות</option>
<option value="מעלה אדומים">מעלה אדומים</option>
<option value="נהריה">נהריה</option>
<option value="נס ציונה">נס ציונה</option>
<option value="נצרת">נצרת</option>
<option value="נצרת עילית">נצרת עילית</option>
<option value="נתיבות">נתיבות</option>
<option value="נתניה">נתניה</option>
<option value="עכו">עכו</option>
<option value="עפולה">עפולה</option>
<option value="ערד">ערד</option>
<option value="פתח תקווה">פתח תקווה</option>
<option value="צפת">צפת</option>
<option value="קריית אונו">קריית אונו</option>
<option value="קריית אתא">קריית אתא</option>
<option value="קריית ביאליק">קריית ביאליק</option>
<option value="קריית גת">קריית גת</option>
<option value="קריית ים">קריית ים</option>
<option value="קריית מוצקין">קריית מוצקין</option>
<option value="קריית מלאכי">קריית מלאכי</option>
<option value="קריית שמונה">קריית שמונה</option>
<option value="ראש העין">ראש העין</option>
<option value="ראשון לציון">ראשון לציון</option>
<option value="רהט">רהט</option>
<option value="רחובות">רחובות</option>
<option value="רמלה">רמלה</option>
<option value="רמת גן">רמת גן</option>
<option value="רמת השרון">רמת השרון</option>
<option value="רעננה">רעננה</option>
<option value="שדרות">שדרות</option>
<option value="תל אביב-יפו">תל אביב-יפו</option>

                                </select>
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
            @if(isset($tremps))
            <div class="panel panel-default"  style="direction:RTL; text-align: right">
                <div class="panel-heading"  style="direction:RTL; text-align: right">טרמפים</div>
                
                <div class="panel-body" style="direction:RTL; text-align: right">
                @if(count($tremps) > 0)
                    <table class="table"  style="direction:RTL; text-align: right">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"  style="direction:RTL; text-align: right">שם מבצע ההזמנה</th>
                                <th scope="col"  style="direction:RTL; text-align: right">Gmail</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן יציאה</th>
                                <th scope="col"  style="direction:RTL; text-align: right">זמן חזרה</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tremps as $tremp)
                            <tr>
                                <td  style="direction:RTL; text-align: right">{{App\User::find($tremp->userid)->name}}</td>
                                <td  style="direction:RTL; text-align: right">{{App\User::find($tremp->userid)->gmail}}</td>
                                <td  style="direction:RTL; text-align: right">{{$tremp->start_time}}</td>
                                <td  style="direction:RTL; text-align: right">{{$tremp->end_time}}</td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                @else
                    <p>אין טרמפים להצגה</p>
                @endif
                    
                </div>
            </div>
            @endif
        </div>
    </div>
</div>    
@endsection