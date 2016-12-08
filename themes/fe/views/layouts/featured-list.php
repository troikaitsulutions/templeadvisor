
<div class="scroll-colm2 bNone">
<div class="arrow_box">
  <h1 class="logo"><?php echo t('Featured Temples'); ?></h1>
</div>
  <div class="nbs-flexisel-container">
    <div class="nbs-flexisel-inner">
      <ul id="featureTemple1" class="nbs-flexisel-ul">
        <?php $Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>4));
		  	if( isset($Featured) && count($Featured)>0 ) {
				foreach ( $Featured as $ft ) { 
		   ?>
        <li class="nbs-flexisel-item" > <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>"><img src="<?php echo Gallery::GetPropThumbnail($ft->id); ?>" alt="<?php echo $ft->name; ?>" title="<?php echo $ft->name; ?>" style="width:230px; height:234px;" /></a> <strong><a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>"><?php echo $ft->name; ?></a></strong>
          <p><?php echo substr( trim (strip_tags($ft->content1)),0,60); ?>,..</p>
          <a class="read_more" href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$ft->id));?>"> <?php echo t('Read More'); ?> </a> </li>
        <?php } } ?>
      </ul>
    </div>
<!--    <div class="nbs-flexisel-nav-left" style="visibility: visible; top: 166px;"></div>
    <div class="nbs-flexisel-nav-right" style="visibility: visible; top: 166px;"></div>
-->  </div>
  <div class="clr"></div>
</div>
