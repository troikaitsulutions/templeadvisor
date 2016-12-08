<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'selectcategory-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Select Category');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span4"><?php echo $form->labelEx($model,'category'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'category', Tcategory::GetAll() ,array()); ?> <span><?php echo $form->error($model,'category'); ?></span> </div>
            <div class="span2">
              <button class="btn btn-medium" type="submit">
              <?php if($model->isNewRecord) : ?>
              <?php echo t('Select'); ?>
              <?php else : ?>
              <?php echo t('Update'); ?>
              <?php endif; ?>
              </button>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
</div>
