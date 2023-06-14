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
$pdf->Cell(200,7,'LAPORAN TINGKATAN PENDIDIKAN',0,1,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(20,7,'',0,2);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(10,8,'NO',1,0,'C');
$pdf->Cell(93,8,'PENDIDIKAN TERAKHIR',1,0);
$pdf->Cell(83,8,'JUMLAH',1,1,'C');




$pdf->SetFont('Arial','',10);
include 'inc/koneksi.php';

$no = 1;
$query = "SELECT * FROM tb_pendidikan";
$kk = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
while ($data = mysqli_fetch_array($kk)){

    $id = $data['id_pendidikan'];
    $jum = $koneksi->query("SELECT tb_pdd.nama FROM tb_pdd , tb_pendidikan
        WHERE  tb_pdd.id_pendidikan = tb_pendidikan.id_pendidikan
        AND tb_pendidikan.id_pendidikan = '$id'");
    $jumlah = mysqli_num_rows($jum);
    $pdf->Cell(10,8,$no++ ,1,0,'C'); 
    $pdf->Cell(93,8,$data['tingkatan'],1,0); 


    $pdf->Cell(83,8, $jumlah." Orang",1,1,'C');  


}



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
