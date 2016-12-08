
<script type='text/javascript'>
		
	$(document).ready(function () {
	
     CopyString('#txt_name','#txt_slug','slug');
    CopyString('#txt_name','#txt_mainmenu','');
    CopyString('#txt_name','#txt_breadcrumbs','');
     <?php if($model->isNewRecord) : ?>
   	 CopyString('#txt_name','#txt_title','');
    <?php endif; ?>
  
    })
  
</script>  