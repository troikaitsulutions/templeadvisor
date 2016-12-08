<?php 
$this->pageTitle=t('Manage Product Subcategory');
$this->pageHint=t('Here you can manage all Subcategory of Product'); 
?>
<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Psubcategory')); ?>