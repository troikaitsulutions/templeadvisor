<div class="workplace">
<div class="form">
<?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'additional-cost-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model,'prop_id'); ?> </div>
<div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo Pinfo::getPageName($model->prop_id);  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'name',Additional::GetAllAdditional()); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'year'); ?></div>
            <div class="span2"> <?php 
			$year=array();
			foreach(range(2013, 2025) as $data){ $year[$data] = $data; }
			echo $form->dropDownList($model, 'year', $year,array('empty'=>'Select')); ?> <span><?php echo $form->error($model,'year'); ?></span> </div>
            <div class="clear"></div>
          </div>
                       
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'cost'); ?></div>
            <div class="span2"> <?php echo $form->textField($model, 'cost'); ?> <span><?php echo $form->error($model,'cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
                       
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'comment'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
            <div class="clear"></div>
          </div>
                       
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'status',  array('1'=>'Active','2'=>'Disable')); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
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
            <div class="span3"><?php echo $form->dropDownList($model,'lang',Language::items($lang_exclude),
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
    </div>
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
<!-- form -->
</div>