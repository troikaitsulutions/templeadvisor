<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tourp-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model, $mseo)); ?> </div>
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Tour info');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'comment'); ?></div>
          <div class="span5"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'days'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'days'); ?> <span><?php echo $form->error($model,'days'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'cost'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'cost'); ?> <span><?php echo $form->error($model,'pooja_cost'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span3"><?php echo $form->labelEx($model,'margin_cost'); ?></div>
          <div class="span3"> <?php echo $form->textField($model, 'margin_cost'); ?> <span><?php echo $form->error($model,'margin_cost'); ?></span> </div>
          <div class="span3"><?php echo $form->labelEx($model,'margin_type'); ?></div>
          <div class="span3"> <?php echo $form->dropDownList($model,'margin_type',  array(0=>"Flat",'1'=>"%"),array()); ?> <span><?php echo $form->error($model,'margin_type'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'service_tax'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'service_tax'); ?> <span><?php echo $form->error($model,'service_tax'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'agent'); ?></div>
          <div class="span5"> <?php echo $form->dropDownList($model,'agent',  Villaowner::GetTa(),array()); ?> <span><?php echo $form->error($model,'agent'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->label($model,'status'); ?></div>
          <div class="span3"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Meta Info');  ?></h1>
        <div class="clear"></div>
      </div>
      <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
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
<?php $this->render('cmswidgets.views.tourpackage.tour_form_javascript',array('model'=>$model,'form'=>$form)); ?>
<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t('All Tours'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid table-sorting">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'purpose-grid',
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
			
		array('name'=>'days',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->days',
		    ),
			
		array('name'=>'cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->cost',
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
