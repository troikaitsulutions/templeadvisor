<?php
                    $mycs=Yii::app()->getClientScript();                    
                    if(YII_DEBUG)
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, true);				
						                    
                    else
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, false);				
						                    	
                    
                    $urlScript_ckeditor= $ckeditor_asset.'/ckeditor.js';
                    $urlScript_ckeditor_jquery=$ckeditor_asset.'/adapters/jquery.js';
                    $mycs->registerScriptFile($urlScript_ckeditor, CClientScript::POS_HEAD);
                    $mycs->registerScriptFile($urlScript_ckeditor_jquery, CClientScript::POS_HEAD);   
					
					                 
?>

<div class="workplace">
<div class="form">
<?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'temples-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
<?php echo $form->errorSummary(array($model, $mseo)); ?>
<div class="span6" style="float:right;"> </div>
<div class="row-fluid">
  <div class="span6">
    <div class="head">
      <div class="isw-target"></div>
      <h1><?php echo t('Temple'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid">
      <div class="row-form">
        <div class="span5"><?php echo $form->label($model,'name'); ?></div>
        <div class="span7"><?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
        <div class="clear"></div>
      </div>
      <div class="row-form">
        <div class="span5"><?php echo $form->label($model,'region'); ?></div>
        <div class="span7"><?php echo $form->dropDownList($model, 'region', Reg::GetAll(), array()); ?> <span><?php echo $form->error($model,'region'); ?> </span></div>
        <div class="clear"></div>
      </div>
      
      <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'addtohome'); ?></div>
            <div class="span7"> <?php echo $form->checkBox($model,'addtohome',array()); ?>  <span><?php echo $form->error($model,'addtohome'); ?></span> </div>
            <div class="clear"></div>
      </div>
      
      <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'discover_list'); ?></div>
            <div class="span7"> <?php echo $form->checkBox($model,'discover_list',array()); ?>  <span><?php echo $form->error($model,'discover_list'); ?></span> </div>
            <div class="clear"></div>
      </div>
      
      <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
        <div class="span5"><?php echo $form->label($model,'status'); ?></div>
        <div class="span7"><?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
 
  
  <div class="span6">
    <div class="head">
      <div class="isw-target"></div>
      <h1><?php echo t('Rough Note'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid">
      <div class="row-form">
            
            <div class="span12"> <?php echo $form->textArea($model,'rough_note',array()); ?> <span><?php echo $form->error($model,'rough_note'); ?> </span> </div>           
            <div class="clear"></div>
          </div>
    </div>
  </div>
  
</div>
<div class="dr"><span></span></div>
<div class="span12" style="float:right;"> </div>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-target"></div>
      <h1><?php echo t('Address & Location'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid">
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'address1'); ?></div>
        <div class="span3"> <?php echo $form->textField($model,'address1',array()); ?> <span><?php echo $form->error($model,'address1'); ?></span> </div>
        <div class="span3"><?php echo $form->label($model,'address2'); ?></div>
        <div class="span3"> <?php echo $form->textField($model,'address2', array()); ?> <span><?php echo $form->error($model,'address2'); ?></span> </div>
        <div class="clear"></div>
      </div>
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'country'); ?></div>
        <div class="span3"> <?php echo $form->dropDownList($model,'country',  Country::GetAll(),array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadstate',
							'data'=>array('country'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_state").html(data.dropDownStates);
								$("#Temples_district").html(data.dropDownDistricts);
								$("#Temples_town").html(data.dropDownTowns); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'country'); ?> </span> </div>
        <div class="span3"><?php echo $form->label($model,'state'); ?></div>
        <div class="span3"> <?php echo $form->dropDownList($model,'state',State::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loaddistrict',
							'data'=>array('state'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_district").html(data.dropDownDistricts);
								$("#Temples_town").html(data.dropDownTowns); 
							}',  
                        )
	 ) ); ?> <span><?php echo $form->error($model,'state'); ?> </span> </div>
        <div class="clear"></div>
      </div>
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'district'); ?></div>
        <div class="span3"> <?php echo $form->dropDownList($model,'district',District::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadtown',
							'data'=>array('district'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_town").html(data.dropDownTowns); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'district'); ?></span> </div>
        <div class="span3"><?php echo $form->label($model,'town'); ?></div>
        <div class="span3"> <?php echo $form->dropDownList($model,'town', Town::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadzip',
							'data'=>array('town'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_zip").val(data.zip);
								$("#Temples_latitude").val(data.latitude);
								$("#Temples_longitude").val(data.longitude); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'town'); ?></span> </div>
        <div class="clear"></div>
      </div>
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'zip'); ?></div>
        <div class="span3"> <?php echo $form->textField($model,'zip',array()); ?> <span><?php echo $form->error($model,'zip'); ?> </span> </div>
        <div class="span3"><?php echo $form->label($model,'contact'); ?></div>
        <div class="span3"> <?php echo $form->dropDownList($model,'contact', Villaowner::GetContacts(), array()); ?> <span><?php echo $form->error($model,'contact'); ?> </span> </div>
        <div class="clear"></div>
      </div>
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'latitude'); ?></div>
        <div class="span3"> <?php echo $form->textField($model,'latitude', array()); ?> <span><?php echo $form->error($model,'latitude'); ?> </span> </div>
        <div class="span3"><?php echo $form->label($model,'longitude'); ?></div>
        <div class="span3"> <?php echo $form->textField($model,'longitude', array()); ?> <span><?php echo $form->error($model,'longitude'); ?> </span> </div>
        <div class="clear"></div>
          <div id='mapshow' style='color:red;text-decoration: underline;cursor:pointer'> Show map </div>
              <div class="clear"></div>
              <div id="map" style="width: 700px; height: 400px;display:none"> </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1><?php echo t('Temples Info'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        
        <div class="row-form">
        
        	<div class="span2"><?php echo $form->label($model,'religion'); ?></div>
            <div class="span2"><?php echo $form->dropDownList($model,'religion',  Religion::GetAll(),array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadavatar',
							'data'=>array('sdeity'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_avatar").html(data.dropDownAvatar);
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'religion'); ?> </span> </div>
     
            <div class="span2"><?php echo $form->label($model,'sdeity'); ?></div>
            <div class="span2"><?php echo $form->dropDownList($model,'sdeity',  Diety::GetAll(),array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadavatar',
							'data'=>array('sdeity'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Temples_avatar").html(data.dropDownAvatar);
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'sdeity'); ?> </span> </div>
            <div class="span2"><?php echo $form->label($model,'avatar'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'avatar', Avatar::GetAll(), array() ); ?> <span><?php echo $form->error($model,'avatar'); ?> </span> </div>
            <div class="clear"></div>
          </div>
        
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'deity'); ?></div>
            <div class="span4"> <?php echo $form->textField($model,'deity',array()); ?> <span><?php echo $form->error($model,'deity'); ?> </span> </div>
            <div class="span2"><?php echo $form->label($model,'other_deity'); ?></div>
            <div class="span4"> <?php echo $form->textField($model,'other_deity',array()); ?> <span><?php echo $form->error($model,'other_deity'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span4"><?php echo $form->label($model,'thirtham_sthalavruksham'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'thirtham_sthalavruksham',array()); ?> <span><?php echo $form->error($model,'thirtham_sthalavruksham'); ?> </span> </div>
             <div class="clear"></div>
          </div>
           <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'posture'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'posture', Posture::GetAll(), array('id'=>'s2_1', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'posture'); ?> </span> </div>
            
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'festival'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'festival',array()); ?> <span><?php echo $form->error($model,'festival'); ?> </span> </div>
            <div class="span2"><?php echo $form->label($model,'famous_for'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'famous_for', array()); ?> <span><?php echo $form->error($model,'famous_for'); ?> </span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1><?php echo t('Themes'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php			
			echo "<h4>Heritage/Historical</h4> <div class='clear'></div><div class='well'>";
			echo $form->checkBoxList($model,'themelist',CHtml::listData(Themelist::model()->findAll(array("condition"=>"status = 1 AND source = 1001","order"=>"TRIM(name) ASC")), 'id', 'name'), array('separator'=>'','template'=>'<div class="amenities_display_div"> {input} <div class="amenities_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
          </div>
		  
		  <div class="row-form">
            <?php			
			echo "<h4>Beliefs</h4> <div class='clear'></div><div class='well'>";
			echo $form->checkBoxList($model,'themelist',CHtml::listData(Themelist::model()->findAll(array("condition"=>"status = 1 AND source = 1004","order"=>"TRIM(name) ASC")), 'id', 'name'), array('separator'=>'','template'=>'<div class="amenities_display_div"> {input} <div class="amenities_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
          </div>
		  
        </div>
      </div>
    </div>
     <div class="dr"><span></span></div> 
    
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1><?php echo t('Temple Etiquettes'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php			
			echo "<h4>Temple Etiquettes</h4> <div class='clear'></div><div class='well'>";
			echo $form->checkBoxList($model,'etiquette',CHtml::listData(Etiquettes::model()->findAll(array("condition"=>"status = 1","order"=>"TRIM(name) ASC")), 'id', 'name'), array('separator'=>'','template'=>'<div class="amenities_display_div"> {input} <div class="amenities_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
          </div>
        </div>
      </div>
    </div>
    
      <div class="dr"><span></span></div>
    
    
    
    
    <div class="row-fluid">
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content1' )); ?>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1>SEO Info</h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php 
 	if($gps->latitude == '') { $gps->latitude = 13.0878400; }
    if($gps->longitude == '') { $gps->longitude = 80.2784700; }
$this->render('cmswidgets.views.temples.temples_form_javascript',array('model'=>$model,'form'=>$form, 'gps'=>$gps )); ?>
