<?php

/**
 * This is the model class for table "tt_type".
 *
 * The followings are the available columns in table 'tt_type':
 * @property string $id
 * @property string $uid
 * @property string $name
 * @property string $content
 * @property integer $rating_scores
 * @property string $guid
 * @property integer $lang
 * @property integer $comment_status
 * @property string $comment_count
 * @property integer $status
 * @property integer $addtohome
 * @property integer $modified
 * @property integer $created
 * @property integer $crby
 */
class TtType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TtType the static model class
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
		return 'tt_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid', 'required'),
			array('rating_scores, lang, comment_status, status, addtohome, modified, created, crby', 'numerical', 'integerOnly'=>true),
			array('uid, name, guid', 'length', 'max'=>255),
			array('comment_count', 'length', 'max'=>20),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, name, content, rating_scores, guid, lang, comment_status, comment_count, status, addtohome, modified, created, crby', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'name' => 'Name',
			'content' => 'Content',
			'rating_scores' => 'Rating Scores',
			'guid' => 'Guid',
			'lang' => 'Lang',
			'comment_status' => 'Comment Status',
			'comment_count' => 'Comment Count',
			'status' => 'Status',
			'addtohome' => 'Addtohome',
			'modified' => 'Modified',
			'created' => 'Created',
			'crby' => 'Crby',
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
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('rating_scores',$this->rating_scores);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('lang',$this->lang);
		$criteria->compare('comment_status',$this->comment_status);
		$criteria->compare('comment_count',$this->comment_count,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('addtohome',$this->addtohome);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('created',$this->created);
		$criteria->compare('crby',$this->crby);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}