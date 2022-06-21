<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$isDev = App::env('CRAFT_ENVIRONMENT') === 'dev';
$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';

return [
    // Default Week Start Day (0 = Sunday, 1 = Monday...)
    'defaultWeekStartDay' => 1,

    // Whether generated URLs should omit "index.php"
    'omitScriptNameInUrls' => true,

    // The URI segment that tells Craft to load the control panel
    'cpTrigger' => App::env('CP_TRIGGER') ?: 'admin',

    // The secure key Craft will use for hashing and encrypting data
    'securityKey' => App::env('SECURITY_KEY'),

    // Whether Dev Mode should be enabled (see https://craftcms.com/guides/what-dev-mode-does)
    'devMode' => $isDev,

    // Whether administrative changes should be allowed
    'allowAdminChanges' => $isDev,

    // Whether crawlers should be allowed to index pages and following links
    'disallowRobots' => !$isProd,


    // Custom additions to the default version from craftcms/craft


    // Max No. of revisions
    'maxRevisions' => 10,

    // Whether uploaded filenames with non-ASCII characters should be converted to ASCII
    'convertFilenamesToAscii' => true,

    //Whether non-ASCII characters in auto-generated slugs should be converted to ASCII
    'limitAutoSlugsToAscii' => true,

    // Whether images transforms should be generated before page load.
    'generateTransformsBeforePageLoad' => true,

    // Whether Craft should optimize images for reduced file sizes without noticeably reducing image quality
    'optimizeImageFilesize' => false,

    // Whether asset URLs should be revved so browsers don’t load cached versions when they’re modified.
    'revAssetUrls' => true,

    // Whether to enable Craft's template {% cache %} tag on a global basis
    'enableTemplateCaching' => $isProd,

    // use JavaScript lib to preserve scroll positions in preview
    'useIframeResizer' => true,

    'aliases' => [

        // Prevent the @web alias from being set automatically (avoid cache poisoning vulnerability)
        '@web' => App::env('PRIMARY_SITE_URL'),

        // Lets `./craft clear-caches all` clear CP resources cache
        '@webroot' => dirname(__DIR__) . '/web',

    ],
];
