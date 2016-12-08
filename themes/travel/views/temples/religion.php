<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
$religionslug = isset($_GET['religion']) ? strtolower(trim($_GET['religion'])) : '';
			?>
<?php $this->renderPartial('//layouts/temple-list-page-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>

<section id="content">
  <div class="container">
    <div id="main">
      <div class="row">
        <div class="col-sm-4 col-md-3">
         
          
			<div class="toggle-container filters-container">
		<?php
			$AllRegion = Reg::model()->findAll();
			if( isset($AllRegion) && count($AllRegion)>0 ) {
		?>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#historical-type-filter">Region</a> </h4>
		
		<?php if($religion == 1001) { ?>        
			<div id="historical-type-filter" class="panel-collapse collapse">
		<?php } else { ?>
			<div id="historical-type-filter" class="panel-collapse collapse in">
		<?php } ?>
		
		<div class="panel-content">
                  <ul class="check-square filters-option region">
                    <?php 
						foreach ($AllRegion as $ar ) {
							$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND region = '.$ar->id.' AND religion = '.$religion));
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$ar->uid)));
							if(isset($RegSeo) && count($RegSeo)>0 ) {
					?>
					<li id="<?php echo $ar->id; ?>"><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
						<?php } } ?>
                    
                  </ul>
                </div>
              </div>
            </div>
			<?php } ?>    
          </div>
				  
		  <div class="toggle-container filters-container">
		  
			<?php if($religion == 1001) { ?>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#accomodation-type-filter">Hindu Deity</a> </h4>
              <div id="accomodation-type-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option hindu-deity">
				  
				<?php	
				  	$DietyList = Diety::model()->findAll(array("condition"=>"id != 1010 AND status = 1","order"=>"mnu_order ASC"));	
						if( isset($DietyList) && count($DietyList)>0 ) 
						{
							foreach ( $DietyList as $DietyName ) 
							{
								$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND religion = 1001 AND sdeity = '.$DietyName->id));
								if( isset($tot_temples) && count($tot_temples) >= 0 ) 
								{ ?>
									<li id="<?php echo $DietyName->id; ?>"><a href="<?php echo $DietyName->id; ?>"><?php echo $DietyName->name; ?><small>(<?php echo count($tot_temples); ?>)</small></a></li>
							<?php } 
							} 
						}
				?>
                  </ul>
                </div>
              </div>
            </div>
							<?php } ?>
			</div>
		  
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
$current_url = Yii::app()->createUrl('temples/byreligion', array('country' => 'temples-in-india','religion' => $religionslug ));

$SelectJs = "
$(document).ready(function() 
 {
	var FilterDeity = '';
	var Sort = '';
	var FilterRegion = '';
	var baseurl ='';
	
    $('ul.hindu-deity li').click(function(e) 
    { 
		FilterDeity = '';
		$('ul.hindu-deity li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(FilterDeity=='') 
				{
					FilterDeity = $( this ).attr('id');
				} else {
					
					FilterDeity += ','+$( this ).attr('id');
				}
				
			}
        })
		baseurl = '$current_url';
		baseurl += '?filter='+FilterDeity+'&sort='+Sort+'&region='+FilterRegion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
    });
	
	$('ul.region li').click(function(e) 
    { 
		FilterRegion = '';
		$('ul.region li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(FilterRegion=='') 
				{
					FilterRegion = $( this ).attr('id');
				} else {
					
					FilterRegion += ','+$( this ).attr('id');
				}
				
			}
        })
		baseurl = '$current_url';
		baseurl += '?filter='+FilterDeity+'&sort='+Sort+'&region='+FilterRegion;
		
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
		baseurl += '?filter='+FilterDeity+'&sort='+Sort+'&region='+FilterRegion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
		
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>
