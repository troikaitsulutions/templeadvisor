<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BetourcostController extends BeController{
    
       
                      
     /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('tourcost_create');
	}
        
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              
		$this->render('tourpackage_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				     
              
		$this->render('tourpackage_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Tourcost', $id);          
	}
        
}