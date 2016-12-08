<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'fevents-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Festival/Events');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
       <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'fdate'); ?></div>
            <div class="span9">
            
             <?php
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    					'model' => $model,
    					'attribute' => 'fdate',
    					'htmlOptions' => array(
							'placeholder' => 'Date',
    						),
						));
					  ?>
            
             
              <span><?php echo $form->error($model,'fdate'); ?> </span></div>
            <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span3"><?php echo $form->label($model,'name'); ?></div>
          <div class="span9"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		<div class="row-form">
            <div class="span3"><?php echo $form->label($model,'religion'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'religion', Religion::GetAll(), array('id'=>'s2_3', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> 
			<span>Select the Religion, if the festival or event will be happening all this religion's temples<?php echo $form->error($model,'religion'); ?> </span> </div>
            
            <div class="clear"></div>
        </div>
		
		<div class="row-form">
            <div class="span3"><?php echo $form->label($model,'deity'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'deity', Diety::GetAll(), array('id'=>'s2_2', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'deity'); ?> </span> </div>
            
            <div class="clear"></div>
        </div>
		
		
		
		
		
		<div class="row-form">
            <div class="span3"><?php echo $form->label($model,'temples'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'temples', Temples::GetAll(), array('id'=>'s2_1', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'temples'); ?> </span> </div>
            
            <div class="clear"></div>
        </div>
		
		
        <div class="row-form">
          <div class="span3"><?php echo $form->label($model,'comment'); ?></div>
		  
		  <div id="redactor" class="span9">
          <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'comment' )); ?>
        </div>
          
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span3"><?php echo $form->label($model,'status'); ?></div>
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
