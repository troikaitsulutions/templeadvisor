<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'poojalist-form',
        'enableAjaxValidation'=>true,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),       
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Puja info');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'purpose'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'purpose',  Pujapurpose::GetAll()); ?> <span><?php echo $form->error($model,'purpose'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'comment'); ?></div>
            <div class="span7"> <?php echo $form->textArea($model, 'comment'); ?> <span><?php echo $form->error($model,'comment'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'state'); ?></div>
            <div class="span5"> <?php echo $form->dropDownList($model,'state',State::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loaddistrict',
							'data'=>array('state'=>'js:this.value'),
							
							'success' => 'function(data) { 
								$("#Poojalist_district").html(data.dropDownDistricts);
								$("#Poojalist_temple").html(data.dropDownTemples); 
							}',  
                        )
	 ) ); ?> <span><?php echo $form->error($model,'state'); ?> </span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'district'); ?></div>
            <div class="span5"> <?php echo $form->dropDownList($model,'district',District::GetAll(), array(
	 				 'ajax' => array(
                            'type' => 'GET',
							'dataType'=>'json',
                            'url' => Yii::app()->request->baseUrl.'/beajax/loadtown',
							'data'=>array('district'=>'js:this.value'),
							
							'success' => 'function(data) { 
								
								$("#Poojalist_temple").html(data.dropDownTemples); 
							}',  
                        )
	 )); ?> <span><?php echo $form->error($model,'district'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'temple'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'temple',  Temples::GetTempleDetails(),array()); ?> <span><?php echo $form->error($model,'temple'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'deity'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'deity',  Diety::GetAll()); ?> <span><?php echo $form->error($model,'deity'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
        </div>
      </div>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Puja Cost');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
		
		  <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'puja_type'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model,'puja_type',  Pujatype::GetAll(), array('onChange' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'puja_type'); ?></span> </div>
            <div class="clear"></div>
          </div>
		  
		  <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'puja_nos'); ?></div>
            <div class="span5"> <?php echo $form->dropDownList($model,'puja_nos',  
			array(
				''=>"No Pujas",
				1=>"1 Puja",
				2=>"2 Pujas",
				3=>"3 Pujas",
				4=>"4 Pujas",
				5=>"5 Pujas",
				6=>"6 Pujas",
				7=>"7 Pujas",
				8=>"8 Pujas",
				9=>"9 Pujas",
				10=>"10 Pujas",
				11=>"11 Pujas",
				12=>"12 Pujas",
				13=>"13 Pujas",
				14=>"14 Pujas",
				15=>"15 Pujas",
				16=>"16 Pujas",
				17=>"17 Pujas",
				18=>"18 Pujas",
				19=>"19 Pujas",
				20=>"20 Pujas",
			), array('onChange' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'puja_nos'); ?></span> </div>
            <div class="clear"></div>
          </div>
		  
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'pooja_cost'); ?></div>
            <div class="span5"> <?php echo $form->textField($model, 'pooja_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'pooja_cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <!--
		  <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'total'); ?></div>
            <div class="span5"> <?php echo $form->textField($model, 'total', array('readonly'=>true)); ?> <span><?php echo $form->error($model,'total'); ?></span> </div>
            <div class="clear"></div>
          </div>
		  -->
		  
		  <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'icon_file'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'icon_file');?> <span><?php echo $form->error($model,'icon_file'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->icon_file!=''){?>
            <div style="height:100px;">
              <div style="float:right;"><?php echo CHtml::image(Poojalist::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
          </div>
          <div class="row-form">
			<div class="span3"><?php echo $form->label($model,'featured'); ?></div>
            <div class="span3"> <?php echo $form->checkBox($model,'featured'); ?>  <span><?php echo $form->error($model,'featured'); ?></span> </div>
           
            <div class="span3"><?php echo $form->label($model,'status'); ?></div>
            <div class="span3"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="clear"></div>
          </div>
		  
		  
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'priest'); ?></div>
            <div class="span5"> <?php echo $form->dropDownList($model,'priest',  Villaowner::GetPriest(),array()); ?> <span><?php echo $form->error($model,'priest'); ?></span> </div>
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
  
  
<script type="text/javascript">

function GetTotalCost()
{	
			
		var PujaType = document.getElementById("Poojalist_puja_type").value;
		var PujaNos = document.getElementById("Poojalist_puja_nos").value;
		var PujaCost = document.getElementById("Poojalist_pooja_cost").value;
		
		
		
		/*
		var gcost = 0;
		if (mtype == 0) 
			{ gcost = parseInt(acost) + parseInt(mcost) + parseInt(pcost) + parseInt(scost); }
		else
			{ gcost = parseInt(acost) + parseInt(pcost) + parseInt(scost); 
			  gcost = gcost+(gcost*(mcost/100.00));  }
		
		gcost = parseInt(gcost) + parseInt((parseInt(gcost)*(tcost/100.00)));
			
		document.getElementById("Homamlist_total").value = Math.ceil(gcost/100)*100;
		*/
}

</script>
  
  <!-- form -->
  
  <div class="row-fluid">
    <div class="span12">
      <div class="head">
        <div class="isw-grid"></div>
        <h1><?php echo t('All Poojas'); ?></h1>
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
			'value'=>'Poojalist::GetThumbnail($data->icon_file)',
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
			'value'=>'Pujapurpose::GetName($data->purpose)',
		    ),
			
		array('name'=>'temple',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'Temples::GetName($data->temple)',
		    ),
			
		array('name'=>'pooja_cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->pooja_cost',
		    ),
			
		array('header'=>'Site Cost',
			'type'=>'raw',
			'htmlOptions'=>array('class'=>'gridmaxwidth'),
			'value'=>'$data->sitecost',
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
