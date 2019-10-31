

<html lang="en">


			<center>
			<img src="../files/logo.png" /><br>
			Klinik Pengobatan Palembang<br>
			Nomor: 445.2 / 04 / 403.210.2013<br>
			Jl. Dr. Sutomo No. 2A Magetan<br>
			Telp. 0351-7703377
			</center>
			<hr>
			<center><b>Laporan Penjualan</b></center><br>
      <?php 
       $lol = "SELECT tanggal FROM transaksi_jual where id_jual='PJN0001' ";
        $lmao = mysql_query($lol) or die(mysql_error());
         while($lmaoo = mysql_fetch_array($lmao)){ 

          $tangal = $lmaoo['tanggal'];
        }
      $tanggall=date('y-m-d');
      ?>
         <center><b><?php echo $tangal; ?></b>&nbsp;<label> Sampai Periode</label>&nbsp;<b> <?php echo $tanggall; ?></b></center>
       <?php
       if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual where tanggal and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by tanggal desc";
        
      ?>
      <center><b><?php echo $tanggal_awal; ?></b>&nbsp;<label> Sampai Periode</label>&nbsp;<b> <?php echo  $tanggal_akhir; ?></b></center>
        <?php } ?>
            <table class="table table-bordered" border="1">
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
        $pendapatan = 0;
        $no = 1;        
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual order by tanggal asc  ";
         
        if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "SELECT detil_transaksi.*,obat.*,transaksi_jual.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat INNER JOIN transaksi_jual on transaksi_jual.id_jual = detil_transaksi.id_jual where tanggal and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by tanggal desc";
        }
        $sqll = mysql_query($queryy) or die(mysql_error());
        while($data = mysql_fetch_array($sqll)){ 
           $pendapatan += $data['harga'];
        $id = $data['id_jual'];
         $total=$data['total'];
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
                  <td><center><b><?php echo $tanggal; ?></b></center></td>
                  <td><center><?php echo $kd_obat;?></center></td>
                  <td><center><?php echo $nama; ?></a></center></td>
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
       
			 <script type="text/javascript">
      window.print();
    </script>
</html>