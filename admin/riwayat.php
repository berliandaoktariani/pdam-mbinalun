<?php  
	if (!isset($_GET['menu'])) {
		header("location:hal_utama.php?menu=riwayat");
	}

	$cari ="";
	if (isset($_POST['bcari_text'])) {
		$text = $_POST['tcari'];
		$cari = "WHERE id_pelanggan LIKE '%$text%' OR id_pembayaran LIKE '%$text%' OR jumlah_bayar LIKE '%$text%' OR nama_agen LIKE '%$text%' OR tahun_bayar LIKE '%$text%' OR nama_pelanggan LIKE '%$text%' OR bulan_bayar LIKE '%$text%' OR total_akhir LIKE '%$text%' OR bayar LIKE '%$text%' OR kembali LIKE '%$text%' ";
	}

	if (isset($_POST['bcari'])) {
		$bln_cari = $_POST['bulan'];
		$thn_cari = $_POST['tahun'];
		$status = $_POST['laporan'];
		$cari = "WHERE status = '$status' AND bulan = '$bln_cari'  AND tahun = '$thn_cari'";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>RIWAYAT</title>
</head>
<style type="text/css">
  .panel-heading{
    background: #ABD7EB !important;
  }
  .panel-body{
	  background: #f7f8f7 !important;
  }
</style>
<body>
	<div class="container-fluid" style="color: black;font-family: Myriad Pro Light">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						DAFTAR RIWAYAT PEMBAYARAN
					</div>
					<div class="panel-body">
						<div class="col-md-12">
						<form method="post">
							<div class="input-group">
									<input type="text" name="tcari" class="form-control" value="<?php echo @$text ?>" placeholder="Masukan Keyword Pencarian (ID Pembayaran, ID Pelanggan, Bulan[contoh : 01,09,12], Tahun, Nama Pelanggan, Nama )......">
									<div class="input-group-btn">
										<button type="submit" name="bcari" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;CARI</button>
										<button type="submit"  name="brefresh" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>&nbsp;REFRESH</button>
									</div>
								</div>
						</form>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<th>No.</th>
										<th>ID Pembayaran</th>
										<th>ID Pelanggan</th>
										<th>Nama Pelanggan</th>
										<th>Waktu</th>
										<th>Bulan Bayar</th>
										<th><center>Jumlah Bayar</center></th>
										<th><center>Biaya Admin</center></th>
										<th><center>Total Akhir</center></th>
										<th><center>Bayar</center></th>
										<th><center>Kembali</center></th>				
										<th><center>Petugas</center></th>
										<th><center>Cetak<br>Struk</center></th>
									</thead>
									<tbody>
										<?php  
											$no=0;
											$a = $aksi->tampil("qw_pembayaran",$cari,"ORDER BY id_pembayaran ASC");
											if (empty($a)) {
												$aksi->no_record(15);
											}else{
												foreach ($a as $r) {
													$no++; 
										?>	
											<tr>
														<td><?php echo $no; ?>.</td>
														<td><?php echo $r['id_pembayaran']; ?></td>
														<td><?php echo $r['id_pelanggan']; ?></td>
														<td><?php echo $r['nama_pelanggan']; ?></td>
														<td><?php echo $r['waktu_bayar']; ?></td>
														<td><?php $aksi->bulan($r['bulan_bayar']);echo " ".$r['tahun_bayar']; ?></td>
														<td><?php $aksi->rupiah($r['jumlah_bayar']); ?></td>
														<td>Rp. 5.000,-</td>
														<td><?php $aksi->rupiah($r['total_akhir']); ?></td>
														<td><?php $aksi->rupiah($r['bayar']); ?></td>
														<td><?php $aksi->rupiah($r['kembali']); ?></td>
														<td><?php echo $r['nama_petugas']?></td>
														<td><a href="struk.php?id_pelanggan=<?php echo $r['id_pelanggan']; ?>&bulan=<?php echo $r['bulan_bayar']; ?>&tahun=<?php echo $r['tahun_bayar']; ?>" target="_blank" class="btn btn-primary">CETAK</a></td>
													</tr>
										<?php } } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>