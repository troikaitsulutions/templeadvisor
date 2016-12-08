<?php
	if(YII_DEBUG)
        $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
    else
        $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
	
	$regionslug = isset($_GET['region']) ? strtolower(trim($_GET['region'])) : '';
?>

<?php $this->renderPartial('//layouts/temple-list-page-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>

<section id="content">
  <div class="container">
    <div id="main">
      <div class="row">
        <div class="col-sm-4 col-md-3">
		<div class="toggle-container filters-container1">
			<?php
			$AllRegion = Reg::model()->findAll();
			if( isset($AllRegion) && count($AllRegion)>0 ) {
			
			?>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#region-filter">Region</a> </h4>
              <div id="region-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <?php 
						foreach ($AllRegion as $ar ) {
							$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND region = '.$ar->id));
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$ar->uid)));
							if(isset($RegSeo) && count($RegSeo)>0 ) {
							if($ar->id == $region) 
							{ ?>
								
								<li class="active" id="<?php echo $ar->id;?>" ><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
								
							<?php 
							} else { 
							?>
								<li id="<?php echo $ar->id;?>"><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
							<?php			
							}
							?>
						<?php } } ?>
                  </ul>
                </div>
              </div>
            </div>
			<?php } ?>    
        </div>
		  
		<div class="toggle-container filters-container">
			<div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#deity-filter" class="collapsed">Hindu Deity</a> </h4>
              <div id="deity-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option hindu-deity">
				<?php	
				  	$DietyList = Diety::model()->findAll(array("condition"=>"id != 1010 AND status = 1","order"=>"mnu_order ASC"));	
						if( isset($DietyList) && count($DietyList)>0 ) 
						{
							foreach ( $DietyList as $DietyName ) 
							{
								$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND religion = 1001 AND sdeity = '.$DietyName->id.' AND region = '.$region));
								if( isset($tot_temples) && count($tot_temples) > 0 ) 
								{ ?>
									<li id="<?php echo $DietyName->id; ?>"><a href="<?php echo $DietyName->id; ?>"><?php echo $DietyName->name; ?><small>(<?php echo count($tot_temples); ?>)</small></a></li>
				<?php 			} 
							} 
						}
				?>
                  </ul>
                </div>
              </div>
            </div>
        </div>
		  <?php
	  	$AllReligion = Religion::model()->findAll(array('condition'=>'id != 1001'));
	  	if( isset($AllReligion) && count($AllReligion)>0 ) { ?>
			
		<div class="toggle-container filters-container">
			<div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#other-religion-filter" class="collapsed">Others</a> </h4>
              <div id="other-religion-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option other-religion">
				  
				  <?php
	  
			foreach ($AllReligion as $rel ) {
				$RelSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$rel->uid)));
				if(isset($RelSeo) && count($RelSeo)>0 ) {	
					$Tcount = Temples::model()->findAll(array('condition' => 'status = 1 AND religion= :REL AND region= :REG', 'params'=>array(':REL' => $rel->id, ':REG' => $region )));
	  ?>
		<li id="<?php echo $rel->id; ?>"><a href="<?php echo $rel->id; ?>"><?php echo $rel->name; ?><small>(<?php echo count($Tcount); ?>)</small></a></li>  
		<?php } }  ?>
		
				
                  </ul>
                </div>
              </div>
            </div>
        </div>
		
				<?php } ?>
		
        </div>
        
		<div class="col-sm-8 col-md-9">
		<?php $this->renderPartial('//layouts/temple-list-page-header-tab',array('layout_asset'=>$layout_asset)); ?>
		<hr />
        <div class="row image-box flight listing-style1">
           <?php
           $this->widget('zii.widgets.CListView', array(
			    'dataProvider'=>$model->search(),
				'itemView'=>'_list',
				'id' => 'TempleList',
				'summaryText' => 'Showing {start} to {end} of {count} Temples',
				'ajaxUpdate' => true,  // This is it.
				'pager'=>array('header'=>'<h5>Temple Page </h5>'),
				'htmlOptions' => array('class' => 'grid-view rounded'),
				)); 
             ?>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
$current_url = Yii::app()->createUrl('temples/list', array('country' => 'temples-in-india','region' => $regionslug ));

$SelectJs = "
$(document).ready(function() 
 {
	var FilterLeft = '';
	var Sort = '';
	var FilterReligion = '';
	var baseurl ='';
	
    $('ul.hindu-deity li').click(function(e) 
    { 
		FilterLeft = '';
		$('ul.hindu-deity li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(FilterLeft=='') 
				{
					FilterLeft = $( this ).attr('id');
				} else {
					
					FilterLeft += ','+$( this ).attr('id');
				}
				
			}
        })
		baseurl = '$current_url';
		baseurl += '?filter='+FilterLeft+'&sort='+Sort+'&religion='+FilterReligion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
    });
	
	$('ul.other-religion li').click(function(e) 
    { 
		FilterReligion = '';
		$('ul.other-religion li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(FilterReligion=='') 
				{
					FilterReligion = $( this ).attr('id');
				} else {
					
					FilterReligion += ','+$( this ).attr('id');
				}
				
			}
        })
		baseurl = '$current_url';
		baseurl += '?filter='+FilterLeft+'&sort='+Sort+'&religion='+FilterReligion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
    });
	
	$('ul.sort-bar li').click(function(e) 
    { 
		Sort = '';
		
		
		$('ul.sort-bar li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(Sort=='') 
				{
					Sort = $( this ).attr('id')+' ASC';
				} else {
					
					Sort += ','+$( this ).attr('id')+' ASC';
				}
				
			}
        })
			
		
		baseurl = '$current_url';
		baseurl += '?filter='+FilterLeft+'&sort='+Sort+'&religion='+FilterReligion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
		
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>
