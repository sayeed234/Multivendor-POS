@extends('user.master')
@section('title')
Pending Payment || {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Instalment payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/payment')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="Max Value">Total</label>
                        <input class="form-control subtotal"  readonly  type="text" name="subtotal">
                        <input class="cId" type="hidden" name="id" id="id">
                        <input class="customer" type="hidden" name="customer">
                    </div> 
                    <div class="col-sm-6 form-group">
                            <label for="Max Value">Pay Total</label>
                            <input class="form-control paytotal" readonly type="number" name="paytotal">
                        </div>
                     <div class="col-sm-6 form-group">
                          <label for="Max Value">Due Total </label>
                        <input class="form-control duetotal" readonly  type="email" name="duetotal">
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="Max Value">Payment</label>
                          <input class="form-control payment"  required  min="1"   type="number" name="payment">   
                     </div>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" onclick="return confirm('Check Instalment Amount');"  class="btn btn-success">Update</button>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="card shadow">
    <div class="card-header">
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Payment History</h5></div>    
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
              <th>Date</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Due</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($order as $order)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$order->name}}</td>
          <td>{{$order->mobile}}</td>
          <td>{{$order->address}}</td>
        <td>{{ date('d-M-Y', strtotime($order->updated_at)) }}</td>
          <td> ৳ {{$order->subtotal}}</td>
          <td> ৳ {{$order->paytotal}}</td>
          <td>৳ {{$order->duetotal}}</td>
            <td>
            <div class="dropdown">
            <button class="btn btn-info dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" onclick= 'edit({{$order->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit"  href="#">Payment</a>
                <a class="dropdown-item"  href="{{url('/payment/view/'.$order->id)}}">View</a>
                <a class="dropdown-item" onclick="return confirm('Are you sure to delete this');" class="btn btn-danger" href="#">Delete</a>
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
  </div>  
<script>
  function edit(id) {
          var x =id;
          
          $.ajax({
              type:'GET',
              url:"{{url('/pending_payment/payment')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.subtotal').val(response.subtotal);
                  $('.cId').val(response.id);
                  $('.paytotal').val(response.paytotal);
                  $('.duetotal').val(response.duetotal);              
                  $('.payment').val(response.monthpay);              
                  $('.customer').val(response.customerid);              
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