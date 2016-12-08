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

<div class="form">
<?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'object-form',
        'enableAjaxValidation'=>false,       
        )); 
?>
<?php echo $form->errorSummary($model); ?>
<div class="form-wrapper">
    
    <div id="form-body">
            <div id="form-body-content">                  
                    <div class="row">
                    		<?php $this->render('cmswidgets.views.object.object_resource_form_widget',array('model'=>$model,'type'=>$type,'content_resources'=>$content_resources)); ?>                    	
                    </div>
            </div>
    </div>
						
</div>
<br class="clear" />
<?php $this->endWidget(); ?>
</div><!-- form -->

<!-- //Render Partial for Javascript Stuff -->
<?php $this->render('cmswidgets.views.object.object_form_javascript',array('model'=>$model,'form'=>$form,'type'=>$type)); ?>
