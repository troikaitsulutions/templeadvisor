<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tourcost-form',
        'enableAjaxValidation'=>true,      
		'htmlOptions' => array('enctype' => 'multipart/form-data'),  
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?> 
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Tour Cost');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'tid'); ?></div>
          <div class="span7"><?php echo $form->dropDownList($model, 'tid', Tourpackage::GetAll()); ?> <span><?php echo $form->error($model,'tid'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'vehicle'); ?></div>
          <div class="span7"><?php echo $form->dropDownList($model, 'vehicle', Vehicles::GetAll()); ?> <span><?php echo $form->error($model,'vehicle'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'accomodation'); ?></div>
          <div class="span7"><?php echo $form->dropDownList($model, 'accomodation', Accomodations::GetAll() ); ?> <span><?php echo $form->error($model,'accomodation'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		<div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'agent'); ?></div>
          <div class="span7"> <?php echo $form->dropDownList($model,'agent',  Villaowner::GetTa()); ?> <span><?php echo $form->error($model,'agent'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'comment'); ?></div>
          <div class="span7"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
          <div class="clear"></div>
        </div>
      
        
        
      </div>
    </div>
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Package\'s Cost');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        
		 
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'cost'); ?></div>
          <div class="span7"> <?php echo $form->textField($model, 'cost'); ?> <span><?php echo $form->error($model,'cost'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		<div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'profit_margin'); ?></div>
          <div class="span7"> <?php echo $form->textField($model, 'profit_margin'); ?> <span><?php echo $form->error($model,'profit_margin'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
		<div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'service_tax'); ?></div>
          <div class="span7"> <?php echo $form->textField($model, 'service_tax'); ?> <span><?php echo $form->error($model,'service_tax'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
		<div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'pg_charge'); ?></div>
          <div class="span7"> <?php echo $form->textField($model, 'pg_charge'); ?> <span><?php echo $form->error($model,'pg_charge'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		<div class="row-form">
          <div class="span5"><?php echo $form->label($model,'default'); ?></div>
          <div class="span7"> <?php echo $form->checkBox($model,'default'); ?>  <span><?php echo $form->error($model,'default'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		<div class="row-form">
          <div class="span5"><?php echo $form->label($model,'status'); ?></div>
          <div class="span3"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
          <div class="clear"></div>
        </div>
		
		
        
		
      </div>
    </div>
  </div>
  <div class="dr"><span></span></div>
  
  <div class="row-fluid">
    <div class="span9">
      <p>
        <button class="btn btn-large" type="submit">
        <?php if($model->isNewRecord) : ?>
        <?php echo t('Add'); ?>
        <?php else : ?>
        <?php echo t('Update'); ?>
        <?php endif; ?>
        </button>
      </p>
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
      <h1><?php echo t('All Tours Cost'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid table-sorting">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tourcost-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('Package Cost'),
	'pager' => array(
		'header'=>t('Go to page:'),
		'nextPageLabel' => t('Next'),
		'prevPageLabel' => t('previous'),
		'firstPageLabel' => t('First'),
		'lastPageLabel' => t('Last'),
                'pageSize'=> Yii::app()->settings->get('system', 'page_size')
	),
	'columns'=>array(
	
	
		array('name'=>'tid',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Tourpackage::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->Tourpackages->name',
		    ),
			
		array('name'=>'vehicle',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Vehicles::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->Vehicle->name'
		    ),
			
		array('name'=>'accomodation',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Accomodations::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->Accomodation->name'
		    ),
			
		array('name'=>'cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->cost'
		    ),
			
		array('header'=>'Site Cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->sitecost'
		    ),
		array('name'=>'agent',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Villaowner::GetName($data->agent)',
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
