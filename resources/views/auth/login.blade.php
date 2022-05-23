<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.7/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container mt-3">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 col-md-offset-4">
				<h4>Login | Custom Auth</h4><hr>
				<form action="{{ route('auth.check') }}" method="post">
				@if(Session::get('fail'))
					<div class="alert alert-danger">
						{{ Session::get('fail') }}
					</div>
				@endif

				{{ csrf_field() }}
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" placeholder="Enter Email Address" value="{{ old('email') }}">
						<span class="text-danger">@error('email'){{ $message }}@enderror</span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter Email Password">
						<span class="text-danger">@error('password'){{ $message }}@enderror</span>
					</div>
					<button type="submit" class="btn btn-block btn-primary">Sign In</button>
					<br>
					<a href="{{ route('auth.register') }}">Register</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>