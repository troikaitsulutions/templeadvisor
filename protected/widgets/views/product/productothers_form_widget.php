<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'product-form',
        'enableAjaxValidation'=>true,       
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
            <div class="span5"><?php echo $form->labelEx($model,'brand'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'brand'); ?> <span><?php echo $form->error($model,'brand'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'dimension'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'dimension'); ?> <span><?php echo $form->error($model,'dimension'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'scent'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'scent'); ?> <span><?php echo $form->error($model,'scent'); ?></span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="head">
          <div class="isw-target"></div>
          <h1><?php echo t('product ');  ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'composition'); ?></div>
            <div class="span6"> <?php echo $form->textArea($model, 'composition'); ?> <span><?php echo $form->error($model,'composition'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'minorderqty'); ?></div>
            <div class="span6"> <?php echo $form->textField($model,'minorderqty'); ?> <span><?php echo $form->error($model,'minorderqty'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'packsize'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'packsize'); ?> <span><?php echo $form->error($model,'packsize'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'cost'); ?> <span><?php echo $form->error($model,'cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'packing_cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'packing_cost'); ?> <span><?php echo $form->error($model,'packing_cost'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'shipping_cost'); ?></div>
            <div class="span6"> <?php echo $form->textField($model, 'shipping_cost'); ?> <span><?php echo $form->error($model,'shipping_cost'); ?></span> </div>
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
            <div class="span6"> <?php echo $form->textField($model, 'service_tax'); ?> <span><?php echo $form->error($model,'service_tax'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->labelEx($model,'vendor'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'vendor',  Villaowner::GetVendor(),array()); ?> <span><?php echo $form->error($model,'vendor'); ?></span> </div>
            <div class="clear"></div>
          </div>
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'status'); ?></div>
            <div class="span6"> <?php echo $form->dropDownList($model,'status',  ConstantDefine::getPageStatus(),array()); ?> <span><?php echo $form->error($model,'status'); ?></span> </div>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span9">
        <p align="right">
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
<?php $this->render('cmswidgets.views.homamlist.homamlist_form_javascript',array('model'=>$model,'form'=>$form)); ?>
