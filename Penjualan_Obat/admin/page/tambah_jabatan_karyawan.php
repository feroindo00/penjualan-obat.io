	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Jabatan Karyawan</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Jabatan</label>
            <input class="form-control" type='text' name="level_jabatan_karyawan" id="level_jabatan_karyawan" placeholder="Masukkan Jabatan Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_jabatan_karyawan" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_jabatan_karyawan.php';
	?>