<?php
                    $mycs=Yii::app()->getClientScript();                    
                    if(YII_DEBUG)
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, true);				
						                    
                    else
                        $ckeditor_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.ckeditor'), false, -1, false);				
						                    	
                    
                    $urlScript_ckeditor= $ckeditor_asset.'/ckeditor.js';
                    $urlScript_ckeditor_jquery=$ckeditor_asset.'/adapters/jquery.js';
                    $mycs->registerScriptFile($urlScript_ckeditor, CClientScript::POS_HEAD);
                    $mycs->registerScriptFile($urlScript_ckeditor_jquery, CClientScript::POS_HEAD);   
					
					                 
?>

<div class="workplace">
  <div class="form">
    <?php $this->render('cmswidgets.views.notification'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'usercreate-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php echo $form->errorSummary(array($model)); ?>
    
    <div class="row-fluid">
      <div class="span6">
        <div class="head">
          <div class="isw-user"></div>
          <h1><?php echo t('User'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'people_type'); ?></div>
            <div class="span7"> <?php echo $form->dropDownList($model, 'people_type',CHtml::listData(Category::model()->findAll(array('condition'=>"status='1'",'order'=>'name asc')),'id','name'),array('empty'=>'Select','onchange'=>'show_documents()')); ?> <span><?php echo $form->error($model,'people_type'); ?> </span></div>
            <div class="clear"></div>
          </div>
        
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'people_id'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'people_id', array('onkeyup'=>'show_people_details()')); ?> <span><?php echo $form->error($model,'people_id'); ?> </span></div>
            <div class="clear"></div>
          </div>
        
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'email'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'email'); ?> <span><?php echo $form->error($model,'email'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'username'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'username'); ?> <span><?php echo $form->error($model,'username'); ?> </span></div>
            <div class="clear"></div>
          </div>
          
          <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'display_name'); ?></div>
            <div class="span7"> <?php echo $form->textField($model, 'display_name'); ?> <span><?php echo $form->error($model,'display_name'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
           <div class="row-form">
            <div class="span5"><?php echo $form->label($model,'password'); ?></div>
            <div class="span7"> <?php echo $form->passwordField($model, 'password'); ?> <span><?php echo $form->error($model,'password'); ?></span> </div>
            <div class="clear"></div>
          </div>
          
        </div>
      </div>
      
      
      
      <div class="span6">
        <div class="head">
          <div class="isw-user"></div>
          <h1><?php echo t('Agreement Documents'); ?></h1>
          <div class="clear"></div>
        </div>
        <div class="block-fluid">
		<div id="agreement_document">
            <?php	
			$people_type = '';
			if($model->people_type!='') $people_type = $model->people_type;
			if(isset($_GET['people_type'])) $people_type = $_GET['people_type'];		
			echo "<div class='well'>";
			echo $form->checkBoxList($model,'docs',CHtml::listData(Docagrrement::model()->findAll(array("condition"=>"people_type='$people_type'","order"=>"doc_name")), 'id', 'doc_name'), array('separator'=>'','template'=>'<div class="agreement_docs_display_div"> {input} <div class="agreement_docs_display_label_div">{label}</div></div>'));							
			echo "<div class='clear'></div></div>";
			?>
        </div>
        </div>
      </div>
      
      
      
    </div>    
    <div class="row-fluid">
      <div class="span9">
        <p>
          <button class="btn btn-large" type="submit"><?php echo t('Save'); ?></button>
          
        </p>
      </div>
    </div>
    <br class="clear" />
    <?php $this->endWidget(); ?>
<script type="text/javascript">    
CopyString('#UserCreateForm_email','#UserCreateForm_username','email');
CopyString('#UserCreateForm_email','#UserCreateForm_display_name','email');

function show_documents()
{
	var people_type = jQuery('#UserCreateForm_people_type').val();
	jQuery('#agreement_document').html('<img src="<?php echo Yii::app()->baseUrl;?>/protected/assets/wishlist/ajax-loader.gif" border="0">');
	jQuery('#agreement_document').load(window.location.href+'?people_type='+people_type+' #agreement_document');
}

function show_people_details()
{
	var people_id = jQuery('#UserCreateForm_people_id').val();
	if(people_id!='')
	{
		jQuery.get('<?php echo Yii::app()->createUrl('beuser/people');?>',{people_id:people_id},function(data){
			var arr = data.split('//');
			jQuery('#UserCreateForm_email').val(arr[0]); jQuery('#UserCreateForm_display_name').val(arr[1]);
		});
	}
	else
	{
		jQuery('#UserCreateForm_email').val(''); jQuery('#UserCreateForm_display_name').val('');
	}
}
</script>
  </div>
  <!-- form --> 
</div>