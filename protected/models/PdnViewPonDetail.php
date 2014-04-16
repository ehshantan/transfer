<?php

/**
 * This is the model class for table "pdn_view_pon_detail".
 *
 * The followings are the available columns in table 'pdn_view_pon_detail':
 * @property integer $pon_detail_id
 * @property integer $pon_header_id
 * @property integer $hari_id
 * @property string $jumlah_pg_ya
 * @property double $jumlah_pg_durasi
 * @property string $jumlah_pg_berkesah
 * @property double $jumlah_jenguk_durasi
 * @property string $jumlah_jenguk_injil
 * @property string $jumlah_jenguk_rawat
 * @property string $jumlah_pg_berseru
 * @property string $jumlah_sidang_doa
 * @property string $jumlah_sidang_kelompok
 * @property string $jumlah_pg_berkidung
 * @property string $jumlah_pg_baca_doa
 * @property string $pg_catatan
 * @property string $jumlah_ot_tel
 * @property string $jumlah_ot_muka
 * @property string $jumlah_ktb_ya
 * @property string $jumlah_ktb_pl
 * @property string $jumlah_ktb_pb
 * @property double $jumlah_ktb_durasi
 * @property string $ktb_ayat
 * @property string $ktb_reading
 * @property string $ktb_catatan
 * @property string $jumlah_doa_ya
 * @property double $jumlah_doa_durasi
 * @property string $jumlah_doa_pribadi
 * @property string $jumlah_doa_syafaat
 * @property string $doa_catatan
 * @property string $jumlah_rohani_ya
 * @property string $rohani_judul_buku
 * @property string $rohani_catatan
 * @property string $jumlah_tugas_ya
 * @property string $jumlah_perluasan_ya
 * @property string $jumlah_sidang_ya
 * @property string $jumlah_sidang_spr
 * @property string $jumlah_sidang_berdoa
 * @property string $jumlah_sidang_tutur_sabda
 * @property integer $jenguk_injil
 * @property string $jenguk_durasi
 * @property integer $jenguk_rawat
 * @property string $jenguk_catatan
 * @property integer $is_approved
 * @property string $periode
 * @property integer $member_id
 * @property string $point
 * @property string $realname
 * @property string $angkatan
 * @property integer $id
 * @property integer $tipe_member
 * @property integer $id_kelompok
 */
