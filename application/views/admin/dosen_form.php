<?php 
buka_form('','','');
buat_textbox('Nama Dosen','nama','','5');
buat_textbox('NIP','nip','','5');
buat_textbox('Gambar', 'gambar','','4',"file");
buat_textbox('Jabatan Dosen','jabatan','','5');
buat_textbox('Email Dosen','email','','5');
buat_textbox('Facebook Dosen','fb','','5');
if($aksi=="edit"){
echo '<img src="'.base_url('asset/dosen/'.$foto).'" class="img-responsive" style="width:200;height:200px;">';
}else{
}
tutup_form(base_url('admin/dosen'),'kirim');
