<?php 
include '../akses.php' ;
include '../../koneksi.php';
        $user=$_SESSION['owner'];
      $admin2="SELECT * FROM user WHERE username='$user'";
      $cari=mysqli_query($db, $admin2);
      $hasil=mysqli_fetch_array($cari);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ALT.MINE.ID</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Codedthemes">
      <meta name="keywords" content="flat ui, admin flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="Codedthemes">
      <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/custom.css" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
      <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
      <link rel="stylesheet" type="text/css" href="../assets/pages/flag-icon/flag-icon.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/pages/menu-search/css/component.css">
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/amchart/css/amchart.css">
      <link rel="stylesheet" type="text/css" href="../assets/pages/dashboard/horizontal-timeline/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/linearicons.css" >
      <link rel="stylesheet" type="text/css" href="../assets/css/simple-line-icons.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
      
      <link rel="stylesheet" type="text/css" href="..css/bootstrap-datepicker.min.css">

  </head>
  <body>
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
          <nav class="navbar header-navbar pcoded-header" >
                <div class="navbar-wrapper">
                    <div class="navbar-logo" data-navbar-theme="theme4">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="#!">
                            <img class="img-fluid" src="../assets/images/FIX.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <div>
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <a href="#!">
                                        <img src="../assets/images/user.png" alt="User-Profile-Image">
                                        <span>Menu</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li>
                                            <a href=" ">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../logout.php">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul> 
                        </div>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   <nav class="pcoded-navbar" >
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-40" src="../assets/images/user.png" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span><?php echo $hasil['nama'];?></span>
                                        <span id="more-details">Level : <?php echo $_SESSION['owner'];?></span>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="pcoded-navigatio-lavel">Menu OWNER</div>
              <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="../lpcustomer/index.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-calculator-alt-2"></i></span>
                                        <span class="pcoded-mtext">Laporan Customer</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="../lpcoin/index.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-calculator-alt-2"></i></span>
                                        <span class="pcoded-mtext">Laporan Coin</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="index.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-calculator-alt-2"></i></span>
                                        <span class="pcoded-mtext">Laporan Pembelian</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="../help/index.php">
                                        <span class="pcoded-micon"><i class="icofont icofont-calculator-alt-2"></i></span>
                                        <span class="pcoded-mtext">Bantuan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="../logout.php" onclick="return confirm('Yakin ingin Logout?')">
                                        <i class="pcoded-mtext"></i> Logout
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                <div class="page-body">
                                  <div class="card">
                                    <div class="card-header">
                                      <h5>Laporan Pendapatan</h5>
                                      <div class="card-block">
                                          <form name="form_coin" action="laporanbeli.php" method="post" enctype="multipart/form-data">

                                            <div class="form-group row">
                                              <label class="col-sm-2 col-form-label" for="Nama">Tgl Sekarang</label>
                                              <div class="col-sm-10">
                                                <input placeholder="Tgl Awal" type="text" class="form-control datepicker" name="awal" id="awal" required>
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label class="col-sm-2 col-form-label" for="Kode">Tgl Akhir</label>
                                              <div class="col-sm-10">
                                                <input placeholder="Tgl Akhir" type="text" class="form-control datepicker" name="akhir" id="akhir" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <button type="reset" class="btn btn-danger">Reset</button> | 
                                              <button type="submit" class="btn btn-primary">Cetak</button>
                                            </div>

                                          </form>
                                          </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../assets/plugins/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../assets/plugins/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script type="text/javascript" src="../assets/plugins/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../assets/plugins/modernizr/feature-detects/css-scrollbars.js"></script>
<script type="text/javascript" src="../assets/plugins/classie/classie.js"></script>
<script src="../assets/plugins/d3/d3.js"></script>
<script src="../assets/plugins/rickshaw/rickshaw.js"></script>
<script src="../assets/plugins/raphael/raphael.min.js"></script>
<script src="../assets/plugins/morris.js/morris.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/horizontal-timeline/js/main.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/amchart/js/amcharts.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/amchart/js/serial.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/amchart/js/light.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/amchart/js/custom-amchart.js"></script>
<script type="text/javascript" src="../assets/plugins/i18next/i18next.min.js"></script>
<script type="text/javascript" src="../assets/plugins/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../assets/plugins/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-i18next/jquery-i18next.min.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/demo-12.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../assets/js/jquery.mousewheel.min.js"></script>

<script src="../js/jquery-3.1.1.min"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>


<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
</body>

</html>