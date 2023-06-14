

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Kartu Keluarga</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No KK</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No KK" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kepala Keluarga</label>
					<div class="col-sm-3">
						<select name="kepala" class="form-control select2bs4">
							<option value="" selected>- Pilih Penduduk -</option>
							<?php
							$sql = mysqli_query($koneksi, "select * from tb_pdd");



							while ($j = mysqli_fetch_array($sql)) {
								?>
								<option value="<?php echo $j['id_pend']; ?>"><?php echo $j['nama']; ?></option>
								<?php



							}

							?>


						</select>
					</div>
				</div>


				<div class="form-group row">


					<label class="col-sm-2 col-form-label">Upload KK</label>
					<div class="col-sm-3">

						<div class="file-field">
							<input type="file" name="foto" required >
						</div>
					</div>

				</div>
			</div>
			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>

	<?php

	if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
		$no_kk= $_POST['no_kk'];
		$kepala= $_POST['kepala'];


		$filename   = $_FILES['foto']['name'];
		$dir        = "dist/img/kk/";
		$file       = 'foto';
        $new_name3  ='kk'.$no_kk.'.jpg'; //name pada input type file
        
        $file_name      = $_FILES[''.$file.'']["name"];
        $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
        move_uploaded_file ($tmp_file, $dir.$file_name);
        rename($dir.$file_name, $dir.$new_name3);

        $fotoup = $new_name3;


        $sql_cek_no_kk= mysqli_query($koneksi, "SELECT * FROM tb_kk where no_kk = '$no_kk'");
        $sql_cek_kepala= mysqli_query($koneksi, "SELECT * FROM tb_kk where kepala = '$kepala'");
        if (mysqli_num_rows($sql_cek_no_kk) > 0 ) {
        	echo "<script>
        	Swal.fire({title: 'NO KK sudah pernah di input!',text: '',icon: 'error',confirmButtonText: 'OK'
        	}).then((result) => {if (result.value){
        		window.location = 'index.php?page=add-kartu';
        	}
        })</script>";

    } else if (mysqli_num_rows($sql_cek_kepala) > 0 ) {
    	echo "<script>
    	Swal.fire({title: 'Nama Kepala sudah pernah di input!',text: '',icon: 'error',confirmButtonText: 'OK'
    	}).then((result) => {if (result.value){
    		window.location = 'index.php?page=add-kartu';
    	}
    })</script>";



} else {

	$result = mysqli_query($koneksi, "INSERT INTO tb_kk (no_kk,kepala,upload_kk) VALUES ('$no_kk','$kepala','$fotoup')");


	if (!$result) {

		echo "<script>
		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		}).then((result) => {if (result.value){
			window.location = 'index.php?page=add-kartu';
		}
	})</script>";

}else{


	echo "<script>
	Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
	}).then((result) => {if (result.value){
		window.location = 'index.php?page=data-kartu';
	}
})</script>";
}}}
     //selesai proses simpan data

