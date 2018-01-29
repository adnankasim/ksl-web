<div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center">
      <h1 class="text-center text-uppercase">berbagi pengetahuan</h1>
  <h4 class="text-center"><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto necessitatibus quas a deleniti tenetur voluptatem mollitia praesentium, at temporibus! Maiores possimus fugiat amet vel, itaque, placeat eveniet in magni facilis.</div>
  <div>Nostrum odio libero sit earum, eos, quam itaque, expedita aut nobis reprehenderit ex iste sint quo rerum autem dolorum incidunt officia ut consequuntur voluptatum. Iusto accusamus a ea adipisci, culpa?</div></h4>
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

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

     <?php if(!empty($artikels)): ?>

     <?php foreach($artikels as $artikel): ?>
    <div class="article-content article-content-article text-center">
       <a href="<?= base_url('artikel/'.$artikel->slug_artikel) ?>">
       <figure class="figure">
  <img src="<?= base_url('assets/img/'.$artikel->gambar_artikel) ?>" class="figure-img img-fluid rounded" >
</figure>
        <h3 class="text-center"><?= $artikel->judul_artikel ?></h3>
        </a>
        <h5><a href="<?= base_url('user/'.$artikel->username) ?>"><strong><?= $artikel->nama_user ?></strong></a> | <a href="<?= base_url('kategori/'.$artikel->nama_kategori) ?>"><strong><?= $artikel->nama_kategori ?></strong></a></h5>
    </div>
<?php endforeach ?>

<?php else: ?>

  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Artikel Tidak Ada</h2>
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
