<?php
	$PujaPurpose = Pujapurpose::model()->findByPk($data->purpose);
	$PurposeSeo = Seo::GetPageSeo($PujaPurpose->uid);
	$PujaSeo = Seo::GetPageSeo($data->uid);
?>
              <div class="col-sms-6 col-sm-6 col-md-4 puja-items">
                <article class="box">
                  <figure> <a href="<?php echo Yii::app()->createUrl('poojas/detail',array('pooja'=>'online-pujas', 'pcategory'=>$PurposeSeo->slug,'pid'=>$PujaSeo->slug)); ?>"> <img src="<?php echo Poojalist::GetThumbnail($data->icon_file); ?>" alt="<?php echo $data->name; ?>"> </a> </figure>
                  <div class="details"> 
                    <h4 class="box-title puja-name">
					<?php echo $data->name; ?><small><?php echo Temples::GetName($data->temple); ?></small></h4>
                    <h5 style="text-align:center !important;"><span class="price" <span class="price" style="text-align:center !important;"><?php echo 'Rs. '.$data->sitecost; ?></span></h5>
                    <a href="<?php echo Yii::app()->createUrl('poojas/detail',array('pooja'=>'online-pujas', 'pcategory'=>$PurposeSeo->slug,'pid'=>$PujaSeo->slug)); ?>" class="button btn-small full-width">Request a Puja</a> </div>
                </article>
              </div>
             