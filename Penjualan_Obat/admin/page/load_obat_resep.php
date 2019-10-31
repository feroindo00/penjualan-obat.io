<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Load Obat</li>
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
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
        				  <th>Harga Suplier</th>
        				  <th>Harga Jual</th>
        				  <th>Jumlah Obat</th>
        				  <th>Jenis Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
        				  <th>Pengaturan</th>
                </tr>
              </thead>
              
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "SELECT * FROM resep_obat, jenis_obat WHERE
                     resep_obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat asc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){
				$id_resep_obat = $data['id_resep_obat'];
				$nama_obat = $data['nama_obat'];
				$suplier = $data['suplier'];
				$harga_suplier = $data['harga_suplier'];
				$harga_jual = $data['harga_jual'];
				$jumlah_obat = $data['jumlah_obat'];
        $jumlah_pemasukan = $data['jumlah_pemasukan'];
        $id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
       
				$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $id_resep_obat; ?></td>
                  <td><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
        				  <td><?php echo $jumlah_obat; ?></td>
        				  <td><?php echo $jenis_obat; ?></td>
        				  <td><?php echo $tanggal_kadaluarsa; ?></td>
                  <td><center>
				  <a href='index?p=tambah_transaksi_action_resep&id=<?php echo $id_resep_obat;?>' class="btn btn-sm btn-success"method="post">Pilih</a> 
				 
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
