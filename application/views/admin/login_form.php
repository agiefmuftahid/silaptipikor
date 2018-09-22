<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul; ?></title>

     <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/admin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('asset/admin//vendor/morrisjs/morris.css');?>" rel="stylesheet">

    <link href="<?php echo base_url('asset/admin/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('asset/admin/vendor/datatables-plugins/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administrator</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                         <?= $notifikasi ?>
                            <fieldset>
                                <div class="form-group">
                            <input class="form-control" placeholder="Username" name="username" type="text" autofocus required="">
                                </div>
                                <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                </div>
                                <div class="checkbox">
                                   
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" value="Login" class="btn btn-primary">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
        <!-- jQuery -->
    <script src="<?php echo base_url('asset/admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('asset/admin/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/admin/vendor/metisMenu/metisMenu.min.js'); ?> "></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/admin/vendor/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/morrisjs/morris.min.js');?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets/admin/dist/js/sb-admin-2.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
 
</body>

</html>
