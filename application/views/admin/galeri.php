<?= $this->session->flashdata('pesan'); ?>
                    <a href="<?php echo base_url('admin/galeri_tambah'); ?>" class="btn btn-success">Tambah Galeri</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($data->result() as $galeri):                          
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $galeri->judul; ?></td>
                                 <td><img src="<?php echo base_url('/asset/galeri/'.$galeri->gambar); ?>" style="width:200px;height:200px">
                                 </td>
                                 <td><?= tgl_indonesia($galeri->tanggal_upload
                                 ); ?></td>
                                 <td><a href="<?php echo base_url('admin/galeri_hapus/'.$galeri->id_galeri); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/galeri_edit/'.$galeri->id_galeri); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

                        