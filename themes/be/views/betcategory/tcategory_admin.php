<?php 
$this->pageTitle=t('Manage Product Type');
$this->pageHint=t('Here you can manage all Types of Product'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Tcategory')); ?>