<!DOCTYPE html>
<html lang="en">
	<head>
		@includeIf('layouts.base.head',$title)
		<!-- basic scripts -->
			@includeIf('layouts.base.script')
	</head>

	<body>
	<div class="navbar navbar-default" id="navbar">
		<script type="text/javascript">
            try{ace.settings.check('navbar' , 'fixed')}catch(e){}
		</script>

		<div class="navbar-container" id="navbar-container">

			@includeIf('layouts.base.navbar',$navbar)

		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container" id="main-container">
		<script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text">adasdasd</span>
			</a>


			<div class="sidebar" id="sidebar">
				@includeIf('layouts.base.sidebar')
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
						@includeIf('layouts.base.breadcrumbs')
					</div>

					<div class="page-content">


						<div class="page-header">
							@section('header')
								@show
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									@section('content')
									@show
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="footer">
							<div class="footer-inner">
								<div class="footer-content">
									@includeIf('layouts.base.footer')
								</div>
							</div>
						</div>
					</div><!-- /.page-content -->

			</div><!-- /.main-content -->
			<div class="ace-settings-container" id="ace-settings-container">
				@includeIf('layouts.base.ace-set')
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	</div>


	</body>
</html>
