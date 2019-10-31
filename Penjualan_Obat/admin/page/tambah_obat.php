	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Obat</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Kode Obat</label>
            <input class="form-control" type='text' name="kd_obat" id="kd_obat" placeholder="Masukkan Kode Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Nama Obat</label>
            <input class="form-control" type='text' name="nama_obat" id="nama_obat" placeholder="Masukkan Nama Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Suplier</label>
            <input class="form-control" type='text' name="suplier" id="suplier" placeholder="Masukkan Suplier Disini ..." autofocus required autocomplete='off'>
          </div>
		      <div class="form-group">
            <label>Harga Suplier</label>
            <input class="form-control" type='text' name="harga_suplier" id="harga_suplier" placeholder="Masukkan Harga Suplier Disini ..." required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Harga Jual</label>
            <input class="form-control" type='text' name="harga_jual" id="harga_jual" placeholder="Masukkan Harga Jual Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Harga Satuan</label>
            <input class="form-control" type='text' name="harga_satuan" id="harga_satuan" placeholder="Masukkan Harga Satuan Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jumlah Obat</label>
            <input class="form-control" type='text' name="jumlah_obat" id="jumlah_obat" placeholder="Masukkan Jumlah Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jumlah Pemasukan</label>
            <input class="form-control" type='text' name="jumlah_pemasukan" id="jumlah_pemasukan" placeholder="Masukkan Jumlah Pemasukan Obat Disini ..." autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Jenis Kemasan</label>
        <select class="form-control" name="id_jenis_obat" id="id_jenis_obat" required autocomplete='off'>
          <option value='' hidden='true'>Pilih Jenis Kemasan</option>
          <?php  
          $sql = 'select * from jenis_obat order by id_jenis_obat ASC';
          $result = mysqli_query($con,$sql);
          while($data = mysqli_fetch_array($result)){
          $id_jenis_obat = $data['id_jenis_obat'];
          $jenis_obat = $data['jenis_obat'];
          ?>
          <option value='<?php echo $id_jenis_obat; ?>'><?php echo $jenis_obat; ?></option>
          <?php }?>
        </select>
          </div>
        <div class="form-group">
            <label>Jenis Satuan</label>
            <input class="form-control" type='text' name="satuan" id="satuan" placeholder="Masukkan Jenis Satuan Obat Disini ..." autofocus required autocomplete='off'>
        </div>
        <div class="form-group">
          <label>Jumlah Per-Satuan</label>
          <input class="form-control" type='text' name="jumlah_per_satuan" id="jumlah_per_satuan" placeholder="Masukkan Jumlah Per Satuan Obat Disini ..." autofocus required autocomplete='off'>
        </div>
        <!--<div class="form-group">
          <label>Jumlah Stok Per-Satuan</label>
          <input class="form-control" type='text' name="stok_per_satuan" id="stok_per_satuan" placeholder="Masukkan Jumlah Stok Per Satuan Obat Disini ..." autofocus required autocomplete='off'>
        </div>!-->
          <!--<div class="form-group">
            <label>Jenis Satuan</label>
          <select class="form-control" name="satuan" id="satuan" value="-Pilih Satuan Obat-" placeholder="masukan jenis Satuan disini...">
            <option>-Pilih Jenis Satuan-</option>
            <option value="Ml">Ml</option>
            <option value="Gr">Gr</option>
            <option value="Pcs">Pcs</option>
          </select>
          </div>!-->
          <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input class="form-control" type='date' name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" placeholder="Masukkan Tanggal Kadaluarsa Disini ..." autofocus required autocomplete='off'>
          </div>
          <center><button type="submit" name="tambah_obat" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_obat.php';
	?>