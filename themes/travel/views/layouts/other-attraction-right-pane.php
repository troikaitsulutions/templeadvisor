<?php 
	if ( ($Temple->latitude!='') && ($Temple->longitude!='') ) {  
	
		$lati = $Temple->latitude;
		$longi = $Temple->longitude;
?>
<div class="toggle-container box">
        <div class="travelo-box">
           
			
	<?php
		$c = new CDbCriteria();
		$c->select = 'id, name, town, district, state, type, address, comment, ( 6371 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
			) AS GPSList';
   
   		$c->with = array('Atlist'=>array('together'=>true));
		$c->condition = "Atlist.source = 1406";
        $c->order = 'GPSList ASC';
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	?>
			<div class="panel style2">
              <h3 class="panel-title"><a  href="#tgg4" data-toggle="collapse"><?php echo t('Places'); ?></a> </h3>
			  <div class="panel-collapse collapse in" id="tgg4">
              <?php foreach ($NearTemple as $NearT) {  ?>
			  
                <div class="panel-content">
                  <h4> <?php echo $NearT->name; ?> </h4>
                  <h6> <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?></h6>
                  <p><?php echo $NearT->comment; ?> </p>
                </div>
              
			  <?php } ?>
			  </div>
            </div>
	<?php } ?>
	
	
	<?php
		$c = new CDbCriteria();
		$c->select = 'id, name, town, district, state, type, address, comment, ( 6371 * acos( cos( radians('.$lati.') ) 
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
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	?>
			<div class="panel style2">
              <h3 class="panel-title"><a class="collapsed"  href="#tgg5" data-toggle="collapse"><?php echo t('Entertainment'); ?></a> </h3>
			  <div class="panel-collapse collapse" id="tgg5">
              <?php foreach ($NearTemple as $NearT) {  ?>
			  
                <div class="panel-content">
                  <h4> <?php echo $NearT->name; ?> </h4>
                  <h6> <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?></h6>
                  <p><?php echo $NearT->comment; ?> </p>
                </div>
              
			  <?php } ?>
			  </div>
            </div>
	<?php } ?>
	
	
	<?php
		$c = new CDbCriteria();
		$c->select = 'id, name, town, district, state, type, address, comment, ( 6371 * acos( cos( radians('.$lati.') ) 
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
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	?>
			<div class="panel style2">
              <h3 class="panel-title"><a class="collapsed"  href="#tgg3" data-toggle="collapse"><?php echo t('Local Delicacies'); ?></a> </h3>
			  <div class="panel-collapse collapse" id="tgg3">
              <?php foreach ($NearTemple as $NearT) {  ?>
			  
                <div class="panel-content">
                  <h4> <?php echo $NearT->name; ?> </h4>
                  <h6> <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?></h6>
                  <p><?php echo $NearT->comment; ?> </p>
                </div>
              
			  <?php } ?>
			  </div>
            </div>
	<?php } ?>
	
	<?php
		$c = new CDbCriteria();
		$c->select = 'id, name, town, district, state, type, address, comment, ( 6371 * acos( cos( radians('.$lati.') ) 
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
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	?>
			<div class="panel style2">
              <h3 class="panel-title"><a class="collapsed"  href="#tgg6" data-toggle="collapse"><?php echo t('Shopping'); ?></a> </h3>
			  <div class="panel-collapse collapse" id="tgg6">
              <?php foreach ($NearTemple as $NearT) {  ?>
			  
                <div class="panel-content">
                  <h4> <?php echo $NearT->name; ?> </h4>
                  <h6> <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?></h6>
                  <p><?php echo $NearT->comment; ?> </p>
                </div>
              
			  <?php } ?>
			  </div>
            </div>
	<?php } ?>
	.
	
	<?php
		$c = new CDbCriteria();
		$c->select = 'id, name, town, district, state, type, address, comment, ( 6371 * acos( cos( radians('.$lati.') ) 
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
		$c->having = 'GPSList <= 25';
		$c->together = 'true';
		$c->limit = 10;
		
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
	?>
			<div class="panel style2">
              <h3 class="panel-title"><a class="collapsed"  href="#tgg7" data-toggle="collapse"><?php echo t('Activities'); ?></a> </h3>
			  <div class="panel-collapse collapse" id="tgg7">
              <?php foreach ($NearTemple as $NearT) {  ?>
			  
                <div class="panel-content">
                  <h4> <?php echo $NearT->name; ?> </h4>
                  <h6> <?php 
				$addr = '';
				if ($NearT->address!='') { $addr = $NearT->address.', '; }
				echo $addr.Town::GetName($NearT->town).', '.District::GetName($NearT->district).' (Dist), '.State::GetName($NearT->state); ?></h6>
                  <p><?php echo $NearT->comment; ?> </p>
                </div>
              
			  <?php } ?>
			  </div>
            </div>
	<?php } ?>
			
	<!--		
            <div class="panel style2">
              <h4 class="panel-title"> <a class="collapsed" href="#tgg5" data-toggle="collapse">Entertainment</a> </h4>
              <div class="panel-collapse collapse" id="tgg5">
                <div class="panel-content">
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden por nequetiam elerisque mi id habitant morbi tristique senectus passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                </div>
              </div>
            </div>
            
			<div class="panel style2">
              <h4 class="panel-title"> <a class="collapsed" href="#tgg6" data-toggle="collapse">Shopping</a> </h4>
              <div class="panel-collapse collapse" id="tgg6">
                <div class="panel-content">
                  <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden por nequetiam elerisque mi id habitant morbi tristique senectus passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                </div>
              </div>
            </div>
	-->		
        </div>
</div>

	<?php } ?>