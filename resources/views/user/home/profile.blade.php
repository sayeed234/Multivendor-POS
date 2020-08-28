@extends('user.master')
@section('title')
My Profile|| {{Session::get('name')}}
@endsection
@section('content')
<br>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<!-- Profile Image -->
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
            src="{{asset($result->image)}}"
            alt="User profile picture">
    </div>

    <h3 class="profile-username text-center">{{$result->name}}</h3>

    <p class="text-muted text-center">{{$result->mobile}}</p>
    <p class="text-muted text-center" > <span style="color:blue;">Active</span></p>

    <ul class="list-group list-group-unbordered mb-3">
        <li class="list-group-item">
        <b>Email</b> <a class="float-right">{{$result->email}}</a>
        </li>
        <li class="list-group-item">
        <b>NID</b> <a class="float-right">{{$result->nid}}</a>
        </li>
         <li class="list-group-item">
        <b>Last Update</b> <a class="float-right">{{ date('d-M-Y', strtotime($result->updated_at)) }}</a>
        </li>
        <li class="list-group-item">
        <b>Join Date</b> <a class="float-right">{{ date('d-M-Y', strtotime($result->created_at)) }}</a>
        </li>
    </ul>

    <a href="#"  onclick= 'edit({{$result->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit" class="btn btn-primary btn-block"><b>Update</b></a>
    </div>
    <!-- /.card-body -->
</div>
</div>

<div class="col-md-8">
<!-- /.card -->

<!-- About Me Box -->
<div class="card card-primary">
    <div class="card-header">
    <h3 class="card-title">{{$result->ownname}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <strong><i class="fas fa-book mr-1"></i> Education</strong>

    <p class="text-muted">
        {{$result->free1}}
    </p>

    <hr>

    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

    <p class="text-muted">   {{$result->address}}</p>

    <hr>

    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

    <p class="text-muted"> {{$result->free2}}</p>

    <hr>

    <strong><i class="far fa-file-alt mr-1"></i>Hobby</strong>

    <p class="text-muted"> {{$result->free3}}</p>
    <hr>

    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

    <p class="text-muted"> {{$result->discription}}</p>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>

    </div><!-- /.card-body -->
</div>
<!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>


<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Profile Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/profile/update')}}" method="post" >
        @csrf
         <div class="modal-body">
            <div class="row">
                    <div class="col-sm-6 form-group">
                        <label for="Max Value">Company Name</label>
                        <input class="form-control name"  type="text" name="name">
                        <input class="cId" type="hidden" name="id" id="id">
                     </div> 
                      <div class="col-sm-6 form-group">
                        <label for="Max Value">Name</label>
                        <input class="form-control ownname"  type="text" name="ownname">
                     </div> 
                     <div class="col-sm-6 form-group">
                            <label for="Max Value">Email</label>
                            <input class="form-control email" type="email" name="email">
                        </div>
                         <div class="col-sm-6 form-group">
                            <label for="Max Value">Education</label>
                            <input class="form-control free1" type="text" name="free1">
                        </div> 
                        <div class="col-sm-4 form-group">
                            <label for="Max Value">Location</label>
                            <input class="form-control address" type="text" name="address">
                        </div> 
                        <div class="col-sm-4 form-group">
                            <label for="Max Value">Skills</label>
                            <input class="form-control free2" type="text" name="free2">
                        </div>
                         <div class="col-sm-4 form-group">
                            <label for="Max Value">Hobby</label>
                            <input class="form-control free3" type="text" name="free3">
                        </div> 
                        <div class="col-sm-6 form-group">
                            <label for="Max Value">Notes</label>
                            <input class="form-control discription" type="text" name="discription">
                        </div>
                         <div class="col-sm-6 form-group">
                            <label for="Max Value">Photo</label>
                            <input class="form-control image" type="file" name="image">
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
<script>
  function edit(id) {
          var x =id;
          
          $.ajax({
              type:'GET',
              url:"{{url('profile/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.name').val(response.name);
                  $('.cId').val(response.id);
                  $('.email').val(response.email);
                  $('.ownname').val(response.ownname);
                  $('.discription').val(response.discription);
                  $('.free1').val(response.free1);
                  $('.free2').val(response.free2);
                  $('.free3').val(response.free3);
                  $('.address').val(response.address);
                
  
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