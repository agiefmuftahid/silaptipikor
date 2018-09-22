<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller']       = "welcome";
$route['404_override']             = '';
$route['berita/(:any)/(:any)']     = 'welcome/artikel_detail/$1';
$route['halaman/(:any)/(:any)']    = 'welcome/halaman_detail/$1';
$route['kategori']                 = 'welcome/kategori';
$route['kategori/(:any)/(:any)']   = 'welcome/kategori/$1';
$route['pencarian']  			   = 'welcome/pencarian';
$route['login']  			       = 'welcome/login';
$route['data']  			       = 'welcome/data';
$route['pilih-perkategori']        = 'welcome/pilih_kat';
$route['galeri']                   = 'welcome/galeri';
$route['video']                    = 'welcome/video';
$route['agenda/(:any)']            = 'welcome/agenda_detail/$1';
$route['list_agenda']              = 'welcome/agenda';
$route['list_agenda/(:any)']       = 'welcome/agenda';
$route['download']                 = 'welcome/download';
$route['portal']                   = 'welcome/portal_akademik';
$route['pmb']                      = 'welcome/pmb';
$route['semua-berita']             = 'welcome/semua_berita';
$route['semua-berita/(:any)']      = 'welcome/semua_berita/$1';
/* End of file routes.php */
/* Location: ./application/config/routes.php */