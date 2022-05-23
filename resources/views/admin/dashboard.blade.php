<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.7/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container mt-3">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 col-md-offset-4">
				<h4>Dashboard</h4><hr>
				<table class="table table-hover">
					<thead>
						<th>Name</th>
						<th>Email</th>
						<th></th>
					</thead>
					<tbody>
						<tr>
							<td>{{ $LoggedUserInfo['name'] }}</td>
							<td>{{ $LoggedUserInfo['email'] }}</td>
							<td><a href="{{ route('auth.logout') }}">Logout</a></td>
						</tr>
					</tbody>
				</table>

				<ul>
					<li><a href="/admin/dashboard">Dashboard</a></li>
					<li><a href="/admin/profile">Profile</a></li>
					<li><a href="/admin/settings">Settings</a></li>
					<li><a href="/admin/staff">Staff</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>