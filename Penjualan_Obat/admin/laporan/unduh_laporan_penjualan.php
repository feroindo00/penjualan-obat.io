<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";

?>

<html lang="en">


			<center>
			<img src="../../files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Penjualan</b></center><br>
      <div class="row">
      <div class="col-md-4">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
          <th>Nama</th>
          <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total_harga</th>
                  
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;		
        $labaaa=0;
				$queryy = "SELECT transaksi.*,obat.*,transaksi_jual.* FROM transaksi INNER JOIN obat ON obat.kd_obat = transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = transaksi.id_jual order by tanggal desc  ";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){
				$id = $data['id_jual'];
        $total=$data['total'];
        $uang = $data['uang'];
        $tanggal = $data['tanggal'];
        $kd_obat = $data['kd_obat'];
        $nama = $data['nama_obat'];
              $jumlah = $data['jumlah'];
            $harga = $data['harga'];
            $total_harga = $data ['harga_jual'];
        $dt=mysql_query("select * from obat where nama_obat='$nama'")or die(mysql_error());
  $dota=mysql_fetch_array($dt);
  $modal=$dota['harga_suplier'];
  $laba=$total-$modal;
  $labaa=$laba*$jumlah;
  $labaaa += $labaa;
      
        
				$eskiel = "select sum(harga) from transaksi";
				$kuer = mysql_query($eskiel);
				$result = mysql_fetch_row($kuer);
				$total = $result[0];
				//$labaa= $result[1];
			  ?>
                <tr>
                 
                  <td><center><?php echo $tanggal;?></center></td>
                  <td><center><?php echo $kd_obat;?><center></td>
                  <td><center><?php echo $nama; ?></center></td>
                  <td><center><?php echo $jumlah; ?></center></td>
                  <td><center><?php echo $total_harga; ?></center></td>
                  <td><center><?php echo $harga; ?></center></td>
                  
                  <!--<td><?php echo $laba; ?></td>!-->
                </tr>

               
			  <?php
				$no++; }
			  ?>	
              </tbody>
              <tr>
                	<td colspan="5"><center>total Penjualan</center></td>
                	
                	<td><center><?php echo $total; ?></center></td>
              </tr>
             <!--<tr>
              		<td colspan="5"><center>Total laba</center></td>
                	<td><?php echo $labaaa; ?></td>
              </tr>!-->
            </table>
          </div>
        </div>
			 <script type="text/javascript">
      window.print();
    </script>
</html>