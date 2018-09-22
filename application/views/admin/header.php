<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Bootstrap Core CSS -->
 <link href="<?php echo base_url('asset/admin/vendor/bootstrap/css/bootstrap.min.css'); ?> " rel="stylesheet">
 <link rel="shortcut icon" href="<?= base_url('asset/icon.png') ?>">
 <script src="<?= base_url() ?>/asset/ckeditor/ckeditor.js"></script>
 <script src="<?= base_url() ?>/asset/ckeditor/styles.js"></script>
  <script type=”text/javascript”> //<![CDATA[

CKEDITOR.replace( ‘agenda’, { fullPage : true, extraPlugins : ‘docprops’,   filebrowserBrowseUrl : ‘../ckeditor/kcfinder/browse.php’,  height:”500″, width:”900″,

});

//]]> </script>

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('asset/admin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/morrisjs/morris.css'); ?>  " rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('asset/admin/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('asset/admin/vendor/datatables-plugins/dataTables.bootstrap.css'); ?>" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url('asset/admin/vendor/datatables-responsive/dataTables.responsive.css'); ?>" rel="stylesheet">
   <script src="<?php echo base_url('asset/admin/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="loading-overlay-showing" data-loading-overlay>
        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
<?php  $sql=$this->db->get_where("setting",array('parameter'=>'Nama'))->row_array(); ?>
                <?= $sql['nilai'] ?> V.2.3 Beta</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <li>
                    <a href="<?= base_url(); ?>" target="_blank" >
                        <i class="fa fa-forward fa-fw"></i>Preview Site
                    </a>
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url('admin/editpass'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?php echo base_url('admin/editpass'); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('akses/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                             
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                      <?php if ($this->session->userdata('level') == "admin") {
                        ?>  
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Informasi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('admin/artikel'); ?>">Berita</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/halaman'); ?>">Halaman</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url('admin/agenda'); ?>">Agenda</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                       <li>
                            <a href="<?php echo base_url('admin/galeri'); ?>"><i class="fa fa-table fa-fw"></i> Data Galeri </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/download'); ?>"><i class="fa fa-table fa-fw"></i> Data Download </a>
                        </li>

                        <li>
                         <a href="<?php echo base_url('admin/dosen'); ?>"><i class="fa fa-table fa-fw"></i>Data Dosen 
                        </a>
                        </li>

                        <li>
                         <a href="<?php echo base_url('admin/video'); ?>"><i class="fa fa-table fa-fw"></i>Data Video 
                        </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('admin/testimonial'); ?>"><i class="fa fa-table fa-fw"></i> Data Testimonial / Banner </a>
                        </li>


                        <li>
                            <a href="<?php echo base_url('admin/kategori'); ?>"><i class="fa fa-edit fa-fw"></i> Kategori</a>
                        </li>
                       
                       <li>
                        <a href="<?php echo base_url('admin/slider'); ?>"><i class="fa fa-edit fa-fw"></i>Slide Show </a>
                        </li>

                        <li>
                        <a href="<?php echo base_url('admin/menu'); ?>"><i class="fa fa-edit fa-fw"></i>Menu Dropdown</a>
                        </li>
 
                          <li>
                            <a href="<?php echo base_url('admin/seting'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i> Setting <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Pengaturan Website</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('admin/user'); ?>">Data User</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/seting'); ?>">Setting</a>
                                </li>
                        <li><a href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Data User</a></li>
                        <li><a href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Data User</a></li> 

                                <?php }elseif($this->session->userdata("level") == "user"){

                                ?>
                               
                            <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Informasi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="<?php echo base_url('admin/kategori'); ?>">Kategori Berita</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url('admin/artikel'); ?>">Berita</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('admin/agenda'); ?>">Agenda</a>
                                </li>
                                 
                            </ul>
                                <li>
                                <a href="<?php echo base_url('admin/galeri'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i> Galeri Foto</a>
                                </li>
                                 <li>
                                <a href="<?php echo base_url('admin/download'); ?>"><i class="fa fa-database fa-fw"></i> Galeri video</a>
                                </li>
                                 <li>
                                <a href="<?php echo base_url('admin/download'); ?>"><i class="fa fa-download fa-fw"></i> Download</a>
                                </li>

                            <!-- /.nav-second-level -->
                        </li>


                               <?php
                                }
                                 ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
   <br /><br />
   <div class="alert alert-info">
                                 <i class=""></i> <?= strtoupper($judul); ?>
                            </div>