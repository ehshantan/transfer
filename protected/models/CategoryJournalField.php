<?php

/**
 * This is the model class for table "category_journal_field".
 *
 * The followings are the available columns in table 'category_journal_field':
 * @property string $id
 * @property string $category_journal_id
 * @property string $name
 * @property string $postfix
 * @property string $category_journal_field_type_id
 * @property integer $value
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property CategoryJournalFieldType $categoryJournalFieldType
 * @property CategoryJournal $categoryJournal
 * @property UserCategoryJournalField[] $userCategoryJournalFields
 */
class CategoryJournalField extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category_journal_field';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_journal_id, name, postfix, category_journal_field_type_id', 'required'),
            array('value, active', 'numerical', 'integerOnly' => true),
            array('category_journal_id, category_journal_field_type_id', 'length', 'max' => 20),
            array('name, postfix', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, category_journal_id, name, postfix, category_journal_field_type_id, value, active',
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
        return array(
            'categoryJournalFieldType' => array(
                self::BELONGS_TO,
                'CategoryJournalFieldType',
                'category_journal_field_type_id'
            ),
            'categoryJournal' => array(self::BELONGS_TO, 'CategoryJournal', 'category_journal_id'),
            'userCategoryJournalFields' => array(
                self::HAS_MANY,
                'UserCategoryJournalField',
                'category_journal_field_id'
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
            'category_journal_id' => 'Category Journal',
            'name' => 'Name',
            'postfix' => 'Postfix',
            'category_journal_field_type_id' => 'Category Journal Field Type',
            'value' => 'Value',
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
        $criteria->compare('category_journal_id', $this->category_journal_id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('postfix', $this->postfix, true);
        $criteria->compare('category_journal_field_type_id', $this->category_journal_field_type_id, true);
        $criteria->compare('value', $this->value);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CategoryJournalField the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
