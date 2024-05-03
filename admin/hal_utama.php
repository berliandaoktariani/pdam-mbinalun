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
						<a href="?menu=home" class="navbar-brand" style="margin-top: -10px;">
							<img alt="Brand" src="../images/logo_pdam2.png" width="40px">
						</a>
					</div>
					<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="kelola">
								<div class="glyphicon glyphicon-edit" style="color: black"></div>&nbsp;
								<strong style="color: black;font-family: Myriad Pro Light">DATA DASAR</strong>&nbsp;
								<span class="caret" style="color: black"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="kelola">
								<li>
									<a href="?menu=tarif"><strong style="color: black;font-family: Myriad Pro Light">KELOLA TARIF</strong></a>
								</li>
								<li>
									<a href="?menu=pelanggan"><strong style="color: black;font-family: Myriad Pro Light">KELOLA PELANGGAN</strong></a>
								</li>
								<li>
									<a href="?menu=petugas"><strong style="color: black;font-family: Myriad Pro Light">KELOLA PETUGAS</strong></a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="transaksi">
								<div class="glyphicon glyphicon-refresh" style="color: black"></div>&nbsp;
								<strong style="color: black;font-family: Myriad Pro Light">TRANSAKSI</strong>&nbsp;
								<span class="caret" style="color: black"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="transaksi">
								<li>
									<a href="?menu=tagihan"><strong style="color: black;font-family: Myriad Pro Light">DAFTAR TAGIHAN</strong></a>
								</li>
								<li>
									<a href="?menu=penggunaan"><strong style="color: black;font-family: Myriad Pro Light">KELOLA PENGGUNAAN</strong></a>
								</li>
								<li>
									<a href="?menu=riwayat"><strong style="color: black;font-family: Myriad Pro Light">RIWAYAT PEMBAYARAN</strong></a>
								</li>
								<li>
									<a href="?menu=pembayaran"><strong style="color: black;font-family: Myriad Pro Light">KELOLA PEMBAYARAN</strong></a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="laporan">
								<div class="glyphicon glyphicon-duplicate" style="color: black"></div>&nbsp;
								<strong style="color: black;font-family: Myriad Pro Light">LAPORAN</strong>&nbsp;
								<span class="caret" style="color: black"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="laporan">
								<li>
									<a href="?menu=laporan&tarif"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN DATA TARIF</strong></a>
								</li>
								<li>
									<a href="?menu=laporan&pelanggan"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN DATA PELANGGAN</strong></a>
								</li>
								<li><div class="divider"></div></li>
								<li>
									<a href="?menu=laporan&tagihan_bulan"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN TAGIHAN(PERBULAN)</strong></a>
								</li>
								<li>
									<a href="?menu=laporan&tunggakan"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN TUNGGAKAN</strong></a>
								</li>
								<li>
									<a href="?menu=laporan&riwayat_penggunaan"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN RIWAYAT PENGGUNAAN(PERTAHUN)</strong></a>
								</li>
								<li>
									<a href="?menu=riwayat_pembayaran"><strong style="color: black;font-family: Myriad Pro Light">LAPORAN RIWAYAT PEMBAYARAN</strong></a>
								</li>
							</ul>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right" style="margin-right: 50px;">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="akun">
								<div class="glyphicon glyphicon-user" style="color: black"></div>&nbsp;
								<strong style="color: black;font-family: Myriad Pro Light"><?php echo $_SESSION['nama_petugas']; ?></strong>&nbsp;
								<span class="caret" style="color: black"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="akun">
								<li>
									<a href="?menu=profil">
										<div class="glyphicon glyphicon-cog" style="color: black"></div>&nbsp;
										<strong style="color: black;font-family: Myriad Pro Light">PROFIL</strong>
									</a>
								</li>
								<li>
									<a href="?logout" onclick="return confirm('Yakin akan keluar dari aplikasi ini ?')">
										<div class="glyphicon glyphicon-log-out" style="color: black"></div>&nbsp;
										<strong style="color: black;font-family: Myriad Pro Light">KELUAR</strong>
									</a>
								</li>
							</ul>
						</li>
					</ul>
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