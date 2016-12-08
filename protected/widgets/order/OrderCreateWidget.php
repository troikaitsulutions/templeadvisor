<?php

/**
 * This is the Widget for Creating new Page 
 * 
 
 * @package  cmswidgets.page
 *
 */
class OrderCreateWidget extends CWidget
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
        $model = new Order;
		$order = new Order;

        $this->performAjaxValidation(array($model, $order));
       	echo "Test";
        
		if(isset($_POST['Order']))
        {
                
				echo "Test";
				$Temples = Temples::model()->findAll(); 
					if ( isset($Temples) && count($Temples)>0 ) {
						foreach ( $Temples as $Temple) {
							
				$order_exist = Order::model()->find(array( 'condition'=>'prop_id = :PID', 'params'=>array(':PID'=>$Temple->id)));
							
				if ( isset($order_exist) && count($order_exist)>0 ) { 
							$order =  GxcHelpers::loadDetailModel('Order', $order_exist->id);
				} else { $order = new Order; }
				
				$current_time=time();				
				$order->created = $order->modified = $current_time;
				$order->cr_ip = $order->mod_ip = ip();
				$order->crby = $order->mod_by = Yii::app()->user->getId();
				
				$order->prop_id = $Temple->id;
				$order->region_order = 3;//$_POST['region_'.$Temple->id];
				$order->state_order = 2;//$_POST['state_'.$Temple->id];
				$order->district_order = 1;//$_POST['district_'.$Temple->id];
				$order->name = $Temple->name;
				
				  $valid=$order->validate();
				   if($valid) { $order->save(); }           
                    
						} 	 }
				 user()->setFlash('success',t('Order Added Successfully!'));                                                            
                 $model=new Order;
                 Yii::app()->controller->redirect(array('admin'));
				
        }     
		           
        $this->render('cmswidgets.views.order.order_form_widget',array('model'=>$model, 'order'=>$order));            
    }   
	
	protected function performAjaxValidation($models)
	{
    	if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
        {
                echo CActiveForm::validate($models);
                Yii::app()->end();
        }
	}
}
