 <!-- Sticky Footer -->
 <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Bhaktimuda <?= tahun()?></span>
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
  <script>
	$('.dropify').dropify();
  </script>
  <script>
  $(document).ready(function () {
        $('select[name="kode_jabatan"]').on('change', function () {
            var id = $(this).val();
            console.log(id);
            if (id) {
                $.ajax({
                    url: "<?php echo site_url('admin/pengurus/get_jenis_jabatan')?>" + '/' + encodeURI(id),
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('select[name="kode_jenis_jabatan"]').append('<option value="' + value.kode_jenis_jabatan + '">' + value.nama_jenis_jabatan + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="kode_jenis_jabatan"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
      $(".select2").select2({
        minimumResultsForSearch: -1,
        allowClear: true
      });
    });
</script>
<script>
  $(document).ready(function () {
    $(".id_presensi").val({
    generate_qr(<?=$rs_data['id_presensi']?>)      
    });
  });
</script>
<script>
  function generate_qr(id) {
    $.ajax({
        url: "<?php echo site_url('admin/presensi/generate')?>",
        type: "post",
        data: {
            id:id
        },
        dataType: 'json',
        success: function(response) {
            $("#qrimg").html(response.info);
        }
    });
}; 
</script>
<script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('<?php echo site_url('admin/presensi/tabel_rincian_presensi_barcode/')?><?= $rs_data['id_presensi']?>', function(){
           setTimeout(refreshTable, 5000);
        });
    }
</script>
</body>

</html>
