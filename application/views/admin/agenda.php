<?= $this->session->flashdata('pesan'); ?>

<a href="<?php echo base_url('admin/agenda_tambah'); ?>" class="btn btn-success">Tambah Agenda</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($data->result() as $x):     
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $x->judul; ?></td>
                                 <td><?= character_limiter($x->isi,200) ?></td>
                                 <td><?php echo tgl_indonesia($x->tanggal); ?></td>
                                 <td><a href="<?php echo base_url('admin/agenda_hapus/'.$x->id_agenda); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/agenda_edit/'.$x->id_agenda); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>
                                </tbody>
                            </table>
                          

