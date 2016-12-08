<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeitineraryController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		 $tid = isset($_GET['tid']) ? (int)$_GET['tid'] : 0;
                 $this->menu=array(
                        array('label'=>t('Back'), 'url'=>array('betourpackage/view','id'=>$tid),'linkOptions'=>array('class'=>'btn btn-medium')),
                        array('label'=>t('Add Itinerary'), 'url'=>array('create','tid'=>$tid),'linkOptions'=>array('class'=>'btn btn-medium')),
                );
		 
	}
        
     /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('itinerary_create');
	}
        
		
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				     
                
		$this->render('itinerary_update',array('id'=>$id));
	}
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Itinerary', $id);
	}
          
        
}