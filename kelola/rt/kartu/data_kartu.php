<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kartu Keluarga</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">
				<div>

					<br>
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>NO KK</th>
								<th>Kepala Keluarga</th>
								<th class="text-center">Dusun</th>
								<th class="text-center">RT/RW</th>
								<th class="text-center">Anggota KK</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							$query = "SELECT * FROM tb_kk
							inner join tb_pdd on tb_kk.kepala = tb_pdd.id_pend order by nama asc ";
							$sql_kk = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($sql_kk)) {
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
									<td class="text-center">
										<?php echo $data['dusun']; ?> 
									</td>

									<td class="text-center">
										RT
										<?php echo $data['rt']; ?>/ RW
										<?php echo $data['rw']; ?>.
									</td>



									<td class="text-center">
										<a href="?page=anggota1&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK"
											class="btn btn-info btn-sm">
											<i class="fa fa-users"></i>
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