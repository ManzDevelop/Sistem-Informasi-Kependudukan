

<?php

if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_pdd WHERE id_pend='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>




<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Penduduk</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row" hidden="">
					<label class="col-sm-2 col-form-label">No Sistem</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_cek['id_pend']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">NIK</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">TTL</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
						/>
					</div>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<div class="col-sm-3">
						<select name="jekel" id="jekel" class="form-control" >
														<?php
                //menhecek data yg dipilih sebelumnya
							if ($data_cek['jekel'] == "L") echo "<option value='L' selected>L</option>";
							else echo "<option value='L'>L</option>";

							if ($data_cek['jekel'] == "P") echo "<option value='P' selected>P</option>";
							else echo "<option value='P'>P</option>";
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Dusun</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="dusun" name="dusun" value="<?php echo $data_cek['dusun']; ?>"
						/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">RT/RW</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
						/>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>"
						/>
					</div>
				</div>



				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Agama</label>
					<div class="col-sm-3">
						<select name="agama" id="agama" class="form-control">
							<?php
                //menhecek data yg dipilih sebelumnya
							if ($data_cek['agama'] == "islam") echo "<option value='Islam' selected>Islam</option>";
							else echo "<option value='Islam'>Islam</option>";

							if ($data_cek['agama'] == "Kristen") echo "<option value='Kristen' selected>Kristen</option>";
							else echo "<option value='Kristen'>Kristen</option>";

							if ($data_cek['agama'] == "Katholik") echo "<option value='Katholik' selected>Katholik</option>";
							else echo "<option value='Katholik'>Katholik</option>";

							if ($data_cek['agama'] == "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
							else echo "<option value='Hindu'>Hindu</option>";

							if ($data_cek['agama'] == "Budha") echo "<option value='Budha' selected>Budha</option>";
							else echo "<option value='Budha'>Budha</option>";

							if ($data_cek['agama'] == "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
							else echo "<option value='Konghucu'>Konghucu</option>";

							?>
						</select>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Status Perkawinan</label>
					<div class="col-sm-3">
						<select name="kawin" id="kawin" class="form-control">
							<?php
                //menhecek data yg dipilih sebelumnya
							if ($data_cek['kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
							else echo "<option value='Sudah'>Sudah</option>";

							if ($data_cek['kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
							else echo "<option value='Belum'>Belum</option>";

							if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
							else echo "<option value='Cerai Mati'>Cerai Mati</option>";

							if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
							else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pekerjaan</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>"
						/>
					</div>
				</div>


				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
					<div class="col-sm-3">


						<select name="id_pendidikan" id="id_pendidikan" class="form-control" >
							<?php
							$sqlpendidikan = mysqli_query ($koneksi, "select * from tb_pendidikan ");
							while ($j = mysqli_fetch_array($sqlpendidikan))
							{
								if($j['id_pendidikan'] == $data_cek['id_pendidikan'])
								{
									$selected = "selected";
								} else
								{
									$selected="";
								}
								?>
								<option value="<?php echo $j['id_pendidikan']; ?>" <?php echo $selected; ?>><?php echo $j['tingkatan']; ?></option>
								<?php
							}
							?>
						</select>

					</div>
				</div>


				</div>
				<div class="card-footer">
					<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
					<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>

		<?php
		if(isset($_POST['Ubah'])) {
			$id_pend = $_POST['id_pend'];
			$nik = $_POST['nik'];
			$nama = $_POST['nama'];
			$tempat_lh = $_POST['tempat_lh'];
			$tgl_lh = $_POST['tgl_lh'];
			$tgl_lh = $_POST['tgl_lh'];
			$jekel = $_POST['jekel'];
			$dusun = $_POST['dusun'];
			$rt = $_POST['rt'];
			$rw = $_POST['rw'];
			$agama= $_POST['agama'];
			$kawin = $_POST['kawin'];
			$id_pendidikan = $_POST['id_pendidikan'];
			$pekerjaan = $_POST['pekerjaan'];



        // Insert user data into table
        $result = mysqli_query($koneksi, "UPDATE tb_pdd SET nik='$nik', nama='$nama',
        	tempat_lh='$tempat_lh',tgl_lh='$tgl_lh',jekel='$jekel', dusun='$dusun',rt='$rt', rw='$rw', agama='$agama',kawin='$kawin',id_pendidikan='$id_pendidikan', pekerjaan='$pekerjaan' WHERE id_pend='$id_pend'");

        if ($result) {
        	echo "<script>
        	Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        	}).then((result) => {if (result.value)
        		{window.location = 'index.php?page=data-pend';
        	}
        })</script>";
    }else{
    	echo "<script>
    	Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    	}).then((result) => {if (result.value)
    		{window.location = 'index.php?page=data-pend';
    	}
    })</script>";
}}
