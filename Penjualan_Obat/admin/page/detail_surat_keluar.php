					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_surat_keluar, tb_pengirim_penerima WHERE 
										  tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp AND
										  id_sk='$id'");
                    $data  = mysql_fetch_array($query);
					$id_sk = $data['id_sk'];
					$nomor_sk = $data['nomor_sk'];
					$tanggal_sk = $data['tanggal_sk'];
					$tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  			
					$penerima_sk = $data['penerima_sk'];
					$perihal_sk = $data['perihal_sk'];
					$keterangan_sk = $data['keterangan_sk'];
					$file_sk = $data['file_sk'];
					$admin_input_sk = $data['admin_input_sk'];
					$tanggal_input_sk = $data['tanggal_input_sk'];
					$tanggal_input_skk = $hari[date("w", strtotime($tanggal_input_sk))].", ".date("j", strtotime($tanggal_input_sk))." ".$bulan[date("n", strtotime($tanggal_input_sk))]." ".date("Y", strtotime($tanggal_input_sk));						                  			
					$jam_input_sk = $data['jam_input_sk'];
					$nama_pp = $data['nama_pp'];
					
					$queryy = mysql_query("SELECT * FROM tb_karyawan WHERE
										 username_k='$admin_input_sk'");
                    $dataa  = mysql_fetch_array($queryy);
					$nama_k = $dataa['nama_k'];
					
					if($id_sk == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Surat Keluar</li>
      </ol>
		
          <hr>		
          <div class="form-group">
            <label>Nomor =</label>
            <font style="color: #007bff;"><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Tanggal =</label>
            <font style="color: #007bff;"><?php echo $tanggal_skk; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Penerima =</label>
            <font style="color: #007bff;"><?php echo $nama_pp; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Perihal =</label>
            <font style="color: #007bff;"><?php echo $perihal_sk; ?></font>
          </div>
		  <hr>
   		  <div class="form-group">
            <label>Keterangan =</label>
            <font style="color: #007bff;"><?php echo $keterangan_sk; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
			<label>File =</label>
			<a href="../files/<?php echo $file_sk; ?>" target="_blank"><?php echo $file_sk; ?></a>
		  </div>	
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Oleh =</label>
            <font style="color: #007bff;"><?php echo $nama_k; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Pada =</label>
            <font style="color: #007bff;"><?php echo $tanggal_input_skk; ?> ( <?php echo $jam_input_sk; ?> )</font>
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