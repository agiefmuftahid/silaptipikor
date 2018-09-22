<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>KEJAKSAAN TINGGI PROVINSI BENGKULU</title>
    <meta name="author" content="unespadang.ac.id">
<meta name="keywords" content="<?php 
$hasil=$this->M_admin->select_where("setting","parameter","Deskripsi")->row();
echo $hasil->nilai;
?>" />
<meta name="description" content="<?php 
$hasil=$this->M_admin->select_where("setting","parameter","Deskripsi website")->row();
echo $hasil->nilai
?>">
<link href="<?= base_url('asset/gambar/icon/kajati.png') ?>" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/bootstrap.css" >
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/style.css">
    
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/animate.css">
    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/responsive.css">
 
    <link href="<?= base_url('/asset/admin') ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/home') ?>/stylesheets/slider.css">
     <!-- Bootstrap bootstrap-touch-slider Slider Main Style Sheet -->
    <link href="<?= base_url('/asset/home') ?>/stylesheets/bootstrap-touch-slider.css" rel="stylesheet" media="all">
    <!-- Favicon and touch icons  -->
    <link href="<?= base_url('/asset/home') ?>/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?= base_url('/asset/home') ?>/icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="#" rel="shortcut icon">
    <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('/asset/home') ?>/javascript/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://siwas.mahkamahagung.go.id/resources/css/wb/animate.css">
<!---tambahan--->
<style type="text/css">
        #loading{
            width: 130px;
            height: 130px;
            border: solid 5px #ccc;
            border-top-color: red;
            border-bottom-color: blue;
            border-radius: 100%;

            position:fixed;
            left: 0;
            top: 0;
            right:0;
            bottom: 0;
            margin: auto;

            animation: putar 2s linear infinite;




        }
        #gambar{
            position:fixed;
            left: 0;
            top: 0;
            right:0;
            bottom: 0;
            margin: auto;
            width: 8%;
        }
         @keyframes putar{
            from{transform: rotate(0deg)}
            to{transform: rotate(720deg)}
         }
          .image {
              width: 500px;
              margin: auto;
          }
          .image img {
              transition: all .2s ease-in-out;
          }
          .image img:hover { 
            transform: scale(1.9); 
          }
    </style>
    <style type="text/css">
  .button-container {
  text-align: center;
}
.button {
  position: absolute;

  border: 0px solid currentColor;
  font-size: 8px;
  color: #D81900;
  margin: 1px;

  cursor: pointer;
  -webkit-transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  transition: background-color 0.28s ease, color 0.28s ease, box-shadow 0.28s ease;
  overflow: hidden;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.button span {
  color: #fff;
  position: relative;
  z-index: 1;
}
.button::before {
  content: '';
  position: absolute;
  background: #071017;
  border: 50vh solid #38ada9;
  width: 30px;
  height: 40px;
  border-radius: 50%;
  display: block;
  top: 0%;
  left: 0%;
  z-index: 0;
  opacity: 1;
  -webkit-transform: translate(-50%, -50%) scale(0);
          transform: translate(-50%, -50%) scale(0);
}
.button:hover {
  color: #38ada9;
  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
}
.button:active::before, .button:focus::before {
  -webkit-transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s;
  transition: transform 1.12s ease, opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
  -webkit-transform: translate(-50%, -50%) scale(1);
          transform: translate(-50%, -50%) scale(1);
  opacity: 0;
}
.button:focus {
  outline: none;
}
<!--tambahan --->
    <!--[if lt IE 9]>
        <script src="<?= base_url('/asset/home') ?>javascript/html5shiv.js"></script>
        <script src="<?= base_url('/asset/home') ?>javascript/respond.min.js"></script>
    <![endif]-->    
<style>
@media screen and(max-width: 2000PX){html{overflow-y: hidden;}}
blockquote img {
    margin-bottom: 10px;
}

blockquote p:before {
    content: "\f10d";
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
    color:currentColor;
}

 .firstcharacter {
  float: left;
  font-family: Georgia;
  font-size: 75px;
  line-height: 60px;
  padding-top: 4px;
  padding-right: 8px;
  padding-left: 3px;
}   
.he
{
background-color: #238e59;   
}

.profile_menu
{
display:none;   
}
@media (max-width: 991px) { 
.profile_menu
{
display:block;  
}
}


@media  (max-width: 768px) {
    .profile_menu
{
display:block;  
}
}

@media  (max-width: 480px) {
    .profile_menu
{
display:block;  
}
}


 </style>
</head>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b>Selamat Datang Di Universitas Ekasakti </b></h4>
                
            </div>
            <div class="modal-body">
            
             <h1>TERAKREDITASI BAN-PT</h1>
              
            </div>
             
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<body class="header-sticky">

    <div class="boxed">
        <div class="menu-hover">
            <div class="btn-menu">
                <span></span>
            </div><!-- //mobile menu button -->
        </div>

        <div class="header-inner-pages">
            <div class="top" style="background-color: #3ead60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-right topnav-sidebar">
                                <ul class="textwidget">
                                    <li>
                                        <a href="<?php echo base_url();?>welcome/register"  ><i class="fa fa-lock" ></i>&nbsp;Register</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>welcome/login" target="_blank" ><i class="fa fa-lock" ></i>&nbsp;Login</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- Top -->    
        </div><!-- header-inner-pages -->

        <!-- Header -->
        <header id="header" class="header" style="background-color: #238e59"> 
            <div class="header-wrap"> 
                <div class="container"> 
                    <div class="header-wrap clearfix"> 
                        <div id="logo" class="logo"> 
                        <a href="<?= base_url() ?>" rel="home"> 
                        <img src="<?= base_url() ?>/asset/gambar/header/logosistem.png" alt="image" height="80px" width="560px"> 

                        </a> 
                        </div><!-- /.logo --> 
                    
                    
                        <div class="nav-wrap"> 
                            <nav id="mainnav" class="mainnav"> 
                                <ul class="menu"> 
                                    <li>
                                        <a href="<?php echo base_url()?>"><i class="fa fa-home"></i>&nbsp;Beranda<span class="menu-description">Beranda</span></a>
                                        <ul class="submenu submenu-right">
                                            <li>
                                                <a href="#">Sub Judul</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url()?>welcome/cara_melapor"><i class="fa fa-book"></i>&nbsp;Cara Melapor<span class="menu-description">Cara Melapor</span></a>
                                        <ul class="submenu submenu-right">
                                            <li>
                                                <a href="#">Sub Judul</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-question-circle"></i>&nbsp;FAQ<span class="menu-description">FAQ</span></a>
                                        <ul class="submenu submenu-right">
                                            <li>
                                                <a href="#">Sub Judul</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url()?>welcome/kontak"><i class="fa fa-envelope"></i>&nbsp;Kontak<span class="menu-description">Kontak</span></a>
                                        <ul class="submenu submenu-right">
                                            <li>
                                                <a href="#">Sub Judul</a>
                                            </li>
                                        </ul>
                                    </li>                                     
                                </ul><!-- /.menu --> 
                            </nav><!-- /.mainnav --> 
                        </div><!-- /.nav-wrap --> 
                    </div><!-- /.header-wrap --> 
                </div><!-- /.container--> 
            </div><!-- /.header-wrap--> 
        </header><!-- /.header -->
<div id="kesatuan">
            <div id="loading"></div>
            <img id="gambar" width="100%" src="kejati.png">
     </div>
     
     <script type="text/javascript">
        var loading=document.getElementById('kesatuan');

        window.addEventListener('load',function(){
            kesatuan.style.display="none";

        })
     </script>
        