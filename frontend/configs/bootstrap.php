<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */
$bootstrap   = [];
$bootstrap[] = 'open20\amos\core\bootstrap\Breadcrumb';
$bootstrap[] = 'log';
$bootstrap[] = 'cms';
$bootstrap[] = 'design';
$bootstrap[] = 'layout';
$bootstrap[] = 'workflow';
$bootstrap[] = 'backendobjects';
// $bootstrap[] = 'elasticsearch';
$bootstrap[] = 'amosadmin';
$bootstrap[] = 'socialauth';
$bootstrap[] = 'seo';
$bootstrap[] = 'frontend\bootstrap\AddGoogleTagManager';

/* $bootstrap[] = [
  'class' => 'open20\amos\core\components\LanguageSelector',
  'supportedLanguages' => ['en-GB', 'it-IT'],
  'allowedIPs' => ['*']
  ]; */

function pr($var, $info = '', $depth = 10)
{
    if (!defined('PR')) {
        define('PR', true);
    }
    if ($info) {
        $info = "<strong>$info: </strong>";
    }
    $debug  = debug_backtrace(0);
    $result = "<strong>".$debug[0]['file']." ".$debug[0]['line']."</strong><br /> $info <br />";
    print_r($result).\yii\helpers\VarDumper::dump($var, $depth, true);
}
return $bootstrap;
