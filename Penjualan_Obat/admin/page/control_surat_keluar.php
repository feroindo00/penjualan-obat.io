<?php
if(isset($_POST['tambah_surat_keluar'])){

   if(isset($_FILES['file_sk'])){
	  $time = time(); 
      $file_name = $_FILES['file_sk']['name'];
      $file_size = $_FILES['file_sk']['size'];
      $file_tmp = $_FILES['file_sk']['tmp_name'];
      $file_type = $_FILES['file_sk']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $file_sk = $time.$file_name;
	  
	  $nomor_sk = $_POST['nomor_sk'];
	  $tanggal_sk = $_POST['tanggal_sk'];
	  $penerima_sk = $_POST['penerima_sk'];
	  $perihal_sk = $_POST['perihal_sk'];
	  $keterangan_sk = $_POST['keterangan_sk'];
	  $cek_session = $_SESSION['username_k'];
	  
      $expensions = array("doc","docx","pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi File Tidak Diperbolehkan, Mohon Pilih File Dengan Ekstensi DOC, DOCX, PDF, JPEG, JPG, atau PNG'); window.location = 'index?p=tambah_surat_keluar'</script>";
      } else {
	  $sql = "INSERT INTO tb_surat_keluar VALUES('','$nomor_sk','$tanggal_sk','$penerima_sk','$perihal_sk','$keterangan_sk','$file_sk','0','','0','','$cek_session',now(),now())";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../files/".$file_sk);
         echo "<script>alert('Selamat, Data Surat Keluar Berhasil Ditambahkan'); window.location = 'index?p=data_surat_keluar'</script>";
	  }
   }

}
?>

<?php
if(isset($_POST['ubah_surat_keluar'])){

$id = $_GET['id'];

$nomor_sk = $_POST['nomor_sk'];
$tanggal_sk = $_POST['tanggal_sk'];
$penerima_sk = $_POST['penerima_sk'];
$perihal_sk = $_POST['perihal_sk'];
$keterangan_sk = $_POST['keterangan_sk'];
$file_sk = $_FILES['file_sk']['tmp_name'];

if(empty($file_sk)){
	$sql = "UPDATE tb_surat_keluar SET 
							nomor_sk = '$nomor_sk',
							tanggal_sk = '$tanggal_sk',
							penerima_sk = '$penerima_sk',
							perihal_sk = '$perihal_sk',
							keterangan_sk = '$keterangan_sk' WHERE 
							id_sk = '$id'";
	$result = mysql_query($sql);

	if($result){
	echo "<script>alert('Selamat, Data Surat Keluar Berhasil Diubah'); window.location = 'index?p=data_surat_keluar'</script>";	
	}
} else {
   if(isset($_FILES['file_sk'])){
	  $time = time(); 
      $file_name = $_FILES['file_sk']['name'];
      $file_size = $_FILES['file_sk']['size'];
      $file_tmp = $_FILES['file_sk']['tmp_name'];
      $file_type = $_FILES['file_sk']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $file_skk = $time.$file_name;
	  
      $expensions = array("doc","docx","pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi File Tidak Diperbolehkan, Mohon Pilih File Dengan Ekstensi DOC, DOCX, PDF, JPEG, JPG, atau PNG'); window.location = 'index?p=data_hidangan'</script>";
      } else {
	  $sql = "UPDATE tb_surat_keluar SET 
						nomor_sk = '$nomor_sk',
						tanggal_sk = '$tanggal_sk',
						penerima_sk = '$penerima_sk',
						perihal_sk = '$perihal_sk',
						keterangan_sk = '$keterangan_sk',
						file_sk = '$file_skk' WHERE 
						id_sk = '$id'";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../files/".$file_skk);
         echo "<script>alert('Selamat, Data Surat Keluar Berhasil Diubah'); window.location = 'index?p=data_surat_keluar'</script>";
	  }
   } 
}

}
?>