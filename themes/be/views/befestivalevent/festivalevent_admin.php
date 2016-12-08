<?php 
$this->pageTitle=t('Manage Festival/Events');
$this->pageHint=t('Here you can manage the Events'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Festivalevent')); ?>