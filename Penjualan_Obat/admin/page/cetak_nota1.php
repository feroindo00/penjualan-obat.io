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
    $this->Image('../files/logo001.jpg',5,5,25,'C');
    //Arial bold 15
    $this->Ln(-19);
    $this->SetFont('Arial','B',10);
    //Move to the right
    //$this->Cell(0);
    //Title
    
    $this->Cell(120,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->Ln(6);
    $this->Cell(90,5,'Nota Penjualan',0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',10);
    $this->Cell(90,5,$tgl,0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',8);
    $this->Cell(90,5,'Klinik Pengobatan Palembang',0,0,'C');
    $this->Ln(5);
    $this->Cell(90,5,'Nomor : 445.2 / 04 / 403.210.2013 ',0,0,'C');
    $this->Ln(5);
    $this->Cell(90,5,'Jl. Dr. Soetomo. 2A Magetan',0,0,'C');
    $this->Ln(5);
    $this->Cell(90,5,'Telp. 0351-7703377',0,0,'C');
    $this->Ln(1);
    $this->SetFont('Arial','B',10);
    $this->Cell(120,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->SetFont('Arial','I',10);
    //Line break
    $this->Ln(5);

    $this->Ln(5);
    $pdf = new FPDF('L','mm','A5');
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
$pdf=new PDF('P','mm',array(105,148));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',5);
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
$pdf->SetY(35);
$pdf->SetX(1);
$pdf->SetFont('Arial','B',7);
$pdf->setFillColor(222,222,222);
$pdf->CELL(30,5,'Kode',1,0,'C',1);


$pdf->SetFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->CELL(33,5,$dot['id_jual'],1,1,'C',1);

$pdf->SetX(1);
$pdf->SetFont('Arial','B',7);
$pdf->setFillColor(222,222,222);
$pdf->CELL(30,5,'Tanggal',1,0,'C',1);


$pdf->SetFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->CELL(33,5,$dot['tanggal'],1,1,'C',1);


$pdf->SetX(1);
$pdf->setFillColor(222,222,222);
$pdf->CELL(5,5,'No.',1,0,'C',1);
$pdf->CELL(25,5,'Kode Barang',1,0,'C',1);
$pdf->CELL(33,5,'Nama',1,0,'C',1);
$pdf->CELL(15,5,'Jumlah',1,0,'C',1);
$pdf->CELL(10,5,'Harga',1,0,'C',1);
$pdf->CELL(15,5,'Total Harga',1,1,'C',1);

while ($data = mysqli_fetch_array($sql)){
$pdf->SetX(1);
$pdf->setFillColor(255,255,255);
$pdf->cell(5,4,$i,1,0,'C',1);
$pdf->cell(25,4,$data['kd_obat'],1,0,'C',1);
$pdf->cell(33,4,$data['nama_obat'],1,0,'C',1);
$pdf->cell(15,4,$data['jumlah'],1,0,'C',1);
$pdf->cell(10,4,$data['harga_jual'],1,0,'C',1);
$pdf->cell(15,4,$data['harga'],1,1,'C',1);
//$ntot=$ntot+$data['harga'];
//$nlaba=$nlaba+$data['laba'];
//$nhpp=$nhpp+$data['hpp'];


$i++;
}
$pdf->SetX(1);
$pdf->SetFont('Arial','B',7);
$pdf->setFillColor(222,222,222);
$pdf->CELL(53,5,'Total Harga',1,0,'R',1);

$pdf->SetFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->CELL(50,5,$dit['harga'],1,1,'C',1);

$pdf->SetX(1);
$pdf->SetFont('Arial','B',7);
$pdf->setFillColor(222,222,222);
$pdf->CELL(53,5,'Pembayaran',1,0,'R',1);

$pdf->SetFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->CELL(50,5,$dot['uang'],1,1,'C',1);

$pdf->SetX(1);
$pdf->SetFont('Arial','B',7);
$pdf->setFillColor(222,222,222);
$pdf->CELL(53,5,'Kembali',1,0,'R',1);

$pdf->SetFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->CELL(50,5,$dot['kembali'],1,1,'C',1);
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