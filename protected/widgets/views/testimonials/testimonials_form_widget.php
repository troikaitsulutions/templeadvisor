<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'testimonials-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Testimonials'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span1"><?php echo $form->label($model,'name'); ?></div>
            <div class="span4"><?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
            <div class="span1"><?php echo $form->label($model,'email'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'email',array()); ?> <span><?php echo $form->error($model,'email'); ?> </span> </div>
           <div class="clear"></div>
          </div>
 
           <div class="row-form">
             <div class="span1"><?php echo $form->label($model,'heading'); ?></div>
             <div class="span4"> <?php echo $form->textArea($model,'heading',array()); ?> <span><?php echo $form->error($model,'heading'); ?> </span> </div>
          
            <div class="span1"><?php echo $form->label($model,'comment'); ?></div>
            <div class="span4"> <?php echo $form->textArea($model,'comment',array()); ?> <span><?php echo $form->error($model,'comment'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'status'); ?></div>
            <div class="span2"><?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
            <div class="span3"> </div>
            <div class="span1">
              <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff --> 
