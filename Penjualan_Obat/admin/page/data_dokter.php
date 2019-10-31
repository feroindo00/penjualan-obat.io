	<?php
	$cek_session = $_SESSION['username_karyawan'];
	$queryy = "select * from karyawan where username_karyawan='$cek_session'";
	$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
	while($data = mysqli_fetch_array($sqll)){ 
		$id_level_karyawan = $data['id_level_karyawan'];
	}
	
	if($id_level_karyawan == '1' ){
	?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Dokter</li>
      </ol>
	  <a href='index?p=tambah_dokter' class="btn btn-sm btn-primary" style="width: 100%;">Tambah Dokter</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Dokter</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from dokter order by id_dokter desc";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysqli_fetch_array($sqll)){ 
				$nama_dokter = $data['nama_dokter'];
				$username_dokter = $data['username_dokter'];
				$password_dokter = $data['password_dokter'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_dokter&id=<?php echo $username_dokter;?>'><?php echo $nama_dokter; ?></a></td>
                  <td><center>
				  <a href='index?p=ubah_dokter&id=<?php echo $username_dokter;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_dokter&id=<?php echo $username_dokter;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Karyawan <?php echo $nama_dokter;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
				  </center></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
	
<?php
}
	  
if($id_level_k == '2' OR $id_level_k == '3'){
?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data dokter</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data dokter</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from dokter order by id_dokter desc";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysql_fetch_array($sqll)){ 
				$nama_dokter = $data['nama_dokter'];
				$username_dokter = $data['username_dokter'];
				$password_dokter = $data['password_dokter'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_dokter&id=<?php echo $username_dokter;?>'><?php echo $nama_dokter; ?></a></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->

<?php
}
?>	