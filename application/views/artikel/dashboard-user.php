<div class="about-home about-home-top struktur-top flex-column d-flex align-items-center justify-content-center" >
       <div class="article-content struktur text-center">
       <figure class="figure">
      <img src="<?= base_url('assets/img/'.$detail->gambar_user) ?>" class="figure-img img-fluid rounded-circle">
        </figure>
       <h5><strong><?= $detail->nama_user ?></strong></h5>
       <hr>
       <h5><strong><?= $detail->bio ?></strong></h5>
       <div class="h4 mt-3">
           Total Artikel : <?= $totalArtikel ?> &nbsp; <br>
           <?php if($this->session->userdata('username') == $detail->username): ?>
          <div class="box-button">
            <a href="<?= base_url('post') ?>" class="btn btn-outline-primary mt-3">Posting Artikel </a>
          </div>
          <div class="box-button">
            <a href="<?= base_url('edit-user/'.$detail->username) ?>" class="btn btn-outline-warning mt-3">Edit Profil</a>
          </div>
         <?php endif ?>
       </div>
      </div>
    </div>

 <div class="article-home" style="background-color:white;">

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
   <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

     <?php if(!empty($users)): ?>

     <?php foreach($users as $user): ?>
    <div class="article-content article-content-article text-center">
       <a href="<?= base_url('artikel/'.$user->slug_artikel) ?>">
       <figure class="figure">
  <img src="<?= base_url('assets/img/'.$user->gambar_artikel) ?>" class="figure-img img-fluid rounded" >
 </figure>
        <h3 class="text-center"><?= $user->judul_artikel ?></h3>
        </a>
        <h5><a href="<?= base_url('user/'.$user->username) ?>"><strong><?= $user->nama_user ?></strong></a> | <a href="<?= base_url('kategori/'.$user->nama_kategori) ?>"><strong><?= $user->nama_kategori ?></strong></a></h5>
        <?php if($this->session->userdata('username') == $detail->username): ?>
          <div class="box-button">
            <a href="<?= base_url('edit/'.$user->id_artikel) ?>" class="btn btn-outline-primary">Edit </a>
          </div>
          <div class="box-button">
            <form action="<?= base_url('hapus') ?>" method="post" class="mt-2 mb-3">
              <?= form_hidden('id_artikel', $user->id_artikel) ?>
              <?= form_submit('hapus', 'Hapus', ['class' => 'btn btn-outline-danger']) ?>
            </form>
          </div>
      <?php endif ?>
    </div>
 <?php endforeach ?>

 <?php else: ?>

  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Artikel Not Found</h2>
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
