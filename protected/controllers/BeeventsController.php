<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeeventsController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
                 $this->menu=array(
				  array('label'=>t('Back to Temple'), 'url'=>array('betemples/view','id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        array('label'=>t('Manage Events'), 'url'=>array('admin','id'=>$id,'page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        array('label'=>t('Add Event'), 'url'=>array('create','page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('events_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('events_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Event'), 'url'=>array('update','id'=>$id,'page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                        )
                    );
		$this->render('events_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0;                
                $this->menu=array_merge($this->menu,                       
                        array(
                            
                            array('label'=>t('View this Event'), 'url'=>array('view','id'=>$id,'page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('events_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Events', $id);          
	}
        
}