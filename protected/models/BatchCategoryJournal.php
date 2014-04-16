<?php

/**
 * This is the model class for table "batch_category_journal".
 *
 * The followings are the available columns in table 'batch_category_journal':
 * @property string $id
 * @property string $batch_id
 * @property string $category_journal_id
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Batch $batch
 * @property CategoryJournal $categoryJournal
 */
class BatchCategoryJournal extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'batch_category_journal';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('batch_id, category_journal_id', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('batch_id, category_journal_id', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, batch_id, category_journal_id, active', 'safe', 'on' => 'search'),
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
            'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
            'categoryJournal' => array(self::BELONGS_TO, 'CategoryJournal', 'category_journal_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'batch_id' => 'Batch',
            'category_journal_id' => 'Category Journal',
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
        $criteria->compare('batch_id', $this->batch_id, true);
        $criteria->compare('category_journal_id', $this->category_journal_id, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BatchCategoryJournal the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
