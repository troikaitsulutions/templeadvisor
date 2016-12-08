<style type="text/css">
.mail_css1{width:100%;}
.mail_css1>div{float:left; width:50%;}
.mail_css4{width:100%; height:30px;}
.mail_css4>div{float:left;}
.mail_css5{text-align:left!important;}
.mail_css7{width:150px!important; margin-left:-10px!important; height:25px!important;}
.mail_css8{width:200px!important; margin-left:10px!important; height:25px!important;}
.mail_css9{background:#0099FF; color:#FFFFFF; padding:5px; padding-top:0px; padding-bottom:0px; margin-top:8px; margin-left:5px; cursor:pointer;}
.mail_css14{width:90%;}
</style>
<div class="mail_css1">
    <div class="mail_css2">Group Name</div>
</div>

<div class="mail_css4">
    <div class="mail_css5"><?php echo CHtml::dropDownList('Groupcreation','',CHtml::listData(Groupcreation::model()->findAll(),'id','group_creation_name'),array('empty'=>'None','class'=>'mail_css14'));?></div>
</div>
<input type="hidden" name="id_value" id="id_value" value="<?php echo $_GET['id'];?>"/>

<script type="text/javascript">
function validate_forms()
{

var group_id=document.getElementById("Groupcreation").value;
	
	if(group_id=='')
	{
	alert("Choose a group name");
	}
	
	
	var id_value=jQuery('#id_value').val();
	
	
	if(group_id!='')
	{
			jQuery.get("<?php echo Yii::app()->request->baseUrl;?>/benewsletter/sendtolist",{group_id:group_id,id_value:id_value},function(data){
				alert(data);
				jQuery("#mailpopup").dialog('close');
});
	}
}

</script>