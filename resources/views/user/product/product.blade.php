@extends('user.master')
@section('title')
Product List || {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Product Entry</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/product/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
        <div class="col-sm-4 form-group">
                <label for="Max Value">Product Band</label>
                  <select class="form-control" name="productband" required >
                <option class="form-control" Value="">Select Band </option>
                 @foreach($result as $result)
                <option class="form-control" Value="{{$result->id}}">{{$result->bandname}} </option>
                 @endforeach
                </select>
            </div> 

            <div class="col-sm-5 form-group">
                <label for="Max Value">Product Name</label>
                <input class="form-control" required placeholder="পণ্যের নাম" type="text" name="productname">
            </div> 
            <div class="col-sm-3 form-group">
                <label for="Max Value">Color</label>
                  <select class="form-control" name="color" required >
                <option class="form-control" Value="Default">Default</option>
                  <option class="form-control" Value="All Color">All Color</option>
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
            <div class="col-sm-4 form-group">
                    <label for="Max Value">Buy Price</label>
                    <input class="form-control" required placeholder="ক্রয় মূল্য"  type="number" name="buyprice">
                </div>
             <div class="col-sm-4 form-group">
                  <label for="Max Value">Sales Price</label>
                <input class="form-control"  required  placeholder="বিক্রয় মূল্য" type="number" name="saleprice">
                </div>
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Quantity</label>
                    <input class="form-control" placeholder="কত পরিমাণ" required  type="number" name="qty">
                 </div>  
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Capacity</label>
                    <input class="form-control" placeholder="15.5 CFT / 150 CC / 4 64 GB" required  type="text" name="capacity">
                 </div>  
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Size</label>
                    <input class="form-control" placeholder="200 Litres / 135 KG / Nano Titanium Filter"  type="text" name="size">
                 </div> 
                <div class="col-sm-4 form-group">                	
            <label>Photo(Size 200 X 200)</label>
            <input class="form-control" required  type="file" name="image">
        </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-primary" >Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
</div>
</div>
</div>

{{-- Edit slider Modal --}}

<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Product Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/product/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                   <div class="col-sm-4 form-group">
                <label for="Max Value">Product Band</label>
                  <select class="form-control productband" name="productband" required >
                <option class="form-control" Value="">Select Band </option>
                 @foreach($result1 as $res)
                <option class="form-control" Value="{{$res->id}}">{{$res->bandname}} </option>
                 @endforeach
                </select>
                 <input class="cId" type="hidden" name="id" id="id">
            </div> 

            <div class="col-sm-5 form-group">
                <label for="Max Value">Product Name</label>
                <input class="form-control productname" required placeholder="পণ্যের নাম" type="text" name="productname">
            </div> 
            <div class="col-sm-3 form-group">
                <label for="Max Value">Color</label>
                  <select class="form-control color" name="color" required >
                <option class="form-control" Value="Default">Default</option>
                <option class="form-control" Value="All Color">All Color</option>
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
            <div class="col-sm-4 form-group">
                    <label for="Max Value">Buy Price</label>
                    <input class="form-control buyprice" required placeholder="ক্রয় মূল্য"  type="number" name="buyprice">
                </div>
             <div class="col-sm-4 form-group">
                  <label for="Max Value">Sales Price</label>
                <input class="form-control saleprice"  required  placeholder="বিক্রয় মূল্য" type="number" name="saleprice">
                </div>
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Status</label>
                    <select class="form-control status" name="status" required >
                <option class="form-control" Value="1">Active</option>
                <option class="form-control" Value="0">Inactive</option>
                </select>
                 </div>  
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Capacity</label>
                    <input class="form-control capacity" placeholder="15.5 CFT / 150 CC / 4 64 GB" required  type="text" name="capacity">
                 </div>  
                  <div class="col-sm-4 form-group">
                    <label for="Max Value">Size</label>
                    <input class="form-control size" placeholder="200 Litres / 135 KG / Nano Titanium Filter"  type="text" name="size">
                 </div> 
                <div class="col-sm-4 form-group">                	
            <label>Photo(Size 200 X 200)</label>
            <input class="form-control image"  type="file" name="image">
        </div>
                </div>
            </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Product List</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Add Product                   
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Color</th>
              <th>Capacity</th>
              <th>Sale Price</th>
              <th>Photo</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
        <?php  $a=1;?>
          @foreach($product as $pro)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$pro->productname}}</td>
          <td>{{$pro->color}}</td>
          <td>{{$pro->capacity}}</td>
          <td>{{$pro->saleprice}}</td>
          <td><img src="{{asset($pro->image)}}"   style="height:50px; width:80px;"></td>
          <td>@if($pro->status==1)
            <span style="color:blue">Active</span> 
            @else
                <span style="color:red">Inactive</span> 
            @endif
             </td>
          <td>
            <a href="" onclick= 'edit({{$pro->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a>
        </td>
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  
<script>
  function edit(id) {
          var x =id;
          
          $.ajax({
              type:'GET',
              url:"{{url('product/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.productband').val(response.bandid);
                  $('.cId').val(response.id);
                  $('.productname').val(response.productname);
                  $('.color').val(response.color);
                  $('.buyprice').val(response.buyprice);
                  $('.saleprice').val(response.saleprice);
                  $('.status').val(response.status);
                  $('.capacity').val(response.capacity);
                  $('.size').val(response.size);
                
  
              },
              error:function(xhr,status,error){
                  console.log(error);
                  
              }
  
          });
      }
  $(document).ready(function(){
  });   
          
  </script>

@endsection