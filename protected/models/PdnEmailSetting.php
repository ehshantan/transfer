<?php

/**
 * This is the model class for table "pdn_email_setting".
 *
 * The followings are the available columns in table 'pdn_email_setting':
 * @property integer $id
 * @property string $pg_subject
 * @property string $pg_message
 * @property string $ktb_subject
 * @property string $ktb_message
 * @property string $doa_subject
 * @property string $doa_message
 * @property string $rohani_subject
 * @property string $rohani_message
 * @property string $sidang_subject
 * @property string $sidang_message
 * @property string $jenguk_subject
 * @property string $jenguk_message
 * @property string $pengumuman_subject
 * @property string $pengumuman_message
 * @property string $pengumuman_file
 * @property string $tugas_subject
 * @property string $tugas_message
 * @property string $tugas_file
 * @property string $email_cc
 */
class PdnEmailSetting extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_email_setting';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'pg_subject, ktb_subject, doa_subject, rohani_subject, sidang_subject, jenguk_subject, pengumuman_subject, pengumuman_file, tugas_subject, tugas_file',
                'length',
                'max' => 300
            ),
            array(
                'pg_message, ktb_message, doa_message, rohani_message, sidang_message, jenguk_message, pengumuman_message, tugas_message, email_cc',
                'safe'
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, pg_subject, pg_message, ktb_subject, ktb_message, doa_subject, doa_message, rohani_subject, rohani_message, sidang_subject, sidang_message, jenguk_subject, jenguk_message, pengumuman_subject, pengumuman_message, pengumuman_file, tugas_subject, tugas_message, tugas_file, email_cc',
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
            'pg_subject' => 'Pg Subject',
            'pg_message' => 'Pg Message',
            'ktb_subject' => 'Ktb Subject',
            'ktb_message' => 'Ktb Message',
            'doa_subject' => 'Doa Subject',
            'doa_message' => 'Doa Message',
            'rohani_subject' => 'Rohani Subject',
            'rohani_message' => 'Rohani Message',
            'sidang_subject' => 'Sidang Subject',
            'sidang_message' => 'Sidang Message',
            'jenguk_subject' => 'Jenguk Subject',
            'jenguk_message' => 'Jenguk Message',
            'pengumuman_subject' => 'Pengumuman Subject',
            'pengumuman_message' => 'Pengumuman Message',
            'pengumuman_file' => 'Pengumuman File',
            'tugas_subject' => 'Tugas Subject',
            'tugas_message' => 'Tugas Message',
            'tugas_file' => 'Tugas File',
            'email_cc' => 'Email Cc',
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
        $criteria->compare('pg_subject', $this->pg_subject, true);
        $criteria->compare('pg_message', $this->pg_message, true);
        $criteria->compare('ktb_subject', $this->ktb_subject, true);
        $criteria->compare('ktb_message', $this->ktb_message, true);
        $criteria->compare('doa_subject', $this->doa_subject, true);
        $criteria->compare('doa_message', $this->doa_message, true);
        $criteria->compare('rohani_subject', $this->rohani_subject, true);
        $criteria->compare('rohani_message', $this->rohani_message, true);
        $criteria->compare('sidang_subject', $this->sidang_subject, true);
        $criteria->compare('sidang_message', $this->sidang_message, true);
        $criteria->compare('jenguk_subject', $this->jenguk_subject, true);
        $criteria->compare('jenguk_message', $this->jenguk_message, true);
        $criteria->compare('pengumuman_subject', $this->pengumuman_subject, true);
        $criteria->compare('pengumuman_message', $this->pengumuman_message, true);
        $criteria->compare('pengumuman_file', $this->pengumuman_file, true);
        $criteria->compare('tugas_subject', $this->tugas_subject, true);
        $criteria->compare('tugas_message', $this->tugas_message, true);
        $criteria->compare('tugas_file', $this->tugas_file, true);
        $criteria->compare('email_cc', $this->email_cc, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnEmailSetting the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
