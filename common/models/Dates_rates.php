<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property string $page_id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $parent
 * @property string $layout
 * @property string $slug
 * @property integer $lang
 */
class Dates_rates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{dates_rates}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('season_id, from_date, to_date', 'required'),
			array('season_id, people', 'numerical', 'integerOnly'=>true),   
			array('price_week, price_day', 'type', 'type'=>'float'),                     
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, people,price_week, price_day', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		 return array(                    
                    'language' => array(self::BELONGS_TO, 'Language', 'lang'),
                ); 
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => t('ID'),
			'season_id' => t('Season'),
			'people' => t('Number of People'),
			'price_week' => t('Rates per week(Net)'),
			'price_day' => t('Rates per Night(Net)'),
			'from_date' => t('From'),
			'to_date' => t('To')
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('name',$this->name,true);
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'season_id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
	}
	
	public function searchByobject($sid)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		//$criteria->compare('id',$this->id,true);
		//$criteria->compare('name',$this->name,true);
		$criteria->condition = '`status` = 1 and `season_id` ='.$sid;
                
                $sort = new CSort;
                $sort->attributes = array(
                        'id',
                );
                $sort->defaultOrder = 'season_id DESC';
                

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort
		));
	}
	
	public function season_detail($season_id)
	{
	$criteria=new CDbCriteria;
	/*$criteria->select="t.from_date as from_date,t.to_date as to_date,a.people as status,a.price_week as created,a.price_day as crby,a.id as modified,t.id as mod_ip";
	$criteria->join="join tt_rate a on a.season_id=t.season_id ";*/
	$criteria->condition="season_id='".$season_id."'";
	//$criteria->group="a.season_id";
	//$page_count=count($criteria);
	$page_count = Dates_rates::model()->count($criteria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>array('pageSize'=>$page_count),
                        
		));
	
	
	}
	
}