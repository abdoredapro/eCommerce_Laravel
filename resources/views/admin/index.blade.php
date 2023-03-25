@extends('admin.master')
@section('admin_content')
<div class="container-full">


	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xl-3 col-6">
				<div class="box overflow-hidden pull-up">
					<div class="box-body">							
						<div class="icon bg-primary-light rounded w-60 h-60">
							<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
						</div>
						<div>
							@php
							$date = Carbon\Carbon::now()->format('d F Y');
							$today = DB::table('orders')->where('order_date', $date)->sum('amount');
							$month = date('F');
							$monthlyEarn = DB::table('orders')->where('order_month', $month)->sum('amount');

							$year = date('Y');
							$yearEarn = DB::table('orders')->where('order_year', $year)->sum('amount');

							$pendingOrder = DB::table('orders')->where('status', 'Pending')->get();
							@endphp
							<p class="text-mute mt-20 mb-0 font-size-16">Tody's earning</p>
							<h3 class="text-white mb-0 font-weight-500">${{ $today }} <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-6">
				<div class="box overflow-hidden pull-up">
					<div class="box-body">							
						<div class="icon bg-warning-light rounded w-60 h-60">
							<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
						</div>
						<div>
							<p class="text-mute mt-20 mb-0 font-size-16">Monthly Sale</p>
							<h3 class="text-white mb-0 font-weight-500">${{ $monthlyEarn }} <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-6">
				<div class="box overflow-hidden pull-up">
					<div class="box-body">							
						<div class="icon bg-info-light rounded w-60 h-60">
							<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
						</div>
						<div>
							<p class="text-mute mt-20 mb-0 font-size-16">Yearly Sale</p>
							<h3 class="text-white mb-0 font-weight-500">${{ $yearEarn }} <small class="text-danger"><i class="fa fa-caret-down"></i> -0.5%</small></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-6">
				<div class="box overflow-hidden pull-up">
					<div class="box-body">							
						<div class="icon bg-danger-light rounded w-60 h-60">
							<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
						</div>
						<div>
							<p class="text-mute mt-20 mb-0 font-size-16">Pending order</p>
							<h3 class="text-white mb-0 font-weight-500">{{ count($pendingOrder) }} <small class="text-danger"><i class="fa fa-caret-up"></i> -1.5%</small></h3>
						</div>
					</div>
				</div>
			</div>

			
			
			
			
			<div class="col-12">
				<div class="box">
					<div class="box-header">
						<h4 class="box-title align-items-start flex-column">
							ٌRecent All Order
							
						</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table no-border">
								<thead>
									<tr class="text-uppercase bg-lightest">
										<th style="min-width: 250px"><span class="text-white">Date</span></th>
										<th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
										<th style="min-width: 100px"><span class="text-fade">Amount</span></th>
										<th style="min-width: 150px"><span class="text-fade">Payment</span></th>
										<th style="min-width: 130px"><span class="text-fade">status</span></th>
										<th style="min-width: 120px"></th>
									</tr>
								</thead>
								<tbody>

									@php
										$orders = DB::table('orders')->where('status', 'Pending')->get();
									@endphp

									@foreach ($orders as $order)
										
									

									<tr>										
										<td class="pl-0 py-8">
											<div class="d-flex align-items-center">
												<div class="flex-shrink-0 mr-20">
													
												</div>

												<div>
													<a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ Carbon\Carbon::parse($order->order_date)->diffForHumans() }}</a>
												</div>
											</div>
										</td>
										<td>
											<span class="text-white font-weight-600 d-block font-size-16">
												{{ $order->invoice_no }}
											</span>
										</td>
										<td>
											
											<span class="text-white font-weight-600 d-block font-size-16">
												{{ $order->amount }}
											</span>
										</td>
										<td>
											
											<span class="text-white font-weight-600 d-block font-size-16">
												{{ $order->payment_method }}
											</span>
										</td>
										<td>
											<span class="badge badge-primary-light badge-lg">{{ $order->status }}</span>
										</td>
										<td class="text-right">
											<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-bookmark-plus"></span></a>
											<a href="#" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>  
			</div>
		</div>
	</section>
	<!-- /.content -->
  </div>


@endsection