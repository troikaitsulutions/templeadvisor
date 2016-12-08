<?php
                    $mycs=Yii::app()->getClientScript();                    
                    if(YII_DEBUG)
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, true);				
						                    
                    else
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, false);				
						                    	
                    
                    $urlScript_ckeditor= $ckeditor_asset.'/ckeditor.js';
                    $urlScript_ckeditor_jquery=$ckeditor_asset.'/adapters/jquery.js';
                    $mycs->registerScriptFile($urlScript_ckeditor, CClientScript::POS_HEAD);
                    $mycs->registerScriptFile($urlScript_ckeditor_jquery, CClientScript::POS_HEAD);   
					
					                 
?>

<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'town-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Town'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'source'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'source', District::GetAll(false), array()); ?> <span><?php echo $form->error($model,'source'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'zip'); ?></div>
            <div class="span7"> <?php echo $form->textField($model,'zip'); ?> <span><?php echo $form->error($model,'zip'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'latitude'); ?></div>
            <div class="span3"> <?php echo $form->textField($model, 'latitude',array()); ?> <span><?php echo $form->error($model,'latitude'); ?></span> </div>
            <div class="span2"><?php echo $form->label($model,'longitude'); ?></div>
            <div class="span3"> <?php echo $form->textField($model, 'longitude',array()); ?> <span><?php echo $form->error($model,'longitude'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'addtohome'); ?></div>
            <div class="span7"> <?php echo $form->checkBox($model,'addtohome',array()); ?> <span><?php echo $form->error($model,'addtohome'); ?> </span> </div>
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
    </div>
     <div class="dr"><span></span></div>
    <div class="row-fluid">
      <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'content' )); ?>
    </div>
    <div class="dr"><span></span></div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1>SEO Info</h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
      </div>
      
    </div>
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
<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.town.town_form_javascript',array('model'=>$model,'form'=>$form)); ?>
