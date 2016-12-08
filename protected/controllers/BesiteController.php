<?php
/**
 * Backend Site Controller.
 * 
 
 * @package backend.controllers
 *
 */
class BesiteController extends BeController
{
    
	public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            'page'=>array(
                'class'=>'CViewAction',
            ),
            'coco'=>array(
                'class'=>'CocoAction',
            ),
        );
    }
	
    public function __construct($id,$module=null)
	{
		 parent::__construct($id,$module);
                 $this->menu=array(
                       /* array('label'=>t('All Villas'), 'url'=>array('bepinfo/admin'),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),
                        array('label'=>t('Bookings'), 'url'=>array('bebooking/reserve'),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),
                        array('label'=>t('Owners'), 'url'=>array('bevillaowner/admin'),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),
                        array('label'=>t('Contacts'), 'url'=>array(''),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),
                        array('label'=>t('Search Calendars'), 'url'=>array('bebooking/availability'),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),
                        array('label'=>t('Reports'), 'url'=>array(''),'linkOptions'=>array('class'=>'btn btn-mini'),'visible'=>(user()->isAdmin)?true:false),*/
                );
		 
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
					
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'				
		$this->render('index');
               
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

	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new UserLoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                   
		// collect user input data
		if(isset($_POST['UserLoginForm']))
		{
                       
			$model->attributes=$_POST['UserLoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				//$this->redirect(Yii::app()->user->returnUrl);
				$this->redirect(FRONT_SITE_URL.'besite/index');
			}
		}
                 
		// display the login form
                $this->layout='login';
		$this->render('login',array('model'=>$model));
	}
	public function actionCheckloginstatus()
	{
		 $curent_user= $_GET['curent_user'];
		 $user=UserSession::model()->find(array('condition'=>"user_id='".$curent_user."'"));
		 if($user->user_id=="")
		 {
		 	 $model= new UserSession;
			 $date=date('Y-m-d H:i:s');
			 $acd_update = "insert into tt_session_updation(user_id,user_time) values('$curent_user','$date') ";
			 $commandacd  = Yii::app()->db->createCommand($acd_update);
			 $commandacd->execute();
		 
		 }
		 else
		 { 
		 	 $date=date('Y-m-d H:i:s');
			 $acd_update = "update tt_session_updation set user_time='$date' where user_id='$curent_user' ";
			 $commandacd  = Yii::app()->db->createCommand($acd_update);
			 $commandacd->execute();
	
		 }
		 $liveuser=User::model()->find(array('select'=>'group_concat(user_id) as user_id','condition'=>"login_status='1'"));
		 $liveuser->user_id;
		 $usertime=UserSession::model()->find(array('select'=>'group_concat(user_time) as user_time,group_concat(user_id) as user_id','condition'=>"user_id in(".$liveuser->user_id.")"));
		 $time_array=explode(',',$usertime->user_time);
		 $user_array=explode(',',$usertime->user_id);
		 $i=0;
		 foreach($time_array as $time_value)
		 {
			$cdate=date('Y-m-d H:i:s');
		    $user_str_value=strtotime($time_value);
		    $date2 = strtotime($cdate);
		    $subTime = $date2 - $user_str_value;
		    $m = ($subTime/60)%60;
	
		    if($m>='2')
		    {
				 $acd_update1 = "update  tt_user set login_status='0' where user_id='".$user_array[$i]."' ";
				 $commandacd1 = Yii::app()->db->createCommand($acd_update1);
				 $commandacd1->execute();
				 $LoginHistory = LoginHistory::model()->find(array('condition'=>"user_id='".$user_array[$i]."'",'order'=>'id desc','limit'=>1));
				 if($LoginHistory)
				 {
					 $LoginHistory->logout_time = date('Y-m-d H:i:s');
					 $LoginHistory->save();
				 }
		    }
		    $i++;
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		$user = User::model()->find(array('condition'=>"username='".Yii::app()->user->name."'"));
		if($user)
		{
			$user->login_status=0;
        	$user->save();
			
			$LoginHistory = LoginHistory::model()->find(array('condition'=>"user_id='$user->user_id'",'order'=>'id desc','limit'=>1));
			if($LoginHistory)
			{
				$LoginHistory->logout_time = date('Y-m-d H:i:s');
				$LoginHistory->save();
			}
		}
		Yii::app()->user->logout();
		$this->redirect(FRONT_SITE_URL.'besite/login');
	}
	
	
	

}