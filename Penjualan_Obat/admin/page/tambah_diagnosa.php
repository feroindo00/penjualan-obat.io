	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Diagnosa</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_d" id="nama_d" placeholder="Masukkan Nama Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_diagnosa" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_diagnosa.php';
	?>