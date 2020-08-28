@extends('user.master')
@section('title')
 Product Sale Report ||  {{Session::get('name')}}
@endsection
@section('content')
 <div class="ibox"style="margin-top: 5px;">            
<div class="ibox-head">
<div class="card-body">                                           
<form action="{{url('/product_sale_report')}}" method="get"> 
        @csrf   
            <div class="row">
                <div class="col-md-6 ">
                    <div class="row">
                    <div class="col-md-3">
                             <form> 
                 <input type="button"  class="btn btn-info" value="Print" 
                    onclick="window.print()" /> 
                     </form>
                        </div>
                        <div class="col-md-2">
                            <label style="float: center;">From:</label>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <input type="date"  required  name="fromDate" value="date" class="form-control "/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="row">
                        <div class="col-md-1"><label>To:</label></div>
                        <div class="col-md-4 "><input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" name="toDate"
                            /></div>
                        <div class="col-md-4 "><input type="submit" class="btn btn-success" value="Load"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
 <div class="card shadow">
 <div class="card-header">
    <div class="row">
        <div class="col-md-6"><h6 class="m-0 font-weight-bold "> Products Sales Report For @if($todate==0) All Time @else{{$fromdate}} --- {{$todate}}  @endif</h6></div>    
        <div class="col-md-6"><h5 class="m-0 font-weight-bold "> </h5></div>    
    </div> 
    </div>
 <div class="card-body">
    <div class="table-responsive">                  
       <table id="example" class="table table-bordered table-hover">
                        <thead>
                                <tr>
                                 <th>#</th>
                                <th>Product Name</th>
                                <th>Capacity</th>
                                <th>Total Qty</th>
                                <th>Sub Total  </th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php $i=1; $qty=0; $sales=0; ?>
                             @foreach($salesbydate as $sale)
                                <tr>
                                 <td>{{$i++}}</td>
                                 <td>{{$sale->productname}}</td>
                                 <td>{{$sale->capacity}}</td>
                                 <td>{{$sale->total_qty}}</td>
                                 <td>৳ {{$sale->total_sale}}</td>
                                </tr>
                            <?php  $qty=$qty+$sale->total_qty ?>   <?php  $sales=$sales+$sale->total_sale  ?> 
                             @endforeach
                             <tr>
                               <td colspan="3" style="text-align:right"><b>Total</b></td>
                               <td>{{$qty}}</td>
                               <td> ৳ {{$sales}}</td>
                             </tr>
                        </tbody>    
                  
                    </table>
                </div>
                </div>
        </div>
        </div>
        
</div>
@endsection