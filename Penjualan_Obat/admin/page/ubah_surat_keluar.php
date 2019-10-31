					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_surat_keluar WHERE 
										 id_sk='$id'");
                    $data  = mysql_fetch_array($query);
					$id_sk = $data['id_sk'];
					$nomor_sk = $data['nomor_sk'];
					$tanggal_sk = $data['tanggal_sk'];
					$penerima_sk = $data['penerima_sk'];
					$perihal_sk = $data['perihal_sk'];
					$keterangan_sk = $data['keterangan_sk'];
					$file_sk = $data['file_sk'];
					
					if($id_sk == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Surat Keluar</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Nomor</label>
            <input class="form-control" type='text' name="nomor_sk" id="nomor_sk" value='<?php echo $nomor_sk; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input class="form-control" type='date' name="tanggal_sk" id="tanggal_sk" value='<?php echo $tanggal_sk; ?>' required autocomplete='off'>
          </div>
		  <div class='form-group'>
			<label>Penerima</label>
			<select class='form-control' name='penerima_sk' id='penerima_sk' data-search='true' required autocomplete='off'>
				<?php  
				$sql1 = "select * from tb_surat_keluar,tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp and id_sk='$id'";
				$result1 = mysql_query($sql1);
				while($data1 = mysql_fetch_array($result1)){
					$penerima_sk1 = $data1['penerima_sk'];
					$nama_pp1 = $data1['nama_pp'];
				?>
			<option value='<?php echo $penerima_sk1; ?>' hidden='true'><?php echo $penerima_sk1; ?> = <?php echo $nama_pp1; ?></option>
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
            <textarea class="form-control" type='text' name="perihal_sk" id="perihal_sk" required autocomplete='off'><?php echo $perihal_sk; ?></textarea>
          </div>
   		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_sk" id="keterangan_sk" required autocomplete='off'><?php echo $keterangan_sk; ?></textarea>
          </div>
		  <div class="form-group">
			<label>File</label><br>
			<a href="../files/<?php echo $file_sk; ?>" target="_blank"><?php echo $file_sk; ?></a>
			<input class="form-control" type="file" name="file_sk" id="file_sk" autocomplete='off' />
		  </div>		
          <center><button type="submit" name="ubah_surat_keluar" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_surat_keluar.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	