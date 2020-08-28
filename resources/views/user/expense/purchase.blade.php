@extends('user.master')
@section('title')
Purchase Expense ||  {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Purchase </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/purchase/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 form-group">
                <label for="Max Value">Band</label>
                <select class="form-control" required name="band">
                   <option class="form-control"  value="">Select Band</option>
                   @foreach($band as $band)
                   <option class="form-control" value="{{$band->id}}">{{$band->bandname}}</option>
                   @endforeach
                </select>
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Dealer Name</label>
                    <input class="form-control" required type="text" name="dealarname">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Quantity</label>
                <input class="form-control" required  type="number" name="qty">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Total Price</label>
                    <input class="form-control" required  type="number" name="total">
                 </div>    
                <div class="col-sm-6 form-group">                	
            <label>Invoice No</label>
            <input class="form-control" required  type="text" name="invoice">
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
      <form enctype="multipart/form-data" action="{{url('/purchase/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                   <div class="col-sm-6 form-group">
                <label for="Max Value">Band</label>
                <select class="form-control band" required name="band">
                   <option class="form-control"  value="">Select Band</option>
                   @foreach($bands as $band)
                   <option class="form-control" value="{{$band->id}}">{{$band->bandname}}</option>
                   @endforeach
                </select>
                 <input class="cId" type="hidden" name="id" id="id">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Dealer Name</label>
                    <input class="form-control dealarname" required type="text" name="dealarname">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Quantity</label>
                <input class="form-control qty" required  type="number" name="qty">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Total Price</label>
                    <input class="form-control total" required  type="number" name="total">
                 </div>    
                <div class="col-sm-6 form-group">                	
            <label>Invoice No</label>
            <input class="form-control invoice" required  type="text" name="invoice">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Purchase History</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Purchase                     
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
              <th>Band</th>
              <th>Dealer Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Invoice</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($purchase as $purchase)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$purchase->bandname}}</td>
          <td>{{$purchase->dealername}}</td>
          <td>{{$purchase->qty}}</td>
          <td>{{$purchase->total}}</td>
          <td>{{$purchase->invoice}}</td>
          <td>{{ date('d-M-Y', strtotime($purchase->updated_at)) }}</td>

            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit({{$purchase->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Edit</a>
                <a class="dropdown-item" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="{{url('/purchase/delete/'.$purchase->id)}}">Delete</a>
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
              url:"{{url('/purchase')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.band').val(response.band);
                  $('.cId').val(response.id);
                  $('.dealarname').val(response.dealername);
                  $('.qty').val(response.qty);
                  $('.total').val(response.total);
                  $('.invoice').val(response.invoice);
                
  
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