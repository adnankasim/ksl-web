<div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center">
      <h1 class="text-center text-uppercase">berbagi pengetahuan</h1>
  <h4 class="text-center"><?= $detail->deskripsi_kategori ?></h4>
</div>

 <div class="article-home" style="background-color:white; margin-top:-30px;">

   <div class="flex-sm-column flex-row d-flex align-items-center justify-content-center">

     <?= form_open('cari', ['method' => 'get', 'class' => 'form-inline']) ?>
   <div class="form-group mx-sm-3 mb-2">
     <?= form_input('search', null, ['class' => 'form-control form-control-lg', 'style' => 'width: 50vw', 'placeholder' => 'Cari Judul Artikel']) ?>
   </div>
   <?= form_submit('submit', 'Cari', ['content' => 'Cari', 'class' => 'btn btn-primary mb-2 ml-1 btn-lg']) ?>

 <?= form_close() ?>

   </div>

   <div class="flex-sm-column flex-row d-flex align-items-center justify-content-center">

    <p class="h4 text-uppercase mb-3 mt-3">Kategori : <strong><?= $detail->nama_kategori ?></strong></p>
   </div>

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">
<?php if(!empty($kategoris)): ?>

  <?php foreach($kategoris as $kategori): ?>
    <div class="article-content article-content-article text-center">
       <a href="<?= base_url('artikel/'.$kategori->slug_artikel) ?>">
       <figure class="figure">
  <img src="<?= base_url('assets/img/'.$kategori->gambar_artikel) ?>" class="figure-img img-fluid rounded">
</figure>
        <h3 class="text-center"><?= $kategori->judul_artikel ?></h3>
        </a>
        <h5><a href="<?= base_url('user/'.$kategori->username) ?>"><strong><?= $kategori->nama_user ?></strong></a> | <a href="<?= base_url('kategori/'.$kategori->nama_kategori) ?>"><strong><?= $kategori->nama_kategori ?></strong></a></h5>
    </div>
  <?php endforeach ?>

<?php else: ?>
  <div class="article-content article-content-article text-center">
    <h2 style="border:none">Artikel Belum Ada</h2>
  </div>
<?php endif ?>

    </div>
   </div>

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">

   <nav>
  <ul class="pagination mt-3">
    <?= $pagination ?>
  </ul>
</nav>
     </div>

   <?= $sidebar ?>

 </div>
