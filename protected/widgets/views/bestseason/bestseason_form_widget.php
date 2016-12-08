<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'direction-form',
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
            <div class="span3"><?php echo $form->label($model,'from_date'); ?></div>
            <div class="span3">
            
             <?php
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    					'model' => $model,
    					'attribute' => 'from_date',
    					'htmlOptions' => array(
							'placeholder' => 'Start Date',
    						),
						));
					  ?>
            
             
              <span><?php echo $form->error($model,'from_date'); ?> </span></div>
            <div class="span3"><?php echo $form->label($model,'to_date'); ?></div>
            <div class="span3">
            
             <?php
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    					'model' => $model,
    					'attribute' => 'to_date',
    					'htmlOptions' => array(
							'placeholder' => 'End Date',
    						),
						));
					  ?>
            
            
              <span><?php echo $form->error($model,'to_date'); ?> </span></div>
            <div class="clear"></div>
          </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'name'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'comment'); ?></div>
          <div class="span5"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
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
