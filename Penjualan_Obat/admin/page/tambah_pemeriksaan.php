					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_pemeriksaan, tb_pasien WHERE 
										 tb_pemeriksaan.id_p_pks=tb_pasien.id_p AND
										 id_pks='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pks = $data['id_pks'];
					$nama_p = $data['nama_p'];
					
					if($id_pks == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Pemeriksaan</li>
      </ol>
					
		<form method='post' role="form">
		  <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="id_p_pks" id="id_p_pks" value="<?php echo $nama_p; ?>" required autocomplete='off' readonly>
          </div>
          <div class="form-group">
            <label>Keluhan</label>
            <textarea class="form-control" type='text' name="keluhan_pks" id="keluhan_pks" placeholder="Masukkan Keluhan Disini ..." autofocus required autocomplete='off'></textarea>
          </div>
		  <div class="form-group">
            <label>Diagnosa</label>
			<select class="form-control" name="id_d_pks" id="id_d_pks" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Diagnosa</option>
			<?php  
			$sql = 'select * from tb_diagnosa order by id_d ASC';
			$result = mysql_query($sql);
			while($data = mysql_fetch_array($result)){
			$id_d = $data['id_d'];
			$nama_d = $data['nama_d'];
			?>
			<option value='<?php echo $id_d; ?>'><?php echo $nama_d; ?></option>
			<?php }?>
			</select>
		  </div>
          <div class="form-group">
            <label>Tindakan</label>
            <textarea class="form-control" type='text' name="tindakan_pks" id="tindakan_pks" placeholder="Masukkan Tindakan Disini ..." required autocomplete='off'></textarea>
          </div>
		  <div class="form-group">
            <label>Obat</label>
			<select class="form-control" name="id_o_pks" id="id_o_pks" required autocomplete='off'>
			<option value='' hidden='true'>Pilih Obat</option>
			<?php  
			$sql = 'select * from tb_obat order by id_o ASC';
			$result = mysql_query($sql);
			while($data = mysql_fetch_array($result)){
			$id_o = $data['id_o'];
			$nama_o = $data['nama_o'];
			$harga_o = $data['harga_o'];
			?>
			<option value='<?php echo $id_o; ?>'><?php echo $nama_o; ?> (<?php echo $harga_o; ?>)</option>
			<?php }?>
			</select>
		  </div>
          <center><button type="submit" name="tambah_pemeriksaan" class="btn btn-sm btn-success">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pemeriksaan.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	