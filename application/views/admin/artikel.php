

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Artikel</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Artikel</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<?php if(!empty($this->session->flashdata('info'))): ?>
						<div class="panel-heading text-center" style="color:blue; border:1px solid blue;">
							<?= $this->session->flashdata('info') ?>
						</div>
					<?php endif ?>
				</div>

        <div class="panel panel-default ">
					<div class="panel-heading">
						All Artikel
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>Nama</th>
								<th>Kategori</th>
								<th>Waktu</th>
								<th>Action</th>
							</tr>
							<?php $i = 0 ?>
							<?php foreach ($artikel_all as $artikel): ?>
              <tr>
								<td><?= ++$i ?></td>
								<td><?= $artikel->judul_artikel ?></td>
								<td><?= $artikel->nama_user ?></td>
								<td><?= $artikel->nama_kategori ?></td>
                <td><?= $artikel->waktu_buat ?></td>
								<td>
									<a href="<?= base_url('admin-article/'.$artikel->slug_artikel) ?>" class="btn btn-primary pull-left" 	style="color:white;">Detail</a>
									<?= form_open('admin-article/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_artikel', $artikel->id_artikel) ?>
									<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
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
