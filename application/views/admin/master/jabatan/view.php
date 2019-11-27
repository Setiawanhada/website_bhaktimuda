<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Data Jabatan</li>
		</ol>
		<div>
		<?php $this->load->view('admin/dashboard/notification') ?>
		</div>
		<!-- DataTables Example -->
		<div class="card mb-3">
			<div class="card-header">
				List Data Jabatan
				<a class="btn btn-success btn-sm " style="margin-left:auto !important;"
                    href="<?php echo site_url('admin/master/jabatan/add')?>"><i class="fa fa-plus"></i> Tambah Data
                </a>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
                                <th>Jabatan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rs_data as $data): ?>
							<tr>
                                <td><?php echo $data['nama_jabatan'] ?></td>
                                <td><?php if($data['status']== 1) {echo 'Aktif';}
                                else{echo'Tidak Aktif';} ?></td>
								<td><a class="btn btn-warning btn-sm"
                                    href="<?php echo site_url('admin/master/jabatan/edit/'.$data['kode_jabatan'])?>"><i
									class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-danger btn-sm"
                                    href="<?php echo site_url('admin/master/jabatan/delete/'.$data['kode_jabatan'])?>"><i
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
