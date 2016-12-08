<div class="top-add-index">

<div class="top-add-left">

<div class="top-add-ltop">
<div class="disc">

  <div class="disc-left">
    <div class=" visu-left fl">
     <?php $Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND discover_list = 1',
			'order'=>'rand',
			'limit'=>1));
		  	if( isset($Featured) && count($Featured)>0 ) {
				foreach ( $Featured as $ft ) { 
		   ?>
      <h3><?php echo t('Discover'); ?></h3>
      <p><?php echo $ft->name; ?><br /><?php echo substr( trim (strip_tags($ft->content1)),0,30); ?>,..</p>
      <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>" title="More detail">More details</a> </div> 
    <div class="visu-right fr"> <span><img src="<?php echo $layout_asset; ?>/images/discover.png" alt="" /></span> </div>
    <?php } } ?>
  </div>
  
  <div class="disc-right">
    <div class="visu-left fl">
 	    <?php $Featured = Qans::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1',
			'order'=>'rand',
			'limit'=>1));
		  	if( isset($Featured) && count($Featured)>0 ) {
				foreach ( $Featured as $ft ) { 
		   ?>  
      <h3><?php echo t('Did you know?'); ?></h3>
       <p><?php echo trim (strip_tags($ft->ans)); /*echo substr( trim (strip_tags($ft->ans)),0,160);*/ ?></p>
     <!--  <a href="#" title="More detail"> <?php echo t('More details'); ?> </a> --> </div>
    
    <div class="visu-right fr"> <span><img src="<?php echo $layout_asset; ?>/images/did-you-know.png" alt="" /></span> </div>
    
 <?php } } ?>
  </div>
  
</div>
<div style="clear:both;"></div>
</div>

<div class="top-add-lbottom"><img src="<?php echo $layout_asset; ?>/images/advertisement2.jpg" alt="Advertisement" /></div>
<div style="clear:both;"></div>
</div> 

<?php ?>

<div class="top-add-right"><img src="<?php echo $layout_asset; ?>/images/advert/<?php echo rand(0,1); ?>.jpg" alt="Advertisement" /></div>


<div style="clear:both;"></div>
</div>