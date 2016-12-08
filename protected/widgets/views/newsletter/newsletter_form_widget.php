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
        'id'=>'newsletter-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Newsletter'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"><?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'subject'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'subject'); ?> <span><?php echo $form->error($model,'subject'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'mlist'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'mlist', CHtml::listData(Groupcreation::model()->findAll(),'id','group_creation_name'), array('empty'=>'Select')); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'addtohome'); ?></div>
            <div class="span7"> <?php echo $form->checkBox($model,'addtohome',array()); ?>  <span><?php echo $form->error($model,'addtohome'); ?> </div>
            <div class="clear"></div>
          </div>
          
        </div>
      </div>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content' )); ?>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
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
          <button class="btn btn-large" type="submit" name="save"><?php echo t('Save'); ?></button>
              <button class="btn btn-large" type="submit" name="save_send"><?php echo t('Save & Send Mail'); ?></button>
          
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.newsletter.newsletter_form_javascript',array('model'=>$model,'form'=>$form)); ?>
