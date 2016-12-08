
<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'destination-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="row-fluid">
      <div class="span12">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Destination'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span2"><?php echo $form->labelEx($model,'destination'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'destination',  Temples::GetTempleDetails(),array()); ?>  <span><?php echo $form->error($model,'destination'); ?></span> </div>
             <div class="span2"><?php echo $form->labelEx($model,'status'); ?></div>
            <div class="span2"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
           <div class="span2">
              <button class="btn btn-small" type="submit">
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
            <div class="span1"> </div>
            
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>
<?php  $tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0; ?>
  <!-- form -->
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-grid"></div>
        <h1><?php echo t('All Destination'); ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid table-sorting">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'destination-grid',
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
	
		array('header'=>'Temple Image',
			'type'=>'image',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px','style'=>'width:7%'),
			'value'=>'Gallery::GetPropThumbnail($data->destination)',
            'filter'=>false,
			'visible'=>true
		    ),
			
		array('header'=>'Temple ID',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:20%'),
			
			'value'=>'$data->destination',
		    ),
	
		array(
			'header'=>'Temple Name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Temples::GetName($data->destination)',
			'visible'=>true
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
