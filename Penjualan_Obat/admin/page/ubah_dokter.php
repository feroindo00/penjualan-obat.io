					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysqli_query($con,"SELECT * FROM dokter WHERE 
										 username_dokter='$id'");
                    $data  = mysqli_fetch_array($query);
					$nama_dokter = $data['nama_dokter'];
					$username_dokter = $data['username_dokter'];
					$password_dokter = $data['password_dokter'];
					$klinik_dokter = $data['klinik_dokter'];	
					
					if($username_dokter == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Ubah Dokter</li>
      </ol>
					
		<form method='post' role="form">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="nama_dokter" id="nama_dokter" value='<?php echo $nama_dokter; ?>' autofocus required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" type='text' name="username_dokter" id="username_dokter" value='<?php echo $username_dokter; ?>' required autocomplete='off' readonly>
          </div>
		  <div class="form-group">
            <label>Password</label>
            <input class="form-control" type='text' name="password_dokter" id="password_dokter" value='<?php echo $password_dokter; ?>' required autocomplete='off'>
          </div>
          <div class="form-group">
            <label>Klinik/Rumah Sakit</label>
            <input class="form-control" type='text' name="klinik_dokter" id="klinik_dokter" value='<?php echo $klinik_dokter; ?>' required autocomplete='off'>
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
				$sql2 = 'select * from jabatan where id_jabatan_karyawan = 5';
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
          <center><button type="submit" name="ubah_dokter" class="btn btn-sm btn-success">Ubah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_dokter.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	