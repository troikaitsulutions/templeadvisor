<?php

/**
 * This is the model class for table "tt_amenities".
 *
 * The followings are the available columns in table 'tt_amenities':
 * @property string $id
 * @property string $uid
 * @property string $name
 * @property string $content
 * @property integer $source
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
 * @property integer $mod_by
 * @property string $cr_ip
 * @property string $mod_ip
 */
class TtAmenities extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TtAmenities the static model class
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
		return 'tt_amenities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, crby, mod_by, cr_ip, mod_ip', 'required'),
			array('source, rating_scores, lang, comment_status, status, addtohome, modified, created, crby, mod_by', 'numerical', 'integerOnly'=>true),
			array('uid, name, guid', 'length', 'max'=>255),
			array('comment_count', 'length', 'max'=>20),
			array('cr_ip, mod_ip', 'length', 'max'=>50),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, name, content, source, rating_scores, guid, lang, comment_status, comment_count, status, addtohome, modified, created, crby, mod_by, cr_ip, mod_ip', 'safe', 'on'=>'search'),
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
			'source' => 'Source',
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
			'mod_by' => 'Mod By',
			'cr_ip' => 'Cr Ip',
			'mod_ip' => 'Mod Ip',
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
		$criteria->compare('source',$this->source);
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
		$criteria->compare('mod_by',$this->mod_by);
		$criteria->compare('cr_ip',$this->cr_ip,true);
		$criteria->compare('mod_ip',$this->mod_ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}