<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kartu Keluarga</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>
					<a href="?page=add-kartu" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
					</div>
					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>NO KK</th>
								<th>Kepala Keluarga</th>
								<th class="text-center">Jumlah Keluarga</th>
								<th class="text-center">Alamat</th>
								<th class="text-center">Anggota KK</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							$query = "SELECT * FROM tb_kk
							inner join tb_pdd on tb_kk.kepala = tb_pdd.id_pend order by nama asc";
							$sql_kk = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($sql_kk))
							{
								?>


								<tr>
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php echo $data['no_kk']; ?>
									</td>
									<td>
										<?php echo $data['nama']; ?>
									</td>


									<?php 
									$id = $data['id_kk'];
									$nm = $koneksi->query("SELECT * FROM tb_kk, tb_anggota
										WHERE tb_kk.id_kk = tb_anggota.id_kk
										AND tb_anggota.id_kk = '$id'");
									$jumlah = mysqli_num_rows($nm);
									?>
									<td class="text-center"><span class="label label-warning"><?php echo $jumlah." Orang"; ?></span></td>


									<td>
										<?php echo $data['dusun']; ?>, 
										RT
										<?php echo $data['rt']; ?>/ RW
										<?php echo $data['rw']; ?>.
									</td>
									<td class="text-center">
										<a href="?page=anggota&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK"
											class="btn btn-info btn-sm">
											<i class="fa fa-users"></i>
										</a>
									</td>
									<td class="text-center">
										<a href="?page=edit-kartu&kode=<?php echo $data['id_kk']; ?>" title="Ubah" class="btn btn-success btn-sm">
											<i class="fa fa-edit"></i>
										</a>
										<a href="?page=del-kartu&kode=<?php echo $data['id_kk']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
											title="Hapus" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>

								<?php
							}
							?>
						</tbody>
					</tfoot>
				</table>
			</div>
		</div>
	<!-- /.card-body -->