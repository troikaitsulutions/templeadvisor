<?php $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; ?>
<?php     
       if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>

<div class="row-fluid">
  <div class="span8">
    <div class="head">
      <div class="isw-grid"></div>
      <h1>About <?php echo $model->name.' - '.$model->id; ?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/beatinfo/update','id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="headInfo">
      <div class="image"> <a><?php echo $model->name; ?></a> <img src="<?php echo Gallery::GetPropThumbnail($model->id); ?>" width="100px" class="img-polaroid"/></div>
      <div class="info">
        <address>
        <strong> <?php echo $model->name.' - '.$model->id; ?> </strong><br>
        <?php echo $model->address; ?><br>
        <?php echo Town::GetName($model->town).', '.District::GetName($model->district).' , '.State::GetName($model->state); ?><br>
        </address>
      </div>
     
      <div class="clear"></div>
      <div class="block">
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
                        
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Name'); ?></span> : <?php echo $model->name; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Under the Type'); ?></span> : <?php echo  Atlist::GetName($model->type); ?></p></td>
            </tr>
            
            
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Contact Person Name'); ?></span> : <?php echo $model->contact_people; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Contact Email Id'); ?></span> : <?php echo $model->email; ?></p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Telephone Number'); ?></span> : <?php echo $model->tele; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Mobile Number'); ?></span> : <?php echo $model->mobile; ?></p></td>
            </tr>
             <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Best Time to Visit'); ?></span> : <?php echo $model->best_time; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Time Duration For Visit'); ?></span> : <?php echo $model->visit_hour; ?></p></td>
            </tr>
            
         <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Timing Details'); ?></span> :</br>
               <?php echo $model->t1_name.' - From '.(Atinfo::getTiming1($model->t1_from)) .' to '.(Atinfo::getTiming2($model->t1_to)); ?> </br>
                 <?php echo $model->t2_name.' - From '.(Atinfo::getTiming1($model->t2_from)) .' to '.(Atinfo::getTiming2($model->t2_to)); ?> </br>
                   <?php echo $model->t3_name.' - From '.(Atinfo::getTiming1($model->t3_from)) .' to '.(Atinfo::getTiming2($model->t3_to)); ?> </br>
               </p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Best Season For'); ?></span> : </br>
               <?php echo $model->m1_name.' - From '.(Atinfo::getMonth($model->m1_from)) .' to '.(Atinfo::getMonth($model->m1_to)); ?> </br>
                 <?php echo $model->m2_name.' - From '.(Atinfo::getMonth($model->m2_from)) .' to '.(Atinfo::getMonth($model->m2_to)); ?> </br>
                   <?php echo $model->m3_name.' - From '.(Atinfo::getMonth($model->m3_from)) .' to '.(Atinfo::getMonth($model->m3_to)); ?> </br>
                   </p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Holiday Details'); ?></span> : </br>
			  <?php echo $model->h1_name.' - From '.(Atinfo::getDays($model->h1_from)) .' to '.(Atinfo::getDays($model->h1_to)); ?> </br>
                 <?php echo $model->h2_name.' - From '.(Atinfo::getMonth($model->h2_from)) .' to '.(Atinfo::getMonth($model->h2_to)); ?> </br>
                   <?php echo $model->h3_name.' - From '.(Atinfo::getMonth($model->h3_from)) .' to '.(Atinfo::getMonth($model->h3_to)); ?> </br>
              </p></td>
               <td><p class="about"> <span class="label label-success"><?php echo t('GPS Latitude'); ?></span> : <?php echo $model->latitude; ?></p>
              <p class="about"> <span class="label label-success"><?php echo t('Longitude'); ?></span> : <?php echo $model->longitude; ?></p>
              </td>  
            </tr>
            <tr>
              <td colspan="2"><p class="about"> <?php echo $model->comment; ?></p></td>
            </tr>
          </tbody>
        </table>
          <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
           <tr>
           <p class="about"> <span class="label label-success"><?php echo t('Available Facilities'); ?></span> : </br>
		    <?php
						$Faci = Atfacility::model()->findAll(); 
						$avail = explode('|',$model->facility);
						if($Faci){
							foreach ($Faci as $Fa) {
								if (in_array($Fa->id, $avail)) {
    								echo $Fa->name.', ';
									
									
								}
								
							}
						}
                    ?>
                    
		 </p>
           </tr>
        </tbody>
        </table>
      </div>
      <div class="clear"></div>
      
    </div>
  </div>
  
</div>


</div>
