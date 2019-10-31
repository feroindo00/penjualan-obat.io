<?php 
session_start();
include "ctrl/koneksi.php";
	
	if (isset($_SESSION['username_k'])) 
	{
		
		header('Location: admin');
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Custom Background Animate Style Template-->
  <link href="css/design_background.css" rel="stylesheet">

</head>

<body class="area">
  <div class="context">
    </div>
<div class="area" >
            <ul class="circles" >
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >
  <div class="container"><br><br>
  <center>
    <h2  style="color:white;">Klinik Pengobatan Palembang Magetan Jawa Timur</h2><br>
    <h3 style="color:white;">Jl. Dr. Soetomo. 2A Magetan / Telp. 0351-770337</h3>
  </center>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><center>LOGIN_DOKTER</center></div>
      <div class="card-body">
        <center>
   <img src="files/logo.png" />
  </center>
        <form action="ctrl/proses_login_dokter" method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="username_dokter" name="username_dokter" type="text" placeholder="Masukkan Username Dokter ..." required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="password_dokter" name="password_dokter" type="password" placeholder="Masukkan Password Dokter ..." required>
          </div>
		  <button type="submit" class="btn btn-dark btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
