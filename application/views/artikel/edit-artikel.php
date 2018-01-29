<div class="article-home" style="background-color:white;">

    <div class="flex-md-column flex-sm-column flex-column d-flex  align-items-center">

      <h2 class="mt-3 mb-3 ml-0 mr-0"><?= $heading ?></h2>

      <?= form_open_multipart($form_view, ['style' => 'width: 75vw']) ?>

  <div class="form-group">
    <p class="h4"><strong>Judul</strong></p>
    <?= form_input('judul_artikel', $artikel->judul_artikel, ['class' => 'form-control form-control-lg']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Gambar</strong></p>
    <?= form_upload('gambar', $artikel->gambar_artikel, ['class' => 'form-control-file']) ?>
  </div>
  <div class="form-group">
    <p class="h4"><strong>Kategori</strong></p>
    <?= form_dropdown('kategori', getDropDownList('kategori', ['id_kategori', 'nama_kategori']), $artikel->id_kategori, ['class' => 'form-control']) ?>

  </div>
  <div class="form-group">
    <p class="h4"><strong>Isi</strong></p>
    <?= form_textarea('isi_artikel', $artikel->isi_artikel, ['class' => 'form-control textarea-artikel']) ?>
  </div>
  <div class="form-grup form-inline">
      <?= form_submit('edit', 'Edit', ['class' => 'form-control btn btn-primary btn-lg mr-3 mb-3 ml-3']) ?>
  </div>
<?= form_close() ?>
   </div>

 </div>
