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
        'id'=>'country-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    
    <div class="span6" style="float:right;">

</div>

    <div class="row-fluid">
    
    <div class="span6">
    
        <div class="head">
          <div class="isw-target"></div>
          <h1>Country</h1>
          <div class="clear"></div>
        </div>
      
      <div class="block-fluid">
      
      <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'name', Countrylist::GetAll(false), array()); ?> <span><?php echo $form->error($model,'name'); ?></span>  </div>
            <div class="clear"></div>
          </div>
          
      <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?> </span> </div>
            <div class="clear"></div>
          </div>
        
      
      </div>
    
    </div>
    
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
          <h1>SEO Info : Rental Site</h1>
          <div class="clear"></div>
        </div>
      <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>  
      </div>
      
      
      
    </div>
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit">Save</button>
         
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
</div>
<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.country.country_form_javascript',array('model'=>$model,'form'=>$form)); ?>
