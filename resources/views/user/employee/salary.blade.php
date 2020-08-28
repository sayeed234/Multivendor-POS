@extends('user.master')
@section('title')
Employee Salary || {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Pay Salary</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/employee_salary/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12 form-group">
                <label for="Max Value">Name</label>
                <select class="form-control" name="name"required >
                <option class="form-control" Value="">Select Employee </option>
                @foreach($result as $res)
                 <option class="form-control" Value="{{$res->id}}">{{$res->name}}</option>
                @endforeach
                </select>
            </div> 
            <div class="col-sm-12 form-group">
                <label for="Max Value">Amount</label>
                 <input class="form-control" placeholder="12000" required type="number" name="amount">
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
      <form enctype="multipart/form-data" action="{{url('/employee_salary/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                   <div class="col-sm-12 form-group">
                <label for="Max Value">Name</label>
                <select class="form-control name" name="name" required >
                <option class="form-control" Value="">Select Employee </option>
                @foreach($result as $res)
                 <option class="form-control" Value="{{$res->id}}">{{$res->name}}</option>
                @endforeach
                </select>
                 <input class="cId" type="hidden" name="id" id="id">
            </div> 
            <div class="col-sm-12 form-group">
                <label for="Max Value">Amount</label>
                 <input class="form-control amount" placeholder="12000" required type="number" name="amount">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Salary Info</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Pay Salary                   
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
          <?php $k=1; ?>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>Amount</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($salary as $sal)
          <tr>
          <td>{{$k++}}</td>
          <td>{{$sal->name}}</td>
          <td>{{$sal->mobile}}</td>
          <td>{{$sal->amount}}</td>
          <td>{{ date('d-M-Y', strtotime($sal->updated_at)) }}</td>
            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit({{$sal->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Edit</a>
                <a class="dropdown-item" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('/employee_salary/delete/'.$sal->id)}}">Delete</a>
            </div>
            </div>
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
              url:"{{url('employee_salary/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.name').val(response.employee_id);
                  $('.cId').val(response.id);
                  $('.amount').val(response.amount);      
  
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