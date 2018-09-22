<?php 

buka_form('','','');
buat_textbox('Judul Artikel ','judul',$judul_artikel,'5');
buat_textbox('Gambar','gambar','','5','file');

buat_textarea('Isi','isi',$isi,'5');
 foreach($kategori->result_array() as $ca2):
  $list[]=array('val' =>$ca2['id_kategori'] ,'cap'=>$ca2['kategori'] );
endforeach;

buat_combobox('Kategori','kategori',$list,'');
tutup_form('','tambah');
