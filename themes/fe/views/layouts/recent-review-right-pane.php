<?php

$Writeyourreviews = Writeyourreviews::model()->findAll(array('condition'=>'status = 1',
							'order' => 'created DESC',
							'limit' => 5
						));

?>
<?php if ( isset($Writeyourreviews) && count($Writeyourreviews)>0 ) { ?>

<div class="tmp_details">
  <h2><img alt="Recent Reviews" src="<?php echo $layout_asset; ?>/images/articles-reviews-icon.png"> <?php echo t('Recent Reviews'); ?> </h2>
  <div class="tmp_description">
    <ul>
      <?php foreach ( $Writeyourreviews as $Writeyourreviews) { ?>
      <a href="<?php echo Yii::app()->createUrl('reviews')?>">
      <li><?php echo Temples::GetName($Writeyourreviews->parent); ?> </li>
      </a> 
      <?php } ?>
    </ul>
  </div>
</div>
<?php } ?>
