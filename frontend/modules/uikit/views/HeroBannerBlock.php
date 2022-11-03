<?php
$imgClass = "it-hero-wrapper";

$overlay = $data['overlay'] ? $imgClass . ' it-dark it-overlay' : $imgClass;

$smallSize = $data['smallSize'] ? ' it-hero-small-size' : '';
$class = $data['title_class'];

?>

<div class="<?= $overlay ?> <?= $smallSize ?>">
  <!-- - img-->
  <div class="img-responsive-wrapper">
    <div class="img-responsive">
        <div class="img-wrapper"><img src="<?= $data['image'] ?>" title="<?= $data['title_image'] ?>" alt="<?= $data['alt_image'] ?>"></div>
    </div>
  </div>
  <!-- - texts-->
  <div class="container">
    <div class="row">
        <div class="col-12">
          <div class="it-hero-text-wrapper bg-dark">
              <span class="it-category"><?= $data['label_category'] ?></span>
              <<?= $data['title_element'] . ' class="'. (($class)? $class : '').'"'?>><?= $data['title'] ?></<?= $data['title_element']?>>
              <p class="d-none d-lg-block"><?= $data['text'] ?></p>
          </div>
        </div>
    </div>
  </div>
</div>