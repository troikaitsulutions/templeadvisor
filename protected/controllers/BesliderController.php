<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BesliderController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  
                 $this->menu=array(
				  
				  array('label'=>t('Manage Slider'), 'url'=>array('admin','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        
                        
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
	
		$this->render('slider_create');
	}
	
	
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
	
	 $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Add photos into Slider'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                            
                        )
                    );
		$this->render('slider_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->render('slider_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				$this->render('slider_update',array('id'=>$id));
	}
	
	public function actionSort()
	{                 
                
		$this->render('slider_sort');
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Slider', $id);          
	}
        
}