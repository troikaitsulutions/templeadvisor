<?php 
$this->pageTitle=t('Manage Nearest Things');
$this->pageHint=t('Here you can manage the Nearest Things'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Nearest')); ?>