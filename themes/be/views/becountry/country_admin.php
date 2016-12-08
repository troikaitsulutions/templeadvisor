<?php 
$this->pageTitle=t('Manage Country Information');
$this->pageHint=t('Here you can manage all Info for this country'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Country')); ?>