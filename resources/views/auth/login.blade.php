<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page | admin.</title>


    <!--Open Sans Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{url('/')}}/css/nifty.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="{{url('/')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{url('/')}}/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="{{url('/')}}/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="{{url('/')}}/plugins/pace/pace.min.js"></script>

</head>

<body>
    <div id="container" class="cls-container">
        
        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay" class="bg-img img-balloon"></div>
        
        
        <!-- HEADER -->
        <!--===================================================-->
        <div class="cls-header cls-header-lg">
            <div class="cls-brand">
                <a class="box-inline" href="index-2.html">
                    <!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
                    <span class="brand-title"><span class="text-thin">Admin</span></span>
                </a>
            </div>
        </div>
        <!--===================================================-->
        
        
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <p class="pad-btm" style="color:#fff;">Sign In to your account</p>
                    <form method="POST" action="{{ route('login') }}">
                         @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 text-left checkbox">
                                <label class="form-checkbox form-icon">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                                </label>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group text-right">
                                <button class="btn btn-success text-uppercase" type="submit">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           <!--  <div class="pad-ver">
                <a href="{{ route('password.request') }}" class="btn-link mar-rgt">{{ __('Forgot Your Password?') }}</a>
            </div> -->
        </div>
    </div>
    <!--jQuery [ REQUIRED ]-->
    <script src="{{url('/')}}/js/jquery-2.1.1.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <!--Fast Click [ OPTIONAL ]-->
    <script src="{{url('/')}}/plugins/fast-click/fastclick.min.js"></script> 
    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="{{url('/')}}/js/nifty.min.js"></script>
    <!--Background Image [ DEMONSTRATION ]-->
    <script src="{{url('/')}}/js/demo/bg-images.js"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>
