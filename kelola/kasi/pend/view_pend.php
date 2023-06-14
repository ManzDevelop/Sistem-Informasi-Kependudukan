
<!--?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT p.nik, p.nama, p.jekel, p.dusun, p.rt, p.rw, p.pendidikan, p.agama,p.kawin,p.pekerjaan , a.id_kk, k.no_kk  from tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
			  left join tb_kk k on a.id_kk=k.id_kk where id_pend ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
    ?-->



    <?php

    if(isset($_GET['kode'])){
    	$sql_cek = "SELECT * from tb_pdd  left join tb_pendidikan on tb_pdd.id_pendidikan = tb_pendidikan.id_pendidikan
    	where id_pend ='".$_GET['kode']."'";
    	$query_cek = mysqli_query($koneksi, $sql_cek);
    	$data_cek = mysqli_fetch_array($query_cek,MYSQLI_ASSOC);
    }
    ?>




    <div class="card card-success">
    	<div class="card-header">
    		<h3 class="card-title">
    			<i class="fa fa-user"></i> Detail Penduduk</h3>
    		</h3>
    		<div class="card-tools">
    		</div>
    	</div>
    	<div class="card-body p-0">
    		<table class="table">
    			<tbody>
    				<tr>
    					<td style="width: 150px">
    						<b>NIK</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['nik']; ?>
    					</td>

    				</tr>
    				<tr>
    					<td style="width: 150px">
    						<b>Nama</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['nama']; ?>
    					</td>
    				</tr>
    				<tr>
    					<td style="width: 150px">
    						<b>TTL</b>
    					</td>
    					<td>:
    						<?php echo $data_cek ['tempat_lh']; ?>
    						/
    						<?php echo date('d-m-Y', strtotime($data_cek['tgl_lh']));?>
    					</td>
    				</tr>
    				<tr>
    					<td style="width: 150px">
    						<b>Jenis Kelamin</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['jekel']; ?>
    					</td>
    				</tr>
    				<tr>
    					<td style="width: 150px">
    						<b>Dusun</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['dusun']; ?>, RT
    						<?php echo $data_cek['rt']; ?>/ RW
    						<?php echo $data_cek['rw']; ?>
    					</td>
    				</tr>


    				<tr>
    					<td style="width: 150px">
    						<b>Agama</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['agama']; ?>
    					</td>
    				</tr>



    				<tr>
    					<td style="width: 150px">
    						<b>Status Kawin</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['kawin']; ?>
    					</td>
    				</tr>
    				<tr>
    					<td style="width: 150px">
    						<b>Pekerjaan</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['pekerjaan']; ?>
    					</td>
    				</tr>

    				<tr>
    					<td style="width: 150px">
    						<b>Pendidikan Terakhir</b>
    					</td>
    					<td>:
    						<?php echo $data_cek['tingkatan']; ?>
    					</td>
    				</tr>			

    			</tbody>
    		</table>
    		<div class="card-footer">
    			<a href="?page=data-pend" class="btn btn-warning">Kembali</a>
    		</div>
    	</div>
    </div>