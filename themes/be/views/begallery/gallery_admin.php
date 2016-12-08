<?php 
$this->pageTitle=t('Manage Photos');
$this->pageHint=t('Here you can manage the Photos'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Gallery')); ?>