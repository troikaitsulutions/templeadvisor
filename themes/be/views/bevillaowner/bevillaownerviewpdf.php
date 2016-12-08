<?php 
$model = Villaowner::model()->findByPk($_GET['id']);

$this->renderPartial('cmswidgets.views.villaowner.bevillaownerviewpdf',array('model'=>$model));

?>