<div class="workplace">
<div class="form">
  <?php $this->render('cmswidgets.views.notification'); ?>
  <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'overview-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
  <?php echo $form->errorSummary(array($model)); ?>
  <div class="span6" style="float:right;"> </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Overview Details'); ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span2"><?php echo $form->labelEx($model,'title'); ?></div>
          <div class="span3"> <?php echo $form->textField($model, 'title',array('id'=>'txt_overview_title')); ?> <span><?php echo $form->error($model,'title'); ?></span> </div>
          <div class="span2"><?php echo $form->labelEx($model,'status'); ?></div>
          <div class="span2"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
          <div class="span1"></div>
          <div class="span1">
            <button class="btn btn-small" type="submit">
            <?php if($model->isNewRecord) : ?>
            <?php echo t('Add'); ?>
            <?php else : ?>
            <?php echo t('Update'); ?>
            <?php endif; ?>
            </button>
          </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'description')); ?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="dr"><span></span></div>
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1>SEO Info : Rental Site</h1>
        <div class="clear"></div>
      </div>
      <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
    </div>
  </div>
  <br class="clear" />
  <?php $this->endWidget(); ?>
</div>
