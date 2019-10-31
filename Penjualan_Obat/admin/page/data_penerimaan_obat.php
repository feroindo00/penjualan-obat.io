<!--Custom Dropdown Select2-->
<link href="../vendor/select2/dist/css/select2.min.css" rel="stylesheet">
<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>Penerimaan Obat</b></li>
        <li class="breadcrumb-item"><a href="index?p=history_penerimaan_obat">History</a></li>
      </ol>
      <div class="row">
      	<div class="col-md-5">
      		<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
      			<label>Nama Obat</label>
      				<select class="form-control" name="nama_obat" id="nama_obat" onchange="changeValue(this.value)">
			    	 <option value='' hidden='true'>Pilih Jenis Obat</option>
			          <?php  
			          $kd_obat = $_GET['kd_obat'];
			          $sql = "SELECT * FROM obat, jenis_obat WHERE
			                     obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat asc" ;
			          $jsArray="var prdName = new Array();";
			          $result = mysqli_query($con,$sql);
			          while($data = mysqli_fetch_array($result)){
			          $nama_obat = $data['nama_obat'];
			          ?>
			          <option value='<?php echo $nama_obat; ?>'><?php echo $nama_obat; ?></option>
			          <?php
						$jsArray .= "prdName['" . $data['nama_obat'] . "'] = {kd_obat:'" . addslashes($data['kd_obat']) . "',
									jumlah_per_satuan:'".addslashes($data['jumlah_per_satuan'])."',
									jumlah_obat:'".addslashes($data['jumlah_obat'])."',
									tanggal_kadaluarsa:'".addslashes($data['tanggal_kadaluarsa'])."',
									harga_suplier:'".addslashes($data['harga_suplier'])."'
									};";
					  ?>
			           <?php 
			       			}
			           ?>
			    	</select><br>
			    	<?php 
      			$tanggall = date('d-m-y');
      			?>
			    <label>Tanggal</label>
      			<input type="text" class="form-control" placeholder="<?php echo $tanggall?>" readonly="readonly">
			    <label>Kode Obat</label>
			    <input type="text" class="form-control" name="kd_obat" id="kd_obat">
			    <label>Tanggal Kadaluarsa</label>
			    <input type="text" class="form-control" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa">
			    <label>Jumlah Satuan</label>
			    <input type="text" class="form-control" name="jumlah_per_satuan" id="jumlah_per_satuan" readonly="readonly">
			    <!--<label>Jumlah Obat Saat Ini</label>-->
			    <input type="hidden" class="form-control" name="jumlah_obat" id="jumlah_obat">
			    <label>Jumlah Obat</label>
			    <input type="text" class="form-control" name="jumlah" id="jumlah">
			    <label>Harga Suplier</label>
			    <input type="number" class="form-control" name="harga_suplier" id="harga_suplier">
			    <br>
			    <input type="submit" name="tambah_penerimaan" class="btn btn-primary">
      		</form><br>
      	</div>
      </div>
	<div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Obat Tanpa Resep</div>
        <div class="card-body">
          <div class="table table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>No</th>
                	<th>Kode Obat</th>
                	<th>Nama Obat</th>
                	<th>suplier</th>
        			<th>Harga Suplier</th>
        			<th>Harga Jual</th>
                	<th>Harga Satuan</th>
        			<th>Jenis Kemasan</th>
                  	<th>Jenis Satuan</th>
                  	<th>Jumlah Obat</th>
                  	<th>Jumlah Per-Satuan</th>
                  	<th>Stok Per-Satuan</th>
        			<th>Tanggal Kadaluarsa</th>
                </tr>
              </thead>
            <tbody>
			  <?php
				$no = 1;				
				$queryy = "SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysqli_fetch_array($sqll)){
				$kd_obat = $data['kd_obat'];
				$nama_obat = $data['nama_obat'];
				$suplier = $data['suplier'];
				$harga_suplier = $data['harga_suplier'];
				$harga_jual = $data['harga_jual'];
        		$harga_satuan = $data['harga_satuan'];
				$jumlah_obat = $data['jumlah_obat'];
        		$jumlah_pemasukan = $data['jumlah_pemasukan'];
				$id_jenis_obat = $data['id_jenis_obat'];
        		$jenis_obat = $data['jenis_obat'];
        		$satuan = $data['satuan'];
        		$jumlah_per_satuan = $data['jumlah_per_satuan'];
        		$stok_per_satuan = $data['stok_per_satuan'];
				$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kd_obat; ?></td>
                  <td><a href='index?p=kartu_stock_obat&id=<?php echo $kd_obat;?>&nama_obat=<?php echo $nama_obat;?>'><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
                  <td><?php echo $harga_satuan; ?></td>
        		  <td><?php echo $jenis_obat; ?></td>
                  <td><?php echo $satuan; ?></td>
                  <td><?php echo $jumlah_obat; ?></td>
                  <td><?php echo $jumlah_per_satuan; ?></td>
                  <td><?php echo $stok_per_satuan; ?></td>
        		  <td><?php echo $tanggal_kadaluarsa; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>

</div>
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
		document.getElementById('jumlah_per_satuan').value = prdName[nama_obat].jumlah_per_satuan;  
		document.getElementById('jumlah_obat').value = prdName[nama_obat].jumlah_obat;
		document.getElementById('tanggal_kadaluarsa').value = prdName[nama_obat].tanggal_kadaluarsa;
		document.getElementById('harga_suplier').value = prdName[nama_obat].harga_suplier;

	};
	
	//$('#my_button').on('click', function(){
                //alert('Button clicked. Disabling...');
               // $('#my_button').attr("disabled", true);
           // }); 

   	</script>
<?php
	include 'control_penerimaan_obat.php';
?>