<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'slider-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php // echo $form->errorSummary($model); ?>
    <?php // echo $form->hiddenField($model,'prop_id');  ?>
  </div>
  <div class="row-fluid">
    <div class="span10">
      <div class="head">
        <div class="isw-target"></div>
        <h1>
          <?php  echo t('Slider Photos');  ?>
        </h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <?php
	
	$this->widget('common.extensions.dropzone.EDropzone', array(
    'model' => $model,
    'attribute' => 'file',
    'url' => Yii::app()->request->baseUrl.'/beslider/create',
    'mimeTypes' => array('image/jpg', 'image/png', 'image/gif'),
    'onSuccess' => 'someJsFunction();',
    'options' => array(),
));
	?>
        <!-- <div id="calendar" class="fc"></div> --> 
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span9"> </div>
  </div>
  <br class="clear" />
  <?php $this->endWidget(); ?>
</div>
<!-- form -->
</div>
