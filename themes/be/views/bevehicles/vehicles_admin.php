<?php 
$this->pageTitle=t('Manage Vehicles');
$this->pageHint=t('Here you can manage all Vehicles'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Vehicles')); ?>