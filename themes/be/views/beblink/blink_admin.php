<?php 
$this->pageTitle=t('Manage Back Links');
$this->pageHint=t('Here you can manage your Back Links'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Blink')); ?>