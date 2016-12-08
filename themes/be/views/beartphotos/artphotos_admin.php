<?php 
$this->pageTitle=t('Manage Article Photos');
$this->pageHint=t('Here you can manage the Article Photos'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Artphotos')); ?>