
<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'gallery-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="block gallery"> <a class="fancybox" rel="group" href="<?php echo Slider::GetLargeImage($model); ?>"><img src="<?php echo Slider::GetThumbnail($model); ?>" width="300px" height="150px" class="img-polaroid"/></a>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <?php if($model->isNewRecord) : ?>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Available Languages'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <?php if(count($versions)>0) : ?>
            <div class="span5"> <?php echo "<strong style='color:#DD4B39'>".t("Translated Version of :")."</strong>" ?> </div>
            <div class="span7">
              <?php foreach($versions as $version) :?>
              <?php  echo "<b> ".$version."</b>,"; ?>
              <?php endforeach; ?>
            </div>
            <div class="clear"></div>
            <?php endif; ?>
          </div>
          <?php if((int)settings()->get('system','language_number')>1) : ?>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'lang'); ?> </div>
            <div class="span7"><?php echo $form->dropDownList($model,'lang',Language::items($lang_exclude),
                    array('options' => array(array_search(Yii::app()->language,Language::items($lang_exclude,false))=>array('selected'=>true)))
                    ); ?> <span><?php echo $form->error($model,'lang'); ?></span></div>
            <div class="clear"></div>
          </div>
          <?php else : ?>
          <?php echo $form->hiddenField($model,'lang',array('value'=>Language::mainLanguage())); ?>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Alt & Description'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model,'name'); ?> <span><?php echo $form->error($model,'name'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'description'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model,'description'); ?> <span><?php echo $form->error($model,'description'); ?></span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit"><?php echo t('Add To Slider'); ?></button>
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.gallery.gallery_form_javascript',array('model'=>$model,'form'=>$form)); ?>
