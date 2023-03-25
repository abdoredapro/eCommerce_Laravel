<!DOCTYPE html>
<html lang="en">
  <head>
    {{-- @php
			  $seo = DB::table('seos')->find(1);
		  @endphp --}}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="description" content="{{ $seo->meta_description }}"> --}}
    {{-- <meta name="author" content="{{ $seo->meta_author }}"> --}}
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>eCommerce - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
       <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
     <style>
      .page {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 999;
  width: 100vw;
  height: 100vh;
  background-color: #ffffff7a;
}
.wrapper {
  /* display: none; */
}
     </style>
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	<div class="page">
    <div class="d-flex justify-content-center align-items-center" style="height: 100%">
      <div class="spinner-border text-primary " style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
<div class="wrapper">

  @include('admin.extends.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.extends.sidebar')
  


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  @yield('admin_content')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.extends.footer')

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

  {{-- product Tags  --}}
  <script src="{{ asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js') }}"></script>
  {{-- product Tags  --}}

  {{-- start ck editor  --}}
  <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>	<script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
	<script src="{{ asset('backend/js/pages/editor.js') }}"></script>
  {{-- end ck editor  --}}
	
  <script>
    @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;
    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;
    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;
    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
  </script>
	
@yield('script')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type='text/javascript'>
let load = document.querySelector('.page');
let wrapper = document.querySelector('.wrapper');
window.onload = function () {
  load.style.display= 'none';
  wrapper.style.display= 'block';
}

</script>
<script src="{{ asset('backend/js/main.js')}}"></script>

</body>
</html>
