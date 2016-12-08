<?php 
$this->pageTitle=t('Manage Region Information');
$this->pageHint=t('Here you can manage all Info for this Region'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Region')); ?>