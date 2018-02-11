<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Edit Galeri</li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Edit Galeri</h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Edit Galeri
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
        <div class="panel-body">
          <?= form_open('galeri/patch') ?>
          <?= validation_errors() ?>
          <?= form_hidden('id_galeri', $galeri->id_galeri) ?>
            <fieldset>
              <!-- Name input-->
              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Nama Galeri</label>
                <div class="col-md-9">
                  <?= form_input('nama_galeri', $galeri->nama_galeri, ['class' => 'form-control']) ?>
                </div>
              </div>

              <!-- Desc body -->
              <div class="form-group">
                <label class="col-md-3 control-label" for="message">Deskripsi Galeri</label>
                <div class="col-md-9">
                  <?= form_textarea('deskripsi_galeri', $galeri->deskripsi_galeri, ['class' => 'form-control']) ?>
                </div>
              </div>

              <!-- Form actions -->
              <div class="form-group">
                <div class="col-md-12 widget-right">
                  <?= form_submit('edit-galeri', 'Edit', ['class' => 'btn btn-default btn-md pull-right']) ?>
                </div>
              </div>
            </fieldset>
          <?= form_close() ?>

          <div class="form-group">
            <div class="col-md-12 text-center" style="margin:20px">
              <?php foreach($gambars as $gambar): ?>
                <div class="" style="display:inline-block">
                  <a href="<?= base_url('assets/img/'.$gambar->gambar_galeri) ?>" data-lightbox="example-set" style="display:block; margin:5px"><img class="figure-img img-fluid" src="<?= base_url('assets/img/'.$gambar->gambar_galeri) ?>" width="300"/></a>
                  <?= form_open('galeri/delete', ['style' => 'display:inline-block']) ?>
                  <?= form_hidden('id_detail_galeri', $gambar->id_detail_galeri) ?>
                  <?= form_submit('hapus-gambar', 'Hapus', ['class' => 'btn btn-danger']) ?>
                  <?= form_close() ?>
                </div>
              <?php endforeach ?>
            </div>
          </div>

          <?= form_open_multipart('galeri/patch') ?>
          <?= validation_errors() ?>
          <?= form_hidden('id_galeri', $galeri->id_galeri) ?>

          <!-- Pict input-->
          <div class="form-group">
            <h2>Ingin menambah gambar ? </h2>
            <label class="col-md-3 control-label" for="name">Gambar Event</label>
            <div class="col-md-9">
              <input type="file" name="gambar[]" size="25" multiple class="form-control">
            </div>
          </div>

          <!-- Form actions -->
          <div class="form-group">
            <div class="col-md-12 widget-right">
              <?= form_submit('tambah-gambar', 'Edit', ['class' => 'btn btn-default btn-md pull-right']) ?>
            </div>
          </div>
          <?= form_close() ?>

        </div>
      </div>
    </div><!--/.col-->
  </div><!--/.row-->
</div>	<!--/.main-->


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/custom.js"></script>
<script src="<?= base_url('assets/lightbox-dist/js/lightbox-plus-jquery.min.js') ?>"></script>
</body>
</html>
