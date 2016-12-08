<?php
class UserAgreementStatus extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{user_agreement_status}}';
	}

	public function rules()
	{
		return array(
			array('user_id,doc,sent_status,created,cr_by,cr_ip', 'required'),
			array('user_id,doc,sent_status,created,cr_by,cr_ip,received_status,modified,mod_by,mod_ip', 'safe'),
		);
	}

	public function relations()
	{
		 return array(
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