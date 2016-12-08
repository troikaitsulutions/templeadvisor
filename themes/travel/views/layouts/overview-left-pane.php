<?php
 		$overview_js = "
	
$('.koalapse').koalapse();

";

Yii::app()->clientScript->registerScript('overview1', $overview_js);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery-1.11.1.min.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/koalapse.js', CClientScript::POS_HEAD);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/koalapse.css');
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/main.css');
			
?>

<div class="tmp_photo-region_left">
  <h3><?php echo t('Overview'); ?> <img alt="Overview" src="<?php echo $layout_asset; ?>/images/bell-icon.png"></h3>
  <div class="koalapse koalapse-layout">
    <?php 
				$overviews1 = Overview::model()->findByPk(1513);
				
				if(isset($overviews1) && count($overviews1)>0 ) {
					
				
						
						$seo1 = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overviews1->uid)));
			?>
    <h2><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo1->slug))?>"><?php echo $overviews1->title; ?></a></h2>
    <?php } ?>
  
    <?php 
				$overviews2 = Overview::model()->findByPk(1514);
				
				if(isset($overviews2) && count($overviews2)>0 ) {
					
				
						
						$seo2 = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overviews2->uid)));
			?>
    <h2><a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo2->slug))?>"><?php echo $overviews2->title; ?></a></h2>
    <?php } ?>
   
    <h3 class="koalapse__title"><img alt="Overview" src="<?php echo $layout_asset; ?>/images/hindu1.jpg">Hindu</h3>
    <div class="koalapse__content">
      <ul>
        <?php 
				$overviews = Overview::model()->findAll(array('condition'=>'status=1 AND  id != 1513 AND id !=1514','params'=>array(':UID'=>$meta->uid)));
				
				if(isset($overviews) && count($overviews)>0 ) {
					
					foreach ($overviews as $overview) {
						
						$seo = Seo::model()->find(array('condition'=>'uid=:UID','params'=>array(':UID'=>$overview->uid)));
			?>
        <a href="<?php echo Yii::app()->createUrl('overview/index',array('list'=>$seo->slug))?>">
        <li> <?php echo $overview->title; ?></li>
        </a>
        <?php } } ?>
      </ul>
    </div>
    <h3 class="koalapse__title"><img alt="Overview" src="<?php echo $layout_asset; ?>/images/jain1.jpg">Jain</h3>
    <div class="koalapse__content"> 
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nam illum ipsum corporis voluptatibus, perspiciatis possimus vitae consequuntur. Voluptate quisquam reprehenderit sapiente cupiditate esse, consequuntur vel dicta culpa dolorem rerum.</p>--> 
    </div>
    <h3 class="koalapse__title"><img alt="Overview" src="<?php echo $layout_asset; ?>/images/buddhist1.jpg">Buddhist</h3>
    <div class="koalapse__content"> 
      <!-- <p>Lorem ipsum dolor sit amet, <a href="#" title="An exemple link inside the content">consectetur</a> adipisicing elit. Cum nam illum ipsum corporis voluptatibus, perspiciatis possimus vitae consequuntur. <a href="#" title="An exemple link inside the content">consectetur</a> Voluptate quisquam reprehenderit sapiente cupiditate esse, consequuntur vel dicta culpa dolorem <a href="#" title="An exemple link inside the content">consectetur</a> rerum.</p>--> 
    </div>
    <h3 class="koalapse__title"><img alt="Overview" src="<?php echo $layout_asset; ?>/images/sikh1.jpg">Sikh</h3>
    <div class="koalapse__content"> 
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum nam illum ipsum corporis voluptatibus, perspiciatis possimus vitae consequuntur. Voluptate quisquam reprehenderit sapiente cupiditate esse, consequuntur vel dicta culpa dolorem rerum.</p>--> 
    </div>
  </div>
  </ul>
</div>
