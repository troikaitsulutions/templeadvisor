<?php
 	if(YII_DEBUG)
        $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
    else
        $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
	
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.stellar.min.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/waypoints.min.js', CClientScript::POS_END);
?>
<?php $this->renderPartial('//layouts/banner',array('layout_asset'=>$layout_asset)); ?>
<section id="content home-content">
  <?php $this->renderPartial('//layouts/banner-bottom-menu',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/second-three',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/special-deal',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/online-solution',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/featured-list',array('layout_asset'=>$layout_asset)); ?>
  <?php $this->renderPartial('//layouts/best-products',array('layout_asset'=>$layout_asset)); ?>
</section>
