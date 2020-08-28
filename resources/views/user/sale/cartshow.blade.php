@extends('user.master')
@section('title')
Sale Product || {{Session::get('name')}}
@endsection
@section('content')
 <div class="page-content fade-in-up">
<div class="col-md-12">
        <div class="ibox">                  
            <div class="ibox-body">
                <div class="row">
              <div class="table-responsive">
                <table class="table">
                <thead>
                <tr class="btn-info">
                    <th scope="col"># </th>
                    <th scope="col" >Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Update</th>
                    <th scope="col">Total</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                <?php $subtotal=0; ?>
                <?php $total=0; ?>
                @foreach($cartProduct as $cartProduct)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td><b>{{$cartProduct->name}}</b><br>
                      ({{$cartProduct->options->capacity}} )
                    </td>

                    <form action="{{url('/cartupdate')}}">
                          @csrf
                    <td><input type="text"  name="price" value="{{$cartProduct->price}}"style="width:55px;" /></td>                                               
                    <?php
                    $stock=DB::table('stocks')
                          ->where('product_id',$cartProduct->id)
                          ->where('user_id',Session::get('ID'))
                          ->first();  
                         // dd($cartProduct->id);                                  
                    ?>

                  <td> <input type="number" max="{{$stock->stock}}" min="1"  name="qty" value="{{$cartProduct->qty}}"style="width:55px;" /></td>

                <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" />                           
              <td><button class="btn btn-success btn-sm" type="submit" name="btn">Update</button> </td>
                      </form>

                    <td>{{$total=$cartProduct->price*$cartProduct->qty}} TK.</td>
                    <td><a href="{{ url('/deletecart',['rowId'=>$cartProduct->rowId]) }}" onclick="return confirm('Confirm Remove This Product ?');" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>
                <?php $subtotal=$subtotal+$total ?>

                @endforeach
                <tr>
                    <td colspan="5" class="text-right"><b>Subtotal = </b></td>
                    <td colspan="3" class="text-left"><b>{{$subtotal}} TK.</b></td>
                <?php 
                  Session::put('subtotal',$subtotal);
                  ?>
                </tr>
                </tbody>
                </table>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
<hr>
<div class="page-content fade-in-up">
        <div class="col-md-12">
        <div class="col-md-12 text-center">
        <h5><b>Customer Information</b></h5>
        </div>
 <div id="accordion">
  <div class="card">
    <div class="card-header " id="headingOne" data-toggle="collapse" data-target="#collapseOne">
      <h5 class="mb-0">
        <button class="btn btn-link "  aria-expanded="true" aria-controls="collapseOne">
          <b>Regular Sale</b> 
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
          <div class="ibox-body">
                    <form method="POST" action="{{route('sale')}} ">
                    @csrf
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label>Customer Name</label>
                        <input class="form-control " type="text" required  name="name" placeholder="Full Name">
                        <input type="hidden" name="sale" value="1">
                    </div> 
                    <div class="col-sm-4 form-group">
                        <label>Mobile No.</label>
                        <input class="form-control" type="number" name="mobile" required  placeholder="+880">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" required  placeholder="Present Address">
                    </div> 
                    <hr> 
                      <div class="col-sm-3 form-group">
                        <label>Subtotal</label>
                        <input class="form-control" type="text" name="subtotal" value="{{$subtotal}}" readonly >
                    </div> 
                      <div class="col-sm-3 form-group">
                        <label>Payment</label>
                        <input class="form-control" required type="number" max="{{$subtotal}}" min="0" value="0" name="payment"   >
                    </div> 
                    <div class="col-sm-6 form-group text-center">
                    <br> 
                   <button class="btn btn-info"  type="submit">Confirm Sale</button>             
                        </div>
                        </div>
                    </form>
            </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed"  aria-expanded="false" aria-controls="collapseTwo">
         <b>EMI Sale</b>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <div class="ibox-body">
        <form method="POST" action="{{route('sale')}}">
                    @csrf
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label>Customer Name</label>
                        <input class="form-control " type="text" required  name="name" placeholder="Full Name">
                          <input type="hidden" name="sale" value="2">
                    </div> 
                    <div class="col-sm-3 form-group">
                        <label>Mobile No.</label>
                        <input class="form-control" type="number" name="mobile" required  placeholder="+880">
                    </div>
                     <div class="col-sm-3 form-group">
                        <label>NID</label>
                        <input class="form-control" type="number" name="nid" required  placeholder="NID">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" required  placeholder="Present Address">
                    </div> 
                   <div class="col-sm-3 form-group">
                        <label>Nominee Name</label>
                        <input class="form-control " type="text" required  name="nominame" placeholder="Full Name">
                    </div> 
                    <div class="col-sm-3 form-group">
                        <label>Mobile No.</label>
                        <input class="form-control" type="number" required name="nomimobile" required  placeholder="Nominee Mobile no.">
                    </div>
                     <div class="col-sm-3 form-group">
                        <label>NID</label>
                        <input class="form-control" type="number" name="nominid" placeholder=" Nominee  NID">
                    </div>
                    <div class="col-sm-3 form-group">
                        <label>Relation</label><br>
                         <select class="form-control" name="relation" required>
                         <option   value="">Customer Relation</option>
                         <option   value="Father">Father</option>
                         <option   value="Mother">Mother</option>
                         <option   value="Husband">Husband</option>
                         <option   value="Wife">Wife</option>
                         <option   value="Daughter">Daughter</option>
                         <option   value="Son">Son</option>
                         <option   value="Sister">Sister</option>
                         <option   value="Brother">Brother</option>
                         <option   value="Uncle">Uncle</option>
                         <option   value="Aunt">Aunt</option>
                         <option   value="Cousin">Cousin</option>
                         <option   value="Grandmother">Grandmother</option>
                         <option   value="Grandfather">Grandfather</option>
                         <option   value="Partner">Partner</option>
                         <option   value="Family Member">Family Member</option>
                         <option   value="Friend">Friend</option>
                         <option   value="Others">Others</option>
                         </select>
                    </div> 
                      <div class="col-sm-3 form-group">
                        <label>Subtotal</label>
                        <input class="form-control" type="text" name="subtotal" value="{{$subtotal}}" readonly >
                    </div> 
                      <div class="col-sm-3 form-group">
                        <label>Payment</label>
                        <input class="form-control" required type="number" max="{{$subtotal}}" min="0" value="0" name="payment">
                    </div> 
                     <div class="col-sm-3 form-group">
                        <label>EMI % </label>
                        {{-- <input class="form-control"  required type="text" min="2" value="2.5" name="emi"> --}}
                        <input type="text" class="form-control" value="2.5" name="emi"  required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                    </div> 
                     <div class="col-sm-3 form-group">
                        <label>Up To Month</label>
                        <input class="form-control" required type="number" min="2" value="3" name="month">
                    </div> 
                    <div class="col-sm-12 form-group text-center">
                    <br> 
                   <button class="btn btn-info"  type="submit">Confirm Sale</button>             
                        </div>
                        </div>
                    </form>
                </div>
               </div>
            </div>
          </div>
     </div>
     </div>
    </div>
@endsection