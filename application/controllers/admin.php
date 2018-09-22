<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_controller
{
	
	function __construct()
	{
	 parent::__construct();
           
     if ($this->session->userdata('masuk') !=TRUE ){
     redirect(base_url('')); 
     $this->session->sess_destroy();
     exit();
     }; 
		$this->load->model('M_admin');
        //$this->load->helper('upload');
	}

    public function index()
    {
     $id=$this->session->userdata('id_user'); 
     $x['admin'] =$this->db->get_where('admin',array('id_admin'=>$id))->result_array();   
     $x['artikel']=$this->db->get('artikel')->num_rows();
     $x['agenda']=$this->db->get('agenda')->num_rows();
     $x['halaman']=$this->db->get('halaman')->num_rows();
     $x['download']=$this->db->get('download')->num_rows();
     
     $x['judul']  = ".::Welcome To Admin Panel::.";
     $x['konten'] = "";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/home');
     $this->load->view('admin/footer');
    }
//fungsi dari artikel
    public function artikel()
    {
     $x['judul']   = "Welcome To Admin Panel";
     $x['data']    = $this->M_admin->pilih('artikel'); 
     $this->load->view('admin/header',$x);
     $this->load->view('admin/artikel');
     $this->load->view('admin/footer'); 	
    }  

	public function artikel_tambah()
	{

        $x['judul']        = "Tambah Artikel";
        $x['kategori']     = $this->M_admin->pilih('kategori');
        $x['aksi']         = "tambah";
        $x['isi']          = "";
        $x['judul_artikel']= "";
        $x['gambar']       = "";     
     if (isset($_POST['tambah']))
     {


        $nmfile = "file_".time();  
                $config['upload_path'] = './asset/gambar/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';  
                $config['file_name'] = $nmfile; //nama yang terupload nantinya
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($_FILES['gambar']['name'])
                {
                if ($this->upload->do_upload('gambar'))
                {
                $gbr      = $this->upload->data();
                $gambar   =$gbr['file_name'];
                $judul    =$this->input->post('judul');
                $judul_seo= seo($this->input->post('judul'));
                $isi      =$this->input->post('isi');
                $kategori =$this->input->post('kategori');
                
                $tanggal  =date('Y-m-d');
                $id_user  =$this->session->userdata('id_user');

                $data=array(  
                'judul'     =>$judul,
                'judul_seo' => $judul_seo,
                'isi'       =>$isi,
                'gambar'    =>$gambar,  
                'id_user'   =>$id_user,
                'kategori'  =>$kategori,
                'tanggal'   =>$tanggal
                );

                $this->M_admin->insertdata('artikel',$data);
                $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Tambahkan</div>');
                redirect(base_url('admin/artikel'));

                }else{    

                 $x['judul']   = "Tambah Artikel";

                 $this->load->view('admin/header',$x);
                 $this->load->view('admin/artikel_form');
                 $this->load->view('admin/footer'); 
                }
            }else{

            }
  
     }else
     {

     $x['judul']   = "Tambah Artikel";

     $this->load->view('admin/header',$x);
     $this->load->view('admin/artikel_form');
     $this->load->view('admin/footer'); 
    }  

	 
	}


	public function artikel_edit($id)
	{
	  if(empty($id)){ redirect(base_url('admin/artikel')); }

            $query             = $this->M_admin->select_where('artikel','id_artikel',$id);
            $data              = $query->result_array();
            $x['judul']        = "Edit Artikel";
            $x['kategori']     = $this->M_admin->pilih('kategori');
            $x['aksi']         = "edit";
            $x['isi']          = $data[0]['isi'];
            $x['judul_artikel']= $data[0]['judul'];
            $x['gambar']       = $data[0]['gambar'];

                if (isset($_POST['tambah']))
                {

                if (empty($_FILES['gambar']['name'])) 
                {

                $judul    =$this->input->post('judul');
                $judul_seo= seo($this->input->post('judul'));
                $isi      =$this->input->post('isi');
                $kategori =$this->input->post('kategori');
                $tanggal  =date('Y-m-d');
                $id_user  =$this->session->userdata('id_user');

                $data=array(  
                'judul'     =>$judul,
                'judul_seo' => $judul_seo,
                'isi'       =>$isi,
                'id_user'   =>$id_user,
                'kategori'  =>$kategori,
               
                'tanggal'   =>$tanggal,
                );

                $this->M_admin->updatedata('artikel',$data,array('id_artikel'=>$id));
                    $this->session->set_flashdata('pesan','    
                <div class="alert alert-info alert-dismissable">
                                Data Berhasil Di Edit</div>');
                redirect(base_url('admin/artikel'));
            

                }else{


                $dat=$query->row();
                if($dat->gambar != ""){
                unlink('./asset/gambar/'.$dat->gambar);
                }else{


                } 
                $nmfile = "file_".time();  
                $config['upload_path']    = './asset/gambar/'; 
                $config['allowed_types']  = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name']      = $nmfile; 
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($_FILES['gambar']['name'])
                {
                if ($this->upload->do_upload('gambar'))
                {
                $gbr      = $this->upload->data();
                $gambar   =$gbr['file_name'];
                $judul    =$this->input->post('judul');
                $isi      =$this->input->post('isi');
                $kategori =$this->input->post('kategori');
                $tanggal  =date('Y-m-d');
                $id_user  =$this->session->userdata('id_user');

                $data=array(  
                'judul'     =>$judul,
                'judul_seo' =>seo($this->input->post('judul')),
                'isi'       =>$isi,
                'gambar'    =>$gambar,
                'id_user'   =>$id_user,
                'kategori'  =>$kategori,
               

                'tanggal'   =>$tanggal,
                );

                $this->M_admin->updatedata('artikel',$data,array('id_artikel'=>$id));
                       $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil  Edit</div>');
                redirect(base_url('admin/artikel'));
                         

                }else{

                buat_alert('Maaf Format Gambar Tidak Sesuai');
                
                exit();

                }
                }          
                }    

                }else
                {
                $x['judul']   = "Edit Artikel";
                $this->load->view('admin/header',$x);
                $this->load->view('admin/artikel_form');
                $this->load->view('admin/footer'); 
                }

                }


	public function artikel_hapus($id)
	{
        $query=$this->M_admin->select_where('artikel','id_artikel',$id);
        $row  = $query->row();
        if($row->gambar != ""){
        unlink('./asset/gambar/'.$row->gambar);
        }else{
        }
        $this->db->delete("artikel",array('id_artikel'=>$id));
        redirect(base_url('admin/artikel'));                 
        $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Hapus</div>');
	
	}
//end fungsi dari artikel


//fungsi dari halaman
    public function halaman()
    {    
        $x['judul']="Data Halaman";
        $x['halaman']=$this->M_admin->pilih('halaman');
        $this->load->view('admin/header',$x);
    	$this->load->view('admin/halaman');
        $this->load->view('admin/footer');
    }


    public function halaman_tambah()
    {
      $x['judul']        ="Tambah Halaman";
      $x['judul_halaman']='';
      $x['isi']          =''; 
      $x['aksi']         ='Tambah';

      if (isset($_POST['kirim'])) {
   $data=array(
    'judul'  => addslashes($this->input->post('judul')),   
    'isi'    => $this->input->post('isi'),
    'id_user' => $this->session->userdata('id_user'),
    'tanggal'=> date("Y-m-d"), 
       );
  $this->M_admin->insertdata('halaman',$data);
  redirect(base_url('admin/halaman'));
                  $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
      }else{
        $x['judul']="Data Halaman";
        $this->load->view('admin/header',$x);
        $this->load->view('admin/halaman_form');
        $this->load->view('admin/footer');
      }
    }
    
    public function halaman_edit($id)
    {


      if (empty($id)) {
       redirect('admin/halaman');     
       }  
      $data              =$this->M_admin->select_where('halaman','id_halaman',$id)->result_array(); 
      $x['judul']        ="Edit Halaman";
      $x['judul_halaman']=$data[0]['judul'];
      $x['isi']          =$data[0]['isi']; 
      $x['aksi']         ='edit';

      if (isset($_POST['kirim'])) {
    $data=array(
    'judul'  => addslashes($this->input->post('judul')),   
    'isi'    => $this->input->post('isi'),
    'id_user' => $this->session->userdata('id_user'),
    'tanggal'=> date("Y-m-d"), 
       );
  $this->M_admin->updatedata('halaman',$data,array('id_halaman'=>$id));
  redirect(base_url('admin/halaman'));
  $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
   }else{
        $x['judul']="Data Halaman";
        $this->load->view('admin/header',$x);
        $this->load->view('admin/halaman_form');
        $this->load->view('admin/footer');
      }
    }

    public function halaman_hapus($id)
    {
    $this->db->delete('halaman',array('id_halaman'=>$id));
    redirect(base_url('admin/halaman'));
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Hapus</div>');
    }
   
 //fungsi dari kategori   
    public function kategori()
    {
       $x['judul']    ="Data Kategori";
       $x['kategori'] =$this->M_admin->pilih('kategori');
        $this->load->view('admin/header',$x);
        $this->load->view('admin/kategori');
        $this->load->view('admin/footer');
    }  

    public function kategori_tambah()
    {
        if (isset($_POST['kirim'])) {
         $x['aksi']="Tambah";   
         $kategori=$this->input->post('kategori');
         $kategori_seo=seo($this->input->post('kategori'));
         $data=array(
         'kategori'     =>$kategori,
         'kategori_seo' =>$kategori_seo
         );   

         $this->M_admin->insertdata('kategori',$data);
         redirect(base_url('admin/kategori'));
         $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
        }else{
        $x['kategori_aj']="";    
        $x['judul']   ="Tambah Kategori";
        $this->load->view('admin/header',$x);
        $this->load->view('admin/kategori_form');
        $this->load->view('admin/footer');
    }
    }


    public function kategori_edit($id)
    {
       if (isset($_POST['kirim'])) {
         $x['aksi']="edit";
         $kategori=$this->input->post('kategori');
         $kategori_seo=seo($this->input->post('kategori'));
         $data=array(
         'kategori'     =>$kategori,
         'kategori_seo' =>$kategori_seo
         );   

         $this->M_admin->updatedata('kategori',$data,array('id_kategori'=>$id));
         redirect(base_url('admin/kategori'));
                           $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
       }else{
        $data=$this->M_admin->select_where('kategori','id_kategori',$id)->result_array();
        $x['kategori_aj']=$data[0]['kategori'];
        $x['judul']      ="Tambah Kategori";
        $this->load->view('admin/header',$x);
        $this->load->view('admin/kategori_form');
        $this->load->view('admin/footer');
       }
    }


    public function kategori_hapus($id)
    {
        $x['aksi'] ="hapus";
     $this->db->delete('kategori',array('id_kategori'=>$id));
     redirect(base_url('admin/kategori'));
      $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
    }


//video
    public function video()
    {
     $x['judul'] ="Data Video";
     $x['video'] =$this->db->get('video');   
     $this->load->view('admin/header',$x);
     $this->load->view('admin/video');
     $this->load->view('admin/footer');
    }
    

    public function video_tambah()
    {
     $x['judul']  ="Data Video";
     $x['url']    ="";   
     $x['nama']   ="";

     if (isset($_POST['kirim'])) {
        $nama =$this->input->post('nama');
        $url  =$this->input->post('url');

        $data=array('nama'=>$nama,'url'=>$url);
        $this->M_admin->insertdata('video',$data);
        redirect(base_url('admin/video'));
     }else{
     $this->load->view('admin/header',$x);
     $this->load->view('admin/video_form');
     $this->load->view('admin/footer');
     }
    }



    public function video_edit($id)
    {
     $vdo=$this->M_admin->select_where('video','id_video',$id)->result_array();   
     $x['judul']  = "Edit Video";
     $x['url']    = $vdo[0]['url'];   
     $x['nama']   = $vdo[0]['nama'];

     if (isset($_POST['kirim'])) {
        $nama =$this->input->post('nama');
        $url  =$this->input->post('url');
        
        $data=array('nama'=>$nama,'url'=>$url);
        $this->M_admin->insertdata('video',$data);
        redirect(base_url('admin/video'));
     }else{
     $this->load->view('admin/header',$x);
     $this->load->view('admin/video_form');
     $this->load->view('admin/footer');
     }
    }
    
    public function video_hapus($id)
    {
     $this->db->delete('video',array('id_video'=>$id));
     redirect(base_url('admin/video'));  
    }
    

    public function seting()
    {
      
     $x['judul']  = "Data setingan Website";   
     $x['seting']  = $this->M_admin->pilih('setting'); 
     $this->load->view('admin/header',$x);
     $this->load->view('admin/seting');
     $this->load->view('admin/footer');
    } 

    public function seting_edit($id)
    {

    $vdo=$this->M_admin->select_where('setting','id_setting',$id)->result_array();   
     $x['judul']  = "Edit seting";
     $x['nilai']    = $vdo[0]['nilai'];  
     $x['parameter']    = $vdo[0]['parameter'];   

     if (isset($_POST['kirim'])) {
        
        $nilai  =$this->input->post('nilai');
        
        $data=array('nilai'=>$nilai);
        $this->M_admin->insertdata('video',$data);
        redirect(base_url('admin/seting'));
     }else{
     $this->load->view('admin/header',$x);
     $this->load->view('admin/seting_form');
     $this->load->view('admin/footer');
     }
    }

    
    public function user($value='')
    {
     $x['judul']="Data User Login"; 
     $x['user'] =$this->M_admin->pilih('admin');   
     $this->load->view('admin/header',$x);
     $this->load->view('admin/user');
     $this->load->view('admin/footer');   
    }

    public function user_tambah()
    {
    if (isset($_POST['kirim'])) {
        
   
    $username=$this->input->post('username');
    $nama    =$this->input->post('nama');
    $password=$this->input->post('password');
    $level   =$this->input->post('level');
    $nama    =$this->input->post('nama');
    

    $data=array(
        'username'=>$username,
        'nama'    =>$nama,
        'password'=>md5($password),
        'level'   =>$level,
        'nama'    =>$nama);
   
    $this->M_admin->insertdata('admin',$data);
    redirect(base_url('admin/user'));

       }else{
     $x['nama']     ="";      
     $x['level']    ="";  
     $x['username'] ="";
     $x['judul']    ="Edit User";

     $this->load->view('admin/header',$x);
     $this->load->view('admin/user_form');
     $this->load->view('admin/footer'); 
       } 


    }


    public function user_edit($id)
    {
     
    if (isset($_POST['kirim'])) {

    $username=$this->input->post('username');
    $nama    =$this->input->post('nama');
    $password=$this->input->post('password');
    $level   =$this->input->post('level');
    $nama    =$this->input->post('nama');
    

    $data=array(
        'username'=>$username,
        'nama'    =>$nama,
        'password'=>md5($password),
        'level'   =>$level,
        'nama'    =>$nama);
   
    $this->M_admin->updatedata('admin',$data,array('id_admin'=>$id));
    redirect(base_url('admin/user'));  
    }else{
     $data=$this->db->query("SELECT * from admin where id_admin='$id'")->result_array(); 
     $x['nama']     =$data[0]['nama'];      
     $x['level']    =$data[0]['level'];   
     $x['username'] =$data[0]['username'];
     $x['judul']    ="Edit User";

     $this->load->view('admin/header',$x);
     $this->load->view('admin/user_form');
     $this->load->view('admin/footer');    
    }

    }


    public function user_hapus($id)
    {
     if ($id == $this->session->userdata('id_user')) {
             $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-danger">
                                Anda Tidak Bisa Menghapus Anda Sendiri</div>');
         redirect(base_url('admin/user'));
        }else{   
     $this->db->delete("admin",array('id_admin'=>$id));
     redirect(base_url('admin/user'));
    }
}
   
    public function menu($kategori='home')
    {
     $x['menu_web'] =$this->db->query("SELECT * FROM menu WHERE induk='0' and kategori_menu='$kategori' ORDER BY urut");
     $x['judul']    ="Data Menu Website";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/menu');
     $this->load->view('admin/footer');  
    }


    public function menu_tambah()
    {
      if (isset($_POST['kirim'])) {
    if($_POST['jenis_link']=="halaman") $datalink = $_POST['link_halaman'];
    elseif($_POST['jenis_link']=="kategori") $datalink = $_POST['link_kategori'];
    else $datalink = $_POST['link_url'];
 

    $judul         = $this->input->post('judul');  
    $kategori_menu = 'home';
    $jenis_link    = $this->input->post('jenis_link');
    $link          = $datalink;
    $induk         = $this->input->post('induk');
    $urut          = $this->input->post('urut'); 
 
   $data=array(
    'judul'        =>$judul,
    'kategori_menu'=>$kategori_menu,
    'jenis_link'   =>$jenis_link,
    'link'         =>$link,
    'induk'        =>$induk,
    'urut'         =>$urut,
      ); 

   $this->M_admin->insertdata('menu',$data);
   redirect(base_url('admin/menu'));

      }else{
     $x['ciyus']         =$this->db->query("SELECT * from menu where induk='0' and kategori_menu='home'");   
     $x['judul_menu_web']="";
     $x['halaman']       =$this->M_admin->pilih('halaman');
     $x['kategori']      =$this->M_admin->pilih('kategori');      
     $x['judul']         ="Data Menu Website";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/menu_form');
     $this->load->view('admin/footer'); 
      }
    }


    public function menu_edit($id)
    {
      if (isset($_POST['kirim'])) {

    if($_POST['jenis_link']=="halaman") $datalink = $_POST['link_halaman'];
    elseif($_POST['jenis_link']=="kategori") $datalink = $_POST['link_kategori'];
    else $datalink = $_POST['link_url'];
 

    $judul         = $this->input->post('judul');  
    $kategori_menu = 'home';
    $jenis_link    = $this->input->post('jenis_link');
    $link          = $datalink;
    $induk         = $this->input->post('induk');
    $urut          = $this->input->post('urut'); 
 
   $data=array(
    'id_menu'      =>$id,
    'judul'        =>$judul,
    'kategori_menu'=>$kategori_menu,
    'jenis_link'   =>$jenis_link,
    'link'         =>$link,
    'induk'        =>$induk,
    'urut'         =>$urut
      ); 

   $this->M_admin->updatedata('menu',$data,array('id_menu'=>$id));
   redirect(base_url('admin/menu'));


      }else{
     $data=$this->M_admin->select_where('menu','id_menu',$id)->result_array();   
     $x['judul_menu_web']=$data[0]['judul'];   
     $x['halaman']       =$this->M_admin->pilih('halaman');
     $x['ciyus']         =$this->db->query("SELECT * from menu where induk='0' and kategori_menu='home'");
     $x['kategori']      =$this->M_admin->pilih('kategori'); 
     $x['judul']         ="Data Menu Website";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/menu_form');
     $this->load->view('admin/footer');  
      }
    }

    public function menu_hapus($id='')
    {
       $this->db->delete("menu",array('id_menu'=>$id));
       redirect(base_url('admin/menu'));
    }

   
   public function editpass()
   {
    
  $x['judul'] ='Edit Password';

  $password1=$this->input->post('password');
  $password2=$this->input->post('password_u'); 

    if (isset($_POST['kirim'])) {
 //$id=$this->session->userdata('id_user');  
 $username=$this->session->userdata('username'); 
 $cek=$this->db->query("SELECT * from admin where username='$username'")->num_rows();

  if ($cek > 1) {
   //ditemukan 
     $x['id'] =$id=$this->session->userdata('id_user'); 
     $x['not'] ="Maaaf Username Telah Di pakai";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/user_edit');
     $this->load->view('admin/footer');  
  
  }elseif($password1 != $password2){

     $x['id'] =$id=$this->session->userdata('id_user'); 
     $x['not'] ="Maaaf Password Tidak Sama Silhkan Ulangi Kembali";
     $this->load->view('admin/header',$x);
     $this->load->view('admin/user_edit');
     $this->load->view('admin/footer'); 

  }else{
    $id=$this->session->userdata('id_user');  
    $username=$this->input->post('username');
    $password=$this->input->post('password'); 
    //$level   =$this->input->post('level'); 
    $nama    =$this->input->post('nama'); 


    $data=
    array('username' => $username,
          'password' => $password,
          'nama' => $nama 
           );

    $this->M_admin->updatedata('admin',$data,array('id_admin'=>$id));
    redirect(base_url('admin/editpass'));
    echo "BERHASIL";
    }


    }else{

     $x['not'] ="";
     $x['id'] =$this->session->userdata('id_user');
     $this->load->view('admin/header',$x);
     $this->load->view('admin/user_edit');
     $this->load->view('admin/footer');  
   

    }

  

   }


   public function testimonial()
   {
     $x['judul']         ="Testimonial";
     $x['testimonial']   =$this->M_admin->pilih("testimonial") ;
     $this->load->view('admin/header',$x);
     $this->load->view('admin/testimonial');
     $this->load->view('admin/footer');  
   
   }


   public function testimonial_tambah()
   {
    if (isset($_POST['kirim'])) {
    if($_POST['jenis']=="home") $datalink = $_POST['isi'];
    elseif($_POST['jenis']=="baner") $datalink = $_POST['isi_url'];
   

                $nama_file = "file_".time(); 
                $config['upload_path'] = './asset/gambar_tes/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['file_name'] = $nama_file; //nama yang terupload nantinya
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               
                if ($this->upload->do_upload('gambar'))
                {
                $gbr      = $this->upload->data();
                $isi      =$datalink;
                $jenis      =$this->input->post('jenis');
                $gambar   =$gbr['file_name'];
                $nama     =$this->input->post('nama');
                $tanggal  =date('Y-m-d');
                
                $data=array('isi'  =>$isi,
                            'gambar'  =>$gambar,
                            'nama' =>$nama,
                            'tanggal'=>$tanggal,
                            'kategori'=>$this->input->post('jenis')); 

                $this->M_admin->insertdata('testimonial',$data); 
                redirect(base_url('admin/testimonial'));
                }else{
                 echo $this->upload->display_errors();
                
                }

        
    }else{
     
     $x['judul']         ="Testimonial ";
     $x['nama']          ="";
     $x['isi']           ="";   
     $x['testimonial']   =$this->M_admin->pilih("testimonial") ;
     $this->load->view('admin/header',$x);
     $this->load->view('admin/test_form');
     $this->load->view('admin/footer');  
   
    }
   }


   public function testimonial_edit($id='')
   {
     
   if (isset($_POST['kirim'])) {
    if($_POST['jenis']=="home") $datalink = $_POST['isi'];
    elseif($_POST['jenis']=="baner") $datalink = $_POST['isi_url'];

   if (empty($_FILES['gambar']['name'])) {
            
            $isi      = $datalink;
            $jenis    =$this->input->post('jenis');
            $nama     =$this->input->post('nama');
            $tanggal  =date('Y-m-d');

            $data=array('isi'  =>$isi,
            'nama' =>$nama,
            'tanggal'=>$tanggal); 

            $this->M_admin->updatedata('testimonial',$data,array('id_testimonial'=>$id)); 
            redirect(base_url('admin/testimonial'));
   }else{
   
   $gbr= $this->db->query("SELECT * from testimonial where id_testimonial='$id'");
   $gambarnya=$gbr->row();
   if ($gambarnya->gambar != " ") {
     @unlink("asset/gambar_tes/".$gambarnya->gambar);
    }else{

    }   
                $nama_file = "file_".time(); 
                $config['upload_path'] = './asset/gambar_tes/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               // $config['max_size'] = '4048'; //maksimum besar file 2M
                //$config['max_width']  = '1288'; //lebar maksimum 1288 px
                //$config['max_height']  = '1000'; //tinggi maksimu 1000 px
                $config['file_name'] = $nama_file; //nama yang terupload nantinya
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               
                if ($this->upload->do_upload('gambar'))
                {
                $gbr      = $this->upload->data();
                $isi      = $datalink;
                $jenis    = $this->input->post('jenis');
                $gambar   = $gbr['file_name'];
                $nama     = $this->input->post('nama');
                $tanggal  = date('Y-m-d');
                
            $data=array('isi'  =>$isi,
                            'gambar'  =>$gambar,
                            'nama' =>$nama,
                            'tanggal'=>$tanggal,
                            'kategori'=>$this->input->post('jenis')); 

                $this->M_admin->updatedata('testimonial',$data,array('id_testimonial'=>$id)); 
                redirect(base_url('admin/testimonial'));

   }


   }



}else{


    $data= $this->db->query("SELECT * from testimonial where id_testimonial='$id'")->result_array();
    $x['judul']         ="Testimonial ";
    $x['nama']          =$data[0]['nama'];
    $x['isi']           =$data[0]['isi'];   
    
    $this->load->view('admin/header',$x);
    $this->load->view('admin/test_form');
    $this->load->view('admin/footer');  
}

}

public function testimonial_hapus($id='')
{
    $query=$this->M_admin->select_where('testimonial','id_testimonial',$id);
        $row  = $query->row();
        if($row->gambar != ""){
        unlink('./asset/gambar_tes/'.$row->gambar);
        }else{

        }
        $this->db->delete("testimonial",array('id_testimonial'=>$id));
        redirect(base_url('admin/testimonial')); 
}


public function menu_website_sub($value='home')
{
 
 $x['judul']     ="Data Menu Dropdown Website";
 $x['menu_web_sub']  =$this->db->query("SELECT * from menu where induk !=0 order by urut");
 $this->load->view('admin/header',$x);
 $this->load->view('admin/menu_sub',$x);
 $this->load->view('admin/footer');

}



public function menu_edit_sub($id)
{
 if (empty($id)) redirect(base_url('c_admin/menu_website'));
 if (isset($_POST['kirim'])) {
    if($_POST['jenis_link']=="halaman") $datalink = $_POST['link_halaman'];
    elseif($_POST['jenis_link']=="kategori") $datalink = $_POST['link_kategori'];
    else $datalink = $_POST['link_url'];

    $judul         = $this->input->post('judul');  
    $kategori_menu = 'home';
    $jenis_link    = $this->input->post('jenis_link');
    $link          = $datalink;
    
    $sub_induk     = $this->input->post('sub_induk');
    $urut          = $this->input->post('urut'); 
 
   $data=array(
    'id_menu'      =>$id,
    'judul'        =>$judul,
    'kategori_menu'=>$kategori_menu,
    'jenis_link'   =>$jenis_link,
    'link'         =>$link,
    'induk'        =>'s',
    'sub_induk'    =>$sub_induk,
    'urut'         =>$urut,
      ); 

   $this->M_admin->updatedata('menu',$data,array('id_menu'=>$id));
   redirect(base_url('c_admin/menu_website'));


 }else{
 $sql=$this->db->query("SELECT * from menu where id_menu ='$id'")->row();
 $x['sub_menu'] =$sql->judul;
 $x['judul']    ="Edit Menu Dropdown Website";
 $x['halaman']     = $this->M_admin->pilih('halaman');
 $x['kategori'] = $this->M_admin->pilih('kategori');


 $this->load->view('admin/header',$x);
 $this->load->view('admin/menu_sub_form',$x);
 $this->load->view('admin/footer');


 }
}


public function tambah_menu_sub()
{

 if (isset($_POST['kirim'])) {
   

   if($_POST['jenis_link']=="halaman") $datalink = $_POST['link_halaman'];
    elseif($_POST['jenis_link']=="kategori") $datalink = $_POST['link_kategori'];
    else $datalink = $_POST['link_url'];

    $judul         = $this->input->post('judul');  
    $kategori_menu = 'home';
    $jenis_link    = $this->input->post('jenis_link');
    $link          = $datalink;
    $sub_induk     = $this->input->post('sub_induk');
    $urut          = $this->input->post('urut'); 
 
   $data=array(
   
    'judul'        =>$judul,
    'kategori_menu'=>$kategori_menu,
    'jenis_link'   =>$jenis_link,
    'link'         =>$link,
    'induk'        =>'s',
    'sub_induk'    =>$sub_induk,
    'urut'         =>$urut,
      ); 

   $this->M_admin->insertdata('menu',$data);
   redirect(base_url('c_admin/menu_website_sub'));


 }else{

 $x['sub_menu'] ="";
 $x['judul']    = "Tambah Menu Dropdown Website";
 $x['halaman']     = $this->M_admin->pilih('halaman');
 $x['kategori'] = $this->M_admin->pilih('kategori');

 $this->load->view('admin/header',$x);
 $this->load->view('admin/menu_sub_form');
 $this->load->view('admin/footer');


 }
}


public function download()
{
 $x['data']  = $this->db->get('download');
 $x['judul'] ="File Download";
 $this->load->view('admin/header',$x);
 $this->load->view('admin/download');
 $this->load->view('admin/footer');

}


public function download_tambah()
{
  $x['judul'] ="Tambah Download";
  if (isset($_POST['kirim'])) {
                $config['upload_path'] = './asset/download/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.date();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {

                  $info = array('nama_file' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->insert('download',$info);
                   if($hasil){
                    redirect(base_url('admin/download'));
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{


                 }
}else{
$x['file']="";
$x['aksi']="";
$this->load->view('admin/header',$x);
$this->load->view('admin/download_form');
$this->load->view('admin/footer');


}  

}

public function download_edit($id='')
{
if(empty($id)) redirect(base_url('admin/download'));
$sql=$this->db->get_where('download',array('id_download'=>$id))->row_array();

if($sql['nama_file'] != ""){
  @unlink('asset/download/'.$sql['nama_file']);
}else{
}
    if (isset($_POST['kirim'])) {
                $config['upload_path'] = './asset/download/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.date();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array('nama_file' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->update('download',$info,array('id_download'));
                   if($hasil){
                    redirect(base_url('admin/download'));
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
        }
}else{
$x['file']="";
$x['aksi']="";
$this->load->view('admin/header',$x);
$this->load->view('admin/download_form');
$this->load->view('admin/footer');
}  

}


public function download_hapus($id='')
{
if(empty($id)) redirect(base_url('admin/download'));
$sql=$this->db->get_where('download',array('id_download'=>$id))->row_array();
if($sql['nama_file'] != ""){
  @unlink('asset/download/'.$sql['nama_file']);
}else{
}
$hapus=$this->db->delete('download',array('id_download' =>$id));
if ($hapus) {
     redirect(base_url('admin/download'));
}else{
    buat_alert('ERROR HAPUS FILE SILAHAKN HUBUNGI TIM IT UNES');
}

}


//bagian galeri foto


public function galeri()
{
 $x['judul']="Galeri Foto";    
 $x['data']=$this->db->get('galeri');   
 $this->load->view('admin/header',$x);
 $this->load->view('admin/galeri');
 $this->load->view('admin/footer');
}


public function galeri_tambah()
{
$x['judul']="Tambah";
$x['file'] ="";
$x['aksi']="tambah";
  if (isset($_POST['kirim'])) {
                $config['upload_path'] = './asset/galeri/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array('judul'=>$this->input->post('judul'),
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->insert('galeri',$info);
                   if($hasil){
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
                    redirect(base_url('admin/galeri'));
 
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                echo $this->upload->display_errors();

                 }
}else{

$this->load->view('admin/header',$x);
$this->load->view('admin/galeri_form');
$this->load->view('admin/footer');


}  

}

public function galeri_edit($id='')
{
if(empty($id)) redirect(base_url('admin/download'));
$sql=$this->db->get_where('galeri',array('id_galeri'=>$id))->row_array();
$x['judul']="Galeri Edit";
$x['file'] = $sql['gambar'];
$x['aksi'] ="edit";

    if (isset($_POST['kirim'])){
                if($sql['gambar'] != ""){
                  @unlink('asset/galeri/'.$sql['gambar']);
                }else{
                }
                $config['upload_path'] = './asset/galeri/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array('judul'=>$this->input->post('judul'),
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->update('galeri',$info,array('id_galeri'=>$id));
                if($hasil){
                 redirect(base_url('admin/galeri'));
                 $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil '.ucfirst($aksi).'</div>');
                }else{
                buat_alert('Gagal Upload File Salah Extensi');  
                }      
                }else{
                 echo $this->upload->display_errors();
                }
}else{

$this->load->view('admin/header',$x);
$this->load->view('admin/galeri_form');
$this->load->view('admin/footer');
}  

}


public function galeri_hapus($id='')
{
$x['aksi']="";    
if(empty($id)) redirect(base_url('admin/galeri'));
$sql=$this->db->get_where('galeri',array('id_galeri'=>$id))->row_array();
if($sql['gambar'] != ""){
  @unlink('asset/galeri/'.$sql['gambar']);
}else{
}
$hapus=$this->db->delete('galeri',array('id_galeri' =>$id));
if ($hapus) {
        $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Di HAPUS</div>');
     redirect(base_url('admin/galeri'));
      
}else{
    buat_alert('ERROR HAPUS FILE SILAHAKN HUBUNGI TIM IT UNES');
}

}

//data dosen Dan Staff
public function dosen()
{
 $x['data']=$this->db->get('dosen');   
 $x['judul']="Data Dosen";   
 $this->load->view('admin/header',$x);
 $this->load->view('admin/dosen');
 $this->load->view('admin/footer');

}


public function dosen_tambah()
{
                        
$x['aksi']="tambah";
$x['judul']="Tambah Data Dosen";
$x['nama']="";
$x['nip']="";
$x['foto']="";
$x['jabatan']="";
$x['email']="";
$x['fb']="";
  if (isset($_POST['kirim'])) {
                $config['upload_path'] = './asset/dosen/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'dosen'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                 $info = array(
                    'nama' =>$this->input->post('nama'),
                    'nip' =>$this->input->post('nip'),
                    'foto' =>$this->upload->file_name,
                    'nama' =>$this->input->post('nama'),
                    'jabatan' =>$this->input->post('jabatan'),
                    'email' =>$this->input->post('fb')
                    );
                  $hasil=$this->db->insert('dosen',$info);
                   if($hasil){
                    redirect(base_url('admin/dosen'));
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                 }
}else{
 
$this->load->view('admin/header',$x);
$this->load->view('admin/dosen_form');
$this->load->view('admin/footer');
}  

}

public function dosen_edit($id='')
{
if(empty($id)) redirect(base_url('admin/download'));
$sql=$this->db->get_where('dosen',array('id_dosen'=>$id))->row_array();
$x['aksi']="edit";
$x['judul']="Edit Data Dosen";
$x['nama']=$sql['nama'];
$x['nip']=$sql['nip'];
$x['foto']=$sql['foto'];
$x['jabatan']=$sql['jabatan'];
$x['email']=$sql['email'];
$x['fb']=$sql['fb'];

if (isset($_POST['kirim'])) {

if($sql['foto'] != ""){
  @unlink('asset/dosen/'.$sql['foto']);
}else{
}
     
$config['upload_path'] = './asset/dosen/';  
$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
$config['file_name'] = 'dosen'.time();  
$this->load->library('upload',$config);
$this->upload->initialize($config);
if ($this->upload->do_upload('gambar'))
{
    $info = array(
    'nama' =>$this->input->post('nama'),
    'nip' =>$this->input->post('nip'),
    'foto' =>$this->upload->file_name,
    'nama' =>$this->input->post('nama'),
    'jabatan' =>$this->input->post('jabatan'),
    'email' =>$this->input->post('fb')
    );
$hasil=$this->db->update('dosen',$info,array('id_dosen'=>$id));
if($hasil){
redirect(base_url('admin/dosen'));
}else{
buat_alert('Gagal Upload File Salah Extensi');  
}      
}else{
}            
}else{ 
$x['aksi']="edit";
$this->load->view('admin/header',$x);
$this->load->view('admin/dosen_form');
$this->load->view('admin/footer');
}  
}


public function  dosen_hapus($id='')
{
if(empty($id)) redirect(base_url('admin/dosen'));
$sql=$this->db->get_where('dosen',array('id_dosen'=>$id))->row_array();
if($sql['foto'] != ""){
  @unlink('asset/dosen/'.$sql['foto']);
}else{
}
$hapus=$this->db->delete('dosen',array('id_dosen' =>$id));
if ($hapus) {
     redirect(base_url('admin/dosen'));
}else{
    buat_alert('ERROR HAPUS FILE SILAHAKN HUBUNGI TIM IT UNES');
}
}


public function agenda()
{
 $x['judul']="Data Agenda Universitas Ekasakti ";   
 $x['data'] =$this->db->get('agenda');
 $this->load->view('admin/header',$x);
 $this->load->view('admin/agenda');
 $this->load->view('admin/footer');
}

public function agenda_tambah()
{
$x['judul_a']="";
$x['isi']  ="";  
if (isset($_POST['kirim'])) {
    $data = array('judul'  =>$this->input->post('judul'), 
                  'isi'    =>$this->input->post('isi'),
                  'tanggal'=>date('Y-m-d'));
    $sql=$this->db->insert('agenda',$data);
    if ($sql) {
            $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
          redirect(base_url('admin/agenda'));
     }else{
          buat_alert('Terjadi Error Sql Sialhkan Hubungi Tim IT');
     } 
}else{
 $x['judul']="Data Agenda Universitas Ekasakti ";   
 $x['data'] =$this->db->get('agenda')->result_array();
 $this->load->view('admin/header',$x);
 $this->load->view('admin/agenda_form');
 $this->load->view('admin/footer');
}
}


public function agenda_edit($id)
{
if(empty($id)) redirect(base_url('admin/agenda'));    
$q=$this->db->get_where('agenda',array('id_agenda'=>$id))->row_array();
$x['judul_a']=$q['judul'];
$x['isi']    =$q['isi'];
if (isset($_POST['kirim'])) {
    $data = array('judul'  =>$this->input->post('judul'), 
                  'isi'    =>$this->input->post('isi'),
                  'tanggal'=>date('Y-m-d'));
//Agenda Edit  
    $sql=$this->db->update('agenda',$data,array('id_agenda'=>$id));
    if ($sql) {
            $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil  Edit</div>');
          redirect(base_url('admin/agenda'));
     }else{
          buat_alert('Terjadi Error Sql Sialhkan Hubungi Tim IT');
     } 
}else{
 $x['judul']="Data Agenda Universitas Ekasakti ";   
 $x['data'] =$this->db->get('agenda')->result_array();
 $this->load->view('admin/header',$x);
 $this->load->view('admin/agenda_form');
 $this->load->view('admin/footer');
}
}

public function agenda_hapus($id)
{
 if(empty($id)) redirect(base_url('admin/agenda'));
 $data=$this->db->delete('agenda',array('id_agenda'=>$id));
 if($data){
   redirect(base_url('admin/agenda/'));
 }else{
   buat_alert('Tidak Dapat Menghapus Data');
 }
}


//bagian slider show

public function slider()
{
 $x['judul']="Slider Foto";    
 $x['slider']=$this->db->get('slider');   
 $this->load->view('admin/header',$x);
 $this->load->view('admin/slider');
 $this->load->view('admin/footer');
}


public function slider_tambah()
{
$x['judul']="slider Edit";
$x['gambar'] = "";
$x['judul_s'] ="";
$x['isi'] ="";
$x['url'] ="";
$x['aksi'] ="tambah"; 
  if (isset($_POST['kirim'])) {
  if ($this->input->post('keterangan_y') == "T") {
                $config['upload_path'] = './asset/slider/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array(
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->insert('slider',$info);
                   if($hasil){
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
                    redirect(base_url('admin/slider'));
 
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                echo $this->upload->display_errors();

                 }
}elseif ($this->input->post('keterangan_y') == "Y") {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');

         if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-danger">
<h2> Slide Foto Gagal Di Tambahkan</h2>
                                Pastikan Jika Anda Menambahkan Atribut Slider Judl, Isi, Url Tidak Boleh Kosong</div>');
                    redirect(base_url('admin/slider'));
         }elseif ($this->form_validation->run() == TRUE){
                $config['upload_path'] = './asset/slider/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array(
                                'judul'=>$this->input->post('judul'),
                                'isi'  =>$this->input->post('isi'),
                                'url'  =>$this->input->post('url'), 
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->insert('slider',$info);
                   if($hasil){
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
                    redirect(base_url('admin/slider'));
 
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                echo $this->upload->display_errors();

                 }

}
}

}else{
$this->load->view('admin/header',$x);
$this->load->view('admin/slider_form');
$this->load->view('admin/footer');
}  
}

public function slider_edit($id='')
{
if(empty($id)) redirect(base_url('admin/slider'));
$sql=$this->db->get_where('slider',array('id_slider'=>$id))->row_array();
$x['judul'] ="slider Edit";
$x['gambar'] = $sql['gambar'];
$x['judul_s'] =$sql['judul'];
$x['isi'] =$sql['isi'];
$x['url'] =$sql['url'];
$x['aksi'] ="edit"; 

    if (isset($_POST['kirim'])){
                if($sql['gambar'] != ""){
                  @unlink('asset/slider/'.$sql['gambar']);
                }else{
                }

if ($this->input->post('keterangan_y') == "T") {
                $config['upload_path'] = './asset/slider/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array(
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                    $hasil=$this->db->update('slider',$info,array('id_slider'=>$id));
                   if($hasil){
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
                    redirect(base_url('admin/slider'));
 
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                echo $this->upload->display_errors();

                 }
}elseif ($this->input->post('keterangan_y') == "Y") {
  
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');

         if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-danger">
<h2> Slide Foto Gagal Di Tambahkan</h2>
                                Pastikan Jika Anda Menambahkan Atribut Slider Judl, Isi, Url Tidak Boleh Kosong</div>');
                    redirect(base_url('admin/slider'));
         }elseif ($this->form_validation->run() == TRUE){
                $config['upload_path'] = './asset/slider/';  
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
                $config['file_name'] = 'down_'.time();  
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar'))
                 {
                  $info = array(
                                'judul'=>$this->input->post('judul'),
                                'isi'  =>$this->input->post('isi'),
                                'url'  =>$this->input->post('url'), 
                                'gambar' =>$this->upload->file_name,
                                'tanggal_upload'=>date("Y-m-d"));
                  $hasil=$this->db->update('slider',$info,array('id_slider'=>$id));
                   if($hasil){
    $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Ditambahkan</div>');
                    redirect(base_url('admin/slider'));
 
                   }else{
                    buat_alert('Gagal Upload File Salah Extensi');  
                   }      
                 }else{
                echo $this->upload->display_errors();

                 }

}
}

}else{

$this->load->view('admin/header',$x);
$this->load->view('admin/slider_form');
$this->load->view('admin/footer');
}  

}


public function slider_hapus($id='')
{
$x['aksi']="";    
if(empty($id)) redirect(base_url('admin/slider'));
$sql=$this->db->get_where('slider',array('id_slider'=>$id))->row_array();
if($sql['gambar'] != ""){
  @unlink('asset/slider/'.$sql['gambar']);
}else{
}
$hapus=$this->db->delete('slider',array('id_slider' =>$id));
if ($hapus) {
        $this->session->set_flashdata('pesan','    
<div class="alert alert-success alert-dismissable">
                                Data Berhasil Di HAPUS</div>');
     redirect(base_url('admin/slider'));
      
}else{
    buat_alert('ERROR HAPUS FILE SILAHAKN HUBUNGI TIM IT UNES');
}

}

}