<?php

use trk\uikit\Uikit;

/**
 * @var $this object
 * @var $data array
 */

$class = $data['class'][0];

?>
<div 
    class="alert 
    <?=$data['alert_style'] ? 'alert-'.$data['alert_style']  : 'alert-info';?>
    <?=$data['can_close'] ? 'alert-dismissible fade show'  : '';?>
    <?= $class ?>"
    role="alert"    
>

    <?= $data['content'] ?>
    <hr>
    <?= $data['additional_content'] ?>
    <?php if(!empty($data['can_close'] )): ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Chiudi avviso">
            <span aria-hidden="true">&times;</span>
        </button>
    <?php endif; ?>
</div>