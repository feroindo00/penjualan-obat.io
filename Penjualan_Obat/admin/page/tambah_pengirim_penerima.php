	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Pengirim & Penerima Surat</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Kode</label>
            <input class="form-control" type='text' name="kode_pp" id="kode_pp" placeholder="Masukkan Kode Disini ..." autofocus required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_pp" id="nama_pp" placeholder="Masukkan Nama Disini ..." required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_pp" id="keterangan_pp" placeholder="Masukkan Keterangan Disini ..." required autocomplete='off'></textarea>
          </div>
          <center><button type="submit" name="tambah_pengirim_penerima" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pengirim_penerima.php';
	?>