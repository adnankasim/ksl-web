

   <div class="jumbotron flex-column d-flex align-items-center justify-content-center">
   <img src="<?= base_url('assets/img/KSL-png.png') ?>" alt="">
  <h5 class="text-center" style="font-weight:bold">
    Kelompok Studi Linux - Universitas Negeri Gorontalo (KSL-UNG) merupakan sebuah Komunitas Teknologi Informasi dan Komunikasi yang berbasis pada Universitas Negeri Gorontalo khususnya pada Fakultas Teknik. KSL-UNG hadir karena semangat para mahasiswa untuk mengampanyekan Teknologi Informasi dan Open Source kepada masyarakat di Gorontalo khususnya dilingkungan Universitas Negeri Gorontalo.
  </h5>
</div>


  <div class="about-home about-home-top flex-column d-flex align-items-center justify-content-center">
          <h4> <i class="fa fa-rocket fa-2x"></i> </h4>
          <h4>Apa Yang Kami Lakukan ?</h4>

     <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">

       <div class="article-content text-center">
       <p class="fa fa-code fa-5x"></p>
       <h5 class="article-about">Divisi Pemprograman</h5>
       <p>Divisi yang dibuat khusus untuk studi pengembangan perangkat lunak komputer. Di dalam Divisi ini anggota diajarkan tentang dasar dasar, development, deployment, dan maintenance perangkat lunak.</p>
      </div>

      <div class="article-content text-center">
        <p class="fa fa-wifi fa-5x"></p>
       <h5 class="article-about">Divisi Jaringan</h5>
       <p>Divisi yang dibuat khusus untuk studi tentang jaringan komputer. Di dalam divisi ini anggota akan diajarkan tentang dasar dasar jaringan komputer, OSI 7 Layer, dan lain sebagainya</p>
      </div>

      <div class="article-content text-center">
        <p class="fa fa-camera-retro fa-5x"></p>
       <h5 class="article-about">Divisi Multimedia</h5>
       <p>Divisi yang dibuat khusus untuk studi mengenai Multimedia. Di dalam divisi ini anggota akan diajarkan tentang Fotografi, Graphic Design, Video Editing, Multimedia Editing, Tipografi, Audio Editing dan lain sebagainya</p>
      </div>


      </div>

      <p class="lead text-center">
    <a class="btn btn-outline-warning btn-lg" href="<?= base_url('tentang') ?>" role="button">SELENGKAPNYA</a>
      </p>
  </div>

 <div class="article-home" style="background-color:white; border-top:2px solid orange; border-bottom:2px solid orange;">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">

    <h2 class="text-center"><i class="fa fa-pencil"></i>&nbsp;artikel</h2>
    <a class="btn btn btn-warning btn-lg" style="color: white" href="<?= base_url('artikel') ?>" role="button">SELENGKAPNYA</a>

   </div>

   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

<?php if(!empty($artikels)): ?>

  <?php foreach ($artikels as $artikel): ?>

<div class="article-content article-content-article text-center">
   <figure class="figure">
<img src="<?= base_url('assets/img/'.$artikel->gambar_artikel) ?>" class="figure-img img-fluid rounded">
</figure>
    <h4 class="text-center"><?= anchor('artikel/'.$artikel->slug_artikel, $artikel->judul_artikel) ?></h4>
    <h5>
      <?= anchor('user/'.$artikel->username, $artikel->nama_user) ?> |
      <?= anchor('kategori/'.$artikel->nama_kategori, $artikel->nama_kategori) ?>
    </h5>
  </div>
  <?php endforeach; ?>

<?php else: ?>

  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Artikel Belum Ada</h2>
  </div>

<?php endif ?>

    </div>
   </div>

 </div>

  <div class="about-home flex-sm-column flex-column d-flex align-items-center justify-content-center">
      <h2 class="display-4 text-center"><i class="fa fa-calendar"></i>&nbsp;event</h2>

       <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

<?php if(!empty($events)): ?>

<?php foreach ($events as $event): ?>
 <div class="article-content text-center">
    <figure class="figure">
 <img src="<?= base_url('assets/img/'.$event->gambar_agenda) ?>" class="figure-img img-fluid rounded">
 </figure>
     <h3 class="text-center"><?= anchor('event/'.$event->slug_agenda, $event->nama_agenda) ?></h3>
     <h6><span class="fa fa-calendar"></span> &nbsp; <?= $event->waktu_agenda ?> &nbsp; | &nbsp; <span class="fa fa-map-marker"></span> &nbsp; <?= $event->tempat_agenda ?></h6>
 </div>
