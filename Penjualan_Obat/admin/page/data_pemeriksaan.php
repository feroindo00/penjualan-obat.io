	<?php
	$cek_session = $_SESSION['username_k'];
	$queryy = "select * from tb_karyawan where username_k='$cek_session'";
	$sqll = mysql_query($queryy) or die(mysql_error());
	while($data = mysql_fetch_array($sqll)){ 
		$id_level_k = $data['id_level_k'];
	}
	
	if($id_level_k == '2'){
	?>


	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Pemeriksaan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pemeriksaan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_pemeriksaan, tb_pasien where tb_pemeriksaan.id_p_pks=tb_pasien.id_p order by id_pks desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pks = $data['id_pks'];
				$id_p = $data['id_p'];
				$nama_p = $data['nama_p'];
				$alamat_p = $data['alamat_p'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_pasien&id=<?php echo $id_p;?>'><?php echo $nama_p; ?></a></td>
				  <td><?php echo $alamat_p; ?></td>
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
		  
	if($id_level_k == '3'){
	?>

	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Pemeriksaan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pemeriksaan</div>
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
				$queryy = "select * from tb_pemeriksaan, tb_pasien where tb_pemeriksaan.id_p_pks=tb_pasien.id_p and status_pks=0 order by id_pks desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pks = $data['id_pks'];
				$id_p = $data['id_p'];
				$nama_p = $data['nama_p'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_pasien&id=<?php echo $id_p;?>'><?php echo $nama_p; ?></a></td>
                  <td><center>
				  <a href='index?p=tambah_pemeriksaan&id=<?php echo $id_p;?>' class="btn btn-sm btn-warning">Periksa</a> 
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
	?>	