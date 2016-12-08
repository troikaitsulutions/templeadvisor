<?php 
$this->pageTitle=t('Manage Tour List');
$this->pageHint=t('Here you can manage Tour lists'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tourlist')); ?>