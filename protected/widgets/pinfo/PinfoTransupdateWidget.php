<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class PinfoTransupdateWidget extends CWidget
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
	   $translate_id=isset($_GET['id']) ? (int)$_GET['id'] : 0;
       $model=  GxcHelpers::loadDetailModel('Translate', $translate_id);
	   
	   $mseo=Seo::model()->find(array(
                'condition'=>'uid=:obj',
                'params'=>array(':obj'=>$model->uid)
            ));
		
        $this->performAjaxValidation(array( $model, $mseo ));
        if(isset($_POST['Translate']))
        {
                
				
			$model->attributes=$_POST['Translate'];   
	 		$mseo->attributes=$_POST['Seo'];
				
			$current_time=time();
			$pinfo_id = isset($_GET['id']) ? strtolower(trim($_GET['id'])) : ''; 
			$lang_id = isset($_GET['language']) ? strtolower(trim($_GET['language'])) : ''; 
			 
			//$model->prop_id = $pinfo_id;
			//$model->lang = $lang_id; 
			$mseo->mod_by = $model->mod_by = Yii::app()->user->getId(); 
			$mseo->modified = $model->modified = $current_time;
			
			$mseo->mod_ip = $model->mod_ip = ip();
			$mseo->layout = 'prop';
				
				 $valid=$model->validate();
      			 $valid=$mseo->validate() && $valid;
				
                if($valid)
        	    {
					if($model->save() && $mseo->save())
					{            
					   
						//Start to save the Page Block
						user()->setFlash('success',t('Update Property Successfully!')); 
						$model=new Pinfo;
						Yii::app()->controller->redirect(array('admin'));                                                                               
					}
				}
        }        
 $this->render('cmswidgets.views.pinfo.pinfo_trans_widget',array('model'=>$model,'mseo'=>$mseo));
}   
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='trans-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}    
}
