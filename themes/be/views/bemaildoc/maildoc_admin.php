<?php 
$this->pageTitle=t('Manage Mail Documents');
$this->pageHint=t('Here you can manage your Mail Documents'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Maildoc')); ?>