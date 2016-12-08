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
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('/betemples/update','id'=>$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
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
        <?php echo $model->address1.', '.$model->address2; ?><br>
        <?php echo Town::GetName($model->town).', '.District::GetName($model->district).' , '.State::GetName($model->state); ?><br>
        <?php echo Countrylist::GetName(Country::GetName($model->country)).' - '.$model->zip; ?><br>
        </address>
      </div>
      <?php 
	  
	  $vowner = Villaowner::model()->find(array(
	     'condition'=>'id='.$model->contact,
	  ));
	  if( isset($vowner) && count($vowner)>0 ) {
	  ?>
      <div class="image"> <a href="<?php echo Yii::app()->createUrl('bevillaowner/view/'.$model->contact);?>" target="_blank"><?php echo $vowner->name; ?></a> <a href="#"><img src="<?php echo $backend_asset.'/images/user.png'; ?>" class="img-polaroid"/></a> </div>
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
        <?php if(!user()->isVillaOwner){?>
        <button class="btn btn-link" style="text-align:right;" type="button" onclick="tyre_add('<?php  echo Yii::app()->request->baseUrl;?>/bepinfo/mailform','Mail Form')"><?php echo $vowner->email; ?></button>
        <?php }else{ ?>
        <button class="btn btn-link" style="text-align:right;" type="button"><?php echo $vowner->email; ?></button>
        <?php } ?>
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
      <?php } ?>
      <div class="clear"></div>
      <div class="block">
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
                        
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Deity'); ?></span> : <?php echo Diety::GetName($model->sdeity); ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Avatar'); ?></span> : <?php echo ($model->avatar != 0) ? Avatar::GetName($model->avatar):''; ?></p></td>
            </tr>
            
            
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Main Temple Deity'); ?></span> : <?php echo $model->deity; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Other Deity'); ?></span> : <?php echo $model->other_deity; ?></p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Temple Famous For'); ?></span> : <?php echo $model->famous_for; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Thirtham/Sthalavruksham'); ?></span> : <?php echo $model->thirtham_sthalavruksham; ?></p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Region'); ?></span> : <?php echo Reg::GetName($model->region); ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Temple Festival'); ?></span> : <?php echo $model->festival; ?></p></td>
            </tr>
            <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('GPS Latitude'); ?></span> : <?php echo $model->latitude; ?></p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Longitude'); ?></span> : <?php echo $model->longitude; ?></p></td>
            </tr>
            <tr>
            
             <tr>
              <td><p class="about"> <span class="label label-success"><?php echo t('Posture'); ?></span> : 
                <?php
						$Faci = Posture::model()->findAll(); 
						$avail = explode('|',$model->posture);
						if($Faci){
							foreach ($Faci as $Fa) {
								if (in_array($Fa->id, $avail)) {
    								echo $Fa->name.', ';
								
								}
								
							}
						}
                    ?>
              
               </p></td>
              <td><p class="about"> <span class="label label-success"><?php echo t('Belief'); ?></span> : 
			  <?php 
			    
						$Faci = Belief::model()->findAll(); 
						$avail = explode('|',$model->belief);
						if($Faci){
							foreach ($Faci as $Fa) {
								if (in_array($Fa->id, $avail)) {
    								echo $Fa->name.', ';
								
								}
								
							}
						}
			  
			  
			  
			  ?></p></td>
            </tr>
            <tr>
             <p class="about"> <span class="label label-success"><?php echo t('Temple Etiquettes'); ?></span> : </br>
		    <?php
						$Faci = Etiquettes::model()->findAll(); 
						$avail = explode('|',$model->etiquette);
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
            <tr>
              <td colspan="2"><p class="about"> <?php echo $model->content1; ?></p></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="clear"></div>
      <div class="block-fluid accordion">
        <h3><?php echo t('Themes'); ?></h3>
        <div>
          <div class="row-form">
            <div class="row-form">
              <table cellpadding="0" cellspacing="0" width="100%" class="sOrders">
                <thead>
                  <tr>
                    <th width="120"><?php echo t('Themes Group'); ?></th>
                    <th><?php echo t('Available'); ?></th>
                  </tr>
                </thead>
                <?php $AmType = Themes::GetAllType(); ?>
                <tbody>
                  <?php foreach ($AmType as $am) { ?>
                  <tr>
                    <td><span class="date"><?php echo t($am->name); ?></span></td>
                    <td><?php
						$Amen = Themelist::model()->findAll(array(
						'condition'=>'source='.$am->id.' AND lang='.CurrentLangId(),
						)); 
						
						if($Amen){
							foreach ($Amen as $amn) {
								$avail = explode('|',$model->themelist);
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
      </div>
    </div>
  </div>
<!--  <div class="span4">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t("Nearest Things"); ?></h1>
      <?php
			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'htmlOptions'=>array('class'=>'buttons'),
			'activeCssClass'=>'active',
			'items'=>array(
					array('label'=>'<span class="isw-edit"></span>', 'url'=>array('benearest/admin?page_id='.$id),'visible'=>( (user()->isAgent) ) ? false : true,),
					
						),
					));
					?>
      <?php 
  $prop = Nearest::model()->findAll(array(
  	'condition'=>'prop_id='.$model->id,
  	'order' => 'id',
  )); ?>
      <div class="clear"></div>
    </div>
    <div class="block messages scrollBox">
      <div class="scroll" style="height: 320px;">
        <?php if($prop) { ?>
        <table cellpadding="0" cellspacing="0" width="100%" class="table listUsers">
          <tbody>
            <?php foreach ( $prop as $pr ) { ?>
            <tr>
              <td><?php echo Nthings::GetName($pr->things); ?></td>
              <td><?php echo $pr->name; ?></td>
              <td><?php echo Town::GetName($pr->town); ?></td>
              <td><?php echo $pr->distant; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
  </div> -->
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
      <div class="thumbnail"> <a class="fancybox" rel="group" href="<?php echo Gallery::GetLargeImage1($ph); ?>"><img src="<?php echo Gallery::GetThumbnail($ph); ?>" width="210px" class="img-polaroid"/></a>
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