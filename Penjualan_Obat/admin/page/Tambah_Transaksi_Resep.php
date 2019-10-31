<div class="container-fluid">
		<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Transaksi Resep</li>
      </ol>
	<!--breadcumb end-->
	<div class="box">
		<h4>Tambah Data Transaksi Resep <br><br>
			<a href='index?p=data_pasien'class="btn btn-info btn-xs" style="width: 15%;">Kembali</a>
			<a href='index?p=proses_pasien'class="btn btn-primary btn-xs" style="width: 15%;">Tambah Data Lagi</a>
		</h4>
		<div class="rows">
			<div class="col-lg-12">
				<div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr>
	                  <th>Nama</th>
					  <th>Alamat</th>
	          		  <th>Resep Pasien</th>
	                </tr>
	              </thead>
	              <tbody>
				  <?php
					$no = $_GET['id'];				
					$queryy = "select * from pasien where id_pasien= $no";
					$sqll = mysql_query($queryy) or die(mysql_error());
					while($data = mysql_fetch_array($sqll)){ 
					$id_pasien = $data['id_pasien'];
					$nama_pasien = $data['nama_pasien'];
					$alamat_pasien = $data['alamat_pasien'];
	       		 	$resep_pasien = $data['resep_pasien'];
				  ?>
	                <tr>
	                 
	                  <td><a href='index?p=detail_pasien&id=<?php echo $id_pasien;?>'><?php echo $nama_pasien; ?></a></td>
					  <td><?php echo $alamat_pasien; ?></td>
	          		  <td><?php echo nl2br ($resep_pasien); ?></td>
	                </tr>
				  <?php
					$no++; }
				  ?>	
	              </tbody>
	            </table>
	          </div>
			</div>
			<div class="col-lg-15 col-lg-offset-2">
				<form action='index?p=Tambah_Transaksi_act_Proses' method="post">
					<input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
					<table class="table">
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Nama Barang</th>
							<th>Harga jual</th>
							<th>Jumlah</th>
							
						</tr>
						<?php 
							for($i=1; $i<=$_POST['count_add']; $i++){?>
							<tr>
								<td><?=$i?></td>
								<td>
									<input type="date" name="tanggal<?=$i?>" class="form-control" required>
								</td>
								<td>
									<!--<input type="text" name="nama barang-" class="form-control" required>!-->
									<select class="form-control" name="nama<?=$i?>" id="nama" onchange="document.getElementById('prd_name<?=$i?>').value = prdName[this.value]">
										<?php 
											$brg=mysql_query("select * from obat");
											$jsArray="var prdName = new Array();";
											while($b=mysql_fetch_array($brg)){
										?>
										<option value='' hidden='true'>Pilih Obat</option>	
										<option value="<?php echo $b['nama_obat']; ?>"><?php echo $b['nama_obat'] ?></option>
										<?php
											$jsArray .= "prdName['" . $b['nama_obat'] . "'] = '" . addslashes($b['harga_jual']) . "';";
										?>
										<?php 
										}
										?>
									</select>
								</td>
								<td>
									<input type="text" name="harga<?=$i?>" class="form-control" id="prd_name<?=$i?>" required>
								</td>
								<td>
									<input type="text" name="jumlah<?=$i?>" class="form-control" required>
								</td>
								
							</tr>
						<?php
							}
						?>
					</table>
					<div class="form-group pull-right">
						<input type="submit" name="Tambah_Transaksi_act1" value="Simpan Semua" class="btn btn-succes">
					</div>
					<script type="text/javascript">
						<?php echo $jsArray ?>
					</script>
				</form>
				<?php
				include 'Tambah_Transaksi_act_Proses.php';
				?>
			</div>
		</div>
	</div>
</div>