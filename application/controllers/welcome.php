<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		Ismarianto Putra
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2017 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Welcome extends CI_Controller {

 public function __construct()
 {  
  error_reporting(0);
  parent::__construct();
  $this->load->model('M_admin');
  $this->load->helper('download');
  $this->load->library('pagination');
 }
 //tambahan--------------------------------------------------------------------------------//
 public function kontak(){

    $this->load->view('header');
    $this->load->view('kontak');
    $this->load->view('footer');
 }
 public function cara_melapor(){

    $this->load->view('header');
    $this->load->view('cara_melapor');
    $this->load->view('footer');
 }
 public function login(){
   $this->load->view('header');
   $this->load->view('login');
    $this->load->view('footer');
 }
 public function direction(){
       if($_POST['register']){
          redirect('welcome/register');
       }else{
        echo 0;
       }
 }
 public function register(){
       $this->load->view('header');
   $this->load->view('register');
    $this->load->view('footer');
 }
//------------------------------------------------------------------------------------------//
  public function index()
  {   
     error_reporting(0);
    $data =$this->db->query("SELECT * from setting where parameter='Nama'")->result_array();
    $data1=$this->db->query("SELECT * from setting where parameter='Nama'")->result_array();
    $data2=$this->db->query("SELECT * from setting where parameter='Nama'")->result_array();

    
    $ip  = $_SERVER['REMOTE_ADDR'];
    $tanggal= date("Ymd");
    $waktu  = time();

    $qstat = $this->db->query("SELECT * FROM md_statistik WHERE ip='$ip' and tanggal='$tanggal'");
    if($qstat->num_rows() == 0) 
    $this->db->query("INSERT INTO md_statistik SET
    ip    = '$ip',
    tanggal = '$tanggal',
    hits  = '1',
    online  = '$waktu'");
    else
    $this->db->query("UPDATE md_statistik SET
    hits  = hits+1,
    online  = '$waktu'
    WHERE ip='$ip' AND tanggal='$tanggal'");

    $query  = $this->db->query("SELECT * FROM md_statistik WHERE tanggal='$tanggal'");
    $pengunjung = $query->num_rows();

    $query  = $this->db->query("SELECT * FROM md_statistik");
    $totalpengunjung = $query->num_rows();

    $query  = $this->db->query("SELECT SUM(hits) as hits_sekarang FROM md_statistik WHERE tanggal='$tanggal'");
    $r      = $query->result_array();
    $hits   = $r['hits_sekarang'];

    $query  = $this->db->query("SELECT hits FROM md_statistik");
    $r      = $query->num_rows();
  

    $totalhits  = $r;


    $batas  = time() - 300;
    $query  = $this->db->query("SELECT * FROM md_statistik WHERE online > '$batas'");
    $online = $query->num_rows(); 



   $x['pengunjung']     = $pengunjung;
   $x['totalpengunjung']= $totalpengunjung;
   $x['hits']           = $hits;
   $x['totalhits']      = $totalhits;
   $x['online']         = $online;

    $x['video']       = $this->db->query('SELECT * from video order by id_video');
    $x['judul']       = $data[0]['nilai'];
    $x['agenda']      = $this->db->query("SELECT * from agenda order by id_agenda desc limit 4")->result_array();
    $x['testimonial'] = $this->db->query("SELECT * from testimonial where kategori='home' order by id_testimonial")->result();
    $x['baner']       = $this->db->query("SELECT * from testimonial where kategori='baner'")->result_array();
    $x['slider']      = $this->db->query("SELECT * from slider order by id_slider desc limit 6");
    $x['galeri']      = $this->db->query("SELECT * from galeri order by rand() asc limit 4")->result_array();
    $x['terupdate']   = $this->db->query("SELECT * from artikel order by rand() desc limit 4")->result_array();
    $x['query']       = $this->db->query("SELECT * from artikel order by rand() desc limit 6")->result_array();
    $this->load->view('header',$x);
    $this->load->view('home');
    $this->load->view('footer');
  }

  public function artikel_detail($id='')
  {
  //error_reporting(0); 
  if(empty($id)){ redirect(base_url()); }   
  $cek =$this->db->query("SELECT * from artikel where id_artikel='$id'")->num_rows();
  $det =$this->db->query("SELECT * from artikel where id_artikel='$id'")->row();
  $kat_aja=$this->db->query("SELECT * from kategori where id_kategori='$det->kategori'")->row();
  if ($cek > 0) {
  $data         = $this->M_admin->select_where('artikel','id_artikel',$id)->result_array(); 
  $x['data']  = $this->M_admin->select_where('artikel','id_artikel',$id)->result_array(); 
  $x['judul']   = strip_tags($data[0]['judul']);
  $x['isi']     = $data[0]['isi'];
  $x['gambar']  = $data[0]['gambar'];
  $x['id_admin']= $data[0]['id_user'];
  $x['id']      = $data[0]['id_artikel'];
  $x['tanggal'] = $data[0]['tanggal'];
    if (empty($det->kategori) OR $det->kategori != $kat_aja->id_kategori) {
      $x['kategori'] ="Belum Ada Kategori Untuk Informasi Ini"; 
    }else{
      $kategori=$this->db->query("SELECT * from kategori where id_kategori='$det->kategori'")->row();
        $x['kategori'] =$kategori->kategori;  
    }
   
  //cek admin 
  $coba    =$this->M_admin->select_where("artikel","id_artikel",$id)->row();
  $admin_ke=$this->M_admin->select_where('admin','id_admin',$coba->id_user)->num_rows(); 
   if (empty($coba->id_user)) {
     $x['admin'] ="Administrator";
  
   }elseif($admin_ke > 0 ){
     $data_adminya=$this->db->query("SELECT * from admin where id_admin='$coba->id_user'")->result_array();
     $x['admin'] =$data_adminya[0]['nama'];
   }else{     
     $x['admin'] ="Administrator";
   }

$x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
$x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();
$x['agenda']     =$this->db->query("SELECT * from agenda order by id_agenda")->result_array();

  $x['kategori_sidebar'] = $this->db->query("SELECT * from artikel order by rand() desc limit 10 ")->result_array();
  $x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array();
  $x['detail']  = $this->M_admin->select_where('artikel','id_artikel',$id)->result_array(); 
  $this->load->view('header',$x);
  $this->load->view('detail_berita');
  $this->load->view('footer');  
  }else{
     redirect(base_url());
  }
}


  public function halaman_detail($id='')
  {
     $cek=$this->db->query("SELECT * from halaman where id_halaman='$id'")->num_rows();
    if ($cek > 0) {
    $data         = $this->M_admin->select_where('halaman','id_halaman',$id)->result_array(); 
  
  $x['judul']   = strip_tags($data[0]['judul']);  
  $x['halaman'] = $this->M_admin->select_where('halaman','id_halaman',$id)->result_array(); 
  $x['judul_hal'] =strip_tags($data[0]['judul']);
  $x['isi_hal']   =$data[0]['isi'];
  $x['tanggal']   =$data[0]['tanggal'];
  
  $x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
  $x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();

  $this->load->view('header',$x);
  $this->load->view('halaman_detail');
  $this->load->view('footer');  
  }else{
    redirect(base_url());
  }
}



  public function kategori($id='')
  {
 error_reporting(0); 
$x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array();
$x['kategori_sidebar']=$this->db->query("SELECT * from artikel order by rand() desc limit 10")->result_array();
$x['terupdate'] =$this->db->query("SELECT * from artikel order by rand() desc limit 3")->result_array();
$x['agenda']= $this->db->query("SELECT * from agenda order by id_agenda")->result_array();  

   $cek=$this->M_admin->select_where('kategori','id_kategori',$id)->num_rows();  
   $cari_kat   =$this->M_admin->select_where('kategori','id_kategori',$id)->row();
   $sinkron =$this->db->query("SELECT * from artikel where kategori='$id'")->num_rows(); 
   
  if ($cek > 0) {
 
   $jum=$this->M_admin->select_where('artikel','kategori',$id);
   $page=$this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=2;
        $config['base_url'] = base_url() . 'kategori/'.$id.'/'.seo($cari_kat->kategori);
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment']= 4;
           

    $config['full_tag_open'] = '<div class="paging"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
     
    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';
     
    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';
     
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
     
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';
     
    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';
     
    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
   $coba=$this->M_admin->select_where("artikel","kategori",$id)->row();

   if (is_numeric($limit)) {
   $x['kategori']  = $this->M_admin->kategori($id,$offset,$limit)->result_array();
   }elseif(!is_numeric($limit)){
   $x['kategori']  = $this->M_admin->kategori($id,$offset,1)->result_array();
   }
  
   $cari_kat   =$this->M_admin->select_where('kategori','id_kategori',$id)->row();
   if (empty($coba->id_user)) {
    $x['admin'] ="Not found";
   }else{
     $data_adminya=$this->db->query("SELECT * from admin where id_admin='$coba->id_user'")->result_array();
     $x['admin'] =$data_adminya[0]['nama'];
   }
   $x['kategori_sidebar']=$this->db->query("SELECT * from kategori order by rand() desc limit 10")->result_array();
   $x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
   $x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();
   $x['judul'] = 'Kategori: '.$cari_kat->kategori; 
   $this->load->view('header',$x);
   $this->load->view('kategori');
   $this->load->view('footer'); 

 }elseif($sinkron > 0){
 redirect(base_url());
  }else{

  redirect(base_url());
 }
   
  }

 

 ///akhir

  public function pencarian($kata='')
  {
   
   if (empty($_POST['kata'])) {
   
  
   $x['admin']   = "Not found";
   $x['judul']    = 'Pencarian'; 
   $x['pencarian']= "";
   $x['kategori_sidebar']=$this->db->query("SELECT * from kategori order by rand() desc limit 10")->result_array();
   $x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
   $x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();

   $this->load->view('header',$x);
   $this->load->view('pencarian');
   $this->load->view('footer'); 

   }elseif(!ctype_alnum($_POST['kata'])){
     
   $x['admin']    = "Not found";
   $x['judul']    = 'Pencarian'; 
   $x['pencarian']= "";
   $x['kategori_sidebar']=$this->db->query("SELECT * from kategori order by rand() desc limit 10")->result_array();
   $x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
   $x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();
   $this->load->view('header',$x);
   $this->load->view('pencarian');
   $this->load->view('footer'); 

   }else{

   $kata=xss_clean($_POST['kata']);
   
   $coba=$this->db->query("SELECT * from artikel where isi like '%$kata%' or judul like '%$kata%'")->row();
   if (empty($coba->id_user)) {
    $x['admin'] ="Not found";
   }else{
     $data_adminya=$this->db->query("SELECT * from admin where id_admin='$coba->id_user'")->result_array();
     $x['admin'] =$data_adminya[0]['nama'];
   }
   $x['judul']    = 'Pencarian'; 
   $x['pencarian']=$this->db->query("SELECT * from artikel where isi like '%$_POST[kata]%' or judul like '%$_POST[kata]%'")->result_array();
   $x['kategori_sidebar']=$this->db->query("SELECT * from kategori order by rand() desc limit 10")->result_array();
   $x['populer'] =$this->db->query("SELECT * from artikel order by hits desc limit 4")->result_array();
   $x['recent']  =$this->db->query("SELECT * from artikel order by hits asc limit 4")->result_array();
   $x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array(); 

   $this->load->view('header',$x);
   $this->load->view('pencarian');
   $this->load->view('footer'); 
   
  }

}

  
  public function galeri()
  {
   $x['galeri'] = $this->db->get('galeri');
   $x['judul']  = "Galeri Foto";  
   $this->load->view('header',$x);
   $this->load->view('galeri');
   $this->load->view('footer');
  }

    public function video()
  {
   $x['video'] = $this->db->get('video');
   $x['judul']  = "Galeri Video";  
   $this->load->view('header',$x);
   $this->load->view('galeri_video');
   $this->load->view('footer');
  }


public function agenda()
{
$x['judul'] ="Daftar Semua Agenda";  

$x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array();
$x['kategori_sidebar']=$this->db->query("SELECT * from artikel order by rand() desc limit 10")->result_array();
$x['terupdate'] =$this->db->query("SELECT * from artikel order by rand() desc limit 3")->result_array();
$x['agenda']= $this->db->query("SELECT * from agenda order by id_agenda")->row_array();  


 $jum=$this->db->get('agenda');
   $page=$this->uri->segment(2);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=1;
        $config['base_url'] = base_url() . '/list_agenda';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment']= 3;
    $config['full_tag_open'] = '<a href="" class="page selected current">';
    $config['full_tag_close'] = '</a>';
    $config['first_link'] = '&laquo; First';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $this->pagination->initialize($config);
    $x['agenda']  = $this->M_admin->agenda($offset,$limit)->result_array();
    $x['page']    = $this->pagination->create_links();
    $this->load->view('header',$x);
    $this->load->view('agenda_list');
    $this->load->view('footer');
}

public function agenda_detail($id='')
{
 if ($id) {
    $cek=$this->db->get_where('agenda',array('id_agenda'=>$id)); 
    if($cek->num_rows() > 0){
       
       $x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array();
       $x['kategori_sidebar']=$this->db->query("SELECT * from artikel order by rand() desc limit 10")->result_array();
       $x['terupdate'] =$this->db->query("SELECT * from artikel order by rand() desc limit 3")->result_array();
       $x['agenda']= $this->db->query("SELECT * from agenda where id_agenda='$id'")->row_array(); 
       $x['judul'] = $x['agenda']['judul']; 
       $x['data']  = $this->db->get_where('agenda',array('id_agenda'=>$id));
       $this->load->view('header',$x);
       $this->load->view('agenda_detail');       
       $this->load->view('footer');       

    }else{
     redirect(base_url());
    }
  }else{
    redirect(base_url());
  } 

}


public function semua_berita()
{
   $x['judul']='Semua Berita';
   $jum=$this->M_admin->cek_admin();
   $page=$this->uri->segment(2);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=10;
        $config['base_url'] = base_url() . '/semua-berita';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment']= 3;

    $config['full_tag_open'] = '<div class="paging"><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div>';
     
    $config['first_link'] = '&laquo; First';
    $config['first_tag_open'] = '<li class="prev page">';
    $config['first_tag_close'] = '</li>';
     
    $config['last_link'] = 'Last &raquo;';
    $config['last_tag_open'] = '<li class="next page">';
    $config['last_tag_close'] = '</li>';
     
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = '<li class="next page">';
    $config['next_tag_close'] = '</li>';
     
    $config['prev_link'] = 'Prev';
    $config['prev_tag_open'] = '<li class="prev page">';
    $config['prev_tag_close'] = '</li>';
     
    $config['cur_tag_open'] = '<li class="active"><a href="">';
    $config['cur_tag_close'] = '</a></li>';
     
    $config['num_tag_open'] = '<li class="page">';
    $config['num_tag_close'] = '</li>';

    $this->pagination->initialize($config);
    $x['berita']  = $this->M_admin->berita_semua($offset,$limit)->result_array();
    $x['page']    = $this->pagination->create_links();
    $x['sql_kategori'] = $this->db->query("SELECT * from kategori order by id_kategori")->result_array();
    $this->load->view('header',$x);
    $this->load->view('semua_berita');
    $this->load->view('footer');
}



public function staff()
{
   $x['judul']='Data Dosen Dan Staaff';
    
   $jum=$this->db->get('agenda');
   $page=$this->uri->segment(2);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=1;
        $config['base_url'] = base_url() . '/staff';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment']= 3;
    $config['full_tag_open'] = '<a href="" class="page selected current">';
    $config['full_tag_close'] = '</a>';
    $config['first_link'] = '&laquo; First';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';
    $this->pagination->initialize($config);
    $x['agenda']  = $this->M_admin->dosen($offset,$limit)->result_array();
    $x['page']    = $this->pagination->create_links();
    
    $this->load->view('header',$x);
    $this->load->view('dosen');
    $this->load->view('footer');
}

public function download()
{
    $x['data']  = $this->db->get('download');
    $x['judul'] = 'Direktori Download'; 
    $this->load->view('header',$x);
    $this->load->view('download');
    $this->load->view('footer');
}


function down_act($id='')
{
if(empty($id))
{
redirect(base_url('download'));
}else{ 
$sql=$this->db->get_where('download',array('id_download'=>$id))->row_array();
$data = './asset/download/'.$sql['nama_file'];    
$nama = $sql['nama_file'];
force_download($data,$nama);
}
}

public function portal_akademik(){
$x['judul'] ="PORTAL AKADEMIK";
$this->load->view('portal',$x);
}

public function pmb(){
$x['judul'] ="Penerimaan Mahasiswa Baru";
$this->load->view('portal',$x);
}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */