
<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'purpose-form',
        'enableAjaxValidation'=>true,      
		'htmlOptions' => array('enctype' => 'multipart/form-data'),   
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Purpose'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span3"><?php echo $form->labelEx($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span3"><?php echo $form->labelEx($model,'comment'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
          <div class="span3"><?php echo $form->labelEx($model,'type'); ?></div>
          <div class="span7"> <?php echo $form->dropDownList($model,'type',  array(1=>'Pupose for Pooja', 2=>'Pupose for Homam', 3=>'Pupose for Astrology' )); ?> <span><?php echo $form->error($model,'type'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'icon_file'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'icon_file');?> <span><?php echo $form->error($model,'icon_file'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->icon_file!=''){?>
            <div style="height:100px;">
              <div style="float:right;"><?php echo CHtml::image(Purpose::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
          </div>
        
          <div class="row-form">
            <div class="span3"><?php echo $form->labelEx($model,'status'); ?></div>
            <div class="span4"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="span1"> </div>
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
        </div>
      </div>
      
       <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1>SEO Info</h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
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
        <h1><?php echo t('All Purposes'); ?></h1>
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
	
	array(
			'header'=>'Icon',
			'type'=>'image',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px'),
			'value'=>'Purpose::GetThumbnail($data->icon_file)',
            'filter'=>false,
			'visible'=>true
		    ),
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
		
		array('name'=>'type',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->ptype',
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

<?php $this->render('cmswidgets.views.themelist.themelist_form_javascript',array('model'=>$model,'form'=>$form)); ?>  
