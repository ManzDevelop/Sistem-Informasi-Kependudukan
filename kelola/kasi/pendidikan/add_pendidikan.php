	<?php
 
	$query = mysqli_query($koneksi, "SELECT max(id_pendidikan) as kodeTerbesar FROM tb_pendidikan");
	$data = mysqli_fetch_array($query);
	$id = $data['kodeTerbesar'];
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id, 2, 2);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan,
	$huruf = "P-";
	$id = $huruf . sprintf("%02s", $urutan);

?>


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Tingkatan Pendidikan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">id</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" id="id" name="id"  value="<?php echo $id ?>" readonly >
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tingkatan Pendidikan</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="tingkatan" name="tingkatan" placeholder="Tingkatan Pendidikan" required>
				</div>
			</div>


			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-pendidikan" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
	</div>

	<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pendidikan (id_pendidikan, tingkatan) VALUES (
            '".$_POST['id']."',
            '".$_POST['tingkatan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pendidikan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pendidikan';
          }
      })</script>";
    }}
     //selesai proses simpan data
