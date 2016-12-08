<?php
/**
 * Backend Page Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BemaildocController extends BeController{
    
       
        public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                        
                        array('label'=>t('Add Doc'), 'url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-mini')),
						 array('label'=>t('Manage Doc'), 'url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-mini')),
                );
		 
	}
                 
        /**
	 * The function that do Create new Page
	 * 
	 */
	public function actionCreate()
	{                
		$this->render('maildoc_create');
	}
        
       
        
        /**
	 * The function that do Manage Page
	 * 
	 */
	public function actionAdmin()
	{                
		$this->render('maildoc_admin');
	}
        
        /**
	 * The function that view Page details
	 * 
	 */
	public function actionView()
	{         
              $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;
              $this->menu=array_merge($this->menu,                       
                        array(
                            array('label'=>t('Update this Doc'), 'url'=>array('update','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('maildoc_view');
	}
        
        /**
	 * The function that update Page
	 * 
	 */
	public function actionUpdate()
	{                
                $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;                
                $this->menu=array_merge($this->menu,                       
                        array(
                            
                            array('label'=>t('View Doc'), 'url'=>array('view','id'=>$id),'linkOptions'=>array('class'=>'btn btn-mini'))
                        )
                    );
		$this->render('maildoc_update',array('id'=>$id));
	}
        
	public function actionUpload()
	{                
        $id=isset($_GET['id']) ? (int) ($_GET['id']) : 0 ;  
		$model = new Maildoc;              
		$this->render('maildoc_upload',array('id'=>$id,'model'=>$model));
	}
        
    public function actionFilesave()
    {       
		$id=isset($_GET['id']) ? trim($_GET['id']) : 0;                              
		Yii::import('common.extensions.file.CFile');
		$file = CUploadedFile::getInstanceByName('Maildoc[file_attache]');
		$temp_name = time().'.'.$file->getExtensionName();
		$file->saveAs('../resources/maildoc/'.$temp_name);
			
		$model = Maildoc::model()->findByPk($id);
		if($model->file_attache=='') $filename = $temp_name; else $filename = $model->file_attache.','.$temp_name;
		$model->file_attache = $filename;
		$model->save();
    }  
	
	public function actionFiledelete()
    {       
		$id=isset($_GET['id']) ? trim($_GET['id']) : 0;   
		$filename = base64_decode($_GET['filename']);
		if($filename!='')
		{        
			if(file_exists('../resources/maildoc/'.$filename)) unlink('../resources/maildoc/'.$filename);                  
			$model = Maildoc::model()->findByPk($id);
			$existfilename = explode(',',$model->file_attache);
			echo count($existfilename);
			if(count($existfilename)>1)
			{
			$key = array_search($filename,$existfilename);
			unset($existfilename[$key]);
			$new_files = implode(',',$existfilename);
			$model->file_attache = $new_files;
			}
			else
			{
			echo "test";
			$model->file_attache ='';
			}
			echo $new_files;
			
			$model->save();
		}
	}	/** 
	 * The function is to Delete Page
	 * 
	 */
	public function actionDelete($id)
	{                            
             GxcHelpers::deleteModel('Maildoc', $id);          
	}        
}