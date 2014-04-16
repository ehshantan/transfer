<?php

/**
 * This is the model class for table "user_category_journal".
 *
 * The followings are the available columns in table 'user_category_journal':
 * @property string $id
 * @property string $user_id
 * @property string $category_journal_id
 * @property string $date
 * @property integer $checked
 * @property integer $notified
 *
 * The followings are the available model relations:
 * @property User $user
 * @property CategoryJournal $categoryJournal
 * @property UserCategoryJournalField[] $userCategoryJournalFields
 */
class UserCategoryJournal extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user_category_journal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, category_journal_id, date', 'required'),
            array('checked, notified', 'numerical', 'integerOnly' => true),
            array('user_id, category_journal_id', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, category_journal_id, date, checked, notified', 'safe', 'on' => 'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'categoryJournal' => array(self::BELONGS_TO, 'CategoryJournal', 'category_journal_id'),
            'userCategoryJournalFields' => array(
                self::HAS_MANY,
                'UserCategoryJournalField',
                'user_category_journal_id'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'category_journal_id' => 'Category Journal',
            'date' => 'Date',
            'checked' => 'Checked',
            'notified' => 'Notified',
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
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('category_journal_id', $this->category_journal_id, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('checked', $this->checked);
        $criteria->compare('notified', $this->notified);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UserCategoryJournal the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
