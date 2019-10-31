
<?php
  $id_jual = $_GET['id'];
  $q=mysql_query("select * from transaksi_jual where id_jual='$id_jual'");
  $data=mysql_fetch_array($q);
?>
 <center>
      <img src="../files/logo.png" height="70" /> <br>
      Klinik Pengobatan Palembang<br>
      Nomor: 445.2 / 04 / 403.210.2013<br>
      Jl. Dr. Sutomo No. 2A Magetan<br>
      Telp. 0351-7703377
</center><br><br>
<center><div class="row">
      <div class="col-md-4">
        <table class="table table-condensed">
          <tr>
            <th>Kode Penjualan</th><td><?php echo $data['id_jual'];?></td>
          </tr>
          <tr>
            <th>Tanggal</th><td><?php echo $data['tanggal'];?></td> 
          </tr>
        </table>
      </div><br><br>
      
      <div class="col-md-2">
        <table class="table table-condensed">
          <tr>
            <th>Total Harga</th><td>Rp.<?php echo number_format($data['total'],2);?></td>
          </tr>
          <tr>
            <th>Pembayaran</th><td>Rp.<?php echo number_format($data['uang'],2);?></td>
          </tr>
          <tr>
            <th>Kembalian</th><td>Rp.<?php echo number_format( $data['kembali'],2);?></td>
          </tr>
        </table>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-10">
      <div class="table-responsive">
      <table class="table table-bordered" >
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama</th>
      <th>Jumlah</th>
      <th>harga</th>
      <th>jumlah harga</th>
      
    </tr>
    <?php
    $no = 1;
      $ob=mysql_query("SELECT detil_transaksi.*,obat.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat WHERE id_jual='$id_jual'");
      while ($dt=mysql_fetch_array($ob)){
    ?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $dt['kd_obat']?></td>
      <td><?php echo $dt['nama_obat']?></td>
      <td><?php echo $dt['jumlah']?></td>
      <td>Rp. <?php echo $dt['harga_jual']?>,-</td>
      <td>Rp. <?php echo $dt['harga']?>,-</td>
      
    </tr>
  <?php } ?>
    <tr>
      <th class="text-right" colspan="5">Total Harga</th>
      <td>Rp.<?php echo number_format($data['total'],2);?></td>
    </tr>
  </table>
</div>
    
    </div>
</div></center>
    <script type="text/javascript">
      window.print();
    </script>