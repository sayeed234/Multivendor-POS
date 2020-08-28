@extends('user.master')
@section('title')
Product Band ||  {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="Max Value">Name</label>
                <input class="form-control" required  type="text" name="name">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Phone</label>
                    <input class="form-control" required type="number" name="phone">
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
                    <label for="Max Value">Password</label>
                    <input class="form-control"  id="password"  required  onkeyup='check();' type="password" name="password">                  
                 </div> 

                 <div class="col-sm-6 form-group">
                        <label for="Max Value">Re-Password</label>
                        <input class="form-control" id="confirm_password" required  onkeyup='check();'  type="password" name="password">
                    </span>
                    <span class="text-success" id="message"></span> 
                    </div>     
                <div class="col-sm-6 form-group">                	
            <label>Photo(Size 250 X 100)</label>
            <input class="form-control" required  type="file" name="image">
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
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">User Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="Max Value">Name</label>
                        <input class="form-control name"  type="text" name="name">
                        <input class="cId" type="hidden" name="id" id="id">
                    </div> 
                    <div class="col-sm-6 form-group">
                            <label for="Max Value">Phone</label>
                            <input class="form-control phone" type="number" name="phone">
                        </div>
                     <div class="col-sm-6 form-group">
                          <label for="Max Value">Email</label>
                        <input class="form-control email"  type="email" name="email">
                        </div>
                          <div class="col-sm-6 form-group">
                            <label for="Max Value">Address</label>
                            <input class="form-control address"  type="text" name="address">
                         </div>     
                        <div class="col-sm-6 form-group">                	
                    <label>Photo(Size 250 X 100)</label>
                    <input class="form-control image"type="file" name="image">
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
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Admin Information</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add Admin                    
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Address</th>
              <th>Status</th>
              <th>Photo</th>
              <th>Address</th>
              <th>Status</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <tr>
          <td>aaaa</td>
          <td>bbb</td>
          <td>ccc</td>
          <td>ggg</td>
           <td>ggg</td>
          <td>ggg</td>
          <td>ggg</td>
          <td>ggg</td>
          <td>ggg</td>
            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit();' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Edit</a>
                <a class="dropdown-item"  href="#">View</a>
                <a class="dropdown-item" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="#">Delete</a>
            </div>
            </div>
        </td>
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
              url:"{{url('user_admin/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.name').val(response.name);
                  $('.cId').val(response.id);
                  $('.phone').val(response.mobile);
                  $('.email').val(response.email);
                  $('.address').val(response.address);
                
  
              },
              error:function(xhr,status,error){
                  console.log(error);
                  
              }
  
          });
      }
  $(document).ready(function(){
  });   
          
  </script>

@endsection