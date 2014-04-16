<?php

/**
 * This is the model class for table "pdn_pon_detail".
 *
 * The followings are the available columns in table 'pdn_pon_detail':
 * @property integer $id
 * @property integer $pon_header_id
 * @property integer $hari_id
 * @property integer $pg_ya
 * @property string $pg_durasi
 * @property integer $pg_berkesah
 * @property integer $pg_berseru
 * @property integer $pg_berkidung
 * @property integer $pg_baca_doa
 * @property string $pg_catatan
 * @property integer $ktb_ya
 * @property integer $ktb_pl
 * @property integer $ktb_pb
 * @property string $ktb_durasi
 * @property string $ktb_ayat
 * @property string $ktb_reading
 * @property string $ktb_center
 * @property string $ktb_supply
 * @property string $ktb_catatan
 * @property integer $doa_ya
 * @property string $doa_durasi
 * @property integer $doa_pribadi
 * @property integer $doa_syafaat
 * @property string $doa_catatan
 * @property integer $rohani_ya
 * @property string $rohani_judul_buku
 * @property string $rohani_catatan
 * @property string $rohani_outline
 * @property integer $sidang_ya
 * @property integer $sidang_spr
 * @property integer $sidang_berdoa
 * @property integer $sidang_tutur_sabda
 * @property integer $sidang_doa
 * @property integer $sidang_kelompok
 * @property integer $ot_ya
 * @property integer $ot_tel
 * @property integer $ot_muka
 * @property string $jenguk_durasi
 * @property integer $jenguk_injil
 * @property integer $jenguk_rawat
 * @property string $jenguk_catatan
 * @property integer $tugas_ya
 * @property integer $perluasan_ya
 * @property integer $is_approved
 */
