<?php 
$this->pageTitle=t('Manage Theme Sub List');
$this->pageHint=t('Here you can manage all Info'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Themelist')); ?>