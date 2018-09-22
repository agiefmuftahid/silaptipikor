<a href="<?php echo base_url('admin/menu_tambah'); ?>" class="btn btn-primary">Tambah</a>
<table class="table table-striped"> 
<tr>
<th>No</th>
<th>Judul</th>
<th>Link</th>
<th>Urutan</th>
<th>Aksi</th>

<?php 

if ($menu_web->num_rows() == 0) {
$no=1;
foreach($menu_web->result_array() as $ter): 

?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo $ter['judul'] ?></td>
<td><?php echo $ter['jenis_link'] ?></td>
<td><?php echo $ter['urut']; ?></td>

<td><a href="<?php echo base_url('admin/menu_edit/'.$ter['id_menu']); ?>" class="btn btn-primary">Edit</a>   <a href="<?php echo base_url('admin/menu_edit/'.$ter['id_menu']); ?>" class="btn btn-danger">Hapus</a></td>
</tr>

<?php 

$no++; endforeach; 

}else{  

$no=1;
foreach($menu_web->result_array() as $menu_home): 
?>

<tr>
<td><?php echo $no ?></td>
<td><?php echo $menu_home['judul'] ?></td>
<td><?php echo $menu_home['jenis_link'] ?></td>
<td><?php echo $menu_home['urut']; ?></td>

<td><a href="<?php echo base_url('admin/menu_edit/'.$menu_home['id_menu']); ?>" class="btn btn-primary">Edit</a>   <a href="<?php echo base_url('admin/menu_hapus/'.$menu_home['id_menu']); ?>" class="btn btn-danger">Hapus</a></td>
</tr>
<?php
$sub=$this->M_admin->select_where('menu','induk',$menu_home['id_menu']);
$no=1;
foreach($sub->result_array() as $data_sub):
?>
<tr>
<td><?php echo $no ?></td>
<td><?php echo '---'.$data_sub['judul'] ?></td>
<td><?php echo '---'.$data_sub['jenis_link'] ?></td>
<td><?php echo '---'.$data_sub['urut']; ?></td>

<td><a href="<?php echo base_url('admin/menu_edit/'.$data_sub['id_menu']); ?>" class="btn btn-primary">Edit</a>   <a href="<?php echo base_url('admin/menu_hapus/'.$data_sub['id_menu']); ?>" class="btn btn-danger">Hapus</a></td>
</tr>

<?php 
$no++; endforeach;
$no++; endforeach; 
}
 ?>
</tr>
</table>