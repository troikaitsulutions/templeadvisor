<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'clink-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>
    
    
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Content Link'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'title'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'title'); ?> <span><?php echo $form->error($model,'title'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'anchor'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'anchor'); ?> <span><?php echo $form->error($model,'anchor'); ?> </div>
            <div class="clear"></div>
          </div>
          
          
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'url'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'url'); ?> <span><?php echo $form->error($model,'url'); ?> </div>
            <div class="clear"></div>
          </div>

          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'text_format'); ?></div>
            <div class="span7"><table style="margin-top:-120px;"> <?php 
			if($model->text_format!=''){$model->text_format=explode(',',$model->text_format);}$data=array('Bold'=>'Bold','Italic'=>'Italic','Underline'=>'Underline','Normal'=>'Normal','StrikeThrough'=>'StrikeThrough');echo $form->checkBoxList($model,'text_format',$data, array(
    'template'=>'<tr><td>{input}</td><td>{label}</td></tr>',
));?></table> <span><?php echo $form->error($model,'text_format'); ?> </div>
            <div class="clear"></div>
          </div>

          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'font_size'); ?></div>
            <div class="span7">  <?php echo $form->dropDownList($model,'font_size', array('8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','14'=>'14','16'=>'16','18'=>'18','20'=>'20','22'=>'22','24'=>'24','26'=>'26','28'=>'28','36'=>'36','48'=>'48','72'=>'72') ,array('empty'=>'Select')); ?> <span><?php echo $form->error($model,'font_size'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </div>
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
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
