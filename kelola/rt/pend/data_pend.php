
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Penduduk</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<div class="table-responsive">

				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama </th>
							<th class="text-center">JK</th>
							<th class="text-center">DUSUN</th>
							<th class="text-center">RT/RW</th>
							<th class="text-center">Usia</th>
							<th class="text-center">Pendidikan</th>
							<th class="text-center">No.KK</th>
							<th class="text-center">Detail</th>
						</tr>
					</thead>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel,p.dusun, TIMESTAMPDIFF(YEAR, `tgl_lh`, CURDATE()) AS usia, c.tingkatan, p.rt, p.rw, a.id_kk, k.no_kk from 
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

							<td class="text-center">
								<?php echo $data['no_kk']; ?>
							</td>

							<td class="text-center">
								<a href="?page=view-pend1&kode=<?php echo $data['id_pend']; ?>" title="Detail"
									class="btn btn-info btn-sm">
									<i class="fa fa-user"></i>
								</a>
							</td>
						</tr>

						<?php
					}
					?>
				</tbody>
			</table>

