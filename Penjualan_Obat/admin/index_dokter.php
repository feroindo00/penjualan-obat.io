<?php 
session_start();
include "../ctrl/koneksi.php";
include "../ctrl/code.php";

	if (empty($_SESSION['username_dokter'])) 
	{
		
		header('Location: ../index_dokter');
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penjualan Obat</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Custom Dropdown select2 -->
  <link href="../vendor/select2/dist/css/select2.min.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-primary" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-secondary bg-primary fixed-top" id="mainNav"style="color:white;">
    <a class="navbar-brand" style="color:white;" href="./index_dokter">HALAMAN DOKTER</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <center><h5>KLINIK PENGOBATAN PALEMBANG MAGETAN JAWA TIMUR</h5></center>
    <button class="navbar-toggler navbar-dark navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"style="color:white;"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive"style="color:white;">
	<?php
	$cek_session = $_SESSION['username_dokter'];
	$queryy = "select * from dokter where username_dokter='$cek_session'";
	$sqll = mysql_query($queryy) or die(mysql_error());
	while($data = mysql_fetch_array($sqll)){ 
		$id_level_k = $data['id_level_karyawan'];
	}
	
	if($id_level_k == '1'){
	?>
	<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="karyawan">
          <a class="nav-link nav-link-collapse collapsed" style="color:white;" data-toggle="collapse" href="#collapsekaryawan" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"style="color:white;"></i>
            <span class="nav-link-text" style="color:white;">Karyawan</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsekaryawan">
            <li>
              <a href="index?p=data_karyawan" style="color:white;">
                <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
                <span class="nav-link-text"style="color:white;">
                Karyawan
                </span>
              </a>
            </li>
			      <li>
              <a href="index?p=data_jabatan_karyawan" style="color:white;">
              <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
              <span class="nav-link-text"style="color:white;">
              Jabatan Karyawan
              </span>
              </a>
            </li>
          
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="medis">
          <a class="nav-link nav-link-collapse collapsed" style="color:white;" data-toggle="collapse" href="#collapsemedis" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-medkit"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Medis</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsemedis">
			      <li>
              <a href="index?p=data_obat"style="color:white;">
              <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
              <span class="nav-link-text"style="color:white;">
              Obat
              </span>
              </a>
            </li>
            <li>
              <a href="index?p=data_resep_obat"style="color:white;">
              <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
              <span class="nav-link-text"style="color:white;">
              Obat Resep
              </span>
              </a>
            </li>
            <li>
              <a href="index?p=data_jenis_obat"style="color:white;">
              <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
              <span class="nav-link-text"style="color:white;">
              Jenis Kemasan
              </span>
              </a>
            </li>
          </ul>
        </li>
   
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../ctrl/logout">
            <i class="fa fa-fw fa-sign-out"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Logout</span>
          </a>
        </li>
      </ul>	  
	  <?php
      }
	  if($id_level_k == '4'){
	  ?>
    <!--<i class="fa fa-circle-o"style="color:white;"></i>-->
	  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="admin" >
            <a class="nav-link nav-link-collapse collapsed" style="color:white;" data-toggle="collapse" href="#collapsetransaksi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Laporan</span>
          </a>
           <ul class="sidenav-third-level collapse" id="collapsetransaksi">
            <li>
              <a href="index?p=data_laporan"  style="color:white;">
              <i class="fa fa-fw fa-circle-o"style="color:white;"></i>  
              <span class="nav-link-text"style="color:white;">&nbsp;Laporan Obat</span>
               </a>
            </li>
            <li>
              <a href="index?p=data_laporan_resep" style="color:white;">
               <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
              <span class="nav-link-text"style="color:white;"> &nbsp;Laporan Obat Resep
              </a>
            </li>
          
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../ctrl/logout">
            <i class="fa fa-fw fa-sign-out"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Logout</span>
          </a>
        </li>
      </ul>	  
	  <?php
	  }
	  
	  if($id_level_k == '3' ){
	  ?>
     <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="transaksi">
          <a class="nav-link nav-link-collapse collapsed" style="color:white;" data-toggle="collapse" href="#collapsetransaksi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-cart"style="color:white;"></i>
            <span class="nav-link-text" style="color:white;">Transaksi</span>
          </a>
          <ul class="sidenav-third-level collapse" id="collapsetransaksi">
            <li>
              <a href="index?p=data_transaksi" style="color:white;">
                <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
                <span class="nav-link-text"style="color:white;"> &nbsp; Transaksi Obat
              </a>
            </li>
            
          
          </ul>
        </li>
    
          
    
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../ctrl/logout">
            <i class="fa fa-fw fa-sign-out"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Logout</span>
          </a>
        </li>
      </ul>	     
    <?php
      }
    ?>

    <?php
     if($id_level_k == '5' ){
    ?>
     <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
     <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dokter">
          <a class="nav-link nav-link-collapse collapsed" style="color:white;" data-toggle="collapse" href="#collapsetransaksi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-medkit"style="color:white;"></i>
            <span class="nav-link-text" style="color:white;">Data Obat Resep</span>
          </a>
          <ul class="sidenav-third-level collapse" id="collapsetransaksi">
            <li>
              <a href="index_dokter?p=data_obat_resep_dokter" style="color:white;">
                <i class="fa fa-fw fa-circle-o"style="color:white;"></i>
                <span class="nav-link-text"style="color:white;"> &nbsp; Data Obat
              </a>
            </li>
            
          
          </ul>
        </li>
    
          
    
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../ctrl/logout_dokter">
            <i class="fa fa-fw fa-sign-out"style="color:white;"></i>
            <span class="nav-link-text"style="color:white;">Logout</span>
          </a>
        </li>
      </ul>      
    <?php
      }
    ?>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
		<?php
			$cek_session = $_SESSION['username_dokter'];				
			$queryy = "SELECT * FROM dokter, jabatan WHERE
                     dokter.id_level_karyawan=jabatan.id_jabatan_karyawan AND
                     username_dokter='$cek_session'";
			$sqll = mysql_query($queryy) or die(mysql_error());
			$data = mysql_fetch_array($sqll); 
			$nama_dokter = $data['nama_dokter'];
      $level_jabatan_karyawan = $data['level_jabatan_karyawan'];
		?>
            <font style="color:white;">Hallo, <?php echo $nama_dokter; ?> (<?php echo $level_jabatan_karyawan; ?>) </font>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">

  <!--content-->
		<?php
        $pages_dir = 'page';
		if(!empty($_GET['p'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
			$p = $_GET['p'].'.php';
			if(in_array($p, $pages)){
				include($pages_dir.'/'.$p);
				} else {
					include($pages_dir.'/404.php');
				}
			} else {
				include($pages_dir.'/home.php');
			}
			?>
	<!--//content-->
  
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
		  <?php
			$copyright = date('Y');
		  ?>
          <small>Copyright © Penjualan Obat <?php echo $copyright;?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <!-- Custom Dropdown select2-->
    <script src="../vendor/select2/dist/js/select2.min.js"></script>
  </div>
</body>

</html>
