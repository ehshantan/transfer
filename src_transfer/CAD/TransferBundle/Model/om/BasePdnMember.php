<?php

namespace CAD\TransferBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\PdnMember;
use CAD\TransferBundle\Model\PdnMemberPeer;
use CAD\TransferBundle\Model\PdnMemberQuery;

abstract class BasePdnMember extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\PdnMemberPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PdnMemberPeer
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
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the realname field.
     * @var        string
     */
    protected $realname;

    /**
     * The value for the angkatan field.
     * @var        string
     */
    protected $angkatan;

    /**
     * The value for the hall field.
     * @var        string
     */
    protected $hall;

    /**
     * The value for the lokasi field.
     * @var        string
     */
    protected $lokasi;

    /**
     * The value for the telepon field.
     * @var        string
     */
    protected $telepon;

    /**
     * The value for the handphone field.
     * @var        string
     */
    protected $handphone;

    /**
     * The value for the handphone_2 field.
     * @var        string
     */
    protected $handphone_2;

    /**
     * The value for the id_member field.
     * @var        string
     */
    protected $id_member;

    /**
     * The value for the alamat field.
     * @var        string
     */
    protected $alamat;

    /**
     * The value for the is_approved field.
     * @var        int
     */
    protected $is_approved;

    /**
     * The value for the last_login field.
     * @var        string
     */
    protected $last_login;

    /**
     * The value for the jenis_kelamin field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $jenis_kelamin;

    /**
     * The value for the tipe_member field.
     * @var        int
     */
    protected $tipe_member;

    /**
     * The value for the id_kelompok field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $id_kelompok;

    /**
     * The value for the type field.
     * Note: this column has a database default value of: 'AKM'
     * @var        string
     */
    protected $type;

    /**
     * The value for the tgl_masuk field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        string
     */
    protected $tgl_masuk;

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
        $this->jenis_kelamin = 0;
        $this->id_kelompok = 0;
        $this->type = 'AKM';
    }

    /**
     * Initializes internal state of BasePdnMember object.
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
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [realname] column value.
     *
     * @return string
     */
    public function getRealname()
    {

        return $this->realname;
    }

    /**
     * Get the [angkatan] column value.
     *
     * @return string
     */
    public function getAngkatan()
    {

        return $this->angkatan;
    }

    /**
     * Get the [hall] column value.
     *
     * @return string
     */
    public function getHall()
    {

        return $this->hall;
    }

    /**
     * Get the [lokasi] column value.
     *
     * @return string
     */
    public function getLokasi()
    {

        return $this->lokasi;
    }

    /**
     * Get the [telepon] column value.
     *
     * @return string
     */
    public function getTelepon()
    {

        return $this->telepon;
    }

    /**
     * Get the [handphone] column value.
     *
     * @return string
     */
    public function getHandphone()
    {

        return $this->handphone;
    }

    /**
     * Get the [handphone_2] column value.
     *
     * @return string
     */
    public function getHandphone2()
    {

        return $this->handphone_2;
    }

    /**
     * Get the [id_member] column value.
     *
     * @return string
     */
    public function getIdMember()
    {

        return $this->id_member;
    }

    /**
     * Get the [alamat] column value.
     *
     * @return string
     */
    public function getAlamat()
    {

        return $this->alamat;
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
     * Get the [optionally formatted] temporal [last_login] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *                 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = null)
    {
        if ($this->last_login === null) {
            return null;
        }

        if ($this->last_login === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->last_login);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export(
                $this->last_login,
                true
            ), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Get the [jenis_kelamin] column value.
     *
     * @return int
     */
    public function getJenisKelamin()
    {

        return $this->jenis_kelamin;
    }

    /**
     * Get the [tipe_member] column value.
     *
     * @return int
     */
    public function getTipeMember()
    {

        return $this->tipe_member;
    }

    /**
     * Get the [id_kelompok] column value.
     *
     * @return int
     */
    public function getIdKelompok()
    {

        return $this->id_kelompok;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_masuk] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *                 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglMasuk($format = null)
    {
        if ($this->tgl_masuk === null) {
            return null;
        }

        if ($this->tgl_masuk === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->tgl_masuk);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export(
                $this->tgl_masuk,
                true
            ), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);

    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PdnMemberPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [email] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PdnMemberPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [password] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = PdnMemberPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [realname] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setRealname($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->realname !== $v) {
            $this->realname = $v;
            $this->modifiedColumns[] = PdnMemberPeer::REALNAME;
        }


        return $this;
    } // setRealname()

    /**
     * Set the value of [angkatan] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setAngkatan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->angkatan !== $v) {
            $this->angkatan = $v;
            $this->modifiedColumns[] = PdnMemberPeer::ANGKATAN;
        }


        return $this;
    } // setAngkatan()

    /**
     * Set the value of [hall] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setHall($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->hall !== $v) {
            $this->hall = $v;
            $this->modifiedColumns[] = PdnMemberPeer::HALL;
        }


        return $this;
    } // setHall()

    /**
     * Set the value of [lokasi] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setLokasi($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->lokasi !== $v) {
            $this->lokasi = $v;
            $this->modifiedColumns[] = PdnMemberPeer::LOKASI;
        }


        return $this;
    } // setLokasi()

    /**
     * Set the value of [telepon] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setTelepon($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->telepon !== $v) {
            $this->telepon = $v;
            $this->modifiedColumns[] = PdnMemberPeer::TELEPON;
        }


        return $this;
    } // setTelepon()

    /**
     * Set the value of [handphone] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setHandphone($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->handphone !== $v) {
            $this->handphone = $v;
            $this->modifiedColumns[] = PdnMemberPeer::HANDPHONE;
        }


        return $this;
    } // setHandphone()

    /**
     * Set the value of [handphone_2] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setHandphone2($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->handphone_2 !== $v) {
            $this->handphone_2 = $v;
            $this->modifiedColumns[] = PdnMemberPeer::HANDPHONE_2;
        }


        return $this;
    } // setHandphone2()

    /**
     * Set the value of [id_member] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setIdMember($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->id_member !== $v) {
            $this->id_member = $v;
            $this->modifiedColumns[] = PdnMemberPeer::ID_MEMBER;
        }


        return $this;
    } // setIdMember()

    /**
     * Set the value of [alamat] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setAlamat($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->alamat !== $v) {
            $this->alamat = $v;
            $this->modifiedColumns[] = PdnMemberPeer::ALAMAT;
        }


        return $this;
    } // setAlamat()

    /**
     * Set the value of [is_approved] column.
     *
     * @param  int $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setIsApproved($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->is_approved !== $v) {
            $this->is_approved = $v;
            $this->modifiedColumns[] = PdnMemberPeer::IS_APPROVED;
        }


        return $this;
    } // setIsApproved()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PdnMember The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            $currentDateAsString = ($this->last_login !== null && $tmpDt = new DateTime($this->last_login)) ? $tmpDt->format(
                'Y-m-d H:i:s'
            ) : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_login = $newDateAsString;
                $this->modifiedColumns[] = PdnMemberPeer::LAST_LOGIN;
            }
        } // if either are not null


        return $this;
    } // setLastLogin()

    /**
     * Set the value of [jenis_kelamin] column.
     *
     * @param  int $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setJenisKelamin($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->jenis_kelamin !== $v) {
            $this->jenis_kelamin = $v;
            $this->modifiedColumns[] = PdnMemberPeer::JENIS_KELAMIN;
        }


        return $this;
    } // setJenisKelamin()

    /**
     * Set the value of [tipe_member] column.
     *
     * @param  int $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setTipeMember($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->tipe_member !== $v) {
            $this->tipe_member = $v;
            $this->modifiedColumns[] = PdnMemberPeer::TIPE_MEMBER;
        }


        return $this;
    } // setTipeMember()

    /**
     * Set the value of [id_kelompok] column.
     *
     * @param  int $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setIdKelompok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->id_kelompok !== $v) {
            $this->id_kelompok = $v;
            $this->modifiedColumns[] = PdnMemberPeer::ID_KELOMPOK;
        }


        return $this;
    } // setIdKelompok()

    /**
     * Set the value of [type] column.
     *
     * @param  string $v new value
     * @return PdnMember The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = PdnMemberPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Sets the value of [tgl_masuk] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return PdnMember The current object (for fluent API support)
     */
    public function setTglMasuk($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_masuk !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_masuk !== null && $tmpDt = new DateTime($this->tgl_masuk)) ? $tmpDt->format(
                'Y-m-d H:i:s'
            ) : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_masuk = $newDateAsString;
                $this->modifiedColumns[] = PdnMemberPeer::TGL_MASUK;
            }
        } // if either are not null


        return $this;
    } // setTglMasuk()

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
        if ($this->jenis_kelamin !== 0) {
            return false;
        }

        if ($this->id_kelompok !== 0) {
            return false;
        }

        if ($this->type !== 'AKM') {
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
            $this->email = ($row[$startcol + 1] !== null) ? (string)$row[$startcol + 1] : null;
            $this->password = ($row[$startcol + 2] !== null) ? (string)$row[$startcol + 2] : null;
            $this->realname = ($row[$startcol + 3] !== null) ? (string)$row[$startcol + 3] : null;
            $this->angkatan = ($row[$startcol + 4] !== null) ? (string)$row[$startcol + 4] : null;
            $this->hall = ($row[$startcol + 5] !== null) ? (string)$row[$startcol + 5] : null;
            $this->lokasi = ($row[$startcol + 6] !== null) ? (string)$row[$startcol + 6] : null;
            $this->telepon = ($row[$startcol + 7] !== null) ? (string)$row[$startcol + 7] : null;
            $this->handphone = ($row[$startcol + 8] !== null) ? (string)$row[$startcol + 8] : null;
            $this->handphone_2 = ($row[$startcol + 9] !== null) ? (string)$row[$startcol + 9] : null;
            $this->id_member = ($row[$startcol + 10] !== null) ? (string)$row[$startcol + 10] : null;
            $this->alamat = ($row[$startcol + 11] !== null) ? (string)$row[$startcol + 11] : null;
            $this->is_approved = ($row[$startcol + 12] !== null) ? (int)$row[$startcol + 12] : null;
            $this->last_login = ($row[$startcol + 13] !== null) ? (string)$row[$startcol + 13] : null;
            $this->jenis_kelamin = ($row[$startcol + 14] !== null) ? (int)$row[$startcol + 14] : null;
            $this->tipe_member = ($row[$startcol + 15] !== null) ? (int)$row[$startcol + 15] : null;
            $this->id_kelompok = ($row[$startcol + 16] !== null) ? (int)$row[$startcol + 16] : null;
            $this->type = ($row[$startcol + 17] !== null) ? (string)$row[$startcol + 17] : null;
            $this->tgl_masuk = ($row[$startcol + 18] !== null) ? (string)$row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 19; // 19 = PdnMemberPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PdnMember object", $e);
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
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PdnMemberPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PdnMemberQuery::create()
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
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PdnMemberPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = PdnMemberPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnMemberPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PdnMemberPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(PdnMemberPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++] = '`email`';
        }
        if ($this->isColumnModified(PdnMemberPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++] = '`password`';
        }
        if ($this->isColumnModified(PdnMemberPeer::REALNAME)) {
            $modifiedColumns[':p' . $index++] = '`realname`';
        }
        if ($this->isColumnModified(PdnMemberPeer::ANGKATAN)) {
            $modifiedColumns[':p' . $index++] = '`angkatan`';
        }
        if ($this->isColumnModified(PdnMemberPeer::HALL)) {
            $modifiedColumns[':p' . $index++] = '`hall`';
        }
        if ($this->isColumnModified(PdnMemberPeer::LOKASI)) {
            $modifiedColumns[':p' . $index++] = '`lokasi`';
        }
        if ($this->isColumnModified(PdnMemberPeer::TELEPON)) {
            $modifiedColumns[':p' . $index++] = '`telepon`';
        }
        if ($this->isColumnModified(PdnMemberPeer::HANDPHONE)) {
            $modifiedColumns[':p' . $index++] = '`handphone`';
        }
        if ($this->isColumnModified(PdnMemberPeer::HANDPHONE_2)) {
            $modifiedColumns[':p' . $index++] = '`handphone_2`';
        }
        if ($this->isColumnModified(PdnMemberPeer::ID_MEMBER)) {
            $modifiedColumns[':p' . $index++] = '`id_member`';
        }
        if ($this->isColumnModified(PdnMemberPeer::ALAMAT)) {
            $modifiedColumns[':p' . $index++] = '`alamat`';
        }
        if ($this->isColumnModified(PdnMemberPeer::IS_APPROVED)) {
            $modifiedColumns[':p' . $index++] = '`is_approved`';
        }
        if ($this->isColumnModified(PdnMemberPeer::LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++] = '`last_login`';
        }
        if ($this->isColumnModified(PdnMemberPeer::JENIS_KELAMIN)) {
            $modifiedColumns[':p' . $index++] = '`jenis_kelamin`';
        }
        if ($this->isColumnModified(PdnMemberPeer::TIPE_MEMBER)) {
            $modifiedColumns[':p' . $index++] = '`tipe_member`';
        }
        if ($this->isColumnModified(PdnMemberPeer::ID_KELOMPOK)) {
            $modifiedColumns[':p' . $index++] = '`id_kelompok`';
        }
        if ($this->isColumnModified(PdnMemberPeer::TYPE)) {
            $modifiedColumns[':p' . $index++] = '`type`';
        }
        if ($this->isColumnModified(PdnMemberPeer::TGL_MASUK)) {
            $modifiedColumns[':p' . $index++] = '`tgl_masuk`';
        }

        $sql = sprintf(
            'INSERT INTO `pdn_member` (%s) VALUES (%s)',
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
                    case '`email`':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`realname`':
                        $stmt->bindValue($identifier, $this->realname, PDO::PARAM_STR);
                        break;
                    case '`angkatan`':
                        $stmt->bindValue($identifier, $this->angkatan, PDO::PARAM_STR);
                        break;
                    case '`hall`':
                        $stmt->bindValue($identifier, $this->hall, PDO::PARAM_STR);
                        break;
                    case '`lokasi`':
                        $stmt->bindValue($identifier, $this->lokasi, PDO::PARAM_STR);
                        break;
                    case '`telepon`':
                        $stmt->bindValue($identifier, $this->telepon, PDO::PARAM_STR);
                        break;
                    case '`handphone`':
                        $stmt->bindValue($identifier, $this->handphone, PDO::PARAM_STR);
                        break;
                    case '`handphone_2`':
                        $stmt->bindValue($identifier, $this->handphone_2, PDO::PARAM_STR);
                        break;
                    case '`id_member`':
                        $stmt->bindValue($identifier, $this->id_member, PDO::PARAM_STR);
                        break;
                    case '`alamat`':
                        $stmt->bindValue($identifier, $this->alamat, PDO::PARAM_STR);
                        break;
                    case '`is_approved`':
                        $stmt->bindValue($identifier, $this->is_approved, PDO::PARAM_INT);
                        break;
                    case '`last_login`':
                        $stmt->bindValue($identifier, $this->last_login, PDO::PARAM_STR);
                        break;
                    case '`jenis_kelamin`':
                        $stmt->bindValue($identifier, $this->jenis_kelamin, PDO::PARAM_INT);
                        break;
                    case '`tipe_member`':
                        $stmt->bindValue($identifier, $this->tipe_member, PDO::PARAM_INT);
                        break;
                    case '`id_kelompok`':
                        $stmt->bindValue($identifier, $this->id_kelompok, PDO::PARAM_INT);
                        break;
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`tgl_masuk`':
                        $stmt->bindValue($identifier, $this->tgl_masuk, PDO::PARAM_STR);
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


            if (($retval = PdnMemberPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PdnMemberPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getEmail();
                break;
            case 2:
                return $this->getPassword();
                break;
            case 3:
                return $this->getRealname();
                break;
            case 4:
                return $this->getAngkatan();
                break;
            case 5:
                return $this->getHall();
                break;
            case 6:
                return $this->getLokasi();
                break;
            case 7:
                return $this->getTelepon();
                break;
            case 8:
                return $this->getHandphone();
                break;
            case 9:
                return $this->getHandphone2();
                break;
            case 10:
                return $this->getIdMember();
                break;
            case 11:
                return $this->getAlamat();
                break;
            case 12:
                return $this->getIsApproved();
                break;
            case 13:
                return $this->getLastLogin();
                break;
            case 14:
                return $this->getJenisKelamin();
                break;
            case 15:
                return $this->getTipeMember();
                break;
            case 16:
                return $this->getIdKelompok();
                break;
            case 17:
                return $this->getType();
                break;
            case 18:
                return $this->getTglMasuk();
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
        if (isset($alreadyDumpedObjects['PdnMember'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PdnMember'][$this->getPrimaryKey()] = true;
        $keys = PdnMemberPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getEmail(),
            $keys[2] => $this->getPassword(),
            $keys[3] => $this->getRealname(),
            $keys[4] => $this->getAngkatan(),
            $keys[5] => $this->getHall(),
            $keys[6] => $this->getLokasi(),
            $keys[7] => $this->getTelepon(),
            $keys[8] => $this->getHandphone(),
            $keys[9] => $this->getHandphone2(),
            $keys[10] => $this->getIdMember(),
            $keys[11] => $this->getAlamat(),
            $keys[12] => $this->getIsApproved(),
            $keys[13] => $this->getLastLogin(),
            $keys[14] => $this->getJenisKelamin(),
            $keys[15] => $this->getTipeMember(),
            $keys[16] => $this->getIdKelompok(),
            $keys[17] => $this->getType(),
            $keys[18] => $this->getTglMasuk(),
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
        $pos = PdnMemberPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setEmail($value);
                break;
            case 2:
                $this->setPassword($value);
                break;
            case 3:
                $this->setRealname($value);
                break;
            case 4:
                $this->setAngkatan($value);
                break;
            case 5:
                $this->setHall($value);
                break;
            case 6:
                $this->setLokasi($value);
                break;
            case 7:
                $this->setTelepon($value);
                break;
            case 8:
                $this->setHandphone($value);
                break;
            case 9:
                $this->setHandphone2($value);
                break;
            case 10:
                $this->setIdMember($value);
                break;
            case 11:
                $this->setAlamat($value);
                break;
            case 12:
                $this->setIsApproved($value);
                break;
            case 13:
                $this->setLastLogin($value);
                break;
            case 14:
                $this->setJenisKelamin($value);
                break;
            case 15:
                $this->setTipeMember($value);
                break;
            case 16:
                $this->setIdKelompok($value);
                break;
            case 17:
                $this->setType($value);
                break;
            case 18:
                $this->setTglMasuk($value);
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
        $keys = PdnMemberPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setEmail($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRealname($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setAngkatan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setHall($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLokasi($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTelepon($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setHandphone($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setHandphone2($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setIdMember($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setAlamat($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsApproved($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastLogin($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setJenisKelamin($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setTipeMember($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setIdKelompok($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setType($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setTglMasuk($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PdnMemberPeer::DATABASE_NAME);

        if ($this->isColumnModified(PdnMemberPeer::ID)) $criteria->add(PdnMemberPeer::ID, $this->id);
        if ($this->isColumnModified(PdnMemberPeer::EMAIL)) $criteria->add(PdnMemberPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PdnMemberPeer::PASSWORD)) $criteria->add(PdnMemberPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(PdnMemberPeer::REALNAME)) $criteria->add(PdnMemberPeer::REALNAME, $this->realname);
        if ($this->isColumnModified(PdnMemberPeer::ANGKATAN)) $criteria->add(PdnMemberPeer::ANGKATAN, $this->angkatan);
        if ($this->isColumnModified(PdnMemberPeer::HALL)) $criteria->add(PdnMemberPeer::HALL, $this->hall);
        if ($this->isColumnModified(PdnMemberPeer::LOKASI)) $criteria->add(PdnMemberPeer::LOKASI, $this->lokasi);
        if ($this->isColumnModified(PdnMemberPeer::TELEPON)) $criteria->add(PdnMemberPeer::TELEPON, $this->telepon);
        if ($this->isColumnModified(PdnMemberPeer::HANDPHONE)) $criteria->add(
            PdnMemberPeer::HANDPHONE,
            $this->handphone
        );
        if ($this->isColumnModified(PdnMemberPeer::HANDPHONE_2)) $criteria->add(
            PdnMemberPeer::HANDPHONE_2,
            $this->handphone_2
        );
        if ($this->isColumnModified(PdnMemberPeer::ID_MEMBER)) $criteria->add(
            PdnMemberPeer::ID_MEMBER,
            $this->id_member
        );
        if ($this->isColumnModified(PdnMemberPeer::ALAMAT)) $criteria->add(PdnMemberPeer::ALAMAT, $this->alamat);
        if ($this->isColumnModified(PdnMemberPeer::IS_APPROVED)) $criteria->add(
            PdnMemberPeer::IS_APPROVED,
            $this->is_approved
        );
        if ($this->isColumnModified(PdnMemberPeer::LAST_LOGIN)) $criteria->add(
            PdnMemberPeer::LAST_LOGIN,
            $this->last_login
        );
        if ($this->isColumnModified(PdnMemberPeer::JENIS_KELAMIN)) $criteria->add(
            PdnMemberPeer::JENIS_KELAMIN,
            $this->jenis_kelamin
        );
        if ($this->isColumnModified(PdnMemberPeer::TIPE_MEMBER)) $criteria->add(
            PdnMemberPeer::TIPE_MEMBER,
            $this->tipe_member
        );
        if ($this->isColumnModified(PdnMemberPeer::ID_KELOMPOK)) $criteria->add(
            PdnMemberPeer::ID_KELOMPOK,
            $this->id_kelompok
        );
        if ($this->isColumnModified(PdnMemberPeer::TYPE)) $criteria->add(PdnMemberPeer::TYPE, $this->type);
        if ($this->isColumnModified(PdnMemberPeer::TGL_MASUK)) $criteria->add(
            PdnMemberPeer::TGL_MASUK,
            $this->tgl_masuk
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
        $criteria = new Criteria(PdnMemberPeer::DATABASE_NAME);
        $criteria->add(PdnMemberPeer::ID, $this->id);

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
     * @param object $copyObj An object of PdnMember (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setRealname($this->getRealname());
        $copyObj->setAngkatan($this->getAngkatan());
        $copyObj->setHall($this->getHall());
        $copyObj->setLokasi($this->getLokasi());
        $copyObj->setTelepon($this->getTelepon());
        $copyObj->setHandphone($this->getHandphone());
        $copyObj->setHandphone2($this->getHandphone2());
        $copyObj->setIdMember($this->getIdMember());
        $copyObj->setAlamat($this->getAlamat());
        $copyObj->setIsApproved($this->getIsApproved());
        $copyObj->setLastLogin($this->getLastLogin());
        $copyObj->setJenisKelamin($this->getJenisKelamin());
        $copyObj->setTipeMember($this->getTipeMember());
        $copyObj->setIdKelompok($this->getIdKelompok());
        $copyObj->setType($this->getType());
        $copyObj->setTglMasuk($this->getTglMasuk());
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
     * @return PdnMember Clone of current object.
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
     * @return PdnMemberPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PdnMemberPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->email = null;
        $this->password = null;
        $this->realname = null;
        $this->angkatan = null;
        $this->hall = null;
        $this->lokasi = null;
        $this->telepon = null;
        $this->handphone = null;
        $this->handphone_2 = null;
        $this->id_member = null;
        $this->alamat = null;
        $this->is_approved = null;
        $this->last_login = null;
        $this->jenis_kelamin = null;
        $this->tipe_member = null;
        $this->id_kelompok = null;
        $this->type = null;
        $this->tgl_masuk = null;
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
        return (string)$this->exportTo(PdnMemberPeer::DEFAULT_STRING_FORMAT);
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
