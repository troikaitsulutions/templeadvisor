<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'nearest-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?> <?php echo $form->hiddenField($model,'prop_id'); ?> </div>
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo Temples::GetName($model->prop_id);  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'things'); ?></div>
          <div class="span5"> <?php echo $form->dropDownList($model, 'things',Nthings::GetAll()); ?> <span><?php echo $form->error($model,'things'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'town'); ?></div>
          <div class="span5"> <?php echo $form->dropDownList($model, 'town',Town::GetAll()); ?> <span><?php echo $form->error($model,'town'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'name'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'distant'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'distant'); ?> <span><?php echo $form->error($model,'distant'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'status'); ?></div>
          <div class="span3"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="dr"><span></span></div>
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
