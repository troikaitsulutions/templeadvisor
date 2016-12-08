<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'maildoc-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>
    
    
    <div class="row-fluid">
      <div class="span8">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Mail Document'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        
        <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?> </div>
            <div class="clear"></div>
          </div>
        
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'title'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'title'); ?> <span><?php echo $form->error($model,'title'); ?> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'description'); ?></div>
          </div>
          
          <div class="row-form">
            
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'description' )); ?> <span>		<?php echo $form->error($model,'description'); ?> 
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'signature'); ?></div>
            
          </div>
          
          <div class="row-form">
            
             <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'signature' )); ?> <span><?php echo $form->error($model,'signature'); ?> 
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </div>
            <div class="clear"></div>
          </div>
          
          
          
        </div>
      </div>
      <?php if($model->isNewRecord) : ?>
      <div class="span4">
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
    </div>

    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
         
        </p>
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
