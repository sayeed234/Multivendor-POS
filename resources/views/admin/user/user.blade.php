@extends('admin.master')
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">User Create</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/user/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="Max Value">Name</label>
                <input class="form-control" required  type="text" name="name">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Phone</label>
                    <input class="form-control" required type="number" name="mobile">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Email</label>
                <input class="form-control"  type="email" name="email">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Address</label>
                    <input class="form-control" required  type="text" name="address">
                 </div>
            <div class="col-sm-6 form-group">                	
              <label>NID</label>
              <input class="form-control" required  type="text" name="nid">
            </div>

            <div class="col-sm-6 form-group">                	
               <label>Photo</label>
               <input class="form-control" required  type="file" name="image">
            </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Password</label>
                    <input class="form-control"  id="password"  required  onkeyup='check();' type="password" name="password">                  
                 </div> 

                 <div class="col-sm-6 form-group">
                        <label for="Max Value">Re-Password</label>
                        <input class="form-control" id="confirm_password" required  onkeyup='check();'  type="password" name="password">
                    </span>
                    <span class="text-success" id="message"></span> 
                    </div>             
             </div>
       </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-primary" >Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
</div>
</div>
</div>

{{-- Edit slider Modal --}}

<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">User Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/user/update')}}" method="post" >
        @csrf
         <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12 form-group">
                        <label for="Max Value">Status</label>
                        <input class="form-control status"  type="number" name="status">
                        <input class="cId" type="hidden" name="id" id="id">
                    </div> 
                    <div class="col-sm-12 form-group">
                            <label for="Max Value">Phone</label>
                            <input class="form-control mobile" type="number" name="mobile">
                        </div>
    
                </div>
            </div>
         <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="card shadow">
    <div class="card-header ">
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">User Information</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add User                   
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Joing</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($user as $user)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->mobile}}</td>
          <td>{{$user->address}}</td>
          <td>{{ date('d-M-Y', strtotime($user->created_at)) }}</td>
          <td>
             @if($user->status==1)
             <span style="color:blue;">Active</span>
             @else
             <span style="color:red;">Deactive</span>
             @endif          
          
          </td>
            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit({{$user->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Edit</a>
                <a class="dropdown-item"  href="#">View</a>
                <a class="dropdown-item" onclick="return confirm('Confirm Delete ?');" href="{{url('/user/delete/'.$user->id)}}">Delete</a>
            </div>
            </div>
        </td>
        @endforeach
        </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>  
<script>
  function edit(id) {
          var x =id;
          
          $.ajax({
              type:'GET',
              url:"{{url('user/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.status').val(response.status);
                  $('.cId').val(response.id);
                  $('.mobile').val(response.mobile);
                
  
              },
              error:function(xhr,status,error){
                  console.log(error);
                  
              }
  
          });
      }
  $(document).ready(function(){
  });   
          
  </script>
  <script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = '';
  }
}     </script>
{{--         
        <script>
        $('#conpassword').keyup(function(){
        var x=$('#password').val(); 
        var y=$('#conpassword').val();
        if (x==y)
        $('#conform2').text('');
        else
        $('#conform2').text('Password does not match');
        })
        </script> --}}
@endsection