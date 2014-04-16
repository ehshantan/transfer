<?php

/**
 * This is the model class for table "pdn_email_sent".
 *
 * The followings are the available columns in table 'pdn_email_sent':
 * @property integer $id
 * @property integer $member_id
 * @property integer $pon_detail_id
 * @property string $field_name
 * @property string $tanggal_kirim
 */
class PdnEmailSent extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_email_sent';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('member_id, pon_detail_id', 'numerical', 'integerOnly' => true),
            array('field_name', 'length', 'max' => 100),
            array('tanggal_kirim', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, member_id, pon_detail_id, field_name, tanggal_kirim', 'safe', 'on' => 'search'),
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
            'member_id' => 'Member',
            'pon_detail_id' => 'Pon Detail',
            'field_name' => 'Field Name',
            'tanggal_kirim' => 'Tanggal Kirim',
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
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('pon_detail_id', $this->pon_detail_id);
        $criteria->compare('field_name', $this->field_name, true);
        $criteria->compare('tanggal_kirim', $this->tanggal_kirim, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnEmailSent the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
