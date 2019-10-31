					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_disposisi_surat_masuk WHERE 
										 id_dsm='$id'");
                    $data  = mysql_fetch_array($query);
					$id_dsm = $data['id_dsm'];
					$nomor_dsm = $data['nomor_dsm'];
					$tujuan_dsm = $data['tujuan_dsm'];
					$keterangan_dsm = $data['keterangan_dsm'];
					
					if($id_dsm == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Disposisi Surat Masuk</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Nomor Surat Masuk</label>
            <input class="form-control" type='text' name="nomor_dsm" id="nomor_dsm" value='<?php echo $nomor_dsm; ?>' required autocomplete='off' readonly>
          </div>
          <div class='form-group'>
			<label>Tujuan</label>
			<select class='form-control' name='tujuan_dsm' id='tujuan_dsm' data-search='true' autofocus required autocomplete='off'>
				<?php  
				$sql1 = "select * from tb_disposisi_surat_masuk, tb_karyawan, tb_jabatan_karyawan, tb_bagian_karyawan where tb_disposisi_surat_masuk.tujuan_dsm=tb_karyawan.username_k and tb_karyawan.id_level_k=tb_jabatan_karyawan.id_jk and tb_karyawan.id_bagian_k=tb_bagian_karyawan.id_bk and id_dsm='$id'";
				$result1 = mysql_query($sql1);
				while($data1 = mysql_fetch_array($result1)){
					$tujuan_dsm1 = $data1['tujuan_dsm'];
					$nama_k1 = $data1['nama_k'];
					$level_jk1 = $data1['level_jk'];
					$nama_bk1 = $data1['nama_bk'];
				?>
			<option value='<?php echo $tujuan_dsm1; ?>' hidden='true'><?php echo $nama_k1; ?> (<?php echo $level_jk1; ?>-<?php echo $nama_bk1; ?>)</option>
				<?php
				}
				?>
				<?php  
				$sql2 = 'select * from tb_karyawan, tb_jabatan_karyawan, tb_bagian_karyawan where tb_karyawan.id_level_k=tb_jabatan_karyawan.id_jk and tb_karyawan.id_bagian_k=tb_bagian_karyawan.id_bk order by id_k ASC';
				$result2 = mysql_query($sql2);
				while($data2 = mysql_fetch_array($result2)){
					$username_k2 = $data2['username_k'];
					$nama_k2 = $data2['nama_k'];
					$level_jk2 = $data2['level_jk'];
					$nama_bk2 = $data2['nama_bk'];
				?>
			<option value='<?php echo $username_k2; ?>'><?php echo $nama_k2; ?> (<?php echo $level_jk2; ?>-<?php echo $nama_bk2; ?>)</option>
				<?php
				}
				?>
			</select>
		  </div>
   		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_dsm" id="keterangan_dsm" required autocomplete='off'><?php echo $keterangan_dsm; ?></textarea>
          </div>		
          <center><button type="submit" name="ubah_disposisi_surat_masuk" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
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