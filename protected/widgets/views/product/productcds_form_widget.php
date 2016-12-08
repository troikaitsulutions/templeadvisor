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
          <h1><?php echo t('Product info');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'name'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'name', array('id'=>'txt_name')); ?> <span><?php echo $form->error($model,'name'); ?></span> </div>
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
            <div class="span5"><?php echo $form->labelEx($model,'media_type'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'media_type', array(1=>'CD', 2=>'DVD', 3=>'MP3')); ?> <span><?php echo $form->error($model,'media_type'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'file_type'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'file_type', array(1=>'Audio Only', 2=>'Vedio with Audio')); ?> <span><?php echo $form->error($model,'file_type'); ?></span> </div>
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
              <div style="float:right;"><?php echo CHtml::image(Productcds::GetThumbnail($model->icon_file),$model->name); ?></div>
            </div>
            <?php } ?>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'singer'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'singer'); ?> <span><?php echo $form->error($model,'singer'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'music_director'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'music_director'); ?> <span><?php echo $form->error($model,'music_director'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'producer'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'producer'); ?> <span><?php echo $form->error($model,'producer'); ?></span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('Books info');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'tracklist'); ?></div>
            <div class="span6"> <?php echo $form->textArea($model, 'tracklist'); ?> <span><?php echo $form->error($model,'tracklist'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'language'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'language', Planguage::GetAll() ,array()); ?> <span><?php echo $form->error($model,'language'); ?></span> </div>
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
            <div class="span6"> <?php echo $form->dropDownList($model,'vendor',  Villaowner::GetVendor()); ?> <span><?php echo $form->error($model,'vendor'); ?></span> </div>
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
            <div class="span6"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
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
		var acost = document.getElementById("Productcds_cost").value;
		var mcost = document.getElementById("Productcds_margin_cost").value;
		var pcost = document.getElementById("Productcds_packing_cost").value;
		var scost = document.getElementById("Productcds_shipping_cost").value;
		var mtype = document.getElementById("Productcds_margin_type").value;
		var tcost = document.getElementById("Productcds_service_tax").value;
		
		var gcost = 0;
		
		if (mtype == 0) 
			{ gcost = parseInt(acost) + parseInt(mcost) + parseInt(pcost) + parseInt(scost); }
		else
			{ gcost = parseInt(acost) + parseInt(pcost) + parseInt(scost); 
			  gcost = gcost+(gcost*(mcost/100.00));  }
		
		gcost = parseInt(gcost) + parseInt((parseInt(gcost)*(tcost/100.00)));
			
		document.getElementById("Productcds_total").value = Math.ceil(gcost/100)*100;
}

</script>
<?php $this->render('cmswidgets.views.homamlist.homamlist_form_javascript',array('model'=>$model,'form'=>$form)); ?>
