	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Jabatan Karyawan</li>
      </ol>
	  <a href='index?p=tambah_jabatan_karyawan' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Jabatan Karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Jabatan</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Jabatan</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from jabatan order by id_jabatan_karyawan desc";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysqli_fetch_array($sqll)){ 
				$id_jabatan_karyawan = $data['id_jabatan_karyawan'];
				$level_jabatan_karyawan = $data['level_jabatan_karyawan'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $level_jabatan_karyawan; ?></td>
                  <td><center>
				  <a href='index?p=ubah_jabatan_karyawan&id=<?php echo $id_jabatan_karyawan;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_jabatan_karyawan&id=<?php echo $id_jabatan_karyawan;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Jabatan <?php echo $level_jabatan_karyawan;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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