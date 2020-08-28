
@extends('user.master')
@section('title')
Employee || {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Employee info </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/employee/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="Max Value">Name</label>
                <input class="form-control" placeholder="Enter name" required  type="text" name="name">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Mobile</label>
                    <input class="form-control" placeholder="01750758262"  required type="number" name="mobile">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Email</label>
                <input class="form-control"  placeholder="lssoft@gmail.com"  type="email" name="email">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">NID</label>
                    <input class="form-control"placeholder="199582746" type="number" name="nid">
                </div>
                  <div class="col-sm-12 form-group">
                    <label for="Max Value">Address</label>
                    <input class="form-control" required placeholder="Prosadpur,Manda,Naogaon"  type="text" name="address">
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
      <form enctype="multipart/form-data" action="{{url('/employee/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                   <div class="col-sm-6 form-group">
                <label for="Max Value">Name</label>
                <input class="form-control name" placeholder="Enter name" required  type="text" name="name">
                 <input class="cId" type="hidden" name="id" id="id">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Mobile</label>
                    <input class="form-control mobile" placeholder="01750758262"  required type="number" name="mobile">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Email</label>
                <input class="form-control email"  placeholder="lssoft@gmail.com"  type="email" name="email">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">NID</label>
                    <input class="form-control nid"placeholder="199582746" type="number" name="nid">
                </div>
              <div class="col-sm-3 form-group">
                    <label for="Max Value">Status</label>
                     <select class="form-control" name="status">
                      <option class="form-control" Value="1">Active</option>
                      <option class="form-control"  Value="0">Leave</option>
                 </select>
             </div>
               <div class="col-sm-9 form-group">
                    <label for="Max Value">Address</label>
                    <input class="form-control address" required placeholder="Prosadpur,Manda,Naogaon"  type="text" name="address">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Employee info</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                New Employee                   
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
          @foreach($result as $result)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$result->name}}</td>
          <td>{{$result->mobile}}</td>
          <td>{{$result->address}}</td>
          <td>{{ date('d-M-Y', strtotime($result->created_at)) }}</td>
          <td>@if($result->status==1)
                  <span style="color:blue">Active</span>
              @else
             <span style="color:red">Leave</span>
              @endif
          
          </td>

            <td>
            <a href="" onclick= 'edit({{$result->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a>
        </td>
        </tr>
        @endforeach
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
              url:"{{url('employee/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.name').val(response.name);
                  $('.cId').val(response.id);
                  $('.mobile').val(response.mobile);
                  $('.email').val(response.email);
                  $('.address').val(response.address);               
                  $('.nid').val(response.nid);               
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