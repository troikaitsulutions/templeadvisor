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
      <div class="theme-slogan-right"> <span><a href="<?php echo Yii::app()->createUrl('testimonialsread/index')?>"><img  src="<?php echo $layout_asset; ?>/images/testimonial-icon.png" title="Write a Testimonials" alt="Write a Testimonials"> <?php echo t('Write a Testimonials'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <?php foreach ( $Testimonials as $Testimonial) { ?>
        <div class="tmp_region_right_testi">
          <h3><?php echo $Testimonial->heading; ?><span> <?php echo ' by '.$Testimonial->name; ?></span></h3>
          <ul>
            <li><span><img alt="" src="<?php echo $layout_asset; ?>/images/calc.png"></span><?php echo date("M d,Y",$Testimonial->created); ?></li>
            <li><span><img alt="" src="<?php echo $layout_asset; ?>/images/clock.png"></span><?php echo date("h:i A",$Testimonial->created); ?></li>
          </ul>
          <div class="clr"></div>
          <div class="tmp_region_testi_left"> <span><a href="#"><img alt="Testimonial" src="<?php echo $layout_asset; ?>/images/testi-man.png"></a></span> </div>
          <div class="tmp_region_testi_right">
            <p><?php echo $Testimonial->comment; ?> <span class="alignright"></span> </p>
          </div>
          
          <div class="clr"></div>
        </div>
        
        <?php } ?>
        <div class="paginate">
                  <?php  $this->widget('application.components.SimplaPager', array('pages'=>$pages)); ?>
                </div>
        <div class="temple_contact_business">
          <h5><?php echo t('Add Your Testimonials'); ?></h5>
          <?php $this->render('cmswidgets.views.notification'); ?>
          <?php $form=$this->beginWidget('CActiveForm', array(
        				'id'=>'testimonials-form',
        				'enableAjaxValidation'=>true,       
        			)); 
					?>
          <?php echo $form->errorSummary(array($model)); ?>
          <div class="form_testimonial">
            <p> <?php echo $form->label($model,'name'); ?> <?php echo $form->textField($model, 'name'); ?> <span class="error"><?php echo $form->error($model,'name'); ?> </span> </p>
            <p> <?php echo $form->label($model,'email'); ?> <?php echo $form->textField($model, 'email'); ?> <span class="error"><?php echo $form->error($model,'email'); ?> </span> </p>
            <p> <?php echo $form->label($model,'heading'); ?> <?php echo $form->textField($model, 'heading'); ?> <span class="error"><?php echo $form->error($model,'heading'); ?> </span> </p>
            <p> <?php echo $form->label($model,'comment'); ?> <?php echo $form->textArea($model, 'comment',array('rows' => 8, 'cols' => 32)); ?> <span class="error"><?php echo $form->error($model,'comment'); ?> </span> </p>
            <p>
              <label>&nbsp;</label>
              <input type="Submit" value="Send" name="">
            </p>
          </div>
          <?php $this->endWidget(); ?>
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
