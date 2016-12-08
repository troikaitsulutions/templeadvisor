<?php 
$this->pageTitle=t('Manage Diety Information');
$this->pageHint=t('Here you can manage all Info for this Diety'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Diety')); ?>