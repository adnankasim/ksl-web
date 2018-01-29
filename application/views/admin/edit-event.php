	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Event</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Event</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Event
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<?= form_open('admin-event/patch') ?>
						<?= validation_errors() ?>
						<?= form_hidden('id_agenda', $event->id_agenda) ?>
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Event</label>
									<div class="col-md-9">
										<?= form_input('nama_agenda', $event->nama_agenda, ['class' => 'form-control']) ?>
									</div>
								</div>

                <!-- Time input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Waktu Event</label>
									<div class="col-md-9">
										<input name="waktu_agenda" type="date" class="form-control" value="<?= $event->waktu_agenda ?>">
									</div>
								</div>

                <!-- Place input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tempat Event</label>
									<div class="col-md-9">
										<?= form_input('tempat_agenda', $event->tempat_agenda, ['class' => 'form-control']) ?>
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
										<?= form_textarea('deskripsi_agenda', $event->deskripsi_agenda, ['class' => 'form-control']) ?>
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
										echo form_dropdown('is_terlaksana', $options, $event->is_terlaksana, ['class' => 'form-control']);
										?>
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<?= form_submit(null, 'Edit', ['class' => 'btn btn-default btn-md pull-right']) ?>
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
