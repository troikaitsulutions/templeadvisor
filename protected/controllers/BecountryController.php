<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BecountryController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Country'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('country_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
          
              
              $this->render('country_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
           
		$this->render('country_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('country_admin');
	}
        
    
	public function actionDelete($id)
	{                            
		
            GxcHelpers::deleteModel('Country', $id);
	}
          
        
}