					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysqli_query($con,"SELECT * FROM karyawan WHERE 
										 username_karyawan='$id'");
                    $data  = mysqli_fetch_array($query);
					$nama_karyawan = $data['nama_karyawan'];
					$username_karyawan = $data['username_karyawan'];
					$password_karyawan = $data['password_karyawan'];
					
					if($username_karyawan == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Karyawan</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_karyawan" id="nama_karyawan" value='<?php echo $nama_karyawan; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type='text' name="username_karyawan" id="username_karyawan" value='<?php echo $username_karyawan; ?>' required autocomplete='off' readonly>
          </div>
		  <div class="form-group">
            <label>Password</label>
            <input class="form-control" type='text' name="password_karyawan" id="password_karyawan" value='<?php echo $password_karyawan; ?>' required autocomplete='off'>
          </div>
		  <div class='form-group'>
			<label>Jabatan</label>
			<select class='form-control' name='id_level_karyawan' id='id_level_karyawan' data-search='true' required='yes' autocomplete='off'>
				<?php  
				$sql1 = "select * from karyawan,jabatan where karyawan.id_level_karyawan=jabatan.id_jabatan_karyawan and username_karyawan='$id'";
				$result1 = mysqli_query($con,$sql1);
				while($data1 = mysqli_fetch_array($result1)){
					$id_level_karyawan1 = $data1['id_level_karyawan'];
					$level_jabatan_karyawan1 = $data1['level_jabatan_karyawan'];
				?>
			<option value='<?php echo $id_level_karyawan1; ?>' hidden='true'><?php echo $level_jabatan_karyawan1; ?></option>
				<?php
				}
				?>
				<?php  
				$sql2 = 'select * from jabatan order by id_jabatan_karyawan ASC';
				$result2 = mysqli_query($con,$sql2);
				while($data2 = mysqli_fetch_array($result2)){
					$id_jabatan_karyawan2 = $data2['id_jabatan_karyawan'];
					$level_jabatan_karyawan2 = $data2['level_jabatan_karyawan'];
				?>
			<option value='<?php echo $id_jabatan_karyawan2; ?>'><?php echo $level_jabatan_karyawan2; ?></option>
				<?php
				}
				?>
			</select>
		  </div>
        			  
          <center><button type="submit" name="ubah_karyawan" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_karyawan.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	