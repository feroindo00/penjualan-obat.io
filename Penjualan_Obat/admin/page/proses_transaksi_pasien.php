<div class="container-fluid">
		<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Transaksi Resep Pasien</li>
      </ol>
	<!--breadcumb end-->
	<?php
	error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
		$id=$_GET['id'];
		$kuer = mysql_query("SELECT * FROM obat WHERE kd_obat='$id'") or die (mysqli_error());
		$rpas = mysql_fetch_array($kuer);
		$qcode = mysql_query("select max(id_jual) from transaksi_jual");
		$code = mysql_fetch_array($qcode);
		if($code){
			$nilai = $code[0];
			$nilai = substr($nilai, 3);
			$nilai = (int)$nilai;
			$newcode = $nilai+1;
			$codeotomatic = "PJN".str_pad($newcode,4,"0",STR_PAD_LEFT);
		}
		else{
			$codeotomatic="PJN0001";
		}
	?>
	<P><b>KODE PENJUALAN = <?php echo $codeotomatic;?></b></P>
			
	<form action="" class="form-inline" method="post">
		<a href='index?p=Transaksi_Resep'class="btn btn-info">Kembali</a> &nbsp;
		<a href="index?p=load_obat_resep" class="btn btn-info">Load Obat Resep</a>&nbsp;
		<input type="text" placeholder="Pilih Obat..." readonly="readonly" value="<?php echo $rpas['nama_obat'];?>" class="form-control">&nbsp;
		<input type="number" max="<?php echo $rpas['jumlah_obat'];?>" name="jumlah" placeholder="jumlah beli max <?php echo $rpas['jumlah_obat'];?>" class="form-control">&nbsp;
		<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary">
	</form><br>
	
	<?php
		if(isset($_POST['tambah'])){
			$kd_obat = $rpas['kd_obat'];
			$jumlah = $_POST['jumlah'];
			$jumlah_harga = $rpas['harga_jual'] * $jumlah;

			mysql_query("insert into keranjang(kd_obat,jumlah,harga) values('$kd_obat','$jumlah','$jumlah_harga')");
			$stok=$rpas['jumlah_obat']-$jumlah;
			mysql_query("update obat set jumlah_obat='$stok' where kd_obat='$kd_obat'");
	?><br>
	<div class="alert alert-success">
		Berhasil Tambah Keranjang
	</div>
	<meta http-equiv="refresh" content="1; url='index?p=proses_transaksi_pasien'">
	<?php	
		} 
	?>
	<hr>
	<h3>&nbsp;<span class="fa fa-shopping-cart">&nbsp;</span>&nbsp;Keranjang</h3>
	<div class="table-responsive">
		<table class=" table table-bordered">
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Jumlah Harga</th>
				<th>Aksi</th>
			</tr>
			<?php
				$no=1;
				$qurr=mysql_query("SELECT obat.*,keranjang.* FROM keranjang INNER JOIN obat ON obat.kd_obat=keranjang.kd_obat");
				while($data=mysql_fetch_array($qurr)){ 
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['kd_obat']; ?></td>
				<td><?php echo $data['nama_obat'];?></td>
				<td><?php echo $data['jumlah']; ?></td>
				<td>Rp.	<?php echo $data['harga_jual'];?>,-</td>
				<td>Rp.	<?php echo $data['harga']; ?>,-</td>
				<td>
					<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_ker_resep&id_keranjang=<?php echo $data['id_keranjang']?>&kd_obat=<?php echo $data['kd_obat']?>&jumlah=<?php echo $data['jumlah']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
				</td>
			</tr>
			<?php
				} 
			?>
			<tr>
				<th class="text-right" colspan="5" >Total Harga</th>
				<td>
					Rp. 
					<?php
						$qtot = mysql_query("select sum(harga) as total from keranjang");
						$tot=mysql_fetch_array($qtot);
						echo number_format($tot['total'],2);
					?>
				</td>
			</tr>
		</table>
	</div>
	<hr>
	<?php
		$qcart = mysql_query("select * from keranjang");
		$ck = mysql_fetch_array($qcart);
		if($ck > 0 ){
	?>
	<div class="row">
		<div class="col-md-4">
			<h1>
				<small>Harga Total</small><br>
				Rp.	<?php echo number_format($tot['total'],2);?>
			</h1>
			<form action="" class="form-inline" method="post">
				<input type="number" name="uang" placeholder="masukan pembayaran" class="form-control" required="required" min="<?php echo $tot['total'];?>">&nbsp;
				<input type="submit" name="proses" values="proses" class="btn btn-success"> 
			</form>
		</div>
		<div class="col-md-4">
			<?php
				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $tot['total'];

					$tanggal = date('y-m-d');
					$qa=mysql_query("INSERT INTO transaksi(id_transaksi,kd_obat,jumlah,harga,id_jual) SELECT id_keranjang,kd_obat,jumlah,harga,'$codeotomatic' FROM keranjang");
					mysql_query("INSERT INTO transaksi_jual(id_jual,total,uang,kembali,tanggal) VALUES ('$codeotomatic','$tot[total]','$uang','$kembali','$tanggal')");
			?>
			<blockquote>
				<h3>
					<small>_Uang Pembeli</small>
					Rp. <?php echo number_format($uang,2);?>
				</h3>
				<h2>
					<small>_Uang Kembali</small>
					Rp.	<?php echo number_format($kembali,2);?>
				</h2>
			</blockquote>
			<?php
				}
			?>
		</div>
		<div class="col-md-4">
			<br><br>
			<a href="index?p=selesai" class="btn btn-success">
				Enter
			</a>&nbsp;
			<a href="index?p=cetak_nota&id=<?php echo $codeotomatic;?>" target="_blank" class="btn btn-success"><spann class="fa fa-print"></spann></a>
		</div>
	</div><br><br>
	<?php
	} 
	?>
</div>