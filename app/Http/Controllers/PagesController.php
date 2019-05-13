<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;
use Auth;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;
use Carbon\Carbon;
use App\User;
use Mail;
use App\Car;
use App\Order;
use App\Problem;
use App\Sanc;
use Intervention\Image\ImageManagerStatic as Image;
use Maatwebsite\Excel\Facades\Excel;

class PagesController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(){
        return view('layouts.update')->with('user',Auth::user());
    }
    public function register(){
        return view('layouts.register');
    }

    public function doupdate(Request $request){
        $user = User::where('gmail', '=', $request->input('gmail'))->where('id','!=',Auth::user()->id)->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'ה-Gmail כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('facebook', '=', $request->input('facebook'))->where('id','!=',Auth::user()->id)->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'ה-Facebook כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('license', '=', $request->input('license'))->where('id','!=',Auth::user()->id)->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'מספר הרשיון כבר קיים במערכת תחת משתמש אחר');
        }

        $user = Auth::user();

        $path=$user->img;
        if($request->file('img')){
            $img = $request->file('img');
            $ext = strtolower($img->getClientOriginalExtension());
            if($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect('/update')->with('error', 'הסיומות המותרות לתמונה הן jpg,png,jpeg');
            }
            $filename = time() . '.' . $ext;
            $path = '/uploads/imgs/' . $filename;
            Image::make($img)->save( public_path($path) );
        }
        $user->name = $request->input('name');
        $user->gmail = $request->input('gmail');
        $user->facebook = $request->input('facebook');
        $user->license = $request->input('license');
        $user->phone = $request->input('phone');
        $user->img = $path;
        $user->save();

        return redirect('/update')->with('success', 'המשתמש עודכן בהצלחה');
    }

    public function doregister(Request $request)
    {
        $user = User::where('gmail', '=', $request->input('gmail'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'ה-Gmail כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('facebook', '=', $request->input('facebook'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'ה-Facebook כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('numfin', '=', $request->input('numfin'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'מספר התקציב כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('license', '=', $request->input('license'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'מספר הרשיון כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('enternum', '=', $request->input('enternum'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'מספר הזיהוי כבר קיים במערכת תחת משתמש אחר');
        }
        $user = User::where('idnum', '=', $request->input('idnum'))->first();
        if ($user != null) {
            return redirect('/register')->with('error', 'מספר ת"ז כבר קיים במערכת תחת משתמש אחר');
        }

        $path='';
        if($request->file('img')){
            $img = $request->file('img');
            $ext = strtolower($img->getClientOriginalExtension());
            if($ext != "jpg" && $ext != "png" && $ext != "jpeg")
            {
                return redirect('/register')->with('error', 'הסיומות המותרות לתמונה הן jpg,png,jpeg');
            }
            $filename = time() . '.' . $ext;
            $path = '/uploads/imgs/' . $filename;
            Image::make($img)->save( public_path($path) );
        }else{
            return redirect('/register')->with('error', 'לא נבחרה תמונה');
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->gmail = $request->input('gmail');
        $user->facebook = $request->input('facebook');
        $user->numfin = $request->input('numfin');
        $user->license = $request->input('license');
        $user->idnum = $request->input('idnum');
        $user->phone = $request->input('phone');
        $user->enternum = $request->input('enternum');
        $user->img = $path;
        $user->admin = false;
        $user->save();

        return redirect('/register')->with('success', 'המשתמש נוצר בהצלחה');
    }

    public function allusers(){
        return view('layouts.allusers')->with('users',User::all());
    }

    public function order(){
        return view('orders.order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doorder(Request $request)
    {
        try {
            Carbon::createFromFormat("d/m/Y H:i", $request->input('start_time'));
            Carbon::createFromFormat("d/m/Y H:i", $request->input('end_time'));
            $order = new Order;
            $order->start_time = $request->input('start_time');
            $st = Carbon::createFromFormat("d/m/Y H:i",$order->start_time);
            $order->end_time = $request->input('end_time');
            $order->destination = $request->input('destination');
            $order->tremp = $request->input('tremp') == 'on';
            $order->userspay = $request->input('userspay');
            $order->cost = rand(20,200);
            $order->autopay = $request->input('autopay') == 'on';
            $order->userid = Auth::user()->id;
            // TODO: check if there is a car available
            $all_cars = Car::all()->map(function ($value){
                return $value['number'];
            });
            $not_available_cars = Order::all()->filter(function ($value, $key) use ($st){
                $datestart = Carbon::createFromFormat("d/m/Y H:i", $value['start_time']);
                $dateend = Carbon::createFromFormat("d/m/Y H:i", $value['end_time']);
                return $datestart->lte($st) && $st->lte($dateend);
            })->map(function ($value){
                return $value['car_number'];
            }); 
            $d = $all_cars->diff($not_available_cars);
            if(count($d)==0){
                $order->status = '1';
            }else{
                $order->status = '2';
                $order->car_number = $d->first();
            }
            $order->save();
            $orders = Order::all()->filter(function ($value, $key){
                return Auth::user()->admin || Auth::user()->id == $value['userid'];
            }); 
            return redirect('/manageorders')->with(['success'=>'ההזמנה נוספה בהצלחה','orders'=>$orders]);
        } catch(\Exception $e){
            return redirect('/order')->with(['error' => 'שגיאה בעת ביצוע ההזמנה']);
        }
    }
    public function deleteorder($order_id){
        $order = Order::find($order_id);
        $car_number = $order->car_number;

        // TODO: check if there is a need to approve pending orders
        if($car_number)
        {
            $from = Carbon::createFromFormat("d/m/Y H:i",$order->start_time);
            $to = Carbon::createFromFormat("d/m/Y H:i",$order->end_time);
            $pending = Order::all()->filter(function ($value, $key) use($from,$to){
                $st = Carbon::createFromFormat("d/m/Y H:i",$value['start_time']);;
                return $value['status'] == '1' && $from->lte($st) && $st->lte($to);
            });
            if(count($pending) != 0){
                $p = $pending->first();
                $p->status='2';
                $p->car_number = $car_number;
                $p->save();
                $gmail = User::find($p->userid)->gmail;
                $this->sendmail($gmail, 'הזמנתך אושרה', 'הזמנתך מספר '.$p->id.' אושרה בעקבות ביטול הזמנה חופפת');
            }
        }        
        //

        $order->delete();
        $orders = Order::all()->filter(function ($value, $key){
            return Auth::user()->admin || Auth::user()->id == $value['userid'];
        }); 
        return redirect('/manageorders')->with(['success'=>'ההזמנה נמחקה בהצלחה','orders'=>$orders]);        
    }
    public function doedit(Request $request){
        try {
            Carbon::createFromFormat("d/m/Y H:i", $request->input('start_time'));
            Carbon::createFromFormat("d/m/Y H:i", $request->input('end_time'));
            $order = Order::find($request->order_id);
            $order->start_time = $request->input('start_time');
            $order->end_time = $request->input('end_time');
            $order->destination = $request->input('destination');
            $order->tremp = $request->input('tremp') == 'on';
            $order->userspay = $request->input('userspay');
            $order->autopay = $request->input('autopay') == 'on';
            $order->approved = false;
            $order->userid = Auth::user()->id;
            $order->save();
            $orders = Order::all()->filter(function ($value, $key){
                return Auth::user()->admin || Auth::user()->id == $value['userid'];
            }); 
            return redirect('/manageorders')->with(['success'=>'ההזמנה נערכה בהצלחה','orders'=>$orders]);
        } catch(\Exception $e){
            return redirect('/edit/'.$request->order_id)->with(['error' => 'שגיאה בעת עריכת הזמנה'.$e]);
        }
    }
    public function makereport(Request $request){
        try {
            $from = Carbon::createFromFormat("d/m/Y H:i", $request->input('fromdate')." 00:00");
            $to = Carbon::createFromFormat("d/m/Y H:i", $request->input('todate')." 00:00");
            switch($request->type){
                case '0':
                    return (new OrdersExport($from, $to))->download('orders.csv', \Maatwebsite\Excel\Excel::CSV);

                break;
                case '1':
                    return (new ProblemsExport($from, $to))->download('problems.csv', \Maatwebsite\Excel\Excel::CSV);

                break;
                case '2':
                     return (new SanctionsExport($from, $to))->download('sanctions.csv', \Maatwebsite\Excel\Excel::CSV);

            }
        } catch(\Exception $e){
            return redirect('/reports'.$request->order_id)->with(['error' => 'שגיאה בעת יצירת הדו"ח.']);
        }
    }
    public function edit($order_id){
        $order = Order::find($order_id);
        return view('orders.edit')->with('order',$order);
    }

    public function filtertremps(Request $request){
        try{
            $dest = $request->destination;
            $date_start = Carbon::createFromFormat('d/m/Y H:i', $request->date." ".$request->hourfrom);
            $date_end = Carbon::createFromFormat('d/m/Y H:i', $request->date." ".$request->hourto);
        }catch(Exception $e){
            $tremps = Order::all()->filter(function ($value, $key){
                if($value['tremp'] != 1)
                    return false;
                return true;
            }); 
            return view('layouts.tremps')->with(['tremps'=>$tremps, 'error'=>'תאריך בפורמט שגוי']);
        }
        $tremps = Order::all()->filter(function ($value, $key) use ($date_start, $date_end, $dest){
            if($value['tremp'] != 1 || $dest != $value['destination'])
                return false;
            $date = Carbon::createFromFormat('d/m/Y H:i', $value->start_time);
            if($date_start->lte($date) && $date->lte($date_end)){
                return true;                
            }
            return false;
        }); 
        return view('layouts.tremps')->with(['tremps'=>$tremps, 'date'=>$request->date]);
    }

    public function takeorreturn(){
        return view('layouts.takeorreturn');
    }

    public function problem($car_number){
        return view('layouts.problem')->with('car_number',$car_number);
    }

    public function cars(){
        return view('layouts.cars')->with('cars',Car::all());
    }

    public function take(){
        $uid = Auth::user()->id;
        $now = Carbon::now();
        $orders = Order::all()->filter(function ($value, $key) use ($uid, $now){
            if($value['userid'] != $uid || $value['status'] != '2'){
                return false;
            }
            if(abs(Carbon::createFromFormat('d/m/Y H:i', $value['start_time'])->diffInMinutes($now)) <= 30){
                return true;
            }
            return false;
        });
        if(count($orders)==0){
            return redirect('/takeorreturn')->with('error','אין לך הזמנה שאושרה בטווח של 30 דקות');
        }
        $order = $orders->first();
        $order->status = '3';
        $order->save();
        return redirect('/takeorreturn')->with('success','קח מפתח מתא מספר '.rand(1,10));
    }

    public function return(){
        $uid = Auth::user()->id;
        $orders = Order::all()->filter(function ($value, $key) use ($uid){
            return $value['userid'] == $uid && $value['status'] == '3';
        });
        
        if(count($orders)==0){
            return redirect('/takeorreturn')->with('error','אין הזמנה עבורה לקחת מפתח');
        }
        $order = $orders->first();
        $order->status = '4';
        $order->save();
        return redirect('/takeorreturn')->with(['success'=>'שים מפתח בתא מספר '.rand(1,10),'car_number'=>$order->car_number]);
    }
    
    public function doproblem(Request $request){
        $problem = new Problem;
        $problem->type = $request->type;
        $problem->car_id = $request->carid;
        $problem->user_name = $request->user_name;
        $problem->comments = $request->comments;
        $problem->time = Carbon::now()->format('d/m/Y H:i');
        $problem->save();
        $admins = User::where('admin',1);
        foreach($admins as $admin){
            $this->sendmail($u->gmail, 'דווח על תקלה חדשה ברכב', 'סוג תקלה: '.$problem->type.'. מזהה מכונית: '.$problem->car_id.'. שם משתמש: '.$problem->user_name.' . הערות: '.$problem->comments);
        }
        return redirect('/takeorreturn')->with('success', 'התקלה דווחה בהצלחה');
    }

    public function reports(){
        return view('layouts.reports');
    }
    public function sanctions(){
        return view('layouts.sanctions')->with('sanctions',Sanc::all());
    }
    public function dosanction(Request $request){
        $s = new Sanc;
        $u=User::find($request->userid);
        if(!$u){
            return redirect('/sanctions')->with(['sanctions'=>Sanc::all(), 'error'=>'מזהה משתמש לא קיים במערכת']);
        }
        $s->user_id = $request->userid;
        $s->reason = $request->reason;
        $s->time = Carbon::now()->format('d/m/Y H:i');
        $s->save();
        $this->sendmail($u->gmail, 'סנקציה', 'קיבלת סנקציה מהאחראי סידור. סיבה: '.$request->reason);
        return redirect('/sanctions')->with(['sanctions'=>Sanc::all(),'success'=>'הסנקציה נשלחה בהצלחה']);
    }
    
    public function problems($car_number){
        return view('layouts.problems')->with(['problems'=> Problem::all()->filter(function ($value, $key) use ($car_number){
            return $value['car_id'] == $car_number;
        }), 'car_id' => $car_number]);
    }

    public function tremps(){
        $tremps = Order::all()->filter(function ($value, $key){
            if($value['tremp'] != 1)
                return false;
            return true;
        }); 
        return view('layouts.tremps')->with('tremps',$tremps);
    }

    public function manage(){
        // check sanctions
        $sanctions = Sanc::all()->filter(function ($value, $key){
            return Auth::user()->id == $value['user_id'];
        }); 
        if(count($sanctions)>=3){
            Auth::logout();
            return redirect('/login')->with('error','נחסמת בעקבות 3 סנקציות שקיבלת');
        }
        //
        $orders = Order::all()->filter(function ($value, $key){
            return Auth::user()->admin || Auth::user()->id == $value['userid'];
        }); 
        return view('orders.manage')->with('orders',$orders);
    }
    public function sendmail($to, $subject, $body){
        $data = array("body" => $body);                    
        Mail::send('email', $data, function($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
            $message->from('sader.net@gmail.com','Sader.Net');
        });
    }
}
