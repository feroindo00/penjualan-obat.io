	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Dokter</li>
      </ol>
					
		<form method='post' role="form">
		  <div class="form-group">
            <label>Nama Dokter</label>
            <input class="form-control" type='text' name="nama_dokter" id="nama_dokter" placeholder="Masukkan Nama Dokter Disini ..." autofocus required autocomplete='off'>
          </div>
           <div class="form-group">
            <label>Klinik Dokter</label>
            <input class="form-control" type='text' name="klinik_dokter" id="klinik_dokter" placeholder="Masukkan Klinik Dokter Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Username Dokter</label>
            <input class="form-control" type='text' name="username_dokter" id="username_dokter" placeholder="Masukkan Username Dokter Disini ..." required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Password Dokter</label>
            <input class="form-control" type='text' name="password_dokter" id="password_dokter" placeholder="Masukkan Password Dokter Disini ..." required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Jabatan</label>
			<select class="form-control" name="id_level_karyawan" id="id_level_karyawan" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Jabatan</option>
			<?php  
			$sql = 'select * from jabatan where id_jabatan_karyawan = 5';
			$result = mysqli_query($con,$sql);
			while($data = mysqli_fetch_array($result)){
			$id_jabatan_karyawan = $data['id_jabatan_karyawan'];
			$level_jabatan_karyawan = $data['level_jabatan_karyawan'];
			?>
			<option value='<?php echo $id_jabatan_karyawan; ?>'><?php echo $level_jabatan_karyawan; ?></option>
			<?php }?>
			</select>
		  </div>
          <center><button type="submit" name="tambah_dokter" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_dokter.php';
	?>