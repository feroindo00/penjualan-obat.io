	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Karyawan</li>
      </ol>
					
		<form method='post' role="form">
		  <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_karyawan" id="nama_karyawan" placeholder="Masukkan Nama Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type='text' name="username_karyawan" id="username_karyawan" placeholder="Masukkan Username Disini ..." required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type='text' name="password_karyawan" id="password_karyawan" placeholder="Masukkan Password Disini ..." required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Jabatan</label>
			<select class="form-control" name="id_level_karyawan" id="id_level_karyawan" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Jabatan</option>
			<?php  
			$sql = 'select * from jabatan order by id_jabatan_karyawan ASC';
			$result = mysqli_query($con,$sql);
			while($data = mysqli_fetch_array($result)){
			$id_jabatan_karyawan = $data['id_jabatan_karyawan'];
			$level_jabatan_karyawan = $data['level_jabatan_karyawan'];
			?>
			<option value='<?php echo $id_jabatan_karyawan; ?>'><?php echo $level_jabatan_karyawan; ?></option>
			<?php }?>
			</select>
		  </div>
		 
          <center><button type="submit" name="tambah_karyawan" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_karyawan.php';
	?>