	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Pengirim & Penerima Surat</li>
      </ol>
	  <a href='index?p=tambah_pengirim_penerima' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pengirim & Penerima Surat</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode</th>
				  <th>Nama</th>
				  <th>Keterangan</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Kode</th>
				  <th>Nama</th>
				  <th>Keterangan</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_pengirim_penerima order by id_pp desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pp = $data['id_pp'];
				$kode_pp = $data['kode_pp'];
				$nama_pp = $data['nama_pp'];
				$keterangan_pp = $data['keterangan_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kode_pp; ?></td>
				  <td><?php echo $nama_pp; ?></td>
				  <td><?php echo $keterangan_pp; ?></td>
                  <td><center>
				  <a href='index?p=ubah_pengirim_penerima&id=<?php echo $id_pp;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_pengirim_penerima&id=<?php echo $id_pp;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Pengirim & Penerima Surat <?php echo $nama_pp;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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