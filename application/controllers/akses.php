<?php 

/**
* 
*/
class Akses extends CI_controller 
{
	
	function __construct()
	{
	 parent:: __construct();
	 $this->load->model('M_admin');

	}


	public function index()
	{
	$x['judul'] = "LOGIN ADMINISTRATOR";   

    if (isset($_POST['login'])) {
    
    $username=$this->input->post('username');
    $password=$this->input->post('password');
    if (!ctype_alnum($username) OR ! ctype_alnum($password)) {
     
    $x['notifikasi'] = "Karakter Dan Username Dan Password Tidak Di Izinkan"; 
    $this->load->view('admin/login_form',$x);     
    }else{


    
    $data=$this->M_admin->login($username,md5($password));
    $cek =$data->num_rows();
    $data =$data->row();
    if ($cek > 0) {
    
    $this->session->set_userdata('masuk',true);
    $this->session->set_userdata('id_user',$data->id_admin);
    $this->session->set_userdata('username',$data->username);
    $this->session->set_userdata('level',$data->level);
    
    session_start();
     $_SESSION['KCFINDER']              =array();
	 $_SESSION['KCFINDER']['disabled']  = false;
	 $_SESSION['KCFINDER']['uploadURL'] = "http://unespadang.ac.id/asset/file/";
    
    redirect(base_url('admin'));
    
    }else{
 
    $x['notifikasi'] = "Username Dan Passwor Tidak Ditemukan "; 
    $this->load->view('admin/login_form',$x);
    }

 }

   }else{
    $x['notifikasi'] = ""; 
    $this->load->view('admin/login_form',$x);



    } 

  }


public function logout()
{



 $this->session->sess_destroy();
 session_start();
 session_destroy();
 
 unset( $_SESSION['KCFINDER']);
 unset( $_SESSION['KCFINDER']['uploadURL']);
 

 redirect(base_url('akses'));
}

}

