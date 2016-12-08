<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'itinerarydetail-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Itinerary'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span1"><?php echo $form->labelEx($model,'itinerary'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'itinerary',Itinerary::GetAllWithName()); ?> <span><?php echo $form->error($model,'itinerary'); ?></span> </div>
            <div class="span1"><?php echo $form->labelEx($model,'hour'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'itinerary',Itinerary::GetAllWithName()); ?> <span><?php echo $form->error($model,'itinerary'); ?></span> </div>
            
			<div class="span1"><?php echo $form->labelEx($model,'status'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
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
          <div class="row-form">
            <div class="span12">
              <?php $this->widget('common.components.redactorjs.Redactor', array( 'model' => $model, 'attribute' => 'comment' )); ?>
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
    <div class="span12">
      <div class="head">
        <div class="isw-grid"></div>
        <h1><?php echo t('All Itinerary'); ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid table-sorting">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'itinerary-grid',
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
	
		array(
			'name' => 'id',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->id',
			'visible'=>true
		    ),
			
		array('name'=>'tid',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Tourpackage::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->Tourpackages->name',
		    ),
			
		array(
			'name' => 'day',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->day',
			'visible'=>true
		    ),	
			
		array(
			'name' => 'comment',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			
			'value'=>'$data->comment',
			'visible'=>true
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
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id, "tid"=>$data->tid))',
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
