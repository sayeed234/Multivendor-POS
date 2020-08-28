@extends('user.master')
@section('title')
Customer Info ||  {{Session::get('name')}}
@endsection
@section('content')

<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Customer Information</h5></div>
     
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
              <th>NID</th>
              <th>Nominee</th>
              <th>Mobile</th>
              <th>NID</th>
              <th>Relation</th>
            </tr>
          </thead>
          <tbody>
          <?php $a=1; ?>
          @foreach($customer as $cus)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$cus->name}}</td>
          <td>{{$cus->mobile}}</td>
          <td>{{$cus->address}}</td>
          <td> @if($cus->nid=='') ---- @else {{$cus->nid}} @endif</td>
          <td>@if($cus->nominame=='') ---- @else {{$cus->nominame}} @endif</td>
          <td>@if($cus->nomimobile=='') ---- @else {{$cus->nomimobile}} @endif</td>
          <td>@if($cus->nominid=='') ---- @else {{$cus->nominid}} @endif</td>
          <td>@if($cus->relation=='') ---- @else {{$cus->relation}} @endif</td>

 
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  
<script>


@endsection