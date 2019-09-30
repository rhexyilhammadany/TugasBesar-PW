<?php 
	// mengaktifkan/memanggil session
	session_start();
	require '../helper/functions.php';


	// apakah sudah login atau belum 
	if(isset($_SESSION["login"])){
		header("Location: index.php");
		exit;
	}

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'"); 

		if( mysqli_num_rows($cek_user) == 1 ){
			$row = mysqli_fetch_assoc($cek_user);
			if(password_verify($password, $row["password"])){
					$_SESSION["login"] = true;
					header("Location: index.php");
			exit;
		}
		
		}
		
		$error = true;
		
	}

 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Halaman Login</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="../assets/css/login.css">
	</head>
	<body>
			<div class="container">
				<div class="kotak">
					<form action="" method="post">
						<h1 style="text-align: center;">Halaman Login</h1>
						
						<div class="col-sm-12">
							<div class="form-group col-lg-12">
								<label for="username"><span class="glyphicon glyphicon-user"></span>Username </label>
								<input type="text" name="username" id="username" class="form-control" placeholder="username" required="" autocomplete="off" autofocus="">
							</div>
							<div class="form-group col-lg-12">
								<label for="password"><span class="glyphicon glyphicon-lock"></span>Password   :</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="password" required="" autocomplete="off">
							</div>
							<div class="form-group col-lg-12">
								<?php if(isset($error)): ?>
		                        <p style="color: red; font-style: italic;">Username / Password anda salah!!!</p>
	                            <?php endif; ?>
							</div>
							<div class="form-group col-lg-10">
								<button type="submit" class="btn btn-primary" style="margin-left:40%" name="login">Login</button>

					</form>
								<a href="../index.php" onclick="return confirm('Anda yakin ingin kembali ?')"><button type="button" class="btn btn-danger">Batal</button></a>
							<div>
								<a href="registrasi.php"><button type="button" class="btn btn-warning" style="margin-top:70px;">Registrasi</button></a>
							</div>
							</div>
							<div class="form-group form-group col-lg-12">
							</div>

						</div>
				</div>
			</div>
		</body>
	</html>