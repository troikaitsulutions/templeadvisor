<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class ArticlesController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	
	public function actionIndex()
	{
		$page = Page::model()->findByPk(82);
		if( isset($page) && count($page)>0 ) 
		{ 
			$meta = Seo::GetPageSeo($page->uid);
			if(isset($meta) && count($meta)>0) 
			{
					$this->pageTitle = $meta->title;
					$this->description = $meta->description; 
					$this->keywords = $meta->keywords;	 
			
				$model = new Articlelist('search');
				$model->unsetAttributes();  // clear any default values
			
				if (isset($_GET['Articlelist'])) 
				{
					$model->attributes = $_GET['Articlelist'];
				}
				
				$this->render('article-list',array(
							  'meta' => $meta,
							  'model' => $model
							  ));
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
				}  else { throw new CHttpException('404',t('Oops! Page not found!'));  }  
	}
	
	

				
public function actionArticleread()
	{
		$Article = isset($_GET['article']) ? ($_GET['article']) : '' ;
		
		if(isset($Article)) 
		{ 
			$meta = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$Article)));
			
			if( isset($meta) && count($meta)>0 ) 
			{ 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
				$Contributemyarticle = Articlelist::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$meta->uid)));
				
				if( isset($Contributemyarticle) && count($Contributemyarticle)>0 ) 
				{
				
					$this->render('article-read',array('Contributemyarticles'=>$Contributemyarticle,'meta'=>$meta )); 
			
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
			
			
		}
               
	}
	
	

	
}