class PdnViewPonDetail extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'pdn_view_pon_detail';
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
                'pon_detail_id, pon_header_id, hari_id, jenguk_injil, jenguk_rawat, is_approved, member_id, id, tipe_member, id_kelompok',
                'numerical',
                'integerOnly' => true
            ),
            array('jumlah_pg_durasi, jumlah_jenguk_durasi, jumlah_ktb_durasi, jumlah_doa_durasi', 'numerical'),
            array(
                'jumlah_pg_ya, jumlah_pg_berkesah, jumlah_jenguk_injil, jumlah_jenguk_rawat, jumlah_pg_berseru, jumlah_sidang_doa, jumlah_sidang_kelompok, jumlah_pg_berkidung, jumlah_pg_baca_doa, jumlah_ot_tel, jumlah_ot_muka, jumlah_ktb_ya, jumlah_ktb_pl, jumlah_ktb_pb, jumlah_doa_ya, jumlah_doa_pribadi, jumlah_doa_syafaat, jumlah_rohani_ya, jumlah_tugas_ya, jumlah_perluasan_ya, jumlah_sidang_ya, jumlah_sidang_spr, jumlah_sidang_berdoa, jumlah_sidang_tutur_sabda',
                'length',
                'max' => 25
            ),
            array('ktb_ayat', 'length', 'max' => 200),
            array('ktb_reading, rohani_judul_buku', 'length', 'max' => 300),
            array('jenguk_durasi, periode, angkatan', 'length', 'max' => 10),
            array('point', 'length', 'max' => 44),
            array('realname', 'length', 'max' => 100),
            array('pg_catatan, ktb_catatan, doa_catatan, rohani_catatan, jenguk_catatan', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'pon_detail_id, pon_header_id, hari_id, jumlah_pg_ya, jumlah_pg_durasi, jumlah_pg_berkesah, jumlah_jenguk_durasi, jumlah_jenguk_injil, jumlah_jenguk_rawat, jumlah_pg_berseru, jumlah_sidang_doa, jumlah_sidang_kelompok, jumlah_pg_berkidung, jumlah_pg_baca_doa, pg_catatan, jumlah_ot_tel, jumlah_ot_muka, jumlah_ktb_ya, jumlah_ktb_pl, jumlah_ktb_pb, jumlah_ktb_durasi, ktb_ayat, ktb_reading, ktb_catatan, jumlah_doa_ya, jumlah_doa_durasi, jumlah_doa_pribadi, jumlah_doa_syafaat, doa_catatan, jumlah_rohani_ya, rohani_judul_buku, rohani_catatan, jumlah_tugas_ya, jumlah_perluasan_ya, jumlah_sidang_ya, jumlah_sidang_spr, jumlah_sidang_berdoa, jumlah_sidang_tutur_sabda, jenguk_injil, jenguk_durasi, jenguk_rawat, jenguk_catatan, is_approved, periode, member_id, point, realname, angkatan, id, tipe_member, id_kelompok',
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
            'jumlah_pg_ya' => 'Jumlah Pg Ya',
            'jumlah_pg_durasi' => 'Jumlah Pg Durasi',
            'jumlah_pg_berkesah' => 'Jumlah Pg Berkesah',
            'jumlah_jenguk_durasi' => 'Jumlah Jenguk Durasi',
            'jumlah_jenguk_injil' => 'Jumlah Jenguk Injil',
            'jumlah_jenguk_rawat' => 'Jumlah Jenguk Rawat',
            'jumlah_pg_berseru' => 'Jumlah Pg Berseru',
            'jumlah_sidang_doa' => 'Jumlah Sidang Doa',
            'jumlah_sidang_kelompok' => 'Jumlah Sidang Kelompok',
            'jumlah_pg_berkidung' => 'Jumlah Pg Berkidung',
            'jumlah_pg_baca_doa' => 'Jumlah Pg Baca Doa',
            'pg_catatan' => 'Pg Catatan',
            'jumlah_ot_tel' => 'Jumlah Ot Tel',
            'jumlah_ot_muka' => 'Jumlah Ot Muka',
            'jumlah_ktb_ya' => 'Jumlah Ktb Ya',
            'jumlah_ktb_pl' => 'Jumlah Ktb Pl',
            'jumlah_ktb_pb' => 'Jumlah Ktb Pb',
            'jumlah_ktb_durasi' => 'Jumlah Ktb Durasi',
            'ktb_ayat' => 'Ktb Ayat',
            'ktb_reading' => 'Ktb Reading',
            'ktb_catatan' => 'Ktb Catatan',
            'jumlah_doa_ya' => 'Jumlah Doa Ya',
            'jumlah_doa_durasi' => 'Jumlah Doa Durasi',
            'jumlah_doa_pribadi' => 'Jumlah Doa Pribadi',
            'jumlah_doa_syafaat' => 'Jumlah Doa Syafaat',
            'doa_catatan' => 'Doa Catatan',
            'jumlah_rohani_ya' => 'Jumlah Rohani Ya',
            'rohani_judul_buku' => 'Rohani Judul Buku',
            'rohani_catatan' => 'Rohani Catatan',
            'jumlah_tugas_ya' => 'Jumlah Tugas Ya',
            'jumlah_perluasan_ya' => 'Jumlah Perluasan Ya',
            'jumlah_sidang_ya' => 'Jumlah Sidang Ya',
            'jumlah_sidang_spr' => 'Jumlah Sidang Spr',
            'jumlah_sidang_berdoa' => 'Jumlah Sidang Berdoa',
            'jumlah_sidang_tutur_sabda' => 'Jumlah Sidang Tutur Sabda',
            'jenguk_injil' => 'Jenguk Injil',
            'jenguk_durasi' => 'Jenguk Durasi',
            'jenguk_rawat' => 'Jenguk Rawat',
            'jenguk_catatan' => 'Jenguk Catatan',
            'is_approved' => 'Is Approved',
            'periode' => 'Periode',
            'member_id' => 'Member',
            'point' => 'Point',
            'realname' => 'Realname',
            'angkatan' => 'Angkatan',
            'id' => 'ID',
            'tipe_member' => 'Tipe Member',
            'id_kelompok' => 'Id Kelompok',
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
        $criteria->compare('jumlah_pg_ya', $this->jumlah_pg_ya, true);
        $criteria->compare('jumlah_pg_durasi', $this->jumlah_pg_durasi);
        $criteria->compare('jumlah_pg_berkesah', $this->jumlah_pg_berkesah, true);
        $criteria->compare('jumlah_jenguk_durasi', $this->jumlah_jenguk_durasi);
        $criteria->compare('jumlah_jenguk_injil', $this->jumlah_jenguk_injil, true);
        $criteria->compare('jumlah_jenguk_rawat', $this->jumlah_jenguk_rawat, true);
        $criteria->compare('jumlah_pg_berseru', $this->jumlah_pg_berseru, true);
        $criteria->compare('jumlah_sidang_doa', $this->jumlah_sidang_doa, true);
        $criteria->compare('jumlah_sidang_kelompok', $this->jumlah_sidang_kelompok, true);
        $criteria->compare('jumlah_pg_berkidung', $this->jumlah_pg_berkidung, true);
        $criteria->compare('jumlah_pg_baca_doa', $this->jumlah_pg_baca_doa, true);
        $criteria->compare('pg_catatan', $this->pg_catatan, true);
        $criteria->compare('jumlah_ot_tel', $this->jumlah_ot_tel, true);
        $criteria->compare('jumlah_ot_muka', $this->jumlah_ot_muka, true);
        $criteria->compare('jumlah_ktb_ya', $this->jumlah_ktb_ya, true);
        $criteria->compare('jumlah_ktb_pl', $this->jumlah_ktb_pl, true);
        $criteria->compare('jumlah_ktb_pb', $this->jumlah_ktb_pb, true);
        $criteria->compare('jumlah_ktb_durasi', $this->jumlah_ktb_durasi);
        $criteria->compare('ktb_ayat', $this->ktb_ayat, true);
        $criteria->compare('ktb_reading', $this->ktb_reading, true);
        $criteria->compare('ktb_catatan', $this->ktb_catatan, true);
        $criteria->compare('jumlah_doa_ya', $this->jumlah_doa_ya, true);
        $criteria->compare('jumlah_doa_durasi', $this->jumlah_doa_durasi);
        $criteria->compare('jumlah_doa_pribadi', $this->jumlah_doa_pribadi, true);
        $criteria->compare('jumlah_doa_syafaat', $this->jumlah_doa_syafaat, true);
        $criteria->compare('doa_catatan', $this->doa_catatan, true);
        $criteria->compare('jumlah_rohani_ya', $this->jumlah_rohani_ya, true);
        $criteria->compare('rohani_judul_buku', $this->rohani_judul_buku, true);
        $criteria->compare('rohani_catatan', $this->rohani_catatan, true);
        $criteria->compare('jumlah_tugas_ya', $this->jumlah_tugas_ya, true);
        $criteria->compare('jumlah_perluasan_ya', $this->jumlah_perluasan_ya, true);
        $criteria->compare('jumlah_sidang_ya', $this->jumlah_sidang_ya, true);
        $criteria->compare('jumlah_sidang_spr', $this->jumlah_sidang_spr, true);
        $criteria->compare('jumlah_sidang_berdoa', $this->jumlah_sidang_berdoa, true);
        $criteria->compare('jumlah_sidang_tutur_sabda', $this->jumlah_sidang_tutur_sabda, true);
        $criteria->compare('jenguk_injil', $this->jenguk_injil);
        $criteria->compare('jenguk_durasi', $this->jenguk_durasi, true);
        $criteria->compare('jenguk_rawat', $this->jenguk_rawat);
        $criteria->compare('jenguk_catatan', $this->jenguk_catatan, true);
        $criteria->compare('is_approved', $this->is_approved);
        $criteria->compare('periode', $this->periode, true);
        $criteria->compare('member_id', $this->member_id);
        $criteria->compare('point', $this->point, true);
        $criteria->compare('realname', $this->realname, true);
        $criteria->compare('angkatan', $this->angkatan, true);
        $criteria->compare('id', $this->id);
        $criteria->compare('tipe_member', $this->tipe_member);
        $criteria->compare('id_kelompok', $this->id_kelompok);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PdnViewPonDetail the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
