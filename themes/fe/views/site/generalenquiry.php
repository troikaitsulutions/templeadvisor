<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    
    <div class="theme-slogan">
       <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> <a href="<?php echo Yii::app()->createUrl('site/writereviews')?>"><img  src="<?php echo $layout_asset; ?>/images/write-review-icon.png" title="Write a Review" alt="Write a Review"><?php echo t('Rate & Review Temples'); ?></a>  </span> </div>
      <div class="clr"></div>
    </div>
    
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo $meta->h1; ?></h1>
          <div class="temple_contact">
           <?php $this->render('cmswidgets.views.notification'); ?>
    				<?php $form=$this->beginWidget('CActiveForm', array(
        				'id'=>'business-enquiry',
        				'enableAjaxValidation'=>true,       
        			)); 
					?>
    				<?php echo $form->errorSummary(array($model)); ?>
                    
            <div class="temple_contact_business">
                           <p>
                            	<?php echo $form->label($model,'name'); ?>
                            	<?php echo $form->textField($model, 'name'); ?>
                            	<span class="error"><?php echo $form->error($model,'name'); ?> </span>
                            
                            </p>
                           
                        
                            <p>
                            	<?php echo $form->label($model,'email'); ?>
                            	<?php echo $form->textField($model, 'email'); ?>
                            	<span class="error"><?php echo $form->error($model,'email'); ?> </span>
                            </p>
                            <p>
                            	<?php echo $form->label($model,'phoneno'); ?>
                            	<?php echo $form->textField($model, 'phoneno'); ?>
                            	<span class="error"><?php echo $form->error($model,'phoneno'); ?> </span>
                            </p>
                           
                            <p>
                            	<?php echo $form->label($model,'remarks'); ?>
                            	<?php echo $form->textArea($model, 'remarks',array('rows' => 8, 'cols' => 32)); ?>
                            	<span class="error"><?php echo $form->error($model,'remarks'); ?> </span>
                            </p>
                            <p>
                            	<label>&nbsp;</label>
                                <input type="Submit" value="Send" name="">
                            </p>
                        </div>
                         <?php $this->endWidget(); ?>
            <div class="clr"></div>
          </div>
        </div>
      </div>
 <div class="temple_content_right">
    <div class="tmp_details">
       <?php  $this->renderPartial('//layouts/contact-address-right-pane',array('layout_asset'=>$layout_asset));  ?>
      </div>
      </div> 
    </div>
  </div>
</div>
<?php $this->renderPartial('//layouts/footer',array('layout_asset'=>$layout_asset)); ?>
</body>
