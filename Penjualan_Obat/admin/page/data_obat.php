	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>Data Obat Tanpa Resep</b></li>
      </ol>
	  <a href='index?p=tambah_obat' class="btn btn-sm btn-primary" style="width: 100%;">Tambah Data Obat</a><br><br>
    <a href='index?p=data_penerimaan_obat' class="btn btn-sm btn-primary" style="width: 100%;">Penerimaan Obat</a><br><br>
    <?php 
      $sql="select * from obat where jumlah_obat";
      $result= mysqli_query($con,$sql)or die(mysqli_error());
      while($data=mysqli_fetch_array($result)){  
        $jumlah_obat=$data['jumlah_obat'];
        if($jumlah_obat<=1){  
          ?>  
          <script>
            $(document).ready(function(){
              $('#pesan_sedia').css("color","red");
              $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
            });
          </script>
          <?php
          echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok  <a style='color:red'>". $data['nama_obat']."</a> sudah habis . silahkan pesan lagi !!</div>";
        
        }
         elseif($jumlah_obat<=10){
          ?>
            <script>
            $(document).ready(function(){
              $('#pesan_sedia').css("color","red");
              $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
            });
          </script>
      <?php
        echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok  <a style='color:red'>". $data['nama_obat']."</a> Yang Tersisa Sudah Mencapai Limit Stok  . silahkan pesan lagi !!</div>"; 
      }
    }
      ?>
    <?php
      
      $flash="select * from obat where tanggal_kadaluarsa";
      $hasil = mysqli_query($con,$flash)or die(mysqli_error());
       while($lol=mysqli_fetch_array($hasil)){ 
        $tanggal_kadaluarsa = $lol['tanggal_kadaluarsa'];
        $tanggal_sekarang = date('y-m-d');
        $masa= strtotime($tanggal_kadaluarsa)-strtotime($tanggal_sekarang);
      if($masa/(24*60*60)<1){
    ?>
    <script>
       $(document).ready(function(){
       $('#pesan_sedia').css("color","red");
       $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
       });
    </script>
    <?php
    echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok Obat <a style='color:red'>".$lol['nama_obat']."</a> Pada Tanggal <a style='color:red'>".$lol['tanggal_kadaluarsa']."</a>  . sudah melewati tanggal kadaluarsa silahkan pesan lagi !!</div>"; 
   }
 elseif($masa/(24*60*60)<10){
    ?>
     <script>
       $(document).ready(function(){
       $('#pesan_sedia').css("color","red");
       $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
       });
    </script>
    <?php
    echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok Obat <a style='color:red'>".$lol['nama_obat']."</a> Pada Tanggal <a style='color:red'>".$lol['tanggal_kadaluarsa']."</a>  . Hampir mendekati tanggal kadaluarsa silahkan pesan lagi !!</div>"; 
    
   }
 }
 ?>
      <?php 
      //include "../ctrl/koneksi.php";
      $per_hal=10;
      $jumlah_record=mysqli_query($con,"SELECT * from Obat");
      $hasil = mysqli_num_rows($jumlah_record);
      $halaman=ceil($hasil / $per_hal);
      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $per_hal;
      ?>
      <table class="col-md-2">
        <tr>
          <td>Jumlah Record</td>    
          <td><form input="text" readonly="readonly" class="form-control"><?php echo $hasil; ?></form></td>
        </tr>

        <tr>
          <td>Jumlah Halaman</td>
          <td><form input="text" readonly="readonly" class="form-control"><?php echo $halaman; ?></form></td>
        </tr>
      </table><hr>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Obat Tanpa Resep</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
        				  <th>Harga Suplier</th>
        				  <th>Harga Jual</th>
                  <th>Harga Satuan</th>
        				  <th>Jenis Kemasan</th>
                  <th>Jenis Satuan</th>
                  <th>Jumlah Obat</th>
                  <th>Jumlah Per-Satuan</th>
                  <th>Stok Per-Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
        				  <th>Pengaturan</th>
                </tr>
              </thead>
            <tbody>
			  <?php
				$no = 1;				
				$queryy = "SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysqli_fetch_array($sqll)){
				$kd_obat = $data['kd_obat'];
				$nama_obat = $data['nama_obat'];
				$suplier = $data['suplier'];
				$harga_suplier = $data['harga_suplier'];
				$harga_jual = $data['harga_jual'];
        $harga_satuan = $data['harga_satuan'];
				$jumlah_obat = $data['jumlah_obat'];
        $jumlah_pemasukan = $data['jumlah_pemasukan'];
				$id_jenis_obat = $data['id_jenis_obat'];
        $jenis_obat = $data['jenis_obat'];
        $satuan = $data['satuan'];
        $jumlah_per_satuan = $data['jumlah_per_satuan'];
        $stok_per_satuan = $data['stok_per_satuan'];
				$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kd_obat; ?></td>
                  <td><a href='index?p=kartu_stock_obat&id=<?php echo $kd_obat;?>&nama_obat=<?php echo $nama_obat;?>'><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
                  <td><?php echo $harga_satuan; ?></td>
        				  <td><?php echo $jenis_obat; ?></td>
                  <td><?php echo $satuan; ?></td>
                  <td><?php echo $jumlah_obat; ?></td>
                  <td><?php echo $jumlah_per_satuan; ?></td>
                  <td><?php echo $stok_per_satuan; ?></td>
        				  <td><?php echo $tanggal_kadaluarsa; ?></td>
                  <td><center>
				  <center><a href='index?p=ubah_obat&id=<?php echo $kd_obat;?>' class="btn btn-sm btn-success">Ubah</a>&nbsp;<br><br>
				  <a href='index?p=hapus_obat&id=<?php echo $kd_obat;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Obat <?php echo $nama_obat;?> ?');" class="btn btn-sm btn-danger">Hapus</a></center>
				  </center></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->