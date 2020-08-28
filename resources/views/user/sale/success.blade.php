@extends('user.master')
@section('title')
Success Sale || {{Session::get('name')}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header">
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Success Sale</h5></div>    
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
              <th>Status</th>
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
          <td>৳ {{$order->subtotal}}</td>
          <td>৳ {{$order->paytotal}}</td>
          <td> @if($order->duetotal==0) PAID @else  ৳ {{$order->duetotal}} @endif</td>
            <td>
    
                <a  href="{{url('/payment/view/'.$order->id)}}"> <i class="fa fa-eye btn btn-info"></i></a>
           
        </td>
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  

@endsection