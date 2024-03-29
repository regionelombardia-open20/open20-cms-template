<?php

use app\modules\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 */
// Uikit::trace($data); return;
$id    = $data['id'];
$class = $data['class'];
$attrs = $data['attrs'];
$attrs_link = [];

// Style
$class[] = $data['title_style'] ? "uk-{$data['title_style']}" : '';
// Decoration
$class[] = $data['title_decoration'] ? "uk-heading-{$data['title_decoration']}" : '';
// Color
$class[] = $data['title_color'] && $data['title_color'] != 'background' ? "uk-text-{$data['title_color']}" : '';
// Link
$attrs_link= [];
$anchor  =  $data['anchor'] ? $data['anchor'] : $data['content'];
$data['content'] = Uikit::anchor($data['content'], $anchor, $attrs_link);

?>
<<?= $data['title_element'] . Uikit::attrs(compact('id', 'class'), $attrs) ?>>
<?php if ($data['title_color'] == 'background') : ?>
    <span class="uk-text-background"><?= $data['content'] ?></span>
<?php elseif ($data['title_decoration'] == 'line') : ?>
    <span><?= $data['content'] ?></span>
<?php else : ?>
    <?= $data['content'] ?>
<?php endif ?>
</<?= $data['title_element'] ?>>