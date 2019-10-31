<?php
ob_start();
define('FPDF_FONTPATH','font/');
require('fpdf/fpdf.php');
include "../../koneksi.php";

$tgl=Date("D, d F Y");

class PDF extends FPDF
{

//Page header
    function Header()
{
    //Logo
    $awal=$_POST['awal'];
    $akhir=$_POST['akhir'];
    $tgl=Date("d F Y");
    $this->Ln(5);
    $this->Image('../assets/images/ikeh.jpg',15,17,45,'C');
    //Arial bold 15
    $this->Ln(-10);
    $this->SetFont('Arial','B',13);
    //Move to the right
    //$this->Cell(0);
    //Title
    
    $this->Cell(0,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->Ln(10);
    $this->Cell(190,15,'LAPORAN PEMBELIAN',0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',10);
    $this->Cell(190,15,$tgl,0,0,'C');
    $this->Ln(10);
    $this->SetFont('Arial','B',13);
    $this->Cell(0,10,'       ----------------------------------------------------------------------------------------------------------------------------',0,0,'R');
    $this->SetFont('Arial','I',10);
    //Line break
    $this->Ln(15);

    $tgl=Date("d F Y");
    $this->SetFont('Arial','',11);
    $this->Cell(80);
    $this->Cell(30,0,'DATA PEMBELIAN PERIODE '.$awal.' - '.$akhir,0,0,'C');
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
$awal=$_POST['awal'];
$akhir=$_POST['akhir'];
$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetX(35);
$sukaes='Sukses';
$sql=mysqli_query($db, "SELECT * FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='Sukses'");

$sql2=mysqli_query($db, "SELECT totalbayar FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='$sukaes'");

$sql4=mysqli_query($db, "SELECT totalbayar FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='$sukaes' AND namacoin='Ethereum'");

$sql5=mysqli_query($db, "SELECT totalbayar FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='$sukaes' AND namacoin='Bitcoin'");

$alokasi=mysqli_fetch_array(mysqli_query($db, "SELECT count(stspemesanan) as Btl from pemesanan where stspemesanan='Batal' AND (tgl_pesan BETWEEN '$awal' AND '$akhir')"));
$alokasi2=mysqli_fetch_array(mysqli_query($db, "SELECT count(stspemesanan) as Sks from pemesanan where stspemesanan='Sukses' AND (tgl_pesan BETWEEN '$awal' AND '$akhir')"));
$count=mysqli_num_rows(mysqli_query($db, "SELECT * FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir')"));

$sql3=mysqli_query($db, "SELECT * FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='Sukses' AND namacoin='Ethereum'");

$sql33=mysqli_query($db, "SELECT * FROM pemesanan WHERE (tgl_pesan BETWEEN '$awal' AND '$akhir') AND stspemesanan='Sukses' AND namacoin='Bitcoin'");
$alokasi22=mysqli_fetch_array(mysqli_query($db, "SELECT count(stspemesanan) as Sks from pemesanan where stspemesanan='Sukses' AND (tgl_pesan BETWEEN '$awal' AND '$akhir') AND namacoin='ETHEREUM'"));
$alokasi23=mysqli_fetch_array(mysqli_query($db, "SELECT count(stspemesanan) as Sks from pemesanan where stspemesanan='Sukses' AND (tgl_pesan BETWEEN '$awal' AND '$akhir') AND namacoin='BITCOIN'"));

$total = 0;
$no=1;
$i=1;
$ntot=0;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,6,'No.',1,0,'C',1);$pdf->CELL(30,6,'Nama Coin',1,0,'C',1);
$pdf->CELL(15,6,'Hashrate',1,0,'C',1);
$pdf->CELL(30,6,'Username',1,0,'C',1);
$pdf->CELL(30,6,'Total Bayar',1,0,'C',1);
$pdf->CELL(30,6,'Tgl Pesan',1,1,'C',1);
while ($data = mysqli_fetch_array($sql)){
$pdf->SetX(35);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,6,$i,1,0,'C',1);
$pdf->cell(30,6,$data['namacoin'],1,0,'C',1);
$pdf->cell(15,6,$data['hashrate'],1,0,'C',1);
$pdf->cell(30,6,$data['username'],1,0,'C',1);
$pdf->cell(30,6,$data['totalbayar'],1,0,'C',1);
$pdf->cell(30,6,$data['tgl_pesan'],1,1,'C',1);
$ntot=$ntot+$data['totalbayar'];

$i++;
}
$sukses=0;
while($data2 = mysqli_fetch_array($sql2)){
    $sukses=$sukses+$data2['totalbayar'];
}
$sukses4=0;
while($data4 = mysqli_fetch_array($sql4)){
    $sukses4=$sukses4+$data4['totalbayar'];
}
$sukses5=0;
while($data5 = mysqli_fetch_array($sql5)){
    $sukses5=$sukses5+$data5['totalbayar'];
}

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Dibatalkan Pelanggan : ',0,0,'R',1);
$pdf->CELL(20,6,$alokasi['Btl'],0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Sukses : ',0,0,'R',1);
$pdf->CELL(20,6, $alokasi2['Sks'] ,0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Ethereum : ',0,0,'R',1);
$pdf->CELL(20,6, $sukses4 ,0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Bitcoin : ',0,0,'R',1);
$pdf->CELL(20,6, $sukses5 ,0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Total Pendapatan Periode Ini : ',0,0,'R',1);
$pdf->CELL(20,6, $sukses ,0,1,'R',1);

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetX(35);
$pdf->SetFont('Arial','',11);
$pdf->CELL(123,6,'DATA PEMBELIAN ETHEREUM PERIODE '.$awal.' - '.$akhir,0,0,'L',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetFont('Times','',12);
$pdf->SetX(35);
$total2 = 0;
$no2=1;
$i2=1;
$ntot2=0;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,6,'No.',1,0,'C',1);$pdf->CELL(30,6,'Nama Coin',1,0,'C',1);
$pdf->CELL(15,6,'Hashrate',1,0,'C',1);
$pdf->CELL(30,6,'Username',1,0,'C',1);
$pdf->CELL(30,6,'Total Bayar',1,0,'C',1);
$pdf->CELL(30,6,'Tgl Pesan',1,1,'C',1);
while ($data2 = mysqli_fetch_array($sql3)){
$pdf->SetX(35);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,6,$i,1,0,'C',1);
$pdf->cell(30,6,$data2['namacoin'],1,0,'C',1);
$pdf->cell(15,6,$data2['hashrate'],1,0,'C',1);
$pdf->cell(30,6,$data2['username'],1,0,'C',1);
$pdf->cell(30,6,$data2['totalbayar'],1,0,'C',1);
$pdf->cell(30,6,$data2['tgl_pesan'],1,1,'C',1);
$ntot2=$ntot2+$data2['totalbayar'];

$i2++;
}

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Ethereum Sukses : ',0,0,'R',1);
$pdf->CELL(20,6, $alokasi22['Sks'] ,0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Total Pembelian Ethereum : ',0,0,'R',1);
$pdf->CELL(20,6, $sukses4 ,0,1,'R',1);

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetX(35);
$pdf->SetFont('Arial','',11);
$pdf->CELL(123,6,'DATA PEMBELIAN BITCOIN PERIODE '.$awal.' - '.$akhir,0,0,'L',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetFont('Times','',12);
$pdf->SetX(35);
$total3 = 0;
$no3=1;
$i3=1;
$ntot3=0;
$pdf->setFillColor(222,222,222);
$pdf->CELL(8,6,'No.',1,0,'C',1);$pdf->CELL(30,6,'Nama Coin',1,0,'C',1);
$pdf->CELL(15,6,'Hashrate',1,0,'C',1);
$pdf->CELL(30,6,'Username',1,0,'C',1);
$pdf->CELL(30,6,'Total Bayar',1,0,'C',1);
$pdf->CELL(30,6,'Tgl Pesan',1,1,'C',1);
while ($data3 = mysqli_fetch_array($sql33)){
$pdf->SetX(35);
$pdf->setFillColor(255,255,255);
$pdf->cell(8,6,$i,1,0,'C',1);
$pdf->cell(30,6,$data3['namacoin'],1,0,'C',1);
$pdf->cell(15,6,$data3['hashrate'],1,0,'C',1);
$pdf->cell(30,6,$data3['username'],1,0,'C',1);
$pdf->cell(30,6,$data3['totalbayar'],1,0,'C',1);
$pdf->cell(30,6,$data3['tgl_pesan'],1,1,'C',1);
$ntot3=$ntot3+$data3['totalbayar'];

$i3++;
}

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Pembelian Bitcoin Sukses : ',0,0,'R',1);
$pdf->CELL(20,6, $alokasi22['Sks'] ,0,1,'R',1);

$pdf->SetX(35);
$pdf->CELL(123,6,'Total Pembelian Bitcoin : ',0,0,'R',1);
$pdf->CELL(20,6, $sukses5 ,0,1,'R',1);

$pdf->SetX(35);
$pdf->SetFont('Arial','B',11);
$pdf->CELL(123,6,' ',0,0,'R',1);
$pdf->CELL(20,6,' ',0,1,'R',1);
/*$pdf->Cell(20,6,$data['no_jenis'],$i,0,1);
$pdf->Cell(68,6,$data['jns_kamar'],$i,0,1);
$pdf->Cell(45,6,$data['status'],$i,0,1);*/


//for($i=1;$i<=40;$i++)
$pdf->Output();
ob_end_flush();
?>