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
        'id'=>'pinfo-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model, $mseo, $gps, $payment)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Property'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"><?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span5"><?php echo $form->label($model,'tt_name'); ?></div>
            <div class="span7"><?php echo $form->textField($model, 'tt_name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'tt_name'); ?> </span></div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'size'); ?></div>
            <div class="span2"><?php echo $form->textField($model, 'size'); ?> <span><?php echo $form->error($model,'size'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'ptype'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'ptype',  Type::GetAll(),array()); ?> <span><?php echo $form->error($model,'ptype'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'location'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'location',  Plocation::GetAll(),array()); ?> <span><?php echo $form->error($model,'location'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'view'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'view',  Pview::GetAll(),array()); ?> <span><?php echo $form->error($model,'view'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'notes'); ?></div>
            <div class="span7"><?php echo $form->textArea($model,'notes'); ?> <span><?php echo $form->error($model,'notes'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?>>
            <div class="span5"><?php echo $form->label($model,'owner'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'owner',  Villaowner::GetOwner(),array()); ?> <span><?php echo $form->error($model,'owner'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'mstatus'); ?></div>
            <div class="span7"><?php echo $form->dropDownList($model,'mstatus',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'mstatus'); ?> </div>
            <?php echo $form->hiddenField($model,'old_id',array('value'=>$model->old_id)); ?>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span3"><?php echo $form->label($model,'chianti'); ?></div>
            <div class="span3"><?php echo $form->checkBox($model,'chianti',array()); ?> <span><?php echo $form->error($model,'chianti'); ?> </div>
            <div class="clear"></div>
          </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span3"><?php echo $form->label($model,'h3'); ?></div>
                <div class="span10"><?php echo $form->textArea($model, 'h3'); ?> <span><?php echo $form->error($model,'h3'); ?></span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <?php if($model->isNewRecord) : ?>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Available Languages'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php if(count($versions)>0) : ?>
            <div class="span5"> <?php echo "<strong style='color:#DD4B39'>".t("Translated Version of :")."</strong>" ?> </div>
            <div class="span7">
              <?php foreach($versions as $version) :?>
              <?php  echo "<b> ".$version."</b>,"; ?>
              <?php endforeach; ?>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
          </div>
          <?php if((int)settings()->get('system','language_number')>1) : ?>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'lang'); ?> </div>
            <div class="span7"><?php echo $form->dropDownList($model,'lang',Language::items($lang_exclude),
                    array('options' => array(array_search(Yii::app()->language,Language::items($lang_exclude,false))=>array('selected'=>true)))
                    ); ?> <span><?php echo $form->error($model,'lang'); ?></span></div>
            <div class="clear"></div>
          </div>
          <?php else : ?>
          <?php echo $form->hiddenField($model,'lang',array('value'=>Language::mainLanguage())); ?>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Location Info'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'sleep'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'sleep',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'sleep'); ?> </div>
            <div class="span3"><?php echo $form->label($model,'bedroom'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bedroom',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bedroom'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'mbed'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'mbed',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'mbed'); ?> </div>
            <div class="span3"><?php echo $form->label($model,'msbed'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'msbed',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'msbed'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'tbed'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'tbed',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'tbed'); ?> </div>
            <div class="span2"><?php echo $form->label($model,'sbed'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'sbed',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'sbed'); ?> </div>
            <div class="span2"><?php echo $form->label($model,'ssbed'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'ssbed',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'ssbed'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'bathroom'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bathroom',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bathroom'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'bathwshower'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bathwshower',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bathwshower'); ?> </div>
            <div class="span3"><?php echo $form->label($model,'bathwtub'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bathwtub',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bathwtub'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'bathwts'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bathwts',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bathwts'); ?> </div>
            <div class="span3"><?php echo $form->label($model,'bathwwc'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'bathwwc',  ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($model,'bathwwc'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span3"><?php echo $form->label($model,'addtohome'); ?></div>
            <div class="span3"><?php echo $form->checkBox($model,'addtohome',array()); ?> <span><?php echo $form->error($model,'addtohome'); ?> </div>
            <div class="span3"><?php echo $form->label($model,'luxury'); ?></div>
            <div class="span3"><?php echo $form->checkBox($model,'luxury',array()); ?> <span><?php echo $form->error($model,'luxury'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="span3"><?php echo $form->label($model,'wedding'); ?></div>
            <div class="span3"><?php echo $form->checkBox($model,'wedding',array()); ?> <span><?php echo $form->error($model,'wedding'); ?> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1> Extra </h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'extra_cost'); ?></div>
          <div class="span10"><?php echo $form->textArea($model, 'extra_cost'); ?> <span><?php echo $form->error($model,'extra_cost'); ?></span> </div>
          <div class="span5"><?php echo $form->label($model,'tourist_sights'); ?></div>
          <div class="span10"><?php echo $form->textArea($model, 'tourist_sights'); ?> <span><?php echo $form->error($model,'tourist_sights'); ?> </span> </div>
          <div class="span5"><?php echo $form->label($model,'other_services'); ?></div>
          <div class="span10"><?php echo $form->textArea($model, 'other_services'); ?> <span><?php echo $form->error($model,'other_services'); ?></span> </div>
          <div class="clear"></div>
        </div>
        </div>
      </div>
    </div>
    <div class="row-fluid" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content1' )); ?>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content2' )); ?>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1>Additional information </h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid accordion">
          <h3>Address</h3>
          <div>
            <div class="row-form">
              <div class="span3"><?php echo $form->label($model,'address1'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'address1',array()); ?> <span><?php echo $form->error($model,'address1'); ?></span> </div>
              <div class="span3"><?php echo $form->label($model,'address2'); ?></div>
              <div class="span3"> <?php echo $form->textField($model,'address2', array()); ?> <span><?php echo $form->error($model,'address2'); ?></span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span3"><?php echo $form->label($model,'town'); ?></div>
              <div class="span3"> <?php echo $form->dropDownList($model,'town',  Town::GetAll(),array()); ?> <span><?php echo $form->error($model,'town'); ?></span> </div>
              <div class="span3"><?php echo $form->label($model,'province'); ?></div>
              <div class="span3"> <?php echo $form->dropDownList($model,'province',  Province::GetAll(),array()); ?> <span><?php echo $form->error($model,'province'); ?></span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span3"><?php echo $form->label($model,'region'); ?></div>
              <div class="span3"> <?php echo $form->dropDownList($model,'region',  Region::GetAll(),array()); ?> <span><?php echo $form->error($model,'region'); ?> </span> </div>
              <div class="span3"><?php echo $form->label($model,'country'); ?></div>
              <div class="span3"> <?php echo $form->dropDownList($model,'country',  Country::GetAll(),array()); ?> <span><?php echo $form->error($model,'country'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'nairport'); ?></div>
              <div class="span2"> <?php echo $form->dropDownList($model,'nairport',  Town::GetAll(),array()); ?>  <span><?php echo $form->error($model,'nairport'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'ntrain'); ?></div>
              <div class="span2"> <?php echo $form->dropDownList($model,'ntrain',  Town::GetAll(),array()); ?>  <span><?php echo $form->error($model,'ntrain'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($model,'ntown'); ?></div>
              <div class="span2"> <?php echo $form->dropDownList($model,'ntown',  Town::GetAll(),array()); ?>  <span><?php echo $form->error($model,'ntown'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'zip'); ?></div>
              <div class="span2"> <?php echo $form->textField($model,'zip',array()); ?> <span><?php echo $form->error($model,'zip'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($gps,'latitude'); ?></div>
              <div class="span2"> <?php echo $form->textField($gps,'latitude', array()); ?> <span><?php echo $form->error($gps,'latitude'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($gps,'longitude'); ?></div>
              <div class="span2"> <?php echo $form->textField($gps,'longitude', array()); ?> <span><?php echo $form->error($gps,'longitude'); ?> </span> </div>
              <div class="clear"></div>
            </div>
          </div>
          <h3>Third Party Resources</h3>
          <div>
            <div class="row-form">
              <div class="span2"><?php echo $form->label($model,'cal_url'); ?></div>
              <div class="span7"> <?php echo $form->textArea($model,'cal_url',array('placeholder'=>t('Use comma or PIPE ( , or | ) to add multiple URL'))); ?> <span><?php echo $form->error($model,'cal_url'); ?></span> </div>
              
               <div class="span7"><span> Having the 'Ical' link means that we can syncronize automatically with many different calendars allowing us to always show updated availabiloty on our website.  we can accept multiple iCal links, pls seperate them with a comma</span></div>
              <div class="clear"></div>
            </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
              <div class="span2"><?php echo $form->label($model,'youtube'); ?></div>
              <div class="span7"> <?php echo $form->textField($model,'youtube',array()); ?> <span><?php echo $form->error($model,'youtube'); ?></span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
              <div class="span2"><?php echo $form->label($model,'pint'); ?></div>
              <div class="span7"> <?php echo $form->textField($model,'pint',array()); ?> <span><?php echo $form->error($model,'pint'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
              <div class="span2"><?php echo $form->label($model,'website'); ?></div>
              <div class="span7"> <?php echo $form->textField($model,'website',array()); ?> <span><?php echo $form->error($model,'website'); ?> </span> </div>
              <div class="clear"></div>
            </div>
          </div>
          <?php if(!user()->isVillaOwner){?>
          <h3>Feed Partners</h3>
          <div>
            <div class="row-form">
              <?php
						echo "<h4>Feed Partners</h4> <div class='clear'></div><div class='well'>";
						echo "<div class='row-form'>";
							
						echo $form->checkBoxList($model,'feedlist', CHtml::listData(Feedlist::model()->findAll(array("condition"=>"status = 1","order"=>"sharevia")), 'id', 'name'), array('separator'=>'','template'=>'<div class="span2"> {input} {label} </div>'
						) );							
							
                        echo " <div class='clear'></div> </div></div>";
			?>
            </div>
          </div>
          <?php } ?>
          <h3 <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?>>Financial Info</h3>
          <div <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
            <div class="row-form">
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> ><?php echo $form->label($payment,'security'); ?></div>
              <div class="span1" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> > <?php echo $form->textField($payment,'security',array()); ?> <span><?php echo $form->error($payment,'security'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($payment,'heating'); ?></div>
              <div class="span2"> <?php echo $form->textField($payment,'heating', array()); ?> <span><?php echo $form->error($payment,'heating'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($payment,'ac'); ?></div>
              <div class="span2"> <?php echo $form->textField($payment,'ac', array()); ?> <span><?php echo $form->error($payment,'ac'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
              <div class="span2" style="display:none"><?php echo $form->label($payment,'ta_discount'); ?></div>
              <div class="span2" style="display:none"> <?php echo $form->dropDownList($payment,'ta_discount',ConstantDefine::getValue(),array()); ?> <span><?php echo $form->error($payment,'ta_discount'); ?> </span> </div>
              <div class="span2" style="display:none"><?php echo $form->label($payment,'tax'); ?></div>
              <div class="span2" style="display:none"> <?php echo $form->dropDownList($payment,'tax',ConstantDefine::getValue(), array()); ?> <span><?php echo $form->error($payment,'tax'); ?> </span> </div>
              
              <div class="span2" ><?php echo $form->label($payment,'tourist_tax'); ?></div>
              <div class="span2"> <?php echo $form->textField($payment,'tourist_tax', array()); ?> <span><?php echo $form->error($payment,'tourist_tax'); ?></span> </div>

              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> > <?php echo $form->label($payment,'deposit'); ?></div>
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> > <?php echo $form->dropDownList($payment,'deposit',ConstantDefine::getValue(), array()); ?> <span><?php echo $form->error($payment,'deposit'); ?> </span> </div>
              <div class="clear"></div>
            </div>
            <div class="row-form" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> ><?php echo $form->label($payment,'balance_due'); ?></div>
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> > <?php echo $form->textField($payment,'balance_due', array()); ?> <span><?php echo $form->error($payment,'balance_due'); ?> </span> </div>
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> ><?php echo $form->label($payment,'final_clean'); ?></div>
              <div class="span2" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> > <?php echo $form->textField($payment,'final_clean', array()); ?> <span><?php echo $form->error($payment,'final_clean'); ?> </span> </div>
              <div class="span2"><?php echo $form->label($payment,'commission'); ?></div>
              <div class="span2"> <?php echo $form->textField($payment,'commission', array()); ?> <span><?php echo $form->error($payment,'commission'); ?> </span> </div>
              <div class="clear"></div>
            </div>
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
          <h1>Amenities</h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php			
			echo "<h4>Amenities</h4> <div class='clear'></div><div class='well'>";
			echo $form->checkBoxList($model,'amenities',CHtml::listData(Amenities::model()->findAll(array("condition"=>"status = 1 AND lang = 2","order"=>"TRIM(name) ASC")), 'id', 'name'), array('separator'=>'','template'=>'<div class="amenities_display_div"> {input} <div class="amenities_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?> >
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1>Tags</h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php			
			echo "<h4>Tags</h4> <div class='clear'></div><div class='well'>";
			echo $form->checkBoxList($model,'tags',CHtml::listData(Tag::model()->findAll(array("condition"=>"status = 1 AND lang = 2","order"=>"TRIM(name) ASC")), 'id', 'name'),array('separator'=>'','template'=>'<div class="tags_display_div"> {input} <div class="tags_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
          </div>
        </div>
      </div>
    </div>
    <div class="dr"><span></span></div>
    
    <div class="row-fluid" <?php if(user()->isVillaOwner){?> style=" display:none;"<?php } ?>>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1>SEO Info : Rental Site</h1>
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
<?php $this->render('cmswidgets.views.pinfo.pinfo_form_javascript',array('model'=>$model,'form'=>$form)); ?>
