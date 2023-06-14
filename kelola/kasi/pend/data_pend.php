
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penduduk</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>
					<a href="?page=add-pend" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
					</div>
					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>NAMA </th>
								<th class="text-center">JK</th>
								<th class="text-center">DUSUN</th>
								<th class="text-center">RT/RW</th>
								<th class="text-center">USIA</th>
								<th class="text-center">PENDIDIKAN</th>
								<th>No.KK</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, TIMESTAMPDIFF(YEAR, `tgl_lh`, CURDATE()) AS usia, c.tingkatan,p.dusun, p.rt, p.rw, a.id_kk, k.no_kk from 
							tb_pdd p left join tb_pendidikan c on p.id_pendidikan = c.id_pendidikan
							left join tb_anggota a on p.id_pend=a.id_pend 
							left join tb_kk k on a.id_kk=k.id_kk order by nama asc");
						while ($data= $sql->fetch_assoc()) {
							?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
								</td>
								<td class="text-center">
									<?php echo $data['jekel']; ?>
								</td>
								<td>
									<?php echo $data['dusun']; ?>

								</td>

								<td class="text-center">
									
									<?php echo $data['rt']; ?> / 
									<?php echo $data['rw']; ?>

								</td>
								


								<td class="text-center">
									<?php echo $data['usia']; ?>
								</td>
								<td class="text-center">
									<?php echo $data['tingkatan']; ?>
								</td>

								<td>
									<?php echo $data['no_kk']; ?>
								</td>

								<td class="te">
									<a href="?page=view-pend&kode=<?php echo $data['id_pend']; ?>" title="Detail"
										class="btn btn-info btn-sm">
										<i class="fa fa-user"></i>
									</a>
									<a href="?page=edit-pend&kode=<?php echo $data['id_pend']; ?>" title="Ubah"
										class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-pend&kode=<?php echo $data['id_pend']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
										</>
									</td>
								</tr>

								<?php
							}
							?>
						</tbody>
					</table>

