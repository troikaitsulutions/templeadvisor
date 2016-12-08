<script type="text/javascript">
function add_row()
{
	var rows = jQuery('#rows').val();
	rows = parseInt(rows)+1;
	
	jQuery.get('<?php echo Yii::app()->baseUrl;?>/beadditionalcost/addrows',{rows:rows,model:'<?php echo $model;?>'},function(data){
	jQuery('#adding_div').append(data);
	jQuery('#rows').val(rows);
	});
	
}

function remove_rows(rows)
{
	jQuery('#adding_row'+rows).remove();
}

function validate_fields()
{
	jQuery('.box_required').css('border','#AAAAAA 1px solid');
	var i=0;
	jQuery.each(jQuery('.box_required'),function(){ if(jQuery(this).val()==''){ jQuery(this).css('border','#f00 1px solid'); i++; } });
	
	if(i==0)
	{ 
		var name = []; var year = []; var cost = []; var comment = []; var status = []; var lang = [];
		jQuery.each(jQuery('.box_required'),function()
		{ 
			if(jQuery(this).attr('name')=='name[]') name.push(jQuery(this).val());
			else if(jQuery(this).attr('name')=='year[]') year.push(jQuery(this).val());
			else if(jQuery(this).attr('name')=='cost[]') cost.push(jQuery(this).val());
			else if(jQuery(this).attr('name')=='status[]') status.push(jQuery(this).val());
			else if(jQuery(this).attr('name')=='lang[]') lang.push(jQuery(this).val());
		});
		
		jQuery.each(jQuery('.comments'),function()
		{ 
			comment.push(jQuery(this).val());
		});

		
		jQuery.get('<?php echo Yii::app()->baseUrl;?>/beadditionalcost/addrowssave',{name:name,year:year,cost:cost,comment:comment,status:status,lang:lang,prop_id:'<?php echo $_GET['page_id'];?>',model:'<?php echo $model;?>'},function(data){
			alert('<?php echo $message;?>');
			window.location.reload(true);
		});
	}
}
</script>