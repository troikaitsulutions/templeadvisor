<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class SiteController extends FeController
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
	
	  public function actionIndex()
		{	      	
			$meta = Seo::model()->find(array('condition'=>'slug = :HOME','params'=>array(':HOME'=> Yii::app()->settings->get('general', 'homepage'))));
			
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	
				$page = Page::model()->find(array('condition'=>'uid = :UID', 'params'=>array(':UID' => $meta->uid )));
				if(isset($page) && count($page)>0) {
					
					$this->render('index',array('meta'=>$meta,'page'=>$page));
						
				}
			}
		}
	
	
	public function actionAboutus()
	{
		
		$page = Page::model()->findByPk(56);
		
		if( isset($page) && count($page)>0 ) { 
		$meta = Seo::GetPageSeo($page->uid);			
			if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
				$this->render('aboutus',array('page'=>$page,'meta'=>$meta));
				}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	}
	
	

	
	 public function actionBusinessenquiry()
	{
		$model = new Businessenquiry;
		
		$page = Page::model()->findByPk(73);
		
        if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
        if(isset($meta) && count($meta)>0) {
		
       
        		$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	 
                
		 if(isset($_POST['ajax']) && $_POST['ajax']==='businessenquiry-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Businessenquiry']))
        {
                $model->attributes=$_POST['Businessenquiry'];   
								
				$current_time=time();
				$model->created = $current_time;
				 
				$model->cr_ip = ip();
				
				
				   if($model->save()){           
                    
                   
                    user()->setFlash('success',t('The Enquiry has been Added Successfully!'));                                                            
                    $model = new Businessenquiry;
                   // Yii::app()->controller->redirect(array('create'));
                }
        }
							
		$this->render('businessenquiry',array('page'=>$page,'meta'=>$meta, 'model' => $model));
		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
      }  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
	  
	    
	}
	
	
	 public function actionGeneralenquiry()
	{
		$model = new Generalenquiry;
		
		$page = Page::model()->findByPk(63);
		
        if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
        if(isset($meta) && count($meta)>0) {
		
       
        		$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	 
                
		 if(isset($_POST['ajax']) && $_POST['ajax']==='generalenquiry-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Generalenquiry']))
        {
                $model->attributes=$_POST['Generalenquiry'];   
								
				$current_time=time();
				$model->created = $current_time;
				
				$model->cr_ip = ip();
				
				
				   if($model->save()){           
                    
                   
                    user()->setFlash('success',t('The Enquiry has been Added Successfully!'));                                                            
                    $model = new Generalenquiry;
                   // Yii::app()->controller->redirect(array('create'));
                }
        }
							
		$this->render('generalenquiry',array('page'=>$page,'meta'=>$meta, 'model' => $model));
		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
      }  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
	  
	    
	}
	
	public function actionContributemyarticle()
	{
		$model = new Contributemyarticle;
		$page = Page::model()->findByPk(64);
		
		$mseo = new Seo;
		
        if( isset($page) && count($page)>0 ) { 
		
		$meta = Seo::GetPageSeo($page->uid);
		
        if(isset($meta) && count($meta)>0) {
		
       
        		$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	
				
				Yii::import('common.extensions.file.CFile');
				
				
				 
                
		 if(isset($_POST['ajax']) && $_POST['ajax']==='contributemyarticle-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
		
		
        
        // collect user input data
        if(isset($_POST['Contributemyarticle']))
        {
			
				$model->attributes=$_POST['Contributemyarticle'];  
				//$file1 = CUploadedFile::getInstance($model,'img_url_1');
				$file1 = CUploadedFile::getInstanceByName('Contributemyarticle[img_url_1]');	
				
				if($file1) {				
					$temp_name1 = toSlug($model->heading).'_1_'.time().'.'.$file1->getExtensionName();
					$file1->saveAs(RESOURCES_FOLDER.'/'.$temp_name1);

				$img1 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name1);
				$img1->resize(292,208);
				$img1->save(RESOURCES_FOLDER.'/th_'.$temp_name1);
				
				if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name1, AWS_S3_BUCKET, 'articles_images/large/'.$temp_name1, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name1, AWS_S3_BUCKET, 'articles_images/thumb/'.$temp_name1, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					$model->img_url_1 = $temp_name1;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name1);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name1);
				} }
				
				$file2 = CUploadedFile::getInstanceByName('Contributemyarticle[img_url_2]');
				if(($file2)) {				
				$temp_name2 = toSlug($model->heading).'_2_'.time().'.'.$file2->getExtensionName();
				$file2->saveAs(RESOURCES_FOLDER.'/'.$temp_name2);
		
				$img2 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name2);
				$img2->resize(292,208);
				$img2->save(RESOURCES_FOLDER.'/th_'.$temp_name2);
				
				if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name2, AWS_S3_BUCKET, 'articles_images/large/'.$temp_name2, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name2, AWS_S3_BUCKET, 'articles_images/thumb/'.$temp_name2, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					$model->img_url_2 = $temp_name2;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name2);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name2);
				} }
				
				$file3 = CUploadedFile::getInstanceByName('Contributemyarticle[img_url_3]');
				if(($file3)) {				
				$temp_name3 = toSlug($model->heading).'_3_'.time().'.'.$file3->getExtensionName();
				$file3->saveAs(RESOURCES_FOLDER.'/'.$temp_name3);
		
				$img3 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name3);
				$img3->resize(292,208);
				$img3->save(RESOURCES_FOLDER.'/th_'.$temp_name3);
				
				if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name3, AWS_S3_BUCKET, 'articles_images/large/'.$temp_name3, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name3, AWS_S3_BUCKET, 'articles_images/thumb/'.$temp_name3, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					$model->img_url_3 = $temp_name3;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name3);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name3);
				} }
				
				$file4 = CUploadedFile::getInstanceByName('Contributemyarticle[img_url_4]');
				if(($file4)) {				
				$temp_name4 = toSlug($model->heading).'_4_'.time().'.'.$file4->getExtensionName();
				$file4->saveAs(RESOURCES_FOLDER.'/'.$temp_name4);
		
				$img4 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name4);
				$img4->resize(292,208);
				$img4->save(RESOURCES_FOLDER.'/th_'.$temp_name4);
				
				if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name4, AWS_S3_BUCKET, 'articles_images/large/'.$temp_name4, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name4, AWS_S3_BUCKET, 'articles_images/thumb/'.$temp_name4, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					$model->img_url_4 = $temp_name4;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name4);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name4);
				} }
				
				$file5 = CUploadedFile::getInstanceByName('Contributemyarticle[img_url_5]');
				if(($file5)) {				
				$temp_name5 = toSlug($model->heading).'_5_'.time().'.'.$file5->getExtensionName();
				$file5->saveAs(RESOURCES_FOLDER.'/'.$temp_name5);
		
				$img5 = Yii::app()->simpleImage->load(RESOURCES_FOLDER.'/'.$temp_name5);
				$img5->resize(292,208);
				$img5->save(RESOURCES_FOLDER.'/th_'.$temp_name5);
				
				if (Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/'.$temp_name5, AWS_S3_BUCKET, 'articles_images/large/'.$temp_name5, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) )) 						
				{  
					Yii::app()->s3->putObjectFile(RESOURCES_FOLDER.'/th_'.$temp_name5, AWS_S3_BUCKET, 'articles_images/thumb/'.$temp_name5, S3::ACL_PUBLIC_READ, $metaHeaders = array(
					 "Cache-Control" => "max-age=94608000", "Expires" => gmdate("D, d M Y H:i:s T", strtotime("+3 years"))) );
					
					$model->img_url_5 = $temp_name5;
    				unlink(RESOURCES_FOLDER.'/'.$temp_name5);
					unlink(RESOURCES_FOLDER.'/th_'.$temp_name5);
				} } 
					
				$current_time=time();
				$mseo->created = $model->created = $current_time;
				
				$mseo->cr_ip = $model->cr_ip = ip();
			    $model->uid = $mseo->uid = uniqid();
				$mseo->slug = toSlug($model->heading);
				$mseo->allow_follow = 1;
				$mseo->allow_index = 1;
				$mseo->mainmenu = $model->heading;
				$mseo->breadcrumbs = $model->heading;
				$mseo->title = $model->heading;
				$mseo->h1 = $model->heading;
				$file_name = toSlug($model->heading);
				$model->status = 2;
				$mseo->layout = 'articles';
				
				$valid=$model->validate();			
				
				if($valid)
        			{	
			   		if($model->save() && $mseo->save()){   
					user()->setFlash('success',t('The Article has been Added Successfully!'));                                                            
                    $model = new Contributemyarticle;
                   
                } 
				}
        }
		
							
		$this->render('contributemyarticle',array('page'=>$page,'meta'=>$meta, 'model' => $model, 'mseo' => $mseo),false,true);
		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
      }  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
	  
	    
	}
	
	public function actionDisclaimer()
	{
		
		$page = Page::model()->findByPk(62);
		if( isset($page) && count($page)>0 ) { 
		$meta = Seo::GetPageSeo($page->uid);
					if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('aboutus',array('page'=>$page,'meta'=>$meta));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	          
               
	}
	
	public function actionPrivacypolicy()
	{
		
		$page = Page::model()->findByPk(61);
		
			if( isset($page) && count($page)>0 ) { 
		
				$meta = Seo::GetPageSeo($page->uid);
				
				if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('aboutus',array('page'=>$page,'meta'=>$meta));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	          
               
	}
	
	public function actionTermsconditions()
	{
		
		$page = Page::model()->findByPk(71);
		
			if( isset($page) && count($page)>0 ) { 
		
				$meta = Seo::GetPageSeo($page->uid);
				
				if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('aboutus',array('page'=>$page,'meta'=>$meta));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	          
               
	}
	
	public function actionSitemap()
	{
		
		$page = Page::model()->findByPk(70);
		if( isset($page) && count($page)>0 ) { 
		$meta = Seo::GetPageSeo($page->uid);
					if(isset($meta) && count($meta)>0) {
				$this->pageTitle = $meta->title;
				$this->description = $meta->description;
				$this->keywords = $meta->keywords;	 
					
		$this->render('sitemap',array('page'=>$page,'meta'=>$meta));
		
		}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
	          
               
	}
	
	public function actionWritereviews()
	{
		$model = new Writeyourreviews;
		
		$page = Page::model()->findByPk(72);
		if( isset($page) && count($page)>0 ) { 
		
		
		$meta = Seo::GetPageSeo($page->uid);
		if(isset($meta) && count($meta)>0) {
			
			$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	
		
		
		 if(isset($_POST['ajax']) && $_POST['ajax']==='writeyourreviews-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Writeyourreviews']))
        {
                $model->attributes=$_POST['Writeyourreviews'];   
								
				$current_time=time();
				$model->created = $current_time;
				$model->date_added = $current_time;
				$model->status = 2;
				$model->cr_ip = ip();
				
				                    
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Review has been Added Successfully!'));                                                            
                    $model=new Writeyourreviews;
                   
                }
        }
							
		$this->render('write-review',array('model'=>$model, 'meta'=>$meta, 'page' => $page ));
		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
      }  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
	  
	    
	}
	
	
	public function actionOnlinepooja()
	{
		$model = new Onlinepooja;
		
		$page = Page::model()->findByPk(85);
		if( isset($page) && count($page)>0 ) { 
		
		
		$meta = Seo::GetPageSeo($page->uid);
		if(isset($meta) && count($meta)>0) {
			
			$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	
		
		
		 if(isset($_POST['ajax']) && $_POST['ajax']==='writeyourreviews-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Onlinepooja']))
        {
                $model->attributes=$_POST['Onlinepooja'];   
								
				$current_time=time();
				$model->created = $current_time;
				$model->date_added = $current_time;
				$model->status = 2;
				$model->cr_ip = ip();
				
				                    
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Pooja Requested Successfully!'));                                                            
                    $model=new Onlinepooja;
                   
                }
        }
							
		//$this->render('write-review',array('model'=>$model, 'meta'=>$meta, 'page' => $page ));
		$this->render('online-pooja',array('model'=>$model, 'meta'=>$meta, 'page' => $page ));
		
			}  else { throw new CHttpException('404',t('Oops! Page not found!')); }
		
      }  else { throw new CHttpException('404',t('Oops! Page not found!')); }       
	  
	    
	}
	
	public function actionRegistrationform()
	{
		$model = new Writeyourreviews;
		
		$page = Page::model()->findByPk(86);
		if( isset($page) && count($page)>0 ) { 
		
		
		$meta = Seo::GetPageSeo($page->uid);
		if(isset($meta) && count($meta)>0) {
			
			$this->pageTitle = $meta->title;
				
                $this->description = $meta->description;
				
                $this->keywords = $meta->keywords;	
		
		
		 if(isset($_POST['ajax']) && $_POST['ajax']==='writeyourreviews-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
        
        // collect user input data
        if(isset($_POST['Writeyourreviews']))
        {
                $model->attributes=$_POST['Writeyourreviews'];   
								
				$current_time=time();
				$model->created = $current_time;
				$model->date_added = $current_time;
				$model->status = 2;
				$model->cr_ip = ip();
				
				                    
                if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('The Review has been Added Successfully!'));                                                            
                    $model=new Writeyourreviews;
                   
                }
        }
							
		//$this->render('write-review',array('model'=>$model, 'meta'=>$meta, 'page' => $page ));
		$this->render('registration-form',array('model'=>$model, 'meta'=>$meta, 'page' => $page ));
		
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