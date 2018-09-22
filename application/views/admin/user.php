<?= $this->session->flashdata('pesan') ?>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Level Akses</th>
                                        <th></th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($user->result() as $set):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $set->username; ?></td>
                                 <td><?php echo $set->nama; ?></td>
                                 <td><?php echo $set->level; ?></td>

                                 <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/user_edit/'.$set->id_admin); ?>" class="btn btn-primary">Edit</a></td>
                                  <td>
                                 <a href="<?php echo base_url('admin/user_hapus/'.$set->id_admin); ?>" class="btn btn-primary">Hapus</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

