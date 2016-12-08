<?php

return CMap::mergeArray(
	 require(COMMON_FOLDER.'/config.php'),
	 array(
                'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
                'name' => 'Temple Advisor',
                'defaultController'=>'site',                               
				'components'=>array(                                                
                        
                        //Error Action when having Errors
                        'errorHandler'=>array(
                                // use 'site/error' action to display errors
                                'errorAction'=>'site/error',
                        ),                        						
						
						'browser' => array(
							'class' => 'common.extensions.browser.CBrowserComponent',
						),   
                       
						// URL Format and Rewrite			
						'urlManager'=>array(
							'urlFormat'=>'path',
			                'showScriptName' =>false,
							'rules'=>array(       					                        							
			                  	'aboutus'=>'site/aboutus',
								'general-enquiry'=>'site/generalenquiry',
								'business-enquiry'=>'site/businessenquiry',
								'disclaimer'=>'site/disclaimer',
								'privacy-policy'=>'site/privacypolicy',
								'write-your-reviews'=>'site/writereviews',
								'terms-and-conditions'=>'site/termsconditions',
								'historical-and-religious-overview/<list:[0-9a-zA-Z_\-]+>'=>'overview/index',
								'contribute-my-article'=>'site/contributemyarticle',
								'testimonials'=>'testimonialsread/index',
								'photo-gallery'=>'temples/gallery',
								'temples/list-by-deity'=>'temples/bytheme',
								'temples/list-by-history-heritage'=>'temples/bythemehistory',
								'temples/list-by-beliefs'=>'temples/bythemebeliefs',
								'articles-and-reviews'=>'articlesreviews/list',
								'articles-and-reviews/<aid:\d+>'=>'articlesreviews/articleread',
								'<controller:\w+>/<id:\d+>'=>'<controller>/index',
			                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/page/<page:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>/<viewid:\d+>'=>'<controller>/<action>',
								'<controller:\w+>/<action:\w+>/<id:\d+>/<view:\w+>/<viewid:\w+>'=>'<controller>/<action>',
			                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
							),
						),
						'ePdf' => array(
							'class'         => 'common.extensions.yii-pdf.EYiiPdf',
							'params'        => array(
								'mpdf'     => array(
									'librarySourcePath' => 'common.pdftest.mpdf.*',
									'constants'         => array(
										'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
									),
									'class'=>'mpdf'
								),
								'mpdf1'     => array(
									'librarySourcePath' => 'common.pdftest.mpdf.*',
									'constants'         => array(
										'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
									),
									'class'=>'mpdf1'
								),
								'HTML2PDF' => array(
									'librarySourcePath' => 'common.pdftest.html2pdf.*',
									'classFile'         => 'html2pdf.class.php'
								)
							),
						),
						
				 //User Componenets
			'user'=>array(
	            'class'=>'cms.components.user.GxcUser',
				// enable cookie-based authentication
				'allowAutoLogin'=>true,
	            'loginUrl'=>FRONT_SITE_URL.'besite/login',                        
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
