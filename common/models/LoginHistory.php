<?php
class LoginHistory extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{login_history}}';
	}

	public function rules()
	{
		return array(
			array('user_id,login_time,os,browser,ip', 'required'),
			array('user_id,login_time,logout_time,os,browser,ip', 'safe'),
		);
	}

	public function relations()
	{
		 return array(
			'User' => array(self::HAS_ONE, 'User', '', 'on'=>'User.user_id = t.user_id'),
                ); 
	}

	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
		$sort->attributes = array(
				'id',
		);
		$sort->defaultOrder = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
	}
} ?>