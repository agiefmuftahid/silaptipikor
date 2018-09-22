<?= $this->session->flashdata('pesan'); ?>

                    <a href="<?php echo base_url('admin/artikel_tambah'); ?>" class="btn btn-success">Tambah Artikel</a>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>judul</th>
                                        <th>Gambar</th>
                                        <th>Admin</th>
                                        <th>Kategori</th>
                                        
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($data->result() as $berita):
                        $admin=$this->M_admin->select_where('admin','id_admin',$berita->id_user)->row();
                        $kategori=$this->M_admin->select_where('kategori','id_kategori',$berita->kategori)->row();
                       
                        $hitung=$this->M_admin->select_where('admin','id_admin',$berita->id_user)->num_rows();                               
                                  ?>
                                 <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $berita->judul; ?></td>
                                 <td><img src="<?php echo base_url('/asset/gambar/'.$berita->gambar); ?>" style="width:200px;height:200px">
                                 </td>
                                 <td><?php if($hitung == ""){
                                 echo 'TIDAK ADA DATA';
                                 }else{
                                 echo $admin->nama;
                                 }


                                   ; ?></td>
                                 <td><?php echo $kategori->kategori; ?></td>
                                
                                 <td><?php echo tgl_indonesia($berita->tanggal); ?></td>
                                 <td><a href="<?php echo base_url('admin/artikel_hapus/'.$berita->id_artikel); ?>" class="btn btn-danger">Hapus</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('admin/artikel_edit/'.$berita->id_artikel); ?>" class="btn btn-primary">Edit</a></td>
                                 </tr>

                                 <?php $no++; endforeach; ?>


                                </tbody>


                            </table>
                          

                        