
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Event</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Event</h1>
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
						Event
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Waktu</th>
								<th>Tempat</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($events as $event): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><?= $event->nama_agenda ?></td>
								<td><?= $event->waktu_agenda ?></td>
								<td><?= $event->tempat_agenda ?></td>
								<td>
									<a href="<?= base_url('admin-event/'.$event->id_agenda) ?>" class="btn btn-primary pull-left" style="color:white;">Detail</a>
									<a href="<?= base_url('admin-event/edit/'.$event->id_agenda) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
									<?= form_open('admin-event/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_agenda', $event->id_agenda) ?>
									<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah Event
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<?= form_open_multipart('admin-event/post', ['class' => 'form-horizontal']) ?>

						<?= validation_errors() ?>

			      <?php if(!empty($this->session->flashdata('msg'))): ?>
			        <p class="text-center" style="color:blue; border:1px solid blue; padding:7px"><?= $this->session->flashdata('msg') ?></p>
			      <?php endif ?>

							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Event</label>
									<div class="col-md-9">
										<?= form_input('nama_agenda', $input->nama_agenda, ['class' => 'form-control', 'placeholder' => 'Nama Agenda']) ?>
									</div>
								</div>

                <!-- Time input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Event</label>
									<div class="col-md-9">
										<input name="waktu_agenda" type="date" class="form-control" value="<?= $input->waktu_agenda ?>">
									</div>
								</div>

                <!-- Place input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tempat Event</label>
									<div class="col-md-9">
										<?= form_input('tempat_agenda', $input->tempat_agenda, ['class' => 'form-control', 'placeholder' => 'Tempat Agenda']) ?>
									</div>
								</div>

                <!-- Pict input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Gambar Event</label>
									<div class="col-md-9">
										<?= form_upload('gambar_agenda', null, ['class' => 'form-control']) ?>
									</div>
								</div>

								<!-- Desc body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Deskripsi Event</label>
									<div class="col-md-9">
										<?= form_textarea('deskripsi_agenda', $input->deskripsi_agenda, ['class' => 'form-control', 'placeholder' => 'Deskripsi Agenda']) ?>
									</div>
								</div>

                <!-- Status body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Status Event</label>
									<div class="col-md-9">
										<?php
										$options = [
											'true' => 'Terlaksana',
											'false' => 'On Going'
										];
										echo form_dropdown('is_terlaksana', $options, 'false', ['class' => 'form-control']);
										?>
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
