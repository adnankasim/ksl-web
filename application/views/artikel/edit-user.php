<div class="article-home" style="background-color:white;">

    <div class="flex-md-column flex-sm-column flex-column d-flex  align-items-center">

      <h2 class="mt-3 mb-3 ml-0 mr-0"><?= $heading ?></h2>

      <?= form_open_multipart($form_view, ['style' => 'width: 75vw']) ?>

  <div class="form-group">
    <p class="h4"><strong>Nama</strong></p>
    <?= form_input('nama_user', $user->nama_user, ['class' => 'form-control form-control-lg']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Email</strong></p>
    <?= form_input('email', $user->email, ['class' => 'form-control form-control-lg']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Telepon</strong></p>
    <?= form_input('telepon', $user->telepon, ['class' => 'form-control form-control-lg']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Bio</strong></p>
    <?= form_textarea('bio', $user->bio, ['class' => 'form-control']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Alamat</strong></p>
    <?= form_textarea('alamat_user', $user->alamat_user, ['class' => 'form-control']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Gambar</strong></p>
    <?= form_upload('gambar', $user->gambar_user, ['class' => 'form-control-file']) ?>
  </div>
  <div class="form-grup form-inline">
      <?= form_submit('edit', 'Edit', ['class' => 'form-control btn btn-primary btn-lg mr-3 mb-3 ml-3']) ?>
  </div>
<?= form_close() ?>
   </div>
 </div>
