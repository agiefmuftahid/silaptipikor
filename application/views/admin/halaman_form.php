<?php 

buka_form('','','');
buat_textbox('Judul Halaman ','judul',$judul_halaman,'5');
buat_textarea('Isi','isi',$isi,'5');
tutup_form(base_url('admin/halaman'),'kirim');
