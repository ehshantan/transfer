<?php

/**
 * This is the model class for table "pdn_jawaban_tugas".
 *
 * The followings are the available columns in table 'pdn_jawaban_tugas':
 * @property integer $kode_member
 * @property integer $kode_tugas
 * @property integer $kode_soal
 * @property string $kode_pilihan
 * @property integer $status
 */
class PdnJawabanTugas extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_jawaban_tugas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kode_member', 'required'),
            array('kode_member, kode_tugas, kode_soal, status', 'numerical', 'integerOnly' => true),
            array('kode_pilihan', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('kode_member, kode_tugas, kode_soal, kode_pilihan, status', 'safe', 'on' => 'search'),
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
            'kode_member' => 'Kode Member',
            'kode_tugas' => 'Kode Tugas',
            'kode_soal' => 'Kode Soal',
            'kode_pilihan' => 'Kode Pilihan',
            'status' => 'Status',
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

        $criteria->compare('kode_member', $this->kode_member);
        $criteria->compare('kode_tugas', $this->kode_tugas);
        $criteria->compare('kode_soal', $this->kode_soal);
        $criteria->compare('kode_pilihan', $this->kode_pilihan, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnJawabanTugas the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
