@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row non-mobile-sign-tabs">
			<div class="col-lg-12">
				<h2 class="container-header">
					<span style="float: left;">LOG IN</span>
					<span>OR</span>
					<span style="float: right;">SIGN UP</span>
				</h2>
			</div>
		</div>
		<div class="row mobile-sign-tabs">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mobile-sign-tab-item login-tab active">
				<h2 class="container-header">
					<span>LOG IN</span>
				</h2>
				</div>
			</div>	
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 mobile-sign-tab-item signup-tab">
				<h2 class="container-header">
					<span>SIGN UP</span>
				</h2>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 login-mobile">
				<div class="col-sm-12 col-md-12 col-xs-12 login-form-container">
				<div class="row login-row">
				<div class="col-lg-4 col-sm-5 col-md-5 col-xs-12 login-form-col">
					<form id="login-form">
						<div class="form-group">
							<label for="login-email">Enter Email</label>
							<input type="email" class="form-control" id="login-email" placeholder="">
						</div>
						<div class="form-group">
							<label for="login-password" style="white-space: nowrap;">Enter Password</label>
							<input type="password" class="form-control" id="login-password" placeholder="">
						</div>
					</form>
				</div>
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 login-form-col">
					<p class="login-via">or login via</p>
				</div>
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 login-form-col buttons-col">
					<p><a class="btn btn-default login-button" href="#" role="button">twitter</a></p>
					<p><a class="btn btn-default login-button" href="#" role="button">facebook</a></p>
					<p><a class="btn btn-default login-button" href="#" role="button">google</a></p>
				</div>
				</div>
				<div class="col-sm-4 col-md-2 col-xs-2"></div>
				<div class="col-sm-4 col-md-8 col-xs-8 main-button-col">
					<div class="main-button-container">
						<a class="signin-link" href="#">SIGN ME IN</a>
					</div>
				</div>
				<div class="col-sm-4 col-md-2 col-xs-2"></div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-12 col-md-6 col-xs-12 signup-mobile">
				<div class="col-sm-12 col-md-12 col-xs-12 signup-form-container">
				<form id="signup-form">
					<div class="row">
						<div class="col-sm-6 col-md-6 col-xs-6">
							<div class="form-group">
								<label for="singup-name">Enter Name</label>
								<input type="text" class="form-control" id="signup-name" placeholder="">
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-xs-6">
							<div class="form-group">
								<label for="singup-email">Enter Email</label>
								<input type="email" class="form-control" id="signup-email" placeholder="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12  col-md-12 col-xs-12">
							<div class="form-group">
								<label for="singup-pass">Enter Password</label>
								<input type="password" class="form-control" id="signup-pass" placeholder="">
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-md-2 col-xs-2"></div>
					<div class="col-sm-4 col-md-8 col-xs-8 main-button-col">
						<div class="main-button-container">
							<a class="signup-link" href="#">SIGN ME UP</a>
						</div>
					</div>
					<div class="col-sm-4 col-md-2 col-xs-2"></div>
				</form>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h2 class="container-header" style="float: left;">
					You can CREATE OWN ORDER immadiately.Community will recommend videos you need.
				</h2>
			</div>
		</div>
		<div class="row">
			@include('chunks.login.add_order')
		</div>
	</div>
		@include('elements.right_order_panel')	
	</div>
	<script>
		$('.mobile-sign-tabs .login-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-sign-tabs .signup-tab').removeClass('active')
			$('.login-mobile').show();
			$('.signup-mobile').hide();
		});
		$('.mobile-sign-tabs .signup-tab').click(function(){
			$(this).addClass('active');
			$('.mobile-sign-tabs .login-tab').removeClass('active')
			$('.login-mobile').hide();
			$('.signup-mobile').show();
		});
	</script>
	@endsection

