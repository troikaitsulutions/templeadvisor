<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'phototitle-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="span12" style="float:right;"> </div>
    <div class="row-fluid">
      
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Photo Title'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
        
        
         <div class="row-form">
        		
                   
        		 	<div class="span2"><?php echo t('Photo Title'); ?></div>
                     <div class="span3"> <?php echo $form->textField($model, 'name'); ?> <span><?php echo $form->error($model,'name'); ?> </span></div>
        		  	<div class="span2"><?php echo t('Alternative Text'); ?></div>
                     <div class="span3"> <?php echo $form->textField($model, 'alt_text'); ?> <span><?php echo $form->error($model,'alt_text'); ?> </span></div>
                     
                       <div class="clear"></div>
          </div>
          
          
            <div class="row-form">
        
                    <div class="span2"><?php echo t('Description'); ?></div>
                      <div class="span3"> <?php echo $form->textArea($model, 'description'); ?> <span><?php echo $form->error($model,'description'); ?> </span></div>
                    <div class="span3"> </div>
          
                 <div class="span1">  <button class="btn btn-large" type="submit">
          <?php if($model->isNewRecord) : ?>
          <?php echo t('Add'); ?>
          <?php else : ?>
          <?php echo t('Update'); ?>
          <?php endif; ?>
          </button> </div>
        
          <div class="clear"></div>
          </div>
   
     
      </div>
    </div>
  
    
    <?php $this->endWidget(); ?>
  </div>
  <!-- form --> 
  
  
  
  <div class="head">
  <div class="isw-grid"></div>
  <h1><?php echo t("Photo Title's"); ?></h1>
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
		array('header'=>'Photo Title',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			array('name'=>'alt_text',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->alt_text',
		    ),
		array('name'=>'description',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->description',
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


