<?php $page_id=isset($_GET['page_id']) ? strtolower(trim($_GET['page_id'])) : '';  ?>
<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
   <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'timing-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary($model); ?>
    <div class="span6" style="float:right;"> </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Temple Timings'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
         <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'name'); ?></div>
            <div class="span5"> <?php echo $form->textField($model, 'name',array()); ?> <span><?php echo $form->error($model,'name'); ?> </span> </div>
            
            <div class="clear"></div>
          </div>
         
         <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'open_time'); ?></div>
            <div class="span3"> <?php echo $form->dropDownList($model, 'open_time',ConstantDefine::getTiming1(),array()); ?> <span><?php echo $form->error($model,'open_time'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'close_time'); ?></div>
            <div class="span3"> <?php echo $form->dropDownList($model, 'close_time',ConstantDefine::getTiming2(),array()); ?> <span><?php echo $form->error($model,'close_time'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'status',ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?>  </span></div>
            <div class="clear"></div>
          </div>
          
        </div>
      </div>
    
    </div>
    <div class="dr"><span></span></div>
    
    
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

<div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t('All Timing Details'); ?></h1>
  <div class="clear"></div>
</div>
<div class="block-fluid table-sorting">
  <?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'timing-grid',
	'dataProvider'=>$model->searchByobject($page_id),
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
			'header'=>'Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'$data->name' ,
		    ), 
		
      array(
			'header'=>'Temple Open Time',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Timing::getTiming1($data->open_time)' ,
		    ), 
	   array(
			'header'=>'Temple Close Time',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'Timing::getTiming2($data->close_time)' ,
		    ), 
		
		array(
			'name'=>'status',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft'),
			'value'=>'($data->status==1)?"Active":"Disable"',
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
			    'url'=>'Yii::app()->createUrl("'.app()->controller->id.'/update", array("id"=>$data->id,"page_id"=>$data->prop_id))',
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
