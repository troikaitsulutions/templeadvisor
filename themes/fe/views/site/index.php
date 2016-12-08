<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			$slider_js = "
		jQuery(document).ready(function(){
			jQuery('#demo').skdslider({'delay':3000, 'fadeSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoStart':true});
			
      		$('#my_popup').popup();
		});
";
		
		Yii::app()->clientScript->registerScript('temple-slider1', $slider_js);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.popupoverlay.js', CClientScript::POS_HEAD);
		Yii::app()->clientScript->registerScriptFile('http://code.jquery.com/jquery-1.8.2.min.js', CClientScript::POS_HEAD);
		
?>


<body class="home blog two-column right-sidebar" data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/banner',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/home-mid-menu',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/home-mid-add',array('layout_asset'=>$layout_asset)); ?>
  <div id="main" class="site-main container_16">
    <div class="inner">
      <?php $this->renderPartial('//layouts/featured-events',array('layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/featured-list',array('layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/templesarchitecture',array('layout_asset'=>$layout_asset)); ?>
      <?php $this->renderPartial('//layouts/templesplan',array('layout_asset'=>$layout_asset)); ?>
    </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>





