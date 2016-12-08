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
					
		$this->render('home',array( 'page'=>$page, 'meta'=>$meta ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }  
	}
	 
	
	public function actionBytheme()
	{
		
		$country = isset($_GET['country']) ? strtolower(trim($_GET['country'])) : '';
		$theme = isset($_GET['theme']) ? strtolower(trim($_GET['theme'])) : '';
		
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$CountrySeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$country)));
		if( isset($CountrySeo) && count($CountrySeo)>0 ) { 
		
		$BreadCrumbs[1]['label'] = $CountrySeo->breadcrumbs;
		$BreadCrumbs[1]['url'] = $this->createUrl('temples/index',array('country' => $CountrySeo->slug));
		
		if ( ( isset($theme) && ($theme!='') ) ) { 
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
				
		$ThemeSeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$theme)));

		if( isset($ThemeSeo) && count($ThemeSeo)>0 ) { 
		
			$BreadCrumbs[2]['label'] = $ThemeSeo->breadcrumbs;
			$BreadCrumbs[2]['url'] = '#';
			$meta = $ThemeSeo;
						
			$Themes = Themes::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$ThemeSeo->uid)));
		}
		
		$AllTemples = Temples::model()->findAll();
		
		$model = new Templestheme('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Templesregion'])) {
				$model->attributes = $_GET['Templestheme'];
			}
		
		$this->render('theme',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllTemples' => $AllTemples, 
							  'model' => $model,
							  'theme' => $Themes->id,
							  ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
               
	}
	
	public function actionByreligion()
	{
		
		$country = isset($_GET['country']) ? strtolower(trim($_GET['country'])) : '';
		$religion = isset($_GET['religion']) ? strtolower(trim($_GET['religion'])) : '';
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$CountrySeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$country)));
		
		if( isset($CountrySeo) && count($CountrySeo)>0 ) { 
		
		$BreadCrumbs[1]['label'] = $CountrySeo->breadcrumbs;
		$BreadCrumbs[1]['url'] = $this->createUrl('temples/index',array('country' => $CountrySeo->slug));
		
		
		
		if ( ( isset($religion) && ($religion!='') ) ) 
		{ 
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
				
		
			$ReligionSeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$religion)));
			if( isset($ReligionSeo) && count($ReligionSeo)>0 ) { 
		
			$BreadCrumbs[2]['label'] = $ReligionSeo->breadcrumbs;
			$BreadCrumbs[2]['url'] = '#';
			$meta = $ReligionSeo;	
				$Religion = Religion::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$ReligionSeo->uid)));
		}
		
		
		
		
		$AllTemples = Temples::model()->findAll();
		
		$model = new Templesreligion('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Templesregion'])) {
				$model->attributes = $_GET['Templesregion'];
			}
		
		$this->render('religion',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllTemples' => $AllTemples, 
							  'model' => $model,
							  'religion' => $Religion->id
							  ));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	           
                     
	}
	
	public function actionList()
	{
		
		$country = isset($_GET['country']) ? strtolower(trim($_GET['country'])) : '';
		$region = isset($_GET['region']) ? strtolower(trim($_GET['region'])) : '';
		
		$BreadCrumbs[0]['label'] = 'Home';
		$BreadCrumbs[0]['url'] = FRONT_SITE_URL;
		
		$CountrySeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$country)));
		
		if( isset($CountrySeo) && count($CountrySeo)>0 ) { 
		
		$BreadCrumbs[1]['label'] = $CountrySeo->breadcrumbs;
		$BreadCrumbs[1]['url'] = $this->createUrl('temples/index',array('country' => $CountrySeo->slug));
		
		if ( ( isset($region) && ($region!='') ) ) { 
		
			$this->pageTitle = 'Meta Title';
			$this->description = 'Meta Desc';
			$this->keywords = 'Meta Keyword';	 
				
		
		$RegionSeo = Seo::model()->find(array('condition'=>'slug = :SLUG','params'=>array(':SLUG'=>$region)));

		if( isset($RegionSeo) && count($RegionSeo)>0 ) { 
		
			$BreadCrumbs[2]['label'] = $RegionSeo->breadcrumbs;
			$BreadCrumbs[2]['url'] = '#';
			$meta = $RegionSeo;
						
			$Region = Reg::model()->find(array('condition'=>'uid = :REGUID','params'=>array(':REGUID'=>$RegionSeo->uid)));
		}
		
			$AllTemples = Temples::model()->findAll();
			
			$model = new Templesregion('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['Templesregion'])) {
				$model->attributes = $_GET['Templesregion'];
			}
		$this->render('list',array(
							  'meta' => $meta,
							  'BreadCrumbs' => $BreadCrumbs,
							  'AllTemples' => $AllTemples, 
							  'model'=>$model,
							  'region' => $Region->id
							  ));
		
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
		
		$TempleNames = Temples::model()->findAll(array('condition'=>"name LIKE '%".$q."%' OR content1 LIKE '%".$q."%' OR famous_for LIKE '%".$q."%'"));
		if( isset($TempleNames) && count($TempleNames)>0 ) { $Stname = 1;  $condition[] = "name LIKE '%".$q."%' OR content1 LIKE '%".$q."%' OR famous_for LIKE '%".$q."%'";  } 
		
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
		
		$DistrictSearches = District::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($DistrictSearches) && count($DistrictSearches)>0 ) {
		  foreach ($DistrictSearches as $DistrictSearch) {
				$condition2[] = "district = ".$DistrictSearch->id;
		  }
		}	
		
		$StateSearches = State::model()->findAll(array('condition'=>"name LIKE '%".$q."%'"));
		
		if(isset($StateSearches) && count($StateSearches)>0 ) {
		  foreach ($StateSearches as $StateSearch) {
				$condition2[] = "state = ".$StateSearch->id;
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
	
	
	/*
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
				
				$this->render('detail',array('Temple'=>$Temple,'meta'=>$meta )); 
			
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		}
               
	} */
	
	public function actionDetail()
	{
		
		
		$country = isset($_GET['country']) ? strtolower(trim($_GET['country'])) : '';
		$religion = isset($_GET['religion']) ? strtolower(trim($_GET['religion'])) : '';
		$tid = isset($_GET['tid']) ? strtolower(trim($_GET['tid'])) : '';
		
		if ( isset($tid) && ($tid!='') ) 
		{ 
			$TempleSeo = Seo::model()->find(array('condition'=>'slug = :SLG', 'params'=>array(':SLG'=>$tid)));
			if(isset($TempleSeo) && count($TempleSeo)>0 ) 
			{
				$TempleDetail = Temples::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$TempleSeo->uid)));
				$TempleReligion = Religion::model()->findByPk($TempleDetail->religion);
				$ReligionSeo = Seo::model()->find(array('condition'=>'uid = :UID','params'=>array(':UID'=>$TempleReligion->uid)));
				if(isset($ReligionSeo) && count($ReligionSeo)>0 ) 
				{
					if($ReligionSeo->slug == $religion ) 
					{
							if(isset($TempleDetail) && count($TempleDetail)>0 ) 
							{
								$Temple = Temples::GetItem($TempleDetail->id);
								if( isset($Temple) && count($Temple)>0 ) {
									
										
										$Festivals = Festivalevent::model()->findAll(array('condition'=>'temples LIKE :TID','params'=>array(':TID'=>'%'.$Temple->id.'%')));
										//$Festivals = Festivalevent::model()->findAll();
										
										$Reviews = Testimonials::model()->findAll(array('condition'=>'temple = :TID','params'=>array(':TID'=>$Temple->id)));
										//$Reviews = Testimonials::model()->findAll();
										
										$Articles = Articles::model()->findAll(array('condition'=>'parent = :TID','params'=>array(':TID'=>$Temple->id)));
										//$Articles = Articles::model()->findAll(array('limit'=>5));
										
										$model = new Testimonials;
										
									 
										$this->pageTitle = $TempleSeo->title;
										$this->description = $TempleSeo->description;
										$this->keywords = $TempleSeo->keywords;	 
										$this->render('detail',array(
											'Temple'=>$Temple,
											'meta'=>$TempleSeo, 
											'Festivals'=>$Festivals,
											'Reviews'=>$Reviews,
											'Articles' => $Articles,
											'model'=>$model
											)); 
								}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
							}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
					}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			} else { throw new CHttpException('404',t('Oops! Page not found!')); }
		} else { throw new CHttpException('404',t('Oops! Page not found!')); }
               
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
					
					if( $prop_id == 0 ) { 
					
					$this->pageTitle = $meta->title;
					$this->description = $meta->description;
					$this->keywords = $meta->keywords;	
					
					} else {
						
						$this->pageTitle = 'Photo Gallery : '.Temples::GetName($prop_id);
						$this->description = 'Temple Advisor provide various angle photographs for the temple of '.Temples::GetName($prop_id);
						$this->keywords = $meta->keywords;
					}
				
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