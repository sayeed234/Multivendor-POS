@extends('user.master')
@section('title')
Payment Pending  Report ||  {{Session::get('name')}}
@endsection
@section('content')
 <div class="ibox"style="margin-top: 5px;">            
<div class="ibox-head">
<div class="card-body">                                           
<form action="{{url('/due_pay_report')}}" method="get"> 
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
        <div class="col-md-6"><h6 class="m-0 font-weight-bold ">Pending Payment Report For @if($todate==0) All @else{{$fromdate}} --- {{$todate}}  @endif</h6></div>    
        <div class="col-md-6"><h5 class="m-0 font-weight-bold "> </h5></div>    
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
                                <th>Type</th>
                                <th>Qty</th>
                                <th>SubTotal</th>
                                <th>Payment</th>
                                <th>Due</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php $i=1; $qty=0; $sales=0; ?>
                             @foreach($salesbydate as $sale)
                                <tr>
                                 <td>{{$i++}}</td>
                                 <td>{{$sale->name}}</td>
                                 <td>{{$sale->mobile}}</td>
                                 <td>{{$sale->address}}</td>
                                 <td>{{$sale->status}}</td>
                                 <td>{{$sale->qty}}</td>
                                 <td>৳ {{$sale->subtotal}}</td>
                                 <td>৳ {{$sale->paytotal}}</td>
                                 <td> @if($sale->duetotal==0) PAID @else ৳  {{$sale->duetotal}} @endif</td>
                                </tr>
                           
                             @endforeach
                            
                           </tbody>    
                  
                    </table>
                </div>
                </div>
        </div>
        </div>
        
</div>
@endsection