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
        				'id'=>'online-pooja',
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
              <p> <?php echo $form->label($model,'mobile_number'); ?> <?php echo $form->textField($model, 'mobile_number'); ?> <span class="error"><?php echo $form->error($model,'mobile_number'); ?> </span> </p>
              <p> <?php echo $form->label($model,'nakshatra'); ?> <?php echo $form->textField($model, 'nakshatra'); ?> <span class="error"><?php echo $form->error($model,'nakshatra'); ?> </span> </p>
            <p> <?php echo $form->label($model,'gothara'); ?> <?php echo $form->textField($model, 'gothara'); ?> <span class="error"><?php echo $form->error($model,'gothara'); ?> </span> </p>
             <p> <?php echo $form->label($model,'dob'); ?> <?php echo $form->textField($model, 'dob'); ?> <span class="error"><?php echo $form->error($model,'dob'); ?> </span> </p>
             <p><?php echo $form->label($model,'purpose'); ?>
                <?php echo $form->dropDownList($model,'purpose',ConstantDefine::getpurpose(),array()); ?>
                 <span class="error"><?php echo $form->error($model,'Purpose'); ?> </span></p>
                 <!--Education, Marriage, Health, Wealth, General, Children-->
              <p><?php if($tid!='') { echo $form->label($model,'parent'); ?>
                <?php echo $form->dropDownList($model,'parent', array($tid => Temples::GetName($tid))); } else { echo $form->label($model,'parent'); ?> <?php echo $form->dropDownList($model,'parent', Temples::GetTempleDetails(), array()); } ?> <span class="error"><?php echo $form->error($model,'parent'); ?> </span></p>
              <p></p>
             
              <p>
                <label>&nbsp;</label>
                <input type="Submit" value="Send My Request" name="online-pooja">
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
