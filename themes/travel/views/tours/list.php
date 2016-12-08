<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.travel'), false, -1, false);
		//Yii::app()->clientScript->registerCssFile($layout_asset.'/css/style-orange.css');	
			?>
<?php $this->renderPartial('//layouts/bcrumbs1',array('layout_asset'=>$layout_asset, 'meta'=>$meta, 'BreadCrumbs' => $BreadCrumbs )); ?>

<section id="content">
  <div class="container">
    <div id="main">
      <div class="row add-clearfix image-box style1 tour-locations">
        <div class="col-sm-4 col-md-3">
          <h4 class="search-results-title"><i class="soap-icon-search"></i><b><?php echo $items_count; ?></b> Tours found.</h4>
          <div class="toggle-container filters-container">
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#pilgrimage-type-filter" class="collapsed">Pilgrimage Packages</a> </h4>
              <div id="pilgrimage-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <li><a href="#">South India Packages<small>(263)</small></a></li>
                    <li><a href="#">North India Packages<small>(232)</small></a></li>
                    <li><a href="#">East India Packages<small>(1)</small></a></li>
                    <li class="active"><a href="#">West India Packages<small>(177)</small></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#historical-type-filter" class="collapsed">Historical Packages</a> </h4>
              <div id="historical-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <li><a href="#">South India Packages<small>(263)</small></a></li>
                    <li class="active"><a href="#">North India Packages<small>(232)</small></a></li>
                    <li><a href="#">East India Packages<small>(1)</small></a></li>
                    <li><a href="#">West India Packages<small>(177)</small></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#family-type-filter" class="collapsed">Family Packages</a> </h4>
              <div id="family-type-filter" class="panel-collapse collapse">
                <div class="panel-content">
                  <ul class="check-square filters-option">
                    <li class="active"><a href="#">South India Packages<small>(263)</small></a></li>
                    <li><a href="#">North India Packages<small>(232)</small></a></li>
                    <li><a href="#">East India Packages<small>(1)</small></a></li>
                    <li><a href="#">West India Packages<small>(177)</small></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-9">
          <div class="sort-by-section clearfix">
            <h4 class="sort-by-title block-sm">Sort results by:</h4>
            <ul class="sort-bar clearfix block-sm">
              <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
              <!--<li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
              <li class="clearer visible-sms"></li>
              <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>rating</span></a></li>
              -->
              <li class="sort-by-popularity active"><a class="sort-by-container" href="#"><span>Price</span></a></li>
            </ul>
            <!--
            <ul class="swap-tiles clearfix block-sm">
              <li class="swap-list"> <a href="hotel-list-view.html"><i class="soap-icon-list"></i></a> </li>
              <li class="swap-grid active"> <a href="hotel-grid-view.html"><i class="soap-icon-grid"></i></a> </li>
              <li class="swap-block"> <a href="hotel-block-view.html"><i class="soap-icon-block"></i></a> </li>
            </ul>
            --> 
          </div>
          <div class="car-list">
            <div class="row image-box car listing-style1">
              <?php 
			  
			  if(isset($AllTours) && count($AllTours)>0 ){
			  foreach ($AllTours as $at) {
			  
			   ?>
              <div class="col-sms-6 col-sm-6 col-md-4">
                <article class="box">
                  <figure> <a href="#"> <img src="<?php echo Tourpackage::GetThumbnail($at->icon_file); ?>" alt="<?php echo $at->name; ?>"> </a> </figure>
                  <div class="details"> 
                    <h4 class="box-title"><?php echo $at->name; ?></h4>
                    <h5 class="box-title"> <span class="price" style="text-align:center !important; padding-bottom:20px;"><?php echo 'Rs. '.$at->total; ?></span> </h5>
                    <div class="row time">
                      <div class="date col-xs-6 first"> <i class="soap-icon-calendar yellow-color"></i>
                        <div> <span class="skin-color">Duration</span><br />
                          4D 3N </div>
                      </div>
                      <div class="departure col-xs-6 last"> <i class="soap-icon-car yellow-color"></i>
                        <div> <span class="skin-color">Mode of Travel</span><br />
                          Car/Bus </div>
                      </div>
                    </div>
                   
                    <a href="#" class="button btn-small full-width">GET DETAILS</a> </div>
                </article>
              </div>
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
