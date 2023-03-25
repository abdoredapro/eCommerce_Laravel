@php
	$prefix = Request::route()->getPrefix();

	$route = Route::current()->getName();


@endphp




<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>eCommerce</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard') ? 'active' : ''}}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  

		<li class="treeview {{($prefix == 'users') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="message-circle"></i>
			  <span>Manage User</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'all.user') ? 'active' : ''}}">
				  <a href="{{ route('all.user') }}">
				  <i class="ti-more"></i>All User</a>
			  </li>
			</ul>
		  </li> 


		  <li class="treeview {{($prefix == 'review') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="message-circle"></i>
			  <span>Manage Review</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'manage.review') ? 'active' : ''}}">
				  <a href="{{ route('manage.review') }}">
				  <i class="ti-more"></i>Pending Review</a>
			  </li>

			  
			</ul>
		  </li> 



		
        <li class="treeview {{($prefix == 'brand') ? 'active' : ''}}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'brand.view') ? 'active' : ''}}">
				<a href="{{ route('brand.view') }}">
				<i class="ti-more"></i>All Brands</a>
			</li>
            

			
          </ul>
        </li> 
		  
        <li class="treeview {{($prefix == 'category') ? 'active' : ''}}">
          <a href="#">
            <i data-feather="mail"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'admin.category.view') ? 'active' : ''}}">
				<a href="{{ route('admin.category.view') }}"><i class="ti-more"></i>All Category</a>
			</li>

			<li class="{{($route == 'admin.subCategory.view') ? 'active' : ''}}">
				<a href="{{ route('admin.subCategory.view') }}"><i class="ti-more"></i>All SubCategory</a>
			</li>


			<li class="{{($route == 'sub_subCategory.view') ? 'active' : ''}}">
				<a href="{{ route('sub_subCategory.view') }}"><i class="ti-more"></i>All Sub SubCategory</a>
			</li>


          </ul>
        </li>
		

		<li class="treeview {{($prefix == 'product') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Products</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'add.product') ? 'active' : ''}}">
				  <a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Product</a>
			  </li>
  
			  <li class="{{($route == 'manage.product') ? 'active' : ''}}">
				  <a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a>
			  </li>

			</ul>
        </li>
  


			  
		<li class="treeview {{($prefix == 'slider') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Sliders</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'manage.slider') ? 'active' : ''}}">
				  <a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a>
			  </li>
  
  
			</ul>
		  </li>



		  <li class="treeview {{($prefix == 'coupon') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Coupon</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'manage.coupon') ? 'active' : ''}}">
				  <a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a>
			  </li>
  
			</ul>
		  </li>


		  <li class="treeview {{($prefix == 'shipping') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Shipping Area</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'manage.division') ? 'active' : ''}}">
				  <a href="{{ route('manage.division') }}"><i class="ti-more"></i>Manage Division</a>
			  </li>

			  <li class="{{($route == 'manage.district') ? 'active' : ''}}">
				<a href="{{ route('manage.district') }}"><i class="ti-more"></i>Manage District</a>
			  </li>

			  <li class="{{($route == 'manage.state') ? 'active' : ''}}">
				<a href="{{ route('manage.state') }}"><i class="ti-more"></i>Manage State</a>
			  </li>
  
			</ul>
		  </li>


		  <li class="treeview {{($prefix == 'return') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Return Order</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'manage.return_order') ? 'active' : ''}}">
				  <a href="{{ route('manage.return_order') }}"><i class="ti-more"></i>Return Order</a>
			  </li>

			  <li class="{{($route == 'manage.all.order') ? 'active' : ''}}">
				<a href="{{ route('manage.all.order') }}"><i class="ti-more"></i>All Order</a>
			  </li>

			</ul>
		  </li>



		  <li class="treeview {{($prefix == 'stock') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Manage Stock</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">

			  <li class="{{($route == 'product.stock') ? 'active' : ''}}">
				  <a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a>
			  </li>

			
			</ul>
		  </li>




		 
        <li class="header nav-small-cap">User Interface</li>

		<li class="treeview {{($prefix == 'orders') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Orders</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>
			<ul class="treeview-menu">
			  <li class="{{($route == 'pending.order') ? 'active' : ''}}">
				  <a href="{{ route('pending.order') }}"><i class="ti-more"></i>Pending Order</a>
			  </li>

			  <li class="{{($route == 'confirmed.order') ? 'active' : ''}}">
				<a href="{{ route('confirmed.order') }}"><i class="ti-more"></i>Confirmed Order</a>
			</li>

			<li class="{{($route == 'processing.order') ? 'active' : ''}}">
				<a href="{{ route('processing.order') }}"><i class="ti-more"></i>Processing Order</a>
			</li>

			<li class="{{($route == 'picked.order') ? 'active' : ''}}">
				<a href="{{ route('picked.order') }}"><i class="ti-more"></i>Picked Order</a>
			</li>

			<li class="{{($route == 'shipped.order') ? 'active' : ''}}">
				<a href="{{ route('shipped.order') }}"><i class="ti-more"></i>Shipped Order</a>
			</li>

			<li class="{{($route == 'delivered.order') ? 'active' : ''}}">
				<a href="{{ route('delivered.order') }}"><i class="ti-more"></i>Delivered Order</a>
			</li>

			<li class="{{($route == 'cancel.order') ? 'active' : ''}}">
				<a href="{{ route('cancel.order') }}"><i class="ti-more"></i>Cancel Order</a>
			</li>

			</ul>
		  </li>


		  <li class="treeview {{($prefix == 'reports') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Reports</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>

			<ul class="treeview-menu">
			  <li class="{{($route == 'all.reports') ? 'active' : ''}}">
				<a href="{{ route('all.reports') }}"><i class="ti-more"></i>All Reports</a>
			  </li>

			</ul>
		  </li>


		  <li class="treeview {{($prefix == 'reports') ? 'active' : ''}}">
			<a href="#">
			  <i data-feather="mail"></i> <span>Site setting</span>
			  <span class="pull-right-container">
				<i class="fa fa-angle-right pull-right"></i>
			  </span>
			</a>

			<ul class="treeview-menu">
			  <li class="{{($route == 'site.setting.manage') ? 'active' : ''}}">
				<a href="{{ route('site.setting.manage') }}"><i class="ti-more"></i>Manage Site</a>
			  </li>

			  <li class="{{($route == 'seo.setting.manage') ? 'active' : ''}}">
				<a href="{{ route('seo.setting.manage') }}"><i class="ti-more"></i>Seo Setting</a>
			  </li>

			</ul>
		  </li>


		  
		<li class="header nav-small-cap">EXTRA</li>		  
		  
       
		<li>
          <a href="auth_login.html">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>

  




  <aside class="control-sidebar">
	  
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>  <!-- Create the tabs -->
    <ul class="nav nav-tabs control-sidebar-tabs">
      <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active">Chat</a></li>
      <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab">Todo</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
		  <div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
		  </div>
          <div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>			
			
			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-success" href="#">
				<img src="../images/avatar/1.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
				  <span>Just now</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-danger" href="#">
				<img src="../images/avatar/2.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
				  <span>33 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-warning" href="#">
				<img src="../images/avatar/3.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>

			<div class="media py-10 px-0">
			  <a class="avatar avatar-lg status-primary" href="#">
				<img src="../images/avatar/4.jpg" alt="...">
			  </a>
			  <div class="media-body">
				<p class="font-size-16">
				  <a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
				  <span>42 min ago</span>
			  </div>
			</div>
			  
		  </div>

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
          <div class="flexbox">
			<a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
		  </div>
        <ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_1" class="filled-in">
			  <label for="basic_checkbox_1" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_2" class="filled-in">
			  <label for="basic_checkbox_2" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_3" class="filled-in">
			  <label for="basic_checkbox_3" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_4" class="filled-in">
			  <label for="basic_checkbox_4" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_5" class="filled-in">
			  <label for="basic_checkbox_5" class="mb-0 h-15"></label>
			  <span class="text-line">Maecenas scelerisque</span>
			  <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_6" class="filled-in">
			  <label for="basic_checkbox_6" class="mb-0 h-15"></label>
			  <span class="text-line">Vivamus nec orci</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_7" class="filled-in">
			  <label for="basic_checkbox_7" class="mb-0 h-15"></label>
			  <!-- todo text -->
			  <span class="text-line">Nulla vitae purus</span>
			  <!-- Emphasis label -->
			  <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
			  <!-- General tools such as edit or delete-->
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_8" class="filled-in">
			  <label for="basic_checkbox_8" class="mb-0 h-15"></label>
			  <span class="text-line">Phasellus interdum</span>
			  <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5 by-1">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_9" class="filled-in">
			  <label for="basic_checkbox_9" class="mb-0 h-15"></label>
			  <span class="text-line">Quisque sodales</span>
			  <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
			<li class="py-15 px-5">
			  <!-- checkbox -->
			  <input type="checkbox" id="basic_checkbox_10" class="filled-in">
			  <label for="basic_checkbox_10" class="mb-0 h-15"></label>
			  <span class="text-line">Proin nec mi porta</span>
			  <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
			  <div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
			  </div>
			</li>
		  </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>