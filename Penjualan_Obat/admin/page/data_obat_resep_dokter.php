	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>Data Obat Dengan Resep</b></li>
      </ol>
	  <!--<a href='index?p=tambah_resep_obat' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>-->
    <?php 
      $sql="select * from resep_obat where jumlah_obat";
      $result= mysql_query($sql)or die(mysql_error());
      while($data=mysql_fetch_array($result)){  
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
         elseif($jumlah_obat<=15){
          ?>
            <script>
            $(document).ready(function(){
              $('#pesan_sedia').css("color","red");
              $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
            });
          </script>
      <?php
        echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok  <a style='color:red'>". $data['nama_obat']."</a> Yang Mencapai Limit Stok . silahkan pesan lagi !!</div>"; 
      }
    }
      ?>
    <?php
      
      $flash="select * from resep_obat where tanggal_kadaluarsa";
      $hasil = mysql_query($flash)or die(mysql_error());
       while($lol=mysql_fetch_array($hasil)){ 
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
      $per_hal=10;
      $jumlah_record=mysql_query("SELECT COUNT(*) from resep_obat");
      $jum=mysql_result($jumlah_record, 0);
      $halaman=ceil($jum / $per_hal);
      $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $per_hal;
      ?>
      <table class="col-md-2">
        <tr>
          <td>Jumlah Record</td>    
          <td><form input="text" readonly="readonly" class="form-control"><?php echo $jum; ?></form></td>
        </tr>

        <tr>
          <td>Jumlah Halaman</td>
          <td><form input="text" readonly="readonly" class="form-control"><?php echo $halaman; ?></form></td>
        </tr>
      </table><br>

      <form action="" method="POST">
        <div class="input-group col-md-5 ">
          <input type="text" class="form-control" name="query" placeholder="Cari barang di sini .." name="cari"/>
         <input type="submit" name="cari" value="Cari">
        </div>
      </form>
      <hr>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Obat Resep</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
        				  <th>Jumlah Obat</th>
        				  
                  <th>Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
        				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
        				  <th>Jumlah Obat</th>
        				 
                  <th>Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
        				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;
        error_reporting(0);
        $query =$_POST['query'];				
        if($query !=''){
          $queryy = mysql_query("SELECT * FROM resep_obat WHERE nama_obat LIKE '%".$query."%' OR id_resep_obat LIKE '%".$query."%' ");
        }else{
           $queryy = mysql_query("SELECT * FROM resep_obat");
        }
			 if(mysql_num_rows($queryy)){
				while($data = mysql_fetch_array($queryy)){
				$id_resep_obat = $data['id_resep_obat'];
				$nama_obat = $data['nama_obat'];
				$suplier = $data['suplier'];
				$harga_suplier = $data['harga_suplier'];
				$harga_jual = $data['harga_jual'];
				$jumlah_obat = $data['jumlah_obat'];
        $jumlah_pemasukan = $data['jumlah_pemasukan'];
        $satuan = $data['satuan'];
				$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $id_resep_obat; ?></td>
                  <td><a href='index?p=kartu_stock_resep&id=<?php echo $id_resep_obat;?>'><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <!--<td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>-->
        				  <td><?php echo $jumlah_obat; ?></td>
                  <td><?php echo $satuan; ?></td>
        				  <td><?php echo $tanggal_kadaluarsa; ?></td>
                  <td><center>
				  <center><a href='index?p=ubah_resep_obat&id=<?php echo $id_resep_obat;?>' class="btn btn-sm btn-success">Ubah</a>&nbsp;<br><br>
				  <a href='index?p=hapus_resep_obat&id=<?php echo $id_resep_obat;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Obat <?php echo $nama_obat;?> ?');" class="btn btn-sm btn-danger">Hapus</a></center>
				  </center></td>
                </tr>
			  <?php
				$no++; 
          }
            }else{
              echo' <tr>
                      <td colspan="10"><center><div class="alert alert-danger" role="alert">Data Tidak Tersedia Silahkan Cek Lagi!</div></center></td>
                    </tr>';
            }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->