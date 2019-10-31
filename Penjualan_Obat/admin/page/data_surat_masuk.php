	<?php
	$cek_session = $_SESSION['username_k'];
	$queryy = "select * from tb_karyawan where username_k='$cek_session'";
	$sqll = mysql_query($queryy) or die(mysql_error());
	while($data = mysql_fetch_array($sqll)){ 
		$id_level_k = $data['id_level_k'];
	}
	
	if($id_level_k == '3'){
	?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Surat Masuk</li>
      </ol>
	  <a href='index?p=tambah_surat_masuk' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Status Disposisi</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Status Disposisi</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp order by id_sm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sm = $data['id_sm'];
				  $nomor_sm = $data['nomor_sm'];
				  $tanggal_sm = $data['tanggal_sm'];
				  $tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  								
				  $pengirim_sm = $data['pengirim_sm'];
				  $perihal_sm = $data['perihal_sm'];
				  $keterangan_sm = $data['keterangan_sm'];
				  $file_sm = $data['file_sm'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></a></td>
				  <td><?php echo $tanggal_smm; ?></td>
				  <td>
				  <?php
				  $cek_disposisi = mysql_query("select * from tb_disposisi_surat_masuk where nomor_dsm='$nomor_sm'");
				  $cek_disposisii = mysql_num_rows($cek_disposisi);
				  $dataa = mysql_fetch_array($cek_disposisi);
				  $admin_input_dsm = $dataa['admin_input_dsm'];
				  $tujuan_dsm = $dataa['tujuan_dsm'];
				  
				  if($cek_disposisii > 0){
					  
				  $queryy = "select * from tb_karyawan where username_k='$admin_input_dsm'";
				  $sqll = mysql_query($queryy) or die(mysql_error());
				  $dataaa = mysql_fetch_array($sqll); 
				  $nama_k = $dataaa['nama_k'];
				  
				  $queryyy = "select * from tb_karyawan where username_k='$tujuan_dsm'";
				  $sqlll = mysql_query($queryyy) or die(mysql_error());
				  $dataaaa = mysql_fetch_array($sqlll); 
				  $nama_kk = $dataaaa['nama_k'];	  
				  ?>
				  Telah Didisposisi Oleh <?php echo $nama_k;?> Kepada <?php echo $nama_kk;?>
				  <?php
				  }
				  
				  if($cek_disposisii == 0){
				  ?>
				  Belum Didisposisi
				  <?php
				  }
				  ?>
				  </td>
                  <td><center>
				  <a href='index?p=ubah_surat_masuk&id=<?php echo $id_sm;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_surat_masuk&id=<?php echo $id_sm;?>&idi=<?php echo $file_sm;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Surat Masuk <?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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
	  
if($id_level_k == '4'){
?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp order by id_sm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sm = $data['id_sm'];
				  $nomor_sm = $data['nomor_sm'];
				  $tanggal_sm = $data['tanggal_sm'];
				  $tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  								
				  $pengirim_sm = $data['pengirim_sm'];
				  $perihal_sm = $data['perihal_sm'];
				  $keterangan_sm = $data['keterangan_sm'];
				  $file_sm = $data['file_sm'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></a></td>
				  <td><?php echo $tanggal_smm; ?></td>
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

if($id_level_k == '1' OR $id_level_k == '2'){
?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp order by id_sm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sm = $data['id_sm'];
				  $nomor_sm = $data['nomor_sm'];
				  $tanggal_sm = $data['tanggal_sm'];
				  $tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  								
				  $pengirim_sm = $data['pengirim_sm'];
				  $perihal_sm = $data['perihal_sm'];
				  $keterangan_sm = $data['keterangan_sm'];
				  $file_sm = $data['file_sm'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></a></td>
				  <td><?php echo $tanggal_smm; ?></td>
                  <td><center>
				  <?php
				  $cek_disposisi = mysql_query("select * from tb_disposisi_surat_masuk where nomor_dsm='$nomor_sm'");
				  $data = mysql_fetch_array($cek_disposisi);
				  $cek_disposisii = mysql_num_rows($cek_disposisi);
				  $admin_input_dsm = $data['admin_input_dsm'];
				  $tujuan_dsm = $data['tujuan_dsm'];				  
				  
				  if($cek_disposisii > 0){
					  
				  $queryy = "select * from tb_karyawan where username_k='$admin_input_dsm'";
				  $sqll = mysql_query($queryy) or die(mysql_error());
				  $dataa = mysql_fetch_array($sqll); 
				  $nama_k = $dataa['nama_k'];
				  
				  $queryyy = "select * from tb_karyawan where username_k='$tujuan_dsm'";
				  $sqlll = mysql_query($queryyy) or die(mysql_error());
				  $dataaa = mysql_fetch_array($sqlll); 
				  $nama_kk = $dataaa['nama_k'];	  
				  ?>
				  Telah Didisposisi Oleh <?php echo $nama_k;?> Kepada <?php echo $nama_kk;?>
				  <?php
				  }
				  
				  if($cek_disposisii == 0){
				  ?>
				  <a href='index?p=tambah_disposisi_surat_masuk&id=<?php echo $id_sm;?>' class="btn btn-sm btn-warning">Disposisi</a>
				  <?php
				  }
				  ?>
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