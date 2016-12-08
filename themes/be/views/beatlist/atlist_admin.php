<?php 
$this->pageTitle=t('Manage Attractions');
$this->pageHint=t('Here you can manage all Attractions'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Atlist')); ?>