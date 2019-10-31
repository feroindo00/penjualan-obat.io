					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysqli_query($con,"SELECT * FROM jenis_obat WHERE 
										 id_jenis_obat='$id'");
                    $data  = mysqli_fetch_array($query);
					$id_jenis_obat = $data['id_jenis_obat'];
					$jenis_obat = $data['jenis_obat'];
					
					if($id_jenis_obat == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Jabatan Karyawan</li>
      </ol>
					
		<form method='post' enctype="multipart/form-data" role="form">
          <div class="form-group">
            <label>Jenis Obat</label>
            <input class="form-control" type='text' name="jenis_obat" id="jenis_obat" value='<?php echo $jenis_obat; ?>' autofocus required autocomplete='off'>
          </div>	
          <center><button type="submit" name="ubah_jenis_obat" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_jenis_obat.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	