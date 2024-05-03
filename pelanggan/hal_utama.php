<br> <br> <br><br>
<?php  
	include '../config/koneksi.php';
	include '../library/fungsi.php';

	session_start();
	date_default_timezone_set("Asia/Jakarta");

	$aksi = new oop();
	if (empty($_SESSION['username_petugas'])) {
		$aksi->alert("Harap Login Dulu !!!","index.php");
	}

	if (isset($_GET['logout'])) {
		unset($_SESSION['username_petugas']);
		unset($_SESSION['id_petugas']);
		unset($_SESSION['nama_petugas']);
		unset($_SESSION['akses_petugas']);
		$aksi->alert("logout Berhasil !!!","index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>BUMDES MBINALUN</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<style type="text/css">
		.navbar-fixed-top{
			background-color: #46add5;
		}
	</style>
 </head>
<link rel="stylesheet" type="text/css"	href="css/style.css">
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="navbar navbar-fixed-top navbar-default">
					<div class="navbar-header">
						<a href="#" class="navbar-brand" style="margin-top: -10px;">
							<img alt="Brand" src="../images/logo_pdam2.png" width="40px">
						</a>
					</div>
					<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right" style="margin-right: 30px;">
						<li class="dropdown">
								<li>
									<a href="?menu=pembayaran"><strong style="color: black;font-family: Myriad Pro Light">CEK TAGIHAN PELANGGAN</strong></a>
								</li>
						</li>
					
				</div>
			</div>
		</div>
	</div>
	<?php  
		switch (@$_GET['menu']) {
			case 'home':include'home.php'; break;
			case 'tarif':include'tarif.php'; break;
			case 'pelanggan':include'pelanggan.php'; break;
			case 'petugas':include'petugas.php'; break;
			case 'agen':include'agen.php'; break;
			case 'penggunaan':include'penggunaan.php'; break;
			case 'tagihan':include'tagihan.php'; break;
			case 'laporan':include'laporan.php'; break;
			case 'riwayat_pembayaran':include'riwayat_pembayaran.php'; break;
			case 'profil':include'profil.php'; break;
			case 'riwayat':include'riwayat.php'; break;
			case 'pembayaran':include'pembayaran.php'; break;
			default:$aksi->redirect("?menu=home");break;
		}
	?>

	<br><br>
	<footer class="container-fluid bg-4 text-center" style="background-color: #fffefe">
		<p>
		  	<strong style="color: black;font-family: Myriad Pro Light">Copyright&nbsp;&copy;&nbsp;2024 <a target="_blank" href="https://www.instagram.com/">Berlianda</a>.</strong>&nbsp;
		  	<br>
		  	
		</p>
	</footer>
	
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript">
		 $("#tbayar").keyup(function(){
		 	var totalakhir = parseInt($("#ttotalakhir").val());
		 	var bayar = parseInt($("#tbayar").val());
		 	var kembalian = 0;
		 	if (bayar < totalakhir) { kembalian="";};
		 	if (bayar > totalakhir) { kembalian = bayar - totalakhir;};
		 	$("#tkembalian").val(kembalian);
		 });

		 // $("#tjumlah").keyup(function(){
		 //   		var harga = parseInt($("#tharga").val());
		 //   		var jumlah = parseInt($("#tjumlah").val());
		 //   		var total = harga * jumlah;
		 //   		$("#ttotal").val(total);
		 //   })
	</script>
</body>
</html>