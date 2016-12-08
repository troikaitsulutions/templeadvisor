<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BenthingsController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Nearest Things'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('nthings_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  
			  $this->menu=array_merge($this->menu,                       
                        array(
                           
							 array('label'=>t('Show all Things'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							
                        )
                    );
			  
              $this->render('nthings_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		 $this->menu=array_merge($this->menu,                       
                        array(
                           
							 array('label'=>t('Show all Things'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							
                        )
                    );
		$this->render('nthings_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('nthings_admin');
	}
        
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Nthings', $id);
	}
          
        
}