<div class="jumbotron flex-column d-flex event-jumbotron align-items-center justify-content-center">
      <h1 class="text-center text-uppercase">event mendatang</h1>
  <h4 class="text-center"><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto necessitatibus quas a deleniti tenetur voluptatem mollitia praesentium, at temporibus! Maiores possimus fugiat amet vel, itaque, placeat eveniet in magni facilis.</div>
  <div>Nostrum odio libero sit earum, eos, quam itaque, expedita aut nobis reprehenderit ex iste sint quo rerum autem dolorum incidunt officia ut consequuntur voluptatum. Iusto accusamus a ea adipisci, culpa?</div></h4>
</div>

 <div class="about-home flex-sm-column event-center flex-column d-flex align-items-center justify-content-center">
       <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center flex-wrap">

    <?php if(!empty($events)): ?>

         <?php foreach($events as $event): ?>

    <div class="article-content text-center">
       <figure class="figure">
  <img src="<?= base_url('assets/img/'.$event->gambar_agenda) ?>" class="figure-img img-fluid rounded"  width="300">
</figure>
        <a href="<?= base_url('event/'.$event->slug_agenda) ?>">
        <h3 class="text-center"><?= $event->nama_agenda ?></h3>
        </a>
        <h6><span class="fa fa-calendar-alt"></span> &nbsp; <?= $event->waktu_agenda ?> &nbsp; | &nbsp; <span class="fa fa-map-marker"></span> &nbsp; <?= $event->tempat_agenda ?></h6>
    </div>

  <?php endforeach ?>

<?php else: ?>

  <div class="article-content article-content-article text-center">
    <h2 class="text-center" style="border-bottom:0">Event Belum Ada</h2>
  </div>

<?php endif ?>

      </div>
      <div class="flex-md-row flex-sm-column flex-column d-flex align-items-center justify-content-center">

      <nav>
      <ul class="pagination mt-3">
       <?= $pagination ?>
      </ul>
      </nav>
       </div>

        </div>
