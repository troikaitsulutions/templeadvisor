<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeastrologyController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  
                 $this->menu=array(
                       
                        array('label'=>t('Add'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                        
                );
		 
	}
                 
     /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('astrology_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        )
                    );
		$this->render('astrology_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				     
                $this->menu=array_merge($this->menu,                       
                        array(
                            
                            array('label'=>t('View'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('astro_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Astrology', $id);          
	}
        
}