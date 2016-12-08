<?php 
$this->pageTitle=t('Manage Facilities');
$this->pageHint=t('Here you can manage all Facilities'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Atfacility')); ?>