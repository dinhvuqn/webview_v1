<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/ico" href="{!! url('public/webview/assets/images/favicon.ico') !!}" />
    <!-- Vendor styles -->
    <link rel="stylesheet" href="{!! url('public/webview/assets/vendor/fontawesome/css/font-awesome.css') !!}" />
    <link rel="stylesheet" href="{!! url('public/webview/assets/vendor/metisMenu/dist/metisMenu.css') !!}" />
    <link rel="stylesheet" href="{!! url('public/webview/assets/vendor/animate.css/animate.css') !!}" />
    <link rel="stylesheet" href="{!! url('public/webview/assets/vendor/bootstrap/dist/css/bootstrap.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/sweetalert/lib/sweet-alert.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/daterangepicker/daterangepicker.css') !!}" />

    <link rel="stylesheet" href="{!! url('public/webview/assets/vendor/toastr/build/toastr.min.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}" />
	<link rel="stylesheet" href="{!! url('public/webview/assets/vendor/timepicker/jquery.timepicker.css') !!}" />
    <!-- App styles -->
    <link rel="stylesheet" href="{!! url('public/webview/assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') !!}" />
    <link rel="stylesheet" href="{!! url('public/webview/assets/fonts/pe-icon-7-stroke/css/helper.css') !!}" />
    <link rel="stylesheet" href="{!! url('public/webview/assets/styles/style.css?v=2.1') !!}">
    <style>
		blockquote {
			padding: 10px 20px;
    		margin: 0 0 0px;
    		font-size: 15px;
   			border-left: 5px solid #3498DB;
   			font-style: italic;
		}
	</style>
	
</head>
<body>
	<!-- <div class="splash"> 
		<div class="color-line"></div>
		<div class="splash-title">
			<h1>1DG.ME - Buy youtube views</h1><p>Wait for loading. </p><img src="{!! url('public/webview/assets/images/loading-bars.svg') !!}" width="64" height="64" /> 
		</div>
	</div> -->
	<!-- Header -->
	@include('account.templates.elements._header')

	<!-- Navigation -->
	@include('account.templates.elements._menu')
	<!-- Main Wrapper -->
	@yield('content')
	<script>var lock_order = 0;</script>
	<script>
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     		 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      	ga('create', 'UA-66114250-1', 'auto');
      	ga('send', 'pageview');
    </script>
    <div id="fb-root"></div>
    <script>
		(function(d, s, id) {
	 		var js, fjs = d.getElementsByTagName(s)[0];
	  		if (d.getElementById(id)) return;
	  		js = d.createElement(s); js.id = id;
	  		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=188976418188206";
	  		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<script src="{!! url('public/webview/assets/vendor/jquery/dist/jquery.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/jquery-ui/jquery-ui.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/slimScroll/jquery.slimscroll.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/metisMenu/dist/metisMenu.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/iCheck/icheck.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/moment/min/moment.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/sweetalert/lib/sweet-alert.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/toastr/build/toastr.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/datatables/media/js/jquery.dataTables.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/ajaxq/ajaxq.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/countdown/jquery.countdown.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/timepicker/jquery.timepicker.min.js') !!}"></script>
	<script src="{!! url('public/webview/assets/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') !!}"></script>
	<!-- App scripts -->
	
</body>
</html>