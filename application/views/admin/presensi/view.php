<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Presensi</a>
			</li>
			<li class="breadcrumb-item active">Data Presensi</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				List Data Presensi
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Jumlah Hadir</th>
								<th>Link Daftar Hadir</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs_data as $data): ?>
							<tr>
								<td><?php echo $data['bulan'] ?></td>
								<td><?php echo $data['tahun'] ?></td>
								<td><?php echo $data['jml'] ?></td>
								<td><?php echo $data['link'] ?></td>
								<td><a class="btn btn-warning btn-sm"
                                    href="<?php echo site_url('admin/presensi/edit/'.$data['id_presensi'])?>"><i
									class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-danger btn-sm"
                                    href="<?php echo site_url('admin/presensi/delete/'.$data['id_presensi'])?>"><i
									class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated Terakhir <?php if($last_update != 'Tidak Ada') {echo date_indo($last_update);} else{echo($last_update);} ?></div>
		</div>

	</div>
	<!-- /.container-fluid -->
