<?php 
$this->pageTitle=t('Manage Product List');
$this->pageHint=t('Here you can manage Product lists'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Product')); ?>