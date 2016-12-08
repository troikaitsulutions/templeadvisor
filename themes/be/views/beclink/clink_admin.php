<?php 
$this->pageTitle=t('Manage Content Links');
$this->pageHint=t('Here you can manage your Content Links'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Clink')); ?>