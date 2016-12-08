<?php 

		if ( ($Temple->latitude!='') && ($Temple->longitude!='') ) {  
		
		$lati = $Temple->latitude;
		$longi = $Temple->longitude;
		
		$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, ( 3959 * acos( cos( radians('.$lati.') ) 
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

<div class="tmp_details">
  <h2><img src="<?php echo $layout_asset; ?>/images/near-temple-icon.png" alt="<?php echo t('Near By Temples'); ?>" /> <?php echo t('Nearby Temples'); ?> </h2>
  <div class="tmp_description nearby_temples">
    <p>
      <?php foreach ($NearTemple as $NearT) {  //print_r($NearT);
					
              		$GalData = Gallery::model()->find(array('condition'=>'prop_id = :PID', 'params'=>array(':PID'=>$NearT->id)));
					$i = 0;
					if( isset($GalData) && count($GalData)>0 ) {
				?>
      <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$NearT->id)); ?>" title="<?php echo $NearT->name.', '.Town::GetName($NearT->town).', '.District::GetName($NearT->district).', '.State::GetName($NearT->state); ?>" target="_blank"> <img src="<?php echo Gallery::GetThumbnail($GalData); ?>" alt="<?php echo $NearT->name; ?>" title="<?php echo $NearT->name.', '.Town::GetName($NearT->town).', '.District::GetName($NearT->district).', '.State::GetName($NearT->state); ?>" style="width:66px; height:50px;" /> </a>
      <?php  } } ?>
    </p>
  </div>
</div>
<?php } } ?>
