<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		
		$themeslug = isset($_GET['theme']) ? strtolower(trim($_GET['theme'])) : '';
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
              <div id="historical-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option region">
				  
					<?php

						$SlugSeo = Seo::model()->find(array('condition'=>'slug = :UID','params'=>array(':UID'=>$themeslug)));
						
						$theme = Themes::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$SlugSeo->uid)));
					
						$ThemeList = Themelist::model()->findAll(array('condition'=>'source = :SID','params'=>array(':SID'=>$theme->id)));
						if( isset($ThemeList) && count($ThemeList)>0 ) 
						{ 
							$sql = array();
							foreach ($ThemeList as $t) 
							{
								$sql[] = 'themelist LIKE "%'.$t->id.'%"';
							}
						}
					
						$query = implode(" OR ", $sql);
					?>
				  
                    <?php 
						foreach ($AllRegion as $ar ) {
							$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND region = '.$ar->id.' AND ('.$query.')'));
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$ar->uid)));
							if(isset($RegSeo) && count($RegSeo)>0 ) {
					?>
					<li  id="<?php echo $ar->id; ?>"><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
						<?php } } ?>
                  </ul>
                </div>
              </div>
            </div>
			<?php } ?>   
			
			<?php
				$SlugSeo = Seo::model()->find(array('condition'=>'slug = :UID','params'=>array(':UID'=>$themeslug)));
						
				$theme = Themes::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID'=>$SlugSeo->uid)));
					
				$ThemeList = Themelist::model()->findAll(array('condition'=>'source = :SID','params'=>array(':SID'=>$theme->id)));
				if( isset($ThemeList) && count($ThemeList)>0 ) 
					{ 
			?>
            <div class="panel style1 arrow-right">
					<?php if($themeslug=='list-by-beliefs') { ?>
						<h4 class="panel-title"> <a data-toggle="collapse" href="#faith-type-filter">Need</a> </h4>
					<?php } else { ?>
						<h4 class="panel-title"> <a data-toggle="collapse" href="#faith-type-filter">Description</a> </h4>	
					<?php } ?>
			 <div id="faith-type-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option themelist">
				  
					
                    <?php 
						foreach ($ThemeList as $tl ) {
							$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND themelist like "%'.$tl->id.'%"'));
							$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$tl->uid)));
							if(isset($RegSeo) && count($RegSeo)>0 ) {
					?>
					<li  id="<?php echo $tl->id; ?>"><a href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme'=> $RegSeo->slug )); ?>"> <?php echo $RegSeo->mainmenu; ?> <small>(<?php echo count($tot_temples); ?>)</small> </a></li>
						<?php } } ?>
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
				'ajaxUpdate' => true,
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
$current_url = Yii::app()->createUrl('temples/bytheme', array('country' => 'temples-in-india','theme' => $themeslug ));

$SelectJs = "
$(document).ready(function() 
 {
	var FilterDeity = '';
	var Sort = '';
	var FilterRegion = '';
	var baseurl ='';
	var ThemeList = '';
	
    
	
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
		baseurl += '?themelist='+ThemeList+'&sort='+Sort+'&region='+FilterRegion;
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
    });
	
	$('ul.themelist li').click(function(e) 
    { 
		ThemeList = '';
		$('ul.themelist li').each(function () {
			
			if ($( this ).hasClass('active')) 
			{
				if(ThemeList=='') 
				{
					ThemeList = $( this ).attr('id');
				} else {
					
					ThemeList += ','+$( this ).attr('id');
				}
				
			}
        })
		baseurl = '$current_url';
		baseurl += '?themelist='+ThemeList+'&sort='+Sort+'&region='+FilterRegion;
		
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
		baseurl += '?themelist='+ThemeList+'&sort='+Sort+'&region='+FilterRegion;
		
		
		jQuery.fn.yiiListView.update('TempleList',{url:baseurl});
		
    });
	
	

 });";

	/* $('#attached_deals_tab li.active').(...) */
Yii::app()->clientScript->registerScript('SelectFilter', $SelectJs); 
?>
