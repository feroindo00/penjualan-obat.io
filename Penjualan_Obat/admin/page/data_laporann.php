    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Laporan</li>
      </ol>
	      <form method='post' role="form">
		  <div class="row">
		  <div class="col-lg-10">
		  <div class="form-group">		
			<select class="form-control" name="laporan" id="laporan" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Laporan</option>
			<option value='sm'>Surat Masuk</option>
			<option value='dsm'>Disposisi Surat Masuk</option>
			<option value='smt'>Surat Masuk Terbanyak</option>
			<option value='sk'>Surat Keluar</option>
			<option value='skt'>Surat Keluar Terbanyak</option>
			</select>
		  </div>
		  </div>
		  <div class="col-lg-2">
		  <button type="submit" class="btn btn-sm btn-primary">Pilih</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button>
		  </div>
		  </div>
		  </form>	  

	<?php
	include 'view_laporan_surat_masuk.php';
	include 'view_laporan_disposisi_surat_masuk.php';
	include 'view_laporan_surat_masuk_terbanyak.php';
	include 'view_laporan_surat_keluar.php';	
	include 'view_laporan_surat_keluar_terbanyak.php';
	?>
		  
    </div>
    <!-- /.container-fluid-->