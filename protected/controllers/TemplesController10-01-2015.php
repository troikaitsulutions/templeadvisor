<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class TemplesController extends FeController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	 
	public function actionIndex()
	{
		
		$page = Page::model()->findByPk(60);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('temple1',array( 'page'=>$page, 'meta'=>$meta ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	 
	
	public function actionBytheme()
	{
		
		$page = Page::model()->findByPk(74);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
		
		$criteria = new CDbCriteria();	
		$criteria->condition = 'status = :id';
		$criteria->params = array (':id'=>1);		
		
		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-deity-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	
	public function actionBythemehistory()
	{
		
		$page = Page::model()->findByPk(74);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$AllTemples = '';
					
		$this->render('list-by-history-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionBythemebeliefs()
	{
		
		$page = Page::model()->findByPk(74);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
				$AllTemples = '';
					
		$this->render('list-by-beliefs-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionByregion()
	{
		
		
		
		$page = Page::model()->findByPk(74);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
				$AllTemples = '';
					
		$this->render('list-by-region',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	
	public function actionBymap()
	{
		
		$page = Page::model()->findByPk(76);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('list-by-map',array('page'=>$page,'meta'=>$meta));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionList()
	{
		
		$id=isset($_GET['page']) ? (int) ($_GET['page']) : 0 ;
		
		$criteria = new CDbCriteria();
       	$criteria->condition = 'status = :id';
       	$criteria->order = 'id ASC';
       	$criteria->params = array (':id'=>1);
        $item_count = Temples::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(10);
        $pag->applyLimit($criteria);  // the trick is here!
		$pag->setCurrentPage($id);
        
		$this->render('temple-list',array(
		        'Temples'=> Temples::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'10',
                'items_count'=>$item_count,
                'pages'=>$pag
		));	
		Yii::app()->end();         
	}
	
	
	
	public function actionInfo()
	{
		$id= isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		if($id) { 
		
			$Temple = Temples::GetItem($id);
			if( isset($Temple) && count($Temple)>0 ) {
			$meta = Seo::GetPageSeo($Temple->uid);
			
			if( isset($meta) && count($meta)>0 ) { 
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
			$this->render('temple-detail',array('Temple'=>$Temple,'meta'=>$meta )); 
			
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			
			
		}
               
	}
	
	public function actionGallery()
	{
		
		$id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
		
		$criteria = new CDbCriteria();
		
		if( $id == 0 ) { 
			$criteria->condition = 'status = :id'; 
			$criteria->params = array (':id'=>1);
		} else {
			$criteria->condition = 'status = :id AND prop_id = :PID';
			$criteria->params = array (':id'=>1,':PID'=>$id);
		}
		
		
		$page = Page::model()->findByPk(67);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
			
       	$criteria->order = 'id ASC';
       	
        $item_count = Gallery::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(20);
        $pag->applyLimit($criteria);  // the trick is here!
		$pag->setCurrentPage($id);
        
		$this->render('gallery',array(
		        'Temples'=> Gallery::model()->findAll($criteria),
                'item_count'=>$item_count,
                'page_size'=>'20',
                'items_count'=>$item_count,
                'pages'=>$pag,
				'meta'=>$meta
		));	
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
		Yii::app()->end(); 
	}
	
	
	
	
	
	
	
}