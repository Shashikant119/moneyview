@extends('admin.master')
@section('content')
<div class="panel">
      <div class="boxed">
          <div id="content-container">
               <div id="page-content">
                 <div class="panel">
                  <div class="panel-body">
                    <div align="right">
      				      <select id="user" onchange="getDetail(this.value);" class="form-control">
      			          <option value="">--Select User--</option>
      			         	@foreach($users as $value)
      			         		<option value="{{$value->id}}">{{$value->name}}</option>
      			         	@endforeach
      			          </select>
			             </div>	
						         <div class="table-responsive">
                			<table class="table  table-bordered" cellspacing="0" width="100%" id="DivIdToPrint">
							     	<thead>
								   	    <tr>
							            <th>Sr No.</th>
							            <th>Menu</th>
							            <th>Sub Menu</th>
							            <th>Add</th>
							            <th>Edit</th>
							            <th>Delete</th>
							            <th>View</th>
							            <th>Excel</th>
							            <th>Print</th>
							          </tr>
    								</thead>
    								<tbody id="tdata"></tbody>
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
    function getDetail(id)
    {
        $("#tdata").html("");

        $.ajax({
            url:"{{url('/')}}/UserControlList/"+id,
            type:"GET",
            dataType:"JSON",
            success:function(data){
            	console.log(data);
            	for(var i=0;i<data.length;i++)
            	{
        		    if(data[i].fn_add=='Y'){fnaddbtn='Checked'}else {fnaddbtn='';}
                if(data[i].fn_delete=='Y'){fndeletebtn='Checked'}else {fndeletebtn='';}
                if(data[i].fn_update=='Y'){fneditbtn='Checked'}else {fneditbtn='';}
                if(data[i].fn_view=='Y'){fnviewbtn='Checked'}else {fnviewbtn='';}
                if(data[i].fn_excel=='Y'){fnexcelbtn='Checked'}else {fnexcelbtn='';}
                if(data[i].fn_print=='Y'){fnprintbtn='Checked'}else {fnprintbtn='';}
            		//data[i].menu_name;
				    var  msg='<tr><td>'+(parseInt(i)+1)+'</td>'+
                    '<td>'+data[i].menu_name+'</td>'+
                    '<td>'+data[i].sub_menu+'</td>'+
             '<td><input type="checkbox" id="add'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'add\');" '+fnaddbtn+' class="check"></td>'+
            '<td><input type="checkbox" id="edit'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'edit\');" '+fneditbtn+' class="check"></td>'+
            '<td><input type="checkbox" id="delete'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'delete\');" '+fndeletebtn+' class="check"></td>'+
            '<td><input type="checkbox" id="view'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'view\');" '+fnviewbtn+' class="check"></td>'+
            '<td><input type="checkbox" id="excel'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'excel\');" '+fnexcelbtn+' class="check"></td>'+
            '<td><input type="checkbox" id="print'+data[i].id+'" onchange="changeStatus('+data[i].id+',\'print\');" '+fnprintbtn+' class="check"></td>'+
				    '</tr>';
				    $("#tdata").append(msg);
		          new Switchery(document.getElementById('add'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
              new Switchery(document.getElementById('edit'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
              new Switchery(document.getElementById('delete'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
              new Switchery(document.getElementById('view'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
              new Switchery(document.getElementById('excel'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
              new Switchery(document.getElementById('print'+data[i].id),{ color: '#7c8bc7', jackColor: '#9decff' });
			        }	        
            }    
        });
    }
    function changeStatus(id,name)
    {
    	 if($('#'+name+''+id).is(':checked')){
            $.ajax({
                url:"{{url('/')}}/changeUserControl",
                data:"id="+id+"&type="+name+"&status=Y",
                type:"get",
                //dataType:'json',
                success:function(data){
                  if(data!="Service status changed successfully")
                  {
                    alert(data);
                  }
                }
            });
         }else{
              $.ajax({
                url:"{{url('/')}}/changeUserControl",
                data:"id="+id+"&type="+name+"&status=N",
                type:"get",
                //dataType:'json',
                success:function(data){
                  if(data!="Service status changed successfully")
                  {
                    alert(data);
                  }
                }
            });
         }
   }
</script>
@endsection
