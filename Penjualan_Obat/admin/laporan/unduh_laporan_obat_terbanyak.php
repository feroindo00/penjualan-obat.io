<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_surat_obat_terbanyak_" . date('dmy') . "_" . time() . ".doc";
header("Content-Type: application/vnd-ms-word");
header("Content-Type: image/jpeg");
header("Content-Disposition: attachment; filename=$fileName");
?>

<html lang="en">

	<head>
	<!-- Bootstrap core CSS-->
	<link href="C:/xampp/htdocs/apotek/Penjualan_Obat/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="C:/xampp/htdocs/apotek/Penjualan_Obat/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Page level plugin CSS-->
	<link href="C:/xampp/htdocs/apotek/Penjualan_Obat/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom styles for this template-->
	<link href="C:/xampp/htdocs/apotek/Penjualan_Obat/css/sb-admin.css" rel="stylesheet">
	</head>


			<center>
			<img src="C:/xampp/htdocs/apotek/Penjualan_Obat/files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Penjualan Paling Banyak</b></center><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
               <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total_harga</th>
                  <th>laba</th>
                </tr>
              </thead>
              
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from transaksi order by jumlah desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select  from transaksi where tanggal NOT IN (0000-00-00) and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by jumlah desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
			while($data = mysql_fetch_array($sqll)){ 
        $id = $data['id'];
        $tanggal = $data['tanggal'];
        $nama = $data['nama'];
        $jumlah = $data['jumlah'];
        $harga = $data['harga'];
        $total_harga = $data ['total_harga'];
        $laba = $data ['laba'];
        $tanggal = $data['tanggal'];
        $tanggall = $hari[date("w", strtotime($tanggal))].", ".date("j", strtotime($tanggal))." ".$bulan[date("n", strtotime($tanggal))]." ".date("Y", strtotime($tanggal));  
			  ?>
                <tr>
                 <td><?php echo $no; ?></td>
                  <td><?php echo $tanggal; ?></td>
                  <td><?php echo $nama; ?></a></td>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo $harga; ?></td>
                  <td><?php echo $total_harga; ?></td>
                  <td><?php echo $laba; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
</html>