<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		//Yii::app()->clientScript->registerCssFile($layout_asset.'/css/style-orange.css');	
		
?>
<?php $this->renderPartial('//layouts/puja-list-page-bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>

<section id="content">
  <div class="container">
    <div id="main">
      <div class="row add-clearfix image-box style1 tour-locations">
        <div class="col-sm-4 col-md-3">
          
          <div class="toggle-container filters-container1">
            <?php
			$PoojaPurposes = Pujapurpose::model()->findAll(array('condition'=>'status = 1'));
			if( isset($PoojaPurposes) && count($PoojaPurposes)>0 ) { 
			?>
           
			<div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#region-filter">Puja By Purpose</a> </h4>
              <div id="region-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option region">
                    <?php 
						
						foreach ( $PoojaPurposes as $p) 
						{
							
							$TotPujas = Poojalist::model()->findAll(array('condition'=>'status = 1 AND purpose = '.$p->id));
						
								if(count($TotPujas)>0 )
								{
								
									$PurposeSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$p->uid)));
								
									if(isset($PurposeSeo) && count($PurposeSeo)>0 ) 
									{
										if($p->id == $purpose) 
										{ 
							?>
										<li class="active" id="<?php echo $p->id;?>" ><a href="<?php echo Yii::app()->createUrl('poojas/list',array('pooja'=>'online-pujas', 'pcategory'=>$PurposeSeo->slug)); ?>"> <?php echo $PurposeSeo->mainmenu; ?> <small>(<?php echo count($TotPujas); ?>)</small> </a></li>
							<?php 
										} else { 
							?>
										<li id="<?php echo $p->id;?>"><a href="<?php echo Yii::app()->createUrl('poojas/list',array('pooja'=>'online-pujas', 'pcategory'=>$PurposeSeo->slug)); ?>"> <?php echo $PurposeSeo->mainmenu; ?> <small>(<?php echo count($TotPujas); ?>)</small> </a></li>
							<?php			
										}
							?>
							<?php 	} 
					
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
          <div class="sort-by-section clearfix">
    <h4 class="sort-by-title block-sm">Sort results by:</h4>
    <ul class="sort-bar clearfix block-sm">
        <li class="sort-by-name" id='name'><a class="sort-by-container" href="#"><span>Name</span></a></li>
        <li class="sort-by-popularity" id='state'><a class="sort-by-container" href="#"><span>State</span></a></li>
    </ul>
</div>
          <div class="car-list">
            <div class="row image-box car listing-style1">
                <?php
           $this->widget('zii.widgets.CListView', array(
			    'dataProvider'=>$model->search(),
				'itemView'=>'_list',
				'id' => 'PujaList',
				'summaryText' => 'Showing {start} to {end} of {count} Pujas',
				'ajaxUpdate' => true,  // This is it.
				'pager'=>array('header'=>'<h5>Puja Page </h5>'),
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
$current_url = Yii::app()->createUrl('poojas/list',array('pooja'=>'online-pujas', 'pcategory'=>$meta->slug));

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
		baseurl += '?sort='+Sort;
		
		jQuery.fn.yiiListView.update('PujaList',{url:baseurl});
		$('html, body').animate({ scrollTop: 0 }, 'slow');
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>

