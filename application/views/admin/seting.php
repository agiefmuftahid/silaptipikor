
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parameter</th>
                                        <th>Nilai Seting</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($seting->result() as $set):
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $set->parameter; ?></td>
                                 <td><?php echo $set->nilai; ?></td>
                                 
                                 <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/seting_edit/'.$set->id_setting); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

