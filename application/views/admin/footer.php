      <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('asset/admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('asset/admin/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('asset/admin/vendor/metisMenu/metisMenu.min.js'); ?> "></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('asset/admin/vendor/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('asset/admin/vendor/morrisjs/morris.min.js');?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('asset/admin/dist/js/sb-admin-2.js'); ?>"></script>
    <script src="<?php echo base_url('asset/admin/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/admin/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
