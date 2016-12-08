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
        'id'=>'docagrrement-form',
        'enableAjaxValidation'=>false,    
		'htmlOptions' => array('enctype' => 'multipart/form-data'),        
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    
    <div class="span6" style="float:right;">

</div>

    <div class="row-fluid">
    
    <div class="span6">
    
        <div class="head">
          <div class="isw-target"></div>
          <h1>Document Agreement Creation</h1>
          <div class="clear"></div>
        </div>
      
      <div class="block-fluid">
      
      <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'doc_name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'doc_name'); ?> <span><?php echo $form->error($model,'doc_name'); ?>  </div>
            <div class="clear"></div>
          </div>
          
     <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'people_type'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'people_type',CHtml::listData(Category::model()->findAll(array('condition'=>"status='1'",'order'=>'name asc')),'id','name'),array('empty'=>'Select')); ?> <span><?php echo $form->error($model,'people_type'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'description'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model,'description'); ?> <span><?php echo $form->error($model,'description'); ?>  </div>
            <div class="clear"></div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'attachment_file'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'attachment_file');?> <span><?php echo $form->error($model,'attachment_file'); ?> </span></div>
            <div class="clear"></div>
            
        </div>
     
        
      
      </div>
    
    </div>
    
    </div>
    
    
    <div class="dr"><span></span></div>
    
    <div class="dr"><span></span></div>
    
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit">Save</button>
          <button class="btn btn-large btn-warning" type="cancel">Cancel</button>
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.docagrrement.docagrrement_form_javascript',array('model'=>$model,'form'=>$form)); ?>
