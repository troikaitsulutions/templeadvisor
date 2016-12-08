<?php 
$this->pageTitle=t('Manage Nearest States');
$this->pageHint=t('Here you can manage all Nearest States'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Nearstate')); ?>