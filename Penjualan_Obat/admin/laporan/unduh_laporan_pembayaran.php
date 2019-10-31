<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_pembayaran_" . date('dmy') . "_" . time() . ".doc";
header("Content-Type: application/vnd-ms-word");
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=$fileName");
?>

<html lang="en">

<head>
<!-- Bootstrap core CSS-->
<link href="C:/xampp/htdocs/surat/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="C:/xampp/htdocs/surat/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<link href="C:/xampp/htdocs/surat/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="C:/xampp/htdocs/surat/css/sb-admin.css" rel="stylesheet">
</head>

			<center>
			<img src="C:/xampp/htdocs/surat/files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Pembayaran</b></center><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_pemeriksaan, tb_pasien where tb_pemeriksaan.id_p_pks=tb_pasien.id_p and status_pks=1 order by id_pks desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pks = $data['id_pks'];
				$id_p = $data['id_p'];
				$nama_p = $data['nama_p'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_pasien&id=<?php echo $id_p;?>'><?php echo $nama_p; ?></a></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
			
</html>