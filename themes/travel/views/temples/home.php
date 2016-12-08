<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
?>

<section id="content">
  <div class="section gray-area most-popular">
    <div class="container">
      <h2><?php echo t('SEARCH BY REGION'); ?></h2>
      <div class="row image-box car listing-style1">
      <?php
	  	$AllRegion = Reg::model()->findAll();
	  	if( isset($AllRegion) && count($AllRegion)>0 ) {
			foreach ($AllRegion as $ar ) {
				$tot_temples = Temples::model()->findAll(array('condition'=>'status = 1 AND region = '.$ar->id));
				$RegSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$ar->uid)));
				if(isset($RegSeo) && count($RegSeo)>0 ) {
	  ?>
        <div class="col-sm-6 col-md-3">
          <article class="box">
            <figure> <a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"><img alt="<?php echo $ar->name; ?>" src="<?php echo Reg::GetThumbnail($ar->icon_file); ?>" ></a> </figure>
            <div class="details">
              <h4 class="box-title" style="text-transform:uppercase"><a href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"><?php echo $RegSeo->mainmenu; ?></a></h4>
              <p class="mile"><span class="skin-color">Total Temples:</span> <?php echo count($tot_temples); ?> Available</p>
              <div class="action"> <a class="button btn-small full-width" href="<?php echo Yii::app()->createUrl('temples/list',array('country'=>'temples-in-india', 'region'=> $RegSeo->slug )); ?>"><?php echo t('SELECT NOW'); ?></a> </div>
            </div>
          </article>
        </div>
        <?php } } } ?>
      </div>
    </div>
  </div>
  
  
  <div class="section gray-area most-popular">
    <div class="container">
      <h2><?php echo t('SEARCH BY THEME'); ?></h2>
      <div class="row image-box car listing-style1">
        <?php
	  	$AllReligion = Religion::model()->findAll();
	  	if( isset($AllReligion) && count($AllReligion)>0 ) {
			foreach ($AllReligion as $rel ) {
				$RelSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$rel->uid)));
				if(isset($RelSeo) && count($RelSeo)>0 ) {
					$Tcount = Temples::model()->findAll(array('condition' => 'status = 1 AND religion= :REL', 'params'=>array(':REL' => $rel->id )));
	  ?>
        <div class="col-sm-6 col-md-3">
          <article class="box">
            <figure> <a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => $RelSeo->slug)); ?>"><img alt="<?php echo $rel->name; ?>" src="<?php echo Religion::GetThumbnail($rel->icon_file); ?>"></a> </figure>
            <div class="details">
              <h4 class="box-title" style="text-transform:uppercase"><a href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => $RelSeo->slug)); ?>"><?php echo $RelSeo->mainmenu; ?></a></h4>
              <p class="mile"><span class="skin-color">Total Temples:</span> <?php echo count($Tcount); ?></p>
              <div class="action"> <a class="button btn-small full-width" href="<?php echo Yii::app()->createUrl('temples/byreligion',array('country'=>'temples-in-india', 'religion' => $RelSeo->slug)); ?>"><?php echo t('SELECT NOW'); ?></a> </div>
            </div>
          </article>
        </div>
        <?php } } } ?>
      </div>
    </div>
  </div>
  
  
  <div class="section gray-area most-popular">
    <div class="container">
      <div class="row image-box car listing-style1">
        <?php
	  	$AllThemes = Themes::model()->findAll(array('condition'=>'addtohome = 1'));
	  	if( isset($AllThemes) && count($AllThemes)>0 ) {
			foreach ($AllThemes as $th ) {
				
				$ThemeList = Themelist::model()->findAll(array('condition'=>'source = :SID','params'=>array(':SID'=>$th->id)));
					if( isset($ThemeList) && count($ThemeList)>0 ) 
					{ 
						$sql = array();
						foreach ($ThemeList as $t) 
						{
							$sql[] = 'themelist LIKE "%'.$t->id.'%"';
						}
					}
				
				$query = implode(" OR ", $sql);
				
				$ThemeSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$th->uid)));
				if(isset($ThemeSeo) && count($ThemeSeo)>0 ) {	
					
					
					$criteria = new CDbCriteria();
					$criteria->addCondition('status = 1 AND ('.$query.') ');
					$item_count = Temples::model()->count($criteria);
					
	  ?>
        <div class="col-sm-6 col-md-3">
        <article class="box">
            <figure> <a href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme' => $ThemeSeo->slug)); ?>"> <img alt="<?php echo $th->name; ?>" src="<?php echo Themes::GetThumbnail($th->icon_file); ?>"></a> </figure>
            <div class="details">
              <h4 class="box-title" style="text-transform:uppercase"><a href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme' => $ThemeSeo->slug)); ?>"><?php echo $th->name; ?></a></h4>
              <p class="mile"><span class="skin-color">Total Temples:</span> <?php echo $item_count; ?> Available </p>
              <div class="action"> <a class="button btn-small full-width" href="<?php echo Yii::app()->createUrl('temples/bytheme',array('country'=>'temples-in-india', 'theme' => $ThemeSeo->slug)); ?>">SELECT NOW</a> </div>
            </div>
        </article>
        </div>
        <?php } } } ?>
        <div class="col-sm-6">
          <article class="box">
            <figure> <a href="#"> <img alt="" src="<?php echo $layout_asset; ?>/images/ad3.jpg" height="400px" width="600px"> </a> </figure>
          </article>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="global-map-area promo-box no-margin parallax" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="content-section description pull-right col-sm-9">
        <div class="table-wrapper hidden-table-sm">
          <div class="table-cell">
            <h2 class="m-title"> Comfortable and modern flight experience.<br />
              <em>400+ Airlines to Travel The World!</em> </h2>
          </div>
          <div class="table-cell action-section col-md-4 no-float">
            <form method="post" action="flight-list-view.html">
              <div class="row">
                <div class="col-xs-6 col-md-12">
                  <input type="text" class="input-text input-large full-width" value="" placeholder="Enter destination or hotel name" />
                </div>
                <div class="col-xs-6 col-md-12">
                  <button class="full-width btn-large">search flights</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="image-container col-sm-4"> <img src="http://placehold.it/290x234" alt="" class="animated" data-animation-type="fadeInUp" /> </div>
    </div>
  </div>
