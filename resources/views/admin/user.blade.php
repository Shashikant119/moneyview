@extends('admin.master')
@section('content')
<div class="panel">
      <div class="boxed">
          <div id="content-container">
               <div id="page-content">
                 <div class="panel">
                 	@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
					        <strong>{{ $message }}</strong>
					</div>
					@endif
                  <div class="panel-body">
                  	<div class="searchbox">
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
			          @if($user_access[0]->fn_print=="Y")
				        <a href="javascript:;" onclick="printDiv();" class="btn btn-success"><i class="fa fa-print"></i> Print </a>
				      @endif
				      @if($user_access[0]->fn_excel=="Y")
				        <a href="javascript:;" class="btn btn-danger"><i class="fa fa-file-excel-o" ></i> Export to Excel </a>
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
									@foreach($data as $value)
									<tr>
										<td>{{$value->id}}</td>
										<td>{{$value->name}}</td>
										<td>{{$value->email}}</td>
										<td>{{$value->mobile}}</td>
										<td>{{$value->address}}</td>
										<td>{{$value->username}}</td>
										<td>{{$value->user_type}}</td>
										<td>{{$value->created_at}}</td>
										<td>{{$value->updated_at}}</td>
										<td class="center">
											<a href="{{url('/')}}/Users/update/{{$value->id}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											<a  onclick="myFunction('{{$value->id}}')" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</td>
									@endforeach
								</tbody>
							</table>
						</div>
						{{$data->links()}}
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

<script type="text/javascript">	
function myFunction(id) {
	swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover this imaginary file!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
	    window.location.assign("{{url('/')}}/Users/delete/"+id);
	  } else {
	    swal("Your imaginary file is safe!");
	  }
	});
 }
</script>
@endsection