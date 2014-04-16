<?php

/**
 * This is the model class for table "pdn_pon_message".
 *
 * The followings are the available columns in table 'pdn_pon_message':
 * @property integer $id
 * @property integer $pon_header_id
 * @property string $tanggal
 * @property integer $member_id
 * @property string $title
 * @property string $content_message
 * @property integer $is_approved
 */
class PdnPonMessage extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_pon_message';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pon_header_id, member_id, is_approved', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            array('tanggal, content_message', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, pon_header_id, tanggal, member_id, title, content_message, is_approved',
                'safe',
                'on' => 'search'
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'pon_header_id' => 'Pon Header',
            'tanggal' => 'Tanggal',
            'member_id' => 'Member',
            'title' => 'Title',
            'content_message' => 'Content Message',
            'is_approved' => 'Is Approved',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('pon_header_id', $this->pon_header_id);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('content_message', $this->content_message, true);
        $criteria->compare('is_approved', $this->is_approved);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnPonMessage the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
