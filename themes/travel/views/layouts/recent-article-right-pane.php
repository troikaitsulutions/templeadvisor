<?php
		$limit = 25;
		if( isset($count) && ( $count!=0 ) ) { $limit=$count; }
		$Contributemyarticles = Contributemyarticle::model()->findAll(array(
							'condition'=>'status = 1',
							'order' => 'created DESC',
							'limit' =>$limit,
							'offset'=>10
						));

		if ( isset($Contributemyarticles) && count($Contributemyarticles)>0 ) { ?>

		<div class="toggle-container filters-container1">
			<div class="panel style1 arrow-right">
              <h4 class="panel-title"> <a data-toggle="collapse" href="#deity-filter">Recent Articles</a> </h4>
              <div id="deity-filter" class="panel-collapse collapse in">
                <div class="panel-content">
                  <ul class="check-square filters-option">
				<?php foreach ( $Contributemyarticles as $Contributemyarticle) { ?>
					<li id="<?php echo $Contributemyarticle->id; ?>">
					<a href="<?php echo Yii::app()->createUrl('articles/articleread',array('aid'=>$Contributemyarticle->id)); ?>"><?php echo $Contributemyarticle->heading; ?></a></li>
				<?php } ?>
                  </ul>
                </div>
              </div>
            </div>
        </div>

		<?php } ?>