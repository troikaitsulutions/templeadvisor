<?php
if(YII_DEBUG)
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, true);
        else
            $backend_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.backend'), false, -1, false);
?>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="loginBox">
  <div class="loginHead"> <img src="<?php echo $backend_asset; ?>/images/logo_small.png" alt="Temple Adviser LLB" title="Temple Adviser LLB" /> </div>
  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-content',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
 
 <div class="control-group"> <?php echo $form->label($model,'username'); ?> <?php echo $form->textField($model,'username',array('id'=>'inputEmail')); ?> <?php echo $form->error($model,'username'); ?> </div>
  <div class="control-group"> <?php echo $form->label($model,'password'); ?> <?php echo $form->passwordField($model,'password',array('id'=>'inputPassword')); ?> <?php echo $form->error($model,'password'); ?> </div>
  <div class="control-group" style="margin-bottom: 5px;">
    <label class="checkbox"> <?php echo $form->checkBox($model,'rememberMe'); ?> Remember me</label>
  </div>
  <div class="form-actions"> <?php echo CHtml::submitButton(t('Sign in'),array('class'=>'btn btn-block')); ?> </div>
  <?php $this->endWidget(); ?>
</div>
