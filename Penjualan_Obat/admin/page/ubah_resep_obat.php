          <?php
          if(empty($_GET['id'])){
          include '404.php';
          } else {
          ?>
          
          <?php
          $id = $_GET['id'];
          $query = mysql_query("SELECT * FROM resep_obat, jenis_obat WHERE
                     resep_obat.id_jenis_obat=jenis_obat.id_jenis_obat and id_resep_obat='$id'");
          $data  = mysql_fetch_array($query);
          $id_resep_obat = $data['id_resep_obat'];
          $nama_obat = $data['nama_obat'];
          $suplier = $data['suplier'];
          $harga_suplier = $data['harga_suplier'];
          $harga_jual = $data['harga_jual'];
          $jumlah_obat = $data['jumlah_obat'];
          $jumlah_pemasukan = $data['jumlah_pemasukan'];
          $id_jenis_obat = $data['id_jenis_obat'];
          $jenis_obat = $data['jenis_obat'];
          $satuan = $data['satuan'];
          $tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
          if($id_resep_obat == $id){          
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Resep Obat</li>
      </ol>
          
    <form method='post' enctype="multipart/form-data" role="form">
      <div class="form-group">
            <label>Kode Obat</label>
            <input class="form-control" type='text' name="id_resep_obat" id="id_resep_obat" value='<?php echo $id_resep_obat; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input class="form-control" type='text' name="nama_obat" id="nama_obat" value='<?php echo $nama_obat; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Suplier</label>
            <input class="form-control" type='text' name="suplier" id="suplier" value='<?php echo $suplier; ?>' autofocus required autocomplete='off'>
          </div>
      <div class="form-group">
            <label>Harga Suplier</label>
            <input class="form-control" type='text' name="harga_suplier" id="harga_supier" value='<?php echo $harga_suplier; ?>' required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input class="form-control" type='text' name="harga_jual" id="harga_jual" value='<?php echo $harga_jual; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jumlah Obat</label>
            <input class="form-control" type='text' name="jumlah_obat" id="jumlah_obat" value='<?php echo $jumlah_obat; ?>' autofocus required autocomplete='off'>
          </div>
           <div class="form-group">
            <label>Jumlah Pemasukan</label>
            <input class="form-control" type='text' name="jumlah_pemasukan" id="jumlah_pemasukan" value='<?php echo $jumlah_pemasukan; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jenis kemasan</label>
             <select class="form-control" name="id_jenis_obat" id="id_jenis_obat" required autocomplete='off'>
              <option value='<?php echo $id_jenis_obat; ?>' hidden='true'><?php echo $jenis_obat; ?></option>
              <?php  
              $sql = 'select * from jenis_obat order by id_jenis_obat ASC';
              $result = mysql_query($sql);
              while($data = mysql_fetch_array($result)){
              $id_jenis_obat = $data['id_jenis_obat'];
              $jenis_obat = $data['jenis_obat'];
              ?>
              <option value='<?php echo $id_jenis_obat; ?>'><?php echo $jenis_obat; ?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Jenis Satuan</label>
            <select class="form-control" name="satuan" id="satuan" value='<?php echo $satuan; ?>' >
              <option value='<?php echo $satuan; ?>'><?php echo $satuan; ?></option>
              <option value="Ml">Ml</option>
              <option value="Gr">Gr</option>
              <option value="Pcs">Pcs</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input class="form-control" type='date' name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value='<?php echo $tanggal_kadaluarsa; ?>' autofocus required autocomplete='off'>
          </div>        
          <center><button type="submit" name="ubah_resep_obat" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
    <br>
    
</div>
      
  <?php
  include 'control_resep_obat.php';
  ?>

      <?php
      } else {
      include "404.php";
      }
      ?>
      
      <?php
      }
      ?>  