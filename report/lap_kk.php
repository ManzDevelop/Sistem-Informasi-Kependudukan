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
$pdf->Cell(270,7,'PEMERINTAH KABUPATEN KUNINGAN',0,1,'C');
$pdf->Cell(270,7,'KECAMATAN SINDANGAGUNG',0,1,'C');
$pdf->Cell(270,7,'DESA KADUAGUNG',0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(270,7,'Jl. Daeng Sutisna Kaduagung - Sindangagung - Kuningan Jawa Barat',0,1,'C');
$pdf->Cell(16,7,'__________________________________________________________________________________________________________________________________________',0,1);
$pdf->Cell(10,7,'',0,1,'C');
$pdf->SetFont('Arial','BU',12);

$pdf->Cell(270,7,'LAPORAN KARTU KELUARGA',0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0,'C');
$pdf->Cell(60,6,'NO_KK',1,0,'C');
$pdf->Cell(80,6,'NAMA KEPALA KELUARGA',1,0,'C');
$pdf->Cell(50,6,'JUMLAH ANGGOTA',1,0,'C');
$pdf->Cell(35,6,'DUSUN',1,0,'C');
$pdf->Cell(20,6,'RT',1,0,'C');
$pdf->Cell(20,6,'RW',1,1,'C');




$pdf->SetFont('Arial','',10);
include 'inc/koneksi.php';
$no = 1;
$kk = mysqli_query($koneksi, "select * from tb_kk inner join tb_pdd on tb_kk.kepala = tb_pdd.id_pend  order by nama asc");
while ($row = mysqli_fetch_array($kk)){



	$id = $row['id_kk'];
	$nm = $koneksi->query("SELECT * FROM tb_kk, tb_anggota
		WHERE tb_kk.id_kk = tb_anggota.id_kk
		AND tb_anggota.id_kk = '$id'");
	$jumlah = mysqli_num_rows($nm);


    	// Line break
	$pdf->Cell(10,6,$no++ ,1,0,'C'); 
	$pdf->Cell(60,6,$row['no_kk'],1,0);  
	$pdf->Cell(80,6,$row['nama'],1,0);
	$pdf->Cell(50,6,$jumlah ,1,0,'C');
	$pdf->Cell(35,6,$row['dusun'],1,0,'C');
	$pdf->Cell(20,6,$row['rt'],1,0,'C');
	$pdf->Cell(20,6,$row['rw'],1,1,'C');

}



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
