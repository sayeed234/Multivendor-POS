@extends('user.master')
@section('title')
Expense  Report ||  {{Session::get('name')}}
@endsection
@section('content')
 <div class="ibox"style="margin-top: 5px;">            
<div class="ibox-head">
<div class="card-body">                                           
<form action="{{url('/expense_report')}}" method="get"> 
          @csrf   
            <div class="row">
                <div class="col-md-6 ">
                    <div class="row">
                    <div class="col-md-3">
                         <select class="form-control" name="expensetype">
                          <option class="form-control" value="1">Salary</option>
                          <option class="form-control" value="2">Purchase</option>
                          <option class="form-control" value="3">Daily Expense</option>
                         </select>
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
        <div class="col-md-12"><h6 class="m-0 font-weight-bold ">Expense Total Report For   @if($todate==0) All @else{{$fromdate}} --- {{$todate}}  @endif </h6></div>      
    </div> 
    </div>
 <div class="card-body">
        <div class="row">
        <div class="col-md-4"></div>      
        <div class="col-md-4">
        <div class="small-box bg-info">
						<div class="inner">
                        	<h4> Total {{$name}}</h4>

							<h2> ৳ {{$result ? $result->total:''}}</h2>						
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
					</div>
                    </div>      
        <div class="col-md-4"></div>      
         </div> 
            </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>
      
    </div>      
</div>
@endsection