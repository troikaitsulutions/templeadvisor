<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/custom.js', CClientScript::POS_HEAD);
		if ( ($Temple->latitude!='') && ($Temple->longitude!='') ) {  
		
		$lati = $Temple->latitude;
		$longi = $Temple->longitude;
		
		
		?>

<div class="tmp_details">
  <h2><img src="<?php echo $layout_asset; ?>/images/other-attraction-icon.png" alt="<?php echo t('Other Attractions'); ?>" /> <?php echo t('Other Attractions'); ?> </h2>
  <div class="tmp_description">
    <?php
	
		$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, address, comment, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1406 AND t.type=1449";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	
	?>
    <div class="places">
      <h3><?php echo t('Places'); ?></h3>
      <ul>
        <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i<=2) {  ?>
        <li class="border-bottom padding-tb tmp_description_li tip">
          <div class="title-tmp"><?php echo $NearT->name; ?></div>
          
         <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
        </li>
        <?php } } ?>
      </ul>
      <?php if ( count($NearTemple)>= 3 ) { ?> 
      <div class="hide-content">
        <ul>
          <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i >= 3) {  ?>
          <li class="border-bottom padding-tb tmp_description_li tip">
            <div class="title-tmp"><?php echo $NearT->name; ?> </div>
           <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
<br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <div class="read-more"><span><?php echo t('More'); ?></span></div>
      <div class="read-more-hide"><span><?php echo t('Less'); ?></span></div>
      <?php } ?>
      
    </div>
    <?php } ?>
    <?php
	
	$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, address, comment, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1404";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 50';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	
	?>
    <div class="entertainment">
      <h3><?php echo t('Entertainment'); ?></h3>
      <ul>
        <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i<=2) {  ?>
        <li class="border-bottom padding-tb tmp_description_li tip">
          <div class="title-tmp"><?php echo $NearT->name; //echo $NearT->GPSList; ?></div>
          <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
<br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>

        </li>
        <?php } } ?>
      </ul>
       <?php if ( count($NearTemple)>= 3 ) { ?> 
      <div class="hide-content-en">
        <ul>
          <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i >= 3) {  ?>
          <li class="border-bottom padding-tb tmp_description_li tip">
            <div class="title-tmp"><?php echo $NearT->name; ?> </div>
           <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <div class="read-more-en"><span><?php echo t('More'); ?></span></div>
      <div class="read-more-hide-en"><span><?php echo t('Less'); ?></span></div>
      <?php } ?>
    </div>
    <?php } ?>
    <?php
	
	$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, address, comment, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1403";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 10';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	
	?>
    <div class="eatables">
      <h3><?php echo t('Local Delicacies'); ?></h3>
      <ul>
        <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i<=2) {  ?>
        <li class="border-bottom padding-tb tmp_description_li tip">
          <div class="title-tmp"><?php echo $NearT->name; ?></div>
          <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>        </li>
        <?php } } ?>
      </ul>
       <?php if ( count($NearTemple)>= 3 ) { ?> 
      <div class="hide-content-ea">
        <ul>
          <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i >= 3) {  ?>
          <li class="border-bottom padding-tb tmp_description_li tip">
            <div class="title-tmp"><?php echo $NearT->name; ?> </div>
            <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <div class="read-more-ea"><span><?php echo t('More'); ?></span></div>
      <div class="read-more-hide-ea"><span><?php echo t('Less'); ?></span></div>
      <?php } ?>
    </div>
    <?php } ?>
    <?php
	
	$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, address, comment, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1405";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 15';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	
	?>
    <div class="shopping">
      <h3><?php echo t('Shopping'); ?></h3>
      <ul>
        <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i<=2) {  ?>
        <li class="border-bottom padding-tb tmp_description_li tip">
          <div class="title-tmp"><?php echo $NearT->name; ?></div>
         <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
        </li>
        <?php } } ?>
      </ul>
       <?php if ( count($NearTemple)>= 3 ) { ?> 
      <div class="hide-content-sh">
        <ul>
          <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i >= 3) {  ?>
          <li class="border-bottom padding-tb tmp_description_li tip">
            <div class="title-tmp"><?php echo $NearT->name; ?></div>
            <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <div class="read-more-sh"><span><?php echo t('More'); ?></span></div>
      <div class="read-more-hide-sh"><span><?php echo t('Less'); ?></span></div>
      <?php } ?>
    </div>
    <?php } ?>
    <?php
	
	$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, address, comment, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1407";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 15';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	
	?>
    <div class="activities">
      <h3><?php echo t('Activities'); ?></h3>
      <ul>
        <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i<=2) {  ?>
        <li class="border-bottom padding-tb tmp_description_li tip">
          <div class="title-tmp"><?php echo $NearT->name; ?></div>
         <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
        </li>
        <?php } } ?>
      </ul>
       <?php if ( count($NearTemple)>= 3 ) { ?> 
      <div class="hide-content-ac">
        <ul>
          <?php $i=0; foreach ($NearTemple as $NearT) { $i++; if($i >= 3) {  ?>
          <li class="border-bottom padding-tb tmp_description_li tip">
            <div class="title-tmp"><?php echo $NearT->name; ?></div>
            <p class="tooltipL"><strong><?php echo $NearT->name; ?></strong> <br /> 
                
                <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?>
                <br />---------------------<br />
                <span><?php echo $NearT->comment; ?></span>
                </p>
          </li>
          <?php } } ?>
        </ul>
      </div>
      <div class="read-more-ac"><span><?php echo t('More'); ?></span></div>
      <div class="read-more-hide-ac"><span><?php echo t('Less'); ?></span></div>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
</div>
<?php  } ?>
