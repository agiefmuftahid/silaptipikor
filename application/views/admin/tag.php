
                        <!-- /.panel-heading -->
                         <a href="<?php echo base_url('c_admin/tag_tambah'); ?>" class="btn btn-success">Tambah Tag Berita</a>
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
                                foreach($tag->result() as $tag_i):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $tag_i->tag; ?></td>
                                 <td><?php echo $tag_i->tag_seo; ?></td>
                                 
                                 <td><a href="<?php echo base_url('c_admin/tag_hapus/'.$tag_i->id_tag); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('c_admin/tag_edit/'.$tag_i->id_tag); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

