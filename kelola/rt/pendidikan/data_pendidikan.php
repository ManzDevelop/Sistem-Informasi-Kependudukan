<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tingkatan Pendidikan</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">

					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Pendidikan Terakhir</th>
								<th class="text-center">Jumlah</th>
								
							</tr>
						</thead>
						<tbody>

							<?php
							$no = 1;
							$query = "SELECT * FROM tb_pendidikan";
							$sql_kk = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
							while ($data = mysqli_fetch_array($sql_kk)) {
								?>


								<tr>
									<td class="text-center">
										<?php echo $no++; ?>
									</td>
									<td>
										<?php echo $data['tingkatan']; ?>
									</td>




									<?php 
									$id = $data['id_pendidikan'];
									$jum = $koneksi->query("SELECT tb_pdd.nama FROM tb_pdd , tb_pendidikan
										WHERE  tb_pdd.id_pendidikan = tb_pendidikan.id_pendidikan
										AND tb_pendidikan.id_pendidikan = '$id'");
									$jumlah = mysqli_num_rows($jum);
									?>
									<td class="text-center"><span class="badge badge-info"><?php echo $jumlah." Orang"; ?></span></td>





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