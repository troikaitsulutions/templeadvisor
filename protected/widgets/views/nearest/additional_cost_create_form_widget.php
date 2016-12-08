<div class="workplace">
<div class="form">
<?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'additional-cost-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model,'prop_id'); ?> </div>
<div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo Pinfo::getPageName($model->prop_id);  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'name'); ?></div>
            <div class="span2"><?php echo $form->label($model,'year'); ?></div>
            <div class="span1"><?php echo $form->label($model,'cost'); ?></div>
            <div class="span2"><?php echo $form->label($model,'comment'); ?></div>
            <div class="span2"><?php echo $form->label($model,'status'); ?></div>
            <div class="span2"><?php echo $form->label($model,'lang'); ?></div>
         </div>
          
          <div class="row-form">
            <div class="span2"><?php //echo CHtml::textField('name[]','',array('class'=>'box_required')); 
			echo CHtml::dropDownList('name[]', '', Additional::GetAllAdditional(),array('class'=>'box_required'));?></div>

            <div class="span2"><?php $year=array(); foreach(range(2013, 2025) as $data){ $year[$data] = $data; } echo CHtml::dropDownList('year[]', date('Y'), $year,array('class'=>'box_required')); ?></div>

            <div class="span1"><?php echo CHtml::textField('cost[]','',array('class'=>'box_required')); ?></div>

            <div class="span2"><?php echo CHtml::textField('comment[]','',array('class'=>'comments')); ?></div>

            <div class="span2"><?php echo Chtml::dropDownList('status[]', '', array('1'=>'Active','2'=>'Disable'),array('class'=>'box_required')); ?></div>
            
            <div class="span2"><?php echo Chtml::dropDownList('lang[]','',Language::items($lang_exclude),array('options' => array(array_search(Yii::app()->language,Language::items($lang_exclude,false))=>array('selected'=>true)),'class'=>'box_required')); ?></div>
            
            <div class="clear"></div>
          </div>
          
          <div id="adding_div"></div>
          
          <div class="plus_symbol"><span onclick="add_row()">+</span></div>
          <?php echo CHtml::hiddenField('rows',0);?>         
        </div>
      </div>
    </div>
  <div class="dr"><span></span></div>
   
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="button" onclick="validate_fields()"><?php echo t('Save'); ?></button>
         
        </p>
      </div>
    </div>
    <br class="clear" />
  <?php $this->endWidget(); ?>
</div>
<!-- form -->
</div>
<?php $this->render('cmswidgets.views.additionalcost.additionalcost_form_javascript',array('model'=>'Additionalcost','message'=>'The Additional Cost has been Added Successfully!')); ?>
