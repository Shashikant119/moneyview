<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>  
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/css/nifty.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/animate-css/animate.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/morris-js/morris.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/switchery/switchery.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{url('/')}}/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="{{url('/')}}/plugins/pace/pace.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div id="container" class="effect mainnav-lg">    
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header">
                    <a href="{{url('/')}}/" class="navbar-brand">
                        <img src="{{url('/')}}/img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">{{ Auth::user()->name }}</span>
                        </div>
                    </a>
                </div>
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="fa fa-navicon fa-lg"></i>
                            </a>
                        </li>
                            <!-- time set  -->
                         <li class="tgl-menu-btn" style="margin-top: 10px;margin-right: 50px;">
                           <center><button id="demo" style="color:red;font-size: 18px;"></button></center>
                        </li>
                    </ul>
                    <ul class="nav navbar-top-links pull-right">
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right">
                                    <img class="img-circle img-user media-object" src="{{url('/')}}/img/av1.png" alt="Profile Picture">
                                </span>
                                <div class="username hidden-xs">{{ Auth::user()->name }}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
                                <ul class="head-list">
                                    <li>
                                       <h4 style="text-align: center;color: black;">User Profile</h4>
                                       <hr style="border: .5px solid black;">
                                        <a>
                                            <i class="fa fa-user fa-fw fa-lg"></i> {{ Auth::user()->name }} 
                                        </a>
                                         <a >
                                            <i class="fa fa-envelope fa-fw fa-lg"></i> {{ Auth::user()->email }} 
                                        </a>
                                        <a>
                                            <i class="fa fa-phone fa-fw fa-lg"></i> {{ Auth::user()->mobile }} 
                                        </a>
                                        <a>
                                            <i class="fa fa-map-marker fa-fw fa-lg"></i> {{ Auth::user()->address }} 
                                        </a>
                                        <a>
                                            <i class="fa fa-calendar fa-fw fa-lg"></i> {{ Auth::user()->created_at }} 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('password.request') }}">
                                            <i class="fa fa-unlock fa-fw fa-lg"></i> Reset Password
                                        </a>
                                    </li>
                                    </li>
                                </ul>
                                <!-- Dropdown footer -->
                                <div class="pad-all text-right">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn btn-primary">
                                   <i class="fa fa-sign-out fa-fw"></i>{{ __('Logout') }}
                                 </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                  </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
            <nav id="mainnav-container">
                <div id="mainnav">
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">
                                    <li class="active-link">
                                        <a href="{{url('/')}}/">
                                            <i class="fa fa-dashboard"></i>
                                            <span class="menu-title">
                                                <strong>Dashboard</strong>
                                                <span class="label label-success pull-right">Top</span>
                                            </span>
                                        </a>
                                    </li>   
                                    @foreach($menu as $value)  
                                      @if($value['menu_type']=='Main')                      
                                    <li>
                                        <a href="{{url('/')}}/{{$value['url']}}" target="{{$value['target']}}" >
                                            <i class="{{$value['icon']}}"></i>
                                            <span class="menu-title">
                                                <strong>{{$value['menu_name']}}</strong>
                                            </span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($value['menu_type']=='Sub')
                                    <li>
                                        <a href="#">
                                            <i class="{{$value['icon']}}"></i>
                                            <span class="menu-title">{{$value['menu_name']}}</span>
                                            <i class="arrow"></i>
                                        </a>
                                        <ul class="collapse">
                                            @foreach($value['sub_menu'] as $subvalue)
                                                <li><a target="{{$subvalue->target}}" href="{{url('/')}}/{{$subvalue->url_name}}">{{$subvalue->sub_menu}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @endforeach            
                                  </ul>
                           </div>
                    </div>
                </div>
            </nav>
         @yield('content')
        <footer id="footer">
            <div class="hide-fixed pull-right pad-rgt">Design by SHASHIKANT</div>
            <p class="pad-lft">&#0169; 2020 Your SHASHIKANT</p>
        </footer>
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
 </div>
    <script src="{{url('/')}}/js/jquery-2.1.1.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/plugins/fast-click/fastclick.min.js"></script>
    <script src="{{url('/')}}/js/nifty.min.js"></script>
    <script src="{{url('/')}}/plugins/morris-js/morris.min.js"></script>
    <script src="{{url('/')}}/plugins/morris-js/raphael-js/raphael.min.js"></script>
    <script src="{{url('/')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{url('/')}}/plugins/skycons/skycons.min.js"></script>
    <script src="{{url('/')}}/plugins/switchery/switchery.min.js"></script>
    <script src="{{url('/')}}/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="{{url('/')}}/js/demo/nifty-demo.min.js"></script>
    <script src="{{url('/')}}/js/demo/dashboard.js"></script>
    <script type="text/javascript">

     function printDiv() 
    {

      var divToPrint=document.getElementById('DivIdToPrint');

      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write('<html><body onload="window.print()"><table border="1" cellspacing="0">'+divToPrint.innerHTML+'</table></body></html>');

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);

    }
    $(document).ready(function(){
        $("input").attr('autocomplete', 'off');
    });
    </script>
<!--     time set -->
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
  var d = new Date();
  document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script> 
@yield('script')
</body>
</html>   
