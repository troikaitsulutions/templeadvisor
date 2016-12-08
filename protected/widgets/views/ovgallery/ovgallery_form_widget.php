<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'ovgallery-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php // echo $form->errorSummary($model); ?>
    <?php // echo $form->hiddenField($model,'prop_id'); 
$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>
  </div>
  <div class="row-fluid">
    <div class="span10">
      <div class="head">
        <div class="isw-target"></div>
        <h1>
          <?php  echo Overview::GetName($page_id);  ?>
        </h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <?php
	
	$this->widget('common.extensions.dropzone.EDropzone', array(
    'model' => $model,
    'attribute' => 'file',
    'url' => Yii::app()->request->baseUrl.'/beovgallery/create?page_id='.$page_id,
    'mimeTypes' => array('image/jpeg'),
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
