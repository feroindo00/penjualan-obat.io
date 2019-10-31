<?php
if(isset($_POST['tambah_surat_masuk'])){

   if(isset($_FILES['file_sm'])){
	  $time = time(); 
      $file_name = $_FILES['file_sm']['name'];
      $file_size = $_FILES['file_sm']['size'];
      $file_tmp = $_FILES['file_sm']['tmp_name'];
      $file_type = $_FILES['file_sm']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $file_sm = $time.$file_name;
	  
	  $nomor_sm = $_POST['nomor_sm'];
	  $tanggal_sm = $_POST['tanggal_sm'];
	  $pengirim_sm = $_POST['pengirim_sm'];
	  $perihal_sm = $_POST['perihal_sm'];
	  $keterangan_sm = $_POST['keterangan_sm'];
	  $cek_session = $_SESSION['username_k'];
	  
      $expensions = array("doc","docx","pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi File Tidak Diperbolehkan, Mohon Pilih File Dengan Ekstensi DOC, DOCX, PDF, JPEG, JPG, atau PNG'); window.location = 'index?p=tambah_surat_masuk'</script>";
      } else {
	  $sql = "INSERT INTO tb_surat_masuk VALUES('','$nomor_sm','$tanggal_sm','$pengirim_sm','$perihal_sm','$keterangan_sm','$file_sm','$cek_session',now(),now())";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../files/".$file_sm);
         echo "<script>alert('Selamat, Data Surat Masuk Berhasil Ditambahkan'); window.location = 'index?p=data_surat_masuk'</script>";
	  }
   }

}
?>

<?php
if(isset($_POST['ubah_surat_masuk'])){

$id = $_GET['id'];

$nomor_sm = $_POST['nomor_sm'];
$tanggal_sm = $_POST['tanggal_sm'];
$pengirim_sm = $_POST['pengirim_sm'];
$perihal_sm = $_POST['perihal_sm'];
$keterangan_sm = $_POST['keterangan_sm'];
$file_sm = $_FILES['file_sm']['tmp_name'];

if(empty($file_sm)){
	$sql = "UPDATE tb_surat_masuk SET 
							nomor_sm = '$nomor_sm',
							tanggal_sm = '$tanggal_sm',
							pengirim_sm = '$pengirim_sm',
							perihal_sm = '$perihal_sm',
							keterangan_sm = '$keterangan_sm' WHERE 
							id_sm = '$id'";
	$result = mysql_query($sql);

	if($result){
	echo "<script>alert('Selamat, Data Surat Masuk Berhasil Diubah'); window.location = 'index?p=data_surat_masuk'</script>";	
	}
} else {
   if(isset($_FILES['file_sm'])){
	  $time = time(); 
      $file_name = $_FILES['file_sm']['name'];
      $file_size = $_FILES['file_sm']['size'];
      $file_tmp = $_FILES['file_sm']['tmp_name'];
      $file_type = $_FILES['file_sm']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $file_smm = $time.$file_name;
	  
      $expensions = array("doc","docx","pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi File Tidak Diperbolehkan, Mohon Pilih File Dengan Ekstensi DOC, DOCX, PDF, JPEG, JPG, atau PNG'); window.location = 'index?p=data_hidangan'</script>";
      } else {
	  $sql = "UPDATE tb_surat_masuk SET 
						nomor_sm = '$nomor_sm',
						tanggal_sm = '$tanggal_sm',
						pengirim_sm = '$pengirim_sm',
						perihal_sm = '$perihal_sm',
						keterangan_sm = '$keterangan_sm',
						file_sm = '$file_smm' WHERE 
						id_sm = '$id'";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../files/".$file_smm);
         echo "<script>alert('Selamat, Data Surat Masuk Berhasil Diubah'); window.location = 'index?p=data_surat_masuk'</script>";
	  }
   } 
}

}
?>