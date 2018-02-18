<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="orange">
    <title>KSL-UNG | Gorontalo Open Source Community</title>
    <?php if(!empty($getArtikel)): ?>
      <meta name="description" content="<?= substr($getArtikel->isi_artikel, 0, 100) ?>">
      <meta name="keywords" content="<?= $getArtikel->judul_artikel ?>">
      <meta name="author" content="<?= $getArtikel->nama_user ?>">
    <?php elseif(!empty($detailGaleri)): ?>
      <meta name="description" content="<?= substr($detailGaleri->deskripsi_galeri, 0, 100) ?>">
      <meta name="keywords" content="<?= $detailGaleri->nama_galeri ?>">
    <?php elseif(!empty($getEvent)): ?>
      <meta name="description" content="<?= substr($getEvent->deskripsi_agenda, 0, 100) ?>">
      <meta name="keywords" content="<?= $getEvent->nama_agenda ?>">
    <?php else: ?>
      <meta name="description" content="Satu satunya Komunitas Free & Open Source Software (FOSS) yang masih tegak berdiri di tanah Hulondhalo dengan misi untuk meng-opensource-kan Indonesia terutama Gorontalo agar masyarakat terhindar dari maraknya pembajakan software dan bisa mengenal dunia teknologi lebih dalam">
      <meta name="keywords" content="KSL, ksl ung, KSL-UNG, ksl-ung, komunitas open source gorontalo, Gorontalo Open Source Community, komunitas it gorontalo, gorontalo it, komunitas universitas negeri gorontalo, ung it">
      <meta name="author" content="KSL-UNG">
    <?php endif ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato|Ubuntu:400,500,700" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/KSL-png.png') ?>" type="image/x-icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <script src="<?= base_url('assets/js/app.js') ?>" defer></script>
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
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <a class="navbar-brand" href="<?= base_url() ?>" style="color: orange;">
      <img src="<?= base_url('assets/img/ksl%20svg.svg') ?>" width="70">
      KSL-UNG
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end text-center" id="navbarSupportedContent">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="<?= base_url('tentang') ?>"> <i class="fa fa-users fa-1x"></i>&nbsp; tentang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="<?= base_url('artikel') ?>"> <i class="fa fa-pencil"></i>&nbsp; artikel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="<?= base_url('event') ?>"> <i class="fa fa-calendar"></i>&nbsp; event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mr-2 mt-1" href="<?= base_url('galeri') ?>"> <i class="fa fa-photo"></i>&nbsp; Galeri</a>
      </li>
      <?php if($this->session->userdata('login')): ?>
        <li class="nav-item">
            <a class="nav-link btn btn-warning mr-2 mt-1" href="<?= base_url('user/'.$this->session->userdata('username')) ?>" style="color: white"><i class="fa fa-user"></i>&nbsp; Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-warning mr-2 mt-1" href="<?= base_url('keluar') ?>" style="color: white"> <i class="fa fa-sign-out"></i>&nbsp; keluar</a>
          </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link btn btn-warning mr-2 mt-1" href="<?= base_url('masuk') ?>" style="color: white"> <i class="fa fa-sign-in"></i>&nbsp; masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-warning mr-2 mt-1" href="<?= base_url('daftar') ?>" style="color: white"> <i class="fa fa-user-plus"></i>&nbsp; daftar</a>
      </li>
    <?php endif ?>
    </ul>
</div>
</nav>
