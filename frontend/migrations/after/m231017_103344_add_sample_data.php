<?php

class m231017_103344_add_sample_data extends \yii\db\Migration {

    public function safeUp() {

        $this->update('admin_lang', ['is_default' => 0]);
        $this->update('admin_lang', ['is_default' => 1], ['short_code' => 'it']);
        $this->delete('admin_lang', ['short_code' => 'en']);

        $this->insert('cms_nav', [
            'id' => 2,
            'nav_container_id' => 1,
            'parent_nav_id' => 0,
            'sort_index' => 1,
            'is_deleted' => 0,
            'is_hidden' => 1,
            'is_home' => 0,
            'is_offline' => 0,
            'is_draft' => 0,
            'layout_file' => null,
            'publish_from' => null,
            'publish_till' => null
        ]);

        $this->insert('cms_nav_item', [
            'id' => 2,
            'nav_id' => 2,
            'lang_id' => 1,
            'nav_item_type' => 1,
            'nav_item_type_id' => 2,
            'create_user_id' => 1,
            'update_user_id' => 1,
            'timestamp_create' => 1680537615,
            'timestamp_update' => 1680537615,
            'title' => 'Login',
            'alias' => 'login',
            'description' => '',
            'keywords' => '',
            'title_tag' => '',
            'image_id' => null,
            'is_url_strict_parsing_disabled' => 0,
            'is_cacheable' => 0
        ]);

        $this->insert('cms_nav_item_page', [
            'id' => 2,
            'layout_id' => 1,
            'nav_item_id' => 2,
            'timestamp_create' => 1680537615,
            'create_user_id' => 1,
            'version_alias' => 'Versione Iniziale'
        ]);

        $loginBlock = '\app\modules\uikit\blocks\LoginBlock';
        $textBlock = '\app\modules\uikit\blocks\TextBlock';
        $lineBlock = '\app\modules\uikit\blocks\LineBlock';
        $titleBlock = '\app\modules\uikit\blocks\TitleBlock';
        $layoutBlock = '\app\modules\uikit\blocks\LayoutColumnsBlock';
        $sectionLayout = '\app\modules\uikit\blocks\SezioneOrizzontaleBlock';

        $loginId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $loginBlock)->queryScalar();
        $textId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $textBlock)->queryScalar();
        $lineId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $lineBlock)->queryScalar();
        $titleId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $titleBlock)->queryScalar();
        $layoutId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $layoutBlock)->queryScalar();
        $sectionId = \Yii::$app->db->createCommand("SELECT id FROM cms_block WHERE is_disabled = 0 and class =:class")
                        ->bindValue(':class', $sectionLayout)->queryScalar();

        $this->batchInsert('cms_nav_item_page_block_item', [
            'id',
            'block_id',
            'placeholder_var',
            'nav_item_page_id',
            'prev_id',
            'json_config_values',
            'json_config_cfg_values',
            'is_dirty',
            'create_user_id',
            'update_user_id',
            'timestamp_create',
            'timestamp_update',
            'sort_index',
            'is_hidden',
            'variation'
                ], [
            [1, $sectionId, 'content', 2, 0, '{"opacity":100,"gradient_percent":0,"image":0,"not_embed_container":"","brandbook_background":"primary","gradient_align":"","image_size":"","image_position":"","image_repeat":""}', '{"visibility":"","cache":"","addclass":{},"rbac_permissions":{},"class":"my-5"}', 1, 1, 1, '1697563961', '1697563961', 0, 0, 0],
            [2, $layoutId, 'content', 2, 1, '{"n_colonne":1,"visibility":"","addclass":{},"cache":""}', '{"addClass":{},"add_affix":"","rowDivClass":"variable-gutters mt-5"}', 1, 1, 1, '1697564002', '1697564002', 0, 0, 0],
            [4, $titleId, 'col1', 2, 2, '{"headingType":"h3","visibility":"","addclass":{},"content":"Accedi al servizio"}', '{"cssClass":"mb-0"}', 1, 1, 1, '1697564113', '1697564113', 0, 0, 0],
            [5, $titleId, 'col1', 2, 2, '{"headingType":"h1","visibility":"","addclass":{},"content":"Open 2.0"}', '{"cssClass":"design-theme-color-primary"}', 1, 1, 1, '1697564164', '1697564164', 1, 0, 0],
            [6, $lineId, 'col1', 2, 2, null, null, 0, 1, 0, '1697564511', '1697564511', 2, 0, 0],
            [7, $textId, 'col1', 2, 2, '{"visibility":"","addclass":{},"content":"<div>Accedi al servizio Open 2.0!<\/div>\n<div>Registrati per ricevere informazioni personalizzate e sempre aggiornate sulle nostre iniziative oppure, se sei gi&agrave; registrato, per gestire le tue preferenze<\/div>"}', '{"cssClass":"lead"}', 1, 1, 1, '1697564219', '1697564219', 3, 0, 0],
            [8, $loginId, 'col2', 2, 2, null, null, 0, 1, 0, '1697564511', '1697564511', 0, 0, 0],
        ]);

        //password: Password01!
        $this->update('user', ['password_hash' => '$2y$13$eYO1aHXQNWN1RYOq9kz.nOkgqSBXwplbM6aM4jij2uMVaVdrh8ADO'], ['id' => 1]);
    }

    public function safeDown() {
        echo 'No down available';
    }
}
