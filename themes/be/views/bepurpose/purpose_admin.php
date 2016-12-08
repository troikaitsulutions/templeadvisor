<?php 
$this->pageTitle=t('Manage Purposes');
$this->pageHint=t('Here you can manage all Purposes'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Purpose')); ?>