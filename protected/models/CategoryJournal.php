<?php

/**
 * This is the model class for table "category_journal".
 *
 * The followings are the available columns in table 'category_journal':
 * @property string $id
 * @property string $name
 * @property string $reminder
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property BatchCategoryJournal[] $batchCategoryJournals
 * @property CategoryJournalField[] $categoryJournalFields
 * @property UserCategoryJournal[] $userCategoryJournals
 */
class CategoryJournal extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category_journal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('reminder', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, reminder, active', 'safe', 'on' => 'search'),
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
            'batchCategoryJournals' => array(self::HAS_MANY, 'BatchCategoryJournal', 'category_journal_id'),
            'categoryJournalFields' => array(self::HAS_MANY, 'CategoryJournalField', 'category_journal_id'),
            'userCategoryJournals' => array(self::HAS_MANY, 'UserCategoryJournal', 'category_journal_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'reminder' => 'Reminder',
            'active' => 'Active',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('reminder', $this->reminder, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CategoryJournal the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
