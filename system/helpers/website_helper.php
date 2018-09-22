<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function seo($kata) {
    $simbol = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	
	//Menghilangkan simbol pada array $simbol
    $kata = str_replace($simbol, '', $kata); 
    
	//Ubah ke huruf kecil dan mengganti spasi dengan (-)
    $kata = strtolower(str_replace(' ', '-', $kata)); 
    
	return $kata;
}


function tgl_indonesia($tgl){
	$nama_bulan = array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		
	$tanggal = substr($tgl,8,2);
	$bulan = $nama_bulan[(int)substr($tgl,5,2)];
	$tahun = substr($tgl,0,4);
	
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	



