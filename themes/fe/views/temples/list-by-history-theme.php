<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);	

	$js_ret = 'jQuery("#GetMyFilter").click(function() {
	   
	   var params="?q=";
	   var allVals = [];
	   
	   if( $("#search_box").val() != "" ) { params = "?q="+$("#search_box").val(); } 
	   
	   $("#history :checked").each(function() {
		 allVals.push($(this).val());
	   });
	   
	   if(allVals != "") { params +="&themes="+allVals; }
	   window.location.replace("'.Yii::app()->createUrl('temples/bythemehistory').'"+params);
	});';
	Yii::app()->clientScript->registerScript('sortable-project', $js_ret);
			
						
?>
<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span><a href="<?php echo Yii::app()->createUrl('temples/byregion'); ?>"><img  src="<?php echo $layout_asset; ?>/images/theme-region-icon.png" alt="Search By Region" title="Search By Region"><?php echo t('Search By Region'); ?></a> <a href="<?php echo Yii::app()->createUrl('temples/bymap'); ?>"><img  src="<?php echo $layout_asset; ?>/images/theme-map-icon.png" title="Search By Map" alt="Search By Map"> <?php echo t('Search By Map'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="theme-part">
      <form method="POST">
        <div class="theme-part-left">
          <h3><?php echo t('Refine Your Results'); ?></h3>
          <div class="history collapse">
            <div class="tmp_search">
            <!--  <input id="search_box" type="text" value="<?php echo (isset($_GET['q']))?$_GET['q']:''; ?>" /> -->
            </div>
            <div id="history">
              <h4><?php echo t('History/Heritage'); ?> </h4>
              <ul>
                <?php		
	   
	   			$dids = isset($_GET['themes']) ? strtolower(trim($_GET['themes'])) : ''; 
				$adids = explode(',', $dids);
				
	        $ThemeList = Themelist::model()->findAll(array("condition"=>"status = 1 AND source = 1001","order"=>"mnu_order ASC"));	
			if( isset($ThemeList) && count($ThemeList)>0 ) {
				foreach ( $ThemeList as $Themename ) {
					
					$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND religion = 1001 AND themelist like "%'.$Themename->id.'%"'));
					
					if( isset($tot_temples) && count($tot_temples) >= 1 ) {
						
						$ListCheck = '<li><label> <input name="deitybox" type="checkbox"';
								if(in_array($Themename->id, $adids)) { $ListCheck .=" checked "; }
								$ListCheck .= ' value="'.$Themename->id.'"> '.$Themename->name.'('.count($tot_temples).')</label></li>';
								echo $ListCheck;
						
						
						
				} } }
			?>
              </ul>
            </div>
           <div class="list-by-all-butrr"> <button type="button" name="getmylist" class="getmylistbt" id="GetMyFilter" ><?php echo t('Get My List'); ?></button> </div>
          </div>
        </div>
      </form>
      <div class="theme-part-mid">
        <div class="theme-god">
          <div id="horizontalTab">
            <div class="resp-tabs-container">
              <h2 role="tab" class="resp-accordion resp-tab-active" aria-controls="tab_item-0"><span class="resp-arrow"></span>Deity</h2>
              <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                <div class="temple-menu-count">
                  <div class="temple-menu-rr">
                    <ul>
                      <li><a href="<?php echo Yii::app()->createUrl('temples/bytheme'); ?>"><?php echo t('Hindu Deity'); ?></a></li>
                      <li><a href="<?php echo Yii::app()->createUrl('temples/bythemehistory'); ?>" class="temple-menu-rr-active"><?php echo t('History'); ?></a></li>
                      <li><a href="<?php echo Yii::app()->createUrl('temples/bythemebeliefs'); ?>"><?php echo t('Beliefs'); ?></a></li>
                      <?php /*?><li><a href="#"><?php echo t('Ancestral'); ?></a></li><?php */?>

                      <li><a href="<?php echo Yii::app()->createUrl('temples/jain'); ?>"><?php echo t('Jain'); ?></a></li>
                      <li><a href="<?php echo Yii::app()->createUrl('temples/buddhist'); ?>"><?php echo t('Buddhist'); ?></a></li>
                      <li><a href="<?php echo Yii::app()->createUrl('temples/sikh'); ?>"><?php echo t('Sikh'); ?></a></li>
                    </ul>
                    </div>
                </div>
                  
                 <?php if( isset($AllTemples) && count($AllTemples)>0 ) { ?>
                <div class="temple-list-count">Total No of Temples : <span id="total_temples"><?php echo $item_count; ?></span></div>
                <div class="theme-god-row" >
                  <ul id="projects">
                    <?php  foreach ( $AllTemples as $temple ) { ?>
                    <li> <a href="<?php echo Yii::app()->createUrl('temples/info',array('id'=>$temple->id));?>" target="_blank"> <span><img style="height:138px; width:190px;" title="<?php echo $temple->name; ?>" alt="<?php echo $temple->name; ?>" src="<?php echo Gallery::GetPropThumbnail($temple->id); ?>"></span> <p><?php echo $temple->name; ?></p> </a>
                     <?php 
					  
					  $Rate = Writeyourreviews::model()->findAll(array('condition'=>'status = 1 AND parent ='.$temple->id )); 
                      if( isset($Rate) && count($Rate)>0 ) { 
                      	$Tavg = 0;
                        	foreach ($Rate as $ra) { $avg = (int) ( $ra->divine_power + $ra->popularity + $ra->accessibility + $ra->facility_food + $ra->cleanliness ) / 5; 
													 $Tavg = $Tavg + $avg;
							}
							$Actual_rating = (int) ($Tavg / count($Rate));
                      ?>
                      <p class="temple-rating-viwe"><?php echo "Rating"; ?> : <img src="<?php echo $layout_asset; ?>/images/rating/<?php echo $Actual_rating; ?>.png" /> </p>
                      <?php } else { ?>
                      <p class="temple-rating-viwe"><?php echo "Rating"; ?> : <img src="<?php echo $layout_asset; ?>/images/rating/0.jpg" /> </p>
                      <?php } ?>
                    </li>
                    <?php } ?>
                  </ul>
                  <div class="clr"></div>
                </div>
                 <div class="paginate">
                  <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
                </div>
                 <?php  } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="theme-part-right">
        <?php $this->renderPartial('//layouts/ads-right-pane',array('layout_asset'=>$layout_asset)); ?>
      </div>
      <div class="clr"></div>
    </div>
  </div>
</div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
