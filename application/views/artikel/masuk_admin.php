<div class="article-home">

    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-center" style="background-color:white; border-radius:25px;">

    <img src="<?= base_url('assets/img/ksl%20svg.svg') ?>">
      <h2 class="mt-0 mb-3 ml-0 mr-0 text-center" >Login Admin</h2>

      <?php if(!empty($this->session->flashdata('error_msg'))): ?>
        <p class="btn btn-outline-danger text-center"><?= $this->session->flashdata('error_msg') ?></p>
      <?php endif ?>

      <?= form_open('login/admin', ['style' => 'width: 75vw;']) ?>
  <div class="form-group">
    <?= form_label('Username', 'username', ['class' => 'h5', 'style' => 'font-weight: bold']) ?>
    <?= form_input('username', $input->username, ['class' => 'form-control']) ?>
  </div>
  <div class="form-group">
    <?= form_label('Password', 'password', ['class' => 'h5', 'style' => 'font-weight: bold']) ?>
    <?= form_password('password', $input->password, ['class' => 'form-control']) ?>
  </div>
  <div class="form-grup form-inline">
      <?= form_submit('submit', 'Masuk', ['class' => 'form-control btn btn-primary mr-3 mb-3 ml-3']) ?>
  </div>
</form>
   </div>
 </div>
