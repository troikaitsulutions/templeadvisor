<?php  $tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0; ?>

<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'itinerary-form',
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
            <div class="span1"><?php echo $form->labelEx($model,'day'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'day',array(1=>'1st Day',2=>'2nd Day',3=>'3rd Day',4=>'4th Day',5=>'5th Day',6=>'6th Day',7=>'7th Day',8=>'8th Day',9=>'9th Day',10=>'10th Day')); ?> <span><?php echo $form->error($model,'day'); ?></span> </div>
            <div class="span1"><?php echo $form->labelEx($model,'temples'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'temples',  Temples::GetTempleDetails(),array('id'=>'s2_2', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'temples'); ?></span> </div>
            
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
	'dataProvider'=>$model->searchByobject($tid),
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
			'name' => 'day',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:7%'),
			'value'=>'$data->day',
			'visible'=>true
		    ),	
		
		
		array('header'=>'Temple ID',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:20%'),
			'value'=>'Itinerary::GetTempleList($data->temples)',
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
