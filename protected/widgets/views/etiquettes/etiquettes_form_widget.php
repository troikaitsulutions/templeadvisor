<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'etiquettes-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Temple Etiquettes'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
         
          <div class="row-form">
         <div class="span2"><?php echo $form->labelEx($model,'name'); ?></div>
            <div class="span2"> <?php echo $form->textField($model, 'name',array()); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
             <div class="span2"><?php echo $form->labelEx($model,'comments'); ?></div>
            <div class="span2"> <?php echo $form->textField($model, 'comments',array()); ?> <span><?php echo $form->error($model,'comments'); ?></span> </div>
            
            <div class="span1"><?php echo $form->labelEx($model,'status'); ?></div>
            <div class="span1"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="span1"><button class="btn btn-small" type="submit">  <?php if($model->isNewRecord) : ?> <?php echo t('Add'); ?> <?php else : ?> <?php echo t('Update'); ?>  <?php endif; ?> </button> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>

<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Etiquettes'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'etiquettes-grid',
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
			'value'=>'$data->name',
		    ),
		array('name'=>'comments',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->comments',
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


