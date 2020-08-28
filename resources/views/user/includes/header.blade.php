<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
     <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    {{--<li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> --}}
  </ul>

  <div class="input-group input-group-sm">
       @if (session('add'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Added Successfully</strong>
        </div>
    @endif
       @if (session('update'))
        <div class="alert alert-dismissible alert-info">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Update Successfully</strong>
        </div>
    @endif
        @if (session('delete'))
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Delete Successfully</strong>
        </div>
    @endif
        @if (session('back'))
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Please Pay atmost your Due Payment. </strong>
        </div>
    @endif

        @if (session('change'))
        <div class="alert alert-dismissible alert-info">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Password Change Successfully </strong>
        </div>
    @endif
      @if (session('passs'))
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong> Current Password Wrong  </strong>
        </div>
    @endif
          @if (session('mobil'))
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Wrong Mobile No.</strong>
        </div>
    @endif


       </div>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <?php $result=DB::table('admins')->find(Session::get('ID'));  ?>
        @if($result->image==null)
        <img style="border-radius: 50%; width: 30px;height: 30px; " class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">&nbsp;
        @else
         <img style="border-radius: 50%;width: 30px;height: 30px;" class="img-profile rounded-circle" src="{{asset($result->image)}}">&nbsp;
        @endif


        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('name')}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{url('/profile')}}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" data-toggle="modal"  data-target="#exampleModalCenter_edit222" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Change password 
        </a>
        <a class="dropdown-item" href="Lang/bn">
          <i class="fas fa-bookmark fa-sm fa-fw mr-2 text-gray-400"></i>
          বাংলা
        </a>
      <a class="dropdown-item" href="Lang/en">
          <i class="fa fa-code fa-sm fa-fw mr-2 text-gray-400"></i>
         English
        </a>
       <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/logout')}}" >
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<br>
<br>
