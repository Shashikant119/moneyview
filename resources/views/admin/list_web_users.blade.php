@extends('admin.master')
@section('content')
<div class="panel">
      <div class="boxed">
          <div id="content-container">
               <div id="page-content">
                 <div class="panel">
                  <div class="panel-body">
                  	<div class="searchbox" style="text-align: left;float: left;">
                        <div class="input-group custom-search-form">
                            <input type="text" name="search" id="myInput" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div align="right">
				         @if($user_access[0]->fn_add=="Y")
				         <a href="{{url('/')}}/{{$current_menu}}" id="addRow" class="btn btn-info">Add User <i class="fa fa-plus"></i></a>
				         @endif
			        </div>	
					<div class="table-responsive">
                    <table class="table  table-bordered" cellspacing="0" width="100%" id="DivIdToPrint">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>E-mail</th>
										<th>Mobile</th>
										<th>Address</th>
										<th>Username</th>
										<th>User Type</th>
										<th>Created_at</th>
										<th>Updated_at</th>
										<th class="center">Action</th>
									</tr>
								</thead>
								<tbody id="myTable">
								
								</tbody>
							</table>
						</div>
						
					</div>
               </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
@endsection