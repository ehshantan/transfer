<?php

/**
 * This is the model class for table "user_category_journal_field".
 *
 * The followings are the available columns in table 'user_category_journal_field':
 * @property string $id
 * @property string $user_category_journal_id
 * @property string $category_journal_field_id
 * @property integer $value
 *
 * The followings are the available model relations:
 * @property CategoryJournalField $categoryJournalField
 * @property UserCategoryJournal $userCategoryJournal
 */
class UserCategoryJournalField extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user_category_journal_field';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_category_journal_id, category_journal_field_id', 'required'),
            array('value', 'numerical', 'integerOnly' => true),
            array('user_category_journal_id, category_journal_field_id', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_category_journal_id, category_journal_field_id, value', 'safe', 'on' => 'search'),
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
            'categoryJournalField' => array(self::BELONGS_TO, 'CategoryJournalField', 'category_journal_field_id'),
            'userCategoryJournal' => array(self::BELONGS_TO, 'UserCategoryJournal', 'user_category_journal_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_category_journal_id' => 'User Category Journal',
            'category_journal_field_id' => 'Category Journal Field',
            'value' => 'Value',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_category_journal_id', $this->user_category_journal_id, true);
        $criteria->compare('category_journal_field_id', $this->category_journal_field_id, true);
        $criteria->compare('value', $this->value);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserCategoryJournalField the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
