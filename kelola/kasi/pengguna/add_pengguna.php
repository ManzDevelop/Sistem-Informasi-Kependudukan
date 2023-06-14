<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Pengguna</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pengguna</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Level</label>
				<div class="col-sm-4">
					<select name="level" id="level" class="form-control" required>
						<option value="" selected disabled>- Pilih -</option>
						<option>Kasi Pemerintahan</option>
						<option>RT</option>
						<option>Kepala Desa</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
  	$nama_pengguna= $_POST['nama_pengguna'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$sql_cek_nik = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where username = '$username'");
	if (mysqli_num_rows($sql_cek_nik) > 0 ) {
		echo "<script>
		Swal.fire({title: 'USERNAME sudah pernah di input!',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-pengguna';
		}
	})</script>";
        	# code...
} else{
	
	$result = mysqli_query($koneksi, "INSERT INTO tb_pengguna (nama_pengguna,username,password,level) VALUES('$nama_pengguna','$username','$password','$level')");

	if (!$result) {

          echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengguna';
          }
      })</script>";

      }else{

        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengguna';
          }
      })</script>";
    }}}
     //selesai proses simpan data
