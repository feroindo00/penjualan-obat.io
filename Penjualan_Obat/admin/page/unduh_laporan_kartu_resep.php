<?php
ob_start();
define('FPDF_FONTPATH','font/');
require('fpdf181/fpdf.php');
include "../ctrl/koneksi.php";

$tgl=Date("D, d F Y");

class PDF extends FPDF
{

//Page header
    function Header()
{
    //Logo
    $tanggal_awal=$_POST['tanggal_awal'];
    $tanggal_akhir=$_POST['tanggal_akhir'];
    $nama_obat = $_POST['nama_obat'];
    $id_resep_obat=$_POST['id_resep_obat'];
    $id=$_GET['id'];
    $tgl=Date("d F Y");
    $this->Ln(5);
    $this->Image('../files/logo001.jpg',15,15,25,'C');
    //Arial bold 15
    $this->Ln(-10);
    $this->SetFont('Arial','B',13);
    //Move to the right
    //$this->Cell(0);
    //Title
    
    $this->Cell(0,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->Ln(5);
    $this->Cell(190,15,'LAPORAN KARTU STOK OBAT RESEP',0,0,'C');
    $this->Ln(7);
    $this->Cell(190,15,$nama_obat,0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',10);
    $this->Cell(190,15,$tgl,0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',8);
    $this->Cell(190,15,'Klinik Pengobatan Palembang',0,0,'C');
    $this->Ln(5);
    $this->Cell(190,15,'Nomor : 445.2 / 04 / 403.210.2013 ',0,0,'C');
    $this->Ln(5);
    $this->Cell(190,15,'Jl. Dr. Soetomo. 2A Magetan',0,0,'C');
    $this->Ln(5);
     $this->Cell(190,15,'Telp. 0351-7703377',0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','B',13);
    $this->Cell(0,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->SetFont('Arial','I',10);
    //Line break
    $this->Ln(15);

    $tgl=Date("d F Y");
    $this->SetFont('Arial','',11);
    $this->Cell(80);
    $this->Cell(30,0,'DATA STOK OBAT PERIODE '.$tanggal_awal.' SAMPAI '.$tanggal_akhir,0,0,'C');
    //Line break
    $this->Ln(5);
    $this->PageFormats=array('a3'=>array(841.89,1190.55),
'a4'=>array(595.28,841.89), 'a5'=>array(549.94,595.28),
'letter'=>array(612,792), 'legal'=>array(612,1008));
}


//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    //$this->Ln(10);
    $this->SetY(-10);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$tanggal_awal=$_POST['tanggal_awal'];
$tanggal_akhir=$_POST['tanggal_akhir'];
$nama_obat = $_POST['nama_obat'];
$id_resep_obat=$_POST['id_resep_obat'];
$id=$_GET['id'];
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetX(25);
$sukaes='Sukses';
$sql=mysqli_query($con,"SELECT kartu_stock_resep.* FROM kartu_stock_resep where tanggal and tanggal BETWEEN '$tanggal_awal' and '$tanggal_akhir' and id_resep_obat='$id'order by tanggal")or die(mysqli_error());

$no=1;
$i=1;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,9,'No.',1,0,'C',1);
$pdf->CELL(25,9,'Tanggal',1,0,'C',1);
$pdf->CELL(58,9,'Nama Barang',1,0,'C',1);
$pdf->CELL(23,9,'Obat Masuk',1,0,'C',1);
$pdf->CELL(23,9,'Obat Keluar',1,0,'C',1);
$pdf->CELL(24,9,'Sisa Stok',1,1,'C',1);

while ($data = mysqli_fetch_array($sql)){
$pdf->SetX(25);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,9,$i,1,0,'C',1);
$pdf->cell(25,9,$data['tanggal'],1,0,'C',1);
$pdf->cell(58,9,$data['nama_obat'],1,0,'C',1);
$pdf->CELL(23,9,$data['obat_masuk'],1,0,'C',1);
$pdf->cell(23,9,$data['obat_keluar'],1,0,'C',1);
$pdf->cell(24,9,$data['sisa_stok'],1,1,'C',1);

$i++;
}

//for($i=1;$i<=40;$i++)
$pdf->Output();
ob_end_flush();
?>