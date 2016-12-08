<?php
 error_reporting( E_ALL );
 ini_set("error_reporting", E_ALL);

ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
// remove the following lines when in production mode
 defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// Set the constant for the FRONT_STORE Directory
// Don't change if you are not sure
$cms_version='1.0';

//You need to specify the path to CORE FOLDER CORRECTLY
define('CORE_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'core');
define('COMMON_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'common');
define('RESOURCES_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'resources');
define('THUMBS_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'thumbs');
define('AVATAR_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'avatar');
define('CMS_FOLDER',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('CMS_WIDGETS',CMS_FOLDER.DIRECTORY_SEPARATOR.'widgets');
define('FRONT_END',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('FRONT_STORE',dirname(__FILE__));
define('BACK_END',dirname(__FILE__).DIRECTORY_SEPARATOR.'protected');
define('BACK_STORE',dirname(__FILE__));
define('BACK_WIDGET',BACK_STORE.DIRECTORY_SEPARATOR.'widgets');

//require( dirname(__FILE__).'/blog/wp-blog-header.php' );
//define('WP_USE_THEMES', false);



// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$globals=COMMON_FOLDER.'/globals.php';
$mTemplate=COMMON_FOLDER.'/email_template.php';
$mCamp=COMMON_FOLDER.'/email_campaigner.php';
$define=COMMON_FOLDER.'/define.php';
$config=FRONT_END.'/config/main.php';

//echo Yii::getLogger()->getMemoryUsage();
require_once($yii);
require_once($globals);
require_once($mTemplate);
require_once($mCamp);
require_once($define);


Yii::createWebApplication($config)->run();



