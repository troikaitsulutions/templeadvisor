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
        'id'=>'userupdate-form',
        'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),       
        )); 
?>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-user"></div>
          <h1><?php echo t('Update User'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'people_type'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'people_type',CHtml::listData(Category::model()->findAll(array('condition'=>"status='1'",'order'=>'name asc')),'id','name'),array('empty'=>'Select')); ?> <span><?php echo $form->error($model,'people_type'); ?> </span></div>
            <div class="clear"></div>
          </div>
        
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'people_id'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'people_id'); ?> <span><?php echo $form->error($model,'people_id'); ?> </span></div>
            <div class="clear"></div>
          </div>
        
        <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'display_name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'display_name'); ?> <span><?php echo $form->error($model,'display_name'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'email'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'email'); ?> <span><?php echo $form->error($model,'email'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'user_url'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'user_url'); ?> <span><?php echo $form->error($model,'user_url'); ?> </span></div>
            <div class="clear"></div>
          </div>

		<div class="row-form">
            <div class="span5"><?php echo $form->label($model,'password'); ?></div>
            <div class="span7"> <?php echo $form->passwordField($model, 'password'); ?> <span><?php echo $form->error($model,'password'); ?> </span></div>
            <div class="clear"></div>
        </div>

		<div class="row-form">
            <div class="span5"><?php echo $form->label($model,'avatar'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'avatar');?> <span><?php echo $form->error($model,'avatar'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->avatar!=''){?><div style="height:100px;"><div style="float:right;"><?php echo CHtml::image('http://temples.s3.amazonaws.com/peoples/thumb/'.$model->avatar, 'DORE',array('style'=>'width:100px;height:100px;')); ?></div></div><?php } ?>
        </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'fbuid'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'fbuid'); ?> <span><?php echo $form->error($model,'fbuid'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'twitteruid'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'twitteruid'); ?> <span><?php echo $form->error($model,'twitteruid'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'gender'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'gender',array('male'=>'male','female'=>'female','other'=>'other'),array('empty'=>'Select','style'=>'width:100px;')); ?> <span><?php echo $form->error($model,'gender'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'location'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'location'); ?> <span><?php echo $form->error($model,'location'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'bio'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model, 'bio'); ?> <span><?php echo $form->error($model,'bio'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'birthday_month'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'birthday_day',array('style'=>'width:30px;')).'&nbsp;'.$form->dropDownList($model, 'birthday_month',array('january'=>'january','febuary'=>'febuary','march'=>'march','april'=>'april','may'=>'may','june'=>'june','july'=>'july','august'=>'august','september'=>'september','october'=>'october','november'=>'november','december'=>'december'),array('style'=>'width:100px;')).'&nbsp;'.$form->textField($model,'birthday_year',array('style'=>'width:50px;'));?>
			<span><?php echo $form->error($model,'birthday_month'); ?> </span></div>
            <div class="clear"></div>
          </div>

		<div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getUserStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?>  </span></div>
            <div class="clear"></div>
          </div>
    
</div>
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

</div><!-- form --></div>