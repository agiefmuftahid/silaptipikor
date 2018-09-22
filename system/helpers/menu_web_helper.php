<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();

function cari_menu($data){

	if ($data['jenis_link']=="halaman") {
    
    
	$url=base_url('/halaman/'.$data['link'].'/'.seo($data['judul']).'.html');
    
	}elseif ($data['jenis_link']=="kategori") {
    
	$url=base_url('/kategori/'.$data['link'].'/'.seo($data['judul']));
	}else{
	$url=$data['link'];

	}

	return $url;
	}

