@extends('admin.master')
@section('content')
<div class="panel">
      <div class="boxed">
          <div id="content-container">
               <div id="page-content">
                 <div class="panel">
                  <div class="panel-body">       
					<p class="pad-btm">Create an account</p>
					 <form method="POST" action="{{url('/')}}/Add-Register">
				        {{ csrf_field() }}
				        <div class="row">
				          <div class="col-lg-12">
				            <div class="panel">
				              <div class="panel-body">
				                <div class="row">
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('name')) has-error @endif">
				                      <label class="control-label">Company Name</label>
				                      <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Full Name">
				                      @if ($errors->has('name'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('name')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('mobile')) has-error @endif">
				                      <label class="control-label">Mobile Number</label>
				                      <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}" placeholder="Mobile Number">
				                      @if ($errors->has('mobile'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="code" data-bv-result="INVALID" style="">{{$errors->first('mobile')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('address')) has-error @endif">
				                      <label class="control-label">Address</label>
				                      <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="Address">
				                      @if ($errors->has('address'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('address')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                </div>
				                <div class="row">
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('email')) has-error @endif">
				                      <label class="control-label">Email address</label>
				                      <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email address">
				                      @if ($errors->has('email'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('email')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('user_type')) has-error @endif">
				                      <label class="control-label">User Type</label>
				                      <input type="text" class="form-control" id="user_type" name="user_type" value="{{old('user_type')}}" placeholder="User Type">
				                      @if ($errors->has('user_type'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('user_type')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                  
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('username')) has-error @endif">
				                      <label class="control-label">Username</label>
				                      <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Username">
				                      @if ($errors->has('username'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('username')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                </div>
				                <div class="row">
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('password')) has-error @endif">
				                      <label class="control-label">Password</label>
				                      <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
				                      @if ($errors->has('password'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('password')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                  <div class="col-lg-4">
				                    <div class="form-group @if ($errors->has('confirm_password')) has-error @endif">
				                      <label class="control-label">Confirm Password</label>
				                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Confirm Password">
				                      @if ($errors->has('confirm_password'))
				                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('confirm_password')}}</small>
				                        @endif
				                    </div>
				                  </div>
				                </div>
				                
				              </div>
				            </div>
				          </div>
				          <div class="col-lg-4"></div>
				          <div class="col-lg-12">
				            <div class="row" align="center">
				              <input class="btn btn-primary" type="submit" name="subBtn" value="Submit" >
				              <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
				            </div>
				          </div>
				        </div>
                  </form>
            </div>
@endsection
@section('script')
<script type="text/javascript">
 $(document).ready(function(){
  $("#start_date").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
  });
 $("#end_date").datepicker({
    autoclose:true,
    format:'yyyy-mm-dd'
  });
 });
</script>
@endsection