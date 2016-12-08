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
            <div class="span5"><?php echo $form->labelEx($model,'site_name'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'site_name'); ?> <span><?php echo $form->error($model,'site_name'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'slogan'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'slogan'); ?> <span><?php echo $form->error($model,'slogan'); ?> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'site_title'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'site_title'); ?> <span><?php echo $form->error($model,'site_title'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'site_description'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'site_description'); ?> <span><?php echo $form->error($model,'site_description'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'homepage'); ?></div>
            <div class="span7"><?php echo $form->textField($model,'homepage'); ?> <span><?php echo $form->error($model,'homepage'); ?> </div>
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
