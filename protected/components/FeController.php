<?php

/**
 * Class of parent Controller for Front end of GXC CMS, extends from RController
 * 
 * 
 
 * @package cms.components
 */

class FeController extends RController
{

		public $description;
		public $keywords;			
		public $change_title=false;
		public $layout_asset;
        
        public function __construct($id,$module=null)
		{
			 parent::__construct($id,$module);		 
	             if(isset($_POST)){
                     $_POST = GxcHelpers::xss_clean($_POST);
                 }
                 if(isset($_GET)){
                     $_GET = GxcHelpers::xss_clean($_GET);
                 }
				 Yii::app()->theme='travel';
				 
				if(YII_DEBUG)
            	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, true);
        			else
            	$layout_asset=Yii::app()->assetManager->publish(Yii::getPathOfAlias('cms.assets.frontend'), false, -1, false);
		}
        
        /**
         * Filter by using Modules Rights
         * 
         * @return type 
         */
      /*  public function filters()
        {
               return array(
                   'rights',
               );
        }
        */   
        /**
         * List of allowd default Actions for the user
         * @return type 
         
        public function allowedActions()
        {
           return 'login,logout';
        }*/
        
      
       		
			
		public function afterRender($view,&$output)
	    {
	    		   	            
			Yii::app()->clientScript->registerMetaTag($this->description, 'description');
			Yii::app()->clientScript->registerMetaTag($this->keywords, 'keywords');
						
			//Check if change Title, we will replace content in <title> with new Title
			if($this->change_title){				
				$output=replaceTags('<title>', '</title>', $this->pageTitle, $output);								
			}	
			
				 
	    }
		
		
	   
        public function error(){
            if($error=Yii::app()->errorHandler->error)
		    {
		    	if(Yii::app()->request->isAjaxRequest)
		    		echo $error['message'];
		    	else
		        	 //$this->renderPageSlug('error');
						if(CurrentLangId()== 2) {
      						$breadcrumbs[] = array('url' => FRONT_SITE_URL, 'label' => 'FlorenceVillas');
						} else {				
	  						$breadcrumbs[] = array('url' => FRONT_SITE_URL.Yii::app()->Language.'/', 'label' => 'FlorenceVillas');	}
				
							$breadcrumbs[] = array('url' => '', 'label' => "404");	
							$this->render('common.front_layouts.default.404',array('page'=>$page, 'breadcrumbs'=>$breadcrumbs, 'flag'=>$flag, 'meta'=>$meta));  
		    }
        }
       
	

}