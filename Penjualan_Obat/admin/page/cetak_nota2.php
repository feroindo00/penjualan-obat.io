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
    $tgl=Date("d F Y");
    $this->Ln(5);
    $this->Image('../files/logo.png',15,15,25,'C');
    //Arial bold 15
    $this->Ln(-10);
    $this->SetFont('Arial','B',13);
    //Move to the right
    //$this->Cell(0);
    //Title
    
    $this->Cell(0,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->Ln(5);
    $this->Cell(190,15,'Nota Penjualan',0,0,'C');
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
$pdf=new PDF('L','mm','A5');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetX(5);
$sukaes='Sukses';
$id_jual = $_GET['id'];
$q=mysqli_query($con,"select * from transaksi_jual where id_jual='$id_jual'");
$dot=mysqli_fetch_array($q);
$sql=mysqli_query($con,"SELECT detil_transaksi.*,obat.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat WHERE id_jual='$id_jual'");

$sql1=mysqli_query($con,"SELECT detil_transaksi.*,obat.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat WHERE id_jual='$id_jual'");
$dit=mysqli_fetch_array($sql1);
//$total = 0;
$no=1;
$i=1;
//$ntot=0;
//$nlaba=0;
//$nhpp=0;
$pdf->SetY(47);
$pdf->SetX(15);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);
$pdf->CELL(48,9,'Kode',1,0,'C',1);


$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(58,9,$dot['id_jual'],1,1,'C',1);

$pdf->SetX(15);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);
$pdf->CELL(48,9,'Tanggal',1,0,'C',1);


$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(58,9,$dot['tanggal'],1,1,'C',1);


$pdf->SetX(15);
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,9,'No.',1,0,'C',1);
$pdf->CELL(40,9,'Kode Barang',1,0,'C',1);
$pdf->CELL(58,9,'Nama',1,0,'C',1);
$pdf->CELL(15,9,'Jumlah',1,0,'C',1);
$pdf->CELL(15,9,'Qty',1,0,'C',1);
$pdf->CELL(20,9,'Harga',1,0,'C',1);
$pdf->CELL(25,9,'Total Harga',1,1,'C',1);

while ($data = mysqli_fetch_array($sql)){
$pdf->SetX(15);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,9,$i,1,0,'C',1);
$pdf->cell(40,9,$data['kd_obat'],1,0,'C',1);
$pdf->cell(58,9,$data['nama_obat'],1,0,'C',1);
$pdf->cell(15,9,$data['jumlah'],1,0,'C',1);
$pdf->cell(15,9,$data['satuan'],1,0,'C',1);
$pdf->cell(20,9,$data['harga_satuan'],1,0,'C',1);
$pdf->cell(25,9,$data['harga'],1,1,'C',1);
//$ntot=$ntot+$data['harga'];
//$nlaba=$nlaba+$data['laba'];
//$nhpp=$nhpp+$data['hpp'];


$i++;
}
$pdf->SetX(15);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);
$pdf->CELL(121,9,'Total Harga',1,0,'R',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(60,9,$dit['harga'],1,1,'C',1);

$pdf->SetX(15);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);
$pdf->CELL(121,9,'Pembayaran',1,0,'R',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(60,9,$dot['uang'],1,1,'C',1);

$pdf->SetX(15);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);
$pdf->CELL(121,9,'Kembali',1,0,'R',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(60,9,$dot['kembali'],1,1,'C',1);
//$pdf->SetX(5);
//$pdf->SetFont('Arial','B',10);
//$pdf->setFillColor(222,222,222);;
//$pdf->CELL(146,9,'Total Omset',1,0,'C',1);

//$pdf->SetFont('Arial','',10);
//$pdf->setFillColor(255,255,255);
//$pdf->CELL(55,9,$ntot,1,1,'C',1);

//$pdf->SetX(5);
//$pdf->SetFont('Arial','B',10);
//$pdf->setFillColor(222,222,222);;
//$pdf->CELL(146,9,'Laba',1,0,'C',1);

//$pdf->SetFont('Arial','',10);
//$pdf->setFillColor(255,255,255);
//$pdf->CELL(55,9,$nlaba,1,1,'C',1);

//$pdf->SetX(5);
//$pdf->SetFont('Arial','B',13);
//$pdf->setFillColor(222,222,222);;
//$pdf->CELL(146,9,'Hpp',1,0,'C',1);

//$pdf->SetFont('Arial','',10);
//$pdf->setFillColor(255,255,255);
//$pdf->CELL(55,9,$nhpp,1,1,'C',1);


//for($i=1;$i<=40;$i++)
$pdf->Output();
ob_end_flush();
?>