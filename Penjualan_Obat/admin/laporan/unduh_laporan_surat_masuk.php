<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_surat_masuk_" . date('dmy') . "_" . time() . ".doc";
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
			<center><b>Laporan Surat Masuk</b></center><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Pengirim</th>
				  <th>Perihal</th>
				  <th>Keterangan</th>
				  <th>File</th>
				  <th>Ditambahkan Oleh</th>
				  <th>Ditambahkan Pada</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp order by id_sm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sm = $data['id_sm'];
				  $nomor_sm = $data['nomor_sm'];
				  $tanggal_sm = $data['tanggal_sm'];
				  $tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  			
				  $pengirim_sm = $data['pengirim_sm'];
				  $perihal_sm = $data['perihal_sm'];
				  $keterangan_sm = $data['keterangan_sm'];
				  $file_sm = $data['file_sm'];
				  $admin_input_sm = $data['admin_input_sm'];
				  $tanggal_input_sm = $data['tanggal_input_sm'];
				  $tanggal_input_smm = $hari[date("w", strtotime($tanggal_input_sm))].", ".date("j", strtotime($tanggal_input_sm))." ".$bulan[date("n", strtotime($tanggal_input_sm))]." ".date("Y", strtotime($tanggal_input_sm));						                  			
				  $jam_input_sm = $data['jam_input_sm'];
				  $nama_pp = $data['nama_pp'];
					
				$queryy = mysql_query("SELECT * FROM tb_karyawan WHERE
										 username_k='$admin_input_sm'");
                $dataa  = mysql_fetch_array($queryy);
			      $nama_k = $dataa['nama_k'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></td>
				  <td><?php echo $tanggal_smm; ?></td>
				  <td><?php echo $nama_pp; ?></td>
				  <td><?php echo $perihal_sm; ?></td>
				  <td><?php echo $keterangan_sm; ?></td>
				  <td><?php echo $file_sm; ?></td>
				  <td><?php echo $nama_k; ?></td>
				  <td><?php echo $tanggal_input_smm; ?> ( <?php echo $jam_input_sm; ?> )</td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
			
</html>