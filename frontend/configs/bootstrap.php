<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */

$bootstrap = [];
$bootstrap[] = 'log';
$bootstrap[] = 'cms';
$bootstrap[] = 'design';
$bootstrap[] = 'layout';
$bootstrap[] = 'workflow';
$bootstrap[] = 'backendobjects';
$bootstrap[] = 'elasticsearch';
$bootstrap[] = 'amosadmin';
$bootstrap[] = 'socialauth';
$bootstrap[] = 'seo';

/*$bootstrap[] = [
    'class' => 'open20\amos\core\components\LanguageSelector',
    'supportedLanguages' => ['en-GB', 'it-IT'],
    'allowedIPs' => ['*']
];*/

return $bootstrap;
