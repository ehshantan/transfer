<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $name
 * @property string $batch_id
 * @property string $birthdate
 * @property string $birthplace
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $phone
 * @property string $handphone
 * @property string $hall
 * @property string $group_id
 * @property string $roles
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Group $group
 * @property Batch $batch
 * @property UserCategoryJournal[] $userCategoryJournals
 */
class User extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, batch_id, email, password, group_id, roles', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('name, email', 'length', 'max' => 100),
            array('batch_id, group_id', 'length', 'max' => 20),
            array('birthplace, phone, handphone, hall', 'length', 'max' => 50),
            array('password', 'length', 'max' => 255),
            array('birthdate, address', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, name, batch_id, birthdate, birthplace, email, password, address, phone, handphone, hall, group_id, roles, active',
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
            'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
            'batch' => array(self::BELONGS_TO, 'Batch', 'batch_id'),
            'userCategoryJournals' => array(self::HAS_MANY, 'UserCategoryJournal', 'user_id'),
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
            'batch_id' => 'Batch',
            'birthdate' => 'Birthdate',
            'birthplace' => 'Birthplace',
            'email' => 'Email',
            'password' => 'Password',
            'address' => 'Address',
            'phone' => 'Phone',
            'handphone' => 'Handphone',
            'hall' => 'Hall',
            'group_id' => 'Group',
            'roles' => 'Roles',
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
        $criteria->compare('batch_id', $this->batch_id, true);
        $criteria->compare('birthdate', $this->birthdate, true);
        $criteria->compare('birthplace', $this->birthplace, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('handphone', $this->handphone, true);
        $criteria->compare('hall', $this->hall, true);
        $criteria->compare('group_id', $this->group_id, true);
        $criteria->compare('roles', $this->roles, true);
        $criteria->compare('active', $this->active);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
