<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/mydashboard')}}" class="brand-link">
      <span class="brand-text font-weight-light"> <marquee>{{session('name')}}</marquee></span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/mydashboard')}}" class="nav-link ">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                {{__('customlang.dashboard')}}
                
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
              {{__('customlang.company')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/employee')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-user-tie nav-icon"></i>
                  <p>{{__('customlang.employee')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/employee_salary')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-donate nav-icon"></i>
                  <p>{{__('customlang.employeesalary')}}</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/emicustomer')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-users nav-icon"></i>
                  <p>{{__('customlang.Customer')}}</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
               {{__('customlang.Stock')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/newstock')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-clone nav-icon"></i>
                  <p>{{__('customlang.NewStock')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/stock')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-battery-three-quarters nav-icon"></i>
                  <p>{{__('customlang.StockList')}}</p>
                </a>
              </li>
            </ul>
          </li>
   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-object-group"></i>
              <p>
              {{__('customlang.product')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/product_band')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-paw nav-icon"></i>
                  <p>{{__('customlang.Band')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/product')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-cubes nav-icon"></i>
                  <p>{{__('customlang.products')}}</p>
                </a>
              </li>
            </ul>
          </li>
              <li class="nav-item">
                <a href="{{url('/product_view/all')}}" class="nav-link">
                  <i class="fa fa-cart-plus nav-icon"></i>
                  <p>{{__('customlang.productsale')}}</p>
                </a>
        </li>
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
               {{__('customlang.SaleHistory')}}           
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/pending_payment')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-plus-square nav-icon"></i>
                  <p> {{__('customlang.PendingPayment')}}</p>
                </a>
                 <li class="nav-item">
                <a href="{{url('/payment_history')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-server nav-icon"></i>
                  <p>{{__('customlang.PaymentHistory')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/success_sale')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-check nav-icon"></i>
                  <p>{{__('customlang.SuccessSale')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
              {{__('customlang.SuccessSale')}}
             
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/purchase')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-shopping-basket nav-icon"></i>
                  <p>{{__('customlang.Purchase')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/daily_expense')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-american-sign-language-interpreting nav-icon"></i>
                  <p>{{__('customlang.DailyExpense')}}</p>
                </a>
              </li>
            </ul>
          </li>
  <li class="nav-header">{{__('customlang.Report')}}</li>
  <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-store-alt">  </i>
              <p>
                  {{__('customlang.ReportPaper')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{url('/sale_report')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-share-square nav-icon"></i>
                  <p> {{__('customlang.SaleReport')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/product_sale_report')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-hourglass nav-icon"></i>
                  <p>{{__('customlang.ProductSaleReport')}}</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/due_pay_report')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-hourglass-end nav-icon"></i>
                  <p>{{__('customlang.PendingPaymentr')}}</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/expense_report')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-map nav-icon"></i>
                  <p>{{__('customlang.ExpenseReport')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <br>
        <li class="nav-item has-treeview">
            <a href="" class="nav-link" data-widget="pushmenu">
              <i class="nav-icon fa fa-times">  </i>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>