class PdnPonDetail extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_pon_detail';
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
                'pon_header_id, hari_id, pg_ya, pg_berkesah, pg_berseru, pg_berkidung, pg_baca_doa, ktb_ya, ktb_pl, ktb_pb, doa_ya, doa_pribadi, doa_syafaat, rohani_ya, sidang_ya, sidang_spr, sidang_berdoa, sidang_tutur_sabda, sidang_doa, sidang_kelompok, ot_ya, ot_tel, ot_muka, jenguk_injil, jenguk_rawat, tugas_ya, perluasan_ya, is_approved',
                'numerical',
                'integerOnly' => true
            ),
            array('pg_durasi, ktb_durasi, jenguk_durasi', 'length', 'max' => 10),
            array('ktb_ayat, doa_durasi', 'length', 'max' => 200),
            array('ktb_reading, ktb_center, ktb_supply, rohani_judul_buku', 'length', 'max' => 300),
            array('rohani_outline', 'length', 'max' => 100),
            array('pg_catatan, ktb_catatan, doa_catatan, rohani_catatan, jenguk_catatan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, pon_header_id, hari_id, pg_ya, pg_durasi, pg_berkesah, pg_berseru, pg_berkidung, pg_baca_doa, pg_catatan, ktb_ya, ktb_pl, ktb_pb, ktb_durasi, ktb_ayat, ktb_reading, ktb_center, ktb_supply, ktb_catatan, doa_ya, doa_durasi, doa_pribadi, doa_syafaat, doa_catatan, rohani_ya, rohani_judul_buku, rohani_catatan, rohani_outline, sidang_ya, sidang_spr, sidang_berdoa, sidang_tutur_sabda, sidang_doa, sidang_kelompok, ot_ya, ot_tel, ot_muka, jenguk_durasi, jenguk_injil, jenguk_rawat, jenguk_catatan, tugas_ya, perluasan_ya, is_approved',
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
            'pon_header_id' => 'Pon Header',
            'hari_id' => 'Hari',
            'pg_ya' => 'Pg Ya',
            'pg_durasi' => 'Pg Durasi',
            'pg_berkesah' => 'Pg Berkesah',
            'pg_berseru' => 'Pg Berseru',
            'pg_berkidung' => 'Pg Berkidung',
            'pg_baca_doa' => 'Pg Baca Doa',
            'pg_catatan' => 'Pg Catatan',
            'ktb_ya' => 'Ktb Ya',
            'ktb_pl' => 'Ktb Pl',
            'ktb_pb' => 'Ktb Pb',
            'ktb_durasi' => 'Ktb Durasi',
            'ktb_ayat' => 'Ktb Ayat',
            'ktb_reading' => 'Ktb Reading',
            'ktb_center' => 'Ktb Center',
            'ktb_supply' => 'Ktb Supply',
            'ktb_catatan' => 'Ktb Catatan',
            'doa_ya' => 'Doa Ya',
            'doa_durasi' => 'Doa Durasi',
            'doa_pribadi' => 'Doa Pribadi',
            'doa_syafaat' => 'Doa Syafaat',
            'doa_catatan' => 'Doa Catatan',
            'rohani_ya' => 'Rohani Ya',
            'rohani_judul_buku' => 'Rohani Judul Buku',
            'rohani_catatan' => 'Rohani Catatan',
            'rohani_outline' => 'Rohani Outline',
            'sidang_ya' => 'Sidang Ya',
            'sidang_spr' => 'Sidang Spr',
            'sidang_berdoa' => 'Sidang Berdoa',
            'sidang_tutur_sabda' => 'Sidang Tutur Sabda',
            'sidang_doa' => 'Sidang Doa',
            'sidang_kelompok' => 'Sidang Kelompok',
            'ot_ya' => 'Ot Ya',
            'ot_tel' => 'Ot Tel',
            'ot_muka' => 'Ot Muka',
            'jenguk_durasi' => 'Jenguk Durasi',
            'jenguk_injil' => 'Jenguk Injil',
            'jenguk_rawat' => 'Jenguk Rawat',
            'jenguk_catatan' => 'Jenguk Catatan',
            'tugas_ya' => 'Tugas Ya',
            'perluasan_ya' => 'Perluasan Ya',
            'is_approved' => 'Is Approved',
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
        $criteria->compare('pon_header_id', $this->pon_header_id);
        $criteria->compare('hari_id', $this->hari_id);
        $criteria->compare('pg_ya', $this->pg_ya);
        $criteria->compare('pg_durasi', $this->pg_durasi, true);
        $criteria->compare('pg_berkesah', $this->pg_berkesah);
        $criteria->compare('pg_berseru', $this->pg_berseru);
        $criteria->compare('pg_berkidung', $this->pg_berkidung);
        $criteria->compare('pg_baca_doa', $this->pg_baca_doa);
        $criteria->compare('pg_catatan', $this->pg_catatan, true);
        $criteria->compare('ktb_ya', $this->ktb_ya);
        $criteria->compare('ktb_pl', $this->ktb_pl);
        $criteria->compare('ktb_pb', $this->ktb_pb);
        $criteria->compare('ktb_durasi', $this->ktb_durasi, true);
        $criteria->compare('ktb_ayat', $this->ktb_ayat, true);
        $criteria->compare('ktb_reading', $this->ktb_reading, true);
        $criteria->compare('ktb_center', $this->ktb_center, true);
        $criteria->compare('ktb_supply', $this->ktb_supply, true);
        $criteria->compare('ktb_catatan', $this->ktb_catatan, true);
        $criteria->compare('doa_ya', $this->doa_ya);
        $criteria->compare('doa_durasi', $this->doa_durasi, true);
        $criteria->compare('doa_pribadi', $this->doa_pribadi);
        $criteria->compare('doa_syafaat', $this->doa_syafaat);
        $criteria->compare('doa_catatan', $this->doa_catatan, true);
        $criteria->compare('rohani_ya', $this->rohani_ya);
        $criteria->compare('rohani_judul_buku', $this->rohani_judul_buku, true);
        $criteria->compare('rohani_catatan', $this->rohani_catatan, true);
        $criteria->compare('rohani_outline', $this->rohani_outline, true);
        $criteria->compare('sidang_ya', $this->sidang_ya);
        $criteria->compare('sidang_spr', $this->sidang_spr);
        $criteria->compare('sidang_berdoa', $this->sidang_berdoa);
        $criteria->compare('sidang_tutur_sabda', $this->sidang_tutur_sabda);
        $criteria->compare('sidang_doa', $this->sidang_doa);
        $criteria->compare('sidang_kelompok', $this->sidang_kelompok);
        $criteria->compare('ot_ya', $this->ot_ya);
        $criteria->compare('ot_tel', $this->ot_tel);
        $criteria->compare('ot_muka', $this->ot_muka);
        $criteria->compare('jenguk_durasi', $this->jenguk_durasi, true);
        $criteria->compare('jenguk_injil', $this->jenguk_injil);
        $criteria->compare('jenguk_rawat', $this->jenguk_rawat);
        $criteria->compare('jenguk_catatan', $this->jenguk_catatan, true);
        $criteria->compare('tugas_ya', $this->tugas_ya);
        $criteria->compare('perluasan_ya', $this->perluasan_ya);
        $criteria->compare('is_approved', $this->is_approved);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnPonDetail the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
