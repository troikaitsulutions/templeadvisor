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
    <div class="mail_css2">Name</div>
    <div class="mail_css3">Email</div>
</div>
<?php
 $get_people_details= People::model()->find(array('select'=>'name','condition'=>" email='$_GET[people_email]' "));
		$people_name = $get_people_details->name;?>
<div class="mail_css4">
    <div class="mail_css5"><input type="text" name="names" id="names" class="names mail_css7"  readonly="readonly" value="<?php echo $people_name;?>"/></div>
    <div class="mail_css6"><input type="text" name="email" id="email" class="emails mail_css8" readonly="readonly" value="<?php echo $_GET['people_email'];?>"/></div>
    
</div>
<input type="hidden" name="box_count" id="box_count" value="0" />
<div class="mail_css10"></div>

    <div class="mail_css13" style="display:none"><?php echo CHtml::dropDownList('people','',CHtml::listData(People::model()->findAll(),'id','name'),array('empty'=>'None','class'=>'mail_css14'));?></div>


<div class="mail_css11">
    <div class="mail_css12"><br/><br/>Mail Template</div>
    <div class="mail_css13"><?php echo CHtml::dropDownList('template','',CHtml::listData(Maildoc::model()->findAll(),'id','name'),array('empty'=>'None','class'=>'mail_css14'));?></div>
</div>

<div class="mail_css11">
    <div class="mail_css12">Mail Description</div>
    <div class="mail_css13"><?php echo CHtml::textArea('description','',array('class'=>'mail_css15'));?></div>
</div>

<input type="hidden" name="id_value" id="id_value" value="<?php echo $_GET['propert_id'];?>"/>

<script type="text/javascript">
function add_newbox()
{
	var box_count = jQuery('#box_count').val();
	box_count = parseInt(box_count)+1;
	jQuery('.mail_css10').append('<div class="mail_css4" id="mailbox'+box_count+'"><div class="mail_css5"><input type="text" name="names" id="names" class="names mail_css7" /></div><div class="mail_css6"><input type="text" name="email" id="email" class="emails mail_css8" /></div><div class="mail_css9" onclick="remove_newbox(\''+box_count+'\')">-</div></div>');
}
function remove_newbox(box_count)
{
	jQuery('#mailbox'+box_count).remove();
}
function validate_forms()
{
var people=jQuery('#people').val();

	var names = []; var i=0; jQuery(".names").css( "border", "solid 1px #e1e5e9" );
	var emails = []; var j=0; jQuery(".emails").css( "border", "solid 1px #e1e5e9" );
	
	if((people=='')&&(names=='' && emails==''))
	{
	jQuery.each(jQuery('.names'), function() { if(jQuery(this).val()==''){ jQuery(this).css('border','solid 1px #FF0000'); i++; } names.push(jQuery(this).val()); });
		jQuery.each(jQuery('.emails'), function() 
		{ 
			if(jQuery(this).val()==''){ jQuery(this).css('border','solid 1px #FF0000'); j++; }
			else
			{
				var objRegExp=/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/;
				var wynik = objRegExp.test(jQuery(this).val());
				if(wynik == false){ jQuery(this).css('border','solid 1px #FF0000'); j++; }
			}
			emails.push(jQuery(this).val());
		});
	}
	else if(people!='')
	{
	jQuery("#people").css( "border", "solid 1px #e1e5e9" );
	jQuery("#email").css( "border", "solid 1px #e1e5e9" );
	jQuery("#name").css( "border", "solid 1px #e1e5e9" );
	}
	
	
	var template=jQuery('#template').val();
	var description=jQuery('#description').val();
	var id_value=jQuery('#id_value').val();
	
if((template=='')&&(description==''))
{
	 jQuery("#description").css( "border", "solid 1px #e1e5e9" );
	 if(description=='') jQuery("#description").css( "border", "solid 1px #FF0000" );
}
else if((template!=''))
{
	 jQuery("#description").css( "border", "solid 1px #e1e5e9" );
}
else
{
	if(template!='')
	{
	jQuery("#template").css( "border", "solid 1px #e1e5e9" );
	}
	else
	{
	 jQuery("#description").css( "border", "solid 1px #e1e5e9" );
	}
	
}
	
	if((i==0 && j==0 || people!='') && (template!='' || description!='') && id_value!='')
	{
	 
	
		jQuery.get("<?php echo Yii::app()->request->baseUrl;?>/besendmail/suggestedlist",{names:names,emails:emails,people:people,template:template,description:description,id_value:id_value},function(data){
				alert('Mail sent Successfully');
				jQuery("#mailpopup").dialog('close');
		});
	}
}

</script>