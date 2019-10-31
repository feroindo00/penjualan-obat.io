	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Bagian Karyawan</li>
      </ol>
	  <a href='index?p=tambah_bagian_karyawan' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Bagian Karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Bagian</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Bagian</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_bagian_karyawan order by id_bk desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_bk = $data['id_bk'];
				$nama_bk = $data['nama_bk'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $nama_bk; ?></td>
                  <td><center>
				  <a href='index?p=ubah_bagian_karyawan&id=<?php echo $id_bk;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_bagian_karyawan&id=<?php echo $id_bk;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Bagian <?php echo $nama_bk;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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