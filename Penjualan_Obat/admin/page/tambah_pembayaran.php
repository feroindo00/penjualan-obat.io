					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
					$idi = $_GET['idi'];
                    $query = mysql_query("SELECT * FROM tb_pemeriksaan, tb_pasien, tb_obat WHERE 
										 tb_pemeriksaan.id_p_pks=tb_pasien.id_p AND
										 tb_pemeriksaan.id_o_pks=tb_obat.id_o AND
										 id_pks='$id'");
                    $data  = mysql_fetch_array($query);
					$id_pks = $data['id_pks'];
					$nama_p = $data['nama_p'];
					$harga_o = $data['harga_o'];
					
					if($id_pks == $id){					
                    ?>

<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Pembayaran</li>
      </ol>
					
		<form method='post' role="form">
		  <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type='text' name="id_p_pks" id="id_p_pks" value="<?php echo $nama_p; ?>" required autocomplete='off' readonly>
          </div>
          <div class="form-group">
            <label>Harga Pemeriksaan</label>
            <input class="form-control" type='number' name="harga_periksa_pby" id="harga_periksa_pby" placeholder="Masukkan Harga Pemeriksaan Disini ..." autofocus required autocomplete='off'>
          </div>
		  <div class="form-group">
            <label>Harga Obat</label><br>
			<?php echo $harga_o; ?>
		  </div>
          <center><button type="submit" name="tambah_pembayaran" class="btn btn-sm btn-success">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
        </form>
		<br>
		
</div>
			
	<?php
	include 'control_pembayaran.php';
	?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	