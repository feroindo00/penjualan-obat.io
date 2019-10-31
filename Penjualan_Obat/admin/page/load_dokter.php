<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Dokter</li>
      </ol>

<div class="card mb-3">
<div class="card-header">
 <i class="fa fa-table"></i> Tabel Data obat</div>
<div class="card-body">
<div class="table-responsive">
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"method="post">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Dokter</th>
                  <th>Klinik</th>
        				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "SELECT * FROM dokter ORDER BY nama_dokter asc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){
				$id_dokter = $data['id_dokter'];
        $username_dokter = $data['username_dokter'];
        $password_dokter = $data['password_dokter'];
        $nama_dokter = $data['nama_dokter'];
        $klinik_dokter = $data['klinik_dokter'];
        $id_level_karyawan = $data['id_level_karyawan'];
        $admin_input_karyawan = $data['admin_input_karyawan'];
        $tanggal_input = $data['tanggal_input'];
        $jam_input = $data['jam_input'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $nama_dokter; ?></td>
                  <td><?php echo $klinik_dokter; ?></td>

                  <td><center>
				  <a href='index?p=tambah_transaksi_resep_test&id=<?php echo $id_dokter;?>' class="btn btn-sm btn-success"method="post">Pilih</a> 
				 
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
            </form>
