					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_bagian_karyawan WHERE 
										 id_bk='$id'");
                    $data  = mysql_fetch_array($query);
					$id_bk = $data['id_bk'];
					$nama_bk = $data['nama_bk'];
					
					if($id_bk == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Bagian Karyawan</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Bagian</label>
            <input class="form-control" type='text' name="nama_bk" id="nama_bk" value='<?php echo $nama_bk; ?>' autofocus required autocomplete='off'>
          </div>	
          <center><button type="submit" name="ubah_bagian_karyawan" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_bagian_karyawan.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	