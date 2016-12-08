<?php 
$this->pageTitle=t('Manage Themes');
$this->pageHint=t('Here you can manage all Info for Themes'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Themes')); ?>