<?php

Yii::app()->setTimeZone(APP_TIMEZONE);
Yii::setPathOfAlias('common',COMMON_FOLDER);
Yii::setPathOfAlias('cms',CMS_FOLDER);
Yii::setPathOfAlias('frontend',FRONT_END);
Yii::setPathOfAlias('cmswidgets',CMS_WIDGETS);


return array(
	
	'id'=> SITE_NAME,
	//Edit more information for your site here
	'name'=> SITE_NAME ,        
    'sourceLanguage'=>'en',
    
	
	// preloading 'log' component
	'preload'=>array('log','translate'),

	// autoloading model and component classes
        // autoloading from the CMS and Common Folder
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'cms.components.*',
        'cms.extensions.*',
    
        //Import Specific CMS classes for CMS 
        'cms.components.user.*',
        'cms.components.object.*',
        'cmswidgets.*',    
        'cmswidgets.object.*',                
            
        //Import Common Classes                    
        'common.components.*',                                      
        'common.extensions.*',
        'common.models.*',                      
        'common.modules.*',
        'common.storages.*',
		'common.extensions.s3.S3',
		          
        'common.models.object.*',
        'common.models.resource.*',
        'common.models.page.*',
		'cms.models.user.*',
        'common.models.settings.*',
		        
        //Translate Module
        'common.modules.translate.TranslateModule',
        'common.modules.translate.controllers.*',
        'common.modules.translate.models.*',
        
		//Yii Mail Extensions
		'common.extensions.yii-mail.*',
		
        //Import Rights Modules
        'common.modules.rights.*',
        'common.modules.rights.models.*',
        'common.modules.rights.components.*',
        'common.modules.rights.RightsModule',                            
	),
	'modules'=>array(


		
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
		               
    //Import Translate Module
    'translate'=>array(
            'class'=>'common.modules.translate.TranslateModule',
    ),
        
	
    //Modules Rights
    'rights'=>array(
            'class'=>'common.modules.rights.RightsModule',
            'install'=>false,	// Enables the installer.
            'appLayout'=>'application.views.layouts.main',
            'superuserName'=>'Admin'
        ),               
                    
	),

	// application components
	'components'=>array(
		
		
	
			'file'=>array(
        		'class'=>'common.extensions.file.CFile',
   			 	),
	         
			 //Curl 
			 'curl' => array(
			    'class' => 'common.extensions.curl.Curl',
           		'options' => array(),
       		 ),        
			//Edit your Database Connection here	
			//Use MySQL database		
			'db'=>array(
	                'connectionString' => 'mysql:host=localhost;dbname=stagingt_db',
	                'schemaCachingDuration' => 3600,
	                'emulatePrepare' => true,
	                'username' => 'stagingt_root',
	                'password' => 'LmtxGW0)9fsC',
	                'charset' => 'utf8',
	                'tablePrefix' => 'tt_'
	            ),
                 
	       
			
			'mail' => array(
        		'class' => 'common.extensions.yii-mail.YiiMail',
        		'transportType'=>'php',
        		'viewPath' => '',
				'logging' => true,
	 			'dryRun' => false        		
			),
	        
	       
	            
            //Use Cache System by File
            'cache'=>array(
                'class'=>'system.caching.CFileCache',
            ),
                
            //Use the Settings Extension and Store value in Database
            'settings'=>array(
                'class'     => 'cms.extensions.settings.CmsSettings',
                'cacheId'   => 'global_website_settings',
                'cacheTime' => 84000,
            ),
			
		    's3'=>array(
        		'class'=>'common.extensions.s3.ES3',
        		'aKey'=>'AKIAJXPUR4ELSK7SYGLA',//'AKIAISFYPZMGV3KY2PXQ',//'AKIAI2M2LDTSZSPCKEAQ', //AKIAJGDENSYQ6TFPJABA, 
        		'sKey'=>'BopG4ocv+Hg5NTL/tRycYZc13196NtaptepUEnK+',//'AZi/mm8vq64TvKuRGa+guPJy8CSdQbXPaFlUI/Wf',//'2DLlX5Us1eX+8+G501H79DfrxRTJVImKc0GpiQ1S', //BIi8FkAP/uZBI1D5i1h+in4xWmOSAfoRG1x7b1XF,
    	   ),
		   
		   'phpThumb'=>array(
    			'class'=>'common.extensions.EPhpThumb.EPhpThumb',
    			'options'=>array(),
		   ),
                			
		 'simpleImage'=>array(
                        'class' => 'common.extensions.resizeImage.CSimpleImage',
                ),
		/* 
        //Use Session Handle in Database
        'session' => array(
                'class' => 'CDbHttpSession',
                'connectionID' => 'db',
                'autoCreateSessionTable'=>true,
                'sessionTableName'=>'tt_session',
        ),
		 * 
		 */
            

        //Error Action when having Errors
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
                
        //Log the Site Error, Warning and Store into File
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				 * 
				 */
				
			),
		),
                
        // Use Message in Database and Translate Components
        'messages'=>array(
            'class'=>'CDbMessageSource',
            'sourceMessageTable'=>'tt_source_message',
            'translatedMessageTable'=>'tt_translated_message',
            'onMissingTranslation' => array('TranslateModule', 'missingTranslation'),
        ),
                
        'translate'=>array(
            'class'=>'common.modules.translate.components.MPTranslate',
            //any avaliable options here
            'acceptedLanguages'=>array(
                'en'=>'English'                                                                           
            ),
        ),
                
        //Enable Cookie Validation and Csrf Validation
        'request'=>array(
            'class'=>'HttpRequest',
            'enableCookieValidation'=>true,
            'enableCsrfValidation'=> true,
            'noCsrfValidationRoutes'=>array('site/caching')
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    // Don't use this, use the settings Components
	'params'=>array(
		'page_url'=>'',
		'adminEmail'=>'info@templeadvisor.com',
		
	),
);
