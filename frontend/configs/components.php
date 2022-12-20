<?php
/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */
require(__DIR__.'/../modules/cms/logger/formatter/LineFormatter.php');

$psrLogger    = new \Monolog\Logger('logger');
$psrHandler   = new \Monolog\Handler\RotatingFileHandler(__DIR__.'/../runtime/logs'.'/app_'.date('Y-m-d').'.log', 5,
    \Monolog\Logger::DEBUG);
$psrFormatter = new \app\modules\cms\logger\formatter\LineFormatter(null, 'Y-m-d H::i::s', true);
$psrFormatter->includeStacktraces();
$psrHandler->setFormatter($psrFormatter);
$psrLogger->pushHandler($psrHandler);
$psrLogger->pushProcessor(new \Monolog\Processor\PsrLogMessageProcessor());

return [
    'log' => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets' => [
            [
                'class' => 'samdark\log\PsrTarget',
                'logger' => $psrLogger,
                // It is optional parameter. The message levels that this target is interested in.
                // The parameter can be an array.
                'levels' => [Psr\Log\LogLevel::CRITICAL, yii\log\Logger::LEVEL_ERROR],
                // It is optional parameter. Default value is false. If you use Yii log buffering, you see buffer write time, and not real timestamp.
                // If you want write real time to logs, you can set addTimestampToContext as true and use timestamp from log event context.
                'addTimestampToContext' => true,
            ],
        ],
    ],
    'assetManager' => [
        'appendTimestamp' => true,
        'forceCopy' => false,
        'hashCallback' => function ($path) {
            return hash('md4', $path);
        },
        'converter' => [
            'class' => 'nizsheanez\assetConverter\Converter',
            'force' => false,
            'destinationDir' => 'compiled', //at which folder of @webroot put compiled files
            'parsers' => [
                'sass' => [// file extension to parse
                    'class' => 'nizsheanez\assetConverter\Sass',
                    'output' => 'css', // parsed output file type
                    'options' => [
                        'cachePath' => '@app/runtime/cache/sass-parser' // optional options
                    ],
                ],
                'scss' => [// file extension to parse
                    'class' => 'open20\amos\core\converters\Scss',
                    'output' => 'css', // parsed output file type
                    'options' => [
                        'importPaths' => [
                            '@vendor/open20/design/src/assets',
                            '@common/web'
                        ], // import paths, you may use path alias here,
                        // e.g., `['@path/to/dir', '@path/to/dir1', ...]`
                        'enableCompass' => false,
                        'lineComments' => false, // if true — compiler will place line numbers in your compiled output
                        'outputStyle' => 'expanded', // May be `compressed`, `crunched`, `expanded` or `nested`,
                    // see more at http://sass-lang.com/documentation/file.SASS_REFERENCE.html#output_style
                    ],
                ],
                'less' => [// file extension to parse
                    'class' => 'nizsheanez\assetConverter\Less',
                    'output' => 'css', // parsed output file type
                    'options' => [
                        'importDirs' => [], // import paths, you may use path alias here ex. '@app/assets/common/less'
                        'auto' => true, // optional options
                    ]
                ]
            ]
        ],
    ],
    'authManager' => [
        'class' => 'open20\amos\core\rbac\DbManagerCached',
        'cache' => 'rbacCache'
    ],
    'composition' => [
        'hidden' => false, // no languages in your url (most case for pages which are not multi lingual)
        'pattern' => '<langShortCode:[a-z]{2}>',
        'default' => ['langShortCode' => 'it'], // the default language for the composition should match your default language shortCode in the language table.
    ],
    'errorHandler' => [
        'class' => 'app\modules\cms\error\ErrorHandler',
    ],
    'storage' => [
        'class' => 'app\modules\cms\storage\AmosFileSystem',
        'whitelistMimeTypes' => ['text/plain', 'image/svg+xml'], // as this is the mime type for csv files
    ],
    'translatemanager' => [
        'class' => 'lajax\translatemanager\Component'
    ],
    'urlManager' => [
        'class' => 'app\modules\cms\base\UrlManager',
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            'site/login' => 'site/login',
            'site/logout' => 'site/logout',
            'site/to-menu-url' => 'site/to-menu-url',
            'site/privacy' => 'site/privacy-policy',
            //'img/<file:.*>' => 'files/img',
            '<module:\w+>/<controller:\w+>/<id:\d+>/<title:.*?>' => '<module>/<controller>/view',
        ]
    ],
    'view' => [
        'class' => 'app\modules\cms\base\CmsView',
        'theme' => [
            'pathMap' => [
                '@vendor/luyadev/luya-module-admin/src/views/layouts' => '@frontend/modules/cms/views/layouts',
                '@vendor/luyadev/luya-module-cms/src/admin/views/page' => '@frontend/modules/cms/views/page',
                '@vendor/luyadev/luya-module-admin/src/views/template' => '@frontend/modules/cms/views/template',
            ],
        ],
    ],
    'adminuser' => [
        'class' => 'app\modules\cms\components\AdminUser',
        'defaultLanguage' => 'it',
        'enableAutoLogin' => true,
        'identityCookie' => [
            'name' => '_identity-luya',
            'httpOnly' => true,
            'secure' => true,
            'domain' => ".demotestwip.it",
        ],
    ],
    'request' => [
        'csrfParam' => '_csrf_admin',
    ],
    'response' => [
        'class' => 'open20\amos\core\response\Response',
        'cspDirectives' => [
            'default-src' => "'self' 'unsafe-inline' google-analytics.com *.google-analytics.com use.fontawesome.com *.use.fontawesome.com *.googleapis.com cdn.jsdelivr.net *.jsdelivr.net *.juicer.io fonts.gstatic.com *.googletagmanager.com  consent.cookiebot.com *.jquery.com",
            'connect-src' => "'self' 'unsafe-inline' google-analytics.com *.google-analytics.com consent.cookiebot.com consentcdn.cookiebot.com blob: cdn.jsdelivr.net *.jsdelivr.net *.juicer.io maps.googleapis.com",
            'img-src' => "'self' 'unsafe-inline' data: blob: a4f6d9.emailsp.com *.emailsp.com *.ariaspa.it img.youtube.com *.youtube.com *.juicer.io maps.googleapis.com maps.gstatic.com streetviewpixels-pa.googleapis.com *.googleapis.com lh3.ggpht.com",
            'script-src' => "'self' 'unsafe-inline' 'unsafe-eval' meet.test.demotestwip.it *.googletagmanager.com google-analytics.com *.google-analytics.com use.fontawesome.com *.use.fontawesome.com cdnjs.cloudflare.com *.googletagmanager.com *.google.com *.gstatic.com *.juicer.io consent.cookiebot.com consentcdn.cookiebot.com *.jquery.com maps.googleapis.com",
            'style-src' => "'self' 'unsafe-inline' use.fontawesome.com *.usse.fontawesome.com cdn.jsdelivr.net *.googleapis.com *.juicer.io consent.cookiebot.com www.gstatic.com",
            'frame-src' => "'self' 'unsafe-inline' meet.test.demotestwip.it *.youtube.com player.vimeo.com *.google.com *.cookiebot.com",
        ],
        'frameLevel' => 1,
        'frameAllowFrom' => 'https://www.youtube.com/',
    ],
];

