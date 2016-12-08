<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class OverviewController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
			       	
		   $list = (isset($_GET['list'])) ? $_GET['list'] : ''; 	  	
		   $meta = Seo::model()->find(array('condition'=>'slug = :SL','params'=>array(':SL'=> $list )));
			
			if(isset($meta) && count($meta)>0) {
				$RegVal = Overview::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=> $meta->uid )));
					if(isset($RegVal) && count($RegVal)>0) {
						  $this->pageTitle=$meta->title;
						  $this->description=$meta->description;
						  $this->keywords = $meta->keywords;	
						  $this->render('page',array('page'=>$RegVal,'meta'=>$meta));
					
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		       
	}
	
	
}