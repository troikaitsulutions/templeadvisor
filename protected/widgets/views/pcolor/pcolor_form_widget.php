<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'pcolor-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?> 
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Color info');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
            <div class="span2"><?php echo $form->label($model,'name'); ?></div>
            <div class="span3"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
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
 
  
  <br class="clear" />
  <?php $this->endWidget(); ?>
</div>
<!-- form -->

<div class="row-fluid">
  <div class="span8">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t('All Colors'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid table-sorting">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'planguage-grid',
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
		array
		(
		    'class'=>'CButtonColumn',
		    'template'=>'{delete}',
		    'buttons'=>array
		    (
			'delete' => array
			(
                            'label'=>t('Delete'),
			    'imageUrl'=>false,
			),

		    ),
		),
	),
)); ?>
      <div class="clear"></div>
    </div>
  </div>
</div>
</div>
