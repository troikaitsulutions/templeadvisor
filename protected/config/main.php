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
								'sitemap'=>'site/sitemap',
								'general-enquiry'=>'site/generalenquiry',
								'business-enquiry'=>'site/businessenquiry',
								'disclaimer'=>'site/disclaimer',
								'email-subscribe'=>'site/subscribeemail',
								'privacy-policy'=>'site/privacypolicy',
								'write-your-reviews'=>'site/writereviews',
								'online-puja-request'=>'site/onlinepooja',
								'traveler-registration-form'=>'site/registrationform',
								'terms-of-use'=>'site/termsconditions',
								'historical-and-religious-overview/<list:[0-9a-zA-Z_\-]+>'=>'overview/index',
								'contribute-my-article'=>'site/contributemyarticle',
								'temple-articles'=>'articles/index',
								'temple-articles/<article:[0-9a-zA-Z_\-]+>'=>'articles/articleread',
								
								'<country:temples-in-[0-9a-zA-Z_\-]+>'=>'temples/index',
								
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<region:[0-9a-zA-Z_\-]+-india-temples>'=>'temples/list',
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<region:[0-9a-zA-Z_\-]+-india-temples>/<id:\d+>'=>'temples/list',
								
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<religion:[0-9a-zA-Z_\-]+-temples>'=>'temples/byreligion',
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<religion:[0-9a-zA-Z_\-]+-temples>/<id:\d+>'=>'temples/byreligion',
								
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<theme:list-by-[0-9a-zA-Z_\-]+>'=>'temples/bytheme',
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<theme:list-by-[0-9a-zA-Z_\-]+>/<id:\d+>'=>'temples/bytheme',
								'<country:temples-in-[0-9a-zA-Z_\-]+>/<religion:[0-9a-zA-Z_\-]+-temples>/<tid:[0-9a-zA-Z_\-]+>'=>'temples/detail',
								
								'<country:tours-around-india>'=>'tours/index',
								'<country:tours-around-india>/<scategory:[0-9a-zA-Z_\-]+-india-tour-packages>'=>'tours/list',
								'<country:tours-around-india>/<scategory:[0-9a-zA-Z_\-]+-india-tour-packages>/<id:\d+>'=>'tours/list',
								
								'<pooja:online-pujas>'=>'poojas/index',
								'<pooja:online-pujas>/<pcategory:[0-9a-zA-Z_\-]+>'=>'poojas/list',
								'<pooja:online-pujas>/<pcategory:[0-9a-zA-Z_\-]+>/<id:\d+>'=>'poojas/list',
								
								'<pooja:online-pujas>/<pcategory:[0-9a-zA-Z_\-]+>/<pid:[0-9a-zA-Z_\-]+>'=>'poojas/detail',
								
								'<homam:online-homams>'=>'homams/list',
								'<homam:online-homams>/<id:\d+>'=>'homams/list',
								
								'<store:online-store>'=>'store/index',
								'<store:online-store>/<pcategory:[0-9a-zA-Z_\-]+>'=>'store/list',
								'<store:online-store>/<pcategory:[0-9a-zA-Z_\-]+>/<id:\d+>'=>'store/list',								
								
								/*
								'tours-in-india'=>'tours/index',
								'online-pujas-temples'=>'poojas/index',
								'online-homam'=>'homams/list',
								'online-store'=>'store/index',
								'testimonials'=>'testimonialsread/index',
								'plan-your-trip'=>'planyourtrip/index',
								'photo-gallery'=>'temples/gallery',
								'photo-gallery/<prop_id:\d+>'=>'temples/gallery',
								
								'<temples:temples-in-india>/<region:[0-9a-zA-Z_\-]+-india-temples>'=>'temples/list',
								'<temples:temples-in-india>/<themes:theme-[0-9a-zA-Z_\-]+>'=>'temples/bytheme',
								
								'temples/list-by-deity'=>'temples/bytheme',
								'temples/list-by-history-heritage'=>'temples/bythemehistory',
								'temples/list-by-beliefs'=>'temples/bythemebeliefs',
								'temples/list-by-region'=>'temples/byregion',
								'temples/list-by-map'=>'temples/bymap',
								'articles'=>'articles/index',
								'reviews'=>'reviews/index',
								'user-articles/<aid:\d+>'=>'articles/articleread',
								'featured-events/<eid:\w+>'=>'site/fevents',
								*/
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
