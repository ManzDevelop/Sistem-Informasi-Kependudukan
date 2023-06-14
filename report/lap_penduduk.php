<?php
// memanggil library FPDF
require('dist/lib/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
$pdf->Image('dist/img/logo.png',16,8,-550);
// mencetak string 
$pdf->Cell(260,7,'PEMERINTAH KABUPATEN KUNINGAN',0,1,'C');
$pdf->Cell(260,7,'KECAMATAN SINDANGAGUNG',0,1,'C');
$pdf->Cell(260,7,'DESA KADUAGUNG',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(260,7,'Jl. Daeng Sutisna Kaduagung - Sindangagung - Kuningan Jawa Barat',0,1,'C');
$pdf->Cell(16,7,'__________________________________________________________________________________________________________________________________________',0,1);
$pdf->Cell(10,7,'',0,1,'C');
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(260,7,'LAPORAN PENDUDUK',0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(8,6,'NO',1,0,'C');
$pdf->Cell(25,6,'NIK',1,0,'C');
$pdf->Cell(38,6,'NAMA',1,0,'C');
$pdf->Cell(22,6,'TEMPAT',1,0,'C');
$pdf->Cell(24,6,'TGL LAHIR',1,0,'C');
$pdf->Cell(10,6,'JK',1,0,'C');
$pdf->Cell(20,6,'DUSUN',1,0,'C');
$pdf->Cell(10,6,'RT',1,0,'C');
$pdf->Cell(10,6,'RW',1,0,'C');
$pdf->Cell(26,6,'PENDIDIKAN',1,0,'C');
$pdf->Cell(19,6,'AGAMA',1,0,'C');
$pdf->Cell(20,6,'KAWIN',1,0,'C');
$pdf->Cell(40,6,'PEKERJAAN',1,1,'C');




$pdf->SetFont('Arial','',7);
include 'inc/koneksi.php';
$no = 1;
$pdd = mysqli_query($koneksi, "select * from tb_pdd inner join tb_pendidikan on tb_pdd.id_pendidikan = tb_pendidikan.id_pendidikan  order by nama asc");
while ($row = mysqli_fetch_array($pdd)){

    $pdf->Cell(8,6,$no++ ,1,0,'C');
    $pdf->Cell(25,6,$row['nik'],1,0);  
    $pdf->Cell(38,6,$row['nama'],1,0);
    $pdf->Cell(22,6,$row['tempat_lh'],1,0,'C');
    $pdf->Cell(24,6, date('d-m-Y', strtotime($row['tgl_lh'])),1,0,'C');
    $pdf->Cell(10,6,$row['jekel'],1,0,'C');
    $pdf->Cell(20,6,$row['dusun'],1,0,'C');
    $pdf->Cell(10,6,$row['rt'],1,0,'C'); 
    $pdf->Cell(10,6,$row['rw'],1,0,'C'); 
    $pdf->Cell(26,6,$row['tingkatan'],1,0,'C'); 
    $pdf->Cell(19,6,$row['agama'],1,0,'C'); 
    $pdf->Cell(20,6,$row['kawin'],1,0,'C'); 
    $pdf->Cell(40,6,$row['pekerjaan'],1,1); 
}




$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(10,7,'',0,1,'C');
$pdf->Cell(460,7,'Kaduagung,',0,1,'C');
$pdf->Cell(490,7,'Kepala Desa Kaduagung',0,1,'C');
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(490,7,'_____________________',0,1,'C');






ob_end_clean();
$pdf->Output();
?>
