<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
    <i class="fas fa-dove"></i>
      <span class="brand-text font-weight-light">Admin Dashboard</span>
      <i class="fas fa-dove"></i>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/dashboard')}}" class="nav-link ">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                Dashboard
              
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              Company
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/user')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-user nav-icon"></i>
                  <p>User</p>                  
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-user-tie nav-icon"></i>
                  <p>Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-users nav-icon"></i>
                <p>Company</p>
                </a>
              </li>
            </ul>
          </li>
  {{-- <li class="nav-header">Report</li> --}}
  {{-- <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-store-alt">  </i>
              <p>
                  {{__('customlang.ReportPaper')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/product')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>{{__('customlang.Today')}}</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>{{__('customlang.Monthly')}}</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>{{__('customlang.Yearly')}}</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>