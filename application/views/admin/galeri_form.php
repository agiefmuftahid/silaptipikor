<?php 
buka_form('','','');
buat_textbox('Judul Galeri','judul','','5');

if($aksi=="edit"){
	echo '<img src="'.base_url('asset/galeri/'.$file).'" class="img-responsive" style="width:200;height:200px;">';
}else{
}
buat_textbox('Gambar', 'gambar','','4',"file");
tutup_form(base_url('admin/galeri'),'kirim');
