<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */
return [
    'amosadmin' => [
        'class' => 'open20\amos\admin\AmosAdmin',
        'moduleName' => 'amosadmin',
        'defaultUserRole' => 'BASIC_USER',
        'enableRegister' => false,
        'disableFirstAccesWizard' => true,
        'bypassWorkflow' => true,
        'disableUpdateChangeStatus' => true,
        'dontCheckOneTagPresent' => true,
        'profileRequiredFields' => [
            'status',
        ],
        'fieldsConfigurations' => [
            'boxes' => [
                'box_account_data' => ['form' => true, 'view' => true],
                'box_dati_accesso' => ['form' => true, 'view' => true],
                'box_dati_contatto' => ['form' => true, 'view' => true],
                'box_dati_fiscali_amministrativi' => ['form' => false, 'view' => false],
                'box_dati_nascita' => ['form' => true, 'view' => true],
                'box_email_frequency' => ['form' => true, 'view' => true],
                'box_facilitatori' => ['form' => false, 'view' => false],
                'box_foto' => ['form' => true, 'view' => true],
                'box_informazioni_base' => ['form' => true, 'view' => true],
                'box_presentazione_personale' => ['form' => true, 'view' => true],
                'box_privacy' => ['form' => true, 'view' => true],
                'box_questio' => ['form' => false, 'view' => false],
                'box_role_and_area' => ['form' => true, 'view' => true],
                'box_social_account' => ['form' => true, 'view' => true],
            ],
            'fields' => [
                'attivo' => ['form' => true, 'view' => true, 'referToBox' => 'box_account_data'],
                'codice_fiscale' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_fiscali_amministrativi'],
                'cognome' => ['form' => true, 'view' => true, 'referToBox' => 'box_informazioni_base'],
                'default_facilitatore' => ['form' => true, 'view' => true],
                'email' => ['form' => true, 'view' => false, 'referToBox' => 'box_dati_contatto'],
                'email_pec' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_contatto'],
                'facebook' => ['form' => true, 'view' => true, 'referToBox' => 'box_social_account'],
                'facilitatore_id' => ['form' => true, 'view' => true, 'referToBox' => 'box_facilitatori'],
                'googleplus' => ['form' => true, 'view' => true, 'referToBox' => 'box_social_account'],
                'linkedin' => ['form' => true, 'view' => true, 'referToBox' => 'box_social_account'],
                'nascita_comuni_id' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_nascita'],
                'nascita_data' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_nascita'],
                'nascita_nazioni_id' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_nascita'],
                'nascita_province_id' => ['form' => false, 'view' => false, 'referToBox' => 'box_dati_nascita'],
                'nome' => ['form' => true, 'view' => true, 'referToBox' => 'box_informazioni_base'],
                'note' => ['form' => true, 'view' => false, 'referToBox' => 'box_informazioni_base'],
                'presentazione_breve' => ['form' => true, 'view' => true, 'referToBox' => 'box_informazioni_base'],
                'presentazione_personale' => ['form' => true, 'view' => true, 'referToBox' => 'box_presentazione_personale'],
                'privacy' => ['form' => true, 'view' => true, 'referToBox' => 'box_privacy'],
                'sesso' => ['form' => true, 'view' => false, 'referToBox' => 'box_informazioni_base'],
                'telefono' => ['form' => true, 'view' => false, 'referToBox' => 'box_dati_contatto'],
                'twitter' => ['form' => true, 'view' => true, 'referToBox' => 'box_social_account'],
                'ultimo_accesso' => ['form' => true, 'view' => true, 'referToBox' => 'box_account_data'],
                'ultimo_logout' => ['form' => true, 'view' => true, 'referToBox' => 'box_account_data'],
                'username' => ['form' => true, 'view' => false, 'referToBox' => 'box_dati_accesso'],
                'user_profile_age_group_id' => ['form' => true, 'view' => true, 'referToBox' => 'box_informazioni_base'],
                'user_profile_area_id' => ['form' => true, 'view' => false, 'referToBox' => 'box_role_and_area'],
                'userProfileImage' => ['form' => true, 'view' => true, 'referToBox' => 'box_foto'],
                'user_profile_role_id' => ['form' => true, 'view' => false, 'referToBox' => 'box_role_and_area'],
            ]
        ]
    ],
    'attachments' => [
        'class' => 'open20\amos\attachments\FileModule',
        'webDir' => 'files',
        'tempPath' => '@common/uploads/temp',
        'storePath' => '@common/uploads/store',
        'cache_age' => '2592000',
        'disableGallery' => true
    ],
    'audit' => [
        'class' => 'open20\amos\audit\Audit',
        'db' => 'db',
        'accessRoles' => ['ADMIN'],
        'ignoreActions' => [
            '*',
        ],
    //This avoid all post data in audit
    /* 'panels' => [
      'audit/request' => [
      'ignoreKeys' => ['POST', 'requestBody'],
      ],
      ], */
    ],
    'comuni' => [
        'class' => 'open20\amos\comuni\AmosComuni',
    ],
    /*'cwh' => [
        'class' => 'open20\amos\cwh\AmosCwh',
        'cached' => false,
        'regolaPubblicazioneFilter' => true
    ],*/
    'dashboard' => [
        'class' => 'open20\amos\dashboard\AmosDashboard',
    ],
    // 'elasticsearch' =>[
    //     'class' => '\open20\elasticsearch\Module',
    //     'modelsEnabled' => [
    //     ],
    // ],
    'email' => [
        'class' => 'open20\amos\emailmanager\AmosEmail',
        'templatePath' => '@common/mail/emails',
    ],
    'notify' => [
        'class' => 'open20\amos\notificationmanager\AmosNotify',
        'batchFromDate' => '2019-08-26',
        'confirmEmailNotification' => false,
    ],
    'privileges' => [
        'class' => 'open20\amos\privileges\AmosPrivileges',
    ],
    'schema' => [
        'class' => 'simialbi\yii2\schemaorg\Module',
    //'autoCreate' => false,
    //'autoRender' => false
    ],
    'seo' => [
        'class' => 'open20\amos\seo\AmosSeo',
        'modelsEnabled' => [
        ],
    ],
    'socialauth' => [
        'class' => 'open20\amos\socialauth\Module',
        'enableLogin' => false,
        'enableLink' => false,
        'enableRegister' => false,
        'enableSpid' => false,
        'providers' => [
            "Facebook" => [
                "enabled" => true,
                "keys" => [
                    "id" => "YOUR_ID",
                    "secret" => "YOUR_SECRET"
                ],
                "scope" => "email"
            ],
        ],
    ],
    'tag' => [
        'class' => 'open20\amos\tag\AmosTag',
        'modelsEnabled' => [
        ],
    ],
    'translatemanager' => [
        'class' => 'lajax\translatemanager\Module',
        'root' => [
            '@frontend',
            '@app', // The root directory of the project scan.
            '@vendor/open20/',
            '@vendor/luyadev/',
        ],
        'scanRootParentDirectory' => true, // Whether scan the defined `root` parent directory, or the folder itself.
        // IMPORTANT: for detailed instructions read the chapter about root configuration.
        'layout' => 'language', // Name of the used layout. If using own layout use 'null'.
        'allowedIPs' => ['*'], // IP addresses from which the translation interface is accessible.
        'roles' => ['ADMIN'], // For setting access levels to the translating interface.
        'tmpDir' => '@runtime', // Writable directory for the client-side temporary language files.
        // IMPORTANT: must be identical for all applications (the AssetsManager serves the JavaScript files containing language elements from this directory).
        'phpTranslators' => [// list of the php function for translating messages.
            '::t',
            '::tText',
            '::tHtml',
        ],
        'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
        'patterns' => ['*.js', '*.php'], // list of file extensions that contain language elements.
        'ignoredCategories' => ['yii'], // these categories won't be included in the language database.
        'ignoredItems' => ['config'], // these files will not be processed.
        'scanTimeLimit' => null, // increase to prevent "Maximum execution time" errors, if null the default max_execution_time will be used
        'searchEmptyCommand' => '!', // the search string to enter in the 'Translation' search field to find not yet translated items, set to null to disable this feature
        'defaultExportStatus' => 1, // the default selection of languages to export, set to 0 to select all languages by default
        'defaultExportFormat' => 'json', // the default format for export, can be 'json' or 'xml'
        'tables' => [// Properties of individual tables
            [
                'connection' => 'db', // connection identifier
                'table' => '{{%language}}', // table name
                'columns' => ['name', 'name_ascii'], // names of multilingual fields
                'category' => 'database-table-name', // the category is the database table name
            ]
        ],
    ],
    'translation' => [
        'class' => 'open20\amos\translation\AmosTranslation',
        'modelNs' => 'frontend\models\translations',
        'queryCache' => 'translateCache',
        'cached' => true,
        'translationBootstrap' => [
            'configuration' => [
                'translationLabels' => [
                    'classBehavior' => \lajax\translatemanager\behaviors\TranslateBehavior::className(),
                    'models' => [
                        [
                            'namespace' => 'cornernote\workflow\manager\models\Status',
                            //'connection' => 'db', //if not set it use 'db'
                            //'classBehavior' => NULL,//if not set it use default classBehavior 'lajax\translatemanager\behaviors\TranslateBehavior'
                            'attributes' => ['label'],
                        ],
                    ],
                ],
                'translationContents' => [
                    'classBehavior' => \open20\amos\translation\behaviors\TranslateableBehavior::className(),
                    'models' => [
                        ['namespace' => 'open20\amos\tag\models\Tag',
                            //'connection' => 'db', //if not set it use 'db'
                            //'classBehavior' => NULL,//if not set it use default classBehavior 'open20\amos\translation\behaviors\TranslateableBehavior'
                            'enableWorkflow' => FALSE, //if not set it use default configuration of the plugin
                            'attributes' => ['nome', 'descrizione'],
                            'plugin' => 'tag'
                        ],
                    ],
                ],
            ],
        ],
        'module_translation_labels' => 'translatemanager',
        'module_translation_labels_options' => ['roles' => ['ADMIN', 'CONTENT_TRANSLATOR'],
            'root' => [
                '@vendor/amos/',
                '@vendor/openinnovation/',
                '@vendor/',
                '@app',
                '@frontend',
                '@vendor/open20/',
            ],
        ], //all the options of the translatemanager
        'components' => [
            'translatemanager' => [
                'class' => 'lajax\translatemanager\Component'
            ],
        ],
        'defaultLanguage' => 'it-IT',
        'defaultUserLanguage' => 'it-IT',
        'pathsForceTranslation' => ['*'],
    ],
    'myactivities' => [
        'class' => 'open20\amos\myactivities\AmosMyActivities',
    ],
    'utility' => [
        'class' => 'open20\amos\utility\Module'
    ],
];
