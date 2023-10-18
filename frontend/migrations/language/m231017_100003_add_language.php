<?php

class m231017_100003_add_language extends \yii\db\Migration {

    public function safeUp() {
        $this->insert('admin_lang', [
            'id' => 1,
            'name' => 'Italian',
            'short_code' => 'it',
            'is_default' => 1,
            'is_deleted' => 0
        ]);        
    }

    public function safeDown() {
        $this->delete('admin_lang', ['id' => 1]);
    }
}
