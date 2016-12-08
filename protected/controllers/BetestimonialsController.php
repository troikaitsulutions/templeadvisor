<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BetestimonialsController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        array('label'=>t('Manage Testimonials'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                       
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('testimonials_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('testimonials_admin');
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
                            
                            array('label'=>t('View this Testimonial'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('testimonials_view');
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
                            array('label'=>t('Update this Testimonial'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini')),
                            array('label'=>t('View this Testimonials'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('testimonials_update',array('id'=>$id));
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Testimonials', $id);          
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