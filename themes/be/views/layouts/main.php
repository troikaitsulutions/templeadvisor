<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
			
      
	$cs=Yii::app()->clientScript;
    $cssCoreUrl = $cs->getCoreScriptUrl();
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('jquery.ui');
	
	$cs->registerCssFile($backend_asset.'/css/stylesheets.css');
    //$cs->registerCssFile($backend_asset.'/css/stylesheet.css');
    $cs->registerCssFile($backend_asset.'/css/icons.css');
    $cs->registerCssFile($backend_asset.'/css/bootstrap.css');
    $cs->registerCssFile($backend_asset.'/css/bootstrap-responsive.css');
    $cs->registerCssFile($backend_asset.'/css/fullcalendar.css');
    $cs->registerCssFile($backend_asset.'/css/ui.css');
    $cs->registerCssFile($backend_asset.'/css/select2.css');
    $cs->registerCssFile($backend_asset.'/css/uniform.default.css');
    $cs->registerCssFile($backend_asset.'/css/validation.css');
    $cs->registerCssFile($backend_asset.'/css/mCustomScrollbar.css');
    $cs->registerCssFile($backend_asset.'/css/cleditor.css');
    $cs->registerCssFile($backend_asset.'/css/fancybox/jquery.fancybox.css');
    $cs->registerCssFile($backend_asset.'/css/login.css');
    //$cs->registerCssFile($backend_asset.'/css/fullcalendar.print.css');
    
    $cs->registerScriptFile($backend_asset.'/js/plugins/jquery/jquery.mousewheel.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/cookie/jquery.cookies.2.2.0.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/bootstrap.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/excanvas.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.js', CClientScript::POS_HEAD);    
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.stack.js', CClientScript::POS_HEAD);    
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.pie.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/charts/jquery.flot.resize.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/sparklines/jquery.sparkline.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/fullcalendar/fullcalendar.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/select2/select2.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/uniform/uniform.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/validation/languages/jquery.validationEngine-en.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/validation/jquery.validationEngine.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/animatedprogressbar/animated_progressbar.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($backend_asset.'/js/plugins/cleditor/jquery.cleditor.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/actions.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/charts.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/cookies.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/fancybox/jquery.fancybox.pack.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/dataTables/jquery.dataTables.min.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/plugins/cleditor/jquery.cleditor.js', CClientScript::POS_HEAD);
	$cs->registerScriptFile($backend_asset.'/js/backend.js', CClientScript::POS_HEAD);
    ?>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>
<div class="header"> <a class="logo" href="<?php echo bu().'/besite'; ?>"><img src="<?php echo $backend_asset; ?>/images/temple_adviser_logo.jpg" alt="Temple Adviser LLP" title="Temple Adviser LLP" /></a>
  <div class="ciao-address">
    <p> F2, Sai Vikruthi, #5015, 4th Street, <br/>
      Ram Nagar North, Puzhuthivakkam,<br/>
      Chennai, Tamil Nadu, India<br/>
      Phone: +91 44 42 11 99 06<br/>
      E-mail: info@templeadvisor.com </p>
  </div>
  <ul class="header_menu">
    <li class="list_icon"><a href="#">&nbsp;</a></li>
  </ul>
