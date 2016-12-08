<?php 
$this->pageTitle=t('Manage Information');
$this->pageHint=t('Here you can manage all Informations'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Qans')); ?>