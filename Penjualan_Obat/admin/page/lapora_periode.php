<center>
      <img src="../files/logo.png" height="100" onClick="javascript:window.print()" /> <br>
      Klinik Pengobatan Palembang<br>
      Nomor: 445.2 / 04 / 403.210.2013<br>
      Jl. Dr. Sutomo No. 2A Magetan<br>
      Telp. 0351-7703377
      </center>
      <b>Laporan Penjualan Per Periode</b><br><br>
<div class="table-responsive">
  <table class="table" >
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
        $pendapatan = 0;
        $labaa = 0;
        $no = 1;        
        $queryy = "select * from transaksi order by id desc";
        
        if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "select * from transaksi where tanggal NOT IN (0000-00-00) and tanggal between '$tanggal_awal' and '$tanggal_akhir' order by id desc";
        }
        
        $sqll = mysql_query($queryy) or die(mysql_error());
        while($data = mysql_fetch_array($sqll)){ 
         $pendapatan += $data['total_harga'];
      $labaa += $data['laba'];
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
    <tr>
                  <td>total Penjualan:</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>Rp.<?php echo number_format($pendapatan) ; ?>,-</td>
              </tr>
              <tr>
                  <td>Total Laba<td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>Rp.<?php echo number_format($labaa) ; ?>,-</td>
              </tr>

  </table>
<img class="responsive" src="../files/btn_print2.png" height="30" onClick="javascript:window.print()" /><br><br> 
</div>