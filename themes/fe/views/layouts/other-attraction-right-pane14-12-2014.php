<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/custom.js', CClientScript::POS_HEAD);
		if ( ($Temple->latitude!='') && ($Temple->longitude!='') ) {  
		
		$lati = $Temple->latitude;
		$longi = $Temple->longitude;
		
		$c = new CDbCriteria();
       // $c->select = 'id, name, SQRT(latitude-'.$lati.')+SQRT(longitude-'.$longi.') AS GPSList';
		
		$c->select = 'id, name, town, district, state, type, ( 3959 * acos( cos( radians('.$lati.') ) 
                   * cos( radians( latitude ) ) 
                   * cos( radians( longitude ) 
                       - radians('.$longi.') ) 
                   + sin( radians('.$lati.') ) 
                   * sin( radians( latitude ) ) 
                 )
   ) AS GPSList';
        $c->order = 'GPSList ASC';
	//	$c->group = 'type';
		$c->together = 'true';
		$c->limit = 10;
		  
		$NearTemple = Atinfo::model()->findAll($c);
		  
		if ( isset($NearTemple) && count($NearTemple)>0 ) {	
		?>

<div class="tmp_details">
  <h2><img src="<?php echo $layout_asset; ?>/images/other-attraction-icon.png" alt="<?php echo t('Other Attractions'); ?>" /> <?php echo t('Other Attractions'); ?> </h2>
	<div class="tmp_description">
	<div class="places">
		<h3>Places</h3>
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			<div class="hide-content">
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			</div>
			<div class="read-more"><span>More</span></div>
		   <div class="read-more-hide"><span>Less</span></div>
	</div>
	<div class="entertainment">
		<h3>Entertainment</h3>
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			<div class="hide-content-en">
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			</div>
			<div class="read-more-en"><span>More</span></div>
		   <div class="read-more-hide-en"><span>Less</span></div>
	</div>
	<div class="eatables">
		<h3>Eatables</h3>
		<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			<div class="hide-content-ea">
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			</div>
			<div class="read-more-ea"><span>More</span></div>
		   <div class="read-more-hide-ea"><span>Less</span></div>
	</div>
    
    <div class="shopping">
		<h3>Shopping</h3>
		<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			<div class="hide-content-sh">
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			</div>
			<div class="read-more-sh"><span>More</span></div>
		   <div class="read-more-hide-sh"><span>Less</span></div>
	</div>
    
    <div class="activities">
		<h3>Activities</h3>
		<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			<div class="hide-content-ac">
			<ul>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
				<li class="border-bottom padding-tb tmp_description_li">
					<div class="title-tmp">Markendeya Hill (Place)</div> 
					<div class="loc">Theyagarayer nagar, Chennai</div>
				</li>
			</ul>
			</div>
			<div class="read-more-ac"><span>More</span></div>
		   <div class="read-more-hide-ac"><span>Less</span></div>
	</div>
  
    <ul>
      <?php foreach ($NearTemple as $NearT) {  //print_r($NearT);   		
				?>
      <li class="ChillTip" title="<?php echo $NearT->name.', '.Town::GetName($NearT->town).', '.District::GetName($NearT->district).', '.State::GetName($NearT->state); ?>"><?php echo $NearT->name.'( '.Atlist::GetMainType($NearT->type).' )'; ?></li>
      <?php   } ?>
    </ul>
  </div>
</div>
<?php } } ?>
