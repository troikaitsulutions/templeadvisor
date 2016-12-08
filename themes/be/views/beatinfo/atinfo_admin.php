<?php 
$this->pageTitle=t('Manage Attractions Information');
$this->pageHint=t('Here you can manage all Attractions Information'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Atinfo')); ?>