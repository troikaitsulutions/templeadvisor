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
        'id'=>'psubcategory-form',
        'enableAjaxValidation'=>true,       
		'htmlOptions' => array('enctype' => 'multipart/form-data'),    
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Product Subcategory'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'name'); ?></div>
            <div class="span2"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
             <div class="span1"><?php echo $form->label($model,'source'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model, 'source', Tcategory::GetAll()); ?> <span><?php echo $form->error($model,'source'); ?> </span> </div>
            <div class="span1"><?php echo $form->label($model,'status'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="span1"></div>
            <div class="span1">
              <button class="btn btn-medium" type="submit">
              <?php if($model->isNewRecord) : ?>
              <?php echo t('Add'); ?>
              <?php else : ?>
              <?php echo t('Update'); ?>
              <?php endif; ?>
              </button>
            </div>
            <div class="clear"></div>
          </div>
          
          
          
        </div>
      </div>
    </div>
    
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Meta Info');  ?></h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
      </div>
    </div>
    <?php $this->endWidget(); ?>
  </div>
  <!-- form -->
  <?php $this->render('cmswidgets.views.tcategory.tcategory_form_javascript',array('model'=>$model,'form'=>$form)); ?>
  <div class="head">
    <div class="isw-grid"></div>
    <h1><?php echo t('All Product category'); ?></h1>
    <div class="clear"></div>
  </div>
  <div class="block-fluid table-sorting">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'town-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('results'),
	'pager' => array(
		'header'=>t('Go to page:'),
		'nextPageLabel' => t('Next'),
		'prevPageLabel' => t('previous'),
		'firstPageLabel' => t('First'),
		'lastPageLabel' => t('Last'),
                'pageSize'=> Yii::app()->settings->get('system', 'page_size')
	),
	'columns'=>array(
	
		
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array('name'=>'source',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Tcategory::GetName($data->source)',
		    ),
		
        array(
            'name'=>'status',
			'type'=>'image',   
            'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'User::convertUserState($data)',
            'filter'=>false
		    ),    		
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{update}',
		    'buttons'=>array
		    (
			'update' => array
			(
			    'label'=>t('Edit'),
			    'imageUrl'=>false,
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id))',
			),
		    ),
		),
		
	),
)); ?>
    <div class="clear"></div>
  </div>
</div>
