<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			$overview_js = "
	
var Accordion1 = new Spry.Widget.Accordion('Accordion1');

";

Yii::app()->clientScript->registerScript('overview1', $overview_js);
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/SpryAccordion.js', CClientScript::POS_HEAD);
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/SpryAccordion.css');
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
   <div class="theme-slogan">
        <?php $this->renderPartial('//layouts/bcrumbs2',array('layout_asset'=>$layout_asset,'meta' => $meta)); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"> <?php echo t('Write a Review'); ?></a>  </span> </div>
      <div class="clr"></div>
    </div>
   
    <div class="temple_content_section">
      <div class="overview_left">
        <div class="tmp_details">
          <h2><?php echo t('Overview'); ?> <img alt="Overview" src="<?php echo $layout_asset; ?>/images/bell-icon.png"></h2>
          <div class="tmp_description">
            <ul>
              <?php 
				$overviews = Overview::model()->findAll(array('condition'=>'status=1 AND uid != :UID','params'=>array(':UID'=>$meta->uid)));
				
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
        </div>
      </div>
      <div class="overview_right">
        <div class="temple_content_description">
          <div class="temple_article_reviews tmp_top_article"> <?php echo $page->description; ?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
