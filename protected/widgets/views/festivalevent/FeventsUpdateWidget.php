<?php

/**
 * This is the Widget for Updating a Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class FeventsUpdateWidget extends CWidget
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
        $model=  GxcHelpers::loadDetailModel('Festivalevent', $id);
            
      

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='fevents-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }
       
        // collect user input data
        if(isset($_POST['Festivalevent']))
        {
                
                $model->attributes=$_POST['Festivalevent'];    
				$current_time=time();
                $model->modified = $current_time;    
				$model->mod_ip = ip();    
				$model->mod_by = Yii::app()->user->getId();  
				$model->fdate=strtotime($model->fdate);
				
				if (is_array($model->temples)) {
						$model->temples = implode("|",$model->temples);
				} 
				
				if (is_array($model->religion)) {
						$model->religion = implode("|",$model->religion);
				}
				
				if (is_array($model->deity)) {
						$model->deity = implode("|",$model->deity);
				} 
				
                if($model->save()){           
                    //Start to save the Page Block
                    user()->setFlash('success',t('Update Festivals/Events Successfully!'));  
					Yii::app()->controller->redirect(array('admin'));                                                                            
                }
        }
		
		if(isset($model->temples) && $model->temples!=='')
					$model->temples=explode('|',$model->temples);
				
		if(isset($model->religion) && $model->religion!=='')
                $model->religion=explode('|',$model->religion);
			
		if(isset($model->deity) && $model->deity!=='')
                $model->deity=explode('|',$model->deity);
		
		$model->fdate=date('d-m-Y',$model->fdate);
		
        $this->render('cmswidgets.views.festivalevent.fevents_form_widget',array('model'=>$model));            

    }   
}
