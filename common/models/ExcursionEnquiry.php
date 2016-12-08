<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ExcursionEnquiry extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{excursionenquiry}}';
	}
	

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('excursion_id, first_name, last_name, email, reenter_email, phonenumber1, verifyCode', 'required'),
			array('cc2, cc1', 'numerical', 'integerOnly'=>true),
			array('email', 'email'),
			array('reenter_email', 'email'),
			array('reenter_email', 'compare', 'compareAttribute'=>'email'),
			array('id, phonenumber2, ccode2, ccode1, relavant_details, foodwine1, foodwine2, cr_ip, created','safe'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}
	public function attributeLabels()
        {
		
                return array(
					    'verifyCode'=>t('Verification Code'),
						'first_name'=>t('First Name'),
						'last_name'=>t('Last Name'),
						'email'=>t('Email'),
						'ccode1' => t('Country Code'),
						'ccode2' => t('Country Code'),
						'email1'=>t('Re-enter Email'),
						'phonenumber1'=>t('Phone Number 1'), 
						'phonenumber2'=>t('Phone Number 2'), 
						'relavant_details'=>t('Relevent Details'),
						'foodwine1'=>t('Food & Wine excursions'),
						'foodwine2'=>t('Cultural & Sightseeing')
						
						);
        }

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */

}