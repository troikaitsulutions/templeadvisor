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
    <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset,'meta' => $meta)); ?>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo t("Articles & Reviews"); ?></h1>
          <div class="theme-god">
            <div id="horizontalTab">
              <ul class="resp-tabs-list">
                <li><a href="tabs-1"><?php echo t('Reviews'); ?></a></li>
                <li><a href="tabs-2"><?php echo t('Articles'); ?></a></li>
              </ul>
              <div class="tabs-1">
                <div class="temple_contribute">
                  <h4><?php echo Temples::getTempleName($Writeyourreviews->temple_name); ?></h4>
                  <p> <span> <img alt="" src="<?php $layout_asset; ?>images/rating-star.gif"> </span> </p>
                  <p><?php echo $Writeyourreviews->comments ; ?></p>
                  <a href="#">Read More</a> </div>
                <div class="temple_contribute bNone"> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>" class="add-buttton">Add Your Reviews</a>
                  <div class="clr"></div>
                </div>
              </div>
              <div class="tabs-2">
                <div class="temple_contribute">
                  <h1 class="pad20"><?php echo $Contributemyarticle->heading; ?><br>
                    <span>Written by,<strong><?php echo $Contributemyarticle->name; ?></strong>.</span></h1>
                  <div class="article_date_time pad20">
                    <ul>
                      <li><img alt="" src="<?php $layout_asset; ?>/images/calender.gif"> June 05th, 2014</li>
                      <li><img alt="" src="<?php $layout_asset; ?>/images/small-time-icon.gif"> 02:41 pm</li>
                      <li><img alt="" src="<?php $layout_asset; ?>/images/comments-icon.gif"> Comments</li>
                    </ul>
                  </div>
                  <p><?php echo $Contributemyarticle->article ; ?></p>
                  <a href="#">Read More</a> </div>
                <div class="temple_contribute bNone"> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>" class="add-buttton">Add Your Articles</a>
                  <div class="clr"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="temple_content_right">
    <div class="tmp_details">
      <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
