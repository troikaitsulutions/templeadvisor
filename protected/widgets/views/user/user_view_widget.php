<?php

 $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'username',
		'email',
		'display_name',
		array('label'=>'Password','type'=>'raw','value'=>show_password($model->original_password)),
		'fbuid',
		'twitteruid',
		'gender',
		'location',
		'bio',
		array('label'=>'Birthday','type'=>'raw','value'=>$model->birthday_day.'&nbsp;'.$model->birthday_month.'&nbsp;'.$model->birthday_year),
		'login_ip',
		 array(
		'name'=>'status',
			'type'=>'image',
			'value'=>User::convertUserState($model),
		    ),
		array(
		'name'=>'avatar',
			'type'=>'raw',
			'value'=>User::avatar($model),
		    ),
		 array(
		'name'=>'created_time',
			'type'=>'raw',
			'value'=>date("Y-m-d H:i:s", $model->created_time),
		    ),
		 array(
		'name'=>'updated_time',
			'type'=>'raw',
			'value'=>date("Y-m-d H:i:s", $model->updated_time),
		    ),
		 array(
		'name'=>'recent_login',
			'type'=>'raw',
			'value'=>date("Y-m-d H:i:s", $model->recent_login),
		    ),
	),
));

function show_password($original_password)
{
	$user = User::model()->find(array('condition'=>"username='".Yii::app()->user->name."'"));
	$people_type = $user->people_type;
	
	$data = Category::model()->findAll(array('condition'=>"id='$people_type'"));
	
	foreach($data as $value)
	{
		$r_data = $value->name;
	}
	if($r_data=="Administrator") { return $original_password; } else { return '********'; }
}
 ?>
