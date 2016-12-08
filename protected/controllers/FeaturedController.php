<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class FeaturedController extends FeController
{
    
		
    public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu = array();
		 
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	  public function actionEvents()
		{	      	
		 $id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
		  $page = Fevents::model()->findByPk($id);
		  
			if(isset($page) && count($page)>0) {
				$meta = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$page->uid)));
				if(isset($meta) && count($meta)>0) {	
					$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	
					$this->render('//site/fevents',array('meta'=>$meta, 'page' => $page ));
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
     	      
	 }
	
	
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
        $this->layout='error.php';            
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else                     
	        	$this->render('error', $error);
	    }
	}
	
}