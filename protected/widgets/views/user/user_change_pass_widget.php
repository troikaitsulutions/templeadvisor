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
        'id'=>'userchangepass-form',
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array("autocomplete"=>"off")
        )); 
?>
      <?php echo $form->errorSummary($model); ?>
      <div class="row-fluid">
        <div class="span6">
          <div class="head">
            <div class="isw-user"></div>
            <h1><?php echo t('Change Password'); ?></h1>
            <div class="clear"></div>
          </div>
          <div class="block-fluid">
            <div class="row-form">
              <div class="span5"><?php echo $form->label($model,'old_password'); ?></div>
              <div class="span7"> <?php echo $form->passwordField($model, 'old_password'); ?> <span><?php echo $form->error($model,'old_password'); ?> </span></div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span5"><?php echo $form->label($model,'new_password_1'); ?></div>
              <div class="span7"> <?php echo $form->passwordField($model, 'new_password_1'); ?> <span><?php echo $form->error($model,'new_password_1'); ?> </span></div>
              <div class="clear"></div>
            </div>
            <div class="row-form">
              <div class="span5"><?php echo $form->label($model,'new_password_2'); ?></div>
              <div class="span7"> <?php echo $form->passwordField($model, 'new_password_2'); ?> <span><?php echo $form->error($model,'new_password_2'); ?> </span></div>
              <div class="clear"></div>
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
        </div>
      </div>
      <?php $this->endWidget(); ?>
    </div>
    <!-- form -->
</div>
