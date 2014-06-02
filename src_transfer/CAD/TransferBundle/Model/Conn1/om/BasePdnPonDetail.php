<?php

namespace CAD\TransferBundle\Model\Conn1\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\Conn1\PdnPonDetail;
use CAD\TransferBundle\Model\Conn1\PdnPonDetailPeer;
use CAD\TransferBundle\Model\Conn1\PdnPonDetailQuery;

abstract class BasePdnPonDetail extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\Conn1\\PdnPonDetailPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PdnPonDetailPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        int
     */
    protected $id;

    /**
     * The value for the pon_header_id field.
     * @var        int
     */
    protected $pon_header_id;

    /**
     * The value for the hari_id field.
     * @var        int
     */
    protected $hari_id;

    /**
     * The value for the pg_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pg_ya;

    /**
     * The value for the pg_durasi field.
     * @var        string
     */
    protected $pg_durasi;

    /**
     * The value for the pg_berkesah field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pg_berkesah;

    /**
     * The value for the pg_berseru field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pg_berseru;

    /**
     * The value for the pg_berkidung field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pg_berkidung;

    /**
     * The value for the pg_baca_doa field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $pg_baca_doa;

    /**
     * The value for the pg_catatan field.
     * @var        string
     */
    protected $pg_catatan;

    /**
     * The value for the ktb_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ktb_ya;

    /**
     * The value for the ktb_pl field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ktb_pl;

    /**
     * The value for the ktb_pb field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ktb_pb;

    /**
     * The value for the ktb_durasi field.
     * @var        string
     */
    protected $ktb_durasi;

    /**
     * The value for the ktb_ayat field.
     * @var        string
     */
    protected $ktb_ayat;

    /**
     * The value for the ktb_reading field.
     * @var        string
     */
    protected $ktb_reading;

    /**
     * The value for the ktb_center field.
     * @var        string
     */
    protected $ktb_center;

    /**
     * The value for the ktb_supply field.
     * @var        string
     */
    protected $ktb_supply;

    /**
     * The value for the ktb_catatan field.
     * @var        string
     */
    protected $ktb_catatan;

    /**
     * The value for the doa_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $doa_ya;

    /**
     * The value for the doa_durasi field.
     * @var        string
     */
    protected $doa_durasi;

    /**
     * The value for the doa_pribadi field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $doa_pribadi;

    /**
     * The value for the doa_syafaat field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $doa_syafaat;

    /**
     * The value for the doa_catatan field.
     * @var        string
     */
    protected $doa_catatan;

    /**
     * The value for the rohani_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $rohani_ya;

    /**
     * The value for the rohani_judul_buku field.
     * @var        string
     */
    protected $rohani_judul_buku;

    /**
     * The value for the rohani_catatan field.
     * @var        string
     */
    protected $rohani_catatan;

    /**
     * The value for the rohani_outline field.
     * @var        string
     */
    protected $rohani_outline;

    /**
     * The value for the sidang_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sidang_ya;

    /**
     * The value for the sidang_spr field.
     * @var        int
     */
    protected $sidang_spr;

    /**
     * The value for the sidang_berdoa field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sidang_berdoa;

    /**
     * The value for the sidang_tutur_sabda field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $sidang_tutur_sabda;

    /**
     * The value for the sidang_doa field.
     * @var        int
     */
    protected $sidang_doa;

    /**
     * The value for the sidang_kelompok field.
     * @var        int
     */
    protected $sidang_kelompok;

    /**
     * The value for the ot_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ot_ya;

    /**
     * The value for the ot_tel field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ot_tel;

    /**
     * The value for the ot_muka field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $ot_muka;

    /**
     * The value for the jenguk_durasi field.
     * @var        string
     */
    protected $jenguk_durasi;

    /**
     * The value for the jenguk_injil field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $jenguk_injil;

    /**
     * The value for the jenguk_rawat field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $jenguk_rawat;

    /**
     * The value for the jenguk_catatan field.
     * @var        string
     */
    protected $jenguk_catatan;

    /**
     * The value for the tugas_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $tugas_ya;

    /**
     * The value for the perluasan_ya field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $perluasan_ya;

    /**
     * The value for the is_approved field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $is_approved;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->pg_ya = 0;
        $this->pg_berkesah = 0;
        $this->pg_berseru = 0;
        $this->pg_berkidung = 0;
        $this->pg_baca_doa = 0;
        $this->ktb_ya = 0;
        $this->ktb_pl = 0;
        $this->ktb_pb = 0;
        $this->doa_ya = 0;
        $this->doa_pribadi = 0;
        $this->doa_syafaat = 0;
        $this->rohani_ya = 0;
        $this->sidang_ya = 0;
        $this->sidang_berdoa = 0;
        $this->sidang_tutur_sabda = 0;
        $this->ot_ya = 0;
        $this->ot_tel = 0;
        $this->ot_muka = 0;
        $this->jenguk_injil = 0;
        $this->jenguk_rawat = 0;
        $this->tugas_ya = 0;
        $this->perluasan_ya = 0;
        $this->is_approved = 1;
    }

    /**
     * Initializes internal state of BasePdnPonDetail object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [pon_header_id] column value.
     *
     * @return int
     */
    public function getPonHeaderId()
    {

        return $this->pon_header_id;
    }

    /**
     * Get the [hari_id] column value.
     *
     * @return int
     */
    public function getHariId()
    {

        return $this->hari_id;
    }

    /**
     * Get the [pg_ya] column value.
     *
     * @return int
     */
    public function getPgYa()
    {

        return $this->pg_ya;
    }

    /**
     * Get the [pg_durasi] column value.
     *
     * @return string
     */
    public function getPgDurasi()
    {

        return $this->pg_durasi;
    }

    /**
     * Get the [pg_berkesah] column value.
     *
     * @return int
     */
    public function getPgBerkesah()
    {

        return $this->pg_berkesah;
    }

    /**
     * Get the [pg_berseru] column value.
     *
     * @return int
     */
    public function getPgBerseru()
    {

        return $this->pg_berseru;
    }

    /**
     * Get the [pg_berkidung] column value.
     *
     * @return int
     */
    public function getPgBerkidung()
    {

        return $this->pg_berkidung;
    }

    /**
     * Get the [pg_baca_doa] column value.
     *
     * @return int
     */
    public function getPgBacaDoa()
    {

        return $this->pg_baca_doa;
    }

    /**
     * Get the [pg_catatan] column value.
     *
     * @return string
     */
    public function getPgCatatan()
    {

        return $this->pg_catatan;
    }

    /**
     * Get the [ktb_ya] column value.
     *
     * @return int
     */
    public function getKtbYa()
    {

        return $this->ktb_ya;
    }

    /**
     * Get the [ktb_pl] column value.
     *
     * @return int
     */
    public function getKtbPl()
    {

        return $this->ktb_pl;
    }

    /**
     * Get the [ktb_pb] column value.
     *
     * @return int
     */
    public function getKtbPb()
    {

        return $this->ktb_pb;
    }

    /**
     * Get the [ktb_durasi] column value.
     *
     * @return string
     */
    public function getKtbDurasi()
    {

        return $this->ktb_durasi;
    }

    /**
     * Get the [ktb_ayat] column value.
     *
     * @return string
     */
    public function getKtbAyat()
    {

        return $this->ktb_ayat;
    }

    /**
     * Get the [ktb_reading] column value.
     *
     * @return string
     */
    public function getKtbReading()
    {

        return $this->ktb_reading;
    }

    /**
     * Get the [ktb_center] column value.
     *
     * @return string
     */
    public function getKtbCenter()
    {

        return $this->ktb_center;
    }

    /**
     * Get the [ktb_supply] column value.
     *
     * @return string
     */
    public function getKtbSupply()
    {

        return $this->ktb_supply;
    }

    /**
     * Get the [ktb_catatan] column value.
     *
     * @return string
     */
    public function getKtbCatatan()
    {

        return $this->ktb_catatan;
    }

    /**
     * Get the [doa_ya] column value.
     *
     * @return int
     */
    public function getDoaYa()
    {

        return $this->doa_ya;
    }

    /**
     * Get the [doa_durasi] column value.
     *
     * @return string
     */
    public function getDoaDurasi()
    {

        return $this->doa_durasi;
    }

    /**
     * Get the [doa_pribadi] column value.
     *
     * @return int
     */
    public function getDoaPribadi()
    {

        return $this->doa_pribadi;
    }

    /**
     * Get the [doa_syafaat] column value.
     *
     * @return int
     */
    public function getDoaSyafaat()
    {

        return $this->doa_syafaat;
    }

    /**
     * Get the [doa_catatan] column value.
     *
     * @return string
     */
    public function getDoaCatatan()
    {

        return $this->doa_catatan;
    }

    /**
     * Get the [rohani_ya] column value.
     *
     * @return int
     */
    public function getRohaniYa()
    {

        return $this->rohani_ya;
    }

    /**
     * Get the [rohani_judul_buku] column value.
     *
     * @return string
     */
    public function getRohaniJudulBuku()
    {

        return $this->rohani_judul_buku;
    }

    /**
     * Get the [rohani_catatan] column value.
     *
     * @return string
     */
    public function getRohaniCatatan()
    {

        return $this->rohani_catatan;
    }

    /**
     * Get the [rohani_outline] column value.
     *
     * @return string
     */
    public function getRohaniOutline()
    {

        return $this->rohani_outline;
    }

    /**
     * Get the [sidang_ya] column value.
     *
     * @return int
     */
    public function getSidangYa()
    {

        return $this->sidang_ya;
    }

    /**
     * Get the [sidang_spr] column value.
     *
     * @return int
     */
    public function getSidangSpr()
    {

        return $this->sidang_spr;
    }

    /**
     * Get the [sidang_berdoa] column value.
     *
     * @return int
     */
    public function getSidangBerdoa()
    {

        return $this->sidang_berdoa;
    }

    /**
     * Get the [sidang_tutur_sabda] column value.
     *
     * @return int
     */
    public function getSidangTuturSabda()
    {

        return $this->sidang_tutur_sabda;
    }

    /**
     * Get the [sidang_doa] column value.
     *
     * @return int
     */
    public function getSidangDoa()
    {

        return $this->sidang_doa;
    }

    /**
     * Get the [sidang_kelompok] column value.
     *
     * @return int
     */
    public function getSidangKelompok()
    {

        return $this->sidang_kelompok;
    }

    /**
     * Get the [ot_ya] column value.
     *
     * @return int
     */
    public function getOtYa()
    {

        return $this->ot_ya;
    }

    /**
     * Get the [ot_tel] column value.
     *
     * @return int
     */
    public function getOtTel()
    {

        return $this->ot_tel;
    }

    /**
     * Get the [ot_muka] column value.
     *
     * @return int
     */
    public function getOtMuka()
    {

        return $this->ot_muka;
    }

    /**
     * Get the [jenguk_durasi] column value.
     *
     * @return string
     */
    public function getJengukDurasi()
    {

        return $this->jenguk_durasi;
    }

    /**
     * Get the [jenguk_injil] column value.
     *
     * @return int
     */
    public function getJengukInjil()
    {

        return $this->jenguk_injil;
    }

    /**
     * Get the [jenguk_rawat] column value.
     *
     * @return int
     */
    public function getJengukRawat()
    {

        return $this->jenguk_rawat;
    }

    /**
     * Get the [jenguk_catatan] column value.
     *
     * @return string
     */
    public function getJengukCatatan()
    {

        return $this->jenguk_catatan;
    }

    /**
     * Get the [tugas_ya] column value.
     *
     * @return int
     */
    public function getTugasYa()
    {

        return $this->tugas_ya;
    }

    /**
     * Get the [perluasan_ya] column value.
     *
     * @return int
     */
    public function getPerluasanYa()
    {

        return $this->perluasan_ya;
    }

    /**
     * Get the [is_approved] column value.
     *
     * @return int
     */
    public function getIsApproved()
    {

        return $this->is_approved;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [pon_header_id] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPonHeaderId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pon_header_id !== $v) {
            $this->pon_header_id = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PON_HEADER_ID;
        }


        return $this;
    } // setPonHeaderId()

    /**
     * Set the value of [hari_id] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setHariId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->hari_id !== $v) {
            $this->hari_id = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::HARI_ID;
        }


        return $this;
    } // setHariId()

    /**
     * Set the value of [pg_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pg_ya !== $v) {
            $this->pg_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_YA;
        }


        return $this;
    } // setPgYa()

    /**
     * Set the value of [pg_durasi] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgDurasi($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pg_durasi !== $v) {
            $this->pg_durasi = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_DURASI;
        }


        return $this;
    } // setPgDurasi()

    /**
     * Set the value of [pg_berkesah] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgBerkesah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pg_berkesah !== $v) {
            $this->pg_berkesah = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_BERKESAH;
        }


        return $this;
    } // setPgBerkesah()

    /**
     * Set the value of [pg_berseru] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgBerseru($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pg_berseru !== $v) {
            $this->pg_berseru = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_BERSERU;
        }


        return $this;
    } // setPgBerseru()

    /**
     * Set the value of [pg_berkidung] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgBerkidung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pg_berkidung !== $v) {
            $this->pg_berkidung = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_BERKIDUNG;
        }


        return $this;
    } // setPgBerkidung()

    /**
     * Set the value of [pg_baca_doa] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgBacaDoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pg_baca_doa !== $v) {
            $this->pg_baca_doa = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_BACA_DOA;
        }


        return $this;
    } // setPgBacaDoa()

    /**
     * Set the value of [pg_catatan] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPgCatatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pg_catatan !== $v) {
            $this->pg_catatan = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PG_CATATAN;
        }


        return $this;
    } // setPgCatatan()

    /**
     * Set the value of [ktb_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ktb_ya !== $v) {
            $this->ktb_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_YA;
        }


        return $this;
    } // setKtbYa()

    /**
     * Set the value of [ktb_pl] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbPl($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ktb_pl !== $v) {
            $this->ktb_pl = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_PL;
        }


        return $this;
    } // setKtbPl()

    /**
     * Set the value of [ktb_pb] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbPb($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ktb_pb !== $v) {
            $this->ktb_pb = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_PB;
        }


        return $this;
    } // setKtbPb()

    /**
     * Set the value of [ktb_durasi] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbDurasi($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_durasi !== $v) {
            $this->ktb_durasi = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_DURASI;
        }


        return $this;
    } // setKtbDurasi()

    /**
     * Set the value of [ktb_ayat] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbAyat($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_ayat !== $v) {
            $this->ktb_ayat = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_AYAT;
        }


        return $this;
    } // setKtbAyat()

    /**
     * Set the value of [ktb_reading] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbReading($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_reading !== $v) {
            $this->ktb_reading = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_READING;
        }


        return $this;
    } // setKtbReading()

    /**
     * Set the value of [ktb_center] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbCenter($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_center !== $v) {
            $this->ktb_center = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_CENTER;
        }


        return $this;
    } // setKtbCenter()

    /**
     * Set the value of [ktb_supply] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbSupply($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_supply !== $v) {
            $this->ktb_supply = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_SUPPLY;
        }


        return $this;
    } // setKtbSupply()

    /**
     * Set the value of [ktb_catatan] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setKtbCatatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_catatan !== $v) {
            $this->ktb_catatan = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::KTB_CATATAN;
        }


        return $this;
    } // setKtbCatatan()

    /**
     * Set the value of [doa_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setDoaYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->doa_ya !== $v) {
            $this->doa_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::DOA_YA;
        }


        return $this;
    } // setDoaYa()

    /**
     * Set the value of [doa_durasi] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setDoaDurasi($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->doa_durasi !== $v) {
            $this->doa_durasi = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::DOA_DURASI;
        }


        return $this;
    } // setDoaDurasi()

    /**
     * Set the value of [doa_pribadi] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setDoaPribadi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->doa_pribadi !== $v) {
            $this->doa_pribadi = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::DOA_PRIBADI;
        }


        return $this;
    } // setDoaPribadi()

    /**
     * Set the value of [doa_syafaat] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setDoaSyafaat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->doa_syafaat !== $v) {
            $this->doa_syafaat = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::DOA_SYAFAAT;
        }


        return $this;
    } // setDoaSyafaat()

    /**
     * Set the value of [doa_catatan] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setDoaCatatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->doa_catatan !== $v) {
            $this->doa_catatan = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::DOA_CATATAN;
        }


        return $this;
    } // setDoaCatatan()

    /**
     * Set the value of [rohani_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setRohaniYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->rohani_ya !== $v) {
            $this->rohani_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::ROHANI_YA;
        }


        return $this;
    } // setRohaniYa()

    /**
     * Set the value of [rohani_judul_buku] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setRohaniJudulBuku($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->rohani_judul_buku !== $v) {
            $this->rohani_judul_buku = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::ROHANI_JUDUL_BUKU;
        }


        return $this;
    } // setRohaniJudulBuku()

    /**
     * Set the value of [rohani_catatan] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setRohaniCatatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->rohani_catatan !== $v) {
            $this->rohani_catatan = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::ROHANI_CATATAN;
        }


        return $this;
    } // setRohaniCatatan()

    /**
     * Set the value of [rohani_outline] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setRohaniOutline($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->rohani_outline !== $v) {
            $this->rohani_outline = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::ROHANI_OUTLINE;
        }


        return $this;
    } // setRohaniOutline()

    /**
     * Set the value of [sidang_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_ya !== $v) {
            $this->sidang_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_YA;
        }


        return $this;
    } // setSidangYa()

    /**
     * Set the value of [sidang_spr] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangSpr($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_spr !== $v) {
            $this->sidang_spr = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_SPR;
        }


        return $this;
    } // setSidangSpr()

    /**
     * Set the value of [sidang_berdoa] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangBerdoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_berdoa !== $v) {
            $this->sidang_berdoa = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_BERDOA;
        }


        return $this;
    } // setSidangBerdoa()

    /**
     * Set the value of [sidang_tutur_sabda] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangTuturSabda($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_tutur_sabda !== $v) {
            $this->sidang_tutur_sabda = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_TUTUR_SABDA;
        }


        return $this;
    } // setSidangTuturSabda()

    /**
     * Set the value of [sidang_doa] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangDoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_doa !== $v) {
            $this->sidang_doa = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_DOA;
        }


        return $this;
    } // setSidangDoa()

    /**
     * Set the value of [sidang_kelompok] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setSidangKelompok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->sidang_kelompok !== $v) {
            $this->sidang_kelompok = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::SIDANG_KELOMPOK;
        }


        return $this;
    } // setSidangKelompok()

    /**
     * Set the value of [ot_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setOtYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ot_ya !== $v) {
            $this->ot_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::OT_YA;
        }


        return $this;
    } // setOtYa()

    /**
     * Set the value of [ot_tel] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setOtTel($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ot_tel !== $v) {
            $this->ot_tel = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::OT_TEL;
        }


        return $this;
    } // setOtTel()

    /**
     * Set the value of [ot_muka] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setOtMuka($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ot_muka !== $v) {
            $this->ot_muka = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::OT_MUKA;
        }


        return $this;
    } // setOtMuka()

    /**
     * Set the value of [jenguk_durasi] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setJengukDurasi($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->jenguk_durasi !== $v) {
            $this->jenguk_durasi = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::JENGUK_DURASI;
        }


        return $this;
    } // setJengukDurasi()

    /**
     * Set the value of [jenguk_injil] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setJengukInjil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->jenguk_injil !== $v) {
            $this->jenguk_injil = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::JENGUK_INJIL;
        }


        return $this;
    } // setJengukInjil()

    /**
     * Set the value of [jenguk_rawat] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setJengukRawat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->jenguk_rawat !== $v) {
            $this->jenguk_rawat = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::JENGUK_RAWAT;
        }


        return $this;
    } // setJengukRawat()

    /**
     * Set the value of [jenguk_catatan] column.
     *
     * @param  string $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setJengukCatatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->jenguk_catatan !== $v) {
            $this->jenguk_catatan = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::JENGUK_CATATAN;
        }


        return $this;
    } // setJengukCatatan()

    /**
     * Set the value of [tugas_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setTugasYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->tugas_ya !== $v) {
            $this->tugas_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::TUGAS_YA;
        }


        return $this;
    } // setTugasYa()

    /**
     * Set the value of [perluasan_ya] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setPerluasanYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->perluasan_ya !== $v) {
            $this->perluasan_ya = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::PERLUASAN_YA;
        }


        return $this;
    } // setPerluasanYa()

    /**
     * Set the value of [is_approved] column.
     *
     * @param  int $v new value
     * @return PdnPonDetail The current object (for fluent API support)
     */
    public function setIsApproved($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->is_approved !== $v) {
            $this->is_approved = $v;
            $this->modifiedColumns[] = PdnPonDetailPeer::IS_APPROVED;
        }


        return $this;
    } // setIsApproved()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        if ($this->pg_ya !== 0) {
            return false;
        }

        if ($this->pg_berkesah !== 0) {
            return false;
        }

        if ($this->pg_berseru !== 0) {
            return false;
        }

        if ($this->pg_berkidung !== 0) {
            return false;
        }

        if ($this->pg_baca_doa !== 0) {
            return false;
        }

        if ($this->ktb_ya !== 0) {
            return false;
        }

        if ($this->ktb_pl !== 0) {
            return false;
        }

        if ($this->ktb_pb !== 0) {
            return false;
        }

        if ($this->doa_ya !== 0) {
            return false;
        }

        if ($this->doa_pribadi !== 0) {
            return false;
        }

        if ($this->doa_syafaat !== 0) {
            return false;
        }

        if ($this->rohani_ya !== 0) {
            return false;
        }

        if ($this->sidang_ya !== 0) {
            return false;
        }

        if ($this->sidang_berdoa !== 0) {
            return false;
        }

        if ($this->sidang_tutur_sabda !== 0) {
            return false;
        }

        if ($this->ot_ya !== 0) {
            return false;
        }

        if ($this->ot_tel !== 0) {
            return false;
        }

        if ($this->ot_muka !== 0) {
            return false;
        }

        if ($this->jenguk_injil !== 0) {
            return false;
        }

        if ($this->jenguk_rawat !== 0) {
            return false;
        }

        if ($this->tugas_ya !== 0) {
            return false;
        }

        if ($this->perluasan_ya !== 0) {
            return false;
        }

        if ($this->is_approved !== 1) {
            return false;
        }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id = ($row[$startcol + 0] !== null) ? (int)$row[$startcol + 0] : null;
            $this->pon_header_id = ($row[$startcol + 1] !== null) ? (int)$row[$startcol + 1] : null;
            $this->hari_id = ($row[$startcol + 2] !== null) ? (int)$row[$startcol + 2] : null;
            $this->pg_ya = ($row[$startcol + 3] !== null) ? (int)$row[$startcol + 3] : null;
            $this->pg_durasi = ($row[$startcol + 4] !== null) ? (string)$row[$startcol + 4] : null;
            $this->pg_berkesah = ($row[$startcol + 5] !== null) ? (int)$row[$startcol + 5] : null;
            $this->pg_berseru = ($row[$startcol + 6] !== null) ? (int)$row[$startcol + 6] : null;
            $this->pg_berkidung = ($row[$startcol + 7] !== null) ? (int)$row[$startcol + 7] : null;
            $this->pg_baca_doa = ($row[$startcol + 8] !== null) ? (int)$row[$startcol + 8] : null;
            $this->pg_catatan = ($row[$startcol + 9] !== null) ? (string)$row[$startcol + 9] : null;
            $this->ktb_ya = ($row[$startcol + 10] !== null) ? (int)$row[$startcol + 10] : null;
            $this->ktb_pl = ($row[$startcol + 11] !== null) ? (int)$row[$startcol + 11] : null;
            $this->ktb_pb = ($row[$startcol + 12] !== null) ? (int)$row[$startcol + 12] : null;
            $this->ktb_durasi = ($row[$startcol + 13] !== null) ? (string)$row[$startcol + 13] : null;
            $this->ktb_ayat = ($row[$startcol + 14] !== null) ? (string)$row[$startcol + 14] : null;
            $this->ktb_reading = ($row[$startcol + 15] !== null) ? (string)$row[$startcol + 15] : null;
            $this->ktb_center = ($row[$startcol + 16] !== null) ? (string)$row[$startcol + 16] : null;
            $this->ktb_supply = ($row[$startcol + 17] !== null) ? (string)$row[$startcol + 17] : null;
            $this->ktb_catatan = ($row[$startcol + 18] !== null) ? (string)$row[$startcol + 18] : null;
            $this->doa_ya = ($row[$startcol + 19] !== null) ? (int)$row[$startcol + 19] : null;
            $this->doa_durasi = ($row[$startcol + 20] !== null) ? (string)$row[$startcol + 20] : null;
            $this->doa_pribadi = ($row[$startcol + 21] !== null) ? (int)$row[$startcol + 21] : null;
            $this->doa_syafaat = ($row[$startcol + 22] !== null) ? (int)$row[$startcol + 22] : null;
            $this->doa_catatan = ($row[$startcol + 23] !== null) ? (string)$row[$startcol + 23] : null;
            $this->rohani_ya = ($row[$startcol + 24] !== null) ? (int)$row[$startcol + 24] : null;
            $this->rohani_judul_buku = ($row[$startcol + 25] !== null) ? (string)$row[$startcol + 25] : null;
            $this->rohani_catatan = ($row[$startcol + 26] !== null) ? (string)$row[$startcol + 26] : null;
            $this->rohani_outline = ($row[$startcol + 27] !== null) ? (string)$row[$startcol + 27] : null;
            $this->sidang_ya = ($row[$startcol + 28] !== null) ? (int)$row[$startcol + 28] : null;
            $this->sidang_spr = ($row[$startcol + 29] !== null) ? (int)$row[$startcol + 29] : null;
            $this->sidang_berdoa = ($row[$startcol + 30] !== null) ? (int)$row[$startcol + 30] : null;
            $this->sidang_tutur_sabda = ($row[$startcol + 31] !== null) ? (int)$row[$startcol + 31] : null;
            $this->sidang_doa = ($row[$startcol + 32] !== null) ? (int)$row[$startcol + 32] : null;
            $this->sidang_kelompok = ($row[$startcol + 33] !== null) ? (int)$row[$startcol + 33] : null;
            $this->ot_ya = ($row[$startcol + 34] !== null) ? (int)$row[$startcol + 34] : null;
            $this->ot_tel = ($row[$startcol + 35] !== null) ? (int)$row[$startcol + 35] : null;
            $this->ot_muka = ($row[$startcol + 36] !== null) ? (int)$row[$startcol + 36] : null;
            $this->jenguk_durasi = ($row[$startcol + 37] !== null) ? (string)$row[$startcol + 37] : null;
            $this->jenguk_injil = ($row[$startcol + 38] !== null) ? (int)$row[$startcol + 38] : null;
            $this->jenguk_rawat = ($row[$startcol + 39] !== null) ? (int)$row[$startcol + 39] : null;
            $this->jenguk_catatan = ($row[$startcol + 40] !== null) ? (string)$row[$startcol + 40] : null;
            $this->tugas_ya = ($row[$startcol + 41] !== null) ? (int)$row[$startcol + 41] : null;
            $this->perluasan_ya = ($row[$startcol + 42] !== null) ? (int)$row[$startcol + 42] : null;
            $this->is_approved = ($row[$startcol + 43] !== null) ? (int)$row[$startcol + 43] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 44; // 44 = PdnPonDetailPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PdnPonDetail object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PdnPonDetailPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) { // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PdnPonDetailQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PdnPonDetailPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = PdnPonDetailPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnPonDetailPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PdnPonDetailPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PON_HEADER_ID)) {
            $modifiedColumns[':p' . $index++] = '`pon_header_id`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::HARI_ID)) {
            $modifiedColumns[':p' . $index++] = '`hari_id`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_YA)) {
            $modifiedColumns[':p' . $index++] = '`pg_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_DURASI)) {
            $modifiedColumns[':p' . $index++] = '`pg_durasi`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERKESAH)) {
            $modifiedColumns[':p' . $index++] = '`pg_berkesah`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERSERU)) {
            $modifiedColumns[':p' . $index++] = '`pg_berseru`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERKIDUNG)) {
            $modifiedColumns[':p' . $index++] = '`pg_berkidung`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BACA_DOA)) {
            $modifiedColumns[':p' . $index++] = '`pg_baca_doa`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PG_CATATAN)) {
            $modifiedColumns[':p' . $index++] = '`pg_catatan`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_YA)) {
            $modifiedColumns[':p' . $index++] = '`ktb_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_PL)) {
            $modifiedColumns[':p' . $index++] = '`ktb_pl`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_PB)) {
            $modifiedColumns[':p' . $index++] = '`ktb_pb`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_DURASI)) {
            $modifiedColumns[':p' . $index++] = '`ktb_durasi`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_AYAT)) {
            $modifiedColumns[':p' . $index++] = '`ktb_ayat`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_READING)) {
            $modifiedColumns[':p' . $index++] = '`ktb_reading`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_CENTER)) {
            $modifiedColumns[':p' . $index++] = '`ktb_center`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_SUPPLY)) {
            $modifiedColumns[':p' . $index++] = '`ktb_supply`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_CATATAN)) {
            $modifiedColumns[':p' . $index++] = '`ktb_catatan`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_YA)) {
            $modifiedColumns[':p' . $index++] = '`doa_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_DURASI)) {
            $modifiedColumns[':p' . $index++] = '`doa_durasi`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_PRIBADI)) {
            $modifiedColumns[':p' . $index++] = '`doa_pribadi`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_SYAFAAT)) {
            $modifiedColumns[':p' . $index++] = '`doa_syafaat`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_CATATAN)) {
            $modifiedColumns[':p' . $index++] = '`doa_catatan`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_YA)) {
            $modifiedColumns[':p' . $index++] = '`rohani_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_JUDUL_BUKU)) {
            $modifiedColumns[':p' . $index++] = '`rohani_judul_buku`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_CATATAN)) {
            $modifiedColumns[':p' . $index++] = '`rohani_catatan`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_OUTLINE)) {
            $modifiedColumns[':p' . $index++] = '`rohani_outline`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_YA)) {
            $modifiedColumns[':p' . $index++] = '`sidang_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_SPR)) {
            $modifiedColumns[':p' . $index++] = '`sidang_spr`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_BERDOA)) {
            $modifiedColumns[':p' . $index++] = '`sidang_berdoa`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_TUTUR_SABDA)) {
            $modifiedColumns[':p' . $index++] = '`sidang_tutur_sabda`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_DOA)) {
            $modifiedColumns[':p' . $index++] = '`sidang_doa`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_KELOMPOK)) {
            $modifiedColumns[':p' . $index++] = '`sidang_kelompok`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::OT_YA)) {
            $modifiedColumns[':p' . $index++] = '`ot_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::OT_TEL)) {
            $modifiedColumns[':p' . $index++] = '`ot_tel`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::OT_MUKA)) {
            $modifiedColumns[':p' . $index++] = '`ot_muka`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_DURASI)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_durasi`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_INJIL)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_injil`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_RAWAT)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_rawat`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_CATATAN)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_catatan`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::TUGAS_YA)) {
            $modifiedColumns[':p' . $index++] = '`tugas_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::PERLUASAN_YA)) {
            $modifiedColumns[':p' . $index++] = '`perluasan_ya`';
        }
        if ($this->isColumnModified(PdnPonDetailPeer::IS_APPROVED)) {
            $modifiedColumns[':p' . $index++] = '`is_approved`';
        }

        $sql = sprintf(
            'INSERT INTO `pdn_pon_detail` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`pon_header_id`':
                        $stmt->bindValue($identifier, $this->pon_header_id, PDO::PARAM_INT);
                        break;
                    case '`hari_id`':
                        $stmt->bindValue($identifier, $this->hari_id, PDO::PARAM_INT);
                        break;
                    case '`pg_ya`':
                        $stmt->bindValue($identifier, $this->pg_ya, PDO::PARAM_INT);
                        break;
                    case '`pg_durasi`':
                        $stmt->bindValue($identifier, $this->pg_durasi, PDO::PARAM_STR);
                        break;
                    case '`pg_berkesah`':
                        $stmt->bindValue($identifier, $this->pg_berkesah, PDO::PARAM_INT);
                        break;
                    case '`pg_berseru`':
                        $stmt->bindValue($identifier, $this->pg_berseru, PDO::PARAM_INT);
                        break;
                    case '`pg_berkidung`':
                        $stmt->bindValue($identifier, $this->pg_berkidung, PDO::PARAM_INT);
                        break;
                    case '`pg_baca_doa`':
                        $stmt->bindValue($identifier, $this->pg_baca_doa, PDO::PARAM_INT);
                        break;
                    case '`pg_catatan`':
                        $stmt->bindValue($identifier, $this->pg_catatan, PDO::PARAM_STR);
                        break;
                    case '`ktb_ya`':
                        $stmt->bindValue($identifier, $this->ktb_ya, PDO::PARAM_INT);
                        break;
                    case '`ktb_pl`':
                        $stmt->bindValue($identifier, $this->ktb_pl, PDO::PARAM_INT);
                        break;
                    case '`ktb_pb`':
                        $stmt->bindValue($identifier, $this->ktb_pb, PDO::PARAM_INT);
                        break;
                    case '`ktb_durasi`':
                        $stmt->bindValue($identifier, $this->ktb_durasi, PDO::PARAM_STR);
                        break;
                    case '`ktb_ayat`':
                        $stmt->bindValue($identifier, $this->ktb_ayat, PDO::PARAM_STR);
                        break;
                    case '`ktb_reading`':
                        $stmt->bindValue($identifier, $this->ktb_reading, PDO::PARAM_STR);
                        break;
                    case '`ktb_center`':
                        $stmt->bindValue($identifier, $this->ktb_center, PDO::PARAM_STR);
                        break;
                    case '`ktb_supply`':
                        $stmt->bindValue($identifier, $this->ktb_supply, PDO::PARAM_STR);
                        break;
                    case '`ktb_catatan`':
                        $stmt->bindValue($identifier, $this->ktb_catatan, PDO::PARAM_STR);
                        break;
                    case '`doa_ya`':
                        $stmt->bindValue($identifier, $this->doa_ya, PDO::PARAM_INT);
                        break;
                    case '`doa_durasi`':
                        $stmt->bindValue($identifier, $this->doa_durasi, PDO::PARAM_STR);
                        break;
                    case '`doa_pribadi`':
                        $stmt->bindValue($identifier, $this->doa_pribadi, PDO::PARAM_INT);
                        break;
                    case '`doa_syafaat`':
                        $stmt->bindValue($identifier, $this->doa_syafaat, PDO::PARAM_INT);
                        break;
                    case '`doa_catatan`':
                        $stmt->bindValue($identifier, $this->doa_catatan, PDO::PARAM_STR);
                        break;
                    case '`rohani_ya`':
                        $stmt->bindValue($identifier, $this->rohani_ya, PDO::PARAM_INT);
                        break;
                    case '`rohani_judul_buku`':
                        $stmt->bindValue($identifier, $this->rohani_judul_buku, PDO::PARAM_STR);
                        break;
                    case '`rohani_catatan`':
                        $stmt->bindValue($identifier, $this->rohani_catatan, PDO::PARAM_STR);
                        break;
                    case '`rohani_outline`':
                        $stmt->bindValue($identifier, $this->rohani_outline, PDO::PARAM_STR);
                        break;
                    case '`sidang_ya`':
                        $stmt->bindValue($identifier, $this->sidang_ya, PDO::PARAM_INT);
                        break;
                    case '`sidang_spr`':
                        $stmt->bindValue($identifier, $this->sidang_spr, PDO::PARAM_INT);
                        break;
                    case '`sidang_berdoa`':
                        $stmt->bindValue($identifier, $this->sidang_berdoa, PDO::PARAM_INT);
                        break;
                    case '`sidang_tutur_sabda`':
                        $stmt->bindValue($identifier, $this->sidang_tutur_sabda, PDO::PARAM_INT);
                        break;
                    case '`sidang_doa`':
                        $stmt->bindValue($identifier, $this->sidang_doa, PDO::PARAM_INT);
                        break;
                    case '`sidang_kelompok`':
                        $stmt->bindValue($identifier, $this->sidang_kelompok, PDO::PARAM_INT);
                        break;
                    case '`ot_ya`':
                        $stmt->bindValue($identifier, $this->ot_ya, PDO::PARAM_INT);
                        break;
                    case '`ot_tel`':
                        $stmt->bindValue($identifier, $this->ot_tel, PDO::PARAM_INT);
                        break;
                    case '`ot_muka`':
                        $stmt->bindValue($identifier, $this->ot_muka, PDO::PARAM_INT);
                        break;
                    case '`jenguk_durasi`':
                        $stmt->bindValue($identifier, $this->jenguk_durasi, PDO::PARAM_STR);
                        break;
                    case '`jenguk_injil`':
                        $stmt->bindValue($identifier, $this->jenguk_injil, PDO::PARAM_INT);
                        break;
                    case '`jenguk_rawat`':
                        $stmt->bindValue($identifier, $this->jenguk_rawat, PDO::PARAM_INT);
                        break;
                    case '`jenguk_catatan`':
                        $stmt->bindValue($identifier, $this->jenguk_catatan, PDO::PARAM_STR);
                        break;
                    case '`tugas_ya`':
                        $stmt->bindValue($identifier, $this->tugas_ya, PDO::PARAM_INT);
                        break;
                    case '`perluasan_ya`':
                        $stmt->bindValue($identifier, $this->perluasan_ya, PDO::PARAM_INT);
                        break;
                    case '`is_approved`':
                        $stmt->bindValue($identifier, $this->is_approved, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = PdnPonDetailPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PdnPonDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getPonHeaderId();
                break;
            case 2:
                return $this->getHariId();
                break;
            case 3:
                return $this->getPgYa();
                break;
            case 4:
                return $this->getPgDurasi();
                break;
            case 5:
                return $this->getPgBerkesah();
                break;
            case 6:
                return $this->getPgBerseru();
                break;
            case 7:
                return $this->getPgBerkidung();
                break;
            case 8:
                return $this->getPgBacaDoa();
                break;
            case 9:
                return $this->getPgCatatan();
                break;
            case 10:
                return $this->getKtbYa();
                break;
            case 11:
                return $this->getKtbPl();
                break;
            case 12:
                return $this->getKtbPb();
                break;
            case 13:
                return $this->getKtbDurasi();
                break;
            case 14:
                return $this->getKtbAyat();
                break;
            case 15:
                return $this->getKtbReading();
                break;
            case 16:
                return $this->getKtbCenter();
                break;
            case 17:
                return $this->getKtbSupply();
                break;
            case 18:
                return $this->getKtbCatatan();
                break;
            case 19:
                return $this->getDoaYa();
                break;
            case 20:
                return $this->getDoaDurasi();
                break;
            case 21:
                return $this->getDoaPribadi();
                break;
            case 22:
                return $this->getDoaSyafaat();
                break;
            case 23:
                return $this->getDoaCatatan();
                break;
            case 24:
                return $this->getRohaniYa();
                break;
            case 25:
                return $this->getRohaniJudulBuku();
                break;
            case 26:
                return $this->getRohaniCatatan();
                break;
            case 27:
                return $this->getRohaniOutline();
                break;
            case 28:
                return $this->getSidangYa();
                break;
            case 29:
                return $this->getSidangSpr();
                break;
            case 30:
                return $this->getSidangBerdoa();
                break;
            case 31:
                return $this->getSidangTuturSabda();
                break;
            case 32:
                return $this->getSidangDoa();
                break;
            case 33:
                return $this->getSidangKelompok();
                break;
            case 34:
                return $this->getOtYa();
                break;
            case 35:
                return $this->getOtTel();
                break;
            case 36:
                return $this->getOtMuka();
                break;
            case 37:
                return $this->getJengukDurasi();
                break;
            case 38:
                return $this->getJengukInjil();
                break;
            case 39:
                return $this->getJengukRawat();
                break;
            case 40:
                return $this->getJengukCatatan();
                break;
            case 41:
                return $this->getTugasYa();
                break;
            case 42:
                return $this->getPerluasanYa();
                break;
            case 43:
                return $this->getIsApproved();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray(
        $keyType = BasePeer::TYPE_PHPNAME,
        $includeLazyLoadColumns = true,
        $alreadyDumpedObjects = array()
    ) {
        if (isset($alreadyDumpedObjects['PdnPonDetail'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PdnPonDetail'][$this->getPrimaryKey()] = true;
        $keys = PdnPonDetailPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getPonHeaderId(),
            $keys[2] => $this->getHariId(),
            $keys[3] => $this->getPgYa(),
            $keys[4] => $this->getPgDurasi(),
            $keys[5] => $this->getPgBerkesah(),
            $keys[6] => $this->getPgBerseru(),
            $keys[7] => $this->getPgBerkidung(),
            $keys[8] => $this->getPgBacaDoa(),
            $keys[9] => $this->getPgCatatan(),
            $keys[10] => $this->getKtbYa(),
            $keys[11] => $this->getKtbPl(),
            $keys[12] => $this->getKtbPb(),
            $keys[13] => $this->getKtbDurasi(),
            $keys[14] => $this->getKtbAyat(),
            $keys[15] => $this->getKtbReading(),
            $keys[16] => $this->getKtbCenter(),
            $keys[17] => $this->getKtbSupply(),
            $keys[18] => $this->getKtbCatatan(),
            $keys[19] => $this->getDoaYa(),
            $keys[20] => $this->getDoaDurasi(),
            $keys[21] => $this->getDoaPribadi(),
            $keys[22] => $this->getDoaSyafaat(),
            $keys[23] => $this->getDoaCatatan(),
            $keys[24] => $this->getRohaniYa(),
            $keys[25] => $this->getRohaniJudulBuku(),
            $keys[26] => $this->getRohaniCatatan(),
            $keys[27] => $this->getRohaniOutline(),
            $keys[28] => $this->getSidangYa(),
            $keys[29] => $this->getSidangSpr(),
            $keys[30] => $this->getSidangBerdoa(),
            $keys[31] => $this->getSidangTuturSabda(),
            $keys[32] => $this->getSidangDoa(),
            $keys[33] => $this->getSidangKelompok(),
            $keys[34] => $this->getOtYa(),
            $keys[35] => $this->getOtTel(),
            $keys[36] => $this->getOtMuka(),
            $keys[37] => $this->getJengukDurasi(),
            $keys[38] => $this->getJengukInjil(),
            $keys[39] => $this->getJengukRawat(),
            $keys[40] => $this->getJengukCatatan(),
            $keys[41] => $this->getTugasYa(),
            $keys[42] => $this->getPerluasanYa(),
            $keys[43] => $this->getIsApproved(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }


        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = PdnPonDetailPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setPonHeaderId($value);
                break;
            case 2:
                $this->setHariId($value);
                break;
            case 3:
                $this->setPgYa($value);
                break;
            case 4:
                $this->setPgDurasi($value);
                break;
            case 5:
                $this->setPgBerkesah($value);
                break;
            case 6:
                $this->setPgBerseru($value);
                break;
            case 7:
                $this->setPgBerkidung($value);
                break;
            case 8:
                $this->setPgBacaDoa($value);
                break;
            case 9:
                $this->setPgCatatan($value);
                break;
            case 10:
                $this->setKtbYa($value);
                break;
            case 11:
                $this->setKtbPl($value);
                break;
            case 12:
                $this->setKtbPb($value);
                break;
            case 13:
                $this->setKtbDurasi($value);
                break;
            case 14:
                $this->setKtbAyat($value);
                break;
            case 15:
                $this->setKtbReading($value);
                break;
            case 16:
                $this->setKtbCenter($value);
                break;
            case 17:
                $this->setKtbSupply($value);
                break;
            case 18:
                $this->setKtbCatatan($value);
                break;
            case 19:
                $this->setDoaYa($value);
                break;
            case 20:
                $this->setDoaDurasi($value);
                break;
            case 21:
                $this->setDoaPribadi($value);
                break;
            case 22:
                $this->setDoaSyafaat($value);
                break;
            case 23:
                $this->setDoaCatatan($value);
                break;
            case 24:
                $this->setRohaniYa($value);
                break;
            case 25:
                $this->setRohaniJudulBuku($value);
                break;
            case 26:
                $this->setRohaniCatatan($value);
                break;
            case 27:
                $this->setRohaniOutline($value);
                break;
            case 28:
                $this->setSidangYa($value);
                break;
            case 29:
                $this->setSidangSpr($value);
                break;
            case 30:
                $this->setSidangBerdoa($value);
                break;
            case 31:
                $this->setSidangTuturSabda($value);
                break;
            case 32:
                $this->setSidangDoa($value);
                break;
            case 33:
                $this->setSidangKelompok($value);
                break;
            case 34:
                $this->setOtYa($value);
                break;
            case 35:
                $this->setOtTel($value);
                break;
            case 36:
                $this->setOtMuka($value);
                break;
            case 37:
                $this->setJengukDurasi($value);
                break;
            case 38:
                $this->setJengukInjil($value);
                break;
            case 39:
                $this->setJengukRawat($value);
                break;
            case 40:
                $this->setJengukCatatan($value);
                break;
            case 41:
                $this->setTugasYa($value);
                break;
            case 42:
                $this->setPerluasanYa($value);
                break;
            case 43:
                $this->setIsApproved($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array $arr An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = PdnPonDetailPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setPonHeaderId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setHariId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPgYa($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPgDurasi($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setPgBerkesah($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPgBerseru($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPgBerkidung($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPgBacaDoa($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPgCatatan($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setKtbYa($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setKtbPl($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setKtbPb($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setKtbDurasi($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setKtbAyat($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setKtbReading($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setKtbCenter($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKtbSupply($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setKtbCatatan($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setDoaYa($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setDoaDurasi($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setDoaPribadi($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setDoaSyafaat($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setDoaCatatan($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setRohaniYa($arr[$keys[24]]);
        if (array_key_exists($keys[25], $arr)) $this->setRohaniJudulBuku($arr[$keys[25]]);
        if (array_key_exists($keys[26], $arr)) $this->setRohaniCatatan($arr[$keys[26]]);
        if (array_key_exists($keys[27], $arr)) $this->setRohaniOutline($arr[$keys[27]]);
        if (array_key_exists($keys[28], $arr)) $this->setSidangYa($arr[$keys[28]]);
        if (array_key_exists($keys[29], $arr)) $this->setSidangSpr($arr[$keys[29]]);
        if (array_key_exists($keys[30], $arr)) $this->setSidangBerdoa($arr[$keys[30]]);
        if (array_key_exists($keys[31], $arr)) $this->setSidangTuturSabda($arr[$keys[31]]);
        if (array_key_exists($keys[32], $arr)) $this->setSidangDoa($arr[$keys[32]]);
        if (array_key_exists($keys[33], $arr)) $this->setSidangKelompok($arr[$keys[33]]);
        if (array_key_exists($keys[34], $arr)) $this->setOtYa($arr[$keys[34]]);
        if (array_key_exists($keys[35], $arr)) $this->setOtTel($arr[$keys[35]]);
        if (array_key_exists($keys[36], $arr)) $this->setOtMuka($arr[$keys[36]]);
        if (array_key_exists($keys[37], $arr)) $this->setJengukDurasi($arr[$keys[37]]);
        if (array_key_exists($keys[38], $arr)) $this->setJengukInjil($arr[$keys[38]]);
        if (array_key_exists($keys[39], $arr)) $this->setJengukRawat($arr[$keys[39]]);
        if (array_key_exists($keys[40], $arr)) $this->setJengukCatatan($arr[$keys[40]]);
        if (array_key_exists($keys[41], $arr)) $this->setTugasYa($arr[$keys[41]]);
        if (array_key_exists($keys[42], $arr)) $this->setPerluasanYa($arr[$keys[42]]);
        if (array_key_exists($keys[43], $arr)) $this->setIsApproved($arr[$keys[43]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);

        if ($this->isColumnModified(PdnPonDetailPeer::ID)) $criteria->add(PdnPonDetailPeer::ID, $this->id);
        if ($this->isColumnModified(PdnPonDetailPeer::PON_HEADER_ID)) $criteria->add(
            PdnPonDetailPeer::PON_HEADER_ID,
            $this->pon_header_id
        );
        if ($this->isColumnModified(PdnPonDetailPeer::HARI_ID)) $criteria->add(
            PdnPonDetailPeer::HARI_ID,
            $this->hari_id
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_YA)) $criteria->add(PdnPonDetailPeer::PG_YA, $this->pg_ya);
        if ($this->isColumnModified(PdnPonDetailPeer::PG_DURASI)) $criteria->add(
            PdnPonDetailPeer::PG_DURASI,
            $this->pg_durasi
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERKESAH)) $criteria->add(
            PdnPonDetailPeer::PG_BERKESAH,
            $this->pg_berkesah
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERSERU)) $criteria->add(
            PdnPonDetailPeer::PG_BERSERU,
            $this->pg_berseru
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BERKIDUNG)) $criteria->add(
            PdnPonDetailPeer::PG_BERKIDUNG,
            $this->pg_berkidung
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_BACA_DOA)) $criteria->add(
            PdnPonDetailPeer::PG_BACA_DOA,
            $this->pg_baca_doa
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PG_CATATAN)) $criteria->add(
            PdnPonDetailPeer::PG_CATATAN,
            $this->pg_catatan
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_YA)) $criteria->add(PdnPonDetailPeer::KTB_YA, $this->ktb_ya);
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_PL)) $criteria->add(PdnPonDetailPeer::KTB_PL, $this->ktb_pl);
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_PB)) $criteria->add(PdnPonDetailPeer::KTB_PB, $this->ktb_pb);
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_DURASI)) $criteria->add(
            PdnPonDetailPeer::KTB_DURASI,
            $this->ktb_durasi
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_AYAT)) $criteria->add(
            PdnPonDetailPeer::KTB_AYAT,
            $this->ktb_ayat
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_READING)) $criteria->add(
            PdnPonDetailPeer::KTB_READING,
            $this->ktb_reading
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_CENTER)) $criteria->add(
            PdnPonDetailPeer::KTB_CENTER,
            $this->ktb_center
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_SUPPLY)) $criteria->add(
            PdnPonDetailPeer::KTB_SUPPLY,
            $this->ktb_supply
        );
        if ($this->isColumnModified(PdnPonDetailPeer::KTB_CATATAN)) $criteria->add(
            PdnPonDetailPeer::KTB_CATATAN,
            $this->ktb_catatan
        );
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_YA)) $criteria->add(PdnPonDetailPeer::DOA_YA, $this->doa_ya);
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_DURASI)) $criteria->add(
            PdnPonDetailPeer::DOA_DURASI,
            $this->doa_durasi
        );
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_PRIBADI)) $criteria->add(
            PdnPonDetailPeer::DOA_PRIBADI,
            $this->doa_pribadi
        );
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_SYAFAAT)) $criteria->add(
            PdnPonDetailPeer::DOA_SYAFAAT,
            $this->doa_syafaat
        );
        if ($this->isColumnModified(PdnPonDetailPeer::DOA_CATATAN)) $criteria->add(
            PdnPonDetailPeer::DOA_CATATAN,
            $this->doa_catatan
        );
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_YA)) $criteria->add(
            PdnPonDetailPeer::ROHANI_YA,
            $this->rohani_ya
        );
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_JUDUL_BUKU)) $criteria->add(
            PdnPonDetailPeer::ROHANI_JUDUL_BUKU,
            $this->rohani_judul_buku
        );
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_CATATAN)) $criteria->add(
            PdnPonDetailPeer::ROHANI_CATATAN,
            $this->rohani_catatan
        );
        if ($this->isColumnModified(PdnPonDetailPeer::ROHANI_OUTLINE)) $criteria->add(
            PdnPonDetailPeer::ROHANI_OUTLINE,
            $this->rohani_outline
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_YA)) $criteria->add(
            PdnPonDetailPeer::SIDANG_YA,
            $this->sidang_ya
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_SPR)) $criteria->add(
            PdnPonDetailPeer::SIDANG_SPR,
            $this->sidang_spr
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_BERDOA)) $criteria->add(
            PdnPonDetailPeer::SIDANG_BERDOA,
            $this->sidang_berdoa
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_TUTUR_SABDA)) $criteria->add(
            PdnPonDetailPeer::SIDANG_TUTUR_SABDA,
            $this->sidang_tutur_sabda
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_DOA)) $criteria->add(
            PdnPonDetailPeer::SIDANG_DOA,
            $this->sidang_doa
        );
        if ($this->isColumnModified(PdnPonDetailPeer::SIDANG_KELOMPOK)) $criteria->add(
            PdnPonDetailPeer::SIDANG_KELOMPOK,
            $this->sidang_kelompok
        );
        if ($this->isColumnModified(PdnPonDetailPeer::OT_YA)) $criteria->add(PdnPonDetailPeer::OT_YA, $this->ot_ya);
        if ($this->isColumnModified(PdnPonDetailPeer::OT_TEL)) $criteria->add(PdnPonDetailPeer::OT_TEL, $this->ot_tel);
        if ($this->isColumnModified(PdnPonDetailPeer::OT_MUKA)) $criteria->add(
            PdnPonDetailPeer::OT_MUKA,
            $this->ot_muka
        );
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_DURASI)) $criteria->add(
            PdnPonDetailPeer::JENGUK_DURASI,
            $this->jenguk_durasi
        );
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_INJIL)) $criteria->add(
            PdnPonDetailPeer::JENGUK_INJIL,
            $this->jenguk_injil
        );
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_RAWAT)) $criteria->add(
            PdnPonDetailPeer::JENGUK_RAWAT,
            $this->jenguk_rawat
        );
        if ($this->isColumnModified(PdnPonDetailPeer::JENGUK_CATATAN)) $criteria->add(
            PdnPonDetailPeer::JENGUK_CATATAN,
            $this->jenguk_catatan
        );
        if ($this->isColumnModified(PdnPonDetailPeer::TUGAS_YA)) $criteria->add(
            PdnPonDetailPeer::TUGAS_YA,
            $this->tugas_ya
        );
        if ($this->isColumnModified(PdnPonDetailPeer::PERLUASAN_YA)) $criteria->add(
            PdnPonDetailPeer::PERLUASAN_YA,
            $this->perluasan_ya
        );
        if ($this->isColumnModified(PdnPonDetailPeer::IS_APPROVED)) $criteria->add(
            PdnPonDetailPeer::IS_APPROVED,
            $this->is_approved
        );

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(PdnPonDetailPeer::DATABASE_NAME);
        $criteria->add(PdnPonDetailPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PdnPonDetail (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPonHeaderId($this->getPonHeaderId());
        $copyObj->setHariId($this->getHariId());
        $copyObj->setPgYa($this->getPgYa());
        $copyObj->setPgDurasi($this->getPgDurasi());
        $copyObj->setPgBerkesah($this->getPgBerkesah());
        $copyObj->setPgBerseru($this->getPgBerseru());
        $copyObj->setPgBerkidung($this->getPgBerkidung());
        $copyObj->setPgBacaDoa($this->getPgBacaDoa());
        $copyObj->setPgCatatan($this->getPgCatatan());
        $copyObj->setKtbYa($this->getKtbYa());
        $copyObj->setKtbPl($this->getKtbPl());
        $copyObj->setKtbPb($this->getKtbPb());
        $copyObj->setKtbDurasi($this->getKtbDurasi());
        $copyObj->setKtbAyat($this->getKtbAyat());
        $copyObj->setKtbReading($this->getKtbReading());
        $copyObj->setKtbCenter($this->getKtbCenter());
        $copyObj->setKtbSupply($this->getKtbSupply());
        $copyObj->setKtbCatatan($this->getKtbCatatan());
        $copyObj->setDoaYa($this->getDoaYa());
        $copyObj->setDoaDurasi($this->getDoaDurasi());
        $copyObj->setDoaPribadi($this->getDoaPribadi());
        $copyObj->setDoaSyafaat($this->getDoaSyafaat());
        $copyObj->setDoaCatatan($this->getDoaCatatan());
        $copyObj->setRohaniYa($this->getRohaniYa());
        $copyObj->setRohaniJudulBuku($this->getRohaniJudulBuku());
        $copyObj->setRohaniCatatan($this->getRohaniCatatan());
        $copyObj->setRohaniOutline($this->getRohaniOutline());
        $copyObj->setSidangYa($this->getSidangYa());
        $copyObj->setSidangSpr($this->getSidangSpr());
        $copyObj->setSidangBerdoa($this->getSidangBerdoa());
        $copyObj->setSidangTuturSabda($this->getSidangTuturSabda());
        $copyObj->setSidangDoa($this->getSidangDoa());
        $copyObj->setSidangKelompok($this->getSidangKelompok());
        $copyObj->setOtYa($this->getOtYa());
        $copyObj->setOtTel($this->getOtTel());
        $copyObj->setOtMuka($this->getOtMuka());
        $copyObj->setJengukDurasi($this->getJengukDurasi());
        $copyObj->setJengukInjil($this->getJengukInjil());
        $copyObj->setJengukRawat($this->getJengukRawat());
        $copyObj->setJengukCatatan($this->getJengukCatatan());
        $copyObj->setTugasYa($this->getTugasYa());
        $copyObj->setPerluasanYa($this->getPerluasanYa());
        $copyObj->setIsApproved($this->getIsApproved());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(null); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return PdnPonDetail Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return PdnPonDetailPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PdnPonDetailPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->pon_header_id = null;
        $this->hari_id = null;
        $this->pg_ya = null;
        $this->pg_durasi = null;
        $this->pg_berkesah = null;
        $this->pg_berseru = null;
        $this->pg_berkidung = null;
        $this->pg_baca_doa = null;
        $this->pg_catatan = null;
        $this->ktb_ya = null;
        $this->ktb_pl = null;
        $this->ktb_pb = null;
        $this->ktb_durasi = null;
        $this->ktb_ayat = null;
        $this->ktb_reading = null;
        $this->ktb_center = null;
        $this->ktb_supply = null;
        $this->ktb_catatan = null;
        $this->doa_ya = null;
        $this->doa_durasi = null;
        $this->doa_pribadi = null;
        $this->doa_syafaat = null;
        $this->doa_catatan = null;
        $this->rohani_ya = null;
        $this->rohani_judul_buku = null;
        $this->rohani_catatan = null;
        $this->rohani_outline = null;
        $this->sidang_ya = null;
        $this->sidang_spr = null;
        $this->sidang_berdoa = null;
        $this->sidang_tutur_sabda = null;
        $this->sidang_doa = null;
        $this->sidang_kelompok = null;
        $this->ot_ya = null;
        $this->ot_tel = null;
        $this->ot_muka = null;
        $this->jenguk_durasi = null;
        $this->jenguk_injil = null;
        $this->jenguk_rawat = null;
        $this->jenguk_catatan = null;
        $this->tugas_ya = null;
        $this->perluasan_ya = null;
        $this->is_approved = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->exportTo(PdnPonDetailPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
