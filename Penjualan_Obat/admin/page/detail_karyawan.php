					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysqli_query($con,"SELECT * FROM karyawan, jabatan WHERE
										 karyawan.id_level_karyawan=jabatan.id_jabatan_karyawan AND
										 username_karyawan='$id'");
                    $data  = mysqli_fetch_array($query);
					$nama_karyawan = $data['nama_karyawan'];
					$username_karyawan = $data['username_karyawan'];
					$password_karyawan = $data['password_karyawan'];
					$level_jabatan_karyawan = $data['level_jabatan_karyawan'];
					//$nama_bk = $data['nama_bk'];
					$admin_input_karyawan = $data['admin_input_karyawan'];
					$tanggal_input = $data['tanggal_input'];
					$tanggal_input_kk = $hari[date("w", strtotime($tanggal_input))].", ".date("j", strtotime($tanggal_input))." ".$bulan[date("n", strtotime($tanggal_input))]." ".date("Y", strtotime($tanggal_input));						                  			
					$jam_input = $data['jam_input'];
					
					$queryy = mysqli_query($con,"SELECT * FROM karyawan WHERE
										 username_karyawan='$admin_input_karyawan'");
                    $dataa  = mysqli_fetch_array($queryy);
					$nama_kk = $dataa['nama_karyawan'];
					
					if($username_karyawan == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Karyawan</li>
      </ol>
					
		  <hr>
          <div class="form-group">
            <label>Nama =</label>
            <font style="color: #007bff;"><?php echo $nama_karyawan; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Username =</label>
            <font style="color: #007bff;"><?php echo $username_karyawan; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Password =</label>
            <font style="color: #007bff;"><?php echo $password_karyawan; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Jabatan =</label>
            <font style="color: #007bff;"><?php echo $level_jabatan_karyawan; ?></font>
          </div>
		  <hr>
		  <ol class="breadcrumb">
		  <!--<div class="form-group">
            <label>Bagian =</label>
            <font style="color: #007bff;"><?php echo $nama_bk; ?></font>
          </div>!-->
      	  </ol>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Oleh =</label>
            <font style="color: #007bff;"><?php echo $nama_kk; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Pada =</label>
            <font style="color: #007bff;"><?php echo $tanggal_input_kk; ?> ( <?php echo $jam_input; ?> )</font>
          </div>
		  <hr>
		<br>
		
</div>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	