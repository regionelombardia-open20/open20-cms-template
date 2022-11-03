<?php

use app\modules\uikit\Uikit;

/**
 * @var $this
 * @var $data
 */

$id    = $data['id'];
$class = $data['class'][0];
$attrs = $data['attrs'];

// Accordion
?>
<div id="collapseDiv<?= $id ?>" class="collapse-div <?= $class ?>">
    <?php foreach ($data['items'] as $key=>$item) : ?>
        <?= $this->render('accordionplus/item', compact('item', 'data', 'id')) ?>
    <?php endforeach ?>
</div>
