	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Resep Pasien</li>
      </ol>
					
		<form method='post' role="form">
		  <div class="form-group">
            <label>Nama Pasien</label>
            <input class="form-control" type='text' name="nama_pasien" id="nama_pasien" placeholder="Masukkan Nama Pasien Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Umur Pasien</label>
            <input class="form-control" type='int' name="umur_pasien" id="umur_pasien" placeholder="Masukkan Nama Pasien Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
         	<select class="form-control" name="jenis_kelamin_pasien" id="jenis_kelamin_pasien" value="-Pilih Jenis Kelamin-" placeholder="masukan jenis kelamin disini...">
            <option>-Pilih Jenis Kelamin-</option>
         		<option value="Laki-Laki">Laki-Laki</option>
         		<option value="Perempuan">Perempuan</option>
        	</select>
          </div>
		  <!--<div class="form-group">
            <label>Jenis Kelamin</label>
			<select class="form-control" name="id_jkl_p" id="id_jkl_p" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Jenis Kelamin</option>
			<?php  
			$sql = 'select * from tb_jenis_kelamin order by id_jkl ASC';
			$result = mysql_query($sql);
			while($data = mysql_fetch_array($result)){
			$id_jkl = $data['id_jkl'];
			$nama_jkl = $data['nama_jkl'];
			?>
			<option value='<?php echo $id_jkl; ?>'><?php echo $nama_jkl; ?></option>
			<?php }?>
			</select>
		  </div>!-->
		  <div class="form-group">
            <label>Tanggal Lahir Pasien</label>
            <input class="form-control" type='date' name="tanggal_lahir_pasien" id="tanggal_lahir_pasien" placeholder="Masukkan Tanggal Lahir Disini ..." required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input class="form-control" type='text' name="tempat_lahir_pasien" id="tempat_lahir_pasien" placeholder="Masukkan Tempat Lahir Disini ..." required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" type='text' name="alamat_pasien" id="alamat_pasien" placeholder="Masukkan Alamat Disini ..." required autocomplete='off'></textarea>
          </div>
		  <div class="form-group">
            <label>Resep Pasien</label>
            <textarea class="form-control" type='textarea' name="resep_pasien" id="resep_pasien" placeholder="Masukkan Resep Pasien Disini ..." required autocomplete='off'></textarea>
          </div>
       <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='textarea' name="keterangan" id="keterangan" placeholder="Masukkan Keterangan Disini ..." required autocomplete='off'></textarea>
          </div>
          <div class="form-group">
            <label>Jenis Pasien</label>
          <select class="form-control" name="jenis_pasien" id="jenis_pasien" value="-Pilih Jenis Kelamin-" placeholder="masukan jenis kelamin disini...">
            <option>-Pilih Jenis Pasien-</option>
            <option value="Pasien Internal">Pasien Internal</option>
            <option value="Pasien Eksternal">Pasien Eksternal</option>
          </select>
          </div>
           <div class="form-group">
            <label>Nama Dokter</label>
            <input class="form-control" type='text' name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter Disini ..." autofocus required autocomplete='off'></textarea>
          </div>  
           <div class="form-group">
            <label>Klinik</label>
            <input class="form-control" type='text' name="klinik" id="klinik" placeholder="Masukkan Klinik Disini ..." autofocus required autocomplete='off'></textarea>
          </div>
          <center><button type="submit" name="tambah_pasien" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pasien.php';
	?>