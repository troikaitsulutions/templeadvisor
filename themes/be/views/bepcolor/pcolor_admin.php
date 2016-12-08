<?php 
$this->pageTitle=t('Manage Product Color Information');
$this->pageHint=t('Here you can manage all Info for this Product Colors'); 

?>


<?php $this->widget('cmswidgets.ModelManageWidget',array('model_name'=>'Pcolor')); ?>