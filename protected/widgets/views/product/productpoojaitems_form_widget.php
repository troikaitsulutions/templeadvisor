<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'product-form',
        'enableAjaxValidation'=>true, 
		'htmlOptions' => array('enctype' => 'multipart/form-data'),      
        )); 
?>
    <?php echo $form->errorSummary(array($model,$mseo)); ?>
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Pooja Items info');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'name',array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'vendor_product_name'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'vendor_product_name'); ?> <span><?php echo $form->error($model,'vendor_product_name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'vendor_sku'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'vendor_sku'); ?> <span><?php echo $form->error($model,'vendor_sku'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'scategory'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'scategory', Psubcategory::GetByAll($category)); ?> <span><?php echo $form->error($model,'scategory'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'height'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'height'); ?> <span><?php echo $form->error($model,'height'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'width'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'width'); ?> <span><?php echo $form->error($model,'width'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'depth'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'depth'); ?> <span><?php echo $form->error($model,'depth'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'weight'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'weight'); ?> <span><?php echo $form->error($model,'weight'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'short_desc'); ?></div>
            <div class="span6"> <?php echo $form->textArea($model, 'short_desc'); ?> <span><?php echo $form->error($model,'short_desc'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'description'); ?></div>
            <div class="span6"> <?php echo $form->textArea($model, 'description'); ?> <span><?php echo $form->error($model,'description'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'icon_file'); ?></div>
            <div class="span7"> <?php echo $form->fileField($model, 'icon_file');?> <span><?php echo $form->error($model,'icon_file'); ?> </span></div>
            <div class="clear"></div>
            <?php if($model->icon_file!=''){?>
            <div style="height:100px;">
              <div style="float:right;"><?php echo CHtml::image(Productpoojaitems::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
          </div>
         
        </div>
      </div>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Pooja Items info');  ?></h1>
          <div class="clear"></div>
        </div>

        <div class="block-fluid">
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'color'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'color', Pcolor::GetAll()); ?> <span><?php echo $form->error($model,'color'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'material'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'material', Pmaterial::GetAll()); ?> <span><?php echo $form->error($model,'material'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
         <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'packing_cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'packing_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'packing_cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'shipping_cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'shipping_cost',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'shipping_cost'); ?></span> </div>
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
            <div class="span6"> <?php echo $form->textField($model, 'service_tax',array('onkeyup' =>'GetTotalCost()')); ?> <span><?php echo $form->error($model,'service_tax'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'total'); ?></div>
            <div class="span5"> <?php echo $form->textField($model, 'total', array('readonly'=>true)); ?> <span><?php echo $form->error($model,'total'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'minorderqty'); ?></div>
            <div class="span5"> <?php echo $form->textField($model, 'minorderqty'); ?> <span><?php echo $form->error($model,'minorderqty'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'vendor'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'vendor',  Villaowner::GetVendor(),array()); ?> <span><?php echo $form->error($model,'vendor'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          
          <div class="row-form">
            <div class="span3"><?php echo $form->label($model,'featured'); ?></div>
            <div class="span3"> <?php echo $form->checkBox($model,'featured',array()); ?>  <span><?php echo $form->error($model,'featured'); ?></span> </div>
            <div class="span3"><?php echo $form->label($model,'best_selling'); ?></div>
            <div class="span3"> <?php echo $form->checkBox($model,'best_selling',array()); ?>  <span><?php echo $form->error($model,'best_selling'); ?></span> </div>
            <div class="clear"></div>
      	  </div>
          
          
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <p style="text-align:center;">
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
      </div>
    </div>
    
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Meta Info');  ?></h1>
          <div class="clear"></div>
        </div>
        <?php $this->render('cmswidgets.views.seoform.seoform_form_widget',array('mseo'=>$mseo,'form'=>$form)); ?>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
  </div>  
</div>
<script type="text/javascript">

function GetTotalCost()
{	
		var acost = document.getElementById("Productpoojaitems_cost").value;
		var mcost = document.getElementById("Productpoojaitems_margin_cost").value;
		var pcost = document.getElementById("Productpoojaitems_packing_cost").value;
		var scost = document.getElementById("Productpoojaitems_shipping_cost").value;
		var mtype = document.getElementById("Productpoojaitems_margin_type").value;
		var tcost = document.getElementById("Productpoojaitems_service_tax").value;
		
		var gcost = 0;
		
		if (mtype == 0) 
			{ gcost = parseInt(acost) + parseInt(mcost) + parseInt(pcost) + parseInt(scost); }
		else
			{ gcost = parseInt(acost) + parseInt(pcost) + parseInt(scost); 
			  gcost = gcost+(gcost*(mcost/100.00));  }
		
		gcost = parseInt(gcost) + parseInt((parseInt(gcost)*(tcost/100.00)));
			
		document.getElementById("Productpoojaitems_total").value = Math.ceil(gcost/100)*100;
}

</script>
<?php $this->render('cmswidgets.views.product.product_form_javascript',array('model'=>$model,'form'=>$form)); ?>
