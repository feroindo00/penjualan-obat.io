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
    include "../ctrl/koneksi.php";
    //Logo
   $rtol="select*from kartu_stock";
    $rtoll=mysqli_query($con,$rtol);
    $rtolll=mysqli_fetch_array($rtoll);
    $lol="SELECT detil_transaksi_resep.*,resep_obat.*,transaksi_jual_resep.* FROM detil_transaksi_resep INNER JOIN resep_obat ON resep_obat.id_resep_obat = detil_transaksi_resep.id_resep_obat INNER JOIN transaksi_jual_resep on transaksi_jual_resep.id_jual = detil_transaksi_resep.id_jual where id_transaksi='1'";
    $lmao=mysqli_query($con,$lol);
    $lmaoo=mysqli_fetch_array($lmao);
    $tangal=$lmaoo['tanggal'];
    $tgl=date('y-m-d');
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
    $this->Cell(190,15,'LAPORAN PENJUALAN OBAT RESEP',0,0,'C');
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

    $tgl=date('Y-m-d');
    $this->SetFont('Arial','',11);
    $this->Cell(80);
    $this->Cell(30,0,'DATA PENJUALAN PERIODE '.$tangal.' SAMPAI '.$tgl,0,0,'C');
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
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetX(5);
$sukaes='Sukses';
$sql=mysqli_query($con,"SELECT detil_transaksi_resep.*,resep_obat.*,transaksi_jual_resep.* FROM detil_transaksi_resep INNER JOIN resep_obat ON resep_obat.id_resep_obat = detil_transaksi_resep.id_resep_obat INNER JOIN transaksi_jual_resep on transaksi_jual_resep.id_jual = detil_transaksi_resep.id_jual ");

$total = 0;
$no=1;
$i=1;
$ntot=0;
$nlaba=0;
$nhpp=0;
$nhargasuplier=0;
$nhargajual=0;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,9,'No.',1,0,'C',1);
$pdf->CELL(25,9,'Tanggal',1,0,'C',1);
$pdf->CELL(58,9,'Nama Barang',1,0,'C',1);
$pdf->CELL(15,9,'Jumlah',1,0,'C',1);
$pdf->CELL(23,9,'Harga Beli',1,0,'C',1);
$pdf->CELL(23,9,'Harga Jual',1,0,'C',1);
$pdf->CELL(25,9,'Pembayaran',1,0,'C',1);
$pdf->CELL(24,9,'Total',1,1,'C',1);

while ($data = mysqli_fetch_array($sql)){
$pdf->SetX(5);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,9,$i,1,0,'C',1);
$pdf->cell(25,9,$data['tanggal'],1,0,'C',1);
$pdf->cell(58,9,$data['nama_obat'],1,0,'C',1);
$pdf->cell(15,9,$data['jumlah'],1,0,'C',1);
$pdf->cell(23,9,$data['harga_suplier'],1,0,'C',1);
$pdf->cell(23,9,$data['harga_jual'],1,0,'C',1);
$pdf->cell(25,9,$data['uang'],1,0,'C',1);
$pdf->cell(24,9,$data['harga'],1,1,'C',1);
$ntot=$ntot+$data['harga'];
$nlaba=$nlaba+$data['laba'];
$nhpp=$nhpp+$data['hpp'];
$nhargasuplier=$nhargasuplier+$data['harga_suplier'];
$nhargajual=$nhargajual+$data['harga_jual'];
$nlabaa=$nhargajual-$nhargasuplier;


$i++;
}

$pdf->SetX(5);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);;
$pdf->CELL(146,9,'Total Omset',1,0,'C',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(55,9,$ntot,1,1,'C',1);

$pdf->SetX(5);
$pdf->SetFont('Arial','B',10);
$pdf->setFillColor(222,222,222);;
$pdf->CELL(146,9,'Laba',1,0,'C',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(55,9,$nlabaa,1,1,'C',1);

$pdf->SetX(5);
$pdf->SetFont('Arial','B',13);
$pdf->setFillColor(222,222,222);;
$pdf->CELL(146,9,'Hpp',1,0,'C',1);

$pdf->SetFont('Arial','',10);
$pdf->setFillColor(255,255,255);
$pdf->CELL(55,9,$nhpp,1,1,'C',1);


//for($i=1;$i<=40;$i++)
$pdf->Output();
ob_end_flush();
?>