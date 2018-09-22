 
    
<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Asslamualaikum <?= ucfirst($this->session->userdata('nama')); ?>  
                                &nbsp;Silahakan Pilih Menu Di Samping Untuk Mengakfitkan Feature Pada Website
                                 
                            </div>

 

<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                     <div class="huge"><?= $artikel ?></div>
                                    <div>Artikel</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $halaman ?></div>
                                    <div>Halaman</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $agenda ?></div>
                                    <div>Agenda</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $download ?></div>
                                    <div>Data Download</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

<div class="row">
<div class="col-lg-12">
                <div class="col-md-6">
<h2><div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Detail Login User</div></h2>
            <table class="table table-responsive">
                <tr><th>Username</th><td><?= $admin[0]['username'] ?></td></tr>
                <tr><th>Nama</th><td><?= $admin[0]['username'] ?></td></tr>
                <tr><th>Level Akses</th><td><?= $admin[0]['level'] ?></td></tr>
                <tr><th>Login Terakhir</th><td><?= $admin[0]['log'] ?></td></tr>
                <tr><th>IP Addres</th><td><?= $_SERVER['REMOTE_ADDR'] ?></td></tr>
            </table>
            </div>
               <div class="col-md-5">

<div class="panel-body">
                            <!-- Button trigger modal -->
                            <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-sign-out"></i>Baca Kebijakan Penggunaan <br /> CMS (Conten Manajemen System)
                            </button>
<br /><br /><br />
                             <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cara">
                           <i class="fa fa-sign-out"></i>Cara Menggunakan CMS
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Kebijakan Penggunaan System Aplikasi Website</h4>
                                        </div>
                                        <div class="modal-body"> 
                                               </p><?php include APPPATH . 'third_party/pedoman_cyber.php'; ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                             



                            </div>


                              <div class="modal fade" id="cara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Cara Dalam Penggunaan Website</h4>
                                        </div>
                                        <div class="modal-body"> 
                      
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup </button>
                                             
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>

                    </div>
                    </div>
                    </div>