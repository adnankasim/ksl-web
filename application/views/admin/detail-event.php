

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Detail Event</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Event</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Detail Event
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
            <dl class="dl-horizontal">
              <dt>Nama</dt>
              <dd><strong><?= $event->nama_agenda ?></strong></dd>
							<br>
							<dt>Slug</dt>
              <dd><strong><?= $event->slug_agenda ?></strong></dd>
							<br>
							<dt>Tempat</dt>
              <dd><strong><?= $event->tempat_agenda ?></strong></dd>
							<br>
							<dt>Waktu</dt>
              <dd><strong><?= $event->waktu_agenda ?></strong></dd>
							<br>
							<dt>Gambar</dt>
              <dd>
								<img src="<?= base_url('assets/img/'.$event->gambar_agenda) ?>" class="img" width="700">
							</dd>
							<br>
							<dt>Status</dt>
              <dd><strong><?= $event->is_terlaksana ?></strong></dd>
							<br>
              <dt>Deskripsi</dt>
              <dd><?= $event->deskripsi_agenda ?></dd>
							<br>
              <dt>Action</dt>
              <dd>
								<a href="<?= base_url('admin-event/edit/'.$event->id_agenda) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
								<?= form_open('admin-event/delete', ['class' => 'pull-left']) ?>
								<?= form_hidden('id_agenda', $event->id_agenda) ?>
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
