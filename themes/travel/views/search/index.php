<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';
			?>


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
							
							?>
								<li id="<?php echo $ar->id;?>"><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
							<?php			
							}
							?>
						<?php }  ?>
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
				'id' => 'SearchList',
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
$current_url = Yii::app()->createUrl('search/index', array('q' => $q ));

$SelectJs = "
$(document).ready(function() 
 {
	var Sort = '';
	var baseurl ='';
	  
	
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
		baseurl += '&sort='+Sort;
		
		jQuery.fn.yiiListView.update('SearchList',{url:baseurl});
		
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>
