

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Admin</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin</h1>
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
						Admin
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Level</th>
								<th>Login Terakhir</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($operators as $operator): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><?= $operator->username ?></td>
								<td><?= $operator->role ?></td>
								<td><?= $operator->login_terakhir ?></td>
								<td>
									<?= form_open('admin-operator/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_admin', $operator->id_admin) ?>
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
						Tambah Admin
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<?= form_open('admin-operator/post', ['class' => 'form-horizontal']) ?>

						<?= validation_errors() ?>

			      <?php if(!empty($this->session->flashdata('msg'))): ?>
			        <p class="text-center" style="color:blue; border:1px solid blue; padding:7px"><?= $this->session->flashdata('msg') ?></p>
			      <?php endif ?>

							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username</label>
									<div class="col-md-9">
										<?= form_input('username', $input->username, ['class' => 'form-control']) ?>
									</div>
								</div>

                <!-- Time input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password</label>
									<div class="col-md-9">
										<?= form_password('password', $input->password, ['class' => 'form-control']) ?>
									</div>
								</div>

                <!-- Status body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Level</label>
									<div class="col-md-9">
										<?php
										$options = [
											'operator' => 'Operator',
											'admin' => 'Admin'
										];
										echo form_dropdown('role', $options, $input->role, ['class' => 'form-control']);
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
						<!-- </form> -->
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

</body>
</html>
