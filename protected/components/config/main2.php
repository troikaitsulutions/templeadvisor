<?php

return CMap::mergeArray(
	 require(COMMON_FOLDER.'/config.php'),
	 array(
                'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
                'name' => 'MyCms',
                'defaultController'=>'besite',                               
				'components'=>array(                                                
                        
                        //Error Action when having Errors
                        'errorHandler'=>array(
                                // use 'site/error' action to display errors
                                'errorAction'=>'besite/error',
                        ),                        						
						
                       
                        
						// URL Format and Rewrite			
						'urlManager'=>array(
							'urlFormat'=>'path',
			                'showScriptName' =>false,
							'rules'=>array(       					                        							
			                  	'<controller:\w+>/<id:\d+>'=>'<controller>/index',
			                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>/<viewid:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>/<viewid:\w+>'=>'<controller>/<action>',
			                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
							),
						),
						
				 //User Componenets
			'user'=>array(
	            'class'=>'cms.components.user.GxcUser',
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
	            'loginUrl'=>FRONT_SITE_URL.'mycms/besite/login',                        
	            'stateKeyPrefix'=>'tt_system_user_front',
			),
			
			 //Auth Manager
	        'authManager'=>array(
	                'class'=>'common.modules.rights.components.RDbAuthManager',
	                'defaultRoles'=>array('Guest','Authenticated')
	        ),
			            	
				),
				'modules'=>array(
					// uncomment the following to enable the Gii tool
					
					'gii'=>array(
						'class'=>'system.gii.GiiModule',
						'password'=>'123456',
					 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
						'ipFilters'=>array('127.0.0.1','::1'),
						'generatorPaths'=>array('cms.gii',),
					),				          		   
			    ),
	)
);
