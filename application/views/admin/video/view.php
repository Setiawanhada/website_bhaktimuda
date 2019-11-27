<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Video</a>
			</li>
			<li class="breadcrumb-item active">Data Video</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				List Data Video
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Judul Video</th>
								<th>Link Video</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs_data as $data): ?>
							<tr>
								<td><?php echo $data['judul'] ?></td>
								<td><?php echo $data['link'] ?></td>
								<td><a class="btn btn-warning btn-sm"
                                    href="<?php echo site_url('admin/video/edit/'.$data['kode_video'])?>"><i
									class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-danger btn-sm"
                                    href="<?php echo site_url('admin/video/delete/'.$data['kode_video'])?>"><i
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
