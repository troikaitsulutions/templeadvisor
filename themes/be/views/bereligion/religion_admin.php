<?php 
$this->pageTitle=t('Manage Religion Information');
$this->pageHint=t('Here you can manage all Info for this Religion'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Religion')); ?>