<div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center">
      <h1 class="text-center text-uppercase">berbagi pengetahuan</h1>
  <h4 class="text-center">
    KSL-UNG menyediakan platform bloging untuk para anggota yang sudah mendaftar di web untuk bisa memposting artikel tentang Teknologi Informasi.
    <br>
    segala jenis konten yang melanggar ketentuan website ini akan dihapus oleh admin tanpa pemberitahuan
  </h4>
</div>

 <div class="article-home daftar-article-home" style="background-color:white;">
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

     <?php foreach ($artikels as $artikel): ?>

     <div class="article-content article-content-article text-center">
        <figure class="figure">
     <img src="<?= base_url('assets/img/'.$artikel->gambar_artikel) ?>" class="figure-img img-fluid rounded">
     </figure>
         <h3 class="text-center"><?= anchor('artikel/'.$artikel->slug_artikel, $artikel->judul_artikel) ?></h3>
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

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <nav>
  <ul class="pagination mt-3">
     <?= $pagination ?>
  </ul>
</nav>
     </div>
      <?= $sidebar ?>
 </div>
