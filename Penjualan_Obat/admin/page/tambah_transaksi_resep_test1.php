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
        <li class="breadcrumb-item active"><b>INPUT PENJUALAN DENGAN RESEP</b></li>
      </ol>
<a href='index?p=data_transaksi_resep'class="btn btn-primary">Kembali</a><br>
<?php
//error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	//$id = $_GET['id'];
	$nama_obat = $_POST['nama_obat'];
    $query = mysqli_query($con,"SELECT * FROM resep_obat where nama_obat='$nama_obat' ")or die(mysqli_error());
	$obat = mysqli_fetch_array($query);
	//kode otomatis
	$qkode = mysqli_query($con,"select max(id_jual) from transaksi_jual_resep");
	$kode = mysqli_fetch_array($qkode);
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

?><br>
    <div class="row">
    <div class="col-md-5">
    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    	<label>Nama Obat</label><br>
    	<select class="form-control" name="nama_obat" id="nama_obat" onchange="changeValue(this.value)">
    	 <option value='' hidden='true'>Pilih Jenis Obat</option>
          <?php  
          $id_resep_obat = $_GET['id_resep_obat'];
          $sql = "select * from resep_obat" ;
          $jsArray="var prdName = new Array();";
          $result = mysqli_query($con,$sql);
          while($data = mysqli_fetch_array($result)){
          $nama_obat = $data['nama_obat'];
          ?>
          <option value='<?php echo $nama_obat; ?>'><?php echo $nama_obat; ?></option>
          <?php
			$jsArray .= "prdName['" . $data['nama_obat'] . "'] = {id_resep_obat:'" . addslashes($data['id_resep_obat']) . "',
						jumlah_obat:'".addslashes($data['jumlah_obat'])."',
						satuan:'".addslashes($data['satuan'])."'
						};";
		  ?>
           <?php 
       			}
           ?>
    	</select><br><br>
    	<label>Kode Obat</label>
    	<input type="text" class="form-control" name="id_resep_obat" id="id_resep_obat">
    	<label>Jumlah Stok</label>
    	<input type="text" class="form-control" name="jumlah_obat" id="jumlah_obat">
    	<label>Jumlah Beli</label>
    	<input type="number" class="form-control" name="jumlah" id="jumlah">
    	<label>Satuan</label>
    	<input type="text" class="form-control" name="satuan" id="satuan"><br>
    	<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary">
    	</div>
    	<div class="col-md-5">
	    	<!--<label>Dokter</label>
	    	<input type="text" class="form-control" name="dokter" id="dokter">
	    	<label>Rs/Klinik</label>
	    	<input type="text" class="form-control" name="lokasi" id="lokasi">
	    	<label>Note</label>
	    	<textarea type="textarea" class="form-control" name="note" id="note"></textarea><br><!-->
	   
	   <!--<input type="submit" name="tambah" value="tambah ke keranjang" class="btn btn-primary"><!-->
	  </div>
    </form>
	</div>
	<?php
		if (isset($_POST['tambah'])) {
			$id_resep_obat = $obat['id_resep_obat'];
			$jumlah_obat = $obat['jumlah_obat'];
			$nama_obat = $_POST['nama_obat'];
			$jumlah = $_POST['jumlah'];
			$dokter = $_POST['dokter'];
			$lokasi = $_POST['lokasi'];
			$note = $_POST['note'];
			$jumlah_harga = $obat['harga_jual'] * $jumlah;
			$modal = $obat['harga_suplier'];
			$laba = $jumlah_harga-$modal;
			//$labaa = $laba*$jumlah;
			$hpp = $obat['harga_jual']+$laba;
			$tanggal=date('y-m-d');
			//mysql_query("insert into keranjang_resep(id_resep_obat,jumlah,harga,laba,hpp) values('$id_resep_obat','$jumlah','$jumlah_harga','$labaa','$hpp')");
			//mysql_query("insert into keranjang_resepp(id_keranjang,id_resep_obat,jumlah,dokter,lokasi,note) select id_keranjang,id_resep_obat,jumlah,harga,laba,hpp from keranjang_resep");

			
			mysqli_query($con,"insert into keranjang_resep(id_keranjang,id_resep_obat,jumlah,harga,laba,hpp,id_jual) values('','$id_resep_obat','$jumlah','$jumlah_harga','$laba','$hpp','$kodeotomatis')");
			//masukan data keranjang ke detil_transaksi_resep
			mysqli_query($con,"insert into detil_keranjang_resep(id_jual,id_resep_obat,dokter,lokasi,note) values('$kodeotomatis','$id_resep_obat','$dokter','$lokasi','$note')");
			
			$stok=$obat['jumlah_obat']-$jumlah;
			
			mysqli_query($con,"update resep_obat set jumlah_obat='$stok'where id_resep_obat='$id_resep_obat'");
			$kk=mysqli_query($con,"select * from kartu_stock_resep where tanggal='$tanggal' and nama_obat='$nama_obat'");
			$k=mysqli_fetch_array($kk);
			$l=mysqli_num_rows($kk);
			if($l){
				$updatekartu=$k['obat_keluar']+$jumlah;
				mysqli_query($con,"UPDATE kartu_stock_resep set 
														jumlah_obat = '$jumlah_obat',
														sisa_stok = '$stok',
														obat_keluar = '$updatekartu'
													  where
														tanggal = '$tanggal'
													  and
													  	nama_obat = '$nama_obat'");
			}
			else{
				mysqli_query($con,"insert into kartu_stock_resep(id_resep_obat,tanggal,nama_obat,jumlah_obat,sisa_stok,obat_keluar) values('$id_resep_obat','$tanggal','$nama_obat','$jumlah_obat','$stok','$jumlah')");
			}
		?><br>
		<div class="alert alert-success">
			Berhasil Tambah Keranjang!
		</div>
		<meta http-equiv="refresh" content="1; url='index?p=tambah_transaksi_resep_test1'">
		<?php
	}
	?>
	<hr>
	<p><b>KODE PENJUALAN = <?php echo $kodeotomatis; ?></b></p>
	<h3>&nbsp;<span class="fa fa-shopping-cart" >&nbsp;</span>&nbsp;Keranjang</h3>
	<hr>
	<div class="table-bordered">
		<table class="table table-responsive">
			<tr>
				<th>No.</th>
				<th>Dokter</th>
				<th>Nama Pasien</th>
				<th>Lokasi</th>
				<th>Bukti Resep</th>
				<th>Note</th>
				<th>Aksi</th>
			</tr>
			<?php
			$no = 1;
			$zepeto = mysqli_query($con,"SELECT * FROM detil_keranjang_resep where id_jual='$kodeotomatis'");
			while($renpaku=mysqli_fetch_array($zepeto)){
				$dokter = $renpaku['dokter'];
				$nama = $renpaku['nama'];
				$lokasi = $renpaku['lokasi'];
				$upload_resep = $renpaku['upload_resep'];
				$note = $renpaku['note'];
			?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $dokter ?></td>
				<td><?php echo $nama ?></td>
				<td><?php echo $lokasi ?></td>
				<td><center><img src="../files/<?php echo $upload_resep ?>" style="width: 50px;"/></center></td>
				<td><?php echo $note ?></td>
				<td>
				<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_detail_ker&id_jual=<?php echo $renpaku['id_jual']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			</td>
			</tr>
		<?php 
			}
		?>
		</table>
	</div>
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
			$qker=mysqli_query($con,"SELECT resep_obat.*,keranjang_resep.*,jenis_obat.* FROM keranjang_resep INNER JOIN resep_obat on resep_obat.id_resep_obat=keranjang_resep.id_resep_obat INNER JOIN jenis_obat on jenis_obat.id_jenis_obat=resep_obat.id_jenis_obat");
			while ($data=mysql_fetch_array($qker)) {
				$id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
			
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['id_resep_obat']?></td>
			<td><?php echo $data['nama_obat']?></td>
			<td><?php echo $data['satuan']?></td>
			<td><?php echo $data['jumlah']?></td>
			<td>Rp. <?php echo $data['harga_jual']?>,-</td>
			<td>Rp. <?php echo $data['harga']?>,-</td>
			<td>
				<a onclick="return confirm('akan dihapus ?')" href="index?p=hapus_ker_resep&id_keranjang=<?php echo $data['id_keranjang']?>&id_resep_obat=<?php echo $data['id_resep_obat']?>&jumlah=<?php echo $data['jumlah']?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
			</td>
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="6">Total Harga</th>
			<td>Rp. 
				<?php
				$qtotal = mysqli_query($con,"select sum(harga) as total from keranjang_resep"); 
				$total= mysqli_fetch_array($qtotal);
				echo number_format($total['total'],2);

				?>
			</td>
		</tr>
		
	</table>
	</div>
		<a href="index?p=cancel_resep&id_jual=<?php echo $kodeotomatis;?>" class="btn btn-danger">
			<span class="fa fa-trash">
				Cancel
		</a>
	<hr>
	<?php

		$qk = mysqli_query($con,"select * from keranjang_resep");
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
			<form action="" class="form-inline" method="post">
				<input type="number" name="uang" placeholder="masukan pembayaran" class="form-control" required="required" min="<?php echo $total['total'];?>">&nbsp;
				<button class="btn btn-primary" type="submit" name="proses" id="tambah" <?php echo isset($_POST["proses"]) ? "disabled" : "";?>>Proses</button>
			</form>
			</div>
		</div>
		<div class="col-md-4">
			<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysqli_query($con,"insert into detil_transaksi_resep(id_transaksi,id_resep_obat,jumlah,harga,id_jual,laba,hpp) select id_keranjang,id_resep_obat,jumlah,harga,'$kodeotomatis',laba,hpp from keranjang_resep");
					mysqli_query($con,"insert into detil_transaksi_resepp(id_jual,id_resep_obat,dokter,nama,lokasi,upload_resep,note) select '$kodeotomatis',id_resep_obat,dokter,nama,lokasi,upload_resep,note from detil_keranjang_resep");
					//mysql_query("insert into detil_transaksi_resepp(id_transaksi,dokter,lokasi,note) select id_keranjang,dokter,lokasi,note from keranjang_resepp");
					//masukan data ke transaksi_jual
					mysqli_query($con,"insert into transaksi_jual_resep(id_jual,total,uang,kembali,tanggal) values('$kodeotomatis','$total[total]','$uang','$kembali','$tanggal')");
					
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
			<a href="index?p=cetak_nota_resep1&id_jual=<?php echo $kodeotomatis;?>&id_resep_obat=<?php echo $id_resep_obat;?>" class="btn btn-success"><span class="fa fa-print"></span>&nbsp; Cetak Nota</a>
			<a href="index?p=selesai_resep" class="btn btn-success">
				Selesai
			</a>&nbsp;
			<br><br>
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
		document.getElementById('id_resep_obat').value = prdName[nama_obat].id_resep_obat;  
		document.getElementById('jumlah_obat').value = prdName[nama_obat].jumlah_obat;
		document.getElementById('satuan').value = prdName[nama_obat].satuan;
	}; 
   	</script>
