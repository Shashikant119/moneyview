@extends('admin.master')
@section('content')
<div class="panel">
      <div class="boxed">
          <div id="content-container">
               <div id="page-content">
                 <div class="panel">
			      <form method="POST" enctype="multipart/form-data">
			        {{ csrf_field() }}
			        <div class="row">
			          <div class="col-lg-12">
			            <div class="panel">
			              <div class="panel-body">
			                <div class="row">
			                  <div class="col-lg-4">
			                    <div class="form-group @if ($errors->has('name')) has-error @endif">
			                      <label class="control-label">Full Name</label>
			                      <input type="text" class="form-control" id="name" name="name"  placeholder="Full Name" value="{{$edit_data->name}}">
			                      @if ($errors->has('name'))
			                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('name')}}</small>
			                        @endif
			                    </div>
			                  </div>
			                  <div class="col-lg-4">
			                    <div class="form-group @if ($errors->has('mobile')) has-error @endif">
			                      <label class="control-label">Mobile Number</label>
			                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" value="{{$edit_data->mobile}}">
			                      @if ($errors->has('mobile'))
			                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="code" data-bv-result="INVALID" style="">{{$errors->first('mobile')}}</small>
			                        @endif
			                    </div>
			                  </div>
			                  <div class="col-lg-4">
			                    <div class="form-group @if ($errors->has('address')) has-error @endif">
			                      <label class="control-label">Address</label>
			                      <input type="text" class="form-control" id="address" name="address"  placeholder="Address" value="{{$edit_data->address}}">
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
			                      <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{$edit_data->email}}">
			                      @if ($errors->has('email'))
			                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('email')}}</small>
			                        @endif
			                    </div>
			                  </div>
			                  <div class="col-lg-4">
			                    <div class="form-group @if ($errors->has('user_type')) has-error @endif">
			                      <label class="control-label">User Type</label>
			                      <input type="text" class="form-control" id="user_type" name="user_type" readonly="readonly" value="{{$edit_data->user_type}}">
			                      @if ($errors->has('user_type'))
			                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('user_type')}}</small>
			                        @endif
			                    </div>
			                  </div>
			                  
			                  <div class="col-lg-4">
			                    <div class="form-group @if ($errors->has('username')) has-error @endif">
			                      <label class="control-label">Username</label>
			                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$edit_data->username}}" readonly="readonly">
			                      @if ($errors->has('username'))
			                        <small class="help-block" data-bv-validator="notEmpty" data-bv-for="name" data-bv-result="INVALID" style="">{{$errors->first('username')}}</small>
			                        @endif
			                    </div>
			                  </div>
			                </div>
			               
			              </div>
			            </div>
			          </div>
			          <div class="col-lg-12">
			            <div class="row" align="center">
			              <input class="btn btn-primary" type="submit" name="subBtn" value="Submit" >
			              <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
			            </div>
			          </div>
			        </div>
			      </form>
                </div>
             </div>
         </div>
     </div>
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