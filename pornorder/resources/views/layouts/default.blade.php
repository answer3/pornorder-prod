<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pornorder</title>

	
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/pornorder.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <nav class="navbar top-nav navbar-inverse" role="navigation">
        <div class="container">
			<div class="col-sm-3 col-xs-12">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand main-link" href="#">PORNORDER</a>
            </div>
			</div>
			<div class="col-sm-6 col-xs-12 search-div collapse navbar-collapse bs-collapse">
			<form class="navbar-form seach-header" role="search">
				<div class="input-group search-header-container">
					<input type="text" id="nav-search-field" class="form-control" placeholder="">
					<span class="input-group-btn">
						<button class="btn btn-default" id="nav-search-button" type="button">Search</button>
					</span>
				</div>
			</form>
			</div>
            <div class="col-sm-3 col-xs-12 login-div collapse navbar-collapse bs-collapse">
				<ul class="nav navbar-nav navbar-right login-list">
					<li><a id="nav-signup" href="#"><span class="glyphicon glyphicon-plus nav-plus-user" aria-hidden="true"></span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Signup</a></li>
					<li><a class="nav-signup-divider" href="#">|</a></li>
					<li><a id="nav-login" href="#">Login <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
				</ul>
				
			</div>
        </div>
    </nav>
	@yield('content')
	<footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Pornorder 2016</p>
                </div>
            </div>
    </footer>
</body>
</html>


