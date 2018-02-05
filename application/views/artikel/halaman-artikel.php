<div class="article-home">

    <div class="flex-md-row flex-sm-column flex-column d-flex align-items-sm-center align-items-md-start align-items-start justify-content-center">

    <div class="article-content article-content-article w-100">

             <div class="flex-sm-row flex-row d-flex ">

            <img src="<?= base_url('assets/img/'.$getArtikel->gambar_user) ?>" style="width: auto; height: 75px; overflow: hidden;" class="rounded-circle mt-3 mb-3 ml-3 mr-3">
            <div class="flex-sm-column flex-column d-flex  justify-content-center">
                <p class="h5"><strong><?= $getArtikel->nama_user ?></strong></p>
                <p class="h6 mb-0"><strong><?= $getArtikel->nama_kategori ?></strong></p>
                <p class="mb-0"><?= $getArtikel->waktu_buat ?></p>
            </div>

        </div>

      <h2 class="mt-3 mb-3 ml-3 mr-3 text-center" style="border: none; text-transform:none"><strong><?= $getArtikel->judul_artikel ?></strong></h2>
      <hr>
       <figure class="figure text-center">
  <img src="<?= base_url('assets/img/'.$getArtikel->gambar_artikel) ?>" class="figure-img img-fluid rounded" style="width: 75%; height: auto">
</figure>
        <p class="h5 pl-3 pr-3 pb-3"><?= $getArtikel->isi_artikel ?></p>
        <p class="small h5 pl-3 pr-3 pb-3">Telah Dibaca Sebanyak : <?= $getArtikel->tampil ?> kali</p>
    </div>

    <div class="flex-md-column flex-sm-column flex-column d-flex align-items-start justify-content-start w-75">
      <div class="list-group w-100 w-sm-100 w-md-100 mr-3 ml-3 mt-3 mb-3 h5">
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
    <a href="<?= base_url('kategori/'.$kategori->id_kategori) ?>" class="list-group-item list-group-item-action"><strong><i class="fab fa-optin-monster"></i>&nbsp; <?= $kategori->nama_kategori ?></strong></a>
    <?php
     $i++;
     endforeach;
     ?>
    </div>
      </div>


  </div>
 </div>
