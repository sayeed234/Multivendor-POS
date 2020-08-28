@extends('user.master')
@section('title')
Payment History ||  {{Session::get('name')}}
@endsection
@section('content')

<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-12"><h5 class="m-0 font-weight-bold ">Payment History</h5></div>   
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
              <th>Payment</th>
              <th>Date</th>

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
          <td>৳ {{$result->payment}}</td>
          <td>{{$result->date}}</td>
           
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  


@endsection