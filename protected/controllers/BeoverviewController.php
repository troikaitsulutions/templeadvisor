<?php
/**
 * Backend Object Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeoverviewController extends BeController
{
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add'), 'url'=>array('beoverview/create'),'linkOptions'=>array('class'=>'btn btn-small')),
					
                );
		 
	}
        
        /**
	 * The function that do Create new Object
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('overview_create');
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
                           
							array('label'=>t('Show all Overviews'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Photos'), 'url'=>array('beovgallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							
                        )
                    );
			  
			 
			  
              $this->render('overview_update');
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
                           
							array('label'=>t('Show all Overviews'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
							array('label'=>t('Photos'), 'url'=>array('beovgallery/admin','page_id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
							
                        )
                    );
		
		$this->render('overview_view');
	}
        /**
	 * The function that do Manage Object
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('overview_admin');
	}
        
    
	public function actionDelete($id)
	{                         
	
	
	   
            GxcHelpers::deleteModel('Overview', $id);
	}
          
        
}