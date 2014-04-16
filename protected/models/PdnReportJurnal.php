<?php

/**
 * This is the model class for table "pdn_report_jurnal".
 *
 * The followings are the available columns in table 'pdn_report_jurnal':
 * @property integer $pon_detail_id
 * @property integer $pon_header_id
 * @property integer $hari_id
 * @property string $pagi
 * @property string $malam1
 * @property string $malam2
 * @property string $malam3
 * @property string $periode
 * @property integer $member_id
 * @property string $realname
 * @property string $angkatan
 * @property integer $id
 * @property integer $tipe_member
 */
class PdnReportJurnal extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_report_jurnal';
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
                'pon_detail_id, pon_header_id, hari_id, member_id, id, tipe_member',
                'numerical',
                'integerOnly' => true
            ),
            array('pagi, malam1, malam2, malam3', 'length', 'max' => 25),
            array('periode, angkatan', 'length', 'max' => 10),
            array('realname', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'pon_detail_id, pon_header_id, hari_id, pagi, malam1, malam2, malam3, periode, member_id, realname, angkatan, id, tipe_member',
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
            'pon_detail_id' => 'Pon Detail',
            'pon_header_id' => 'Pon Header',
            'hari_id' => 'Hari',
            'pagi' => 'Pagi',
            'malam1' => 'Malam1',
            'malam2' => 'Malam2',
            'malam3' => 'Malam3',
            'periode' => 'Periode',
            'member_id' => 'Member',
            'realname' => 'Realname',
            'angkatan' => 'Angkatan',
            'id' => 'ID',
            'tipe_member' => 'Tipe Member',
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

        $criteria->compare('pon_detail_id', $this->pon_detail_id);
        $criteria->compare('pon_header_id', $this->pon_header_id);
        $criteria->compare('hari_id', $this->hari_id);
        $criteria->compare('pagi', $this->pagi, true);
        $criteria->compare('malam1', $this->malam1, true);
        $criteria->compare('malam2', $this->malam2, true);
        $criteria->compare('malam3', $this->malam3, true);
        $criteria->compare('periode', $this->periode, true);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('realname', $this->realname, true);
        $criteria->compare('angkatan', $this->angkatan, true);
        $criteria->compare('id', $this->id);
        $criteria->compare('tipe_member', $this->tipe_member);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnReportJurnal the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
