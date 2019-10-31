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
					$tanggal_sm = $data['tanggal_sm'];
					$pengirim_sm = $data['pengirim_sm'];
					$perihal_sm = $data['perihal_sm'];
					$keterangan_sm = $data['keterangan_sm'];
					$file_sm = $data['file_sm'];
					
					if($id_sm == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Surat Masuk</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Nomor</label>
            <input class="form-control" type='text' name="nomor_sm" id="nomor_sm" value='<?php echo $nomor_sm; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control" type='date' name="tanggal_sm" id="tanggal_sm" value='<?php echo $tanggal_sm; ?>' required autocomplete='off'>
          </div>
		  <div class='form-group'>
			<label>Pengirim</label>
			<select class='form-control' name='pengirim_sm' id='pengirim_sm' data-search='true' required autocomplete='off'>
				<?php  
				$sql1 = "select * from tb_surat_masuk,tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp and id_sm='$id'";
				$result1 = mysql_query($sql1);
				while($data1 = mysql_fetch_array($result1)){
					$pengirim_sm1 = $data1['pengirim_sm'];
					$nama_pp1 = $data1['nama_pp'];
				?>
			<option value='<?php echo $pengirim_sm1; ?>' hidden='true'><?php echo $pengirim_sm1; ?> = <?php echo $nama_pp1; ?></option>
				<?php
				}
				?>
				<?php  
				$sql2 = 'select * from tb_pengirim_penerima order by kode_pp ASC';
				$result2 = mysql_query($sql2);
				while($data2 = mysql_fetch_array($result2)){
					$kode_pp2 = $data2['kode_pp'];
					$nama_pp2 = $data2['nama_pp'];
				?>
			<option value='<?php echo $kode_pp2; ?>'><?php echo $kode_pp2; ?> = <?php echo $nama_pp2; ?></option>
				<?php
				}
				?>
			</select>
		  </div>
		  <div class="form-group">
            <label>Perihal</label>
            <textarea class="form-control" type='text' name="perihal_sm" id="perihal_sm" required autocomplete='off'><?php echo $perihal_sm; ?></textarea>
          </div>
   		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_sm" id="keterangan_sm" required autocomplete='off'><?php echo $keterangan_sm; ?></textarea>
          </div>
		  <div class="form-group">
			<label>File</label><br>
			<a href="../files/<?php echo $file_sm; ?>" target="_blank"><?php echo $file_sm; ?></a>
			<input class="form-control" type="file" name="file_sm" id="file_sm" autocomplete='off' />
		  </div>		
          <center><button type="submit" name="ubah_surat_masuk" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_surat_masuk.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	