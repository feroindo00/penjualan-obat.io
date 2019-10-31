
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
			<img src="../../files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Pasien</b></center><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
				  <th>Resep Pasien</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  	include "../../ctrl/koneksi.php";
				include "../../ctrl/code.php";
				$no = 1;				
				$queryy = "select * from pasien order by id_pasien desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pasien = $data['id_pasien'];
				$nama_pasien = $data['nama_pasien'];
				$alamat_pasien = $data['alamat_pasien'];
				$resep_pasien = $data['resep_pasien'];
			  ?>
                <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $nama_pasien; ?></center></a></td>
				  <td><center><?php echo $alamat_pasien; ?></center></td>
				  <td><center><?php echo nl2br ($resep_pasien); ?></center></td>
                </tr>
                
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
            	 <script type="text/javascript">
      window.print();
    </script>  
			
</html>