

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
			<img src="../files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Penjualan Paling Banyak</b></center><br>
       <?php
       if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual where tanggal and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by tanggal desc";
        
      ?>
      <center><b><?php echo $tanggal_awal; ?></b>&nbsp;<label> Sampai Periode</label>&nbsp;<b> <?php echo  $tanggal_akhir; ?></b></center>
        <?php } ?>
            <table class="table table-bordered"  border="1">
               <thead>
                <tr>
                  <th><center>Nomor</center></th>
                  <th><center>Tanggal</center></th>
                  <th><center>Kode Barang</center></th>
                  <th><center>Nama</center></th>
                  <th><center>Jumlah</center></th>
                  <th><center>Harga</center></th>
                  <th><center>Total_harga</center></th>
                  
                </tr>
              </thead>
              
              <tbody>
			  <?php
				$no = 1;        
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual order by jumlah desc  ";
         
        if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual where tanggal and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by jumlah desc";
        }
        $sqll = mysql_query($queryy) or die(mysql_error());
        while($data = mysql_fetch_array($sqll)){ 
        $id = $data['id_jual'];
        $tanggal = $data['tanggal'];
        $kd_obat = $data['kd_obat'];
        $nama = $data['nama_obat'];
              $jumlah = $data['jumlah'];
            $harga = $data['harga'];
            $total_harga = $data ['harga_jual'];
            //$laba = $data ['laba'];
        $tanggal = $data['tanggal'];
        $tanggall = $hari[date("w", strtotime($tanggal))].", ".date("j", strtotime($tanggal))." ".$bulan[date("n", strtotime($tanggal))]." ".date("Y", strtotime($tanggal));
			   
				$eskiel = "select sum(harga) from detil_transaksi";
				$kuer = mysql_query($eskiel);
				$result = mysql_fetch_row($kuer);
				$total = $result[0];
			  ?>
                 <tr>
                  <td><center><?php echo $no; ?></center></td>
                  <td><center><?php echo $tanggal; ?></center></td>
                  <td><center><?php echo $kd_obat;?></center></td>
                  <td><center><?php echo $nama; ?></center></td>
                  <td><center><b><?php echo $jumlah; ?></b></center></td>
                  <td><center><?php echo $harga; ?></center></td>
                  <td><center><?php echo $total_harga; ?></center></td>
                  <!--<td><?php echo $laba; ?></td>!-->
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
               <tr>
                	<td colspan="6"><center>total Penjualan</center></td>
                	
                	<td><center><?php echo $total; ?></center></td>
              </tr>
            </table>
            <script type="text/javascript">
      window.print();
    </script>
</html>