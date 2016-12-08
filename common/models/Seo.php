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
class Seo extends CActiveRecord
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
		return '{{seo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		
		
		
		return array(
			array('created,  allow_follow, allow_index, slug, layout', 'required'),
			array('id, crby, mod_by, created, modified, allow_follow, allow_index', 'numerical', 'integerOnly'=>true),
			array('mainmenu, breadcrumbs, uid, cr_ip, mod_ip', 'length', 'max'=>255),
			array('slug', 'myunique'),
			array('slug, title, description, keywords, googlecode, bingcode, metaelse', 'length', 'max'=>1000),
			array('h1', 'length', 'max'=>72),
			array('h2', 'length', 'max'=>100),
			array('h3', 'length', 'max'=>500),
			array('id, slug', 'safe', 'on'=>'search'),
		);
	}
	
	
	public function myunique($attribute_name, $params)
	{
		$meta = Seo::model()->find(array('condition'=>'slug = :SLG AND layout = :LYT','params'=>array(':SLG'=>$this->slug, ':LYT'=>$this->layout)));
	
		if ( isset($meta) && count($meta)>0 && ($meta->id != $this->id) )  
			{
			$this->addError($attribute_name, Yii::t('user', 'URL Already Taken'));
			return false;
			}
		return true;
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
			'allow_follow' => t('Allow Google to follow'),
			'allow_index' => t('Allow Google to index'),
			'slug' => t('URL'),
			'mainmenu' => t('Menu Label'),
			'breadcrumbs' => t('BreadCrumbs'),
			'title' => t('META Title'),
			'description' => t('META Description'),
			'keywords' => t('META Keywords'),
			'h3' => t('H3-Brief Description'),
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('title',$this->title,true);
		        
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
	
	public static function GetPageNameByUid($id){
            if($id){
                $page=self::model()->find(array(
                'condition'=>'uid=:paramId',
                'params'=>array(':paramId'=>$id)));
                if($page){
                    return $page;
                } else{
                    return '';
                }
            } else {
                return '';
            }
        }
		
	public static function GetPageSeo($uid){
            if($uid){
                $page=self::model()->find(array(
                'condition'=>'uid=:paramId',
                'params'=>array(':paramId'=>$uid)));
                if($page){
                    return $page;
                } else{
                    return '';
                }
            } else {
                return '';
            }
        }
        
      
        
      
        
       
        
}