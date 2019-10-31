					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_diagnosa WHERE 
										 id_d='$id'");
                    $data  = mysql_fetch_array($query);
					$id_d = $data['id_d'];
					$nama_d = $data['nama_d'];
					
					if($id_d == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Diagnosa</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_d" id="nama_d" value='<?php echo $nama_d; ?>' autofocus required autocomplete='off'>
          </div>		  
          <center><button type="submit" name="ubah_diagnosa" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_diagnosa.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	