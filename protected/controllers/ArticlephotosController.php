<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class ArticlephotosController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionIndex()
	{
		
		$page = Page::model()->findByPk(64);
		if( isset($page) && count($page)>0 ) { 
		$meta = Seo::GetPageSeo($page->uid);
	
			if( isset($meta) && count($meta)>0 ) { 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				$this->render('article-photos-list',array('page'=>$page,'meta'=>$meta));
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	}
	
	
	
}