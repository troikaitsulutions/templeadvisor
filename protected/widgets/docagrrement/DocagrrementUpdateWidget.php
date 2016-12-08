<?php

/**
 * This is the Widget for update the Content.
 * 
 
 * @package  cmswidgets.object
 *
 */
class DocagrrementUpdateWidget extends CWidget
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
        
       $id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
       $model =  GxcHelpers::loadDetailModel('Docagrrement', $id);
			
		    
			
			
            $this->performAjaxValidation(array($model));
        
        // collect user input data
        if(isset($_POST['Docagrrement']))
        {
		
		
			$model->attributes=$_POST['Docagrrement'];  
		
			$modela = Docagrrement::model()->findbyPk($id);   
			$file = CUploadedFile::getInstanceByName('Docagrrement[attachment_file]');
			 if($file)
			 {
				$temp_name = time().'.'.$file->getExtensionName();
				$exist = $modela->attachment_file;
				$model->attachment_file = $temp_name;
			 }
			 else
			 {
				$model->attachment_file = $modela->attachment_file;
			 }			  
			    $current_time=time();
			$model->created = $current_time;
			$model->modified = $current_time;
			$model->cr_ip = ip();
		             
			$model->uid = uniqid();
				if($file)
				{ 
					if($model->attachment_file!='')
					{
						$file->saveAs('http://www.ciaoitalyvillas.com/resources/document_agrrement/'.$temp_name);
					/*	$img = Yii::app()->simpleImage->load('../resources/document_agrrement/'.$temp_name);
						$img->resize(64,64);
						$img->save('../resources/document_agrrement/th_'.$temp_name);
						if(Yii::app()->s3->putObjectFile('../resources/document_agrrement/'.$temp_name, "tt-prop-photos", 'peoples/fullsize/'.$temp_name, S3::ACL_PUBLIC_READ))
						{
							Yii::app()->s3->putObjectFile('../resources/document_agrrement/th_'.$temp_name, "tt-prop-photos", 'peoples/thumb/'.$temp_name, S3::ACL_PUBLIC_READ);
						}*/
						
						//unlink('../resources/'.$temp_name);
						//unlink('../resources/th_'.$temp_name);
					}
					if($exist!='')
					{
					
					}
				}  
				
				//Start to save the Page Block
				
			 
        
               $model->attributes=$_POST['Docagrrement'];
				 $model->doc_name= $_POST['Docagrrement']['doc_name'];
				  $model->people_type= $_POST['Docagrrement']['people_type'];
				   $model->description= $_POST['Docagrrement']['description'];
				   // $model->attachment_file= $_POST['Docagrrement']['attachment_file'];
				  
                	if($model->save()){           
                    
                    //Start to save the Page Block
                    user()->setFlash('success',t('Document agreement information has been updated Successfully!'));                                                            
                    $model=new Groupcreation;
                    Yii::app()->controller->redirect(array('admin'));
                } 
        }                
        $this->render('cmswidgets.views.docagrrement.docagrrement_form_widget',array('model'=>$model));            
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
