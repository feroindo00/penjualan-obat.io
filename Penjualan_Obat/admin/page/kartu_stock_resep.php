<div class="container-fluid">
      <!-- Breadcrumbs-->
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="../">Home</a>
      </li>
    <li class="breadcrumb-item active"><b>Kartu Stock Obat</b></li>
  </ol>
<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#cari_tanggal" style='width: 100%; color: white;'>Cari Berdasarkan Tanggal</a>
<br>
<br>
<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> Kartu Stock Obat</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Tangal</th>
            <th>Nama Obat</th>
            <th>Obat Masuk</th>
            <th>Obat Keluar</th>
            <th>Sisa Stok</th>
          </tr>
        </thead>
              
        <tbody>
          <?php
           $id = $_GET['id'];
            //$nama_obat = $_GET['nama_obat'];
           //$tanggall = $_GET['tanggal'];
           $modal1=mysqli_query($con,"SELECT * FROM kartu_stock_resep where id_resep_obat ='$id' order by tanggal asc ");
           $modal11=mysqli_fetch_array($modal1);
           $query = "SELECT * FROM kartu_stock_resep where id_resep_obat ='$id' ";
           if(isset($_POST['cari_tanggal'])){
            $tanggal_awal=$_POST['tanggal_awal'];
            $tanggal_akhir=$_POST['tanggal_akhir'];
            $nama_obat = $_POST['nama_obat'];
            $id_resep_obat = $_POST['id_resep_obat'];
            $query="SELECT * FROM kartu_stock_resep where tanggal and tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' and id_resep_obat='$id'  order by tanggal";
           }
           $sql=mysqli_query($con,$query) or die (mysqli_error());
           while ($data = mysqli_fetch_array($sql)){
           $tanggal = $data['tanggal'];
           $tanggall = $hari[date("w", strtotime($tanggal))].", ".date("j", strtotime($tanggal))." ".$bulan[date("n", strtotime($tanggal))]." ".date("Y", strtotime($tanggal));
          ?>
            <tr>
              <td><?php echo $data['tanggal'];?></td>
              <td><?php echo $data['nama_obat']; ?></td>
              <td><?php echo $data['obat_masuk'] ?></td>
              <td><?php echo $data['obat_keluar'] ?></td>
              <td><?php echo $data['sisa_stok'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
 <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#cari_tanggal1" style='width: 100%; color: white;'>Unduh Laporan</a> 

<div class="modal fade" id="cari_tanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Berdasarkan Tanggal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="index?p=kartu_stock_resep&id=<?php echo $modal11['id_resep_obat'];?>&nama_obat=<?php echo $modal11['nama_obat'];?>" method="post" role="form">
        <label>Tanggal Awal</label>
          <input name="tanggal_awal" type="date" id="tanggal_awal" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
        <label>Tanggal Akhir</label>
          <input name="tanggal_akhir" type="date" id="tanggal_akhir" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
        <!--<label type="hidden">Nama Obat</label>-->
          <input name="nama_obat" type="hidden" id="nama_obat" value="<?php echo $modal11['nama_obat']; ?>" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
         <!--<label type="hidden">Kode Obat</label>-->
          <input name="id_resep_obat" type="hidden" id="id_resep_obat" value="<?php echo $modal11['id_resep_obat']; ?>" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
      <center>
        <button type="submit" name="cari_tanggal" class="btn btn-sm btn-primary">Cari</button>
        <button type="reset" class="btn btn-sm btn-danger">Batal</button>
      </center>
      </form>   
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cari_tanggal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak Berdasarkan Tanggal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="index?p=unduh_laporan_kartu_resep&id=<?php echo $modal11['id_resep_obat'];?>&nama_obat=<?php echo $modal11['nama_obat'];?>" method="post" role="form">
        <label>Tanggal Awal</label>
          <input name="tanggal_awal" type="date" id="tanggal_awal" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
        <label>Tanggal Akhir</label>
          <input name="tanggal_akhir" type="date" id="tanggal_akhir" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
        <!--<label type="hidden">Nama Obat</label>-->
          <input name="nama_obat" type="hidden" id="nama_obat" value="<?php echo $modal11['nama_obat']; ?>" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
         <!--<label type="hidden">Kode Obat</label>-->
          <input name="id_resep_obat" type="hidden" id="kd_obat" value="<?php echo $modal11['id_resep_obat']; ?>" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
      <center>
        <button type="submit" name="cari_tanggal" class="btn btn-sm btn-primary">Cetak</button>
        <button type="reset" class="btn btn-sm btn-danger">Batal</button>
        <hr>
        <a href='index?p=unduh_semua_laporan_kartu_stock_resep&id=<?php echo $modal11['id_resep_obat'];?>&nama_obat=<?php echo $modal11['nama_obat'];?>' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Semua Laporan Data Stok Obat</a>
      </center>
      </form>   
      </div>
    </div>
  </div>
</div>