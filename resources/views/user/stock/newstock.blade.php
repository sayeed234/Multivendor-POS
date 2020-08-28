@extends('user.master')
@section('title')
New Stock || {{Session::get('name')}}
@endsection
@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">New Stock</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/newstock/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
             <div class="col-sm-6 form-group">
                <label for="Max Value">Product Name</label>
                  <select class="form-control" name="product_id" required >
                <option class="form-control" Value="">Select Product </option>
                 @foreach($stock as $stock)
                <option class="form-control" Value="{{$stock->id}}">{{$stock->productname}} </option>
                 @endforeach
                </select>
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Qty</label>
                    <input class="form-control" min="1" placeholder="কত পরিমাণ" required type="number" name="qty">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Buy Price </label>
                <input class="form-control"  required type="number" min="1" placeholder="ক্রয় মূল্য" name="buyprice">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Sale price</label>
                    <input class="form-control" required  type="number" placeholder="বিক্রয় মূল্য" min="1" name="saleprice">
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
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">User Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/newstock/update')}}" method="post" >
        @csrf
    <div class="modal-body">
            <div class="row">
                     <div class="col-sm-6 form-group">
                <label for="Max Value">Product Name</label>
                  <select class="form-control product_id" name="product_id" required >
                <option class="form-control" Value="">Select Product </option>
                 @foreach($stockedit as $stocks)
                <option class="form-control" Value="{{$stocks->id}}">{{$stocks->productname}} </option>
                 @endforeach
                </select>
                <input class="cId" type="hidden" name="id" id="id">
            </div> 
            <div class="col-sm-6 form-group">
                    <label for="Max Value">Qty</label>
                    <input class="form-control qty" min="1" placeholder="কত পরিমাণ" required type="number" name="qty">
                </div>
             <div class="col-sm-6 form-group">
                  <label for="Max Value">Buy Price </label>
                <input class="form-control buyprice"  required type="number" min="1" placeholder="ক্রয় মূল্য" name="buyprice">
                </div>
                  <div class="col-sm-6 form-group">
                    <label for="Max Value">Sale price</label>
                    <input class="form-control saleprice" required  type="number" placeholder="বিক্রয় মূল্য" min="1" name="saleprice">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Stock History</h5></div>
     
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                Add Stock                    
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
              <th>Capacity</th>
              <th>Color</th>
              <th>Qty</th>
              <th>Sale Price</th>
              <th>Date</th>
              <th>Image</th>           
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php  $a=1; ?>
          @foreach($result as $result)
          <tr>
          <td>{{$a++}}</td>
          <td>{{$result->productname}}</td>
          <td>{{$result->capacity}}</td>
          <td>{{$result->color}}</td>
          <td>{{$result->qty}}</td>
          <td>{{$result->saleprice}} Tk.</td>
         <td>{{ date('d-M-Y', strtotime($result->updated_at)) }}</td>
        <td><img src="{{asset($result->image)}}"   style="height:50px; width:80px;"></td>

           <td>
            <a href="" onclick= 'edit({{$result->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a>
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
              url:"{{url('newstock/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.product_id').val(response.product_id);
                  $('.cId').val(response.id);
                  $('.qty').val(response.qty);
                  $('.buyprice').val(response.buyprice);
                  $('.saleprice').val(response.saleprice);
                
  
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