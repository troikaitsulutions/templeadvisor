<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		$temple_id = isset($_GET['temple']) ? strtolower(trim($_GET['temple'])) : ''; 
		
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo $meta->h1; ?></h1>
          <div class="temple_contact">
            <?php $this->render('cmswidgets.views.notification'); ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
        				'id'=>'contribute-my-article',
        				'enableAjaxValidation'=>true, 
						'htmlOptions' => array('enctype' => 'multipart/form-data'),          
        			)); 
					?>
            <?php echo $form->errorSummary(array($model, $mseo)); ?>
            <div class="temple_contact_business">
              <p> <?php echo $form->label($model,'name'); ?> <?php echo $form->textField($model, 'name'); ?> <span class="error"><?php echo $form->error($model,'name'); ?> </span> </p>
              <p> <?php echo $form->label($model,'email_id'); ?> <?php echo $form->textField($model, 'email_id'); ?> <span class="error"><?php echo $form->error($model,'email_id'); ?> </span> </p>
              <p> <?php echo $form->label($model,'phoneno'); ?> <?php echo $form->textField($model, 'phoneno'); ?> <span class="error"><?php echo $form->error($model,'phoneno'); ?> </span> </p>
              <?php if($temple_id=='') { ?>
              <p> <?php echo $form->label($model,'heading'); ?> <?php echo $form->textField($model,'heading'); ?> <span class="error"><?php echo $form->error($model,'heading'); ?> </span> </p>
              <?php } else { 
									$model->heading = Temples::GetName($temple_id);
							?>
              <p> <?php echo $form->label($model,'heading'); ?> <?php echo $form->textField($model,'heading',array('readOnly'=>'readOnly')); ?> <span class="error"><?php echo $form->error($model,'heading'); ?> </span> </p>
              <?php } ?>
              <p> <?php echo $form->label($model,'content1'); ?> <?php echo $form->textArea($model, 'content1', array('rows' => 15, 'cols' => 50)); ?> <span class="error"><?php echo $form->error($model,'content1'); ?> </span> </p>
              <p> <?php echo $form->labelEx($model,'img_url_1'); ?> <?php echo $form->fileField($model, 'img_url_1');?> <span class="error"><?php echo $form->error($model,'img_url_1'); ?></span> </p>
              <p> <?php echo $form->labelEx($model,'img_url_2'); ?> <?php echo $form->fileField($model, 'img_url_2');?> <span class="error"><?php echo $form->error($model,'img_url_2'); ?></span> </p>
              <p> <?php echo $form->labelEx($model,'img_url_3'); ?> <?php echo $form->fileField($model, 'img_url_3');?> <span class="error"><?php echo $form->error($model,'img_url_3'); ?></span> </p>
              <p> <?php echo $form->labelEx($model,'img_url_4'); ?> <?php echo $form->fileField($model, 'img_url_4');?> <span class="error"><?php echo $form->error($model,'img_url_4'); ?></span> </p>
              <p> <?php echo $form->labelEx($model,'img_url_5'); ?> <?php echo $form->fileField($model, 'img_url_5');?> <span class="error"><?php echo $form->error($model,'img_url_5'); ?></span> </p>
              <p>
                <label>&nbsp;</label>
                <input type="Submit" value="Send" name="Send">
              </p>
            </div>
            <?php $this->endWidget(); ?>
            <div class="clr"></div>
          </div>
        </div>
      </div>
      <div class="temple_content_right">
        <div class="tmp_details">
          <?php $this->renderPartial('//layouts/recent-article-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
        <div class="tmp_details">
          <?php $this->renderPartial('//layouts/recent-review-right-pane',array('layout_asset'=>$layout_asset)); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
+