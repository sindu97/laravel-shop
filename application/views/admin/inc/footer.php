<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo base_url(); ?>">STRAIC</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script>
  $(document).ready(function(){
    $('#example1').DataTable({
    "bSort" :false
});
});
  
</script>
<script type="text/javascript">
	function base_url(url=''){
		return '<?php echo base_url(); ?>'+url ;
	}
</script>
<!-- jQuery 3 -->
<script src="<?php echo base_url("admin_assets/") ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url("admin_assets/") ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url("admin_assets/") ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('admin_assets/'); ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url('admin_assets/'); ?>bower_components/PACE/pace.min.js"></script>
<!-- alertify -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?php echo base_url('admin_assets/voj/ajax-form.min.js'); ?>"></script>
<script src="<?php echo base_url('admin_assets/scripts.js'); ?>"></script>
<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap.js"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
  <?php echo $extra_footer; ?>
</body>
</html>