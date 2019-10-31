					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
          $query = mysqli_query($con,"SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat and kd_obat='$id'");
          $data  = mysqli_fetch_array($query);
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
					if($kd_obat == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Obat</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
      <div class="form-group">
            <label>Kode Obat</label>
            <input class="form-control" type='text' name="kd_obat" id="kd_obat" value='<?php echo $kd_obat; ?>' autofocus required autocomplete='off'readonly="readonly">
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
            <label>Harga Satuan</label>
            <input class="form-control" type='text' name="harga_satuan" id="harga_satuan" value='<?php echo $harga_satuan; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jumlah Obat</label>
            <input class="form-control" type='text' name="jumlah_obat" id="jumlah_obat" value='<?php echo $jumlah_obat; ?>'  autofocus required autocomplete='off'>
          </div>
           <div class="form-group">
            <label>Update Jumlah  Obat</label>
            <input class="form-control" type='text' name="jumlah_obat_update" id="jumlah_obat_update" placeholder="jumlah obat saat ini max = <?php echo $jumlah_obat; ?>" >
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
              $result = mysqli_query($con,$sql);
              while($data = mysqli_fetch_array($result)){
              $id_jenis_obat = $data['id_jenis_obat'];
              $jenis_obat = $data['jenis_obat'];
              ?>
              <option value='<?php echo $id_jenis_obat; ?>'><?php echo $jenis_obat; ?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label>Jenis Satuan</label>
            <input class="form-control" type='text' name="satuan" id="satuan" value='<?php echo $satuan; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
          <label>Jumlah Per-Satuan</label>
           <input class="form-control" type='text' name="jumlah_per_satuan" id="jumlah_per_satuan" value='<?php echo $jumlah_per_satuan; ?>' autofocus required autocomplete='off'>
        </div>
        <!--<div class="form-group">
          <label>Jumlah Stok Per-Satuan</label>
          <input class="form-control" type='text' name="stok_per_satuan" id="stok_per_satuan" value='<?php echo $stok_per_satuan; ?>' autofocus required autocomplete='off'>
        </div>!-->
           <!--<div class="form-group">
            <label>Jenis Satuan</label>
            <select class="form-control" name="satuan" id="satuan" value='<?php echo $satuan; ?>' >
              <option value='<?php echo $satuan; ?>'><?php echo $satuan; ?></option>
              <option value="Ml">Ml</option>
              <option value="Gr">Gr</option>
              <option value="Pcs">Pcs</option>
            </select>
          </div>-->
          <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input class="form-control" type='date' name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" value='<?php echo $tanggal_kadaluarsa; ?>' autofocus required autocomplete='off'>
          </div>			  
          <center><button type="submit" name="ubah_obat" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_obat.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	