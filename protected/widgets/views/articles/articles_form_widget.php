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
        'id'=>'articles-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
<?php echo $form->errorSummary(array($model, $mseo)); ?>
<div class="span12" style="float:right;"> </div>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-target"></div>
      <h1><?php echo t('Articles'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid">
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'name'); ?></div>
        <div class="span3"><?php echo $form->textField($model, 'name',array()); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
         <div class="span3"><?php echo $form->labelEx($model,'img_url_1'); ?></div>
        <div class="span3"><?php echo $form->fileField($model, 'img_url_1');?> <span><?php echo $form->error($model,'img_url_1'); ?><?php if($model->img_url_1!=''){ echo $model->img_url_1; } ?> </span></div>
        <div class="clear"></div>
      </div>
      
     
      <div class="row-form">
         <div class="span3"><?php echo $form->label($model,'email_id'); ?></div>
        <div class="span3"><?php echo $form->textField($model, 'email_id',array()); ?> <span><?php echo $form->error($model,'email_id'); ?> </span></div>
        <div class="span3"><?php echo $form->labelEx($model,'img_url_2'); ?></div>
        <div class="span3"><?php echo $form->fileField($model, 'img_url_2');?> <span><?php echo $form->error($model,'img_url_2'); ?><?php if($model->img_url_2!=''){ echo $model->img_url_2; } ?> </span></div>
        <div class="clear"></div>
      </div>
      
     
      <div class="row-form">
        <div class="span3"><?php echo $form->label($model,'phoneno'); ?></div>
        <div class="span3"><?php echo $form->textField($model, 'phoneno',array()); ?> <span><?php echo $form->error($model,'phoneno'); ?> </span></div>
        <div class="span3"><?php echo $form->labelEx($model,'img_url_3'); ?></div>
        <div class="span3"><?php echo $form->fileField($model, 'img_url_3');?> <span><?php echo $form->error($model,'img_url_3'); ?><?php if($model->img_url_3!=''){ echo $model->img_url_3; } ?> </span></div>
        
        <div class="clear"></div>
      </div>
      
     
      <div class="row-form">
         <div class="span3"><?php echo $form->label($model,'heading'); ?></div>
        <div class="span3"><?php echo $form->textField($model, 'heading',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'heading'); ?> </span></div>
        <div class="span3"><?php echo $form->labelEx($model,'img_url_4'); ?></div>
        <div class="span3"><?php echo $form->fileField($model, 'img_url_4');?> <span><?php echo $form->error($model,'img_url_4'); ?><?php if($model->img_url_4!=''){ echo $model->img_url_4; } ?> </span></div>
        <div class="clear"></div>
      </div>      
     
      	<div class="row-form">
        <div class="span3"><?php echo $form->label($model,'status'); ?></div>
        <div class="span3"><?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
        <div class="span3"><?php echo $form->labelEx($model,'img_url_5'); ?></div>
        <div class="span3"><?php echo $form->fileField($model, 'img_url_5');?> <span><?php echo $form->error($model,'img_url_5'); ?><?php if($model->img_url_5!=''){ echo $model->img_url_5; } ?> </span></div>
        <div class="clear"></div>
      </div>
      
      
    </div>
  </div>
 
</div>
<div class="dr"><span></span></div>
<div class="row-fluid">
  <div class="span12">
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-list"></div>
          <h1><?php echo t('Article'); ?></h1>
          <div class="clear"></div>
        </div>
        <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content1' )); ?>
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
<?php $this->render('cmswidgets.views.articles.articles_form_javascript',array('model'=>$model,'form'=>$form)); ?>
