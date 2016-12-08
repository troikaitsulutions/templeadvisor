<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class FeventsCreateWidget extends CWidget
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
        $model = new Festivalevent;
                        
        
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
				$model->created = $current_time;
				$model->cr_ip = ip();
				
				
				$model->fdate = strtotime($model->fdate);
				
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
                    user()->setFlash('success',t('The Festivals/Events has been Added Successfully!'));  
                    $model=new Festivalevent;
                  //  Yii::app()->controller->redirect(array('admin'));
                }
				
				if(isset($model->temples) && $model->temples!=='')
					$model->temples=explode('|',$model->temples);
				
				if(isset($model->religion) && $model->religion!=='')
					$model->religion=explode('|',$model->religion);
			
				if(isset($model->deity) && $model->deity!=='')
					$model->deity=explode('|',$model->deity);
        }    
		            
        $this->render('cmswidgets.views.festivalevent.fevents_form_widget',array('model'=>$model));
    }   
}
