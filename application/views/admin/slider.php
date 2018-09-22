<?= $this->session->flashdata('pesan') ?>

                <a href="<?php echo base_url('admin/slider_tambah');  ?>" class="btn btn-success">Tambah Slider</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($slider->result() as $slid):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><img src="<?php echo base_url('asset/slider/'.$slid->gambar); ?>" style="width:100px;height:100px">
                                 </td>
                                 <td><?php echo $slid->tanggal_upload; ?></td>
                                 <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/slider_edit/'.$slid->id_slider); ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url('admin/slider_hapus/'.$slid->id_slider); ?>" class="btn btn-danger">HAPUS</a> 
                                </td>
                                 </tr>
                                 <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                          

