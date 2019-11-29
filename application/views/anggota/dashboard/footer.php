 <!-- Sticky Footer -->
 <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url('assets/admin/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/admin/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url('assets/admin/jquery-easing/jquery.easing.min.js') ?>"></script>
	<!-- Page level plugin JavaScript-->
	<script src="<?php echo base_url('assets/admin/datatables/jquery.dataTables.js') ?>"></script>
	<script src="<?php echo base_url('assets/admin/datatables/dataTables.bootstrap4.js') ?>"></script>
	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url('js/admin/sb-admin.min.js') ?>"></script>
	<!-- Demo scripts for this page-->
	<script src="<?php echo base_url('js/admin/demo/datatables-demo.js') ?>"></script>
  <script src="<?php echo base_url('assets/admin/plugins/dropify/dist/js/dropify.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/admin/plugins/select2/select2.full.min.js') ?>"></script>

  <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	<script type="text/javascript">
    $('#play').click(function () {
        instacam_start();
    })

    function instacam_start() {
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function (content) {
            insertAbsensi(content);
           
            $("#largeModal").modal('hide');
            scanner.stop();
            alert('Presensi Berhasil');

        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }
        }).catch(function (e) {
            console.error(e);
        });
    }
    function insertAbsensi(id) {
        $.ajax({
            url: '<?php echo site_url('anggota/presensi/add_presensi_barcode/');?>' + id ,
            dataType: 'json',
            type: 'post',
            success: function (generateId) {
                if (generateId == null) {
                    alert('ID Presensi Tidak Ditemukan');
                }else{
                    alert('ID Presensi Ditemukan');
                    
                }
                
            }
        });
    }
</script>

</body>

</html>
