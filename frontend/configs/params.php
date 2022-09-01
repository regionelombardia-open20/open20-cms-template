<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\basic\template
 * @category   CategoryName
 */

$googleMapsApiKey = 'CHANGE_WITH_YOUR_KEY';

return [
    'versione' => '1.0.0',
    'user.passwordResetTokenExpire' => 86400*7,
    'google-maps' => [
        'key' => $googleMapsApiKey
    ],
    'googleMapsApiKey' => $googleMapsApiKey,
    'google_recaptcha_site_key' => '6LdI3dMZAAAAAJl9K51R5hU034jksuFOblYgFnUX',
    'google_recaptcha_secret' => '6LdI3dMZAAAAAB-OeoJA1dGAUkxrWVo_WIBKOdkB',
    'noWizardNewLayout' => true,
    'menuModules' => [
        'amosadmin',
        'tag',
        'chrono',
        'cmsbridge'
    ],
    'befe' => true,
    'enablePositionalBreadcrumb' => true,
];
