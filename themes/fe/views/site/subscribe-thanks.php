<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    
    <div class="theme-slogan">
       <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> 
      <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> 
      <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a>  </span> </div>
      <div class="clr"></div>
    </div>
    
    
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="tmp_region_right_testi">
          <h3><?php echo $meta->h2; ?></h3>
          <div class="clr"></div>
          <p><?php echo $page->content; ?></p>
          <div class="clr"></div>
        </div>
      </div>
      <div class="temple_content_right">
    <div class="tmp_details">
       <?php  $this->renderPartial('//layouts/contact-address-right-pane',array('layout_asset'=>$layout_asset));  ?>
      </div>
      </div>
    </div>
  </div>
</div>

<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
