<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
    <link rel="icon" style="border-radius:50%" href="img/favi.png" type="image/gif" sizes="16x16">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('/admin/plugins/summernote/summernote-bs4.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="page-wrapper">
           @include('user.includes.header')
           @include('user.includes.aside')
         <div class="content-wrapper">
              @yield('content')
        </div>
         @include('user.includes.footer')
    </div>
</div>

<div class="modal fade" id="exampleModalCenter_edit222" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Change Your password </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<form enctype="multipart/form-data" action="{{url('/password/update')}}" method="post" >
        @csrf
         <div class="modal-body">
            <div class="row">
                    <div class="col-sm-12 form-group">
                        <input class="form-control" placeholder="Mobile No." required type="number" name="mobile">
                     </div> 
                      <div class="col-sm-12 form-group">
                        <input class="form-control" placeholder="Current password"  required type="password" name="password">
                     </div> 
                       <div class="col-sm-12 form-group">                   
                         <input class="form-control" placeholder="New password" required  type="password" name="new">
                     </div>                      
                </div>
            </div>
         <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
</div>
</div>
</div>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/admin/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('/admin/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('/admin/dist/js/adminlte.js')}}"></script>
<script src="{{asset('/admin/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>
</html>
