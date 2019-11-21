<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Informasi</a>
			</li>
			<li class="breadcrumb-item active">Lihat Informasi</li>
		</ol>

		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				List Data Informasi
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Judul</th>
								<th>Gambar</th>
								<th>Isi Informasi</th>
								<th>Tanggal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs_data as $data): ?>
							<tr>
								<td><?php echo $data['judul'] ?></td>
								<td><?php echo $data['judul'] ?></td>
								<td><?php echo $data['isi'] ?></td>
								<td><?php echo date_indo($data['tanggal']) ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer small text-muted">Updated Terakhir <?php echo date_indo($last_update) ?></div>
		</div>

	</div>
	<!-- /.container-fluid -->
