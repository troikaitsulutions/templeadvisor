<div class="section gray-area most-popular">
    <div class="container">
        <?php
		if($Temple->religion==1001) 
		{
			$Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND sdeity = '.$Temple->sdeity,
			'order'=>'rand',
			'limit'=>10));
			
		} else {
			
			$Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND religion = '.$Temple->religion,
			'order'=>'rand',
			'limit'=>10));
		}
		
		
		
		  	if( isset($Featured) && count($Featured)>0 ) { 
	  ?>
        <div class="text-center description block">
          <h2>SIMILAR TEMPLES</h2>
        </div>
        <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
      <ul class="slides image-box style3">
         <?php 
			$i=1;
			foreach ( $Featured as $d) {
				
				$Religion = Religion::model()->findByPk($d->religion);
				$ReligionSeo = Seo::GetPageSeo($Religion->uid);
				$TempleSeo = Seo::GetPageSeo($d->uid);
		?>
        <li class="box">
          <figure> <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" title="<?php echo $d->name; ?>"><img src="<?php echo Gallery::GetPropThumbnail($d->id); ?>" alt="<?php echo $d->name; ?>" width="270" height="160"></a> </figure>
          <div class="details text-center">
            <div class="box-title home-featured-name"><?php echo $d->name; ?></div>
			
			<?php
				$PoojaList = Poojalist::model()->findAll(array(
						'condition'=>'status = 1 AND temple = :TMP',
						'params'=>array(':TMP'=>$d->id )));
			?>
            <?php if (count($PoojaList) == 0 ) { ?>
			<p class="offers-content">No Poojas Available</p>
            <?php } else { ?>
            <p class="offers-content">(<?php echo count($PoojaList); ?> Poojas)</p>
			<?php } ?>
			
            
			<p class="description"><?php echo substr($d->famous_for,0,30); ?>...</p>
            <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" class="button">VIEW DETAILS</a> </div>
        </li>
        <?php } ?>
      </ul>
    </div>
        <?php } ?>
    </div>
</div>