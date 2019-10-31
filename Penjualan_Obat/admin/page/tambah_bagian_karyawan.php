	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Bagian Karyawan</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Bagian</label>
            <input class="form-control" type='text' name="nama_bk" id="nama_bk" placeholder="Masukkan Bagian Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_bagian_karyawan" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_bagian_karyawan.php';
	?>