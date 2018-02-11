<div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">
  <div class="list-group w-100 w-sm-100 mr-3 ml-3 mt-3 mb-3 h5">
<li class="list-group-item list-group-item-action active">
 Top 10 Artikel
</li>
<?php
 $i = 1;
 foreach($topTenArtikels as $topTen):
?>
<a href="<?= base_url('artikel/'.$topTen->slug_artikel) ?>" class="list-group-item list-group-item-action"><strong><?= $i ?>. &nbsp; <?= $topTen->judul_artikel ?></strong>&nbsp;<span class="badge badge-primary"><?= $topTen->tampil ?></span></a>
<?php
 $i++;
 endforeach;
 ?>
</div>

  <div class="list-group w-100 ml-3 mr-3 mt-3 mb-3 h5">
<li class="list-group-item list-group-item-action active">
 Kategori
</li>
<?php
 $i = 1;
 foreach($allKategoris as $kategori):
?>
<a href="<?= base_url('kategori/'.$kategori->id_kategori) ?>" class="list-group-item list-group-item-action"><strong><i class="fa fa-optin-monster"></i>&nbsp; <?= $kategori->nama_kategori ?></strong></a>
<?php
 $i++;
 endforeach;
 ?>
</div>
  </div>
