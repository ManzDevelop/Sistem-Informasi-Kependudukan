<?php
ob_start();
session_start();
if (isset($_SESSION["ses_username"])==""){
	header("location: login.php");
	
}else{
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}
include "inc/koneksi.php";
?><!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pendes Kaduagung</title>
	<link rel="icon" href="dist/img/logo.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<script src="dist/js/modernizr-3.3.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-fileupload.min.css" />
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

	<script src="assets/js/jquery-1.10.1.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-primary navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars text-white"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<font color="white">
							<b>APLIKASI PENGELOLAAN DATA PENDIDIKAN MASYARAKAT DESA </b>
						</font>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text"> PENDES KADUAGUNG</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-2 pb-2 mb-2 d-flex">
					<div class="image">
						<img src="dist/img/admin.ico">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_nama; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<?php
						if ($data_level=="Kasi Pemerintahan"){
							?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>



							<li class="nav-item">
								<a href="?page=data-pend" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Penduduk
									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kartu" class="nav-link">
									<i class="nav-icon fas fa-id-card"></i>
									<p>
										Kartu Keluarga
									</p>
								</a>
							</li>



							<li class="nav-item">
								<a href="?page=data-pendidikan" class="nav-link">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p>
										Tingkatan Pendidikan
									</p>
								</a>
							</li>



							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Cetak Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=lap-penduduk" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Penduduk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap-kk" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Kartu Keluarga</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=lap-tingkatan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Tingkatan Pendidikan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap-usia" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Klasifikasi Usia Produktif</p>
										</a>
									</li>

								</ul>
							</li>

							<li class="nav-header">Setting</li>

							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon fas fa-user"></i>
									<p>
										Pengguna Sistem
									</p>
								</a>
							</li>

							<?php
						} elseif($data_level=="RT"){
							?>


	

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=data-pend1" class="nav-link">
									<i class="nav-icon fas fa-users"></i>
									<p>
										Penduduk
									</p>
								</a>
							</li>


							<li class="nav-item">
								<a href="?page=data-kartu1" class="nav-link">
									<i class="nav-icon fas ion-card"></i>
									<p>
										Kartu Keluarga
									</p>
								</a>
							</li>



							<li class="nav-item">
								<a href="?page=data-pendidikan1" class="nav-link">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p>
										Tingkatan Pendidikan
									</p>
								</a>
							</li>




							<?php
						} elseif($data_level=="Kepala Desa"){
							?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>


							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Cetak Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">

									<li class="nav-item">
										<a href="?page=lap-penduduk" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Penduduk</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=lap-kk" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Kartu Keluarga</p>
										</a>
									</li>

									<li class="nav-item">
										<a href="?page=lap-tingkatan" class="nav-link">
											<i class="nav-icon far fa-circle text-warning"></i>
											<p>Tingkatan Pendidikan</p>
										</a>
									</li>

								</ul>
							</li>

							<?php
						}
						?>
						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon fas fa-arrow-circle-right"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
				</section>

				<!-- Main content -->
				<section class="content">
					<!-- /. WEB DINAMIS DISINI ############################################################################### -->
					<div class="container-fluid">
						<?php 
						if(isset($_GET['page'])){
							$hal = $_GET['page'];

							switch ($hal) {

						//Kasi Pemerintahan		

				//Pengguna
								case 'data-pengguna':
								include "kelola/kasi/pengguna/data_pengguna.php";
								break;
								case 'add-pengguna':
								include "kelola/kasi/pengguna/add_pengguna.php";
								break;
								case 'edit-pengguna':
								include "kelola/kasi/pengguna/edit_pengguna.php";
								break;
								case 'del-pengguna':
								include "kelola/kasi/pengguna/del_pengguna.php";
								break;

				//kartu KK
								case 'data-kartu':
								include "kelola/kasi/kartu/data_kartu.php";
								break;
								case 'add-kartu':
								include "kelola/kasi/kartu/add_kartu.php";
								break;
								case 'edit-kartu':
								include "kelola/kasi/kartu/edit_kartu.php";
								break;
								case 'anggota':
								include "kelola/kasi/kartu/anggota.php";
								break;
								case 'del-anggota':
								include "kelola/kasi/kartu/del_anggota.php";
								break;
								case 'del-kartu':
								include "kelola/kasi/kartu/del_kartu.php";
								break;

				//penduduk
								case 'data-pend':
								include "kelola/kasi/pend/data_pend.php";
								break;
								case 'add-pend':
								include "kelola/kasi/pend/add_pend.php";
								break;
								case 'edit-pend':
								include "kelola/kasi/pend/edit_pend.php";
								break;
								case 'del-pend':
								include "kelola/kasi/pend/del_pend.php";
								break;
								case 'view-pend':
								include "kelola/kasi/pend/view_pend.php";
								break;

				//pendidikan
								case 'data-pendidikan':
								include "kelola/kasi/pendidikan/data_pendidikan.php";
								break;
								case 'add-pendidikan':
								include "kelola/kasi/pendidikan/add_pendidikan.php";
								break;
								case 'edit-pendidikan':
								include "kelola/kasi/pendidikan/edit_pendidikan.php";
								break;
								case 'del-pendidikan':
								include "kelola/kasi/pendidikan/del_pendidikan.php";
								break;

				//usia
								case 'data-usia':
								include "kelola/kasi/usia/data_usia.php";
								break;


				//laporan
								case 'lap-penduduk':
								include "report/lap_penduduk.php";
								break;
								case 'lap-kk':
								include "report/lap_kk.php";
								break;
								case 'lap-tingkatan':
								include "report/lap_tingkatan.php";
								break;
								case 'lap-usia':
								include "report/lap_usia.php";
								break;



				//RT & kepala Desa



				//kartu KK
								case 'data-kartu1':
								include "kelola/rt/kartu/data_kartu.php";
								break;
								case 'anggota1':
								include "kelola/rt/kartu/anggota.php";
								break;


				//penduduk
								case 'data-pend1':
								include "kelola/rt/pend/data_pend.php";
								break;
								case 'view-pend1':
								include "kelola/rt/pend/view_pend.php";
								break;

				//pendidikan
								case 'data-pendidikan1':
								include "kelola/rt/pendidikan/data_pendidikan.php";
								break;

				//Pengguna
								case 'data-pengguna1':
								include "kelola/rt/pengguna/data_pengguna.php";
								break;









              //default
								default:
								echo "<center><h1> ERROR !</h1></center>";
								break;    
							}
						}else{
        // Auto Halaman Home Pengguna
							if($data_level=="Kasi Pemerintahan"){
								include "home/kasi.php";
							}
							elseif($data_level=="RT"){
								include "home/rt.php";
							}
							elseif($data_level=="Kepala Desa"){
								include "home/kepala.php";
							}
						}
						?>

					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				<div class="float-right d-none d-sm-block">
					Copyright &copy;
					<a target="_blank" href="#">
						<strong> AAN</strong>
					</a>
				</div>
				<b>PENDES KADUAGUNG 2020</b>
			</footer>


			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
			<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Select2 -->
		<script src="plugins/select2/js/select2.full.min.js"></script>
		<!-- DataTables -->
		<script src="plugins/datatables/jquery.dataTables.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		<!-- page script -->
		<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
		<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


		<!-- Load and execute javascript code used only in this page -->
		<script src="dist/js/pages/uiTables.js"></script>
		<script>$(function () {UiTables.init();});</script>

		<!-- Load and execute javascript code used only in this page -->
		<script src="dist/js/pages/formsComponents.js"></script>
		<script>$(function(){ FormsComponents.init(); });</script>


		<!--file upload-->
		<script type="text/javascript" src="dist/js/bootstrap-fileupload.min.js"></script>


		<script>
			$(function() {
				$("#example1").DataTable();
				$('#example2').DataTable({
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
				});
			});
		</script>

		<script>
			$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>

