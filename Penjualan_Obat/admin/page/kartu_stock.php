          <?php
          if(empty($_GET['id'])){
          include '404.php';
          } else {
          ?>
          
          <?php
          $id = $_GET['id'];
          $query = mysql_query("SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat and kd_obat='$id'");
          $data  = mysql_fetch_array($query);
          $kd_obat = $data['kd_obat'];
          $nama_obat = $data['nama_obat'];
          $suplier = $data['suplier'];
          $harga_suplier = $data['harga_suplier'];
          $harga_jual = $data['harga_jual'];
          $jumlah_obat = $data['jumlah_obat'];
          $jumlah_pemasukan = $data['jumlah_pemasukan'];
          $id_jenis_obat = $data['id_jenis_obat'];
          $jenis_obat = $data['jenis_obat'];
          $tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
          if($kd_obat == $id){          
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>Kartu Stock Obat</b></li>
      </ol>
          
    <form method='post' enctype="multipart/form-data" role="form">
      <div class="form-group">
            <label>Kode Obat</label>
            <input class="form-control" type='text' name="kd_obat" id="kd_obat" value='<?php echo $kd_obat; ?>' autofocus required autocomplete='off' readonly='readonly'>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input class="form-control" type='text' name="nama_obat" id="nama_obat" value='<?php echo $nama_obat; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jumlah Persediaan</label>
            <input class="form-control" type='text' name="jumlah_obat" id="jumlah_obat" value='<?php echo $jumlah_obat; ?>' autofocus required autocomplete='off'>
          </div>
           <div class="form-group">
            <label>Jumlah Pemasukan</label>
            <input class="form-control" type='text' name="jumlah_pemasukan" id="jumlah_pemasukan" value='<?php echo $jumlah_pemasukan; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input class="form-control" type='date' name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value='<?php echo $tanggal_kadaluarsa; ?>' autofocus required autocomplete='off'>
          </div>        
         <center> <a href='index?p=data_obat' class="btn btn-sm btn-primary">Kembali</a></center><br><br>
        </form>
    <br>
     <a href='index?p=unduh_laporan_kartu_stock' class="btn btn-sm btn-primary" style="width: 80%;">Unduh Laporan</a>
</div>
      
      <?php
      } else {
      include "404.php";
      }
      ?>
      
      <?php
      }
      ?>  