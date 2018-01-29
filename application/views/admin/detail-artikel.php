

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Detail Artikel</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Artikel</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Detail Artikel
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
            <dl class="dl-horizontal">
              <dt>Judul</dt>
              <dd><strong><?= $artikel->judul_artikel ?></strong></dd>
              <br>
              <dt>Slug</dt>
              <dd><strong><?= $artikel->slug_artikel ?></strong></dd>
              <br>
              <dt>User</dt>
              <dd><strong><?= $artikel->nama_user ?></strong></dd>
              <br>
              <dt>Kategori</dt>
              <dd><strong><?= $artikel->nama_kategori ?></strong></dd>
              <br>
              <dt>Waktu Buat</dt>
              <dd><strong><?= $artikel->waktu_buat ?></strong></dd>
              <br>
              <dt>Waktu Edit</dt>
              <dd><strong><?= $artikel->waktu_edit ?></strong></dd>
              <br>
              <dt>Gambar</dt>
              <dd>
                <img src="<?= base_url('assets/img/'.$artikel->gambar_artikel) ?>" class="img" width="700">
              </dd>
              <br>
              <dt>Isi</dt>
              <dd><?= $artikel->isi_artikel ?></dd>
              <br>
              <dt>Views</dt>
              <dd><strong><?= $artikel->tampil ?></strong></dd>
              <br>
              <dt>Action</dt>
              <dd>
								<?= form_open('admin-article/delete', ['class' => 'pull-left']) ?>
								<?= form_hidden('id_artikel', $artikel->id_artikel) ?>
								<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
								<?= form_close() ?>
              </dd>
            </dl>
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

</body>
</html>
