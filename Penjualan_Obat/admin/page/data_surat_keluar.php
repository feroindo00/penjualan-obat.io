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
        <li class="breadcrumb-item active">Data Surat Keluar</li>
      </ol>
	  <a href='index?p=tambah_surat_keluar' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Status Persetujuan</th>
				  <th>Status Pengiriman</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Status Persetujuan</th>
				  <th>Status Pengiriman</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_keluar, tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp order by id_sk desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sk = $data['id_sk'];
				  $nomor_sk = $data['nomor_sk'];
				  $tanggal_sk = $data['tanggal_sk'];
				  $tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  								
				  $penerima_sk = $data['penerima_sk'];
				  $perihal_sk = $data['perihal_sk'];
				  $keterangan_sk = $data['keterangan_sk'];
				  $file_sk = $data['file_sk'];
				  $nama_pp = $data['nama_pp'];
				  $admin_persetujuan_sk = $data['admin_persetujuan_sk'];
				  $admin_pengiriman_sk = $data['admin_pengiriman_sk'];
				  
				  $queryyy = "select * from tb_karyawan where username_k='$admin_persetujuan_sk'";
				  $sqlll = mysql_query($queryyy) or die(mysql_error());
				  $dataaa = mysql_fetch_array($sqlll); 
				  $nama_kk = $dataaa['nama_k'];
				  
				  $queryyyy = "select * from tb_karyawan where username_k='$admin_pengiriman_sk'";
				  $sqllll = mysql_query($queryyyy) or die(mysql_error());
				  $dataaaa = mysql_fetch_array($sqllll); 
				  $nama_kkk = $dataaaa['nama_k'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_keluar&id=<?php echo $id_sk;?>'><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></a></td>
				  <td><?php echo $tanggal_skk; ?></td>
				  <?php
				  $cek_persetujuan_sk = mysql_query("select * from tb_surat_keluar where id_sk='$id_sk'");
				  $data = mysql_fetch_array($cek_persetujuan_sk); 
				  $persetujuan_sk = $data['persetujuan_sk'];
				  
				  if($persetujuan_sk == '1'){
				  ?>
				  <td>Telah Disetujui Oleh <?php echo $nama_kk;?></td>
				  <?php 
				  }
				  if($persetujuan_sk == '0'){
				  ?>
				  <td>Belum Disetujui</td>
				  <?php
				  }			  
				  $cek_pengiriman_sk = mysql_query("select * from tb_surat_keluar where id_sk='$id_sk'");
				  $data = mysql_fetch_array($cek_pengiriman_sk); 
				  $pengiriman_sk = $data['pengiriman_sk'];
				  
				  if($pengiriman_sk == '1'){
				  ?>
				  <td>Telah Dikirim Oleh <?php echo $nama_kkk;?></td>
				  <?php 
				  }
				  if($pengiriman_sk == '0'){
				  ?>
				  <td>Belum Dikirim</td>
				  <?php
				  }
				  ?>
                  <td><center>
				  <a href='index?p=ubah_surat_keluar&id=<?php echo $id_sk;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_surat_keluar&id=<?php echo $id_sk;?>&idi=<?php echo $file_sk;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Surat Keluar <?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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
        <li class="breadcrumb-item active">Data Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Keluar</div>
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
				$queryy = "select * from tb_surat_keluar, tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp order by id_sk desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sk = $data['id_sk'];
				  $nomor_sk = $data['nomor_sk'];
				  $tanggal_sk = $data['tanggal_sk'];
				  $tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  								
				  $penerima_sk = $data['penerima_sk'];
				  $perihal_sk = $data['perihal_sk'];
				  $keterangan_sk = $data['keterangan_sk'];
				  $file_sk = $data['file_sk'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_keluar&id=<?php echo $id_sk;?>'><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></a></td>
				  <td><?php echo $tanggal_skk; ?></td>
				  <td><center>
				  <?php
				  $cek_pengiriman_sk = mysql_query("select * from tb_surat_keluar where id_sk='$id_sk'");
				  $data = mysql_fetch_array($cek_pengiriman_sk); 
				  $pengiriman_sk = $data['pengiriman_sk'];
				  $admin_pengiriman_sk = $data['admin_pengiriman_sk'];

				  $queryy = "select * from tb_karyawan where username_k='$admin_pengiriman_sk'";
				  $sqll = mysql_query($queryy) or die(mysql_error());
				  $dataa = mysql_fetch_array($sqll); 
				  $nama_k = $dataa['nama_k'];
				  
				  if($pengiriman_sk == '1'){
				  ?>
				  Telah Dikirim Oleh <?php echo $nama_k;?>
				  <?php
				  } 
				  if($pengiriman_sk == '0'){
				  ?>
				  <a href='index?p=pengiriman_surat_keluar&id=<?php echo $id_sk;?>' class="btn btn-sm btn-success">Telah Dikirim</a>
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

if($id_level_k == '1' OR $id_level_k == '2'){
?>

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Surat Keluar</div>
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
				$queryy = "select * from tb_surat_keluar, tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp order by id_sk desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sk = $data['id_sk'];
				  $nomor_sk = $data['nomor_sk'];
				  $tanggal_sk = $data['tanggal_sk'];
				  $tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  								
				  $penerima_sk = $data['penerima_sk'];
				  $perihal_sk = $data['perihal_sk'];
				  $keterangan_sk = $data['keterangan_sk'];
				  $file_sk = $data['file_sk'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_keluar&id=<?php echo $id_sk;?>'><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></a></td>
				  <td><?php echo $tanggal_skk; ?></td>
                  <td><center>
				  <?php
				  $cek_persetujuan_sk = mysql_query("select * from tb_surat_keluar where id_sk='$id_sk'");
				  $data = mysql_fetch_array($cek_persetujuan_sk); 
				  $persetujuan_sk = $data['persetujuan_sk'];
				  $admin_persetujuan_sk = $data['admin_persetujuan_sk'];

				  $queryy = "select * from tb_karyawan where username_k='$admin_persetujuan_sk'";
				  $sqll = mysql_query($queryy) or die(mysql_error());
				  $dataa = mysql_fetch_array($sqll); 
				  $nama_k = $dataa['nama_k'];
				  
				  if($persetujuan_sk == '1'){
				  ?>
				  Telah Disetujui Oleh <?php echo $nama_k;?>
				  <?php
				  } 
				  if($persetujuan_sk == '0'){
				  ?>
				  <a href='index?p=persetujuan_surat_keluar&id=<?php echo $id_sk;?>' class="btn btn-sm btn-success">Setuju</a>
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