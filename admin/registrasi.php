<?php 

	require '../helper/functions.php';

	if( isset($_POST["register"]) ) {
		if(registrasi($_POST) > 0 ) {
			echo "<script>
					alert('User baru berhasil ditambahkan');
					document.location.href = 'login.php';
					</script>";
		}
}

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Halaman Registrasi</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="../assets/css/register.css">
	</head>
	<body>
			<div class="container">
				<div class="kotak">
					<form action="" method="post">
						<h1 style="text-align: center;">Halaman Registrasi</h1>
						
						<div class="col-sm-12">
							<div class="form-group col-lg-12">
								<label for="username"><span class="glyphicon glyphicon-user"></span>Username </label>
								<input type="text" name="username" id="username" class="form-control" placeholder="username" required="" autocomplete="off" autofocus="">
							</div>
							<div class="form-group col-lg-12">
								<label for="password"><span class="glyphicon glyphicon-lock"></span>Password </label>
								<input type="password" name="password1" id="password1" class="form-control" placeholder="password" required="" autocomplete="off">
							<div class="form-group col-lg-12" style="margin-top: 20px; margin-left: -15px; width: 465px;">
								<label for="password"><span class="glyphicon glyphicon-lock"></span>
								Confirm Password</label>
								<input type="password" name="password2" id="password2" class="form-control" placeholder="Confirm Password" required="" autocomplete="off">
							</div>
							<div class="form-group col-lg-10" style="margin-top: 30px;">
							<button type="submit" class="btn btn-primary" style="margin-left:40%" name="register">Registrasi</button>
								<a href="login.php" onclick="return confirm('Anda yakin ingin kembali ?')"><button type="button" class="btn btn-danger">Batal</button></a>
							</div>
							
						</div>
					</form>
				</div>
			</div>
		</body>
	</html>