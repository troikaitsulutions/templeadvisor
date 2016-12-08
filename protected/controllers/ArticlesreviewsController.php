<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class ArticlesreviewssController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionList()
	{
		
		$page = Page::model()->findByPk(69);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		$Writeyourreviews = Writeyourreviews::model()->findAll(array('condition'=>'status = 1','order' => 'created DESC',
							'limit' => 5));
		$Contributemyarticle = Contributemyarticle::model()->findAll(array('condition'=>'status = 1','order' => 'created DESC',
							'limit' => 5));
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('article-review-list',array('page'=>$page,'meta'=>$meta,'Writeyourreviews'=>$Writeyourreviews,'Contributemyarticle'=>$Contributemyarticle));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	

				
		public function actionArticleread()
	{
		$id= isset($_GET['aid']) ? (int) ($_GET['aid']) : 0 ;
		if($id) { 
		
			$Contributemyarticle = Contributemyarticle::GetItem($id);
			if( isset($Contributemyarticle) && count($Contributemyarticle)>0 ) {
			$meta = Seo::GetPageSeo($Contributemyarticle->uid);
			
			if( isset($meta) && count($meta)>0 ) { 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
			$this->render('article-read',array('Contributemyarticle'=>$Contributemyarticle,'meta'=>$meta )); 
			
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
			
		}
               
	}
	
	

	
}