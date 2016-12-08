<?php 

		if ( ($Temple->latitude!='') && ($Temple->longitude!='') ) {  
		
		$lati = $Temple->latitude;
		$longi = $Temple->longitude;
		
		$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, famous_for, state, religion, uid, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   		$c->condition = 'id !='.$Temple->id;
        $c->order = 'GPSList ASC';
		$c->together = 'true';
		$c->limit = 9;
		  
		$NearTemple = Temples::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
		?>
		
	<div class="section gray-area most-popular">
		<div class="container">
		
		<div class="text-center description block">
          <h2>NEARBY TEMPLES</h2>
        </div>
		
		
		<div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
          <ul class="slides image-box style3">
            <?php foreach ($NearTemple as $NearT) {  //print_r($NearT);
              	$GalData = Gallery::model()->find(array('condition'=>'prop_id = :PID', 'params'=>array(':PID'=>$NearT->id)));
				$i = 0;
				if( isset($GalData) && count($GalData)>0 ) {
					
					$Religion = Religion::model()->findByPk($NearT->religion);
					$ReligionSeo = Seo::GetPageSeo($Religion->uid);
					$TempleSeo = Seo::GetPageSeo($NearT->uid);
			?>
            <li class="box">
              <figure> <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" title="<?php echo $NearT->name.', '.Town::GetName($NearT->town).', '.District::GetName($NearT->district).', '.State::GetName($NearT->state); ?>" target="_blank"><img src="<?php echo Gallery::GetThumbnail($GalData); ?>" alt="<?php echo $NearT->name; ?>" width="270" height="160"></a> </figure>
              <div class="details text-center">
                <div class="box-title home-featured-name"><?php echo $NearT->name; ?></div>
                
				<?php
				$PoojaList = Poojalist::model()->findAll(array(
						'condition'=>'status = 1 AND temple = :TMP',
						'params'=>array(':TMP'=>$NearT->id )));
			?>
            <?php if (count($PoojaList) == 0 ) { ?>
			<p class="offers-content">No Poojas Available</p>
            <?php } else { ?>
            <p class="offers-content">(<?php echo count($PoojaList); ?> Poojas)</p>
			<?php } ?>
				
				
                <p class="description"><?php echo substr($NearT->famous_for,0,30); ?>...</p>
                <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" class="button">VIEW DETAILS</a> </div>
            </li>
            <?php } } ?>
          </ul>
        </div>
	  
	  
		</div>
    </div>
	 
<?php } } ?>
