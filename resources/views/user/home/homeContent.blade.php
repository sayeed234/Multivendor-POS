@extends('user.master')
@section('title')
{{Session::get('name')}} || My Dashboard
@endsection
@section('content')
<br>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<h3>@if($totalsale->total_sale=='')0000 @else ৳ {{$totalsale->total_sale}}@endif</h3>
							<p>Total Sales</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<h3>@if($totalpayment->total_pay=='')0000 @else ৳ {{$totalpayment->total_pay}} @endif</h3>
							<p>Total Payment</p>
						</div>
						<div class="icon">
							<i class="ion ion-plus"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>@if($totaldue->total_due=='')0000 @else ৳ {{$totaldue->total_due}} @endif</h3>
							<p>Total Due Payment</p>
						</div>
						<div class="icon">
							<i class="ion ion-minus"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>@if($totalemi->total_emi=='')0000 @else ৳ {{$totalemi->total_emi}} @endif</h3>
							<p>Total EMI</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
					</div>
				</div>
			</div>
          <div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<h3>@if($totalpurchase->total_purchase=='')0000 @else ৳ {{$totalpurchase->total_purchase}} @endif</h3>
							<p>Total Purchase</p>
						</div>
						<div class="icon">
							<i class="ion ion-cube"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<h3>@if($totalexpense->total_expense=='') 0000 @else ৳ {{$totalexpense->total_expense}} @endif</h3>
							<p>Total Expense</p>
						</div>
						<div class="icon">
							<i class="ion ion-xbox"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>@if($totalsalary->total_salary=='') 0000 @else ৳ {{$totalsalary->total_salary}}  @endif</h3>
							<p>Total Salary</p>
						</div>
						<div class="icon">
							<i class="ion ion-network"></i>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>@if($qty->qty=='')0000 @else {{$qty->qty}} @endif</h3>
							<p>Total Sales QTY</p>
						</div>
						<div class="icon">
							<i class="ion ion-levels"></i>
						</div>
					</div>
				</div>
			</div>



			<div class="row">
				<section class="col-lg-6 connectedSortable">
				<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						<i class="ion ion-clipboard mr-1"></i>
						Today  List
					</h3>

					<div class="card-tools">

					</div>
				</div>

				<div class="card-body">
					<ul class="todo-list" data-widget="todo-list">
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today  Sales</span>
							<small class="badge badge-success">@if($totalsalet->total_sale=='')0000 @else ৳ {{$totalsalet->total_sale}}@endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Payment</span>
							<small class="badge badge-info">@if($totalpaymentt->total_pay=='')0000 @else ৳ {{$totalpaymentt->total_pay}} @endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Due Payment</span>
							<small class="badge badge-danger">@if($totalduet->total_due=='')0000 @else ৳ {{$totalduet->total_due}} @endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today EMI</span>
							<small class="badge badge-warning">@if($totalemit->total_emi=='')0000 @else ৳ {{$totalemit->total_emi}} @endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Purchase</span>
							<small class="badge badge-info">@if($totalpurchaset->total_purchase=='')0000 @else ৳ {{$totalpurchaset->total_purchase}} @endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Expense</span>
							<small class="badge badge-success">@if($totalexpenset->total_expense=='') 0000 @else ৳ {{$totalexpenset->total_expense}} @endif</small>
						</li>
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Salary</span>
							<small class="badge badge-dark">@if($totalsalaryt->total_salary=='') 0000 @else ৳ {{$totalsalaryt->total_salary}}  @endif</small>
						</li>
							<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">Today Qty Sales</span>
							<small class="badge badge-primary">@if($qtyt->qty=='')0000 @else {{$qtyt->qty}} @endif</small>
						</li>
					</ul>
				</div>
				<div class="card-footer clearfix">
				</div>
			</div>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
								Sales
							</h3>
							<div class="card-tools">
								<ul class="nav nav-pills ml-auto">
									<li class="nav-item">
										<a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
									</li>
								</ul>
							</div>
						</div>


						<div class="card-body">
							<div class="tab-content p-0">
								<div class="chart tab-pane active" id="revenue-chart"
								style="position: relative; height: 300px;">
								<canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
							</div>
							<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
								<canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
							</div>
						</div>
					</div>
				</div>

				<div class="card direct-chat direct-chat-primary">
					<div class="card-header">
						<h3 class="card-title">Direct Chat</h3>
						<div class="card-tools">
							<span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
							data-widget="chat-pane-toggle">
							<i class="fas fa-comments"></i>
						</button>
						<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
						</button>
					</div>
				</div>




				<div class="card-body">
					<div class="direct-chat-messages">
						<div class="direct-chat-msg">
							<div class="direct-chat-infos clearfix">
								<span class="direct-chat-name float-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
							</div>
							<img class="direct-chat-img" src="{{asset('/admin/dist/img/user1-128x128.jpg')}}" alt="message user image">
							<div class="direct-chat-text">
								Is this template really for free? That's unbelievable!
							</div>
						</div>

						<div class="direct-chat-msg right">
							<div class="direct-chat-infos clearfix">
								<span class="direct-chat-name float-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
							</div>
							<img class="direct-chat-img" src="{{asset('/admin/dist/img/user3-128x128.jpg')}}" alt="message user image">
							<div class="direct-chat-text">
								You better believe it!
							</div>
						</div>

						<div class="direct-chat-msg">
							<div class="direct-chat-infos clearfix">
								<span class="direct-chat-name float-left">Alexander Pierce</span>
								<span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
							</div>
							<!-- /.direct-chat-infos -->
							<img class="direct-chat-img" src="{{asset('/admin/dist/img/user1-128x128.jpg')}}" alt="message user image">
							<!-- /.direct-chat-img -->
							<div class="direct-chat-text">
								Working with AdminLTE on a great new app! Wanna join?
							</div>
						</div>
						<div class="direct-chat-msg right">
							<div class="direct-chat-infos clearfix">
								<span class="direct-chat-name float-right">Sarah Bullock</span>
								<span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
							</div>
							<img class="direct-chat-img" src="{{asset('/admin/dist/img/user3-128x128.jpg')}}" alt="message user image">
							<div class="direct-chat-text">
								I would love to.
							</div>
						</div>
					</div>
					<div class="direct-chat-contacts">
						<ul class="contacts-list">
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user1-128x128.jpg')}}">
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Count Dracula
											<small class="contacts-list-date float-right">2/28/2015</small>
										</span>
										<span class="contacts-list-msg">How have you been? I was...</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user7-128x128.jpg')}}">
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Sarah Doe
											<small class="contacts-list-date float-right">2/23/2015</small>
										</span>
										<span class="contacts-list-msg">I will be waiting for...</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user3-128x128.jpg')}}">

									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Nadia Jolie
											<small class="contacts-list-date float-right">2/20/2015</small>
										</span>
										<span class="contacts-list-msg">I'll call you back at...</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user5-128x128.jpg')}}">
									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Nora S. Vans
											<small class="contacts-list-date float-right">2/10/2015</small>
										</span>
										<span class="contacts-list-msg">Where is your new...</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user6-128x128.jpg')}}">

									<div class="contacts-list-info">
										<span class="contacts-list-name">
											John K.
											<small class="contacts-list-date float-right">1/27/2015</small>
										</span>
										<span class="contacts-list-msg">Can I take a look at...</span>
									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<img class="contacts-list-img" src="{{asset('/admin/dist/img/user8-128x128.jpg')}}">

									<div class="contacts-list-info">
										<span class="contacts-list-name">
											Kenneth M.
											<small class="contacts-list-date float-right">1/4/2015</small>
										</span>
										<span class="contacts-list-msg">Never mind I found...</span>
									</div>
								</a>
							</li>

						</ul>

					</div>
				</div>
				<div class="card-footer">
					<form action="#" method="post">
						<div class="input-group">
							<input type="text" name="message" placeholder="Type Message ..." class="form-control">
							<span class="input-group-append">
								<button type="button" class="btn btn-primary">Send</button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</section>

















		<section class="col-lg-6 connectedSortable">

	<div class="card bg-gradient-success">
		<div class="card-header border-0">
			<h3 class="card-title">
				<i class="far fa-calendar-alt"></i>
				Calendar
			</h3>
			<div class="card-tools">
				<div class="btn-group">
					<button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
						<i class="fas fa-bars"></i></button>
						<div class="dropdown-menu float-right" role="menu">
							<a href="#" class="dropdown-item">Add new event</a>
							<a href="#" class="dropdown-item">Clear events</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">View calendar</a>
						</div>
					</div>
					<button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="card-body pt-0">
				<div id="calendar" style="width: 100%"></div>
			</div>
		</div>
				<div class="card">
				<div class="card-header">
					<h3 class="card-title">
						<i class="ion ion-clipboard mr-1"></i>
						Stock List
					</h3>

					<div class="card-tools">

					</div>
				</div>

				<div class="card-body">
					<ul class="todo-list" data-widget="todo-list">
					@foreach($stock as $stock)
						<li>
							<span class="handle">
								<i class="fas fa-ellipsis-v"></i>
								<i class="fas fa-ellipsis-v"></i>
							</span>
							<span class="text">{{$stock->productname}}</span>
							<small class="badge badge-success">{{$stock->stock}}</small>
						</li>
						@endforeach

					</ul>
				</div>
				<div class="card-footer clearfix">

				</div>
			</div>


			<div class="card bg-gradient-primary">
				<div class="card-header border-0">
					<h3 class="card-title">
						<i class="fas fa-map-marker-alt mr-1"></i>
						Visitors
					</h3>
					<div class="card-tools">
						<button type="button"
						class="btn btn-primary btn-sm daterange"
						data-toggle="tooltip"
						title="Date range">
						<i class="far fa-calendar-alt"></i>
					</button>
					<button type="button"
					class="btn btn-primary btn-sm"
					data-card-widget="collapse"
					data-toggle="tooltip"
					title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<div id="world-map" style="height: 250px; width: 100%;"></div>
		</div>
		<div class="card-footer bg-transparent">
			<div class="row">
				<div class="col-4 text-center">
					<div id="sparkline-1"></div>
					<div class="text-white">Visitors</div>
				</div>
				<div class="col-4 text-center">
					<div id="sparkline-2"></div>
					<div class="text-white">Online</div>
				</div>
				<div class="col-4 text-center">
					<div id="sparkline-3"></div>
					<div class="text-white">Sales</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card bg-gradient-info">
		<div class="card-header border-0">
			<h3 class="card-title">
				<i class="fas fa-th mr-1"></i>
				Sales Graph
			</h3>
			<div class="card-tools">
				<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
					<i class="fas fa-times"></i>
				</button>
			</div>
		</div>
		<div class="card-body">
			<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
		</div>
		<div class="card-footer bg-transparent">
			<div class="row">
				<div class="col-4 text-center">
					<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"data-fgColor="#39CCCC">
					<div class="text-white">Mail-Orders</div>
				</div>
				<div class="col-4 text-center">
					<input type="text" class="knob" data-readonly="true" value="90" data-width="60" data-height="60"data-fgColor="#39CCCC">
					<div class="text-white">Online</div>
				</div>
				<div class="col-4 text-center">
					<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
					<div class="text-white">In-Store</div>
				</div>
			</div>
		</div>
	</div>


	</section>





















</div>
</div>
</section>
@endsection