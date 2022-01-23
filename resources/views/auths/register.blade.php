<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/vendor/linearicons/style.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin/assets/img/favicon.png') }}">
</head>

<body>
	<!-- WRAPPER -->
	<div class="col-md-12">
		<div class="box-register">
			<div class="febri">
				<div class="content">
					<div class="header">
						
						<p class="lead" style="text-align: center;">Register Account</p>
					</div>
					
					<form class="form-auth-small" method="POST" action="{{ route('register') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="signin-email" class="control-label sr-only">Nama</label>
							<input type="text" name="name" class="form-control" id="signin-email"  placeholder="Nama" value="{{ old('name') }}">
						</div>
						<div class="form-group">
							<label for="signin-email" class="control-label sr-only">Email</label>
							<input type="email" name="email" class="form-control" id="signin-email" placeholder="Email" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<label for="signin-password" class="control-label sr-only">Password</label>
							<input type="password" name="password" class="form-control" id="signin-password"  placeholder="Password">
						</div>
						<div class="form-group">
							<label for="signin-password" class="control-label sr-only">Password Confirmation</label>
							<input type="password" name="password_confirmation" class="form-control" id="signin-password"  placeholder="Password Confirmation">
						</div>
						
						<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- END WRAPPER -->
</body>

</html>
