<div class="workplace">
  <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'gallery-form',
        'enableAjaxValidation'=>true,       
        )); 
?>
    <?php // echo $form->errorSummary($model); ?>
    <?php // echo $form->hiddenField($model,'prop_id'); 
$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; ?>
  </div>
  <div class="row-fluid">
    <div class="span10">
      <div class="head">
        <div class="isw-target"></div>
        <h1>
          <?php  echo Pinfo::getPageName($page_id);  ?>
        </h1>
        <div class="clear"></div>
      </div>
      <div class="block-fluid">
        <?php
	
	$this->widget('common.extensions.dropzone.EDropzone', array(
    'model' => $model,
    'attribute' => 'file_attache',
    'url' => 'http://www.ciaoitalyvillas.com/mycms/bemaildoc/filesave?id='.$id,
    'mimeTypes' => array('image/jpeg'),
    'options' => array(),
));
	?>
        <!-- <div id="calendar" class="fc"></div> --> 
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span9"> </div>
  </div>
  <br class="clear" />
  <?php $this->endWidget(); ?>
<table width="100%">
<?php
$model = Maildoc::model()->findByPk($id);
$files = explode(',',$model->file_attache);
foreach($files as $data):
$i=$i+1;
if($data!=''){
?>
<tr>
<td><?php echo $i;?></td>
<td><a target="_blank" href="<?php echo Yii::app()->request->baseUrl;?>/../resources/maildoc/<?php echo $data;?>"><?php echo $data;?></a></td>
<td><a onclick="filedelete('<?php echo base64_encode($data);?>','<?php echo $id;?>')" style="cursor:pointer;">Delete</a></td>
</tr>
<?php }endforeach; ?>
</table></div>
<!-- form -->
</div>
<script type="text/javascript">
function filedelete(filename,id)
{alert(filename);
		jQuery.get("<?php echo Yii::app()->request->baseUrl;?>/bemaildoc/filedelete",{filename:filename,id:id},function(data){
		alert(data);
				alert('File deleted Successfully');
				window.location.reload(true);
		});
}
</script>