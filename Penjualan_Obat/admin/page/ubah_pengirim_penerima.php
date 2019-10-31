					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_pengirim_penerima WHERE 
										 id_pp='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pp = $data['id_pp'];
					$kode_pp = $data['kode_pp'];
					$nama_pp = $data['nama_pp'];
					$keterangan_pp = $data['keterangan_pp'];
					
					if($id_pp == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Pengirim & Penerima Surat</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Kode</label>
            <input class="form-control" type='text' name="kode_pp" id="kode_pp" value='<?php echo $kode_pp; ?>' autofocus required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_pp" id="nama_pp" value='<?php echo $nama_pp; ?>' required autocomplete='off'>
          </div>
   		  <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" type='text' name="keterangan_pp" id="keterangan_pp" required autocomplete='off'><?php echo $keterangan_pp; ?></textarea>
          </div>		
          <center><button type="submit" name="ubah_pengirim_penerima" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pengirim_penerima.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	