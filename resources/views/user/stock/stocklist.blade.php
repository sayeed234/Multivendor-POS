@extends('user.master')
@section('title')
Available Stock  || {{Session::get('name')}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Available Stock Info </h5></div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Capacity</th>
              <th>Color</th>
              <th>Image</th>
              <th>Stock Qty</th>
            </tr>
          </thead>
          <tbody>
          <?php $q=1; ?>
          @foreach($result as $stock)
          <tr >
          <td>{{$q++}}</td>
          <td>{{$stock->productname}}</td>
          <td>{{$stock->capacity}}</td>
          <td>{{$stock->color}}</td>
         <td><img src="{{asset($stock->image)}}"   style="height:50px; width:80px;"></td>
          <td><span style="color:blue;"><b> @if($stock->stock==0) Stock Out @else  {{$stock->stock}} @endif</b></span></td>
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  


@endsection