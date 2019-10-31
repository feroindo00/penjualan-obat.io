<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Laporan Data Stok Obat</li>
      </ol>
     
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Stok Obat</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
                  <th>Harga Suplier</th>
                  <th>Harga Jual</th>
                  <th>Jumlah Obat</th>
                  <th>Jenis Satuan</th>
                  <th>Tanggal Kadaluarsa</th>
                  
                </tr>
              </thead>
              <tbody>
        <?php
        $no = 1;        
        $queryy = "SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat and jumlah_obat <=10 ";
        $sqll = mysqli_query($con,$queryy) or die(mysqli_error());
        while($data = mysqli_fetch_array($sqll)){
        $kd_obat = $data['kd_obat'];
        $nama_obat = $data['nama_obat'];
        $suplier = $data['suplier'];
        $harga_suplier = $data['harga_suplier'];
        $harga_jual = $data['harga_jual'];
        $jumlah_obat = $data['jumlah_obat'];
        $id_jenis_obat = $data['id_jenis_obat'];
        $jenis_obat = $data['jenis_obat'];
        $tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
        ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kd_obat; ?></td>
                  <td><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
                  <td><?php echo $jumlah_obat; ?></td>
                  <td><?php echo $jenis_obat; ?></td>
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
      <center><a href='index?p=unduh_laporan_obat_stok' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Laporan</a></center><br><br>
    </div>
    <!-- /.container-fluid-->