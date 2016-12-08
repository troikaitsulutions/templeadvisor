<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeorderController extends BeController
{
    public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        array('label'=>t('Temples Rank'), 'url'=>array('beorder/admin'),'linkOptions'=>array('class'=>'btn btn-small')),
					
					  array('label'=>t('Add Rank of Temples'), 'url'=>array('beorder/create'),'linkOptions'=>array('class'=>'btn btn-small')),
					  
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('order_create');
	}
        
         /**
         * The function that do Update Object
         * 
         */
	public function actionUpdate()
	{            
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('order_update');
	}
	
	
        
         /**
	 * The function that do View User
	 * 
	 */
	public function actionView()
	{         
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		$this->render('order_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('order_admin');
	}
    
	
    
	public function actionDelete($id)
	{                            
            GxcHelpers::deleteModel('Order', $id);
	}
          
        
}