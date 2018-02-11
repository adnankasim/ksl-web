
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Galeri</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Galeri</h1>
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
					<div class="panel-heading">
						Galeri
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Waktu</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($galeris as $galeri): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><a href="<?= base_url('galeri/'.$galeri->slug_galeri) ?>" target="_blank"><?= $galeri->nama_galeri ?></a></td>
								<td><?= $galeri->waktu_galeri ?></td>
								<td>
									<a href="<?= base_url('galeri/edit/'.$galeri->id_galeri) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
									<?= form_open('galeri/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_galeri', $galeri->id_galeri) ?>
									<?= form_submit('hapus-galeri', 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah Galeri
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<?= form_open_multipart('galeri/post', ['class' => 'form-horizontal']) ?>
						<?= validation_errors() ?>
			      <?php if(!empty($this->session->flashdata('msg'))): ?>
			        <p class="text-center" style="color:blue; border:1px solid blue; padding:7px"><?= $this->session->flashdata('msg') ?></p>
			      <?php endif ?>

							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Galeri</label>
									<div class="col-md-9">
										<?= form_input('nama_galeri', $input->nama_galeri, ['class' => 'form-control', 'placeholder' => 'Nama Galeri']) ?>
									</div>
								</div>

                <!-- Time input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Galeri</label>
									<div class="col-md-9">
										<input name="waktu_galeri" type="date" class="form-control" value="<?= $input->waktu_galeri ?>">
									</div>
								</div>

                <!-- Pict input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Gambar Galeri</label>
									<div class="col-md-9">
										<input type="file" name="gambar_galeri[]" size="25" multiple class="form-control">
									</div>
								</div>

								<!-- Desc body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Deskripsi Galeri</label>
									<div class="col-md-9">
										<?= form_textarea('deskripsi_galeri', $input->deskripsi_galeri, ['class' => 'form-control', 'placeholder' => 'Deskripsi Galeri']) ?>
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<?= form_submit(null, 'Tambah', ['class' => 'btn btn-default btn-md pull-right']) ?>
									</div>
								</div>
							</fieldset>
						</form>
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
