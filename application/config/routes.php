<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['error/(:any)'] = 'My_error/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'post/login';
$route['getmurid'] = 'get/murid';
$route['getnilai'] = 'get/nilai';
$route['absen'] = 'get/absen';
$route['getNilaiByNis'] = 'get/nilai_by_nis';
$route['getAbsenByNis'] = 'get/absen_by_nis';
$route['getOpsi'] = 'get/opsi';

$route['addguru'] = "post/addGuru";
$route['get/guru/byNip'] = "get/guruByNip";
$route['get/guru/all'] = "get/guruAll";
$route['patch/guru/byNip/(:any)'] = "patch/guruByNip/$1";
$route['delete/guru/byNip/(:any)'] = "delete/guruByNip/$1";


$route['addpelajaran'] = "post/addpelajaran";
$route['patch/pelajaran/byId/(:any)'] = "patch/pelajaranById/$1";
$route['delete/pelajaran/byId/(:any)'] = "delete/pelajaranById/$1";
$route['get/pelajaran/byId'] = "get/pelajaranById";
$route['get/pelajaran/all'] = "get/pelajaranAll";


$route['addmurid'] = "post/addmurid";
$route['patch/murid/byId/(:any)'] = "patch/muridById/$1";
$route['delete/murid/byId/(:any)'] = "delete/muridById/$1";
$route['get/murid/byId'] = "get/muridById";
$route['get/murid/all'] = "get/muridAll";
$route['get/murid/byClass'] = "get/muridByClass";


$route['addjenisnilai'] = "post/addjenisnilai";
$route['patch/jenisnilai/byId/(:any)'] = "patch/jenisnilaiById/$1";
$route['delete/jenisnilai/byId/(:any)'] = "delete/jenisnilaiById/$1";
$route['get/jenisnilai/byId'] = "get/jenisnilaiById";
$route['get/jenisnilai/all'] = "get/jenisnilaiAll";


$route['adduser'] = "post/adduser";
$route['patch/user/byId/(:any)'] = "patch/userById/$1";
$route['delete/user/byId/(:any)'] = "delete/userById/$1";
$route['get/user/byId'] = "get/userById";
$route['get/user/all'] = "get/userAll";


$route['addopsi'] = "post/addopsi";
$route['patch/opsi/byId/(:any)'] = "patch/opsiById/$1";
$route['delete/opsi/byId/(:any)'] = "delete/opsiById/$1";
$route['get/opsi/byId'] = "get/opsiById";
$route['get/opsi/all'] = "get/opsiAll";

$route['addrole'] = "post/addrole";
$route['patch/role/byId/(:any)'] = "patch/roleById/$1";
$route['delete/role/byId/(:any)'] = "delete/roleById/$1";
$route['get/role/byId'] = "get/roleById";
$route['get/role/all'] = "get/roleAll";

$route['addtingkat'] = "post/addtingkat";
$route['patch/tingkat/byId/(:any)'] = "patch/tingkatById/$1";
$route['delete/tingkat/byId/(:any)'] = "delete/tingkatById/$1";
$route['get/tingkat/byId'] = "get/tingkatById";
$route['get/tingkat/all'] = "get/tingkatAll";

$route['addkelas'] = "post/addkelas";
$route['patch/kelas/byId/(:any)'] = "patch/kelasById/$1";
$route['delete/kelas/byId/(:any)'] = "delete/kelasById/$1";
$route['get/kelas/byId'] = "get/kelasById";
$route['get/kelas/all'] = "get/kelasAll";

//transaksi
$route['addnilai'] = "post/addnilai";
$route['patch/nilai/byId/(:any)'] = "patch/nilaiById/$1";
$route['delete/nilai/byId/(:any)'] = "delete/nilaiById/$1";
$route['get/nilai/byId'] = "get/nilaiById";
$route['get/nilai/all'] = "get/nilaiAll";

$route['addabsen'] = "post/addabsen";
$route['patch/absen/byId/(:any)'] = "patch/absenById/$1";
$route['delete/absen/byId/(:any)'] = "delete/absenById/$1";
$route['get/absen/byId'] = "get/absenById";
$route['get/absen/all'] = "get/absenAll";

$route['addmenu'] = "post/addmenu";
$route['patch/menu/byId/(:any)'] = "patch/menuById/$1";
$route['delete/menu/byId/(:any)'] = "delete/menuById/$1";
$route['get/menu/byId'] = "get/menuById";
$route['get/menu/all'] = "get/menuAll";

$route['addakses'] = "post/addakses";
$route['patch/akses/byId/(:any)'] = "patch/aksesById/$1";
$route['delete/akses/byId/(:any)'] = "delete/aksesById/$1";
$route['get/akses/byId'] = "get/aksesById";
$route['get/akses/all'] = "get/aksesAll";

//mappingMuridByUser
$route['addMapingMuridByUser'] = "post/addMapingMuridByUser";
$route['patch/MapingMuridByUser/byId/(:any)'] = "patch/MapingMuridByUser/$1";
$route['delete/MapingMuridByUser/byId/(:any)'] = "delete/MapingMuridByUser/$1";
$route['get/MapingMuridByUser/byId'] = "get/MapingMuridByUser";
$route['get/MapingMuridByUser/all'] = "get/MapingMuridByUserAll";


//mappingGuru
$route['addMapingGuru'] = "post/addMapingGuru";
$route['patch/MapingGuru/byId/(:any)'] = "patch/MapingGuru/$1";
$route['delete/MapingGuru/byId/(:any)'] = "delete/MapingGuru/$1";
$route['get/MapingGuru/byId'] = "get/MapingGuruById";
$route['get/MapingGuru/all'] = "get/MapingGuruAll";





$route['logs'] = "logViewerController/index";
// $route['default_controller'] = 'authController/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


