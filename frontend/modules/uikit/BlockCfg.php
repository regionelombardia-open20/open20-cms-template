<?php

namespace app\modules\uikit;

use luya\cms\base\BlockConfigElement;

/**
 * Block CFG variables ensurence.
 *
 * @since 1.0.0
 */
class BlockCfg extends BlockConfigElement
{
    public function toArray()
    {
        return [
            'id' => $this->id,
            'var' => $this->item['var'],
            'label' => $this->item['label'],
            'type' => $this->item['type'],
            'description' => $this->get('description',''),
            'placeholder' => $this->get('placeholder'),
            'options' => $this->get('options'),
            'initvalue' => $this->get('initvalue'),
            'required' => $this->get('required', 0),
            'onlyAdmin' => $this->get('onlyAdmin', false),
        ];
    }
}
