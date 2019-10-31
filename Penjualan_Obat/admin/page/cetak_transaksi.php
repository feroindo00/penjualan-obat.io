
<?php
  include"../ctrl/koneksi.php";
  $id_jual = $_GET['id'];
  $q=mysqli_query("select * from transaksi_jual where id_jual='$id_jual'");
  $data=mysqli_fetch_array($q);
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
      </div>
      <div class="col-md-4">
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
      $qobt=mysqli_query($con,"SELECT detil_transaksi.*,obat.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat WHERE id_jual='$id_jual'");
      while ($deta=mysqli_fetch_array($qobt)){
    ?>
    <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $deta['kd_obat']?></td>
      <td><?php echo $deta['nama_obat']?></td>
      <td><?php echo $deta['jumlah']?></td>
      <td>Rp. <?php echo $deta['harga_jual']?>,-</td>
      <td>Rp. <?php echo $deta['harga']?>,-</td>
      
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