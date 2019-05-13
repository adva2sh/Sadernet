<nav class="navbar navbar-inverse" style="background-color: #3b5998;text-color:white;">
    <div class="container">
        <div class="navbar-header" style="float:right">
            <a class="navbar-brand" href="{{ url('/index') }}"   style="color:white;">
                סדרנט
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse"  dir="rtl">

            <ul class="nav navbar-nav navbar-right" style="margin-right: 10px;color:white;">
                <!-- Authentication Links -->
                @if (Auth::guest())
                @else
                    
                            @if(Auth::user()->admin)
                                <li><a href="/sanctions"  style="color:white;">סנקציות</a></li>
                                <li><a href="/reports"  style="color:white;">דו"חות</a></li>
                                <li><a href="/cars"  style="color:white;">ניהול צי רכב</a></li>
                                <li><a href="/tremps"  style="color:white;">טרמפים</a></li>
                                <li><a href="/order"  style="color:white;">הזמנת רכב</a></li>
                            @else
                                <li><a href="/takeorreturn"  style="color:white;">לקיחת / החזרת רכב</a></li>
                                <li><a href="/tremps"  style="color:white;">טרמפים</a></li>
                                <li><a href="/order"  style="color:white;">הזמנת רכב</a></li>
                            @endif

                            <li class="dropdown" >
                        <a class="dropdown-toggle"  style="color:white;" data-toggle="dropdown" href="#">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                        
                            @if(Auth::user()->admin)
                                <li style="direction:RTL; text-align: right"><a href="/manageorders">ניהול הזמנות רכב</a></li>
                                <li style="direction:RTL; text-align: right"><a href="/register">רשום משתמש חדש</a></li>
                                <li style="direction:RTL; text-align: right"><a href="/allusers">כל המשתמשים</a></li>
                            @else
                                <li style="direction:RTL; text-align: right"><a href="/update">עדכון פרטים אישיים</a></li>
                                <li style="direction:RTL; text-align: right"><a href="/manageorders">ניהול הזמנות רכב</a></li>
                            @endif
                            <li style="direction:RTL; text-align: right">
                                <a href="/logout"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    התנתק
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>