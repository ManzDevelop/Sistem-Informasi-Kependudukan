<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Penduduk</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
					</div>

				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">TTL</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
					</div>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-5">
						<select name="jekel" id="jekel" class="form-control" required>
							<option value="" selected disabled>- pilih -</option>
							<option>L</option>
							<option>P</option>
						</select>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Dusun</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="dusun" name="dusun" placeholder="Dusun" required>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">RT/RW</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Agama</label>
					<div class="col-sm-5">
						<select name="agama" id="agama" class="form-control" required>
							<option value="" selected disabled>- pilih -</option>
							<option value="Islam">Islam</option>
							<option value="Kristen">Kristen</option>
							<option value="Katholik">Katholik</option>
							<option value="Hindu">Hindu</option>
							<option value="Budha">Budha</option>
							<option value="Konghucu">Konghucu</option>
						</select>

					</select>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control" required>
						<option value="" selected disabled>- pilih -</option>
						<option>Sudah</option>
						<option>Belum</option>
						<option>Cerai Mati</option>
						<option>Cerai Hidup</option>
					</select>
				</div>
			</div>

					<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
					<div class="col-sm-3">
						<select name="id_pendidikan" id="id_pendidikan" class="form-control" required>
							<option value="" selected disabled>- pilih -</option>
							<?php
				// ambil data dari database
							$query = "select * from tb_pendidikan ";
							$hasil = mysqli_query($koneksi, $query);
							while ($row = mysqli_fetch_array($hasil)) {
								?>
								<option value="<?php echo $row['id_pendidikan'] ?>">
									<?php echo $row['tingkatan'] ?>
								</option>
								<?php
							}
							?>	

						</select>
					</div>
				</div>




			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
				</div>


		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset ($_POST['Simpan'])){
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tempat_lh = $_POST['tempat_lh'];
	$tgl_lh = $_POST['tgl_lh'];
	$jekel = $_POST['jekel'];
	$dusun = $_POST['dusun'];
	$rt = $_POST['rt'];
	$rw= $_POST['rw'];
	$agama = $_POST['agama'];
	$kawin= $_POST['kawin'];
	$id_pendidikan = $_POST['id_pendidikan'];
	$pekerjaan = $_POST['pekerjaan'];



        $sql_cek_nik = mysqli_query($koneksi, "SELECT * FROM tb_pdd where nik = '$nik'");
        if (mysqli_num_rows($sql_cek_nik) > 0 ) {
        	echo "<script>
        	Swal.fire({title: 'NIK sudah pernah di input!',text: '',icon: 'error',confirmButtonText: 'OK'
        	}).then((result) => {if (result.value){
        		window.location = 'index.php?page=add-pend';
        	}
        })</script>";
        	# code...
    } else{

    	$result = mysqli_query($koneksi, "INSERT INTO tb_pdd (nik,nama,tempat_lh,tgl_lh,jekel,dusun,rt,rw,agama,kawin,pekerjaan,id_pendidikan) VALUES('$nik','$nama','$tempat_lh','$tgl_lh','$jekel','$dusun','$rt','$rw','$agama','$kawin','$pekerjaan','$id_pendidikan')");

    	if (!$result) {

    		echo "<script>
    		Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    		}).then((result) => {if (result.value){
    			window.location = 'index.php?page=add-pend';
    		}
    	})</script>";
    }else{
    	echo "<script>
    	Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    	}).then((result) => {if (result.value){
    		window.location = 'index.php?page=data-pend';
    	}
    })</script>";
}}}
     //selesai proses simpan data
