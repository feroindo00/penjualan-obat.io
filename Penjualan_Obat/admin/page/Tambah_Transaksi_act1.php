<div class="container-fluid">
		<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Transaksi</li>
      </ol>
	<!--breadcumb end-->
	<div class="box">
		<h4>Tambah Data Obat <br><br>
			<!--<a href='index?p=data_transaksi'class="btn btn-info btn-xs" style="width: 15%;">Kembali</a>
			<a href='index?p=Tambah_Transaksi1'class="btn btn-primary btn-xs" style="width: 15%;">Tambah Data Lagi</a>!-->
		</h4>
		<div class="rows">
			<div class="col-lg-15 col-lg-offset-2">
				<form action='index?p=Tambah_Transaksi_act_Proses' method="post">
					
					<table class="table">
						<tr>
							<b>Data Transaksi</b>
						</tr>
						<tr>
							<th>No Nota</th>
							<th>Tanggal</th>
							
							
						</tr>
						 
							
							<tr>
								
								 <?php
					               $carikode = mysql_query("SELECT id from transaksi") or die (mysql_error());
					                // menjadikannya array
					                $datakode = mysql_fetch_array($carikode);
					                $jumlah_data = mysql_num_rows($carikode);
					                // jika $datakode
					                if ($datakode) {
					                 // membuat variabel baru untuk mengambil kode barang mulai dari 1
					                 $nilaikode = substr($jumlah_data[0], 1);
					                 // menjadikan $nilaikode ( int )
					                 $kode = (int) $nilaikode;
					                 // setiap $kode di tambah 1
					                 $kode = $jumlah_data + 1;
					                 // hasil untuk menambahkan kode 
					                 // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
					                 // atau angka sebelum $kode
					                 $kode_otomatis = "J".str_pad($kode, 3, "0", STR_PAD_LEFT);
					                } else {
					                 $kode_otomatis ="J"."001";
					                }
               					 ?>
								<td>
									<input type="text" name="no_penjualan" value="<?php echo $kode_otomatis; ?>" class="form-control" readonly="readonly" required>
								</td>
								<td>
									<input type="date" name="tanggal" class="form-control" required>
								</td>
								
								
								
							</tr>
							<tr>
								<th><center>Nama Barang</center></th>
								<th><center>Harga jual</center></th>
								<th>Jumlah</th>
								
							</tr>
							<tr>
								<td>
									<!--<input type="text" name="nama barang-" class="form-control" required>!-->
									<select class="form-control" name="nama" id="nama" onchange="document.getElementById('prd_name').value = prdName[this.value]">
										<option value='' hidden='true'>Pilih Obat</option>
										<?php 
											$brg=mysql_query("select * from obat");
											$jsArray="var prdName = new Array();";
											while($b=mysql_fetch_array($brg)){
										?>	
										<option value="<?php echo $b['nama_obat']; ?>"><?php echo $b['nama_obat'] ?></option>
										<?php
											$jsArray .= "prdName['" . $b['nama_obat'] . "'] = '" . addslashes($b['harga_jual']) . "';";
										?>
										<?php 
										}
										?>
									</select>
								</td><br>
								<td>
									<center><input type="text" name="harga" class="form-control" id="prd_name" readonly="readonly" style="width: 50%;" required></center>
								</td>
								<td>
									<input type="text" name="jumlah" class="form-control" required><br><br>
									<div class="form-group pull-right">
									<input type="submit" name="btnTambah" value="Tambah" class="btn btn-succes">
								</div>
								</td>
								
							</tr>
					<table class="table">
							<tr><b>Daftar Barang</b></tr>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>jumlah</th>
								<th>Substotal</td>
							</tr>
						<?php
						$totalbayar=0;
						$jumlahbarang=0;

						$tmpsql="select obat.nama_obat, tmp.*from transaksi_tmp as tmp left join obat on tmp.kd_obat = obat.kd_obat order by obat.kd_obat";
						$tmpqry=mysql_query($tmpsql) or die (mysql_error());
						$nomor=0;
						while($tmpdata=mysql_fetch_array($tmpqry)){
							$nomor++;
							$total_harga = $tmpdata['harga']*$tmpdata['jumlah'];
							$totalbayar=$totalbayar+$total_harga;
							$jumlahbarang=$jumlahbarang+$tmpdata['jumlah'];
						
						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $tmpdata['kd_obat']?></td>
							<td><?php echo $tmpdata['nama_obat'] ?></td>
							<td><?php echo number_format($tmpdata['harga'])?></td>
							<td><?php echo $tmpdata['jumlah']?></td>
							<td><?php echo number_format($total_harga);?></td>
							<td><a href="index?p=delete&id=<?php echo $tmpdata['id'];?>">delete</a></td>
						</tr>
					<?php }?>
					</table>
							<!--<tr>
								<th>Total Pembayaran</th>
								<td>
									<input type="text" name="total_pembayaran" class="form-control" required>
								</td>
							</tr>!-->
						
					<div class="form-group pull-right">
						<input type="submit" name="Tambah_Transaksi_act1" value="Simpan Semua" class="btn btn-succes">
					</div>
					<script type="text/javascript">
						<?php echo $jsArray ?>
					</script>
				</form>
				
			</div>
		</div>
	</div>
</div>