	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Jenis Kemasan Obat</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Jenis Kemasan</label>
            <input class="form-control" type='text' name="jenis_obat" id="jenis_obat" placeholder="Masukkan Jenis Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_jenis_obat" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_jenis_obat.php';
	?>