<!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom Dropdown select2 -->
  <link href="../vendor/select2/dist/css/select2.min.css" rel="stylesheet">
 <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>INPUT PENJUALAN TANPA RESEP</b></li>
      </ol>
<a href='index?p=data_transaksi'class="btn btn-primary">Kembali</a><br>
<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	//$id = $_GET['id'];
	$nama_obat = $_POST['nama_obat'];
    $query = mysql_query("SELECT * FROM obat where nama_obat='$nama_obat' ")or die(mysql_error());
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

?><br>
    <div class="row">
    <div class="col-md-5">
    <form action="" method="post" class="form-horizontal">
    	<label>Nama Obat</label><br>
    	<select class="form-control" name="nama_obat" id="nama_obat" onchange="changeValue(this.value)">
    	 <option value='' hidden='true'>Pilih Jenis Obat</option>
          <?php  
          $kd_obat = $_GET['kd_obat'];
          $sql = "select * from obat" ;
          $jsArray="var prdName = new Array();";
          $result = mysql_query($sql);
          while($data = mysql_fetch_array($result)){
          $nama_obat = $data['nama_obat'];
          ?>
          <option value='<?php echo $nama_obat; ?>'><?php echo $nama_obat; ?></option>
          <?php
			$jsArray .= "prdName['" . $data['nama_obat'] . "'] = {kd_obat:'" . addslashes($data['kd_obat']) . "',
						jumlah_obat:'".addslashes($data['jumlah_obat'])."',
						satuan:'".addslashes($data['satuan'])."'
						};";
		  ?>
           <?php 
       			}
           ?>
    	</select><br><br>
    
    	<label>Kode Obat</label>
    	<input type="text" class="form-control" name="kd_obat" id="kd_obat">
    	<label>Jumlah Stok</label>
    	<input type="text" class="form-control" name="jumlah_obat" id="jumlah_obat">
    	<label>Jumlah Beli</label>
    	<input type="number" class="form-control" name="jumlah" id="jumlah">
    	<label>Satuan</label>
    	<input type="text" class="form-control" name="satuan" id="satuan"><br>
    	<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary">
    </form>
	</div>
	</div>
	<?php
		if (isset($_POST['tambah'])) {
			$kd_obat = $obat['kd_obat'];
			$jumlah = $_POST['jumlah'];
			$jumlah_harga = $obat['harga_jual'] * $jumlah;
			$modal = $obat['harga_suplier'];
			$laba = $jumlah_harga-$modal;
			//$labaa = $laba*$jumlah;
			$hpp = $modal+$laba;

			mysql_query("insert into keranjang(kd_obat,jumlah,laba,hpp,harga) values('$kd_obat','$jumlah','$laba','$hpp','$jumlah_harga')");
			$stok=$obat['jumlah_obat']-$jumlah;
			
			mysql_query("update obat set jumlah_obat='$stok'where kd_obat='$kd_obat'");
		?><br>
		<div class="alert alert-success">
			Berhasil Tambah Keranjang!
		</div>
		<meta http-equiv="refresh" content="1; url='index?p=tambah_transaksi_test'">
		<?php
	}
	?>
	<hr>
	<p><b>KODE PENJUALAN = <?php echo $kodeotomatis; ?></b></p>
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
			$qker=mysql_query("SELECT obat.*,keranjang.*,jenis_obat.* FROM keranjang INNER JOIN obat on obat.kd_obat=keranjang.kd_obat INNER JOIN jenis_obat on jenis_obat.id_jenis_obat=obat.id_jenis_obat");
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
			<th class="text-right" colspan="6">Total Harga</th>
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
				<input type="submit" name="proses" value="proses" class="btn btn-success">
				<!--<a href="index?p=tambah_transaksi_test1" class="btn btn-success" name="proses" value="proses">Proses</a>!-->
			</form>
		</div>
		<div class="col-md-4">
			<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysql_query("insert into detil_transaksi(id_transaksi,kd_obat,jumlah,harga,laba,hpp,id_jual) select id_keranjang,kd_obat,jumlah,harga,laba,hpp,'$kodeotomatis' from keranjang");
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
			<a href="index?p=cetak_nota1&id=<?php echo $kodeotomatis;?>" class="btn btn-success"><span class="fa fa-print"></span>&nbsp; Cetak Nota</a><br><br>
			<a href="index?p=cancel_nonresep" class="btn btn-danger">
				Cancel
			</a>&nbsp;
		</div>
	</div><br><br>
	<?php
		}
	?>
</div>

	<script src="../vendor/jquery/jquery.min.js"></script>
 <!-- Custom Dropdown select2-->
    <script src="../vendor/select2/dist/js/select2.min.js"></script>
   	<script type="text/javascript">
   		$(document).ready( function(){
   			$(".form-control").select2({
   				placeholder:"pilih obat..."
   			})
   		});
   		<?php echo $jsArray;?>
   		function changeValue(nama_obat){  
		document.getElementById('kd_obat').value = prdName[nama_obat].kd_obat;  
		document.getElementById('jumlah_obat').value = prdName[nama_obat].jumlah_obat;
		document.getElementById('satuan').value = prdName[nama_obat].satuan;
	}; 
   	</script>
