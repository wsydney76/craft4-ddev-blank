<?php
namespace modules\main;

use Craft;
use yii\base\Module;

/**
 * Custom module class.
 *
 * This class will be available throughout the system via:
 * `Craft::$app->getModule('my-module')`.
 *
 * You can change its module ID ("my-module") to something else from
 * config/app.php.
 *
 * If you want the module to get loaded on every request, uncomment this line
 * in config/app.php:
 *
 *     'bootstrap' => ['my-module']
 *
 * Learn more about Yii module development in Yii's documentation:
 * http://www.yiiframework.com/doc-2.0/guide-structure-modules.html
 */
class MainModule extends Module
{
    /**
     * Initializes the module.
     */
    public function init()
    {
        // Set a @modules alias pointed to the modules/ directory
        Craft::setAlias('@modules', __DIR__);

        // Set the controllerNamespace based on whether this is a console or web request
        if (Craft::$app->getRequest()->getIsConsoleRequest()) {
            $this->controllerNamespace = 'modules\\main\\console\\controllers';
        } else {
            $this->controllerNamespace = 'modules\\main\\controllers';
        }

        parent::init();

        // Custom initialization code goes here...

        // Prevent password managers like Bitdefender Wallet from falsely inserting credentials into user form
        Craft::$app->view->hook('cp.users.edit.content', function(array &$context) {
            return '<input type="text" name="dummy-first-name" value="wtf" style="display: none">';
        });
    }
}
