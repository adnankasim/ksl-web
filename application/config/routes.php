<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'artikel';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route untuk aplikasi & login
$route['masuk'] = 'login/index';
$route['daftar'] = 'login/register';
$route['keluar'] = 'login/logout';
$route['tentang'] = 'artikel/about';
$route['artikel'] = 'artikel/all_artikel';
$route['artikel/(:num)'] = 'artikel/all_artikel/$1';
$route['artikel/(:any)'] = 'artikel/get_artikel/$1';
$route['event'] = 'artikel/all_event';
$route['event/(:num)'] = 'artikel/all_event/$1';
$route['event/(:any)'] = 'artikel/get_event/$1';
$route['maintenance'] = 'artikel/maintenance';
$route['kategori/(:any)'] = 'artikel/category/$1';
$route['kategori/(:any)/(:num)'] = 'artikel/category/$1/$2';
$route['cari'] = 'artikel/search';
$route['cari/(:num)'] = 'artikel/search/$1';
$route['cari/(:any)'] = 'artikel/search/$1';
$route['user/(:any)'] = 'artikel/user/$1';
$route['user/(:any)/(:num)'] = 'artikel/user/$1/$2';
$route['post'] = 'artikel/post';
$route['edit/(:num)'] = 'artikel/edit/$1';
$route['edit'] = 'artikel/edit';
$route['hapus'] = 'artikel/delete';
$route['edit-user/(:any)'] = 'artikel/edit_user/$1';
$route['sidebar'] = 'artikel/sidebar';

// Route untuk admin dashboard
$route['admin'] = 'admin/index';

// Route untuk CRUD Kategori
$route['admin-category'] = 'category/index';
$route['admin-category/(:num)'] = 'category/show/$1';
$route['admin-category/post'] = 'category/store';
$route['admin-category/edit/(:num)'] = 'category/edit/$1';
$route['admin-category/patch'] = 'category/update';
$route['admin-category/delete'] = 'category/destroy';

// Routeadmin- untuk CRUD Agenda
$route['admin-event'] = 'event/index';
$route['admin-event/(:num)'] = 'event/show/$1';
$route['admin-event/post'] = 'event/store';
$route['admin-event/edit/(:num)'] = 'event/edit/$1';
$route['admin-event/patch'] = 'event/update';
$route['admin-event/delete'] = 'event/destroy';

// Routeadmin- untuk CRUD Operator
$route['admin-operator'] = 'operator/index';
$route['admin-operator/post'] = 'operator/store';
$route['admin-operator/delete'] = 'operator/destroy';

// Routeadmin- untuk RD User
$route['admin-user'] = 'user/index';
$route['admin-user/(:num)'] = 'user/show/$1';
$route['admin-user/delete'] = 'user/destroy';

// Routeadmin- untuk RD Article
$route['admin-article'] = 'article/index';
$route['admin-article/delete'] = 'article/destroy';
$route['admin-article/(:any)'] = 'article/show/$1';

// Route untuk RD Pesan
$route['admin-message'] = 'message/index';
$route['admin-message/(:num)'] = 'message/show/$1';
$route['admin-message/delete'] = 'message/destroy';
