<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>INPUT PENJUALAN OBAT DENGAN RESEP</b></li>
      </ol>
<?php
//error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	$id = $_GET['id'];
    $query = mysql_query("SELECT * FROM resep_obat WHERE id_resep_obat='$id'")or die(mysql_error());
	$obat = mysql_fetch_array($query);
	//kode otomatis
	$qkode = mysql_query("select max(id_jual) from transaksi_jual_resep");
	$kode = mysql_fetch_array($qkode);
	if($kode){
		$nilai = $kode[0];
		$nilai = substr($nilai, 4);
		$nilai = (int)$nilai;
		$kodebaru = $nilai+1;
		$kodeotomatis = "PJNR".str_pad($kodebaru,5,"0",STR_PAD_LEFT);
	}
	else{
		$kodeotomatis="PJNR0001";
	}

?>

	
	<p><b>KODE PENJUALAN = <?php echo $kodeotomatis; ?></b></p>
	<form action="" class="form-inline" method="post">
		<a href="index?p=data_transaksi_resep" class="btn btn-info">Kembali</a> &nbsp;
		<a href="index?p=load_obat_resep" class="btn btn-info">Load Obat</a> &nbsp;
		<input type="text" placeholder="pilih obat..." readonly="readonly" value="<?php echo $obat['nama_obat'];?>" class="form-control"> &nbsp;&nbsp;
		<input type="number" max="<?php echo $obat['jumlah_obat'];?>" Name="jumlah"placeholder="jumlah beli max <?php echo $obat['jumlah_obat'];?>"class="form-control"> &nbsp;
		<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary"><br>
	</form>
	<?php
		if (isset($_POST['tambah'])) {
			$id_resep_obat = $obat['id_resep_obat'];
			$jumlah = $_POST['jumlah'];
			$jumlah_harga = $obat['harga_jual'] * $jumlah;

			mysql_query("insert into keranjang_resep(id_resep_obat,jumlah,harga) values('$id_resep_obat','$jumlah','$jumlah_harga')");
			$stok=$obat['jumlah_obat']-$jumlah;
			
			mysql_query("update resep_obat set jumlah_obat='$stok'where id_resep_obat='$id_resep_obat'");
		?><br>
		<div class="alert alert-success">
			Berhasil Tambah Keranjang!
		</div>
		<meta http-equiv="refresh" content="1; url='index?p=tambah_transaksi_action_resep'">
		<?php
	}
	?>
	<hr>
	<h3>&nbsp;<span class="fa fa-shopping-cart" >&nbsp;</span>&nbsp;Keranjang</h3>
<div class="table-responsive">
	<table class="table table-bordered" >
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama</th>
			<th>Jenis Obat</th>
			<th>Jumlah</th>
			<th>harga</th>
			<th>jumlah harga</th>
			<th>aksi</th>
		</tr>
		<?php
		$no = 1;
			$qker=mysql_query("SELECT resep_obat.*,keranjang_resep.*,jenis_obat.* FROM keranjang_resep INNER JOIN resep_obat on resep_obat.id_resep_obat=keranjang_resep.id_resep_obat INNER JOIN jenis_obat on jenis_obat.id_jenis_obat=resep_obat.id_jenis_obat");
			while ($data=mysql_fetch_array($qker)) {
				$id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
			
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['id_resep_obat']?></td>
			<td><?php echo $data['nama_obat']?></td>
			<td><?php echo $jenis_obat?></td>
			<td><?php echo $data['jumlah']?></td>
			<td>Rp. <?php echo $data['harga_jual']?>,-</td>
			<td>Rp. <?php echo $data['harga']?>,-</td>
			<td>
				<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_ker_resep&id_keranjang=<?php echo $data['id_keranjang']?>&kd_obat=<?php echo $data['id_resep_obat']?>&jumlah=<?php echo $data['jumlah']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="5">Total Harga</th>
			<td>Rp. 
				<?php
				$qtotal = mysql_query("select sum(harga) as total from keranjang_resep"); 
				$total= mysql_fetch_array($qtotal);
				echo number_format($total['total'],2);

				?>
			</td>
		</tr>
	</table>
</div>
	<hr>
	<?php

		$qk = mysql_query("select * from keranjang_resep");
		$cek=mysql_num_rows($qk);
		if($cek > 0){
	?>
	<div class="row">
		<div class="col-md-4">
			<h1>
				<small>Harga Total</small><br>
				Rp. <?php echo number_format($total['total'],2);?>
			</h1>
			<form action="" class="form-inline" method="post">
				<input type="number" name="uang" placeholder="masukan pembayaran" class="form-control" required="required" min="<?php echo $total['total'];?>">&nbsp;
				<input type="submit" name="proses" value="proses" class="btn btn-success">
			</form>
		</div>
		<div class="col-md-4">
			<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysql_query("insert into detil_transaksi_resep(id_transaksi,id_resep_obat,jumlah,harga,id_jual) select id_keranjang,id_resep_obat,jumlah,harga,'$kodeotomatis' from keranjang_resep");
					//masukan data ke transaksi_jual
					mysql_query("insert into transaksi_jual_resep(id_jual,total,uang,kembali,tanggal) values('$kodeotomatis','$total[total]','$uang','$kembali','$tanggal')");
					
				?>
				<blockquote>
					<h3>
						<small>_Uang Pembayaran</small>
						Rp. <?php echo number_format($uang);?>,00
					</h3>
					<h2>
						<small>_Uang Kembali</small>
						Rp. <?php echo number_format($kembali);?>,00
					</h2>
				</blockquote>
			<?php 
				}
			?>
		</div>
		<div class="col-md-4">
			<br><br>
			<a href="index?p=selesai_resep" class="btn btn-success"><span class="fa fa-trash">
				Hapus Keranjang
			</span></a>&nbsp;
			<a href="index?p=cetak_nota_resep&id=<?php echo $kodeotomatis;?>" target="_blank" class="btn btn-success"><span class="fa fa-print"></span>&nbsp; Cetak Nota</a><br><br>
			<a href="index?p=cancel_resep" class="btn btn-danger">
				Cancel
			</a>&nbsp;
		</div>
	</div><br><br>
	<?php
		}
	?>
</div>