<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.1.3/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container mt-3">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 col-md-offset-6">
				<h4>Register | Custom Auth</h4><hr>
				@csrf
				<form action="{{ route('auth.save') }}" method="post">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Enter Email Address">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" placeholder="Enter Email Password">
					</div>
					<button type="submit" class="btn btn-block btn-primary">Sign Up</button>
					<br>
					<a href="{{ route('auth.login') }}">Login</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>