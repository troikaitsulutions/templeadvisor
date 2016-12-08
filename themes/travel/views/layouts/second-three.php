
<div class="section container second-three">
                <div class="row image-box style10">
                   <?php
			$CountryList = Country::model()->findByPk(1016);
			if(isset($CountryList) && count($CountryList)>0 ) {
				$CountrySeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$CountryList->uid)));
				  if(isset($CountrySeo)) {
		?>
                   
                    <div class="col-md-4">
                        <article class="box box_temp">
                            <figure>
                                <a title="All Temples" href="<?php echo $this->createUrl('temples/index',array('country' => $CountrySeo->slug)); ?>"><img width="370" height="132" alt="All Temples" src="<?php echo $layout_asset; ?>/images/all_temples.jpg"></a>
                            </figure>
                            <div class="details">
                                <a href="<?php echo $this->createUrl('temples/index',array('country' => $CountrySeo->slug)); ?>" class="button">Click</a>
                                <h4 class="box-title">Get Details<br><small>About Deity, Location, Timings and More</small></h4>
                            </div>
                        </article>
                    </div>
                    <?php } }?>
                    <div class="col-md-4">
                        <article class="box">
                            <figure>
                                <a title="All Tour Packages" href="<?php echo Yii::app()->createUrl('tours/index',array('country'=>'tours-around-india'))?>"><img width="370" height="132" alt="All Tour Packages" src="<?php echo $layout_asset; ?>/images/all_tours.jpg"></a>
                            </figure>
                            <div class="details">
                                <a href="<?php echo Yii::app()->createUrl('tours/index',array('country'=>'tours-around-india'))?>" class="button">Book</a>
                                <h4 class="box-title">Plan Your Trip<br><small>Book Now & Avail 2016 Hot Deals</small></h4>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4">
                        <article class="box">
                            <figure>
                                <a title="Pooja Items" href="<?php echo Yii::app()->createUrl('store/index',array('store'=>'online-store'))?>"><img width="370" height="132" alt="Pooja Items" src="<?php echo $layout_asset; ?>/images/pooja_items.jpg"></a>
                            </figure>
                            <div class="details">
                                <a href="<?php echo Yii::app()->createUrl('store/index',array('store'=>'online-store'))?>" class="button">Buy</a>
                                <h4 class="box-title">Buy Pooja Items Online<br><small>Books, Music, Pooja Items and More</small></h4>
                            </div>
                        </article>
                    </div>
                </div>
            </div>