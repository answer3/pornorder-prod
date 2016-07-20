@extends('layouts.default')
@section('content')

    <!-- Page Content -->
    <div class="container page-container">
	<div class="item-container col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
			<div class="col-lg-12">
				<h2 class="container-header">
					<span style="float: left;">SIGN UP</span>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="col-sm-12 col-md-12 col-xs-12 login-form-container">
				<form id="register-form" class="dropzone">
					<div class="row">
					<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<label for="register-email">Enter Email</label>
							<input type="email" class="form-control" id="register-email" placeholder="">
						</div>
						<div class="form-group">
							<label for="register-password" style="white-space: nowrap;">Enter Password</label>
							<input type="password" class="form-control" id="register-password" placeholder="">
						</div>	
					</div>
					<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
						<div class="form-group">
							<label for="register-name">Enter Name</label>
							<input type="text" class="form-control" id="register-name" placeholder="">
						</div>
						<div class="form-group">
							<label for="register-tags" style="white-space: nowrap;">Enter tags</label>
							<input type="text" class="form-control" id="register-tags" placeholder="">
							<script>
								$('#register-tags').tokenfield({
									autocomplete: {
										source: ['tag1','tag2','tag3','tag4'],
										delay: 100
									},
									showAutocompleteOnFocus: true
								});
							</script>
						</div>	
					</div>
					<div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
						<div class="row login-row">
							<div class="col-sm-5 col-md-5 col-xs-12 login-form-col buttons-col">
								<p>
									<label>&nbsp;</label>
									<a class="btn btn-default login-button" href="#" role="button">select avatar</a>
								</p>
								<p>
									<label>&nbsp;</label>
									<a class="btn btn-default login-button" href="#" role="button">upload</a>
								</p>
							</div>
							<div class="col-sm-1 col-md-1 col-xs-1 login-form-col">
								<p class="login-via">or</p>
							</div>
							<div class="col-sm-5 col-md-5 col-xs-12 login-form-col signup-avatar-container">
								<div class="avatar-holder">
								<p>drag and<br>drop here</p>
								<!--<input type="file" name="file" id="avatar">-->
								</div>
							</div>
							<script>
								/*$("div.avatar-holder").dropzone({ url: "/file/post" });*/
							</script>
						</div>	
					</div>	
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-xs-12">
							<p>or login via</p>
						</div>
						<div class="col-sm-12 col-md-8 col-xs-12" style="padding-left: 0">			
							<div class="col-sm-3 col-md-3 col-xs-12">
								<p><a class="btn btn-default login-button" href="#" role="button">twitter</a></p>
							</div>
							<div class="col-sm-3 col-md-3 col-xs-12">
								<p><a class="btn btn-default login-button" href="#" role="button">facebook</a></p>
							</div>
							<div class="col-sm-3 col-md-3 col-xs-12">
								<p><a class="btn btn-default login-button" href="#" role="button">google</a></p>
							</div>				
						</div>
						<div class="col-sm-12 col-md-4 col-xs-12" style="padding-left: 0">
							<div class="main-button-container register-link-container">
								<a class="register-link" href="#">SIGN ME UP</a>
							</div>
						</div>
					</div>
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
	@endsection

