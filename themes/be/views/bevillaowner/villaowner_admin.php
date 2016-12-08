<?php 
$this->pageTitle=t('Manage Villa owners Information');
$this->pageHint=t('Here you can manage all Info for this Villa owners'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Villaowner')); ?>