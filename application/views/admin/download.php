<?= $this->session->flashdata('pesan'); ?>
                    <a href="<?php echo base_url('admin/download_tambah'); ?>" class="btn btn-success">Tambah Download</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>File</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($data->result() as $down):                          
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><img src="<?php echo base_url('/asset/download/'.$down->nama_file); ?>" style="width:200px;height:200px">
                                 </td>
                                 
                                 <td><?= tgl_indonesia($down->tanggal_upload
                                 ); ?></td>
                                 <td><a href="<?php echo base_url('admin/download_hapus/'.$down->id_download); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/download_edit/'.$down->id_download); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>
                                 <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
 