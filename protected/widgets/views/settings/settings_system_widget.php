<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'settings-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-settings"></div>
          <h1><?php echo t('General Settings'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'support_email'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'support_email'); ?> <span><?php echo $form->error($model,'support_email'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'page_size'); ?></div>
            <div class="span2"><?php echo $form->textField($model,'page_size'); ?> <span><?php echo $form->error($model,'page_size'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'language_number'); ?></div>
            <div class="span2"><?php echo $form->textField($model,'language_number'); ?> <span><?php echo $form->error($model,'language_number'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'keep_file_name_upload'); ?></div>
            <div class="span2"><?php echo $form->dropDownList($model,'keep_file_name_upload',SettingSystemForm::filenameUpload()); ?> <span><?php echo $form->error($model,'keep_file_name_upload'); ?> </div>
            <div class="clear"></div>
          </div>
        </div>
        <!-- form --> 
      </div>
    </div>
    <div class="row-fluid">
      <div class="span6">
        <p>
          <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
        </p>
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
</div>
