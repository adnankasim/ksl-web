

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-etsy color-blue"></em>
							<div class="large"><?= $jumlah_kategori ?></div>
							<div class="text-muted">Kategori</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-2 col-lg-2 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-newspaper-o color-orange"></em>
							<div class="large"><?= $jumlah_artikel ?></div>
							<div class="text-muted">Artikel</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-2 col-lg-2 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-calendar color-teal"></em>
							<div class="large"><?= $jumlah_event ?></div>
							<div class="text-muted">Event</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-2 col-lg-2 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
							<div class="large"><?= $jumlah_user ?></div>
							<div class="text-muted">User</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-photo"></em>
							<div class="large"><?= $jumlah_galeri ?></div>
							<div class="text-muted">Galeri</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Kategori
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($kategoris as $kategori): ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $kategori->nama_kategori ?></td>
								<td>
									<a href="<?= base_url('admin-category/'.$kategori->id_kategori) ?>" class="btn btn-primary pull-left" style="color:white;">Detail</a>
									<a href="<?= base_url('admin-category/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
									<?= form_open('admin-category/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_kategori', $kategori->id_kategori) ?>
									<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
					</div>
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
							<?php $i = 1 ?>
							<?php foreach ($artikels as $artikel): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><?= $artikel->judul_artikel ?></td>
								<td><?= $artikel->nama_user ?></td>
								<td><?= $artikel->nama_kategori ?></td>
                <td><?= $artikel->waktu_buat ?></td>
								<td>
									<a href="<?= base_url('admin-article/'.$artikel->slug_artikel) ?>" class="btn btn-primary pull-left" style="color:white;">Detail</a>
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

				<div class="panel panel-default ">
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
									<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
					</div>
				</div>

				<div class="panel panel-default ">
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
							<?php foreach ($messages as $pesan): ?>
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

				<div class="panel panel-default ">
					<div class="panel-heading">
						User
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Email</th>
                <th>Login Terakhir</th>
								<th>Action</th>
							</tr>
							<?php $i = 1 ?>
							<?php foreach ($users as $user): ?>
              <tr>
								<td><?= $i++ ?></td>
								<td><?= $user->nama_user ?></td>
                <td><?= $user->username ?></td>
								<td><?= $user->email ?></td>
                <td><?= $user->login_terakhir ?></td>
								<td>
									<a href="<?= base_url('admin-user/'.$user->id_user) ?>" class="btn btn-primary pull-left" style="color:white;">Detail</a>
									<?= form_open('admin-user/delete', ['class' => 'pull-left']) ?>
									<?= form_hidden('id_user', $user->id_user) ?>
									<?= form_submit(null, 'Hapus', ['class' => 'btn btn-danger']) ?>
									<?= form_close() ?>
								</td>
							</tr>
						<?php endforeach ?>
						</table>
					</div>
				</div>

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
