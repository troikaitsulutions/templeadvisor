<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'homam-form',
        'enableAjaxValidation'=>true,  
		'htmlOptions' => array('enctype' => 'multipart/form-data'),      
        )); 
?>
  <?php echo $form->errorSummary(array($model,$mseo)); ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="head">
        <div class="isw-target"></div>
        <h1><?php echo t('Homam info');  ?></h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'purpose'); ?></div>
          <div class="span5"> <?php echo $form->dropDownList($model,'purpose',  Purpose::GetByType(2)); ?> <span><?php echo $form->error($model,'purpose'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'comment'); ?></div>
          <div class="span5"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'icon_file'); ?></div>
            <div class="span5"> <?php echo $form->fileField($model, 'icon_file');?> <span><?php echo $form->error($model,'icon_file'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->icon_file!=''){?>
            <div style="height:100px;">
              <div style="float:right;"><?php echo CHtml::image(Homamlist::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
          </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'cost'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'cost'); ?></span> </div>
          <div class="clear"></div>
        </div>
         <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'packing_cost'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'packing_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'packing_cost'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'shipping_cost'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'shipping_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'shipping_cost'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span3"><?php echo $form->labelEx($model,'margin_cost'); ?></div>
          <div class="span3"> <?php echo $form->textField($model, 'margin_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'margin_cost'); ?></span> </div>
          <div class="span3"><?php echo $form->labelEx($model,'margin_type'); ?></div>
          <div class="span3"> <?php echo $form->dropDownList($model,'margin_type',  array(0=>"Flat",'1'=>"%"),array('onChange' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'margin_type'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'service_tax'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'service_tax',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'service_tax'); ?></span> </div>
          <div class="clear"></div>
        </div>
        
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'total'); ?></div>
          <div class="span5"> <?php echo $form->textField($model, 'total', array('readonly'=>true)); ?> <span><?php echo $form->error($model,'total'); ?></span> </div>
          <div class="clear"></div>
        </div>
        <div class="row-form">
          <div class="span5"><?php echo $form->labelEx($model,'priest'); ?></div>
          <div class="span5"> <?php echo $form->dropDownList($model,'priest',  Villaowner::GetHomam(),array()); ?> <span><?php echo $form->error($model,'priest'); ?></span> </div>
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


<script type="text/javascript">

function GetTotalCost()
{	
		var acost = document.getElementById("Homamlist_cost").value;
		var mcost = document.getElementById("Homamlist_margin_cost").value;
		var pcost = document.getElementById("Homamlist_packing_cost").value;
		var scost = document.getElementById("Homamlist_shipping_cost").value;
		var mtype = document.getElementById("Homamlist_margin_type").value;
		var tcost = document.getElementById("Homamlist_service_tax").value;
		var gcost = 0;
		if (mtype == 0) 
			{ gcost = parseInt(acost) + parseInt(mcost) + parseInt(pcost) + parseInt(scost); }
		else
			{ gcost = parseInt(acost) + parseInt(pcost) + parseInt(scost); 
			  gcost = gcost+(gcost*(mcost/100.00));  }
		
		gcost = parseInt(gcost) + parseInt((parseInt(gcost)*(tcost/100.00)));
			
		document.getElementById("Homamlist_total").value = Math.ceil(gcost/100)*100;
}

</script>

<?php $this->render('cmswidgets.views.homamlist.homamlist_form_javascript',array('model'=>$model,'form'=>$form)); ?>
<!-- form -->

<div class="row-fluid">
  <div class="span12">
    <div class="head">
      <div class="isw-grid"></div>
      <h1><?php echo t('All Homam'); ?></h1>
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
			'value'=>'Homamlist::GetThumbnail($data->icon_file)',
            'filter'=>false,
			'visible'=>true
		    ),
			
		array('name'=>'name',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'CHtml::link($data->name,array("'.app()->controller->id.'/view","id"=>$data->id))',
		    ),
			
		array('name'=>'purpose',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Purpose::GetName($data->purpose)',
		    ),
		array('name'=>'cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->cost."/".$data->total',
		    ),	
		
			
		array('name'=>'priest',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Villaowner::GetName($data->priest)',
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
