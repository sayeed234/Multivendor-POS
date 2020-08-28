@extends('user.master')
@section('title')
Payment View || {{Session::get('name')}}
@endsection
@section('content')
<br>
<section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="invoice p-3 mb-3 col-12">
          <?php   $company=DB::table('admins')->where('id',Session::get('ID'))->first(); ?>
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$company->name}}
                    <small style="font-size:13px;" class="float-right">Order Date: {{$order->date}}<br>Issue Date: <?php $today = date("d-M-Y"); echo $today; ?> <br>Invoice #{{$order->id}} </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  From
                  <address>
                    <strong> @if($company->ownname=='')
                             {{$company->name}}
                             @else
                             {{$company->ownname}}
                            @endif
                     </strong><br>
                    {{$company->address}}<br>
                    Phone: {{$company->mobile}}<br>
                    @if($company->email=='')
                    @else
                    Email:{{$company->email}}
                    @endif
                   
                  </address>
                </div>
               
                <!-- /.col -->
                <div class="col-sm-6 invoice-col">
                  To
                  <address>
                    <strong>{{$customer->name}}</strong><br>
                    {{$customer->address}}<br>
                    Phone:{{$customer->mobile}}<br>

                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Capacity</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $q=1; ?>
                   @foreach($orderdetails as $d)
                    <tr>
                        <td>{{$q++}}</td>
                        <td>{{$d->productname}} <br>@if($d->color=="Default") @else
                         <span style="font-size:13px;">{{$d->color}} </span> @endif </td>
                        <td>{{$d->capacity}}</td>
                        <td>৳ {{$d->price}}</td>
                        <td>{{$d->qty}}</td>
                        <td>৳ {{$d->total}} </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
               
              </div>
           <hr>

              <div class="row">
               @if($order->status=="EMI")
               <p>Your Payment Summery</p><br>
            <div class="col-sm-12 invoice-col table-responsive">
          <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Total Payment</th>
                    <th scope="col">Due</th>
                    <th scope="col">EMI ( {{$order->emi}} % )</th>
                    <th scope="col">Month ( {{$order->month}} )</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>৳ {{$order->subtotal}}</td>
                    <td>৳ {{$order->paytotal}}</td>
                    <td> @if($order->duetotal==0) PAID @else  ৳ {{$order->duetotal}} @endif</td>
                    <td>৳ {{$order->totalemi}}</td>                
                    <td>৳ {{$order->monthpay}}</td>
                    </tr>
                </tbody>
                </table>

          </div>

           <div class="col-md-6  col-12">
              <p>Payment History</p> 
                   <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th>#</th>
                        <th>Payment</th>
                        <th>Date</th>
                      </tr>
                        <?php $a=1; ?>
                 @foreach($payment as $pay)
                      <tr>
                        <td>{{$a++}}</td>
                        <td>৳ {{$pay->payment}}</td>
                        <td> {{$pay->date}}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>

                </div>

          @else
             <div class="col-md-6  col-12">
              <p>Payment History</p> 
                   <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th>#</th>
                        <th>Payment</th>
                        <th>Date</th>
                      </tr>
                        <?php $a=1; ?>
                 @foreach($payment as $pay)
                      <tr>
                        <td>{{$a++}}</td>
                        <td>৳ {{$pay->payment}}</td>
                        <td> {{$pay->date}}</td>
                      </tr>
                      @endforeach
                    </table>
                  </div>

                </div>
                <div class="col-md-6 col-12">
                  <p >Payment Summery</p>

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>৳ {{$order->subtotal}}</td>
                      </tr>
                      <tr>
                        <th>Payment:</th>
                        <td>৳ {{$order->paytotal}}</td>
                      </tr>
                      <tr>
                        <th> @if($order->duetotal==0)  @else  Due Total @endif</th>
                        <td> @if($order->duetotal==0) PAID @else  ৳ {{$order->duetotal}} @endif
                       </td>
                      </tr>
                    </table>
                  </div>
                </div>
            @endif
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 ">
                <div class="row">
                 <div class="col-3">
                <a href="{{url('/pending_payment')}}"><button class="btn btn-danger">Home</button></a>
                     </div>
                      <div class="col-6 ">
                       </div>
                 <div class="col-3 ">
          
                  <form> 
                 <input type="button"  class="btn btn-info" value="Print" 
                    onclick="window.print()" /> 
                     </form>
                 </div>
                </div>
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
