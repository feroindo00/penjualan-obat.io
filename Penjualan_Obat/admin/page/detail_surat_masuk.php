					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_surat_masuk, tb_pengirim_penerima WHERE 
										  tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp AND
										  id_sm='$id'");
                    $data  = mysql_fetch_array($query);
					$id_sm = $data['id_sm'];
					$nomor_sm = $data['nomor_sm'];
					$tanggal_sm = $data['tanggal_sm'];
					$tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  			
					$pengirim_sm = $data['pengirim_sm'];
					$perihal_sm = $data['perihal_sm'];
					$keterangan_sm = $data['keterangan_sm'];
					$file_sm = $data['file_sm'];
					$admin_input_sm = $data['admin_input_sm'];
					$tanggal_input_sm = $data['tanggal_input_sm'];
					$tanggal_input_smm = $hari[date("w", strtotime($tanggal_input_sm))].", ".date("j", strtotime($tanggal_input_sm))." ".$bulan[date("n", strtotime($tanggal_input_sm))]." ".date("Y", strtotime($tanggal_input_sm));						                  			
					$jam_input_sm = $data['jam_input_sm'];
					$nama_pp = $data['nama_pp'];
					
					$queryy = mysql_query("SELECT * FROM tb_karyawan WHERE
										 username_k='$admin_input_sm'");
                    $dataa  = mysql_fetch_array($queryy);
					$nama_k = $dataa['nama_k'];
					
					if($id_sm == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Surat Masuk</li>
      </ol>
		
          <hr>		
          <div class="form-group">
            <label>Nomor =</label>
            <font style="color: #007bff;"><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Tanggal =</label>
            <font style="color: #007bff;"><?php echo $tanggal_smm; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Pengirim =</label>
            <font style="color: #007bff;"><?php echo $nama_pp; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Perihal =</label>
            <font style="color: #007bff;"><?php echo $perihal_sm; ?></font>
          </div>
		  <hr>
   		  <div class="form-group">
            <label>Keterangan =</label>
            <font style="color: #007bff;"><?php echo $keterangan_sm; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
			<label>File =</label>
			<a href="../files/<?php echo $file_sm; ?>" target="_blank"><?php echo $file_sm; ?></a>
		  </div>	
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Oleh =</label>
            <font style="color: #007bff;"><?php echo $nama_k; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Pada =</label>
            <font style="color: #007bff;"><?php echo $tanggal_input_smm; ?> ( <?php echo $jam_input_sm; ?> )</font>
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