
                        <!-- /.panel-heading -->
                         <a href="<?php echo base_url('admin/testimonial_tambah'); ?>" class="btn btn-success">Tambah Testimonial</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                       
                                        <th>nama</th>
                                        <th>gambar</th>
                                        <th>tanggal</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($testimonial->result() as $berita):
                                if($berita->kategori == "home"){
                                    $kategori="Testimonial";
                                }elseif($berita->kategori == "baner"){
                                    $kategori="Banner";
                                }
                                    ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $berita->nama; ?></td>
                                 <td><img src="<?php echo base_url('/asset/gambar_tes/'.$berita->gambar); ?>" style="width:200px;height:200px">
                                 </td>
                                 <td><?php echo tgl_indonesia($berita->tanggal); ?></td>
                                 <td><?= $kategori ?></td>
                                 <td><a href="<?php echo base_url('admin/testimonial_hapus/'.$berita->id_testimonial); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/testimonial_edit/'.$berita->id_testimonial); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

                        