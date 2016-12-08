<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeblinkController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Links'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('blink_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('blink_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Link'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('blink_view');
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
                            
                            array('label'=>t('View this Link'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('blink_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Blink', $id);          
	}
        
        
       /* 
        public function actionChangeLayout(){
              Review::changeLayout();
        }
            
        public function actionInheritParent(){
              Review::inheritParent();
        }
        
        public function actionChangeParent(){
              Review::changeParent();
        }
            
                       
        
        /**
	 * This function sugget the Pages
	 * 
	 
	public function actionSuggestPage()
	{                
            Review::suggestPage();
	}
        
        */
        
}