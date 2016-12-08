<?php


$Contributemyarticles = Contributemyarticle::model()->findAll(array(
							'condition'=>'status = 1',
							'order' => 'created DESC',
							'limit' => 5
						));

?>
<?php if ( isset($Contributemyarticles) && count($Contributemyarticles)>0 ) { ?>

<div class="tmp_details">
  <h2><img alt="Recent Artiles" src="<?php echo $layout_asset; ?>/images/bell-icon.png"> <?php echo t('Recent Articles'); ?> </h2>
  <div class="tmp_description">
    <ul>
      <?php foreach ( $Contributemyarticles as $Contributemyarticle) { ?>
      <a href="<?php echo Yii::app()->createUrl('articles/articleread',array('aid'=>$Contributemyarticle->id)); ?>">
      <li><?php echo $Contributemyarticle->heading; ?> </li>
      </a>
      <?php } ?>
    </ul>
  </div>
</div>
<?php } ?>
