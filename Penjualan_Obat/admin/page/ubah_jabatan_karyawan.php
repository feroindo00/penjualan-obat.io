					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysqli_query($con,"SELECT * FROM jabatan WHERE 
										 id_jabatan_karyawan='$id'");
                    $data  = mysqli_fetch_array($query);
					$id_jabatan_karyawan = $data['id_jabatan_karyawan'];
					$level_jabatan_karyawan = $data['level_jabatan_karyawan'];
					
					if($id_jabatan_karyawan == $id){					
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
            <label>Jabatan</label>
            <input class="form-control" type='text' name="level_jabatan_karyawan" id="level_jabatan_karyawan" value='<?php echo $level_jabatan_karyawan; ?>' autofocus required autocomplete='off'>
          </div>	
          <center><button type="submit" name="ubah_jabatan_karyawan" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_jabatan_karyawan.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	