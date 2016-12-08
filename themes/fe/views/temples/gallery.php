<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
			Yii::app()->clientScript->registerCssFile($layout_asset.'/css/lightbox.css');
			Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/lightbox-2.6.min.js', CClientScript::POS_HEAD);
?>
<body data-twttr-rendered="true">
<div id="page">
  <?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
  <div id="main" class="site-main container_16">
  <div class="inner clearfix">
<?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="inner">
    
      <?php
						
			if ( isset($Temples) && count($Temples)>0 ) {
				foreach ( $Temples as $Temple ) {
					$Temple_list = Temples::model()->findByPk($Temple->prop_id);
					if( isset($Temple_list) && count($Temple_list)>0 ) {
		?>

      <div class="candidate radius grid_4 gcolourrr" style="background:#FFF; height:256px;">
        <div class="candidate-margins">
        <div class="image-row"> <a class="example-image-link" href="<?php echo 'http://temples.s3.amazonaws.com/'.$Temple->prop_id.'/large/'.$Temple->img_url; ?>" data-lightbox="example-1"> <img width="200" height="210" src="<?php echo 'http://temples.s3.amazonaws.com/'.$Temple->prop_id.'/thumb/'.$Temple->img_url; ?>" class="wp-post-image" alt="<?php echo $Temple->name; ?>">
          <div class="name"><?php echo Temples::GetName($Temple->prop_id); ?></div>
           <!-- <div class="position"><?php echo '@ '.$Temple->name.' @'; ?></div>  -->
          </a></div>
          </div> 
      </div>
      <?php } } } ?>
      <div class="clear"></div>
      <div class="paginate">
                  <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
                </div>
      <div class="clear"></div>
    </div>
  </div>
  </div>
  <?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</div>
</body>
