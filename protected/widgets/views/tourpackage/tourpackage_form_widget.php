<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tourpackage-form',
        'enableAjaxValidation'=>true,      
		'htmlOptions' => array('enctype' => 'multipart/form-data'),  
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?> 
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Tour Package info');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
          <div class="span7"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'comment'); ?></div>
          <div class="span7"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'days'); ?></div>
          <div class="span7"> <?php echo $form->dropDownList($model, 'days', array(1=>'1 Day',2=>'2 Days & 1 Night',3=>'3 Days & 2 Nights',4=>'4 Days & 3 Nights',5=>'5 Days & 4 Nights',6=>'6 Days & 5 Nights',7=>'7 Days & 6 Nights',8=>'8 Days & 7 Nights',9=>'9 Days & 8 Nights',10=>'10 Days  & 9 Nights')); ?> <span><?php echo $form->error($model,'days'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'temples'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'temples',  Temples::GetTempleDetails(),array('id'=>'s2_2', 'style'=>'width: 100%', 'multiple'=>'multiple')); ?> <span><?php echo $form->error($model,'temples'); ?></span> </div> 
            <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'destination'); ?></div>
          <div class="span7"> <?php echo $form->textArea($model, 'destination'); ?> <span><?php echo $form->error($model,'destination'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        
        
        <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'icon_file'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'icon_file');?> <span><?php echo $form->error($model,'icon_file'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->icon_file!=''){?>
            <div style="height:100px;">
              <div style="float:right;"><?php echo CHtml::image(Tourpackage::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
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
            <div class="span5"><?php echo $form->label($model,'category'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'category', Tourcategory::GetAll(),array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadsubcategory',
							'data'=>array('category'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Tourpackage_subcategory").html(data.dropDownTowns); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'category'); ?> </span> </div>
            <div class="clear"></div>
          </div>
           <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'subcategory'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'subcategory', Toursubcategory::GetAll()); ?> <span><?php echo $form->error($model,'subcategory'); ?> </span> </div>
            <div class="clear"></div>
          </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'terms'); ?></div>
          <div class="span7"> <?php echo $form->textArea($model, 'terms'); ?> <span><?php echo $form->error($model,'terms'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'inclusion'); ?></div>
          <div class="span7"> <?php echo $form->textArea($model, 'inclusion'); ?> <span><?php echo $form->error($model,'inclusion'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'featured'); ?></div>
            <div class="span3"> <?php echo $form->checkBox($model,'featured'); ?>  <span><?php echo $form->error($model,'featured'); ?></span> </div>
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
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1>SEO Info</h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
      </div>
    </div>
  
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

<?php $this->render('cmswidgets.views.tourpackage.tourpackage_form_javascript',array('model'=>$model,'form'=>$form )); ?>

<!-- form -->

<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t('All Tours'); ?></h1>
      <div class="clear"></div>
    </div>
    <div class="block-fluid table-sorting">
      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tourpackage-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'summaryText'=>t('Displaying').' {start} - {end} '.t('in'). ' {count} '.t('Tour Packages'),
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
			'type'=>'html',
			'htmlOptions'=>array('class'=>'gridLeft','align'=>'center','border'=>'5px','height'=>'100px', 'width'=>'120px'),
			
			'value' => 'CHtml::image(Tourpackage::GetThumbnail($data->icon_file), $data->name, array("width"=>150))',
            'filter'=>false,
			'visible'=>true
		    ),
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array('name'=>'category',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Tourcategory::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->tourcategory->name'
		    ),
			
		array('name'=>'subcategory',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'filter'=>CHtml::listData(Toursubcategory::model()->findAll(array('condition'=>'status=1')),'id','name'),
			'value'=>'$data->toursubcategory->name'
		    ),
			
		array('name'=>'days',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->days',
		    ),
			
			
		array('header'=>'Temples',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridLeft','style'=>'width:20%'),
			'value'=>'Itinerary::GetTempleList($data->temples)',
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
