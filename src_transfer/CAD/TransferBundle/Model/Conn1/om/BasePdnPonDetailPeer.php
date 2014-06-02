<?php

namespace CAD\TransferBundle\Model\Conn1\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\Conn1\PdnPonDetail;
use CAD\TransferBundle\Model\Conn1\PdnPonDetailPeer;
use CAD\TransferBundle\Model\Conn1\map\PdnPonDetailTableMap;

abstract class BasePdnPonDetailPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'conn1';

    /** the table name for this class */
    const TABLE_NAME = 'pdn_pon_detail';

    /** the related Propel class for this table */
    const OM_CLASS = 'CAD\\TransferBundle\\Model\\Conn1\\PdnPonDetail';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CAD\\TransferBundle\\Model\\Conn1\\map\\PdnPonDetailTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 44;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 44;

    /** the column name for the id field */
    const ID = 'pdn_pon_detail.id';

    /** the column name for the pon_header_id field */
    const PON_HEADER_ID = 'pdn_pon_detail.pon_header_id';

    /** the column name for the hari_id field */
    const HARI_ID = 'pdn_pon_detail.hari_id';

    /** the column name for the pg_ya field */
    const PG_YA = 'pdn_pon_detail.pg_ya';

    /** the column name for the pg_durasi field */
    const PG_DURASI = 'pdn_pon_detail.pg_durasi';

    /** the column name for the pg_berkesah field */
    const PG_BERKESAH = 'pdn_pon_detail.pg_berkesah';

    /** the column name for the pg_berseru field */
    const PG_BERSERU = 'pdn_pon_detail.pg_berseru';

    /** the column name for the pg_berkidung field */
    const PG_BERKIDUNG = 'pdn_pon_detail.pg_berkidung';

    /** the column name for the pg_baca_doa field */
    const PG_BACA_DOA = 'pdn_pon_detail.pg_baca_doa';

    /** the column name for the pg_catatan field */
    const PG_CATATAN = 'pdn_pon_detail.pg_catatan';

    /** the column name for the ktb_ya field */
    const KTB_YA = 'pdn_pon_detail.ktb_ya';

    /** the column name for the ktb_pl field */
    const KTB_PL = 'pdn_pon_detail.ktb_pl';

    /** the column name for the ktb_pb field */
    const KTB_PB = 'pdn_pon_detail.ktb_pb';

    /** the column name for the ktb_durasi field */
    const KTB_DURASI = 'pdn_pon_detail.ktb_durasi';

    /** the column name for the ktb_ayat field */
    const KTB_AYAT = 'pdn_pon_detail.ktb_ayat';

    /** the column name for the ktb_reading field */
    const KTB_READING = 'pdn_pon_detail.ktb_reading';

    /** the column name for the ktb_center field */
    const KTB_CENTER = 'pdn_pon_detail.ktb_center';

    /** the column name for the ktb_supply field */
    const KTB_SUPPLY = 'pdn_pon_detail.ktb_supply';

    /** the column name for the ktb_catatan field */
    const KTB_CATATAN = 'pdn_pon_detail.ktb_catatan';

    /** the column name for the doa_ya field */
    const DOA_YA = 'pdn_pon_detail.doa_ya';

    /** the column name for the doa_durasi field */
    const DOA_DURASI = 'pdn_pon_detail.doa_durasi';

    /** the column name for the doa_pribadi field */
    const DOA_PRIBADI = 'pdn_pon_detail.doa_pribadi';

    /** the column name for the doa_syafaat field */
    const DOA_SYAFAAT = 'pdn_pon_detail.doa_syafaat';

    /** the column name for the doa_catatan field */
    const DOA_CATATAN = 'pdn_pon_detail.doa_catatan';

    /** the column name for the rohani_ya field */
    const ROHANI_YA = 'pdn_pon_detail.rohani_ya';

    /** the column name for the rohani_judul_buku field */
    const ROHANI_JUDUL_BUKU = 'pdn_pon_detail.rohani_judul_buku';

    /** the column name for the rohani_catatan field */
    const ROHANI_CATATAN = 'pdn_pon_detail.rohani_catatan';

    /** the column name for the rohani_outline field */
    const ROHANI_OUTLINE = 'pdn_pon_detail.rohani_outline';

    /** the column name for the sidang_ya field */
    const SIDANG_YA = 'pdn_pon_detail.sidang_ya';

    /** the column name for the sidang_spr field */
    const SIDANG_SPR = 'pdn_pon_detail.sidang_spr';

    /** the column name for the sidang_berdoa field */
    const SIDANG_BERDOA = 'pdn_pon_detail.sidang_berdoa';

    /** the column name for the sidang_tutur_sabda field */
    const SIDANG_TUTUR_SABDA = 'pdn_pon_detail.sidang_tutur_sabda';

    /** the column name for the sidang_doa field */
    const SIDANG_DOA = 'pdn_pon_detail.sidang_doa';

    /** the column name for the sidang_kelompok field */
    const SIDANG_KELOMPOK = 'pdn_pon_detail.sidang_kelompok';

    /** the column name for the ot_ya field */
    const OT_YA = 'pdn_pon_detail.ot_ya';

    /** the column name for the ot_tel field */
    const OT_TEL = 'pdn_pon_detail.ot_tel';

    /** the column name for the ot_muka field */
    const OT_MUKA = 'pdn_pon_detail.ot_muka';

    /** the column name for the jenguk_durasi field */
    const JENGUK_DURASI = 'pdn_pon_detail.jenguk_durasi';

    /** the column name for the jenguk_injil field */
    const JENGUK_INJIL = 'pdn_pon_detail.jenguk_injil';

    /** the column name for the jenguk_rawat field */
    const JENGUK_RAWAT = 'pdn_pon_detail.jenguk_rawat';

    /** the column name for the jenguk_catatan field */
    const JENGUK_CATATAN = 'pdn_pon_detail.jenguk_catatan';

    /** the column name for the tugas_ya field */
    const TUGAS_YA = 'pdn_pon_detail.tugas_ya';

    /** the column name for the perluasan_ya field */
    const PERLUASAN_YA = 'pdn_pon_detail.perluasan_ya';

    /** the column name for the is_approved field */
    const IS_APPROVED = 'pdn_pon_detail.is_approved';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of PdnPonDetail objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PdnPonDetail[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PdnPonDetailPeer::$fieldNames[PdnPonDetailPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id',
            'PonHeaderId',
            'HariId',
            'PgYa',
            'PgDurasi',
            'PgBerkesah',
            'PgBerseru',
            'PgBerkidung',
            'PgBacaDoa',
            'PgCatatan',
            'KtbYa',
            'KtbPl',
            'KtbPb',
            'KtbDurasi',
            'KtbAyat',
            'KtbReading',
            'KtbCenter',
            'KtbSupply',
            'KtbCatatan',
            'DoaYa',
            'DoaDurasi',
            'DoaPribadi',
            'DoaSyafaat',
            'DoaCatatan',
            'RohaniYa',
            'RohaniJudulBuku',
            'RohaniCatatan',
            'RohaniOutline',
            'SidangYa',
            'SidangSpr',
            'SidangBerdoa',
            'SidangTuturSabda',
            'SidangDoa',
            'SidangKelompok',
            'OtYa',
            'OtTel',
            'OtMuka',
            'JengukDurasi',
            'JengukInjil',
            'JengukRawat',
            'JengukCatatan',
            'TugasYa',
            'PerluasanYa',
            'IsApproved',
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id',
            'ponHeaderId',
            'hariId',
            'pgYa',
            'pgDurasi',
            'pgBerkesah',
            'pgBerseru',
            'pgBerkidung',
            'pgBacaDoa',
            'pgCatatan',
            'ktbYa',
            'ktbPl',
            'ktbPb',
            'ktbDurasi',
            'ktbAyat',
            'ktbReading',
            'ktbCenter',
            'ktbSupply',
            'ktbCatatan',
            'doaYa',
            'doaDurasi',
            'doaPribadi',
            'doaSyafaat',
            'doaCatatan',
            'rohaniYa',
            'rohaniJudulBuku',
            'rohaniCatatan',
            'rohaniOutline',
            'sidangYa',
            'sidangSpr',
            'sidangBerdoa',
            'sidangTuturSabda',
            'sidangDoa',
            'sidangKelompok',
            'otYa',
            'otTel',
            'otMuka',
            'jengukDurasi',
            'jengukInjil',
            'jengukRawat',
            'jengukCatatan',
            'tugasYa',
            'perluasanYa',
            'isApproved',
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnPonDetailPeer::ID,
            PdnPonDetailPeer::PON_HEADER_ID,
            PdnPonDetailPeer::HARI_ID,
            PdnPonDetailPeer::PG_YA,
            PdnPonDetailPeer::PG_DURASI,
            PdnPonDetailPeer::PG_BERKESAH,
            PdnPonDetailPeer::PG_BERSERU,
            PdnPonDetailPeer::PG_BERKIDUNG,
            PdnPonDetailPeer::PG_BACA_DOA,
            PdnPonDetailPeer::PG_CATATAN,
            PdnPonDetailPeer::KTB_YA,
            PdnPonDetailPeer::KTB_PL,
            PdnPonDetailPeer::KTB_PB,
            PdnPonDetailPeer::KTB_DURASI,
            PdnPonDetailPeer::KTB_AYAT,
            PdnPonDetailPeer::KTB_READING,
            PdnPonDetailPeer::KTB_CENTER,
            PdnPonDetailPeer::KTB_SUPPLY,
            PdnPonDetailPeer::KTB_CATATAN,
            PdnPonDetailPeer::DOA_YA,
            PdnPonDetailPeer::DOA_DURASI,
            PdnPonDetailPeer::DOA_PRIBADI,
            PdnPonDetailPeer::DOA_SYAFAAT,
            PdnPonDetailPeer::DOA_CATATAN,
            PdnPonDetailPeer::ROHANI_YA,
            PdnPonDetailPeer::ROHANI_JUDUL_BUKU,
            PdnPonDetailPeer::ROHANI_CATATAN,
            PdnPonDetailPeer::ROHANI_OUTLINE,
            PdnPonDetailPeer::SIDANG_YA,
            PdnPonDetailPeer::SIDANG_SPR,
            PdnPonDetailPeer::SIDANG_BERDOA,
            PdnPonDetailPeer::SIDANG_TUTUR_SABDA,
            PdnPonDetailPeer::SIDANG_DOA,
            PdnPonDetailPeer::SIDANG_KELOMPOK,
            PdnPonDetailPeer::OT_YA,
            PdnPonDetailPeer::OT_TEL,
            PdnPonDetailPeer::OT_MUKA,
            PdnPonDetailPeer::JENGUK_DURASI,
            PdnPonDetailPeer::JENGUK_INJIL,
            PdnPonDetailPeer::JENGUK_RAWAT,
            PdnPonDetailPeer::JENGUK_CATATAN,
            PdnPonDetailPeer::TUGAS_YA,
            PdnPonDetailPeer::PERLUASAN_YA,
            PdnPonDetailPeer::IS_APPROVED,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID',
            'PON_HEADER_ID',
            'HARI_ID',
            'PG_YA',
            'PG_DURASI',
            'PG_BERKESAH',
            'PG_BERSERU',
            'PG_BERKIDUNG',
            'PG_BACA_DOA',
            'PG_CATATAN',
            'KTB_YA',
            'KTB_PL',
            'KTB_PB',
            'KTB_DURASI',
            'KTB_AYAT',
            'KTB_READING',
            'KTB_CENTER',
            'KTB_SUPPLY',
            'KTB_CATATAN',
            'DOA_YA',
            'DOA_DURASI',
            'DOA_PRIBADI',
            'DOA_SYAFAAT',
            'DOA_CATATAN',
            'ROHANI_YA',
            'ROHANI_JUDUL_BUKU',
            'ROHANI_CATATAN',
            'ROHANI_OUTLINE',
            'SIDANG_YA',
            'SIDANG_SPR',
            'SIDANG_BERDOA',
            'SIDANG_TUTUR_SABDA',
            'SIDANG_DOA',
            'SIDANG_KELOMPOK',
            'OT_YA',
            'OT_TEL',
            'OT_MUKA',
            'JENGUK_DURASI',
            'JENGUK_INJIL',
            'JENGUK_RAWAT',
            'JENGUK_CATATAN',
            'TUGAS_YA',
            'PERLUASAN_YA',
            'IS_APPROVED',
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id',
            'pon_header_id',
            'hari_id',
            'pg_ya',
            'pg_durasi',
            'pg_berkesah',
            'pg_berseru',
            'pg_berkidung',
            'pg_baca_doa',
            'pg_catatan',
            'ktb_ya',
            'ktb_pl',
            'ktb_pb',
            'ktb_durasi',
            'ktb_ayat',
            'ktb_reading',
            'ktb_center',
            'ktb_supply',
            'ktb_catatan',
            'doa_ya',
            'doa_durasi',
            'doa_pribadi',
            'doa_syafaat',
            'doa_catatan',
            'rohani_ya',
            'rohani_judul_buku',
            'rohani_catatan',
            'rohani_outline',
            'sidang_ya',
            'sidang_spr',
            'sidang_berdoa',
            'sidang_tutur_sabda',
            'sidang_doa',
            'sidang_kelompok',
            'ot_ya',
            'ot_tel',
            'ot_muka',
            'jenguk_durasi',
            'jenguk_injil',
            'jenguk_rawat',
            'jenguk_catatan',
            'tugas_ya',
            'perluasan_ya',
            'is_approved',
        ),
        BasePeer::TYPE_NUM => array(
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
            12,
            13,
            14,
            15,
            16,
            17,
            18,
            19,
            20,
            21,
            22,
            23,
            24,
            25,
            26,
            27,
            28,
            29,
            30,
            31,
            32,
            33,
            34,
            35,
            36,
            37,
            38,
            39,
            40,
            41,
            42,
            43,
        )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PdnPonDetailPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id' => 0,
            'PonHeaderId' => 1,
            'HariId' => 2,
            'PgYa' => 3,
            'PgDurasi' => 4,
            'PgBerkesah' => 5,
            'PgBerseru' => 6,
            'PgBerkidung' => 7,
            'PgBacaDoa' => 8,
            'PgCatatan' => 9,
            'KtbYa' => 10,
            'KtbPl' => 11,
            'KtbPb' => 12,
            'KtbDurasi' => 13,
            'KtbAyat' => 14,
            'KtbReading' => 15,
            'KtbCenter' => 16,
            'KtbSupply' => 17,
            'KtbCatatan' => 18,
            'DoaYa' => 19,
            'DoaDurasi' => 20,
            'DoaPribadi' => 21,
            'DoaSyafaat' => 22,
            'DoaCatatan' => 23,
            'RohaniYa' => 24,
            'RohaniJudulBuku' => 25,
            'RohaniCatatan' => 26,
            'RohaniOutline' => 27,
            'SidangYa' => 28,
            'SidangSpr' => 29,
            'SidangBerdoa' => 30,
            'SidangTuturSabda' => 31,
            'SidangDoa' => 32,
            'SidangKelompok' => 33,
            'OtYa' => 34,
            'OtTel' => 35,
            'OtMuka' => 36,
            'JengukDurasi' => 37,
            'JengukInjil' => 38,
            'JengukRawat' => 39,
            'JengukCatatan' => 40,
            'TugasYa' => 41,
            'PerluasanYa' => 42,
            'IsApproved' => 43,
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id' => 0,
            'ponHeaderId' => 1,
            'hariId' => 2,
            'pgYa' => 3,
            'pgDurasi' => 4,
            'pgBerkesah' => 5,
            'pgBerseru' => 6,
            'pgBerkidung' => 7,
            'pgBacaDoa' => 8,
            'pgCatatan' => 9,
            'ktbYa' => 10,
            'ktbPl' => 11,
            'ktbPb' => 12,
            'ktbDurasi' => 13,
            'ktbAyat' => 14,
            'ktbReading' => 15,
            'ktbCenter' => 16,
            'ktbSupply' => 17,
            'ktbCatatan' => 18,
            'doaYa' => 19,
            'doaDurasi' => 20,
            'doaPribadi' => 21,
            'doaSyafaat' => 22,
            'doaCatatan' => 23,
            'rohaniYa' => 24,
            'rohaniJudulBuku' => 25,
            'rohaniCatatan' => 26,
            'rohaniOutline' => 27,
            'sidangYa' => 28,
            'sidangSpr' => 29,
            'sidangBerdoa' => 30,
            'sidangTuturSabda' => 31,
            'sidangDoa' => 32,
            'sidangKelompok' => 33,
            'otYa' => 34,
            'otTel' => 35,
            'otMuka' => 36,
            'jengukDurasi' => 37,
            'jengukInjil' => 38,
            'jengukRawat' => 39,
            'jengukCatatan' => 40,
            'tugasYa' => 41,
            'perluasanYa' => 42,
            'isApproved' => 43,
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnPonDetailPeer::ID => 0,
            PdnPonDetailPeer::PON_HEADER_ID => 1,
            PdnPonDetailPeer::HARI_ID => 2,
            PdnPonDetailPeer::PG_YA => 3,
            PdnPonDetailPeer::PG_DURASI => 4,
            PdnPonDetailPeer::PG_BERKESAH => 5,
            PdnPonDetailPeer::PG_BERSERU => 6,
            PdnPonDetailPeer::PG_BERKIDUNG => 7,
            PdnPonDetailPeer::PG_BACA_DOA => 8,
            PdnPonDetailPeer::PG_CATATAN => 9,
            PdnPonDetailPeer::KTB_YA => 10,
            PdnPonDetailPeer::KTB_PL => 11,
            PdnPonDetailPeer::KTB_PB => 12,
            PdnPonDetailPeer::KTB_DURASI => 13,
            PdnPonDetailPeer::KTB_AYAT => 14,
            PdnPonDetailPeer::KTB_READING => 15,
            PdnPonDetailPeer::KTB_CENTER => 16,
            PdnPonDetailPeer::KTB_SUPPLY => 17,
            PdnPonDetailPeer::KTB_CATATAN => 18,
            PdnPonDetailPeer::DOA_YA => 19,
            PdnPonDetailPeer::DOA_DURASI => 20,
            PdnPonDetailPeer::DOA_PRIBADI => 21,
            PdnPonDetailPeer::DOA_SYAFAAT => 22,
            PdnPonDetailPeer::DOA_CATATAN => 23,
            PdnPonDetailPeer::ROHANI_YA => 24,
            PdnPonDetailPeer::ROHANI_JUDUL_BUKU => 25,
            PdnPonDetailPeer::ROHANI_CATATAN => 26,
            PdnPonDetailPeer::ROHANI_OUTLINE => 27,
            PdnPonDetailPeer::SIDANG_YA => 28,
            PdnPonDetailPeer::SIDANG_SPR => 29,
            PdnPonDetailPeer::SIDANG_BERDOA => 30,
            PdnPonDetailPeer::SIDANG_TUTUR_SABDA => 31,
            PdnPonDetailPeer::SIDANG_DOA => 32,
            PdnPonDetailPeer::SIDANG_KELOMPOK => 33,
            PdnPonDetailPeer::OT_YA => 34,
            PdnPonDetailPeer::OT_TEL => 35,
            PdnPonDetailPeer::OT_MUKA => 36,
            PdnPonDetailPeer::JENGUK_DURASI => 37,
            PdnPonDetailPeer::JENGUK_INJIL => 38,
            PdnPonDetailPeer::JENGUK_RAWAT => 39,
            PdnPonDetailPeer::JENGUK_CATATAN => 40,
            PdnPonDetailPeer::TUGAS_YA => 41,
            PdnPonDetailPeer::PERLUASAN_YA => 42,
            PdnPonDetailPeer::IS_APPROVED => 43,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID' => 0,
            'PON_HEADER_ID' => 1,
            'HARI_ID' => 2,
            'PG_YA' => 3,
            'PG_DURASI' => 4,
            'PG_BERKESAH' => 5,
            'PG_BERSERU' => 6,
            'PG_BERKIDUNG' => 7,
            'PG_BACA_DOA' => 8,
            'PG_CATATAN' => 9,
            'KTB_YA' => 10,
            'KTB_PL' => 11,
            'KTB_PB' => 12,
            'KTB_DURASI' => 13,
            'KTB_AYAT' => 14,
            'KTB_READING' => 15,
            'KTB_CENTER' => 16,
            'KTB_SUPPLY' => 17,
            'KTB_CATATAN' => 18,
            'DOA_YA' => 19,
            'DOA_DURASI' => 20,
            'DOA_PRIBADI' => 21,
            'DOA_SYAFAAT' => 22,
            'DOA_CATATAN' => 23,
            'ROHANI_YA' => 24,
            'ROHANI_JUDUL_BUKU' => 25,
            'ROHANI_CATATAN' => 26,
            'ROHANI_OUTLINE' => 27,
            'SIDANG_YA' => 28,
            'SIDANG_SPR' => 29,
            'SIDANG_BERDOA' => 30,
            'SIDANG_TUTUR_SABDA' => 31,
            'SIDANG_DOA' => 32,
            'SIDANG_KELOMPOK' => 33,
            'OT_YA' => 34,
            'OT_TEL' => 35,
            'OT_MUKA' => 36,
            'JENGUK_DURASI' => 37,
            'JENGUK_INJIL' => 38,
            'JENGUK_RAWAT' => 39,
            'JENGUK_CATATAN' => 40,
            'TUGAS_YA' => 41,
            'PERLUASAN_YA' => 42,
            'IS_APPROVED' => 43,
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id' => 0,
            'pon_header_id' => 1,
            'hari_id' => 2,
            'pg_ya' => 3,
            'pg_durasi' => 4,
            'pg_berkesah' => 5,
            'pg_berseru' => 6,
            'pg_berkidung' => 7,
            'pg_baca_doa' => 8,
            'pg_catatan' => 9,
            'ktb_ya' => 10,
            'ktb_pl' => 11,
            'ktb_pb' => 12,
            'ktb_durasi' => 13,
            'ktb_ayat' => 14,
            'ktb_reading' => 15,
            'ktb_center' => 16,
            'ktb_supply' => 17,
            'ktb_catatan' => 18,
            'doa_ya' => 19,
            'doa_durasi' => 20,
            'doa_pribadi' => 21,
            'doa_syafaat' => 22,
            'doa_catatan' => 23,
            'rohani_ya' => 24,
            'rohani_judul_buku' => 25,
            'rohani_catatan' => 26,
            'rohani_outline' => 27,
            'sidang_ya' => 28,
            'sidang_spr' => 29,
            'sidang_berdoa' => 30,
            'sidang_tutur_sabda' => 31,
            'sidang_doa' => 32,
            'sidang_kelompok' => 33,
            'ot_ya' => 34,
            'ot_tel' => 35,
            'ot_muka' => 36,
            'jenguk_durasi' => 37,
            'jenguk_injil' => 38,
            'jenguk_rawat' => 39,
            'jenguk_catatan' => 40,
            'tugas_ya' => 41,
            'perluasan_ya' => 42,
            'is_approved' => 43,
        ),
        BasePeer::TYPE_NUM => array(
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
            12,
            13,
            14,
            15,
            16,
            17,
            18,
            19,
            20,
            21,
            22,
            23,
            24,
            25,
            26,
            27,
            28,
            29,
            30,
            31,
            32,
            33,
            34,
            35,
            36,
            37,
            38,
            39,
            40,
            41,
            42,
            43,
        )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = PdnPonDetailPeer::getFieldNames($toType);
        $key = isset(PdnPonDetailPeer::$fieldKeys[$fromType][$name]) ? PdnPonDetailPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(
                PdnPonDetailPeer::$fieldKeys[$fromType],
                true
            ));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, PdnPonDetailPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PdnPonDetailPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *        $c->addAlias("alias1", TablePeer::TABLE_NAME);
     *        $c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. PdnPonDetailPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PdnPonDetailPeer::TABLE_NAME . '.', $alias . '.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string $alias optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PdnPonDetailPeer::ID);
            $criteria->addSelectColumn(PdnPonDetailPeer::PON_HEADER_ID);
            $criteria->addSelectColumn(PdnPonDetailPeer::HARI_ID);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_DURASI);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_BERKESAH);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_BERSERU);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_BERKIDUNG);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_BACA_DOA);
            $criteria->addSelectColumn(PdnPonDetailPeer::PG_CATATAN);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_PL);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_PB);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_DURASI);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_AYAT);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_READING);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_CENTER);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_SUPPLY);
            $criteria->addSelectColumn(PdnPonDetailPeer::KTB_CATATAN);
            $criteria->addSelectColumn(PdnPonDetailPeer::DOA_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::DOA_DURASI);
            $criteria->addSelectColumn(PdnPonDetailPeer::DOA_PRIBADI);
            $criteria->addSelectColumn(PdnPonDetailPeer::DOA_SYAFAAT);
            $criteria->addSelectColumn(PdnPonDetailPeer::DOA_CATATAN);
            $criteria->addSelectColumn(PdnPonDetailPeer::ROHANI_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::ROHANI_JUDUL_BUKU);
            $criteria->addSelectColumn(PdnPonDetailPeer::ROHANI_CATATAN);
            $criteria->addSelectColumn(PdnPonDetailPeer::ROHANI_OUTLINE);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_SPR);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_BERDOA);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_TUTUR_SABDA);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_DOA);
            $criteria->addSelectColumn(PdnPonDetailPeer::SIDANG_KELOMPOK);
            $criteria->addSelectColumn(PdnPonDetailPeer::OT_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::OT_TEL);
            $criteria->addSelectColumn(PdnPonDetailPeer::OT_MUKA);
            $criteria->addSelectColumn(PdnPonDetailPeer::JENGUK_DURASI);
            $criteria->addSelectColumn(PdnPonDetailPeer::JENGUK_INJIL);
            $criteria->addSelectColumn(PdnPonDetailPeer::JENGUK_RAWAT);
            $criteria->addSelectColumn(PdnPonDetailPeer::JENGUK_CATATAN);
            $criteria->addSelectColumn(PdnPonDetailPeer::TUGAS_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::PERLUASAN_YA);
            $criteria->addSelectColumn(PdnPonDetailPeer::IS_APPROVED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.pon_header_id');
            $criteria->addSelectColumn($alias . '.hari_id');
            $criteria->addSelectColumn($alias . '.pg_ya');
            $criteria->addSelectColumn($alias . '.pg_durasi');
            $criteria->addSelectColumn($alias . '.pg_berkesah');
            $criteria->addSelectColumn($alias . '.pg_berseru');
            $criteria->addSelectColumn($alias . '.pg_berkidung');
            $criteria->addSelectColumn($alias . '.pg_baca_doa');
            $criteria->addSelectColumn($alias . '.pg_catatan');
            $criteria->addSelectColumn($alias . '.ktb_ya');
            $criteria->addSelectColumn($alias . '.ktb_pl');
            $criteria->addSelectColumn($alias . '.ktb_pb');
            $criteria->addSelectColumn($alias . '.ktb_durasi');
            $criteria->addSelectColumn($alias . '.ktb_ayat');
            $criteria->addSelectColumn($alias . '.ktb_reading');
            $criteria->addSelectColumn($alias . '.ktb_center');
            $criteria->addSelectColumn($alias . '.ktb_supply');
            $criteria->addSelectColumn($alias . '.ktb_catatan');
            $criteria->addSelectColumn($alias . '.doa_ya');
            $criteria->addSelectColumn($alias . '.doa_durasi');
            $criteria->addSelectColumn($alias . '.doa_pribadi');
            $criteria->addSelectColumn($alias . '.doa_syafaat');
            $criteria->addSelectColumn($alias . '.doa_catatan');
            $criteria->addSelectColumn($alias . '.rohani_ya');
            $criteria->addSelectColumn($alias . '.rohani_judul_buku');
            $criteria->addSelectColumn($alias . '.rohani_catatan');
            $criteria->addSelectColumn($alias . '.rohani_outline');
            $criteria->addSelectColumn($alias . '.sidang_ya');
            $criteria->addSelectColumn($alias . '.sidang_spr');
            $criteria->addSelectColumn($alias . '.sidang_berdoa');
            $criteria->addSelectColumn($alias . '.sidang_tutur_sabda');
            $criteria->addSelectColumn($alias . '.sidang_doa');
            $criteria->addSelectColumn($alias . '.sidang_kelompok');
            $criteria->addSelectColumn($alias . '.ot_ya');
            $criteria->addSelectColumn($alias . '.ot_tel');
            $criteria->addSelectColumn($alias . '.ot_muka');
            $criteria->addSelectColumn($alias . '.jenguk_durasi');
            $criteria->addSelectColumn($alias . '.jenguk_injil');
            $criteria->addSelectColumn($alias . '.jenguk_rawat');
            $criteria->addSelectColumn($alias . '.jenguk_catatan');
            $criteria->addSelectColumn($alias . '.tugas_ya');
            $criteria->addSelectColumn($alias . '.perluasan_ya');
            $criteria->addSelectColumn($alias . '.is_approved');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PdnPonDetailPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PdnPonDetailPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PdnPonDetailPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int)$row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return PdnPonDetail
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PdnPonDetailPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }

    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return PdnPonDetailPeer::populateObjects(PdnPonDetailPeer::doSelectStmt($criteria, $con));
    }

    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PdnPonDetailPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PdnPonDetailPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param PdnPonDetail $obj A PdnPonDetail object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string)$obj->getId();
            } // if key === null
            PdnPonDetailPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A PdnPonDetail object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PdnPonDetail) {
                $key = (string)$value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string)$value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PdnPonDetail object; got " . (is_object(
                    $value
                ) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(PdnPonDetailPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return PdnPonDetail Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PdnPonDetailPeer::$instances[$key])) {
                return PdnPonDetailPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
        if ($and_clear_all_references) {
            foreach (PdnPonDetailPeer::$instances as $instance) {
                $instance->clearAllReferences(true);
            }
        }
        PdnPonDetailPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pdn_pon_detail
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string)$row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int)$row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = PdnPonDetailPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PdnPonDetailPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PdnPonDetailPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PdnPonDetailPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (PdnPonDetail object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PdnPonDetailPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PdnPonDetailPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PdnPonDetailPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PdnPonDetailPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PdnPonDetailPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(PdnPonDetailPeer::DATABASE_NAME)->getTable(PdnPonDetailPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getDatabaseMap(BasePdnPonDetailPeer::DATABASE_NAME);
        if (!$dbMap->hasTable(BasePdnPonDetailPeer::TABLE_NAME)) {
            $dbMap->addTableObject(new \CAD\TransferBundle\Model\Conn1\map\PdnPonDetailTableMap());
        }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return PdnPonDetailPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PdnPonDetail or Criteria object.
     *
     * @param      mixed $values Criteria or PdnPonDetail object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PdnPonDetail object
        }

        if ($criteria->containsKey(PdnPonDetailPeer::ID) && $criteria->keyContainsValue(PdnPonDetailPeer::ID)) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnPonDetailPeer::ID . ')');
        }


        // Set the correct dbName
        $criteria->setDbName(PdnPonDetailPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a PdnPonDetail or Criteria object.
     *
     * @param      mixed $values Criteria or PdnPonDetail object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PdnPonDetailPeer::ID);
            $value = $criteria->remove(PdnPonDetailPeer::ID);
            if ($value) {
                $selectCriteria->add(PdnPonDetailPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PdnPonDetailPeer::TABLE_NAME);
            }

        } else { // $values is PdnPonDetail object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PdnPonDetailPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pdn_pon_detail table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PdnPonDetailPeer::TABLE_NAME, $con, PdnPonDetailPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PdnPonDetailPeer::clearInstancePool();
            PdnPonDetailPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PdnPonDetail or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PdnPonDetail object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doDelete($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PdnPonDetailPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PdnPonDetail) { // it's a model object
            // invalidate the cache for this single object
            PdnPonDetailPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);
            $criteria->add(PdnPonDetailPeer::ID, (array)$values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array)$values as $singleval) {
                PdnPonDetailPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PdnPonDetailPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PdnPonDetailPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PdnPonDetail object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param PdnPonDetail $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PdnPonDetailPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PdnPonDetailPeer::TABLE_NAME);

            if (!is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(PdnPonDetailPeer::DATABASE_NAME, PdnPonDetailPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PdnPonDetail
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PdnPonDetailPeer::getInstanceFromPool((string)$pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);
        $criteria->add(PdnPonDetailPeer::ID, $pk);

        $v = PdnPonDetailPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PdnPonDetail[]
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);
            $criteria->add(PdnPonDetailPeer::ID, $pks, Criteria::IN);
            $objs = PdnPonDetailPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePdnPonDetailPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePdnPonDetailPeer::buildTableMap();

