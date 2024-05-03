<br> <br> <br> <br> <br> <br>
<?php  
	include '../config/koneksi.php';//untuk koneksi ke database
	include '../library/fungsi.php';//untuk memasukan library

	session_start();//untuk menampung session
	date_default_timezone_set("Asia/Jakarta"); //untuk mengatur zona waktu

	$aksi = new oop();//untuk memanggil class di library

	//tampung us & pw agar dibaca string bukan syntax
	@$username = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['username']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
	@$password = ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));

	//jika session username petugas tidak kosong, pindah ke halaman utama
	if (@$_SESSION['username_petugas']!="") {
		$aksi->redirect("hal_utama.php?menu=home");
	}

	//jika tekan login maka menjalankan fungsi login dari library 
	if (isset($_POST['login'])) {
		$aksi->login("petugas",$username,$password,"hal_utama.php?menu=home");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>FORM LOGIN PDAM</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<style type="text/css">
  .panel-heading{
    background: #0ab0ff	 !important;
  }
  .panel-body{
	  background: #f7f8f7 !important;
  }
</style>
<body style="background:url('../images/logo_air.png');background-size:cover">
	<div class="container" style="color: black;font-family: Myriad Pro Light">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<!-- judul aplikasi -->
						<div class="panel-heading">
							<div style="margin-top: 5px;margin-bottom: 5px;">
								<img src="../images/logo_pdam2.png" alt="logo" class="logo" width="90px">
							</div>
							<div style="margin-left: 110px; margin-top: -90px; font-size: 120%;">
								S I S T E M &nbsp; L A P O R A N &nbsp; 
								<br>
								P E M B A Y A R A N &nbsp; T A G I H A N &nbsp; A I R 
							</div>
							<div style="margin-left: 110px; font-size: 200%;">
								<strong>FORM LOGIN</strong>
							</div>
						</div>
						<!-- end judul aplikasi -->

						<!-- isi -->
						<div class="panel-body">
							<div class="col-md-12">
								<form method="post">
									<div class="form-group">
										<label>USERNAME</label>
										<input type="text" name="username" class="form-control" placeholder="Masukan username Anda..." required maxlength="30" autocomplete="off">
									</div>
									<div class="form-group">
										<label>PASSWORD</label>
										<input type="password" name="password" class="form-control" placeholder="Masukan password Anda..." required maxlength="30" autocomplete="off">
									</div>
									<div class="form-group">
										<input type="submit" name="login" class="btn btn-primary btn-block btn-lg" value="LOGIN" style="background: #0ab0ff;">
									</div>
								</form>
							</div>
						</div>
						<!-- end isi -->

						<!-- footer -->
						<div class="panel-footer">
							<center>
								<strong>&copy;2024 - Berlianda (<a  href="https://www.instagram.com/">Berlianda</a>)
							</center>
						</div>
						<!-- end footer -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>