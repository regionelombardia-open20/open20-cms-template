<?php

use app\modules\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 */
// Uikit::trace($data); return;
$id    = $data['id'];
$class = $data['class'][0];
$attrs = $data['attrs'];
$attrs_link = [];


//$data['content'] = Uikit::anchor($data['content'], $data['content'] );

?>
<<?= $data['title_element']?> id="<?=$data['content']?>" class="anchor-offset <?= ($class)? $class : '' ?>">
        <?= $data['content'] ?>
</<?= $data['title_element'] ?>>