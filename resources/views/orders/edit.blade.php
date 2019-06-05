@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="direction:RTL; text-align: right">עריכת הזמנה</div>
                <div class="panel-body" style="direction:RTL; text-align: right">
            
                    <form class="form-horizontal" role="form" method="POST" action="/doedit">
                        {{ csrf_field() }}
                        <input id="order_id" type="text" name="order_id" value="{{ $order->id }}" hidden>

                        <div class="form-group" style="direction:RTL; text-align: right">
                    
                </div>
                        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input autocomplete="off" id="start_time" value="{{ explode(' ', $order->start_time)[1] }}" type="text" placeholder="HH:ii" class="form-control" name="start_time" value="{{ old('start_time') }}" required autofocus>
                            </div><label for="start_time" class="col-md-4 control-label">שעת התחלה</label>
                        </div>
                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input autocomplete="off" id="start_date" value="{{ explode(' ', $order->start_time)[0] }}" placeholder="dd/mm/YYYY" type="text" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>
                            </div><label for="start_date" class="col-md-4 control-label">תאריך התחלה</label>
                        </div>

                        <div class="form-group{{ $errors->has('end_time') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input autocomplete="off" id="end_time" value="{{ explode(' ', $order->end_time)[1] }}" type="text" placeholder="HH:ii" class="form-control" name="end_time" value="{{ old('end_time') }}" required autofocus>
                            </div><label for="end_time" class="col-md-4 control-label">שעת סיום</label>
                        </div>
                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}"  style="direction:RTL; text-align: right">
                            <div class="col-md-6" style="direction:RTL; text-align: right">
                                <input autocomplete="off" id="end_date" value="{{ explode(' ', $order->end_time)[0] }}" placeholder="dd/mm/YYYY" type="text" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>
                            </div><label for="end_date" class="col-md-4 control-label">תאריך סיום</label>
                        </div>


                        
                        <div class="form-group{{ $errors->has('destination') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                            <select id="destination" value="{{ $order->destination }}" class="form-control" name="destination" required >
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
                        
                        <div class="form-group{{ $errors->has('tremp') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input  id="tremp" type="checkbox" name="tremp" {{$order->tremp ? "checked":""}}>
    
                            </div> <label for="tremp" class="col-md-4 control-label">להציג כטרמפ?</label>

                        </div>
                        <div class="form-group{{ $errors->has('userspay') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input autocomplete="off" id="userspay" type="userspay" class="form-control" name="userspay" value="{{ $order->userspay }}">

                            </div> <label for="userspay" class="col-md-4 control-label">חיוב משתמשים נוספים (הפרד מספרי ת"ז בפסיקים)</label>

                        </div>
                                
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="width: 100px;">
                                    שמור שינויים
                                </button>
                    </form>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <form class="form-horizontal" role="form" method="POST" action="/deleteorder/{{$order->id}}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-danger" style="width: 100px;">
                                        מחק הזמנה
                                    </button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection