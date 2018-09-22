<?= $this->session->flashdata('pesan'); ?>
 <a href="<?php echo base_url('admin/dosen_tambah'); ?>" class="btn btn-success">Tambah Data Dosen</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>Foto</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Facebook</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($data->result() as $dosen): ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $dosen->nama; ?></td>
                                 <td><?php echo $dosen->nip; ?></td>
                                 <td><img src="<?= base_url('/asset/dosen/'.$dosen->foto); ?>" class="img-responsive" style="width: 150px;height: 150px">
                                 </td>
                                <td><?php echo $dosen->jabatan; ?></td>
                                <td><?php echo $dosen->email; ?></td>
                                <td><?php echo $dosen->fb; ?></td>
                                 <td><a href="<?php echo base_url('admin/dosen_hapus/'.$dosen->id_dosen); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/dosen_edit/'.$dosen->id_dosen); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>
                                 <?php $no++; endforeach; ?>


                                </tbody>
                            </table>
                          


