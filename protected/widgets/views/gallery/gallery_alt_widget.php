<?php $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>

<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'gallery-alt-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1>
            <?php  echo Pinfo::getPageName($page_id);  ?>
            <?php echo t('Alt & Description'); ?></h1>
          <div class="clear"></div>
        </div>
        <?php foreach ($models as $model) { ?>
        <div class="block-fluid">
        
          <div class="row-form">
            <div class="block gallery"> <a class="fancybox" rel="group" href="<?php echo Gallery::GetLargeImage($model); ?>"><img src="<?php echo Gallery::GetThumbnail($model); ?>" class="img-polaroid"/></a></div>
            <div class="span5"><?php echo 'Photo Description From Saved List'; ?></div>
            <div class="span5"> <?php echo CHtml::dropDownList($model->id.'src',$model->src, Phototitle::GetAll(false),array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadalt',
							'data'=>array('photo_title_id'=>'js:this.value'),
							
							'success' => 'function(data) { 
							    $("#'.$model->id.'_en_name").val(data.photo_en);
								
								
								$("#'.$model->id.'_en_alt_text").val(data.photo1_en);
								
								$("#'.$model->id.'_en_description").val(data.photo2_en);
								

							}',  
                        )
	 )); ?></div>
     
     
     
     		
     		<div class="span2"> <?php echo 'Name';?></div>
            <div class="span2"> <?php echo 'Alternative Text'; ?></div>
            <div class="span4"> <?php echo 'Description'; ?></div>
    
           
             
     		<div class="span2"> <?php echo CHtml::textField($model->id.'_en_name',$model->name); ?></div>
            <div class="span2"> <?php echo CHtml::textField($model->id.'_en_alt_text',$model->alt_text); ?></div>
            <div class="span4"> <?php echo CHtml::textField($model->id.'_en_description',$model->description); ?></div>
        
           
       <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php echo $form->hiddenField($model,'prop_id',array('value'=>$page_id)); ?>
    <div class="clear"></div>
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
</div>
