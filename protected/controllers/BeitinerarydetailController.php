<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeitinerarydetailController extends BeController
{
       
        
     /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('itinerarydetail_create');
	}
        
		
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				     
                
		$this->render('itinerarydetail_update',array('id'=>$id));
	}
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Itinerarydetail', $id);
	}
          
        
}