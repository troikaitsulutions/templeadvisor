<?php 
$this->pageTitle=t('Manage Overview Information');
$this->pageHint=t('Here you can manage all Overview Informations'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Overview')); ?>