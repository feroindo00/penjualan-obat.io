	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Jenis Satuan Obat</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Jenis Satuan obat</label>
            <input class="form-control" type='text' name="satuan" id="satuan" placeholder="Masukkan Jenis Satuan Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_satuan_obat" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_satuan_obat.php';
	?>