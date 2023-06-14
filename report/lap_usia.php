<?php
// memanggil library FPDF
require('dist/lib/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
$pdf->Image('dist/img/logo.png',16,8,-550);
// mencetak string 
$pdf->Cell(200,7,'PEMERINTAH KABUPATEN KUNINGAN',0,1,'C');
$pdf->Cell(200,7,'KECAMATAN SINDANGAGUNG',0,1,'C');
$pdf->Cell(200,7,'DESA KADUAGUNG',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(200,7,'Jl. Daeng Sutisna Kaduagung - Sindangagung - Kuningan Jawa Barat',0,1,'C');
$pdf->Cell(16,7,'_______________________________________________________________________________________________',0,1);
$pdf->Cell(10,7,'',0,1,'C');
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(200,7,'LAPORAN KLASIFIKASI USIA PRODUKTIF',0,1,'C');



// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(20,7,'',0,2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(47,8,'USIA DIBAWAH 15 TAHUN',1,0,'C');
$pdf->Cell(47,8,'USIA 15-64 TAHUN',1,0,'C');
$pdf->Cell(47,8,'USIA DIATAS 64 TAHUN',1,0,'C');
$pdf->Cell(47,8,'JUMLAH',1,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(47,5,'Tidak Produktif',1,0,'C');
$pdf->Cell(47,5,'Produktif',1,0,'C');
$pdf->Cell(47,5,'Tidak Produktif',1,0,'C');
$pdf->Cell(47,5,'',1,1,'C');




$pdf->SetFont('Arial','',12);
include 'inc/koneksi.php';


$query_kurang = "SELECT COUNT(*) AS total FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR, tgl_lh, CURDATE())  < 15 AND tgl_lh != '0000-00-00'";
$hasil_kurang = mysqli_query($koneksi, $query_kurang);
$jumlah_kurang = mysqli_fetch_assoc($hasil_kurang); 

$query_tengah= "SELECT COUNT(*) AS total FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR,tgl_lh, CURDATE())BETWEEN 15 AND 64 ";
$hasil_tengah= mysqli_query($koneksi, $query_tengah);
$jumlah_tengah = mysqli_fetch_assoc($hasil_tengah);

$query_lebih = "SELECT COUNT(*) AS total FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR, tgl_lh, CURDATE())  > 64 AND tgl_lh != '0000-00-00'";
$hasil_lebih = mysqli_query($koneksi, $query_lebih);
$jumlah_lebih = mysqli_fetch_assoc($hasil_lebih); 

$query_total = "SELECT COUNT(*) AS total FROM tb_pdd WHERE id_pend";
$hasil_total= mysqli_query($koneksi, $query_total);
$jumlah_total = mysqli_fetch_assoc($hasil_total);

{
$pdf->Cell(47,11, $jumlah_kurang['total']." Orang",1,0,'C');  
$pdf->Cell(47,11, $jumlah_tengah['total']." Orang",1,0,'C');  
$pdf->Cell(47,11, $jumlah_lebih['total']." Orang",1,0,'C');  
$pdf->Cell(47,11, $jumlah_total['total']." Orang",1,1,'C'); 

}




$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(300,7,'Kaduagung,',0,1,'C');
$pdf->Cell(330,7,'Kepala Desa Kaduagung',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(330,7,'_____________________',0,1,'C');

ob_end_clean();
$pdf->Output();
?>
