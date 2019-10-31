					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM resep_pasien 
                    						WHERE
										 id_pasien='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pasien = $data['id_pasien'];
					$nama_pasien = $data['nama_pasien'];
					$umur_pasien = $data['umur_pasien'];
					$jenis_kelamin_pasien = $data['jenis_kelamin_pasien'];
					$tanggal_lahir_pasien = $data['tanggal_lahir_pasien'];
					$tempat_lahir_pasien = $data['tempat_lahir_pasien'];
					$tanggal_lahir_pp = $hari[date("w", strtotime($tanggal_lahir_pasien))].", ".date("j", strtotime($tanggal_lahir_pasien))." ".$bulan[date("n", strtotime($tanggal_lahir_pasien))]." ".date("Y", strtotime($tanggal_lahir_pasien));						                  								
					$tanggal_sekarang = date('Y-m-d');
					//$umur_p = $tanggal_sekarang-$tanggal_lahir_p;
					$alamat_pasien = $data['alamat_pasien'];
					$admin_input_pasien = $data['admin_input_pasien'];
					$resep_pasien = $data['resep_pasien'];
					$tanggal_input_pasien = $data['tanggal_input_pasien'];
					$tanggal_input_pasienp = $hari[date("w", strtotime($tanggal_input_pasien))].", ".date("j", strtotime($tanggal_input_pasien))." ".$bulan[date("n", strtotime($tanggal_input_pasien))]." ".date("Y", strtotime($tanggal_input_pasien));						                  			
					$jam_input_pasien = $data['jam_input_pasien'];
					
					$queryy = mysql_query("SELECT * FROM karyawan WHERE
										 username_karyawan='$admin_input_pasien'");
                    $dataa  = mysql_fetch_array($queryy);
					$nama_karyawan = $dataa['nama_karyawan'];
					
					if($id_pasien == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Pasien</li>
      </ol>
					
		  <hr>
          <div class="form-group">
            <label>Nama Pasien =</label>
            <font style="color: #007bff;"><?php echo $nama_pasien; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Umur Pasien =</label>
            <font style="color: #007bff;"><?php echo $umur_pasien; ?></font>
          </div>
		  <hr>
		  
          <!--<div class="form-group">
            <label>Umur Pasien =</label>
            <font style="color: #007bff;"><?php echo $umur_pasien; ?></font>
          </div>!-->
		  
          <div class="form-group">
            <label>Jenis Kelamin =</label>
            <font style="color: #007bff;"><?php echo $jenis_kelamin_pasien; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Tanggal Lahir Pasien =</label>
            <font style="color: #007bff;"><?php echo $tanggal_lahir_pasien; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Tempat Lahir Pasien =</label>
            <font style="color: #007bff;"><?php echo $tempat_lahir_pasien; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Alamat =</label>
            <font style="color: #007bff;"><?php echo $alamat_pasien; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Resep Pasien =</label>
            <font style="color: #007bff;"><br><?php echo nl2br ($resep_pasien); ?> </font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Oleh =</label>
            <font style="color: #007bff;"><?php echo $nama_karyawan; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Pada =</label>
            <font style="color: #007bff;"><?php echo $tanggal_input_pasienp; ?> ( <?php echo $jam_input_pasien; ?> )</font>
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