					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM resep_pasien WHERE 
										 id_pasien='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pasien = $data['id_pasien'];
					$nama_pasien = $data['nama_pasien'];
					$jenis_kelamin_pasien = $data['jenis_kelamin_pasien'];
					$tempat_lahir_pasien = $data['tempat_lahir_pasien'];
					$tanggal_lahir_pasien = $data['tanggal_lahir_pasien'];
					$alamat_pasien = $data['alamat_pasien'];
					$resep_pasien = $data['resep_pasien'];
					$nama_dokter = $data['nama_dokter'];
					$klinik = $data['klinik'];
					$keterangan = $data['keterangan'];
					$jenis_pasien = $data['jenis_pasien'];
					
					if($id_pasien == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Resep Pasien</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_pasien" id="nama_pasien" value='<?php echo $nama_pasien; ?>' autofocus required autocomplete='off'>
          </div>
		  <div class='form-group'>
			<label>Jenis Kelamin</label>
			<select class="form-control" name="jenis_kelamin_pasien" id="jenis_kelamin_pasien" value='<?php echo $jenis_kelamin_pasien; ?>' placeholder="masukan jenis kelamin disini...">
         		<option value="Laki-Laki">Laki-Laki</option>
         		<option value="Perempuan">Perempuan</option>
        	</select>
		  </div>
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input class="form-control" type='text' name="tempat_lahir_pasien" id="tempat_lahir_pasien" value='<?php echo $tempat_lahir_pasien; ?>' required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Tanggal Lahir</label>
            <input class="form-control" type='date' name="tanggal_lahir_pasien" id="tanggal_lahir_pasien" value='<?php echo $tanggal_lahir_pasien; ?>' required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" type='text' name="alamat_pasien" id="alamat_pasien" required autocomplete='off'><?php echo $alamat_pasien; ?></textarea>
          </div>
          <div class="form-group">
            <label>Resep</label>
            <textarea class="form-control" type='text' name="resep_pasien" id="resep_pasien" required autocomplete='off'><?php echo $resep_pasien; ?></textarea>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan" id="keterangan" ><?php echo $keterangan; ?></textarea>
          </div>
         <div class='form-group'>
			<label>Jenis Pasien</label>
			<select class="form-control" name="jenis_pasien" id="jenis_pasien" value='<?php echo $jenis_pasien; ?>' placeholder="masukan jenis pasien disini...">
				<option>-Pilih Jenis Pasien-</option>
         		<option value="Pasien Internal">Pasien Internal</option>
            	<option value="Pasien Eksternal">Pasien Eksternal</option>
        	</select>
		  </div>
		   <div class="form-group">
            <label>Nama Dokter</label>
            <input class="form-control" type='text' name="nama_dokter" id="nama_dokter" value='<?php echo $nama_dokter; ?>' required autocomplete='off'>
          </div>
           <div class="form-group">
            <label>Klinik</label>
            <input class="form-control" type='text' name="klinik" id="klinik" value='<?php echo $klinik; ?>' required autocomplete='off'>
          </div>  
          <center><button type="submit" name="ubah_pasien" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pasien.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	