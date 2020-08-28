@extends('user.master')
@section('title')
Product Sale || {{Session::get('name')}}
@endsection
@section('content')
<div class="card shadow">

   <div class="card-header ">
   <br>
    <div class="row">
      <div class="col-8 col-sm-8 col-md-8 col-lg-10">
      <a href="{{url('/product_view/all')}}"> <button class="btn btn-outline-info">Product List</button></a>
      @foreach($band as $band )
       <a href="{{url('/product_view/'.$band->id)}}"> <button class="btn btn-outline-info">{{$band->bandname}}</button></a>&nbsp;
        @endforeach
    </div> 
    
      <div class="col-4 col-sm-4 col-md-4 col-lg-2">
       @if(Cart::count()==0)
        @else
          <a href="{{url('/cartshow')}}"> <button class="btn btn-outline-success">Checkout</button></a>
        @endif
    </div>
    </div> 
    </div> 

      <div class="card-body">
      <div class="row">

      @foreach($product as $product)
  <div class="col-12 col-sm-12 col-md-6 col-lg-3">
      <div class="card" >
  <img class="card-img-top" src="{{asset($product->image)}}" alt="Card image cap" style="height:150px;width:100%;">
  <div class="card-body">
    <h5 class="card-title"><b>{{$product->productname}}</b></h5>
    <h6 class="card-text">{{$product->capacity}} </h6>
    <h6 class="card-text">Price : {{$product->saleprice}} Tk.</h6>
      <form action="{{ route('cart') }}" method="post">
      <div class="row">
    
             @csrf
        <div class="col-12 col-sm-8 col-md-6 col-lg-7">
              <select class="form-control color" name="color"  >
                <option class="form-control" Value="Default">Default Color</option>
                <option class="form-control" Value="Red">Red</option>
                <option class="form-control" Value="Black">Black</option>
                <option class="form-control" Value="White">White</option>
                <option class="form-control" Value="Yallow">Yallow</option>
                <option class="form-control" Value="Green">Green</option>
                <option class="form-control" Value="Metal">Metal</option>
                <option class="form-control" Value="Orange">Orange</option>
                <option class="form-control" Value="Blue">Blue</option>
                <option class="form-control" Value="Purple">Purple</option>
                <option class="form-control" Value="Brown">Brown</option>
                <option class="form-control" Value="Navy">Navy</option>
                <option class="form-control" Value="Silver">Silver</option>              
                <option class="form-control" Value="Gray">Gray</option>
                </select> 
         </div>  
         <div class="col-12 col-sm-8 col-md-6 col-lg-5">

          
         <input type="hidden" name="id" value="{{$product->id }}"/>
         <input type="hidden" name="qty" value="1"/>

         @if($product->stock==0)
   <input type="submit"  disabled value="Stockout" class="btn btn-danger"/>
         @else
<input type="submit"  value="SALE" class="btn btn-outline-info"/>
         @endif
        

        
         </div>
         
         </div>
 </form>
         </div>
      </div>
    </div>
@endforeach
    </div>
    </div>
    </div>
    </div>
@endsection