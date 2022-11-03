<?php
/**
 * @var \luya\cms\base\PhpBlockView $this
*/
$cssClass = $this->cfgValue('cssClass');
?>
<div class="<?= $cssClass ?>">
    <?= $data['content'] ?>
</div>
