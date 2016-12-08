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
class Festivalevent extends CActiveRecord
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
		return '{{festival}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, fdate, religion, deity', 'required'),
			array('status, crby, mod_by, created, modified, fdate', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'min'=>5),
			array('cr_ip, mod_ip, religion, deity, temples','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, fdate', 'safe', 'on'=>'search'),
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
			'id' => t('Page'),
			'fdate' => t('Festival Date'),
			'name' => t('Event Name'),
			'content' => t('About Festival'),
			'addtohome' => t('Add this page link on home page'),
            'status' => t('Status'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
                
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
        
       
        
        protected function afterDelete()
        {
             Seo::model()->deleteAll('uid = :id',array(':id'=>$this->uid)); 	
        }
        
         public static function getParentPages($render=true,$page_id=null){                        
                if($page_id!==null){
                    $pages=Page::model()->findAll('status = :status and id <> :pid',array(':status'=>  ConstantDefine::PAGE_ACTIVE,':pid'=>$page_id));                
                }
                else {
                    $pages=Page::model()->findAll('status = :status',array(':status'=>  ConstantDefine::PAGE_ACTIVE));                
                }
                
                $data=array(0=>t("None"));      
                
                
                if($pages && count($pages) > 0 ){
                    $data=CMap::mergeArray($data,CHtml::listData($pages,'id','name'));                        
                    
                }                
                if($render){
                    foreach($data as $value=>$name)
                    {
                        echo CHtml::tag('option',
                                   array('value'=>$value),CHtml::encode($name),true);
                    }
                } else {
                    return $data;
                }
        }
        
        
        public static function getPageName($id){
            if($id){
                $page=Page::model()->findByPk($id);
                if($page){
                    return CHtml::encode($page->name);
                } else{
                    return '';
                }
            } else {
                return '';
            }
        }
		
		public static function getPageNameByGuid($id){
            if($id){
                $page=self::model()->find(array(
                'condition'=>'guid=:paramId',
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
		
		public static function GetPageNameByGuidWithLang($id){
            if($id){
                $page=self::model()->find(array(
                'condition'=>'guid=:paramId',
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
		
		public static function GetPage(){
            $pages=self::model()->with('language')->findAll();                        
            $data=array(0=>t("None"));
            if($pages && count($pages) > 0 ){
               foreach($pages as $t){
                    $data[$t->page_id]=$t->name.' - '.$t->language->lang_desc ;
                }
            }
            
            return $data;
        }
        
       
        
}