</div>
<div class="menu">
  <div class="breadLine">
    <div class="arrow"></div>
    <div class="adminControl active"> <?php echo t('Welcome'); ?>, <?php echo user()->getModel('display_name'); ?> </div>
  </div>
  <?php
  $user = User::model()->find(array('condition'=>"username='".Yii::app()->user->name."'"));
  if( isset($user) && count($user) ) { 
  if($user->avatar!='') $imageurl = 'http://temples.s3.amazonaws.com/peoples/thumb/'.$user->avatar; else $imageurl = 'http://temples.s3.amazonaws.com/peoples/thumb/default.jpg';
  } else {
  	$imageurl = 'http://temples.s3.amazonaws.com/peoples/thumb/default.jpg';
  }
  ?>
  <div class="admin">
    <div class="image"> <img src="<?php echo $imageurl; ?>" class="img-polaroid" width="50"/> </div>
    <ul class="control">
      
      <li><span class="icon-comment"></span> <a href="#"><?php echo t('Messages'); ?></a> <a href="#" class="caption red">12</a></li>
       <li><span class="icon-comment"></span> <a target="_blank" href="<?php echo FRONT_SITE_URL; ?>"><?php echo t('Visit Site'); ?></a> </li>
      <li><span class="icon-wrench"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/beuser/updatesettings"><?php echo t('Settings'); ?></a></li>
      <li><span class="icon-lock"></span> <a href="<?php echo Yii::app()->request->baseUrl?>/beuser/changepass"><?php echo t('Change Password'); ?></a></li>
      <li><span class="icon-share-alt"></span> <a href="<?php echo Yii::app()->request->baseUrl; ?>/besite/logout"><?php echo t('Logout'); ?></a></li>
    </ul>
    
  </div>
  <?php 
  
  		
		
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'navigation'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-power"></span><span class="text">'.t('Dashboard').'</span>', 'url'=>array('/besite/index') ,
                                   'active'=> ((Yii::app()->controller->id=='besite') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false
					    ),                               
					array('label'=>'<span class="isw-archive"></span><span class="text">'.t('Web Page').'</span>',  'url'=>'#','itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(

						array('label'=>'<span class="icon-file"></span><span class="text">'.t('Pages').'</span>', 'url'=>array('/bepage/admin')),
						array('label'=>'<span class="icon-share"></span><span class="text">'.t('Events Page').'</span>', 'url'=>array('/befevents/admin')),
						),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false, ),
												
						
					array('label'=>'<span class="isw-folder"></span><span class="text">'.t('Resource').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						
						array('label'=>'<span class="icon-ok-sign"></span><span class="text">'.t('Content Links').'</span>', 'url'=>array('/beclink/admin')),
					//	array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Nearest Things').'</span>', 'url'=>array('/benthings/admin')),
						array('label'=>'<span class="icon-ok-sign"></span><span class="text">'.t('Vehicles').'</span>', 'url'=>array('/bevehicles/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Newsletters').'</span>', 'url'=>array('/benewsletter/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Manage Mail Doc').'</span>', 'url'=>array('/bemaildoc/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Manage Slider').'</span>', 'url'=>array('/beslider/admin')),
						/*array('label'=>'<span class="isb-right"></span><span class="text">'.t('BackLink Groups').'</span>', 'url'=>array('/begroup/admin')),
						array('label'=>'<span class="icon-list-alt"></span><span class="text">'.t('Document Agreement').'</span>', 'url'=>array('/bedocagrrement/admin')),
						array('label'=>'<span class="icon-retweet"></span><span class="text">'.t('Feed Partners').'</span>', 'url'=>array('/befeedlist/admin')),*/
						array('label'=>'<span class="icon-retweet"></span><span class="text">'.t('Travel Agent').'</span>', 'url'=>array('/bevillaowner/taadmin'))
					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Pujas').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('All Puja\'s Purposes').'</span>', 'url'=>array('/bepujapurpose/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Puja Type').'</span>', 'url'=>array('/bepujatype/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Puja Logistics').'</span>', 'url'=>array('/bepujalogistic/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('All Pujas').'</span>', 'url'=>array('/bepoojalist/create')),
					    ),'visible'=>((user()->isAdmin)) ? true : false),
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Homam & Astro').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('All Homam Purposes').'</span>', 'url'=>array('/behomampurpose/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Homam List').'</span>', 'url'=>array('/behomamlist/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Asrology List').'</span>', 'url'=>array('/beastrology/create')),
					    ),'visible'=>((user()->isAdmin)) ? true : false),
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Tour Packages').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Vehicles').'</span>', 'url'=>array('/bevehicles/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Accomodations').'</span>', 'url'=>array('/beaccomodations/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Tour Category').'</span>', 'url'=>array('/betourcategory/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Tour Subcategory').'</span>', 'url'=>array('/betoursubcategory/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('All Tour Packages').'</span>', 'url'=>array('/betourpackage/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Tour Package Cost').'</span>', 'url'=>array('/betourcost/create')),    
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Itenary Hour Wise').'</span>', 'url'=>array('/beitinerarydetail/create')),    
					    ),'visible'=>((user()->isAdmin)) ? true : false),
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Products').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('All Products').'</span>', 'url'=>array('/beproduct/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Product Category').'</span>', 'url'=>array('/betcategory/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Product SubCategory').'</span>', 'url'=>array('/bepsubcategory/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Product Language').'</span>', 'url'=>array('/beplanguage/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Product Colors').'</span>', 'url'=>array('/bepcolor/create')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Product Materials').'</span>', 'url'=>array('/bepmaterial/create')),
					    ),'visible'=>((user()->isAdmin)) ? true : false),
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Locations').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Countries').'</span>', 'url'=>array('/becountry/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('State').'</span>', 'url'=>array('/bestate/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Districts').'</span>', 'url'=>array('/bedistrict/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Towns').'</span>', 'url'=>array('/betown/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Nearest States').'</span>', 'url'=>array('/benearstate/create'),
						)
						
					    ),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
						
						
						array('label'=>'<span class="isw-cloud"></span><span class="text">'.t('Region & Themes').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Region').'</span>', 'url'=>array('/bereg/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Themes Group').'</span>', 'url'=>array('/bethemes/admin')),
						array('label'=>'<span class="icon-map-marker"></span><span class="text">'.t('Themes List').'</span>', 'url'=>array('/bethemelist/admin'))
						
						
					    ),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
						
						
						
						array('label'=>'<span class="isw-empty_document"></span><span class="text">'.t('Temples Details').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Etiquettes').'</span>', 'url'=>array('/beetiquettes/create')),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Religion').'</span>', 'url'=>array('/bereligion/admin')),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Dieties').'</span>', 'url'=>array('/bediety/admin')),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Avatar').'</span>', 'url'=>array('/beavatar/admin')),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Posture').'</span>', 'url'=>array('/beposture/create')),
						array('label'=>'<span class="icon-qrcode"></span><span class="text">'.t('Festival & Events').'</span>', 'url'=>array('/befestivalevent/create')),
						array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('Info').'</span>', 'url'=>array('/betemples/admin')),
						array('label'=>'<span class="icon-flag"></span><span class="text">'.t('Temple Rank').'</span>', 'url'=>array('/beorder/admin'),
						)),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
						
						
						
						
						
						array('label'=>'<span class="isw-favorite"></span><span class="text">'.t('Attractions').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class=" icon-th-list"></span><span class="text">'.t('Facilities').'</span>', 'url'=>array('/beatfacility/create')),
						
						array('label'=>'<span class=" icon-th-list"></span><span class="text">'.t('Attractions Types').'</span>', 'url'=>array('/beattype/create')),
						array('label'=>'<span class=" icon-th-list"></span><span class="text">'.t('Attractions List').'</span>', 'url'=>array('/beatlist/create')),
						array('label'=>'<span class=" icon-leaf"></span><span class="text">'.t('Attractions Info').'</span>', 'url'=>array('/beatinfo/admin')),
						),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),
				 
					
					array('label'=>'<span class="isw-text_document"></span><span class="text">'.t('Spiritual Things').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-book"></span><span class="text">'.t('Overviews').'</span>', 'url'=>array('/beoverview/admin')),
					
						array('label'=>'<span class="icon-question-sign"></span><span class="text">'.t('Questions').'</span>', 'url'=>array('/beqans/create')),
						array('label'=>'<span class="icon-picture"></span><span class="text">'.t('Photo Title').'</span>', 'url'=>array('/bephototitle/create')),
						
						 
					
						),'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) || (user()->isWritter)) ? true : false,),	
						/*
						array('label'=>'<span class="isw-zoom"></span><span class="text">'.t('Availability &amp; Booking').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-search"></span><span class="text">'.t('Availability').'</span>', 'url'=>array('/bebooking/availability')),
						
						array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Bookings').'</span>', 'url'=>array('/bebooking/reserve'), )
						
					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,), 
						
						array('label'=>'<span class="isw-calc"></span><span class="text">'.t('Amenities Info').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-glass"></span><span class="text">'.t('Amenities Type').'</span>', 'url'=>array('/beamenitiestype/admin')),
						array('label'=>'<span class="icon-check"></span><span class="text">'.t('Amenities').'</span>', 'url'=>array('/beamenities/admin'), )
						
					    ) ,'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false, ), 
						
						
						array('label'=>'<span class="isw-tag"></span><span class="text">'.t('Tags').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-tags"></span><span class="text">'.t('Tags').'</span>', 'url'=>array('/betag/admin'),)
					    ) ,'visible'=>((user()->isSeo) || (user()->isOperator) || (user()->isAdmin) ) ? true : false, ), */
						
						array('label'=>'<span class="isw-list"></span><span class="text">'.t('Manage People').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					    'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('CMS Operator & Admin').'</span>', 'url'=>array('/bevillaowner/admin')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Travel Agent').'</span>', 'url'=>array('/betravelagent/create')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Supplier').'</span>', 'url'=>array('/besupplier/create')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Astrologer').'</span>', 'url'=>array('/beastrologer/admin')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Priest(Pooja)').'</span>', 'url'=>array('/bepujapriest/admin')),
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Priest(Homam)').'</span>', 'url'=>array('/behomampriest/admin')),
						array('label'=>'<span class="icon-tint"></span><span class="text">'.t('Category').'</span>', 'url'=>array('/becategory/create'), )
						
						
					    ) ,'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false, ), 
						
						
						
						array('label'=>'<span class="isw-chats"></span><span class="text">'.t('Manage'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'),
					       'items'=>array(
						array('label'=>'<span class="icon-comment"></span><span class="text">'.t('Reveiws').'</span>', 'url'=>array('/bereview/admin')),
						array('label'=>'<span class="icon-comment"></span><span class="text">'.t('Articles').'</span>', 'url'=>array('/bearticles/admin')),
						
					/*	array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('Enquiry').'</span>', 'url'=>array('beenquiry/admin')),	*/
						array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('General Enquiry').'</span>', 'url'=>array('begeneralenquiry/admin')),	
						array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('Business Enquiry').'</span>', 'url'=>array('bebusinessenquiry/admin')),
						array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('Testimonials').'</span>', 'url'=>array('betestimonials/admin')),	
						array('label'=>'<span class="icon-envelope"></span><span class="text">'.t('Subscribers').'</span>', 'url'=>array('besubscribers/admin')),	
						
						
						
					    ),'visible'=>( (user()->isOperator) || (user()->isAdmin) ) ? true : false,),
						
						
						
						/*
                        array('label'=>'<span class="isw-empty_document"></span><span class="text">'.t('Reports'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
						   'items'=>array(
							   array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('Properties').'</span>', 'url'=>array('/bereports/properties')),
							     array('label'=>'<span class="icon-calendar"></span><span class="text">'.t('Owners').'</span>', 'url'=>array('/bereports/Manageownerreport')),
							     array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Reservations').'</span>', 'url'=>array('/bereports/reservation')),
								  array('label'=>'<span class="icon-gift"></span><span class="text">'.t('Arrival').'</span>', 'url'=>array('/bereports/arrival')),
						),
							'visible'=>user()->isAdmin ? true : false,   
						),*/
						
						
					/*	
					array('label'=>'<span class="isw-users"></span><span class="text">'.t('User').'</span>', 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
					       'items'=>array(
						array('label'=>'<span class="icon-user"></span><span class="text">'.t('Create User').'</span>', 'url'=>array('/beuser/create')),
						array('label'=>'<span class="icon-eye-open"></span><span class="text">'.t('Manage Users').'</span>', 'url'=>array('/beuser/admin'),
						      ),
						array('label'=>'<span class="icon-th-large"></span><span class="text">'.t('Permission').'</span>', 'url'=>array('/rights/assignment'),'active'=>in_array(Yii::app()->controller->id,array('assignment','authItem')) ?true:false),
					    ),
                         'visible'=>user()->isAdmin ? true : false,   
					    ),
						
					*/	
                        array('label'=>'<span class="isw-settings"></span><span class="text">'.t('Settings'), 'url'=>'#', 'itemOptions'=>array('class'=>'openable'), 
                                           'items'=>array(
                                               array('label'=>'<span class="icon-wrench"></span><span class="text">'.t('General').'</span>', 'url'=>array('/besettings/general')),
                                               array('label'=>'<span class="icon-tasks"></span><span class="text">'.t('System').'</span>', 'url'=>array('/besettings/system')),
                                         
                                        ),
                                            'visible'=>user()->isAdmin ? true : false,   
                                        ),
										
						array('label'=>'<span class="isw-refresh"></span><span class="text">'.t('Caching').'</span>', 'url'=>array('/becaching/clear') ,
                                   'active'=> ((Yii::app()->controller->id=='becaching') && (in_array(Yii::app()->controller->action->id,array('index')))) ? true : false,'visible'=>user()->isAdmin ? true : false,   
					    ),  
						
				),
				
			));
		 ?>
