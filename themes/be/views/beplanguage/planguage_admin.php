<?php 
$this->pageTitle=t('Manage Planguage Information');
$this->pageHint=t('Here you can manage all Info for this Planguage'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Planguage')); ?>