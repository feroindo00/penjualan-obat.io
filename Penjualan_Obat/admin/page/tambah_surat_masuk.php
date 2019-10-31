	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Surat Masuk</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Nomor</label>
            <input class="form-control" type='text' name="nomor_sm" id="nomor_sm" placeholder="Masukkan Nomor Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control" type='date' name="tanggal_sm" id="tanggal_sm" required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Pengirim</label>
			<select class="form-control" name="pengirim_sm" id="pengirim_sm" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Pengirim</option>
			<?php  
			$sql = 'select * from tb_pengirim_penerima order by id_pp ASC';
			$result = mysql_query($sql);
			while($data = mysql_fetch_array($result)){
			$kode_pp = $data['kode_pp'];
			$nama_pp = $data['nama_pp'];
			?>
			<option value='<?php echo $kode_pp; ?>'><?php echo $kode_pp; ?> = <?php echo $nama_pp; ?></option>
			<?php }?>
			</select>
		  </div>
		  <div class="form-group">
            <label>Perihal</label>
            <textarea class="form-control" type='text' name="perihal_sm" id="perihal_sm" placeholder="Masukkan Perihal Disini ..." required autocomplete='off'></textarea>
          </div>
		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_sm" id="keterangan_sm" placeholder="Masukkan Keterangan Disini ..." required autocomplete='off'></textarea>
          </div>
		  <div class="form-group">
            <label>File</label>
            <input class="form-control" type='file' name="file_sm" id="file_sm" required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_surat_masuk" class="btn btn-primary">Tambah</button>
          <button type="reset" class="btn btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_surat_masuk.php';
	?>