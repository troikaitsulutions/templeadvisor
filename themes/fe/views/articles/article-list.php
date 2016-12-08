<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
		
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/SpryTabbedPanels.js', CClientScript::POS_HEAD);	
		
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/SpryTabbedPanels.css');
		
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo t("Articles & Reviews"); ?></h1>
          <div class="theme-god">
            <div class="TabbedPanels">
              <ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab tabsrr-active"><a href="<?php echo Yii::app()->createUrl('articles')?>" class="active"><?php echo t('Articles'); ?></a></li>
                <li class="TabbedPanelsTab"><a href="<?php echo Yii::app()->createUrl('reviews')?>"><?php echo t('Reviews'); ?></a></li>
              </ul>
              <div class="TabbedPanelsContentGroup">
                <div class="TabbedPanelsContent">
                  <?php foreach ( $Contributemyarticle as $Contributemyarticles ) { ?>
                  <div class="temple_contribute">
                    <h2 class="pad20"><?php echo $Contributemyarticles->heading; ?></h2>
                    <div class="article_date_time pad20">
                      <ul>
                        <li><span> Written by, <strong><?php echo $Contributemyarticles->name; ?></strong>.</span></li>
                        <li><img alt="" src="<?php echo $layout_asset; ?>/images/calender.gif"><?php echo date("M d,Y",$Contributemyarticles->created); ?></li>
                        <li><img alt="" src="<?php echo $layout_asset; ?>/images/small-time-icon.gif"><?php echo date("h:i A",$Contributemyarticles->created); ?></li>
                      </ul>
                    </div>
                    <p>
                    <!-- <em><img alt="" src="<?php echo $layout_asset; ?><?php echo Contributemyarticle::GetThumbnail($Contributemyarticles); ?>"></em> --> <?php echo substr( trim (strip_tags($Contributemyarticles->content1)),0,300); ?>,..</p>
                    <a href="<?php echo Yii::app()->createUrl('articles/articleread',array('aid'=>$Contributemyarticles->id)); ?>" class="read">Read More</a> </div>
                  <?php } ?>
                  <div class="temple_contribute bNone"> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>" class="add-buttton">Add Your Articles</a>
                    <div class="clr"></div>
                  </div>
                </div>
              </div>
              <div class="paginate">
                  <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="temple_content_right">
        <div class="tmp_details">
          <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
        <div class="tmp_details">
          <?php $this->renderPartial('//layouts/recent-review-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
