<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register page |Register.</title>
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/nifty.min.css" rel="stylesheet">
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/demo/nifty-demo.min.css" rel="stylesheet">
	<link href="plugins/pace/pace.min.css" rel="stylesheet">
	<script src="plugins/pace/pace.min.js"></script>
</head>
<body>
	<div id="container" class="cls-container">
		<div id="bg-overlay" class="bg-img img-balloon"></div>
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="index-2.html">
					<span class="brand-title"> <span class="text-thin">Admin</span></span>
				</a>
			</div>
		</div>
		<div class="cls-content">
			<div class="cls-content-lg panel">
				<div class="panel-body">
					<p class="pad-btm">Create an account</p>
					<form method="POST" action="{{url('/')}}/Store">
						@csrf
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-male"></i></div>
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
										 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password-Confirm">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
										 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
							</div>
							<div class="col-sm-12">
							<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-phone fa-fw fa-lg"></i></div>
										<input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="new-mobile" placeholder="Mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-map-marker fa-fw fa-lg"></i>
										</div>
										<input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-address" placeholder="Address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-user"></i></div>
										<input id="user_type" type="user_type" class="form-control @error('user_type') is-invalid @enderror" name="user_type" required autocomplete="new-user_type" placeholder="User_type">
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-male"></i></div>
										<input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="new-username" placeholder="Username">

                                     @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8 text-left checkbox">
								<label class="form-checkbox form-icon">
									<input type="checkbox"> I agree with the <a href="#" class="btn-link">Terms and Conditions</a>
								</label>
							</div>
							<div class="col-xs-4">
								<div class="form-group text-right">
									<button class="btn btn-success text-uppercase" type="submit"> {{ __('Register') }}</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="pad-ver">
				Already have an account ? <a href="{{url('/')}}/login" class="btn-link mar-rgt">Sign In</a>
			</div>
		</div>
	</div>
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="plugins/fast-click/fastclick.min.js"></script>
	<script src="js/nifty.min.js"></script>
	<script src="js/demo/bg-images.js"></script>
</body>
</html>