</div>
<div class="content">
  <div class="breadLine"> 
    <!--
    <ul class="breadcrumb">
      <li><a href="#">Bookeasy</a> <span class="divider">></span></li>
      <li class="active">Dashboard</li>
    </ul>
    -->
   
  </div>
  <div class="workplace">
    <div class="row-fluid">
      <div class="span12">
        <div class="page-header">
          <?php if(isset($this->menu)) :?>
          <?php if(count($this->menu) >0 ): ?>
          <div class="header-info">
            <?php
                                       
                                        $this->widget('zii.widgets.CMenu', array(
                                                'items'=>$this->menu,
                                                'htmlOptions'=>array(),
                                        ));
                                       
                                ?>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <!--
          <h1><?php echo (isset($this->titleImage)&&($this->titleImage!=''))? '<img src="'.$backend_asset.'/'.$this->titleImage.'" />' : ''; ?><?php echo isset($this->pageTitle)? $this->pageTitle : '';  ?> <small>
            <?php if (isset($this->pageHint)&&($this->pageHint!='')) : ?>
            <?php echo "<br/>".$this->pageHint; ?>
            <?php endif; ?>
            </small></h1> --> 
        </div>
      </div>
    </div>
    <?php echo $content; ?> </div>
</div>
</div>

<!-- page -->

</body>
</html>
