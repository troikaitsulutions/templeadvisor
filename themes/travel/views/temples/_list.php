<?php
	$Religion = Religion::model()->findByPk($data->religion);
	$ReligionSeo = Seo::GetPageSeo($Religion->uid);
	$TempleSeo = Seo::GetPageSeo($data->uid);
?>
<div class="col-sm-6 col-md-4"> 
    <article class="box list-page">
		<figure> <a href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>"><img style="height:160px !important; width:240px !important;" alt="<?php echo $data->name; ?>" src="<?php echo Gallery::GetPropThumbnail($data->id); ?>" ></a> </figure>
            <div class="details">
                  <div class="box-title"><?php echo $data->name; ?> <small><?php echo Town::GetName($data->town).', '.State::GetName($data->state); ?></small></div>
                  <div class="time">
					<div class="take-off">
                      <div class="icon"><i class="soap-icon-calendar yellow-color"></i></div>
                      <div class="timing"> <span class="wine-color">Next Event on</span><br />
					<?php
					$EventList = Festivalevent::model()->find(array(
									'condition'=>'status = 1 AND temples LIKE :TMP',
									'params'=>array(':TMP'=>'"%'.$this->id.'%"'),
									'order' => 'fdate DESC'
									));
					if(count($EventList)>0) 
						{
							echo date('D M Y', $EventList->fdate).'<br />'.$EventList->name;
						} else { ?>
							No Events <br /> Found
					<?php } ?>
						
						</div>
                    </div>

					<div class="landing">
                      <div class="icon"><i class="soap-icon-fireplace yellow-color"></i></div>
                      <div class="timing"> <span class="wine-color">Puja(s)</span><br />
                       <?php echo ($data->poojas == 0) ? 'No Pujas' :$data->poojas.' Puja(s)'; ?> Available<br />
                        <!-- <a class="button btn-mini yellow">Book Now</a> --> </div> 
                    </div>
					
                  </div>
                  <div class="action"> 
				  <a class="button btn-small" style="width:100%" href="<?php echo Yii::app()->createUrl('temples/detail',array('country'=>'temples-in-india', 'religion' => $ReligionSeo->slug, 'tid' => $TempleSeo->slug));?>">VIEW DETAIL</a> 
				  <!-- <a class="button btn-small yellow" href="#">Book A Trip</a> --> 
				  </div> 
			</div>
    </article>
</div>