<div class="sidebar col-md-3">
	<div class="travelo-box">
        <h4 class='title-right yellow-bg red-color'> <?php echo t('Main Deity'); ?></h4>
			<ul>
                <li>
						<p><?php echo $Temple->deity; ?>, <?php echo Diety::GetName($Temple->sdeity); ?>
                          <?php if ($Temple->avatar!=0) { echo ' in <strong>'.Avatar::GetName($Temple->avatar).'</strong> form.'; } ?></p>
                </li>
			</ul>	
				
		<?php if($Temple->other_deity!='') { ?>
		<h4  class='title-right yellow-bg red-color'><?php echo t('Other Deities'); ?></h4>
			<ul>
                <li>
					<p><?php echo $Temple->other_deity; ?></p>
                </li>
			</ul>
		<?php } ?>
			
		<?php if($Temple->posture!='') { ?>
		<h4  class='title-right yellow-bg red-color'><?php echo t('Posture'); ?></h4>
			<ul>
				 <li>
					<p><?php echo Posture::GetName($Temple->posture);  ?></p>
                </li>
			</ul>
		<?php } ?>
		
		<?php 
		$Timings =  Timing::model()->findAll(array('condition'=>'prop_id = :PID','params'=>array(':PID'=>$Temple->id)));
			if( isset($Timings) && count($Timings)>0 ) 
			{ ?>
				<h4  class='title-right yellow-bg red-color'><?php echo t('Temple Timings'); ?></h4>	
					<ul>
					
					<?php foreach($Timings as $Timing ) 
					{ 
					
			   echo '<li> <p>'.Timing::getTiming1($Timing->open_time).' to '.Timing::getTiming2($Timing->close_time).' ('.$Timing->name.') </p> </li>'; 
		   
					 } ?>
					</ul>
		
		<?php } ?>
		
		<?php if($Temple->thirtham_sthalavruksham!='') { ?>
		<h4  class='title-right yellow-bg red-color'><?php echo t('Temple Tank / Sacred Tree'); ?></h4>
			<ul>
				 <li>
					<p><?php echo $Temple->thirtham_sthalavruksham; ?></p>
                </li>
			</ul>
		<?php } ?>
		
    </div>
	
	
        <?php 
	  
	  	$TemplePoojas = Poojalist::model()->findAll(array('condition'=>'temple = :TID','params'=>array(':TID'=>$Temple->id))); 
		//$TemplePoojas = Poojalist::model()->findAll(array('limit'=>5)); 
		
		if( isset($TemplePoojas) && count($TemplePoojas)>0 ) {
	  
	  ?>
        <div class="travelo-box">
          <h4><?php echo t('Request a Pooja'); ?></h4>
          <div class="image-box style14 poojalist">
            <?php foreach ($TemplePoojas as $tp) { ?>
          
			<article class="box pooja">
              <figure> <a href="#"><img src="<?php echo Poojalist::GetThumbnail($tp->icon_file); ?>" alt="<?php echo $tp->name; ?>" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#"><?php echo $tp->name; ?></a><small> <?php echo 'Rs. '.$tp->total; ?> </small></h5>
                <a class="button btn-mini yellow">Request this Pooja</a> </div>
			</article>
            
			<?php } ?>
			<a id='loadMore' class="button btn-mini yellow">loadMore</a>
			<a id='showLess' class="button btn-mini yellow">showLess</a>
          </div>
        </div>
        <?php } ?>
        <?php 
	  
	  	$TempleTours = Tourpackage::model()->findAll(array("condition"=>"temples LIKE '%:TID%'",'params'=>array(':TID'=>$Temple->id))); 
		//$TempleTours = Tourpackage::model()->findAll(array('limit'=>5));
		
		 
		if( isset($TempleTours) && count($TempleTours)>0 ) {
	  
	  ?>
        <div class="travelo-box">
          <h4>Book a Trip to this Temple</h4>
          <div class="image-box style14">
            <?php foreach ($TempleTours as $tt) { ?>
            <article class="box">
              <figure> <a href="#"><img src="<?php echo Tourpackage::GetThumbnail($tt->icon_file); ?>" alt="<?php echo $tt->name; ?>" /></a> </figure>
              <div class="details with-button">
                <h5 class="box-title"><a href="#"><?php echo $tt->name; ?><small> From Rs. <?php echo $tt->total; ?> </small></a></h5>
                <a class="button btn-mini yellow">Book a Trip</a> </div>
            </article>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
	