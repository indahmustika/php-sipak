<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Sistem Informasi PAK</title>	
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header"><center><b>LOGIN DOSEN</b></center></div>
			<div class="card-body">
				<form action="dosen_login_code.php" method="POST">
					<div class="form-group">
						<div class="form-label-group">
							<input type="text" name="nip_dosen" id="nip_dosen" class="form-control" placeholder="NIP" required="required" autofocus="autofocus">
							<label for="nip_dosen">NIP</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input type="password" name="password_dosen" id="password_dosen" class="form-control" placeholder="Password" required="required">
							<label for="password_dosen">Password</label>
						</div>
					</div>
					<input type="submit" name="login" value="Login" class="btn btn-primary btn-block text-light">
				</form>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>