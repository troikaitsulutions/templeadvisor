<?php 
$this->pageTitle=t('Manage Etiquettes');
$this->pageHint=t('Here you can manage all Etiquettes'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Etiquettes')); ?>