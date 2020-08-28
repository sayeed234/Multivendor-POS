@extends('user.master')
@section('title')
Today Expense ||  {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Today Expense</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/daily_expense/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
        <div class="col-sm-6 form-group">
        <label>Expense Type</label>
        <select name="expense_type" class="form-control">
            <option class="form-control" value="Today All Expense">Today All Expense</option>
            <option class="form-control" value="Family Member">Family Member</option>
            <option class="form-control" value="Electriticy Bill">Electriticy Bill</option>
            <option class="form-control" value="Gas Bill">Gas Bill</option>
            <option class="form-control" value="Groceries">Groceries</option>
            <option class="form-control" value="Cable bill">Cable bill</option>
            <option class="form-control" value="Clothing">Clothing</option>
            <option class="form-control" value="Delivery">Delivery</option>
            <option class="form-control" value="Rent">Rent</option>
            <option class="form-control" value="Doctor Appointment">Doctor Appointment</option>
            <option class="form-control" value="Medicine">Medicine</option>
            <option class="form-control" value="Others">Others</option>
        </select>
        </div>
            <div class="col-sm-6 form-group">
            <label>Purpose</label>
            <input class="form-control"  type="text"  name="purpose">
        </div>
        <div class="col-sm-4 form-group">
            <label>Amount</label>
            <input class="form-control" required  type="number"  name="amount">
        </div> 
            <div class="col-sm-8 form-group">
            <label>Expense Details</label>
    <textarea class="form-control" type="text" name="details" ></textarea>
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
      <form enctype="multipart/form-data" action="{{url('/daily_expense/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
        <div class="col-sm-6 form-group">
        <label>Expense Type</label>
        <select name="expense_type" class="form-control expense_type">
            <option class="form-control" value="Today All Expense">Today All Expense</option>
            <option class="form-control" value="Family Member">Family Member</option>
            <option class="form-control" value="Electriticy Bill">Electriticy Bill</option>
            <option class="form-control" value="Gas Bill">Gas Bill</option>
            <option class="form-control" value="Groceries">Groceries</option>
            <option class="form-control" value="Cable bill">Cable bill</option>
            <option class="form-control" value="Clothing">Clothing</option>
            <option class="form-control" value="Delivery">Delivery</option>
            <option class="form-control" value="Rent">Rent</option>
            <option class="form-control" value="Doctor Appointment">Doctor Appointment</option>
            <option class="form-control" value="Medicine">Medicine</option>
            <option class="form-control" value="Others">Others</option>
        </select>
        </div>
            <div class="col-sm-6 form-group">
            <label>Purpose</label>
            <input class="form-control purpose"  type="text"  name="purpose">
        </div>
        <div class="col-sm-4 form-group">
            <label>Amount</label>
            <input class="form-control amount" required  type="number"  name="amount">
             <input class="cId" type="hidden" name="id" id="id">
        </div> 
            <div class="col-sm-8 form-group">
            <label>Expense Details</label>
    <textarea class="form-control details" type="text" name="details" ></textarea>
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Expense History</h5></div>   
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Today Expense                
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
              <th>Expense Type</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Details</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($daily as $daily)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$daily->expense_type}}</td>
          <td>@if($daily->purpose=='') ---- @else {{$daily->purpose}} @endif</td>
          <td>{{$daily->amount}}</td>
          <td>@if($daily->details=='') ---- @else {{$daily->details}} @endif</td>
           <td>{{ date('d-M-Y', strtotime($daily->updated_at)) }}</td>

            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit({{$daily->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Edit</a>
                <a class="dropdown-item" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('/daily_expense/delete/'.$daily->id)}}">Delete</a>
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
              url:"{{url('/daily_expense')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.expense_type').val(response.expense_type);
                  $('.cId').val(response.id);
                  $('.purpose').val(response.purpose);
                  $('.amount').val(response.amount);
                  $('.details').val(response.details);              
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