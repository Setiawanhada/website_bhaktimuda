<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
		</ol>

		<!-- Icon Cards-->
		<div class="row">
			<button class="btn btn-primary" id="play" title="Play" type="button" data-toggle="modal"
				data-target="#largeModal">
        <i class="fas fa-qrcode"> Lakukan Presensi</i>
      </button>
      <input type="text" class="id_anggota" id="id_anggota" value="<?php echo $this->session->userdata("id_anggota"); ?>">
			<!-- Large Modal -->
			<div id="largeModal" class="modal fade">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content ">
						<div class="modal-header pd-x-20">
							<h4>SCAN BARCODE PRESENSI</h4>
							
						</div>
						<div class="modal-body pd-20 m-auto">
							<video id="preview" class="text-center preview"></video>
						</div><!-- modal-body -->
						<div class="modal-footer">
							<button type="button" id="modal_hide" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->
		</div>


	</div>
	<!-- /.container-fluid -->
