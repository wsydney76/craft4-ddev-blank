<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\config\GeneralConfig;
use craft\helpers\App;

$isDev = App::env('CRAFT_ENVIRONMENT') === 'dev';
$isProd = App::env('CRAFT_ENVIRONMENT') === 'production';

return GeneralConfig::create()
	->defaultWeekStartDay(1)
	->omitScriptNameInUrls(true)
	->cpTrigger('admin')
	->devMode($isDev)
	->allowAdminChanges($isDev)
	->preventUserEnumeration(true)
	->disallowRobots(!$isProd)
	->maxRevisions(10)
	->convertFilenamesToAscii(true)
	->limitAutoSlugsToAscii(true)
	->generateTransformsBeforePageLoad(true)
	->optimizeImageFilesize(false)
	->revAssetUrls(true)
	->enableTemplateCaching($isProd)
	->useIframeResizer(true)
	->aliases([
		// Prevent the @web alias from being set automatically (avoid cache poisoning vulnerability)
		'@web' => App::env('PRIMARY_SITE_URL'),

		// Lets `./craft clear-caches all` clear CP resources cache
		'@webroot' => dirname(__DIR__) . '/web',

	]);
