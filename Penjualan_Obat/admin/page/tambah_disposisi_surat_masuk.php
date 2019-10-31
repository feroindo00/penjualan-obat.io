					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_surat_masuk WHERE 
										 id_sm='$id'");
                    $data  = mysql_fetch_array($query);
					$id_sm = $data['id_sm'];
					$nomor_sm = $data['nomor_sm'];
					
					if($id_sm == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Disposisi Surat Masuk</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Nomor Surat Masuk</label>
            <input class="form-control" type='text' name="nomor_dsm" id="nomor_dsm" value='<?php echo $nomor_sm; ?>' required autocomplete='off' readonly>
          </div>
          <div class="form-group">
            <label>Tujuan</label>
			<select class="form-control" name="tujuan_dsm" id="tujuan_dsm" autofocus required autocomplete='off'>
			<option value='' hidden='true'>Pilih Tujuan</option>
			<?php  
			$cek_session = $_SESSION['username_k'];
			$sql = 'select * from tb_karyawan, tb_jabatan_karyawan, tb_bagian_karyawan where tb_karyawan.id_level_k=tb_jabatan_karyawan.id_jk and tb_karyawan.id_bagian_k=tb_bagian_karyawan.id_bk order by id_k ASC';
			$result = mysql_query($sql);
			while($data = mysql_fetch_array($result)){
			$username_k = $data['username_k'];
			$nama_k = $data['nama_k'];
			$level_jk = $data['level_jk'];
			$nama_bk = $data['nama_bk'];
			?>
			<option value='<?php echo $username_k; ?>'><?php echo $nama_k; ?> (<?php echo $level_jk; ?>-<?php echo $nama_bk; ?>)</option>
			<?php }?>
			</select>
		  </div>
		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_dsm" id="keterangan_dsm" placeholder="Masukkan Keterangan Disini ..." required autocomplete='off'></textarea>
          </div>
          <center><button type="submit" name="tambah_disposisi_surat_masuk" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		
</div>
			
	<?php
	include 'control_disposisi_surat_masuk.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	