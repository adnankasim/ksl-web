
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Detail User</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail User</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Detail User
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
            <dl class="dl-horizontal">
              <dt>Nama</dt>
              <dd><strong><?= $user->nama_user ?></strong></dd>
              <br>
              <dt>Username</dt>
              <dd><strong><?= $user->username ?></strong></dd>
              <br>
              <dt>Email</dt>
              <dd><strong><?= $user->email ?></strong></dd>
              <br>
              <dt>Bio</dt>
              <dd><strong><?= $user->bio ?></strong></dd>
              <br>
              <dt>Alamat</dt>
              <dd><strong><?= $user->alamat_user ?></strong></dd>
              <br>
              <dt>Telepon</dt>
              <dd><strong><?= $user->telepon ?></strong></dd>
              <br>
              <dt>Terakhir Login</dt>
              <dd><strong><?= $user->login_terakhir ?></strong></dd>
              <br>
              <dt>Gambar</dt>
              <dd>
                <img src="<?= base_url('assets/img/'.$user->gambar_user) ?>" class="img" width="700">
              </dd>
              <br>
              <dt>Action</dt>
              <dd>
								<?= form_open('admin-user/delete', ['class' => 'pull-left']) ?>
								<?= form_hidden('id_user', $user->id_user) ?>
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
