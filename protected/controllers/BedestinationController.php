<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BedestinationController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		 $tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
                 $this->menu=array(
                        array('label'=>t('Back'), 'url'=>array('betourpackage/view','id'=>$tid),'linkOptions'=>array('class'=>'btn btn-medium')),
                        array('label'=>t('Add Destination'), 'url'=>array('create','tid'=>$tid),'linkOptions'=>array('class'=>'btn btn-medium')),
                );
		 
	}
        
     /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('destination_create');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Destination', $id);
	}
          
        
}