<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */

/**
 */

return [
    //old TODO CHECK
    'user.passwordResetTokenExpire' => 86400,
    'loginTimeout' => 3600 * 3, //3 Hours
    'forceUpdateUrlTranslations' => false,
    'forms-purify-data' => true,
    'disableBulletCounters' => false,
    'supportEmail' => 'helpfrontend@example.com',
    'dashboardEngine' => 'rows',
    //new
    'befe' => true,
    'assistance' => [
        'enabled' => true,
        'type' => 'mail',
        'email' => 'ticket@test.example.it',
        'url' => ''
    ],
    'favicon' => '/img/faviconRL.png',
    'logoMail' => '/img/RL_logo.png',
    'logoConfigurations' => [
        'firstLogo' => [
            'logoImg' => '/img/RL_logo.png',
            'logoAlt' => 'logo Regione Lombardia',
            'logoUrl' => 'https://www.regione.lombardia.it/',
            'logoUrlTarget' => '_blank',
            'logoTitle' => 'Vai al portale di Regione Lombardia',
            'logoClass' => 'd-md-block logo-RL-design',
        ],
        'secondLogo' => [
            'logoText' => 'Open 2.0',
            'logoUrl' => '/site/to-menu-url?url=/',
            'logoTitle' => 'Vai alla homepage di Open 2.0',
            'logoClass' => 'logo-text-platform-design',
        ],
        'topLogo' => [
            'logoImg' => '/img/RL_logo_bianco.png',
            'logoAlt' => 'logo Regione Lombardia',
            'logoClass' => 'd-xs-block d-md-none logo-RL-top-design',
            'positionTop' => true,
            'logoUrl' => 'https://www.regione.lombardia.it/',
            'logoTitle' => 'Vai al portale di Regione Lombardia',
            'logoUrlTarget' => '_blank'
        ]
    ],
    'linkConfigurations' => [
        'privacyPolicyLinkCommon' => '/privacy-policy',
        'cookiePolicyLinkCommon' => '/cookie-policy',
        'loginLinkCommon' => '/login',
        'logoutLinkCommon' => '/site/logout',
        'pageSearchLinkCommon' => '/ricerca'
    ],
    'layoutConfigurations' => [
        'hideCmsMenuPluginHeader' => true,
        'showAlwaysHamburgerMenuHeader' => true,
        'enableBtnModifyCmsPage' => true
    ],
    'menuCmsConfigurations' => [
        
    ],
    'layoutMailConfigurations' => [
        'logoMail' => [
            'logoImg' => 'img/RL_logo.png',
            'logoImgAlt' => 'logo Regione Lombardia',
            'logoImgWidth' => '194', //not insert px string
            'logoImgHeight' => '54', //not insert px string
            'logoText' => 'Open 2.0'
        ],
        'bgPrimary' => '#297a38',
        'bgPrimaryDark' => '#1c5426', //darken 10% primary
        'textContrastBgPrimary' => '#FFFFFF',
        'textContrastBgPrimaryDark' => '#FFFFFF'
    ]
];
