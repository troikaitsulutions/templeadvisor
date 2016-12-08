<?php
 		if(YII_DEBUG)
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        else
            $layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
			
		Yii::app()->clientScript->registerCssFile($layout_asset.'/css/jquery.rating.css');
		Yii::app()->clientScript->registerScriptFile($layout_asset.'/js/jquery.rating.js', CClientScript::POS_HEAD);
?>

<body>
<?php $this->renderPartial('//layouts/headerlogo',array('layout_asset'=>$layout_asset)); ?>
<div id="main" class="site-main container_16">
  <div class="inner clearfix">
    <div class="theme-slogan">
      <?php $this->renderPartial('//layouts/bcrumbs',array('layout_asset'=>$layout_asset, 'meta'=>$meta )); ?>
      <div class="theme-slogan-right"> <span> <a href="<?php echo Yii::app()->createUrl('site/contributemyarticle')?>"><img  src="<?php echo $layout_asset; ?>/images/contribute-an-article-icon.png" alt="Contribute an Article" title="Contribute an Article"><?php echo t('Contribute an Article'); ?></a> </span> </div>
      <div class="clr"></div>
    </div>
    <div class="temple_content_section">
      <div class="temple_content_left">
        <div class="temple_content_description">
          <h1><?php echo $meta->h1; ?></h1>
          <div class="temple_review">
            <?php $this->render('cmswidgets.views.notification'); ?>
            <?php $form=$this->beginWidget('CActiveForm', array(
        				'id'=>'write-review',
        				'enableAjaxValidation'=>true,       
        			)); 
					?>
            <?php echo $form->errorSummary(array($model)); ?>
            <?php 
			$tid = isset($_GET['temple']) ? strtolower(trim($_GET['temple'])) : ''; 
			$model->parent = $tid; 
			
			
          //  echo count(Temples::GetAllWithAddress());
            ?>
            <div class="temple_review_page">
              <p> <?php echo $form->label($model,'name'); ?> <?php echo $form->textField($model, 'name'); ?> <span class="error"><?php echo $form->error($model,'name'); ?> </span> </p>
              <p> <?php echo $form->label($model,'email'); ?> <?php echo $form->textField($model, 'email'); ?> <span class="error"><?php echo $form->error($model,'email'); ?> </span> </p>
              <p>
                <?php if($tid!='') { echo $form->label($model,'parent'); ?>
                <?php echo $form->dropDownList($model,'parent', array($tid => Temples::GetName($tid))); } else { echo $form->label($model,'parent'); ?> <?php echo $form->dropDownList($model,'parent', Temples::GetTempleDetails(), array()); } ?> <span class="error"><?php echo $form->error($model,'parent'); ?> </span> </p>
              <div class="clr">
                <p> <?php echo $form->label($model,'divine_power'); ?> <?php echo $form->radioButtonList($model,'divine_power',array(1=>'',2=>'',3=>'',4=>'',5=>''),array('class'=>'star')); ?> <em>less<span>High</span></em> </p>
              </div>
              <p></p>
              <div class="clr">
                <p> <?php echo $form->label($model,'popularity'); ?> <?php echo $form->radioButtonList($model,'popularity',array(1=>'',2=>'',3=>'',4=>'',5=>''),array('class'=>'star star-formsed-four')); ?> 
                  <em>Low<span>&nbsp;&nbsp;&nbsp;High</span></em> </p>
              </div>
              <p></p>
              <div class="clr">
                <p> <?php echo $form->label($model,'cleanliness'); ?> <?php echo $form->radioButtonList($model,'cleanliness',array(1=>'',2=>'',3=>'',4=>'',5=>''),array('class'=>'star star-formsed-two')); ?> 
                  <em>Dirty<span>&nbsp;&nbsp;&nbsp;Clean</span></em> </p>
              </div>
              <p></p>
              <div class="clr">
                <p> <?php echo $form->label($model,'accessibility'); ?> <?php echo $form->radioButtonList($model,'accessibility',array(1=>'',2=>'',3=>'',4=>'',5=>''),array('class'=>'star star-formsed-one')); ?> 
                  <em>Difficult<span>&nbsp;&nbsp;&nbsp;Easy</span></em> </p>
              </div>
              <p></p>
              <div class="clr">
                <p> <?php echo $form->label($model,'facility_food'); ?> <?php echo $form->radioButtonList($model,'facility_food',array(1=>'',2=>'',3=>'',4=>'',5=>''),array('class'=>'star star-formsed')); ?> 
                  <em>Not Available<span>Available</span></em> </p>
              </div>
              <p></p>
              <p> <?php echo $form->label($model,'comments'); ?> <?php echo $form->textArea($model, 'comments',array('rows' => 8, 'cols' => 32)); ?> <span class="error"><?php echo $form->error($model,'comments'); ?> </span> </p>
              <p>
                <label>&nbsp;</label>
                <input type="Submit" value="Send" name="write-review">
              </p>
            </div>
            <?php $this->endWidget(); ?>
          </div>
          <div class="clr"></div>
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
