<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BeovgalleryController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
		  $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
                 $this->menu=array(
				  array('label'=>t('Back to Overview'), 'url'=>array('beoverview/view','id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
				  array('label'=>t('Manage Photos'), 'url'=>array('admin','id'=>$id,'page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
				 
                        
                        
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
	
		$this->render('ovgallery_create');
	}
	
	
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
	$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0;
	 $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Add photos '), 'url'=>array('create','page_id'=>$page_id),'linkOptions'=>array('class'=>'btn btn-mini')),
                            
                        )
                    );
		$this->render('ovgallery_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
			  $page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0; 
              
		$this->render('ovgallery_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ; 
				$page_id=isset($_GET['page_id']) ? trim($_GET['page_id']) : 0;                
                
		$this->render('ovgallery_update',array('id'=>$id));
	}
	
	public function actionSort()
	{                 
                
		$this->render('ovgallery_sort');
	}
        
        
        /**
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Ovgallery', $id);          
	}
    
	public function actionDeleteall()
	{    
	
	if(isset($_GET['idList'])) {  
			
			$ida = $_GET['idList'];
			foreach($ida as $data){ /*GxcHelpers::deleteModel('Gallery', $data);*/  if($data!='') Ovgallery::model()->findByPk($data)->delete(); }
		
		}
			//GxcHelpers::deleteModel('Seo', $seo->id);
			//GxcHelpers::deleteModel('Gallery', $id);		
	}    
        
      
	 
	
        
}