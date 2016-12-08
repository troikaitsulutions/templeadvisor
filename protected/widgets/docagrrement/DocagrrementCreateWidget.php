<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class DocagrrementCreateWidget extends CWidget
{

    
    public $visible=true;   
     
 
    public function init()
    {
        
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
	  
 
    protected function renderContent()
    {       
        $model = new Docagrrement;
		
                        
        //If it has guid, it means this is a translated version
        $guid=isset($_GET['guid']) ? strtolower(trim($_GET['guid'])) : '';                                      
        //List of language that should exclude not to translate       
        $lang_exclude=array();        
        //List of translated versions
        $versions=array();                
        // If the guid is not empty, it means we are creating a translated version of a content
        // We will exclude the translated language and include the name of the translated content to $versions


        // if it is ajax validation request
      
        
        // collect user input data
        if(isset($_POST['Docagrrement']))
        {
		
		
			$model->attributes=$_POST['Docagrrement'];  
			$file = CUploadedFile::getInstanceByName('Docagrrement[attachment_file]');
			if($file)
			{
				$temp_name = time().'.'.$file->getExtensionName();
				$model->attachment_file = $temp_name;
			}	
			$current_time=time();
			$model->created = $current_time;
			$model->modified = $current_time;
			$model->cr_ip = ip();
			                
			$model->uid = uniqid();
			  
			$valid=$model->validate();

		    if($valid)
			{
				if($model->attachment_file!='')
				{
					$file->saveAs('../resources/document_agrrement/'.$temp_name);
				/*	$img = Yii::app()->simpleImage->load('../resources/document_agrrement/'.$temp_name);
					$img->resize(64,64);
					$img->save('../resources/document_agrrement/th_'.$temp_name);
					if(Yii::app()->s3->putObjectFile('../resources/document_agrrement/'.$temp_name, "tt-prop-photos", 'peoples/fullsize/'.$temp_name, S3::ACL_PUBLIC_READ))
					{
						Yii::app()->s3->putObjectFile('../resources/document_agrrement/th_'.$temp_name, "tt-prop-photos", 'peoples/thumb/'.$temp_name, S3::ACL_PUBLIC_READ);
					}*/
					$model->attachment_file= $temp_name;
					//unlink('../resources/'.$temp_name);
					//unlink('../resources/th_'.$temp_name);
				}
				
			} 
        
                
				 $model->attributes=$_POST['Docagrrement'];
				 $model->doc_name= $_POST['Docagrrement']['doc_name'];
				  $model->people_type= $_POST['Docagrrement']['people_type'];
				   $model->description= $_POST['Docagrrement']['description'];
				  //  $model->attachment_file= $_POST['Docagrrement']['attachment_file'];
					
					
					 
                		if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Document agreement creation Added Successfully!'));                                                            
                    $model=new Recipient;
                    Yii::app()->controller->redirect(array('admin'));
                } 
        }                
        $this->render('cmswidgets.views.docagrrement.docagrrement_form_widget',array('model'=>$model,'lang_exclude'=>$lang_exclude,'versions'=>$versions));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='docagrrement-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
