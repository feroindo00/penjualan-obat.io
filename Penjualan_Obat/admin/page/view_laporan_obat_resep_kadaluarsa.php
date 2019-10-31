<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Laporan Data Obat Resep Kadaluarsa</li>
      </ol>
   <?php
      $tanggal_sekarang = date('y-m-d');
      $flash="select * from resep_obat where tanggal_kadaluarsa <='$tanggal_sekarang'";
      $hasil = mysqli_query($con,$flash)or die(mysqli_error());
       while($lol=mysqli_fetch_array($hasil)){ 
      if($tanggal_sekarang<=$lol['tanggal_kadaluarsa']){
    ?>
    <script>
       $(document).ready(function(){
       $('#pesan_sedia').css("color","red");
       $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
       });
    </script>
    <?php
     echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok Obat <a style='color:red'>".$lol['nama_obat']."</a> Pada Tanggal <a style='color:red'>".$lol['tanggal_kadaluarsa']."</a>  . sudah melewati tanggal expired silahkan pesan lagi !!</div>"; 
   }
 }
    ?>
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Obat Resep Kadaluarsa</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
                  <th>Harga Suplier</th>
                  <th>Harga Jual</th>
                  <th>Jumlah Obat</th>
                  <th>Jenis Satuan</th>
                  <th>Tanggal Kadaluarsa</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
                  <th>Harga Suplier</th>
                  <th>Harga Jual</th>
                  <th>Jumlah Obat</th>
                  <th>Jenis Satuan</th>
                  <th>Tanggal Kadaluarsa</th>
                  
                </tr>
              </tfoot>
              <tbody>
        <?php
        $no = 1;
        $tanggal_sekarang = date('y-m-d');
               
        $queryy = "SELECT * FROM resep_obat, jenis_obat WHERE
                     resep_obat.id_jenis_obat=jenis_obat.id_jenis_obat and tanggal_kadaluarsa  between '$tanggal_sekarang ' and tanggal_kadaluarsa order by tanggal_kadaluarsa asc ";
        $sqll = mysqli_query($con,$queryy) or die(mysqli_error());
        while($data = mysqli_fetch_array($sqll)){
        $id_resep_obat = $data['id_resep_obat'];
        $nama_obat = $data['nama_obat'];
        $suplier = $data['suplier'];
        $harga_suplier = $data['harga_suplier'];
        $harga_jual = $data['harga_jual'];
        $jumlah_obat = $data['jumlah_obat'];
        $id_jenis_obat = $data['id_jenis_obat'];
        $jenis_obat = $data['jenis_obat'];
        $tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
        ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $id_resep_obat; ?></td>
                  <td><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
                  <td><?php echo $jumlah_obat; ?></td>
                  <td><?php echo $jenis_obat; ?></td>
                  <td><?php echo $tanggal_kadaluarsa; ?></td>
                  
                </tr>
        <?php
        $no++; }
        ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <center><a href='index?p=unduh_laporan_obat_resep_kadaluarsa' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Laporan</a></center><br><br>
    </div>
    <!-- /.container-fluid-->