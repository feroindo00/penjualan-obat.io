<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>INPUT PENJUALAN TANPA RESEP</b></li>
      </ol>
<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	$id = $_GET['id'];
    $query = mysql_query("SELECT * FROM obat WHERE kd_obat='$id'")or die(mysql_error());
	$obat = mysql_fetch_array($query);
	//kode otomatis
	$qkode = mysql_query("select max(id_jual) from transaksi_jual");
	$kode = mysql_fetch_array($qkode);
	if($kode){
		$nilai = $kode[0];
		$nilai = substr($nilai, 3);
		$nilai = (int)$nilai;
		$kodebaru = $nilai+1;
		$kodeotomatis = "PJN".str_pad($kodebaru,4,"0",STR_PAD_LEFT);
	}
	else{
		$kodeotomatis="PJN0001";
	}

?>

	
	<p><b>KODE PENJUALAN = <?php echo $kodeotomatis; ?></b></p>
	<form action="" class="form-inline" method="post">
		<a href="index?p=data_transaksi" class="btn btn-info">Kembali</a> &nbsp;
		<a href="index?p=load_obat" class="btn btn-info">Load Obat</a> &nbsp;
		<input type="text" placeholder="pilih obat..." readonly="readonly" value="<?php echo $obat['nama_obat'];?>" class="form-control"> &nbsp;&nbsp;
		<input type="number" max="<?php echo $obat['jumlah_obat'];?>" Name="jumlah"placeholder="jumlah beli max <?php echo $obat['jumlah_obat'];?>"class="form-control"> &nbsp;
		<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary"><br>
	</form>
	<?php
		if (isset($_POST['tambah'])) {
			$kd_obat = $obat['kd_obat'];
			$jumlah = $_POST['jumlah'];
			$jumlah_harga = $obat['harga_jual'] * $jumlah;

			mysql_query("insert into keranjang(kd_obat,jumlah,harga) values('$kd_obat','$jumlah','$jumlah_harga')");
			$stok=$obat['jumlah_obat']-$jumlah;
			
			mysql_query("update obat set jumlah_obat='$stok'where kd_obat='$kd_obat'");
		?><br>
		<div class="alert alert-success">
			Berhasil Tambah Keranjang!
		</div>
		<meta http-equiv="refresh" content="1; url='index?p=Tambah_Transaksi_action'">
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
			$qker=mysql_query("SELECT obat.*,keranjang.*,jenis_obat.* FROM keranjang INNER JOIN obat on obat.kd_obat=keranjang.kd_obat INNER JOIN jenis_obat on jenis_obat.id_jenis_obat = obat.id_jenis_obat");
			while ($data=mysql_fetch_array($qker)) {
				$id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
			
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['kd_obat']?></td>
			<td><?php echo $data['nama_obat']?></td>
			<td><?php echo $jenis_obat?></td>
			<td><?php echo $data['jumlah']?></td>
			<td>Rp. <?php echo $data['harga_jual']?>,-</td>
			<td>Rp. <?php echo $data['harga']?>,-</td>
			<td>
				<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_ker&id_keranjang=<?php echo $data['id_keranjang']?>&kd_obat=<?php echo $data['kd_obat']?>&jumlah=<?php echo $data['jumlah']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="5">Total Harga</th>
			<td>Rp. 
				<?php
				$qtotal = mysql_query("select sum(harga) as total from keranjang"); 
				$total= mysql_fetch_array($qtotal);
				echo number_format($total['total'],2);

				?>
			</td>
		</tr>
	</table>
</div>
	<hr>
	<?php

		$qk = mysql_query("select * from keranjang");
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
				<input type="submit" name="proses"  value="proses"  class="btn btn-success">
				<!--id="Btn" onclick="myFunction()"!-->
			</form>
		</div>
		<div class="col-md-4">
			<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysql_query("insert into detil_transaksi(id_transaksi,kd_obat,jumlah,harga,id_jual) select id_keranjang,kd_obat,jumlah,harga,'$kodeotomatis' from keranjang");
					//masukan data ke transaksi_jual
					mysql_query("insert into transaksi_jual(id_jual,total,uang,kembali,tanggal) values('$kodeotomatis','$total[total]','$uang','$kembali','$tanggal')");
					
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
			<a href="index?p=selesai" class="btn btn-success"><span class="fa fa-trash">
				Hapus Keranjang
			</span></a>&nbsp;
			<a href="index?p=cetak_nota&id=<?php echo $kodeotomatis;?>" target="_blank" class="btn btn-success"><span class="fa fa-print">&nbsp; Cetak Nota</span></a><br><br>
			<a href="index?p=cancel_nonresep" class="btn btn-danger">
				Cancel
			</a>&nbsp;
		</div>
	</div><br><br>
	<?php
		}
	?>
</div>

<script>
function myFunction() {
    var x = document.getElementById("Btn");
    x.disabled = true;
}
</script>