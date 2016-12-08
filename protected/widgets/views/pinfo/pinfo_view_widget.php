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
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/bepinfo/update','id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="headInfo">
      <div class="image"> <a><?php echo $model->name; ?></a> <img src="<?php echo Gallery::GetPropThumbnail($model->id); ?>" width="100px" class="img-polaroid"/></div>
      <div class="info">
        <address>
        <strong> <?php echo $model->tt_name.' - '.$model->id; ?> </strong><br>
        <?php echo $model->address1.', '.$model->address2; ?><br>
        <?php echo Town::GetName($model->town).', '.Province::GetName($model->province).' , '.Region::GetName($model->region); ?><br>
        <?php echo Countrylist::GetName(Country::GetName($model->country)).' - '.$model->zip; ?><br>
        </address>
        <?php if($model->notes!=''){?>
        <div class="notes"><strong>Notes:</strong><?php echo $model->notes;?></div>
        <?php } ?>
      </div>
      <?php 
	  
	  $vowner = Villaowner::model()->find(array(
	     'condition'=>'id='.$model->owner,
	  ));
	  
	  ?>
      <div class="image"> <a href="<?php echo Yii::app()->createUrl('bevillaowner/view/'.$model->owner);?>" target="_blank"><?php echo $vowner->name; ?></a> <a href="#"><img src="<?php echo $backend_asset.'/images/user.png'; ?>" class="img-polaroid"/></a> </div>
      <div class="info">
        <address>
        <strong> <?php echo Category::GetName($vowner->category); ?> </strong><br>
        <?php echo $vowner->address1.', '.$vowner->address2; ?><br>
        <?php echo $vowner->town.', '.$vowner->province; ?><br>
        <?php echo Countrylist::GetName($vowner->country).' - '.$vowner->zip; ?><br>
        <abbr title="Phone">Phone:</abbr> <?php echo $vowner->tele.'/'.$vowner->mobile; ?><br>
        FAX : <?php echo $vowner->fax; ?><br>
        <div class="dialog" id="mailpopup" style="display: none; width: 467px;" title="Send Email">
          <div id="mailpopup_form" style="padding:5px;"></div>
        </div>
        <?php if(!user()->isVillaOwner){?><button class="btn btn-link" style="text-align:right;" type="button" onclick="tyre_add('<?php  echo Yii::app()->request->baseUrl;?>/bepinfo/mailform','Mail Form')"><?php echo $vowner->email; ?></button><?php }else{ ?><button class="btn btn-link" style="text-align:right;" type="button"><?php echo $vowner->email; ?></button><?php } ?>
        <input type="hidden" name="people_email" id="people_email"   value="<?php echo $vowner->email; ?>">
        <input type="hidden" name="propert_id" id="propert_id"   value="<?php echo $_GET['id']; ?>">
        </address>
      </div>
      <div class="clear"></div>
      <div class="dialog" id="b_popup_4" style="display: none;" title="email to <?php echo $vowner->name; ?>">
        <div class="block"> <span>Mail Description:</span>
          <p>
            <textarea></textarea>
          </p>
          <div class="dr"><span></span></div>
          <p>This mail send through your registered mail id with this site settings as your support mail.</p>
        </div>
      </div>
      <div class="block">
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Sleeps'); ?></span> : <?php echo $model->sleep; ?> <br/>
                  <span class="label label-success"><?php echo t('Bed Rooms'); ?></span> : <?php echo $model->bedroom; ?> <br/>
                  <span class="label label-success"><?php echo t('Matrimonial Bed'); ?></span> : <?php echo $model->mbed; ?> </p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Matrimonial Sofa Bed'); ?></span> : <?php echo $model->msbed; ?><br/>
                  <span class="label label-success"><?php echo t('Twin Bed'); ?></span> : <?php echo $model->tbed; ?><br/>
                  <span class="label label-success"><?php echo t('Single Bed'); ?></span> : <?php echo $model->sbed; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Single Sofa Bed'); ?></span> : <?php echo $model->ssbed; ?><br/>
                </p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Total Bathrooms'); ?></span> : <?php echo $model->bathroom; ?><br/>
                  <span class="label label-success"><?php echo t('Bathroom with Shower'); ?></span> : <?php echo $model->bathwshower; ?> <br/>
                  <span class="label label-success"><?php echo t('Bathroom with Tub'); ?></span> : <?php echo $model->bathwtub; ?> <br/>
                </p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Bathroom with Tub & Shower'); ?></span> : <?php echo $model->bathwts; ?> <br/>
                  <span class="label label-success"><?php echo t('Water Closet'); ?></span> : <?php echo $model->bathwwc; ?> </p></td>
              <td></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Nearest Airport'); ?></span> : <?php echo Town::GetName($model->nairport); ?><br/>
                  <span class="label label-success"><?php echo t('Nearest Railway Station'); ?></span> : <?php echo Town::GetName($model->ntrain); ?><br/>
                  <span class="label label-success"><?php echo t('Nearest Town'); ?></span> : <?php echo Town::GetName($model->ntown); ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Size'); ?></span> : <?php echo $model->size; ?> M<sup>2</sup> <br/>
                  <span class="label label-success"><?php echo t('Location'); ?></span> : <?php echo Plocation::GetName($model->location); ?> <br/>
                  <span class="label label-success"><?php echo t('View'); ?></span> : <?php echo Pview::GetName($model->view); ?> </p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Type'); ?></span> : <?php echo Type::GetName($model->ptype); ?><br/>
                </p></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="clear"></div>
      <div class="block-fluid accordion">
        <h3><?php echo t('Amenities'); ?></h3>
        <div>
          <div class="row-form">
            <div class="row-form">
              <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                <thead>
                  <tr>
                    <th width="120"><?php echo t('Type'); ?></th>
                    <th><?php echo t('Available'); ?></th>
                  </tr>
                </thead>
                <?php $AmType = Amenitiestype::GetAllType(); ?>
                <tbody>
                  <?php foreach ($AmType as $am) { ?>
                  <tr>
                    <td><span class="date"><?php echo t($am->name); ?></span></td>
                    <td><?php
						$Amen = Amenities::model()->findAll(array(
						'condition'=>'source='.$am->id.' AND lang='.CurrentLangId(),
						)); 
						
						if($Amen){
							foreach ($Amen as $amn) {
								$avail = explode('|',$model->amenities);
								if (in_array($amn->id, $avail)) {
    								echo $amn->name.',';
								}
								
							}
						}
                    ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <h3><?php echo t('Third Party Resources'); ?></h3>
        <div>
          <div class="row-form">
            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
              <thead>
                <tr>
                  <th width="60"><?php echo t('Name'); ?></th>
                  <th><?php echo t('URL'); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="date"><?php echo t('Calendar'); ?></span></td>
                  <td><?php echo $model->cal_url; ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('YouTube'); ?></span></td>
                  <td><?php echo $model->youtube; ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Pinterest'); ?></span></td>
                  <td><?php echo $model->pint; ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Website'); ?></span></td>
                  <td><?php echo $model->website; ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Feed Share With'); ?></span></td>
                  <td><?php
						$Feed = Feedlist::model()->findAll(); 
						
						if($Feed){
							foreach ($Feed as $fd) {
								$FeedAvail = explode('|',$model->feedlist);
								if (in_array($fd->id, $FeedAvail)) {
    								echo $fd->name.', ';
								}
								
							}
						}
                    ?></td>
                </tr>
              </tbody>
            </table>
            <div class="clear"></div>
          </div>
        </div>
        <h3><?php echo t('Financial Info'); ?></h3>
        <?php $fin = Payment::model()->find(array(
	     			'condition'=>"uid='".$model->uid."'",
	  				 ));
       ?>
        <div>
          <div class="row-form">
            <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
              <thead>
                <tr>
                  <th width="120"><?php echo t('Particular'); ?></th>
                  <th><?php echo t('Amount/Percentage'); ?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="date"><?php echo t('Security Deposit'); ?></span></td>
                  <td><?php if($fin->security!=0) { echo $fin->security.'&euro;'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Heating Charges'); ?></span></td>
                  <td><?php if($fin->heating!=0) { echo $fin->heating.'&euro;'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('A/C Charges'); ?></span></td>
                  <td><?php if($fin->ac!=0) { echo $fin->ac.'&euro;'; } ?></td>
                </tr>
                <!--<tr>
                  <td><span class="date"><?php echo t('TAX'); ?></span></td>
                  <td><?php if($fin->tax!=0) { echo $fin->tax.'%'; } ?></td>
                </tr>-->
                <tr>
                  <td><span class="date"><?php echo t('Tourist Tax'); ?></span></td>
                  <td><?php if($fin->ac!=0) { echo $fin->tourist_tax.'&euro;'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Deposit'); ?></span></td>
                  <td><?php if($fin->deposit!=0) { echo $fin->deposit.'%'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Balance Due'); ?></span></td>
                  <td><?php if($fin->balance_due!=0) { echo $fin->balance_due.' Days'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Final Cleaning'); ?></span></td>
                  <td><?php if($fin->final_clean!=0) { echo $fin->final_clean.'&euro;'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Commission Percentage'); ?></span></td>
                  <td><?php if($fin->commission!=0) { echo $fin->commission.'%'; } ?></td>
                </tr>
                <tr>
                  <td><span class="date"><?php echo t('Additional Cost'); ?></span></td>
                  <td><?php if($model->extra_cost!=0) { echo $model->extra_cost; } ?></td>
                </tr>
              </tbody>
            </table>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
  $prop = Season::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'id',
  ));
  
  
  
  ?>
  <div class="span4">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t("Seasons &amp; Net Rates"); ?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('beseason/admin/beseason?page_id='.$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll" style="height: 320px;">
        <?php if($prop) { ?>
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
            <?php
		foreach($prop as $p){
			$sdates = Sdate::model()->findAll(array(
				'condition'=>'season_id = '.$p->id,
			));
			
			$srates = Rate::model()->findAll(array(
				'condition'=>'season_id = '.$p->id,
			));
			
			
		?>
            <tr>
              <td><h5><a href="<?php echo Yii::app()->createUrl('beseason/view/'.$p->id.'?page_id='.$id);?>" target="_blank"> <?php echo $p->name; ?> </a></h5>
                <p class="about">
                  <?php foreach($sdates as $sd){ ?>
                  <span class="label label-info"><?php echo date('d-M-Y',$sd->from_date).' - '.date('d-M-Y',$sd->to_date); ?></span> <br/>
                  <?php } ?>
                  <?php foreach($srates as $sr){ ?>
                  <span>
                  <?php if($sr->people) { echo "People : ". $sr->people.'<br>'; } ?>
                  <?php if($sr->price_week) { echo "Price Per Week : ". $sr->price_week.' &euro; <br>'; } ?>
                  <?php if($sr->price_day) { echo "Price Per Day : ". $sr->price_day.' &euro;<br>'; } ?>
                  </span>
                  <?php } ?>
                </p></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php 
  $prop = Soffer::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'id DESC',
  ));
  
  
  
  ?>
  <div class="span4">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t("Special Offers"); ?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('besoffer/admin/besoffer?page_id='.$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll" style="height: 320px;">
        <?php if($prop) { ?>
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
            <?php foreach ($prop as $p) { ?>
            <tr>
              <td><h5><a href="<?php echo Yii::app()->createUrl('besoffer/view/'.$p->id.'?page_id='.$id);?>" target="_blank"><?php echo $p->name; ?></a></h5>
                <p class="about"> <span class="label label-info"><?php echo date('d-M-Y',$p->from_date).' - '.date('d-M-Y',$p->to_date); ?></span> <br/>
                  <span> Offer Value : <?php echo $p->value.' %'; ?></span> </p></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php 
  $photos = Gallery::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'img_order ASC',
  ));
  
  if($photos) {
  
  ?>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-picture"></div>
      <h1><a href="<?php echo Yii::app()->createUrl('begallery/admin?page_id='.$id);?>" target="_blank" style="color:#FFFFFF;"><?php echo t('Photos'); ?></a></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/begallery/admin','page_id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <div class="clear"></div>
    </div>
    <div class="block thumbs">
      <?php foreach ($photos as $ph) { ?>
      <div class="thumbnail"> <a class="fancybox" rel="group" href="<?php echo Gallery::GetLargeImage($ph); ?>"><img src="<?php echo Gallery::GetThumbnail($ph); ?>" width="210px" class="img-polaroid"/></a>
        <div class="caption">
          <h5><?php echo t($ph->name); ?></h5>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>
<?php } ?>
<script>function tyre_add(url,heading)
{
var people_email=document.getElementById("people_email").value;
var propert_id=document.getElementById("propert_id").value;

	jQuery('#mailpopup_form').html('');
	jQuery("#mailpopup").dialog({autoOpen:false,modal:true,width:500,buttons:{  "Ok": function() {validate_forms();},'Cancel': function() {$( this ).dialog( "close" );} }});
	
		url=url+"?people_email="+people_email+"&propert_id="+propert_id;
		jQuery.get(url,{},function(data){jQuery('#mailpopup_form').html(data);});
		$("#mailpopup").dialog('open')
	
}</script>