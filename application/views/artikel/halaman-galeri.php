  <div class="about-home flex-sm-column event-center flex-column d-flex align-items-center justify-content-center">

    <h2 class="text-center text-uppercase">Galeri <?= $detailGaleri->nama_galeri ?></h2>
    <p><?= $detailGaleri->deskripsi_galeri ?></p>
    <p><small><?= $detailGaleri->waktu_galeri ?></small></p>
  <section class="article-content text-center" id="galeri-gambar">
    <div>
      <?php foreach($imageGaleri as $gambar): ?>
      <a href="<?= base_url('assets/img/'.$gambar->gambar_galeri) ?>" data-lightbox="example-set"><img class="figure-img img-fluid" src="<?= base_url('assets/img/'.$gambar->gambar_galeri) ?>" width="300"/></a>
      <?php endforeach ?>
    </div>
  </section>
  <script src="<?= base_url('assets/lightbox-dist/js/lightbox-plus-jquery.min.js') ?>"></script>
</div>
