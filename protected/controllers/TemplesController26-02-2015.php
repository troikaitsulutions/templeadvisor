<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class TemplesController extends FeController
{
	 
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
		
		$page = Page::model()->findByPk(78);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
		if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$dids = isset($_GET['deities']) ? strtolower(trim($_GET['deities'])) : '';
		$condition = '';
		
		$adids = explode(',', $dids);    
		
		if( isset($dids) && ($dids!='') ) {
			foreach ( $adids as $key=>$val ) {
				if($key == 0 ) { $condition .= " sdeity = ".$val; }
				else { $condition .= " OR sdeity = ".$val; }
			} }
			
		if($q != '') { 
			if( $condition == '' ) { $condition .= " name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; } 
			else 
			{ $condition .= " OR name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; }
		}
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1 AND religion = 1001'; $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND religion = 1001 AND ('.$condition.')'; $criteria->order=' name ASC'; }	
		
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
	
	public function actionSearch()
	{
		
		$page = Page::model()->findByPk(83);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
		if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		
		
		$Stname = 0;
		$SDeity = 0;
		$Scity = 0;
		
		$condition[]='';
		
		$TempleNames = Temples::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		if( isset($TempleNames) && count($TempleNames)>0 ) { $Stname = 1;  $condition[] = "name LIKE '%".$q."%'";  } 
		
		$DeitySearches = Diety::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($DeitySearches) && count($DeitySearches)>0 ) {
		  $SDeity = 1;
		  foreach ($DeitySearches as $DeitySearch) {
				$condition[] = "sdeity = ".$DeitySearch->id;
		  }
		}
		
		$TownSearches = Town::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($TownSearches) && count($TownSearches)>0 ) {
		  $Scity = 1;
		  foreach ($TownSearches as $TownSearch) {
				$condition[] = "town = ".$TownSearch->id;
		  }
		}
		
		//print_r($condition);
		
		if( isset($condition) && count($condition)>0 ) {
			$search_query = implode(' OR ',$condition);	
		}
		
		//echo $search_query;
			
		//if($q != '') { if( $condition != '' ) { $condition .= "status = 1 AND ".$condition ; }	}
		
		
		//echo $condition;
		
		$criteria = new CDbCriteria();	
		
		if($search_query != '') { $criteria->condition = "status = 1 AND (".substr($search_query, 3).")"; }  else { $criteria->condition = "status = 4"; }
		$criteria->order='name ASC'; 	
		
		$item_count = Temples::model()->count($criteria);	  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('search-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag,
							  'q'=> $q ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	
	public function actionBythemehistory()
	{
		
		$page = Page::model()->findByPk(79);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
		
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$dids = isset($_GET['themes']) ? strtolower(trim($_GET['themes'])) : '';
		$condition = '';
		
		$adids = explode(',', $dids);    
		
		if( isset($dids) && ($dids!='') ) {
			foreach ( $adids as $key=>$val ) {
				if($key == 0 ) { $condition .= " themelist LIKE '%".$val."%'"; }
				else { $condition .= " OR themelist LIKE '%".$val."%'"; }
			} }
		
		if($q != '') { 
			if( $condition == '' ) { $condition .= " name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; } 
			else 
			{ $condition .= " OR name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; }
		}
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1';  $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND ('.$condition.')';  $criteria->order=' name ASC'; }	
		$criteria->order = 'state ASC';
		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-history-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionBythemebeliefs()
	{
		
		$page = Page::model()->findByPk(80);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		//		$AllTemples = '';
					
		//$this->render('list-by-beliefs-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples));
		
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$dids = isset($_GET['beliefs']) ? strtolower(trim($_GET['beliefs'])) : '';
		$condition = '';
		
		$adids = explode(',', $dids);    
		
		if( isset($dids) && ($dids!='') ) {
			foreach ( $adids as $key=>$val ) {
				if($key == 0 ) { $condition .= " belief LIKE '%".$val."%'"; }
				else { $condition .= " OR belief LIKE '%".$val."%'"; }
			} }
		
		if($q != '') { 
			if( $condition == '' ) { $condition .= " name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; } 
			else 
			{ $condition .= " OR name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; }
		}
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1 AND religion = 1001'; $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1  AND religion = 1001 AND ('.$condition.')'; $criteria->order=' name ASC';  }	

		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-beliefs-theme',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionByregion()
	{
		
		
		
		$page = Page::model()->findByPk(75);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
		
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$reg = isset($_GET['reg']) ? strtolower(trim($_GET['reg'])) : '';
		$state = isset($_GET['state']) ? strtolower(trim($_GET['state'])) : '';
		$district = isset($_GET['district']) ? strtolower(trim($_GET['district'])) : '';
		
		$condition = '';
		
		
		
		if($district != '' ) { $condition .= " district = ".$district; }
				else { 
					if($state != '' ) { $condition .= " state = ".$state; } 
						else {
							if($reg != '' ) { $condition .= " region = ".$reg; }	 
						}
				 }    
				
		if($q != '') { 
			if( $condition == '' ) { $condition .= " name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; } 
			else 
			{ $condition .= " OR name LIKE '%".$q."%' OR deity LIKE '%".$q."%' OR other_deity LIKE '%".$q."%' "; }
		}
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1';  $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND ('.$condition.')';  $criteria->order=' name ASC'; }	

		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-region',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		
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
				
		
		
		
		$q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : ''; 
		$l = isset($_GET['l']) ? strtolower(trim($_GET['l'])) : '';
		
		$condition1[]='';
		$condition2[]='';
		$search_query1 = '';
		$search_query2 = '';
		
		if( $q!='') {
		
		$TempleNames = Temples::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		if( isset($TempleNames) && count($TempleNames)>0 ) { $condition1[] = "name LIKE '%".$q."%'";  } 
		
		$DeitySearches = Diety::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($DeitySearches) && count($DeitySearches)>0 ) {
		  foreach ($DeitySearches as $DeitySearch) {
				$condition1[] = "sdeity = ".$DeitySearch->id;
		  }
		}
		}
		
		if( $l!='') {
		
		$TownSearches = Town::model()->findAll(array('condition'=>"name LIKE '%".$l."%'"));
		
		if(isset($TownSearches) && count($TownSearches)>0 ) {
		  foreach ($TownSearches as $TownSearch) {
				$condition2[] = "town = ".$TownSearch->id;
		  }
		}		
		}
		
		//print_r($condition2);
		
		if( isset($condition1) && count($condition1)>0 ) {
			$search_query1 = implode(' OR ',$condition1);	
		}
		
		if( isset($condition2) && count($condition2)>0 ) {
			$search_query2 = implode(' OR ',$condition2);	
		}
		//echo $search_query2;
		$final_query = '';
		
		if($search_query1 != '') { $final_query .= " AND (".substr($search_query1, 3).")"; }
		if($search_query2 != '') { $final_query .= " AND (".substr($search_query2, 3).")"; }
		
		$criteria = new CDbCriteria();	
		
		if($final_query != '') { $criteria->condition = "status = 1 AND latitude != '' AND longitude != '' ".$final_query; }  else { $criteria->condition = "status = 4"; }
		$criteria->order='name ASC'; 	
		/*
		$item_count = Temples::model()->count($criteria);	  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		*/
		$AllTemples = Temples::model()->findAll($criteria);
		
				
		
		//$AllTemples = Temples::model()->findAll(array('condition'=>'status = 1 AND latitude != "" AND longitude != ""'));
		
		/* if( isset($_GET['q']) )
        {
            $AllTemples = Temples::model()->findAll(array(
				'condition' => "( name LIKE '%". $_GET['q']."%' OR deity LIKE '%". $_GET['q']."%' OR other_deity LIKE '%". $_GET['q']."%' OR content1 LIKE '%". $_GET['q']."%' )  AND status = 1"
			)); 
        }*/
					
		$this->render('list-by-map',array('page'=>$page,'meta'=>$meta, 'AllTemples'=>$AllTemples));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionSikh()
	{
		$condition = '';
		$page = Page::model()->findByPk(76);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
				
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1 AND religion=1002';  $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND religion=1002 AND ('.$condition.')';  $criteria->order=' name ASC'; }	

		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-sikh',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		
					
	//	$this->render('list-by-sikh',array('page'=>$page,'meta'=>$meta, 'AllTemples'=>$AllTemples));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionJain()
	{
		
		$condition = '';
		$page = Page::model()->findByPk(76);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
				
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1 AND religion=1004';  $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND religion=1004 AND ('.$condition.')';  $criteria->order=' name ASC'; }	

		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-jain',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	
	public function actionBuddhist()
	{
		
		$condition = '';
		$page = Page::model()->findByPk(76);
		if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				
				
		
		$criteria = new CDbCriteria();	
		if( $condition == '' ) { $criteria->condition = 'status = 1 AND religion=1003';  $criteria->order=' name ASC'; } else { $criteria->condition = 'status = 1 AND religion=1003 AND ('.$condition.')';  $criteria->order=' name ASC'; }	

		$item_count = Temples::model()->count($criteria);
				  
		$pag = new CPagination($item_count);
		
		$pag->setPageSize(15);
		$pag->pageVar='page';
		$pag->applyLimit($criteria); 
		
		$AllTemples = Temples::model()->findAll($criteria);
		
		$this->render('list-by-buddhist',array('page'=>$page,'meta'=>$meta,'AllTemples'=>$AllTemples, 
							  'item_count'=>$item_count,
							  'page_size'=>'10',
							  'items_count'=>$item_count,
							  'pages'=>$pag));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
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
		
		$prop_id = isset($_GET['prop_id']) ? (int) ($_GET['prop_id']) : 0 ;
		$page_no = isset($_GET['page']) ? (int) ($_GET['page']) : 0 ;
		
		$criteria = new CDbCriteria();
		
		if( $prop_id == 0 ) { 
			$criteria->select = 'id, img_url, prop_id, min(img_order) as row_order';
			$criteria->condition = 'status = :id'; 
			$criteria->params = array (':id'=>1);
			$criteria->group = 'prop_id';
		} else {
			$criteria->condition = 'status = :id AND prop_id = :PID';
			$criteria->params = array (':id'=>1,':PID'=>$prop_id);
		}
		
		
		$page = Page::model()->findByPk(67);
		if( isset($page) && count($page)>0 ) { 
		 
		$meta = Seo::GetPageSeo($page->uid);
		
		
			if(isset($meta) && count($meta)>0) {
				
				if( $page_no == 0 ) {
					$this->pageTitle = $meta->title;
					$this->description = $meta->description;
					$this->keywords = $meta->keywords;	
				} else {
					$this->pageTitle = $meta->title.' - page '.$page_no;
					$this->description = $meta->description.' - page '.$page_no;
					$this->keywords = $meta->keywords;	
				}
			
       	$criteria->order = 'id ASC';
       	
        $item_count = Gallery::model()->count($criteria);
		
		$pag = new CPagination($item_count);	 
		$pag->setPageSize(20);
		$pag->pageVar='page';
        $pag->applyLimit($criteria);  // the trick is here!
		
        
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
		
		//Yii::app()->end(); 
	}
	
	
	
	
	
	
	
}