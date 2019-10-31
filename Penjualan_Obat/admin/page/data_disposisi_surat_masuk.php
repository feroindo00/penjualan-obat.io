	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Disposisi Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Disposisi Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tujuan</th>
				  <th>Keterangan</th>
				  <th>Tanggal</th>
				  <th>Status Konfirmasi</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tujuan</th>
				  <th>Keterangan</th>
				  <th>Tanggal</th>
				  <th>Status Konfirmasi</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_disposisi_surat_masuk, tb_karyawan, tb_surat_masuk where tb_disposisi_surat_masuk.tujuan_dsm=tb_karyawan.username_k and tb_disposisi_surat_masuk.nomor_dsm=tb_surat_masuk.nomor_sm order by id_dsm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_dsm = $data['id_dsm'];
				  $nomor_dsm = $data['nomor_dsm'];
				  $keterangan_dsm = $data['keterangan_dsm'];
				  $tanggal_input_dsm = $data['tanggal_input_dsm'];
				  $tanggal_input_dsmm = $hari[date("w", strtotime($tanggal_input_dsm))].", ".date("j", strtotime($tanggal_input_dsm))." ".$bulan[date("n", strtotime($tanggal_input_dsm))]." ".date("Y", strtotime($tanggal_input_dsm));						                  								
				  $id_sm = $data['id_sm'];
				  $pengirim_sm = $data['pengirim_sm'];
				  $username_k = $data['username_k'];
				  $nama_k = $data['nama_k'];
				  $terima_tolak_dsm = $data['terima_tolak_dsm'];
				  $alasan_tolak_dsm = $data['alasan_tolak_dsm'];		
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_dsm; ?></a></td>
				  <td><a href='index?p=detail_karyawan&id=<?php echo $username_k;?>'><?php echo $nama_k; ?></a></td>
				  <td><?php echo $keterangan_dsm; ?></td>
				  <td><?php echo $tanggal_input_dsmm; ?></td>
				  <?php
				  if($terima_tolak_dsm == '1'){
				  ?>
				  <td>Telah Di Terima</td>
				  <?php
				  }
				  if($terima_tolak_dsm == '2'){
				  ?>
				  <td>Telah Di Tolak Dengan Alasan <?php echo $alasan_tolak_dsm; ?></td>
				  <?php
				  }
				  if($terima_tolak_dsm == '0'){
				  ?>
				  <td>Belum Dikonfirmasi</td>
				  <?php
				  }
				  ?>
				  <td><center>
				  <a href='index?p=ubah_disposisi_surat_masuk&id=<?php echo $id_dsm;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_disposisi_surat_masuk&id=<?php echo $id_dsm;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Disposisi Surat Masuk <?php echo $pengirim_sm; ?>-<?php echo $nomor_dsm; ?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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