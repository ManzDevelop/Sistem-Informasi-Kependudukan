<?php

if(isset($_GET['kode'])){
	$sql_cek = "SELECT * FROM tb_kk WHERE id_kk='".$_GET['kode']."'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Kartu Keluarga</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">

				<div class="form-group row" hidden>
					<label class="col-sm-2 col-form-label">No Sistem</label>
					<div class="col-sm-3">
						<input type='text' class="form-control" id="id_kk" name="id_kk" value="<?php echo $data_cek['id_kk']; ?>"
						readonly/>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No KK</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $data_cek['no_kk']; ?>"
						required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Kepala Keluarga</label>
					<div class="col-sm-3">
						<select name="kepala" id="kepala" class="form-control" >


							<?php
							$sqlpendidikan = mysqli_query ($koneksi, "select * from tb_pdd ");
							while ($j = mysqli_fetch_array($sqlpendidikan))
							{
								if($j['id_pend'] == $data_cek['kepala'])
								{
									$selected = "selected";
								} else
								{
									$selected="";
								}
								?>
								<option value="<?php echo $j['id_pend']; ?>" <?php echo $selected; ?>><?php echo $j['nama']; ?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Ubah Foto KK</label>
					<div class="col-sm-6">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="fileupload-new thumbnail" style="width: 240px; height: 150px;">
								<img src="dist/img/kk/<?php echo $data_cek['upload_kk'] ?>" alt=""/>
							</div>
							<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 150px; line-height: 20px;"></div>
							<div>
								<span class="btn btn-default btn-file">
									<span class="fileupload-new"><i class="fa fa-camera"></i> Edit Foto</span>
									<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
									<input type="file" class="default" name="foto"/>
									<input type="hidden" value="<?php echo $data_cek['upload_kk'] ?>" name="foto_lawas"/>
								</span>
								<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
							</div>
						</div>
					</div>

				</div>
				<div class="card-footer">
					<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
					<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>


		<?php
		if(isset($_POST['Ubah'])) {
			$id_kk = $_POST['id_kk'];
			$no_kk = $_POST['no_kk'];
			$kepala = $_POST['kepala'];
			

			$ft_lw      = $_POST['foto_lawas'];
			  //edit foto
			if ($_FILES['foto']['name'] == "") {
				$fotoup = $ft_lw;
			}else{
				$lawas = "dist/img/kk/".$ft_lw;
				unlink($lawas);
				$filename   = $_FILES['foto']['name'];
				$dir        = "dist/img/kk/";
				$file       = 'foto';
            $new_name3  = 'kk'.$no_kk.'.jpg'; //name pada input type file
            
            $file_name      = $_FILES[''.$file.'']["name"];
            $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
            move_uploaded_file ($tmp_file, $dir.$file_name);
            rename($dir.$file_name, $dir.$new_name3);
            $fotoup = $new_name3;
        }



        // Insert user data into table
        $result = mysqli_query($koneksi, "UPDATE tb_kk SET no_kk='$no_kk', kepala='$kepala',
        	upload_kk='$fotoup' WHERE id_kk='$id_kk'");

        if ($result) {
        	echo "<script>
        	Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        	}).then((result) => {if (result.value)
        		{window.location = 'index.php?page=data-kartu';
        	}
        })</script>";
    }else{
    	echo "<script>
    	Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
    	}).then((result) => {if (result.value)
    		{window.location = 'index.php?page=data-kartu';
    	}
    })</script>";
}}