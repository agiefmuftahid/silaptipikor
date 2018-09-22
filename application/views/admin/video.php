
                        <!-- /.panel-heading -->
                         <a href="<?php echo base_url('admin/video_tambah'); ?>" class="btn btn-success">Tambah Vdeo Url Youtube</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Url</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($video->result() as $tag_i):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $tag_i->url; ?></td>
                                 <td><?php echo $tag_i->nama; ?></td>
                                  <td><?php  
                                  if ($tag_i->tanggal == "0000-00-00"){
                                      echo "Format Tanggal Kosong";
                                  }else{
                                      tgl_indonesia($tag_i->tanggal);
                                  } 
                                  ?></td>
                                 <td><a href="<?php echo base_url('admin/video_hapus/'.$tag_i->id_video); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/video_edit/'.$tag_i->id_video); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          


