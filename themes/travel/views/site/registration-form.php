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
            <div class="online-pooja">
            <h2 class="rrh2size">Trip Info</h2>
            <div class="online-pooja-one">
              <p> <?php echo $form->label($model,'origin'); ?> <?php echo $form->textField($model, 'origin'); ?> <span class="error"><?php echo $form->error($model,'origin'); ?> </span> </p>
              <p> <?php echo $form->label($model,'number_of_pax'); ?>             
<select name="adult">
<option value="" selected="selected">Adult</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
</select>

<select name="childern">
<option value="" selected="selected">Childern</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
</select>

</p>
             </div>
             <div class="online-pooja-two">
              <p> <?php echo $form->label($model,'date_of_travel'); ?> <?php echo $form->textField($model, 'date_of_travel'); ?> <span class="error"><?php echo $form->error($model,'date_of_travel'); ?> </span> </p> 
             </div>
             </div>
             
             <div class="online-pooja">
              <h2 class="rrh2size">Person Info</h2>
            <div class="online-pooja-one">
              <p> <?php echo $form->label($model,'name'); ?> <?php echo $form->textField($model, 'name'); ?> <span class="error"><?php echo $form->error($model,'name'); ?> </span> </p>
              <p> <?php echo $form->label($model,'mobile_number'); ?> <?php echo $form->textField($model, 'mobile_number'); ?> <span class="error"><?php echo $form->error($model,'mobile_number'); ?> </span> </p>
              <p> <?php echo $form->label($model,'age'); ?> <?php echo $form->textField($model, 'age'); ?> <span class="error"><?php echo $form->error($model,'age'); ?> </span> </p>
             </div>
             <div class="online-pooja-two">
             <p> <?php echo $form->label($model,'email'); ?> <?php echo $form->textField($model, 'email'); ?> <span class="error"><?php echo $form->error($model,'email'); ?> </span> </p>
             <p> <?php echo $form->label($model,'gender'); ?> <input type="radio" name="sex" value="male" checked="checked">&nbsp;Male&nbsp;<input type="radio" name="sex" value="female">&nbsp;Female </span> </p>
             </div>
             </div>
             
             <div class="online-pooja-last">
             <h2 class="rrh2size">Address Info</h2>
            <div class="online-pooja-one">
            <p> <?php echo $form->label($model,'address_one'); ?> <?php echo $form->textField($model, 'address_one'); ?> <span class="error"><?php echo $form->error($model,'address_one'); ?> </span> </p>
               <p> <?php echo $form->label($model,'country'); ?> <?php echo $form->textField($model,'country'); ?> <span class="error"><?php echo $form->error($model,'country'); ?> </span> </p>
              <p> <?php echo $form->label($model,'district'); ?> <?php echo $form->textField($model,'district'); ?> <span class="error"><?php echo $form->error($model,'district'); ?> </span> </p>
               <p> <?php echo $form->label($model,'town'); ?> <?php echo $form->textField($model,'town'); ?> <span class="error"><?php echo $form->error($model,'town'); ?> </span> </p>
             </div>
             <div class="online-pooja-two">
               <p> <?php echo $form->label($model,'address_two'); ?> <?php echo $form->textField($model, 'address_two'); ?> <span class="error"><?php echo $form->error($model,'address_two'); ?> </span> </p>
                
              <p> <?php echo $form->label($model,'state'); ?> <?php echo $form->textField($model,'state'); ?> <span class="error"><?php echo $form->error($model,'state'); ?> </span> </p>
             <p> <?php echo $form->label($model,'zip_code'); ?> <?php echo $form->textField($model,'zip_code'); ?> <span class="error"><?php echo $form->error($model,'zip_code'); ?> </span> </p>
                <p>
                <label>&nbsp;</label>
                <input type="Submit" value="Send My Request" name="online-pooja">
              </p>
             </div>
             </div>
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
