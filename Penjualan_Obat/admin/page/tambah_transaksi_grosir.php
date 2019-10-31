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

$querry = mysqli_query($con,"SELECT * FROM kartu_stock where kd_obat='$kd_obat'");
$kartu_resep = mysqli_fetch_array($querry);
?>
<?php
//error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	//$id = $_GET['id'];
	$nama_obat = $_POST['nama_obat'];
    $query = mysqli_query($con,"SELECT * FROM obat where nama_obat='$nama_obat' ")or die(mysql_error());
	$obat = mysqli_fetch_array($query);
	//kode otomatis
	$qkode = mysqli_query($con,"select max(id_jual) from transaksi_jual");
	$kode = mysqli_fetch_array($qkode);
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
          $sql = "SELECT * FROM obat" ;
          $jsArray="var prdName = new Array();";
          $result = mysqli_query($con,$sql);
          while($data = mysqli_fetch_array($result)){
          $nama_obat = $data['nama_obat'];
          ?>
          <option value='<?php echo $nama_obat; ?>'><?php echo $nama_obat; ?></option>
          <?php
			$jsArray .="prdName['" . $data['nama_obat'] . "'] = {kd_obat:'" . addslashes($data['kd_obat']) . "',
						stok_per_satuan	:'".addslashes($data['stok_per_satuan'])."',
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
    	<input type="text" class="form-control" name="stok_per_satuan" id="stok_per_satuan">
    	<label>Jenis Satuan</label>
    	<input type="text" class="form-control" name="satuan" id="satuan">
    	<!--<label>Satuan</label>
    	<input type="text" class="form-control" name="jenis_obat" id="jenis_obat">!-->
    	<!--<label>Satuan</label>
    	<select class="form-control" name="jenis_obat" id="jenis_obat">
    		<option value='' hidden='true' >Pilih Satuan</option>
    		<option value='Strip' >Strip</option>
    		<option value='Tube' >Tube</option>
    		<option value='Botol' >Botol</option>
    		<option value='Blister' >Blister</option>
    		<option value='Pcs' >Pcs</option>
    	</select>!--><br>
    	<label></label>
    	<label>Jumlah Beli</label>
    	<input type="number" class="form-control" name="jumlah" id="jumlah">
    	<br>
    	<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary">
    </form>
	</div>
	</div>
	<?php
		if (isset($_POST['tambah'])) {
			$kd_obat = $obat['kd_obat'];
			$jumlah = $_POST['jumlah'];
			$nama_obat = $_POST['nama_obat'];
			$jumlah_harga = $obat['harga_satuan'] * $jumlah;
			$jumlah_obat = $obat['jumlah_obat'];
			$stok_per_satuan = $obat['stok_per_satuan'];
			$modal = $obat['harga_suplier'];
			$laba = $jumlah_harga-$modal;
			//$labaa = $laba*$jumlah;
			$hpp = $obat['harga_satuan']+$laba;
			$tanggal =date('y-m-d');
			$tanggal_output = date('y-m-d');

			mysqli_query($con,"insert into keranjang(kd_obat,jumlah,laba,hpp,harga) values('$kd_obat','$jumlah','$laba','$hpp','$jumlah_harga')");
			$stok=$obat['jumlah_obat']-1;
			$stoksatuan=$obat['stok_per_satuan']-$jumlah;
			
			mysqli_query($con,"update obat set jumlah_obat='$stok', stok_per_satuan='$stoksatuan' where kd_obat='$kd_obat'");
			$kk=mysqli_query($con,"select * from kartu_stock where tanggal='$tanggal' and kd_obat='$kd_obat'");
			$k=mysqli_fetch_array($kk);
			$l=mysqli_num_rows($kk);
			if($l){
				$updatekartu=$k['obat_keluar']+$jumlah;
				mysqli_query($con,"UPDATE kartu_stock set jumlah_obat = '$jumlah_obat',
													sisa_stok = '$stok',
													obat_keluar = '$updatekartu'
													where
													tanggal = '$tanggal'
													  and
													kd_obat = '$kd_obat'");
			}
			else{
				mysqli_query($con,"insert into kartu_stock(kd_obat,tanggal,nama_obat,jumlah_obat,sisa_stok,obat_keluar) values('$kd_obat','$tanggal','$nama_obat','$jumlah_obat','$stok','$jumlah')");
			}
		?><br>
		<div class="alert alert-success">
			Berhasil Tambah Keranjang!
		</div>
		<meta http-equiv="refresh" content="1; url='index?p=tambah_transaksi_grosir'">
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
			<th>Jenis Kemasan</th>
			<th>QTY</th>
			<th>harga</th>
			<th>jumlah harga</th>
			<th>aksi</th>
		</tr>
		<?php
		$no = 1;
			$qker=mysqli_query($con,"SELECT obat.*,keranjang.*,jenis_obat.* FROM keranjang INNER JOIN obat on obat.kd_obat=keranjang.kd_obat INNER JOIN jenis_obat on jenis_obat.id_jenis_obat=obat.id_jenis_obat");
			while ($data=mysqli_fetch_array($qker)) {
				$id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
			
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['kd_obat']?></td>
			<td><?php echo $data['nama_obat']?></td>
			<td><?php echo $data['satuan']?></td>
			<td><?php echo $data['jumlah']?>&nbsp;<?php echo $data['satuan'] ?></td>
			<td>Rp. <?php echo $data['harga_satuan']?>,-</td>
			<td>Rp. <?php echo $data['harga']?>,-</td>
			<td>
				<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_ker_grosir&id_keranjang=<?php echo $data['id_keranjang']?>&kd_obat=<?php echo $data['kd_obat']?>&jumlah=<?php echo $data['jumlah']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="6">Total Harga</th>
			<td>Rp. 
				<?php
				$qtotal = mysqli_query($con,"select sum(harga) as total from keranjang"); 
				$total= mysqli_fetch_array($qtotal);
				echo number_format($total['total'],2);

				?>
			</td>
		</tr>
	</table>
	</div>

			<a href="index?p=cancel_nonresep" class="btn btn-danger">
			<span class="fa fa-trash">
				Cancel
			</a>
	<hr>
	<?php

		$qk = mysqli_query($con,"select * from keranjang");
		$cek=mysqli_num_rows($qk);
		if($cek > 0){
	?>
	<div class="row">
		<div class="col-md-4">
			<h1>
				<small>Harga Total</small><br>
				Rp. <?php echo number_format($total['total'],2);?>
			</h1>
			<div class="form-inline">
			<form action="" method="post">
				<input type="number" name="uang" placeholder="masukan pembayaran" class="form-control" required="required" min="<?php echo $total['total'];?>">&nbsp;
				<button class="btn btn-primary" type="submit" name="proses" id="tambah" <?php echo isset($_POST["proses"]) ? "disabled" : "";?>>Proses</button>
				
					<!--<input type="button" name="proses" id="my_button" value="proses" data-submit-value="hidden" disabled="disabled" class="btn btn-success">!-->
			</form>
			</div>
		</div>
		<div class="col-md-4">
			<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysqli_query($con,"insert into detil_transaksi(id_transaksi,kd_obat,jumlah,harga,laba,hpp,id_jual) select id_keranjang,kd_obat,jumlah,harga,laba,hpp,'$kodeotomatis' from keranjang");
					//masukan data ke transaksi_jual
					mysqli_query($con,"insert into transaksi_jual(id_jual,total,uang,kembali,tanggal) values('$kodeotomatis','$total[total]','$uang','$kembali','$tanggal')");
				

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
			<br>
			<br><br>	
			<a href="index?p=cetak_nota2&id=<?php echo $kodeotomatis;?>" class="btn btn-success"><span class="fa fa-print"></span>&nbsp; Cetak Nota</a>
			
			<a href="index?p=selesai" class="btn btn-success">
				Selesai
			</span></a>&nbsp;
		</div>
	</div><br><br>
	<?php
		}
	?>
</div>

	<script src="../vendor/jquery/jquery.min.js"></script>
 <!-- Custom Dropdown select2-->
 	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
		document.getElementById('stok_per_satuan').value = prdName[nama_obat].stok_per_satuan;
		document.getElementById('satuan').value = prdName[nama_obat].satuan;

	};
	
	//$('#my_button').on('click', function(){
                //alert('Button clicked. Disabling...');
               // $('#my_button').attr("disabled", true);
           // }); 

   	</script>
	<!--<script type="text/javascript">
		$('.form-disable').on('proses', functio(){
		var self = $(this),
			button = self.find('input[type="submit"], button'),
			submitValue = button.data('submit-value');

			button.attr('disabled','disabled').val("proses");

			return false;		
	)};
	</script>-->