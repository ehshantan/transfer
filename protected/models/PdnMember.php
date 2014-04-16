<?php

/**
 * This is the model class for table "pdn_member".
 *
 * The followings are the available columns in table 'pdn_member':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $realname
 * @property string $angkatan
 * @property string $hall
 * @property string $lokasi
 * @property string $telepon
 * @property string $handphone
 * @property string $handphone_2
 * @property string $id_member
 * @property string $alamat
 * @property integer $is_approved
 * @property string $last_login
 * @property integer $jenis_kelamin
 * @property integer $tipe_member
 * @property integer $id_kelompok
 * @property string $type
 * @property string $tgl_masuk
 */
class PdnMember extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_member';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('is_approved, jenis_kelamin, tipe_member, id_kelompok', 'numerical', 'integerOnly' => true),
            array('email, password, realname, lokasi', 'length', 'max' => 100),
            array('angkatan, hall', 'length', 'max' => 10),
            array('telepon, handphone, handphone_2, id_member, type', 'length', 'max' => 20),
            array('alamat', 'length', 'max' => 200),
            array('last_login, tgl_masuk', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, email, password, realname, angkatan, hall, lokasi, telepon, handphone, handphone_2, id_member, alamat, is_approved, last_login, jenis_kelamin, tipe_member, id_kelompok, type, tgl_masuk',
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
            'email' => 'Email',
            'password' => 'Password',
            'realname' => 'Realname',
            'angkatan' => 'Angkatan',
            'hall' => 'Hall',
            'lokasi' => 'Lokasi',
            'telepon' => 'Telepon',
            'handphone' => 'Handphone',
            'handphone_2' => 'Handphone 2',
            'id_member' => 'Id Member',
            'alamat' => 'Alamat',
            'is_approved' => 'Is Approved',
            'last_login' => 'Last Login',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tipe_member' => 'Tipe Member',
            'id_kelompok' => 'Id Kelompok',
            'type' => 'Type',
            'tgl_masuk' => 'Tgl Masuk',
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('realname', $this->realname, true);
        $criteria->compare('angkatan', $this->angkatan, true);
        $criteria->compare('hall', $this->hall, true);
        $criteria->compare('lokasi', $this->lokasi, true);
        $criteria->compare('telepon', $this->telepon, true);
        $criteria->compare('handphone', $this->handphone, true);
        $criteria->compare('handphone_2', $this->handphone_2, true);
        $criteria->compare('id_member', $this->id_member, true);
        $criteria->compare('alamat', $this->alamat, true);
        $criteria->compare('is_approved', $this->is_approved);
        $criteria->compare('last_login', $this->last_login, true);
        $criteria->compare('jenis_kelamin', $this->jenis_kelamin);
        $criteria->compare('tipe_member', $this->tipe_member);
        $criteria->compare('id_kelompok', $this->id_kelompok);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('tgl_masuk', $this->tgl_masuk, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnMember the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
