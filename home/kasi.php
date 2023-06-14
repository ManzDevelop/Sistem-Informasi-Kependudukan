
<?php

$sql = $koneksi->query("SELECT COUNT(id_pend) as pend  from tb_pdd ");
while ($data= $sql->fetch_assoc()) {
	$pend=$data['pend'];
}

$sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
while ($data= $sql->fetch_assoc()) {
	$kartu=$data['kartu'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as laki  from tb_pdd where jekel='L'");
while ($data= $sql->fetch_assoc()) {
	$laki=$data['laki'];
}

$sql = $koneksi->query("SELECT COUNT(id_pend) as prem  from tb_pdd where jekel='P'");
while ($data= $sql->fetch_assoc()) {
	$prem=$data['prem'];
}


$sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna  from tb_pengguna");
while ($data= $sql->fetch_assoc()) {
	$pengguna=$data['pengguna'];
}

$sql = $koneksi->query("SELECT COUNT(*) AS total_kurang FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR, tgl_lh, CURDATE())  < 15 AND tgl_lh != '0000-00-00'");
while ($data= $sql->fetch_assoc()) {
	$kurang=$data['total_kurang'];
}
			
$sql = $koneksi->query("SELECT COUNT(*) AS total_tengah FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR,tgl_lh, CURDATE())BETWEEN 15 AND 64 ");
while ($data= $sql->fetch_assoc()) {
	$tengah=$data['total_tengah'];
}
$sql = $koneksi->query("SELECT COUNT(*) AS total_lebih FROM tb_pdd WHERE TIMESTAMPDIFF(YEAR, tgl_lh, CURDATE())  > 64 AND tgl_lh != '0000-00-00'");
while ($data= $sql->fetch_assoc()) {
	$lebih=$data['total_lebih'];
}
						





?>

<script src="build/assets/js/jquery-1.10.1.min.js"></script>
<script src="build/assets/js/highcharts.js"></script>
<script>
		var chart1; // globally available
		$(document).ready(function() {
			chart1 = new Highcharts.Chart({
				chart: {
					renderTo: 'mygraph',
					type: 'column'
				},   
				title: {
					text: 'Grafik Data Tingkatan Pendidikan Masyarakat Desa Kaduagung'
				},
				xAxis: {
					categories: ['Data Tingkatan Pendidikan']
				},
				yAxis: {
					title: {
						text: 'Jumlah Tingkatan'
					}
				},
				series:             
				[

				<?php 
				$server = "localhost";
				$username = "root";
				$password = "";
				$database = "db_kaduagung";
				mysql_connect($server,$username,$password) or die("Koneksi gagal");
				mysql_select_db($database) or die("Database tidak bisa dibuka");
$sql   = "SELECT tb_pendidikan.tingkatan, count(*) as number FROM tb_pdd,tb_pendidikan where tb_pendidikan.id_pendidikan = tb_pdd.id_pendidikan GROUP BY tb_pendidikan.id_pendidikan"; // file untuk mengakses ke tabel database
$query = mysql_query( $sql ) or die(mysql_error());         
while($ambil = mysql_fetch_array($query)){
	$ktg=$ambil['tingkatan'];
	
	$sql_jumlah   = "SELECT tb_pendidikan.tingkatan, count(*) as number FROM tb_pdd,tb_pendidikan where tb_pendidikan.id_pendidikan = tb_pdd.id_pendidikan and tb_pendidikan.tingkatan='$ktg' GROUP BY tb_pendidikan.id_pendidikan";        
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	while( $data = mysql_fetch_array( $query_jumlah ) ){
		$jumlahx = $data['number'];                 
	}             

	?>
	{
		name: '<?php echo $ktg; ?>',
		data: [<?php echo $jumlahx; ?>]
	},
<?php } ?>
]
});
		});	
	</script>


	<div class="card card-info">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-tachometer-alt"></i> Dasboard </h3>
			</div><b>
				<marquee>Selamat Datang Di Aplikasi Pengelolaan Data Pendidikan Masyarakat Desa Kaduagung 
				</marquee></b>
				<div class="card-body">

					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3>
										<?php echo $pend;  ?>
									</h3>

									<p>Penduduk</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
									<i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3>
										<?php echo $kartu;  ?>
									</h3>

									<p>Kartu Keluarga</p>
								</div>
								<div class="icon">
									<i class="ion ion-card"></i>
								</div>
								<a href="index.php?page=data-kartu" class="small-box-footer">Selengkapnya
									<i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>


						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-red">
								<div class="inner">
									<h3>
										<?php echo $laki;  ?>
									</h3>

									<p>Laki-laki</p>
								</div>
								<div class="icon">
									<i class="ion ion-male"></i>
								</div>
								<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
									<i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3>
										<?php echo $prem;  ?>
									</h3>

									<p>Perempuan</p>
								</div>
								<div class="icon">
									<i class="ion ion-female"></i>
								</div>
								<a href="index.php?page=data-pend" class="small-box-footer">Selengkapnya
									<i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>


						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-body">
									<div id ="mygraph"></div>
								</div>
							</div>
						</div>



					<!-- ./col -->
						<div class="col-lg-9 col-6" >
							<!-- small box -->
							<div class="small-box bg-light">
								<div class="inner">
								<table class="table ">
													<thead>
								<p class="text-center"><b>Klasifikasi Usia Produktif</b><br>
									<tr  class="text-center">
										<td> <h3>
										<?php echo $kurang;  ?>
										</h3>
										<p>Usia Dibawah 15 Tahun</p>
									<p class="badge badge-danger">Tidak Produktif </td>
									<td >
										<td> <h3>
										<?php echo $tengah;  ?>
										</h3>
										<p>Usia 15-64 tahun</p>
										<p class="badge badge-success">Produktif </td>
								
									<td >
										<td> <h3>
										<?php echo $lebih;  ?>
										</h3>
										<p >Usia 64 tahun Keatas</p>
										<p class="badge badge-danger">Tidak Produktif </td>
								
									</tr>
								</thead>
								</table>	
								</div>

							</div>
						</div>




						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-light">
								<div class="inner">
									<h3>
										<?php echo $pengguna;  ?>
									</h3>

									<p>Pengguna</p>
								</div>
								<div class="icon">
									<i class="ion ion-person"></i>
								</div>
								<a href="index.php?page=data-pengguna" class="small-box-footer">Selengkapnya
									<i class="fas fa-arrow-circle-right"></i>
								</a>
							</div>
						</div>