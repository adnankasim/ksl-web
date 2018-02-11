<div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center">
      <h1 class="text-center text-uppercase">Gallery Event</h1>
  <h4 class="text-center">Terkadang suatu kegiatan yang menarik dan menyenangkan perlu di dokumentasikan agar bisa dilihat kembali kapan saja dan dimana saja.</h4>
</div>

 <div class="about-home flex-sm-column event-center flex-column d-flex align-items-center justify-content-center">
       <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

<?php if(!empty($galeris)): ?>

  <?php foreach($galeris as $galeri): ?>
    <div class="article-content text-center">
      <a href="<?= base_url('galeri/'.$galeri->slug_galeri) ?>">
       <figure class="figure">
  <img src="<?= base_url('assets/img/'.$galeri->gambar_galeri) ?>" class="figure-img img-fluid rounded" width="300">
</figure>
        <h3 class="text-center"><?= $galeri->nama_galeri ?></h3>
        </a>
    </div>
<?php endforeach ?>

<?php else: ?>

  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Galeri Belum Ada</h2>
  </div>

<?php endif ?>
      </div>

        </div>