</section>



<div class="section gray-area most-popular">
  <div class="container">
    <?php $Featured = Temples::model()->findAll(array(
			'select'=>'*, rand() as rand',
			'condition'=>'status = 1 AND addtohome = 1',
			'order'=>'rand',
			'limit'=>10));
		  	if( isset($Featured) && count($Featured)>0 ) { 
	  ?>
    <div class="text-center description block">
      <h2><?php echo t('FEATURED TEMPLES'); ?></h2>
    </div>
     <div class="image-carousel style2" data-animation="slide" data-item-width="270" data-item-margin="30">
      <ul class="slides image-box style3">
        <?php 
			$i=1;
			foreach ( $Featured as $d) {
				
				$Religion = Religion::model()->findByPk($d->religion);
				$ReligionSeo = Seo::GetPageSeo($Religion->uid);
				$TempleSeo = Seo::GetPageSeo($d->uid);
		?>
        <li class="box">
          <figure> <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" title="<?php echo $d->name; ?>"><img src="<?php echo Gallery::GetPropThumbnail($d->id); ?>" alt="<?php echo $d->name; ?>" width="270" height="160"></a> </figure>
          <div class="details text-center">
            <div class="box-title home-featured-name"><?php echo $d->name; ?></div>
            <p class="offers-content">(15 Poojas)</p>
            <p class="description"><?php echo substr($d->famous_for,0,30); ?>...</p>
            <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>" class="button">VIEW DETAILS</a> </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>
  </div>
</div>

<?php 
	Yii::app()->clientScript->registerScriptFile($layout_asset.'/components/flexslider/jquery.flexslider.js', CClientScript::POS_END);
?>
