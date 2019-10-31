					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_pembayaran, tb_pemeriksaan, tb_pasien WHERE
										 tb_pembayaran.id_pks_pby=tb_pemeriksaan.id_pks AND
										 tb_pembayaran.id_p_pby=tb_pasien.id_p AND
										 id_pby='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pby = $data['id_pby'];
					$id_pks_pby = $data['id_pks_pby'];
					$nama_p = $data['nama_p'];
					$harga_periksa_pby = $data['harga_periksa_pby'];
					$harga_obat_pby = $data['harga_obat_pby'];
					$total_harga_pby = $data['total_harga_pby'];
					$admin_input_pby = $data['admin_input_pby'];
					$tanggal_input_pby = $data['tanggal_input_pby'];
					$tanggal_input_pbyy = $hari[date("w", strtotime($tanggal_input_pby))].", ".date("j", strtotime($tanggal_input_pby))." ".$bulan[date("n", strtotime($tanggal_input_pby))]." ".date("Y", strtotime($tanggal_input_pby));						                  			
					$jam_input_pby = $data['jam_input_pby'];
					
					$queryy = mysql_query("SELECT * FROM tb_karyawan WHERE
										 username_k='$admin_input_pby'");
                    $dataa  = mysql_fetch_array($queryy);
					$nama_kk = $dataa['nama_k'];
					
					if($id_pby == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Pembayaran</li>
      </ol>
					
		  <hr>
          <div class="form-group">
            <label>Nomor Pemeriksaan =</label>
            <font style="color: #007bff;"><?php echo $id_pks_pby; ?></font>
          </div>
		  <hr>
          <div class="form-group">
            <label>Nama Pasien =</label>
            <font style="color: #007bff;"><?php echo $nama_p; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Harga Pemeriksaan =</label>
            <font style="color: #007bff;"><?php echo $harga_periksa_pby; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Harga Obat =</label>
            <font style="color: #007bff;"><?php echo $harga_obat_pby; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Total Harga =</label>
            <font style="color: #007bff;"><?php echo $total_harga_pby; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Oleh =</label>
            <font style="color: #007bff;"><?php echo $nama_kk; ?></font>
          </div>
		  <hr>
		  <div class="form-group">
            <label>Ditambahkan Pada =</label>
            <font style="color: #007bff;"><?php echo $tanggal_input_pbyy; ?> ( <?php echo $jam_input_pby; ?> )</font>
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