<?php endforeach; ?>

<?php else: ?>
  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Event Belum Ada</h2>
  </div>
<?php endif ?>

      </div>
    <p class="lead text-center">
    <a class="btn btn-outline-info btn-lg" href="<?= base_url('event') ?>" role="button">SELENGKAPNYA</a>

    </div>


    <div class="about-home contact-home flex-sm-column flex-column d-flex align-items-center justify-content-center">
      <h2 class="display-4 text-center"> <i class="fa fa-envelope"></i>&nbsp; kontak</h2>

       <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

         <p>
            Sebagai komunitas IT yang selalu tumbuh dan berkembang maka kami tidak pernah menutup pintu untuk masyarakat untuk memberikan kritik, saran, dan ide agar kami bisa menjadi lebih baik lagi kedepannya.
         </p>

       <?= form_open('') ?>

       <?= validation_errors() ?>

       <?php if(!empty($this->session->flashdata('error_msg'))): ?>
         <p class="btn btn-outline-primary text-center"><?= $this->session->flashdata('error_msg') ?></p>
       <?php endif ?>

       <?php if($this->session->userdata('login')): ?>

         <div class="form-group row">
         <?= form_label('Username', 'nama', ['class' => 'col-sm-2 col-form-label col-form-label-lg']) ?>
         <div class="col-sm-10">
         <?= form_input('nama', $this->session->username, ['class' => 'form-control form-control-lg', 'readonly' => 'readonly']) ?>
         </div>
         </div>

       <?php else: ?>

       <div class="form-group row">
    <?= form_label('Email', 'email', ['class' => 'col-sm-2 col-form-label col-form-label-lg']) ?>
    <div class="col-sm-10">
      <?= form_input('email', '', ['class' => 'form-control form-control-lg']) ?>
    </div>
  </div>

  <div class="form-group row">
    <?= form_label('Nama', 'nama', ['class' => 'col-sm-2 col-form-label col-form-label-lg']) ?>
    <div class="col-sm-10">
      <?= form_input('nama', '', ['class' => 'form-control form-control-lg']) ?>
    </div>
  </div>
    <?php endif ?>

  <div class="form-group row">
    <?= form_label('Isi', 'isi', ['class' => 'col-sm-2 col-form-label col-form-label-lg']) ?>
    <div class="col-sm-10">
        <?= form_textarea('isi', '', ['class' => 'form-control form-control-lg']) ?>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-4">
    <?= form_submit('submit', 'Kirim', ['class' => 'form-control btn btn-outline-warning']) ?>
    </div>
  </div>
<?= form_close() ?>
        </div>
    </div>

    <div class="about-home flex-sm-column flex-column d-flex align-items-center justify-content-center">
       <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-around flex-wrap">

       <div class="article-content text-center">
        <h3 class="text-center"><strong> <i class="fa fa-home"></i>&nbsp;SEKRETARIAT</strong></h3>
        <h4>
        Gedung U Lt. 3, Fakultas Teknik, Universitas Negeri Gorontalo <br>

        Jl. Jend. Sudirman, Kota Gorontalo
        </h4>
    </div>

      <div class="article-content text-center">
        <h3 class="text-center"><strong> <i class="fa fa-wpexplorer fa-1x"></i>&nbsp;AYO IKUTI KAMI</strong></h3>
        <h4>
            <a href="https://www.facebook.com/groups/kslung/" target="_blank"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
            &nbsp;&nbsp;&nbsp;
            <a href="https://twitter.com/kslung1" target="_blank"><i class="fa fa-twitter fa-3x" aria-hidden="true"></i></a>
            &nbsp;&nbsp;&nbsp;
            <a href="https://www.instagram.com/kslung1/" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
        </h4>
    </div>

      <div class="article-content text-center">
        <h3 class="text-center"><strong> <i class="fa fa-html5"></i>&nbsp;TENTANG KSL-UNG.COM</strong></h3>
        <h4>
            Tujuan utama didirikannya ksl-ung.com adalah sebagai media informasi dan komunikasi sesama anggota, anggota-masyarakat, maupun anggota-penggiat IT & Open Source di seluruh dunia.
        </h4>
    </div>
        </div>
    </div>
