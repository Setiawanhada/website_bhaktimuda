<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jenis Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Data Jenis Jabatan</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				List Data Jenis Jabatan
				<a class="btn btn-success btn-sm"
                    href="<?php echo site_url('admin/master/jenis_jabatan/add')?>"><i class="fa fa-plus"></i> Tambah Data
                </a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Jenis Jabatan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs_data as $data): ?>
							<tr>
								<td><?php echo $data['nama_jabatan'] ?></td>
								<td><?php echo $data['nama_jenis_jabatan'] ?></td>
                                <td><?php if($data['status']== 1) {echo 'Aktif';}
                                else{echo'Tidak Aktif';} ?></td>
								<td><a class="btn btn-warning btn-sm"
                                    href="<?php echo site_url('admin/master/jenis_jabatan/edit/'.$data['kode_jenis_jabatan'])?>"><i
									class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-danger btn-sm"
                                    href="<?php echo site_url('admin/master/jenis_jabatan/delete/'.$data['kode_jenis_jabatan'])?>"><i
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
