<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_model
{
	
 
public function select_where($table='',$param='',$bidang)
{
 return $this->db->query("SELECT * from $table where $param='$bidang'");
}


public function menu_utama()
{
return $this->db->query("SELECT * FROM menu WHERE kategori_menu='home' AND induk='0' ORDER BY urut");
}

public function menu_sub_utama($induk)
{
return $this->db->query("SELECT * FROM menu WHERE induk='$induk' ORDER BY urut");
}

public function select_where_home($table='',$param='',$bidang)
{
 return $this->db->query("SELECT * from $table where $param='$bidang' order by id_artikel desc limit 10");
}

public function select_limit($nama='',$param='',$jumlah)
{
 return $this->db->query("SELECT * from $nama order by $param desc limit $jumlah");
}


public function select_where_menu($table='',$param='',$bidang)
{
 return $this->db->query("SELECT * from $table where $param='$bidang' ORDER BY urut");
}


public function select_where_and($table='',$param='',$bidang,$tabel1,$data1,$order)
{
 return $this->db->query("SELECT * from $table where $param='$bidang' and $tabel1='$data1' ORDER BY urut");
}


public function kategori($id='',$offset,$limit)
{
	return $this->db->query("SELECT * from artikel where kategori='$id' order by id_artikel DESC limit $offset,$limit"); 
}

public function tag($id='',$offset,$limit)
{
	return $this->db->query("SELECT * from artikel where tag='$id' order by id_artikel DESC limit $offset,$limit"); 
}


public function agenda($offset,$limit)
{
return $this->db->query("SELECT * from agenda order by id_agenda DESC limit $offset,$limit");

}


public function pilih($value)
{
 return $this->db->query("SELECT * from $value");
}


function insertdata($tabel, $data){

	return $this->db->insert($tabel,$data);
}


function updatedata($tabel,$data,$where){
		return $this->db->update($tabel,$data,$where);
}

public function login($username,$password)
{

return $this->db->query("SELECT * from admin where username='$username' AND password='$password' limit 1");

}	

public function cek_admin()
{
  return $this->db->query("SELECT * from artikel a, admin b,kategori c where a.id_user=b.id_admin AND c.id_kategori=a.kategori order by a.id_artikel");
}

public function berita_semua($offset='',$limit)
{
	return $this->db->query("SELECT * from artikel a, admin b ,kategori c where a.id_user=b.id_admin 
		AND c.id_kategori=a.kategori order by a.id_artikel DESC limit $offset,$limit");
}


}