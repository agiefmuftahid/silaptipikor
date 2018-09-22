<?= $this->session->flashdata('pesan'); ?>

                        <!-- /.panel-heading -->
                         <a href="<?php echo base_url('admin/kategori_tambah'); ?>" class="btn btn-success">Tambah Kategori</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kategori</th>
                                        <th>Kategori-Seo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($kategori->result() as $kat):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $kat->kategori; ?></td>
                                 <td><?php echo $kat->kategori_seo; ?></td>
                                 
                                 <td><a href="<?php echo base_url('admin/kategori_hapus/'.$kat->id_kategori); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/kategori_edit/'.$kat->id_kategori); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

