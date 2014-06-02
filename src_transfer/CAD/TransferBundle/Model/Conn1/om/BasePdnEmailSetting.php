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
use CAD\TransferBundle\Model\Conn1\PdnEmailSetting;
use CAD\TransferBundle\Model\Conn1\PdnEmailSettingPeer;
use CAD\TransferBundle\Model\Conn1\PdnEmailSettingQuery;

abstract class BasePdnEmailSetting extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\Conn1\\PdnEmailSettingPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PdnEmailSettingPeer
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
     * The value for the pg_subject field.
     * @var        string
     */
    protected $pg_subject;

    /**
     * The value for the pg_message field.
     * @var        string
     */
    protected $pg_message;

    /**
     * The value for the ktb_subject field.
     * @var        string
     */
    protected $ktb_subject;

    /**
     * The value for the ktb_message field.
     * @var        string
     */
    protected $ktb_message;

    /**
     * The value for the doa_subject field.
     * @var        string
     */
    protected $doa_subject;

    /**
     * The value for the doa_message field.
     * @var        string
     */
    protected $doa_message;

    /**
     * The value for the rohani_subject field.
     * @var        string
     */
    protected $rohani_subject;

    /**
     * The value for the rohani_message field.
     * @var        string
     */
    protected $rohani_message;

    /**
     * The value for the sidang_subject field.
     * @var        string
     */
    protected $sidang_subject;

    /**
     * The value for the sidang_message field.
     * @var        string
     */
    protected $sidang_message;

    /**
     * The value for the jenguk_subject field.
     * @var        string
     */
    protected $jenguk_subject;

    /**
     * The value for the jenguk_message field.
     * @var        string
     */
    protected $jenguk_message;

    /**
     * The value for the pengumuman_subject field.
     * @var        string
     */
    protected $pengumuman_subject;

    /**
     * The value for the pengumuman_message field.
     * @var        string
     */
    protected $pengumuman_message;

    /**
     * The value for the pengumuman_file field.
     * @var        string
     */
    protected $pengumuman_file;

    /**
     * The value for the tugas_subject field.
     * @var        string
     */
    protected $tugas_subject;

    /**
     * The value for the tugas_message field.
     * @var        string
     */
    protected $tugas_message;

    /**
     * The value for the tugas_file field.
     * @var        string
     */
    protected $tugas_file;

    /**
     * The value for the email_cc field.
     * @var        string
     */
    protected $email_cc;

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
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [pg_subject] column value.
     *
     * @return string
     */
    public function getPgSubject()
    {

        return $this->pg_subject;
    }

    /**
     * Get the [pg_message] column value.
     *
     * @return string
     */
    public function getPgMessage()
    {

        return $this->pg_message;
    }

    /**
     * Get the [ktb_subject] column value.
     *
     * @return string
     */
    public function getKtbSubject()
    {

        return $this->ktb_subject;
    }

    /**
     * Get the [ktb_message] column value.
     *
     * @return string
     */
    public function getKtbMessage()
    {

        return $this->ktb_message;
    }

    /**
     * Get the [doa_subject] column value.
     *
     * @return string
     */
    public function getDoaSubject()
    {

        return $this->doa_subject;
    }

    /**
     * Get the [doa_message] column value.
     *
     * @return string
     */
    public function getDoaMessage()
    {

        return $this->doa_message;
    }

    /**
     * Get the [rohani_subject] column value.
     *
     * @return string
     */
    public function getRohaniSubject()
    {

        return $this->rohani_subject;
    }

    /**
     * Get the [rohani_message] column value.
     *
     * @return string
     */
    public function getRohaniMessage()
    {

        return $this->rohani_message;
    }

    /**
     * Get the [sidang_subject] column value.
     *
     * @return string
     */
    public function getSidangSubject()
    {

        return $this->sidang_subject;
    }

    /**
     * Get the [sidang_message] column value.
     *
     * @return string
     */
    public function getSidangMessage()
    {

        return $this->sidang_message;
    }

    /**
     * Get the [jenguk_subject] column value.
     *
     * @return string
     */
    public function getJengukSubject()
    {

        return $this->jenguk_subject;
    }

    /**
     * Get the [jenguk_message] column value.
     *
     * @return string
     */
    public function getJengukMessage()
    {

        return $this->jenguk_message;
    }

    /**
     * Get the [pengumuman_subject] column value.
     *
     * @return string
     */
    public function getPengumumanSubject()
    {

        return $this->pengumuman_subject;
    }

    /**
     * Get the [pengumuman_message] column value.
     *
     * @return string
     */
    public function getPengumumanMessage()
    {

        return $this->pengumuman_message;
    }

    /**
     * Get the [pengumuman_file] column value.
     *
     * @return string
     */
    public function getPengumumanFile()
    {

        return $this->pengumuman_file;
    }

    /**
     * Get the [tugas_subject] column value.
     *
     * @return string
     */
    public function getTugasSubject()
    {

        return $this->tugas_subject;
    }

    /**
     * Get the [tugas_message] column value.
     *
     * @return string
     */
    public function getTugasMessage()
    {

        return $this->tugas_message;
    }

    /**
     * Get the [tugas_file] column value.
     *
     * @return string
     */
    public function getTugasFile()
    {

        return $this->tugas_file;
    }

    /**
     * Get the [email_cc] column value.
     *
     * @return string
     */
    public function getEmailCc()
    {

        return $this->email_cc;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  int $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [pg_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setPgSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pg_subject !== $v) {
            $this->pg_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::PG_SUBJECT;
        }


        return $this;
    } // setPgSubject()

    /**
     * Set the value of [pg_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setPgMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pg_message !== $v) {
            $this->pg_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::PG_MESSAGE;
        }


        return $this;
    } // setPgMessage()

    /**
     * Set the value of [ktb_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setKtbSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_subject !== $v) {
            $this->ktb_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::KTB_SUBJECT;
        }


        return $this;
    } // setKtbSubject()

    /**
     * Set the value of [ktb_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setKtbMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->ktb_message !== $v) {
            $this->ktb_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::KTB_MESSAGE;
        }


        return $this;
    } // setKtbMessage()

    /**
     * Set the value of [doa_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setDoaSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->doa_subject !== $v) {
            $this->doa_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::DOA_SUBJECT;
        }


        return $this;
    } // setDoaSubject()

    /**
     * Set the value of [doa_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setDoaMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->doa_message !== $v) {
            $this->doa_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::DOA_MESSAGE;
        }


        return $this;
    } // setDoaMessage()

    /**
     * Set the value of [rohani_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setRohaniSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->rohani_subject !== $v) {
            $this->rohani_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::ROHANI_SUBJECT;
        }


        return $this;
    } // setRohaniSubject()

    /**
     * Set the value of [rohani_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setRohaniMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->rohani_message !== $v) {
            $this->rohani_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::ROHANI_MESSAGE;
        }


        return $this;
    } // setRohaniMessage()

    /**
     * Set the value of [sidang_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setSidangSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->sidang_subject !== $v) {
            $this->sidang_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::SIDANG_SUBJECT;
        }


        return $this;
    } // setSidangSubject()

    /**
     * Set the value of [sidang_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setSidangMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->sidang_message !== $v) {
            $this->sidang_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::SIDANG_MESSAGE;
        }


        return $this;
    } // setSidangMessage()

    /**
     * Set the value of [jenguk_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setJengukSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->jenguk_subject !== $v) {
            $this->jenguk_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::JENGUK_SUBJECT;
        }


        return $this;
    } // setJengukSubject()

    /**
     * Set the value of [jenguk_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setJengukMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->jenguk_message !== $v) {
            $this->jenguk_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::JENGUK_MESSAGE;
        }


        return $this;
    } // setJengukMessage()

    /**
     * Set the value of [pengumuman_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setPengumumanSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pengumuman_subject !== $v) {
            $this->pengumuman_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::PENGUMUMAN_SUBJECT;
        }


        return $this;
    } // setPengumumanSubject()

    /**
     * Set the value of [pengumuman_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setPengumumanMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pengumuman_message !== $v) {
            $this->pengumuman_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::PENGUMUMAN_MESSAGE;
        }


        return $this;
    } // setPengumumanMessage()

    /**
     * Set the value of [pengumuman_file] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setPengumumanFile($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->pengumuman_file !== $v) {
            $this->pengumuman_file = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::PENGUMUMAN_FILE;
        }


        return $this;
    } // setPengumumanFile()

    /**
     * Set the value of [tugas_subject] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setTugasSubject($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->tugas_subject !== $v) {
            $this->tugas_subject = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::TUGAS_SUBJECT;
        }


        return $this;
    } // setTugasSubject()

    /**
     * Set the value of [tugas_message] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setTugasMessage($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->tugas_message !== $v) {
            $this->tugas_message = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::TUGAS_MESSAGE;
        }


        return $this;
    } // setTugasMessage()

    /**
     * Set the value of [tugas_file] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setTugasFile($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->tugas_file !== $v) {
            $this->tugas_file = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::TUGAS_FILE;
        }


        return $this;
    } // setTugasFile()

    /**
     * Set the value of [email_cc] column.
     *
     * @param  string $v new value
     * @return PdnEmailSetting The current object (for fluent API support)
     */
    public function setEmailCc($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->email_cc !== $v) {
            $this->email_cc = $v;
            $this->modifiedColumns[] = PdnEmailSettingPeer::EMAIL_CC;
        }


        return $this;
    } // setEmailCc()

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
            $this->pg_subject = ($row[$startcol + 1] !== null) ? (string)$row[$startcol + 1] : null;
            $this->pg_message = ($row[$startcol + 2] !== null) ? (string)$row[$startcol + 2] : null;
            $this->ktb_subject = ($row[$startcol + 3] !== null) ? (string)$row[$startcol + 3] : null;
            $this->ktb_message = ($row[$startcol + 4] !== null) ? (string)$row[$startcol + 4] : null;
            $this->doa_subject = ($row[$startcol + 5] !== null) ? (string)$row[$startcol + 5] : null;
            $this->doa_message = ($row[$startcol + 6] !== null) ? (string)$row[$startcol + 6] : null;
            $this->rohani_subject = ($row[$startcol + 7] !== null) ? (string)$row[$startcol + 7] : null;
            $this->rohani_message = ($row[$startcol + 8] !== null) ? (string)$row[$startcol + 8] : null;
            $this->sidang_subject = ($row[$startcol + 9] !== null) ? (string)$row[$startcol + 9] : null;
            $this->sidang_message = ($row[$startcol + 10] !== null) ? (string)$row[$startcol + 10] : null;
            $this->jenguk_subject = ($row[$startcol + 11] !== null) ? (string)$row[$startcol + 11] : null;
            $this->jenguk_message = ($row[$startcol + 12] !== null) ? (string)$row[$startcol + 12] : null;
            $this->pengumuman_subject = ($row[$startcol + 13] !== null) ? (string)$row[$startcol + 13] : null;
            $this->pengumuman_message = ($row[$startcol + 14] !== null) ? (string)$row[$startcol + 14] : null;
            $this->pengumuman_file = ($row[$startcol + 15] !== null) ? (string)$row[$startcol + 15] : null;
            $this->tugas_subject = ($row[$startcol + 16] !== null) ? (string)$row[$startcol + 16] : null;
            $this->tugas_message = ($row[$startcol + 17] !== null) ? (string)$row[$startcol + 17] : null;
            $this->tugas_file = ($row[$startcol + 18] !== null) ? (string)$row[$startcol + 18] : null;
            $this->email_cc = ($row[$startcol + 19] !== null) ? (string)$row[$startcol + 19] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 20; // 20 = PdnEmailSettingPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PdnEmailSetting object", $e);
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
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PdnEmailSettingPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PdnEmailSettingQuery::create()
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
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PdnEmailSettingPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = PdnEmailSettingPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnEmailSettingPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PdnEmailSettingPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::PG_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`pg_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::PG_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`pg_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::KTB_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`ktb_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::KTB_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`ktb_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::DOA_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`doa_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::DOA_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`doa_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::ROHANI_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`rohani_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::ROHANI_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`rohani_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::SIDANG_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`sidang_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::SIDANG_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`sidang_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::JENGUK_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::JENGUK_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`jenguk_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`pengumuman_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`pengumuman_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_FILE)) {
            $modifiedColumns[':p' . $index++] = '`pengumuman_file`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_SUBJECT)) {
            $modifiedColumns[':p' . $index++] = '`tugas_subject`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_MESSAGE)) {
            $modifiedColumns[':p' . $index++] = '`tugas_message`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_FILE)) {
            $modifiedColumns[':p' . $index++] = '`tugas_file`';
        }
        if ($this->isColumnModified(PdnEmailSettingPeer::EMAIL_CC)) {
            $modifiedColumns[':p' . $index++] = '`email_cc`';
        }

        $sql = sprintf(
            'INSERT INTO `pdn_email_setting` (%s) VALUES (%s)',
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
                    case '`pg_subject`':
                        $stmt->bindValue($identifier, $this->pg_subject, PDO::PARAM_STR);
                        break;
                    case '`pg_message`':
                        $stmt->bindValue($identifier, $this->pg_message, PDO::PARAM_STR);
                        break;
                    case '`ktb_subject`':
                        $stmt->bindValue($identifier, $this->ktb_subject, PDO::PARAM_STR);
                        break;
                    case '`ktb_message`':
                        $stmt->bindValue($identifier, $this->ktb_message, PDO::PARAM_STR);
                        break;
                    case '`doa_subject`':
                        $stmt->bindValue($identifier, $this->doa_subject, PDO::PARAM_STR);
                        break;
                    case '`doa_message`':
                        $stmt->bindValue($identifier, $this->doa_message, PDO::PARAM_STR);
                        break;
                    case '`rohani_subject`':
                        $stmt->bindValue($identifier, $this->rohani_subject, PDO::PARAM_STR);
                        break;
                    case '`rohani_message`':
                        $stmt->bindValue($identifier, $this->rohani_message, PDO::PARAM_STR);
                        break;
                    case '`sidang_subject`':
                        $stmt->bindValue($identifier, $this->sidang_subject, PDO::PARAM_STR);
                        break;
                    case '`sidang_message`':
                        $stmt->bindValue($identifier, $this->sidang_message, PDO::PARAM_STR);
                        break;
                    case '`jenguk_subject`':
                        $stmt->bindValue($identifier, $this->jenguk_subject, PDO::PARAM_STR);
                        break;
                    case '`jenguk_message`':
                        $stmt->bindValue($identifier, $this->jenguk_message, PDO::PARAM_STR);
                        break;
                    case '`pengumuman_subject`':
                        $stmt->bindValue($identifier, $this->pengumuman_subject, PDO::PARAM_STR);
                        break;
                    case '`pengumuman_message`':
                        $stmt->bindValue($identifier, $this->pengumuman_message, PDO::PARAM_STR);
                        break;
                    case '`pengumuman_file`':
                        $stmt->bindValue($identifier, $this->pengumuman_file, PDO::PARAM_STR);
                        break;
                    case '`tugas_subject`':
                        $stmt->bindValue($identifier, $this->tugas_subject, PDO::PARAM_STR);
                        break;
                    case '`tugas_message`':
                        $stmt->bindValue($identifier, $this->tugas_message, PDO::PARAM_STR);
                        break;
                    case '`tugas_file`':
                        $stmt->bindValue($identifier, $this->tugas_file, PDO::PARAM_STR);
                        break;
                    case '`email_cc`':
                        $stmt->bindValue($identifier, $this->email_cc, PDO::PARAM_STR);
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


            if (($retval = PdnEmailSettingPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PdnEmailSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPgSubject();
                break;
            case 2:
                return $this->getPgMessage();
                break;
            case 3:
                return $this->getKtbSubject();
                break;
            case 4:
                return $this->getKtbMessage();
                break;
            case 5:
                return $this->getDoaSubject();
                break;
            case 6:
                return $this->getDoaMessage();
                break;
            case 7:
                return $this->getRohaniSubject();
                break;
            case 8:
                return $this->getRohaniMessage();
                break;
            case 9:
                return $this->getSidangSubject();
                break;
            case 10:
                return $this->getSidangMessage();
                break;
            case 11:
                return $this->getJengukSubject();
                break;
            case 12:
                return $this->getJengukMessage();
                break;
            case 13:
                return $this->getPengumumanSubject();
                break;
            case 14:
                return $this->getPengumumanMessage();
                break;
            case 15:
                return $this->getPengumumanFile();
                break;
            case 16:
                return $this->getTugasSubject();
                break;
            case 17:
                return $this->getTugasMessage();
                break;
            case 18:
                return $this->getTugasFile();
                break;
            case 19:
                return $this->getEmailCc();
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
        if (isset($alreadyDumpedObjects['PdnEmailSetting'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PdnEmailSetting'][$this->getPrimaryKey()] = true;
        $keys = PdnEmailSettingPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getPgSubject(),
            $keys[2] => $this->getPgMessage(),
            $keys[3] => $this->getKtbSubject(),
            $keys[4] => $this->getKtbMessage(),
            $keys[5] => $this->getDoaSubject(),
            $keys[6] => $this->getDoaMessage(),
            $keys[7] => $this->getRohaniSubject(),
            $keys[8] => $this->getRohaniMessage(),
            $keys[9] => $this->getSidangSubject(),
            $keys[10] => $this->getSidangMessage(),
            $keys[11] => $this->getJengukSubject(),
            $keys[12] => $this->getJengukMessage(),
            $keys[13] => $this->getPengumumanSubject(),
            $keys[14] => $this->getPengumumanMessage(),
            $keys[15] => $this->getPengumumanFile(),
            $keys[16] => $this->getTugasSubject(),
            $keys[17] => $this->getTugasMessage(),
            $keys[18] => $this->getTugasFile(),
            $keys[19] => $this->getEmailCc(),
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
        $pos = PdnEmailSettingPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPgSubject($value);
                break;
            case 2:
                $this->setPgMessage($value);
                break;
            case 3:
                $this->setKtbSubject($value);
                break;
            case 4:
                $this->setKtbMessage($value);
                break;
            case 5:
                $this->setDoaSubject($value);
                break;
            case 6:
                $this->setDoaMessage($value);
                break;
            case 7:
                $this->setRohaniSubject($value);
                break;
            case 8:
                $this->setRohaniMessage($value);
                break;
            case 9:
                $this->setSidangSubject($value);
                break;
            case 10:
                $this->setSidangMessage($value);
                break;
            case 11:
                $this->setJengukSubject($value);
                break;
            case 12:
                $this->setJengukMessage($value);
                break;
            case 13:
                $this->setPengumumanSubject($value);
                break;
            case 14:
                $this->setPengumumanMessage($value);
                break;
            case 15:
                $this->setPengumumanFile($value);
                break;
            case 16:
                $this->setTugasSubject($value);
                break;
            case 17:
                $this->setTugasMessage($value);
                break;
            case 18:
                $this->setTugasFile($value);
                break;
            case 19:
                $this->setEmailCc($value);
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
        $keys = PdnEmailSettingPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setPgSubject($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPgMessage($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKtbSubject($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKtbMessage($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setDoaSubject($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDoaMessage($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setRohaniSubject($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRohaniMessage($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSidangSubject($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSidangMessage($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setJengukSubject($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setJengukMessage($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setPengumumanSubject($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setPengumumanMessage($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setPengumumanFile($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setTugasSubject($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setTugasMessage($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setTugasFile($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setEmailCc($arr[$keys[19]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);

        if ($this->isColumnModified(PdnEmailSettingPeer::ID)) $criteria->add(PdnEmailSettingPeer::ID, $this->id);
        if ($this->isColumnModified(PdnEmailSettingPeer::PG_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::PG_SUBJECT,
            $this->pg_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::PG_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::PG_MESSAGE,
            $this->pg_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::KTB_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::KTB_SUBJECT,
            $this->ktb_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::KTB_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::KTB_MESSAGE,
            $this->ktb_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::DOA_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::DOA_SUBJECT,
            $this->doa_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::DOA_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::DOA_MESSAGE,
            $this->doa_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::ROHANI_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::ROHANI_SUBJECT,
            $this->rohani_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::ROHANI_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::ROHANI_MESSAGE,
            $this->rohani_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::SIDANG_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::SIDANG_SUBJECT,
            $this->sidang_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::SIDANG_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::SIDANG_MESSAGE,
            $this->sidang_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::JENGUK_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::JENGUK_SUBJECT,
            $this->jenguk_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::JENGUK_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::JENGUK_MESSAGE,
            $this->jenguk_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::PENGUMUMAN_SUBJECT,
            $this->pengumuman_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::PENGUMUMAN_MESSAGE,
            $this->pengumuman_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::PENGUMUMAN_FILE)) $criteria->add(
            PdnEmailSettingPeer::PENGUMUMAN_FILE,
            $this->pengumuman_file
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_SUBJECT)) $criteria->add(
            PdnEmailSettingPeer::TUGAS_SUBJECT,
            $this->tugas_subject
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_MESSAGE)) $criteria->add(
            PdnEmailSettingPeer::TUGAS_MESSAGE,
            $this->tugas_message
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::TUGAS_FILE)) $criteria->add(
            PdnEmailSettingPeer::TUGAS_FILE,
            $this->tugas_file
        );
        if ($this->isColumnModified(PdnEmailSettingPeer::EMAIL_CC)) $criteria->add(
            PdnEmailSettingPeer::EMAIL_CC,
            $this->email_cc
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
        $criteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);
        $criteria->add(PdnEmailSettingPeer::ID, $this->id);

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
     * @param object $copyObj An object of PdnEmailSetting (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPgSubject($this->getPgSubject());
        $copyObj->setPgMessage($this->getPgMessage());
        $copyObj->setKtbSubject($this->getKtbSubject());
        $copyObj->setKtbMessage($this->getKtbMessage());
        $copyObj->setDoaSubject($this->getDoaSubject());
        $copyObj->setDoaMessage($this->getDoaMessage());
        $copyObj->setRohaniSubject($this->getRohaniSubject());
        $copyObj->setRohaniMessage($this->getRohaniMessage());
        $copyObj->setSidangSubject($this->getSidangSubject());
        $copyObj->setSidangMessage($this->getSidangMessage());
        $copyObj->setJengukSubject($this->getJengukSubject());
        $copyObj->setJengukMessage($this->getJengukMessage());
        $copyObj->setPengumumanSubject($this->getPengumumanSubject());
        $copyObj->setPengumumanMessage($this->getPengumumanMessage());
        $copyObj->setPengumumanFile($this->getPengumumanFile());
        $copyObj->setTugasSubject($this->getTugasSubject());
        $copyObj->setTugasMessage($this->getTugasMessage());
        $copyObj->setTugasFile($this->getTugasFile());
        $copyObj->setEmailCc($this->getEmailCc());
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
     * @return PdnEmailSetting Clone of current object.
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
     * @return PdnEmailSettingPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PdnEmailSettingPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->pg_subject = null;
        $this->pg_message = null;
        $this->ktb_subject = null;
        $this->ktb_message = null;
        $this->doa_subject = null;
        $this->doa_message = null;
        $this->rohani_subject = null;
        $this->rohani_message = null;
        $this->sidang_subject = null;
        $this->sidang_message = null;
        $this->jenguk_subject = null;
        $this->jenguk_message = null;
        $this->pengumuman_subject = null;
        $this->pengumuman_message = null;
        $this->pengumuman_file = null;
        $this->tugas_subject = null;
        $this->tugas_message = null;
        $this->tugas_file = null;
        $this->email_cc = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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
        return (string)$this->exportTo(PdnEmailSettingPeer::DEFAULT_STRING_FORMAT);
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
