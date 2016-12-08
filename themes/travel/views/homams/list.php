<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		//Yii::app()->clientScript->registerCssFile($layout_asset.'/css/style-orange.css');	
			?>
<?php $this->renderPartial('//layouts/homam-list-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>

<section id="content">
  <div class="container">
    <div id="main">
      <div class="row add-clearfix image-box style1 tour-locations">
        <div class="col-sm-4 col-md-3">
          <h4 class="search-results-title"><i class="soap-icon-search"></i><b> <?php echo Homamlist::model()->countByAttributes(array( 'status'=> 1 )); ?></b> Homams Found.</h4>
          <?php
	  					$HPurposes = Purpose::model()->findAll(array('condition'=>'type = 2'));
						if( isset($HPurposes) && count($HPurposes)>0 ) { 
	 	?>
          <div class="toggle-container filters-container">
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> 
			  <a data-toggle="collapse" href="#accomodation-type-filter">
			  <?php echo t('Homam Purpose'); ?></a> </h4>
              <div id="accomodation-type-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option homam-purpose">
                    <?php 
						foreach ( $HPurposes as $hp) {
							
							$hc = Homamlist::model()->countByAttributes(array( 'status'=> 1, 'purpose'=>$hp->id ));
							if( isset($hc) && $hc>0 ) {
					?>
                    <li id="<?php echo $hp->id; ?>"><a href="#"><?php echo $hp->name; ?>(<?php echo $hc; ?>)</small></a></li>
                    <?php } } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="sort-by-section clearfix">
            <h4 class="sort-by-title block-sm">Sort results by:</h4>
            <ul class="sort-bar clearfix block-sm">
              <li class="sort-by-name" id='name'><a class="sort-by-container" href="#"><span>name</span></a></li>
              
            </ul>
          </div>
          <div class="car-list">
            <div class="row image-box car listing-style1">
             
              
			<?php
				$this->widget('zii.widgets.CListView', array(
			    'dataProvider'=>$model->search(),
				'itemView'=>'_list',
				'id' => 'HomamList',
				'summaryText' => 'Showing {start} to {end} of {count} Homams',
				'ajaxUpdate' => true,  // This is it.
				'pager'=>array('header'=>'<h5>Homam List Page </h5>'),
				'htmlOptions' => array('class' => 'grid-view rounded'),
				)); 
            ?>
				 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
$current_url = Yii::app()->createUrl('homams/list');

$SelectJs = "
$(document).ready(function() 
 {
	var FilterLeft = '';
	var Sort = '';
	var baseurl ='';
	
    $('ul.homam-purpose li').click(function(e) 
    { 
		FilterLeft = '';
		$('ul.homam-purpose li').each(function () {
			
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
		baseurl += '?filter='+FilterLeft+'&sort='+Sort;
		
		jQuery.fn.yiiListView.update('HomamList',{url:baseurl});
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
		baseurl += '?filter='+FilterLeft+'&sort='+Sort;
		
		jQuery.fn.yiiListView.update('HomamList',{url:baseurl});
		
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>
