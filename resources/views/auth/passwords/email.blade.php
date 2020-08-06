<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password | </title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/css/nifty.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/')}}/css/demo/nifty-demo.min.css" rel="stylesheet">
    <link href="{{url('/')}}/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="{{url('/')}}/plugins/pace/pace.min.js"></script>
</head>
<body>
    <div id="container" class="cls-container">
        <div id="bg-overlay" class="bg-img img-balloon"></div>
        <div class="cls-header cls-header-lg">
            <div class="cls-brand">
                <a class="box-inline" href="{{url('/')}}/">
                    <span class="brand-title"><span class="text-thin">Admin</span></span>
                </a>
            </div>
        </div>
        <div class="cls-content">
            <div class="cls-content-sm panel">
                <div class="panel-body">
                    <p class="pad-btm">Enter your email address to recover your password. </p>
                    <form action="">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success text-uppercase" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pad-ver">
                <a href="{{url('/')}}/" class="btn-link mar-rgt">Back to Login</a>
            </div>
        </div>
    </div>
    <script src="{{url('/')}}/js/jquery-2.1.1.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/plugins/fast-click/fastclick.min.js"></script>
    <script src="{{url('/')}}/js/nifty.min.js"></script>
    <script src="{{url('/')}}/js/demo/bg-images.js"></script>
</body>
</html>
