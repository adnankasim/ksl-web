<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?= base_url('assets/img/KSL-png.png') ?>" type="image/x-icons">
	<title>KSL-UNG - Admin Dashboard</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/styles.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?= base_url('assets/lightbox-dist/css/lightbox.min.css') ?>">
	<script src="<?= base_url('assets/tinymce/js/tinymce/jquery.tinymce.min.js') ?>"></script>
	<script src="<?= base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
	<script>
		tinymce.init({
			selector:'#editor',
			theme: 'modern',
			mobile: { theme: 'mobile' }
		});
	</script>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Dashboard</span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?= base_url('assets/img/KSL-png.png') ?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $this->session->userdata('role') ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="<?= base_url('root') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="<?= base_url('admin-category') ?>"><em class="fa fa-etsy">&nbsp;</em> Kategori</a></li>
			<li><a href="<?= base_url('admin-article') ?>"><em class="fa fa-newspaper-o">&nbsp;</em> Artikel</a></li>
			<li><a href="<?= base_url('admin-event') ?>"><em class="fa fa-calendar">&nbsp;</em> Event</a></li>
			<li><a href="<?= base_url('galeri/create') ?>"><em class="fa fa-photo">&nbsp;</em> Galeri</a></li>
			<li><a href="<?= base_url('admin-message') ?>"><em class="fa fa-envelope">&nbsp;</em> Pesan</a></li>
			<li><a href="<?= base_url('admin-user') ?>"><em class="fa fa-users">&nbsp;</em> User</a></li>
			<?php if($this->session->userdata('role') == 'admin'): ?>
			<li><a href="<?= base_url('admin-operator') ?>"><em class="fa fa-user-circle-o">&nbsp;</em> Admin</a></li>
			<?php endif ?>
			<li><a href="<?= base_url('keluar') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
