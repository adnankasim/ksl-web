
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Pesan</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pesan</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<?php if(!empty($this->session->flashdata('info'))): ?>
						<div class="panel-heading text-center" style="color:blue; border:1px solid blue;">
							<?= $this->session->flashdata('info') ?>
						</div>
					<?php endif ?>
					<div class="panel-heading">
						Pesan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
                <th>Waktu</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($pesans as $pesan): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><?= $pesan->nama_user ?></td>
								<td><?= $pesan->email_user ?></td>
                <td><?= $pesan->waktu_pesan ?></td>
								<td>
									<a href="<?= base_url('admin-message/'.$pesan->id_pesan) ?>" class="btn btn-primary pull-left" style="color:white;">Detail</a>
									<?= form_open('admin-message/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_pesan', $pesan->id_pesan) ?>
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
