<?php

namespace CAD\TransferBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\PdnAngkatan;
use CAD\TransferBundle\Model\PdnAngkatanPeer;
use CAD\TransferBundle\Model\PdnAngkatanQuery;

abstract class BasePdnAngkatan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\PdnAngkatanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PdnAngkatanPeer
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
     * The value for the angkatan field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $angkatan;

    /**
     * The value for the penyegaran_pagi field.
     * @var        int
     */
    protected $penyegaran_pagi;

    /**
     * The value for the baca_alkitab field.
     * @var        int
     */
    protected $baca_alkitab;

    /**
     * The value for the doa field.
     * @var        int
     */
    protected $doa;

    /**
     * The value for the baca_rohani field.
     * @var        int
     */
    protected $baca_rohani;

    /**
     * The value for the bersidang field.
     * @var        int
     */
    protected $bersidang;

    /**
     * The value for the ot field.
     * @var        int
     */
    protected $ot;

    /**
     * The value for the penjengukan field.
     * @var        int
     */
    protected $penjengukan;

    /**
     * The value for the pengumuman field.
     * @var        int
     */
    protected $pengumuman;

    /**
     * The value for the tugas field.
     * @var        int
     */
    protected $tugas;

    /**
     * The value for the tugas_ya field.
     * @var        int
     */
    protected $tugas_ya;

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
        $this->angkatan = 0;
        $this->is_approved = 1;
    }

    /**
     * Initializes internal state of BasePdnAngkatan object.
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
     * Get the [angkatan] column value.
     *
     * @return int
     */
    public function getAngkatan()
    {

        return $this->angkatan;
    }

    /**
     * Get the [penyegaran_pagi] column value.
     *
     * @return int
     */
    public function getPenyegaranPagi()
    {

        return $this->penyegaran_pagi;
    }

    /**
     * Get the [baca_alkitab] column value.
     *
     * @return int
     */
    public function getBacaAlkitab()
    {

        return $this->baca_alkitab;
    }

    /**
     * Get the [doa] column value.
     *
     * @return int
     */
    public function getDoa()
    {

        return $this->doa;
    }

    /**
     * Get the [baca_rohani] column value.
     *
     * @return int
     */
    public function getBacaRohani()
    {

        return $this->baca_rohani;
    }

    /**
     * Get the [bersidang] column value.
     *
     * @return int
     */
    public function getBersidang()
    {

        return $this->bersidang;
    }

    /**
     * Get the [ot] column value.
     *
     * @return int
     */
    public function getOt()
    {

        return $this->ot;
    }

    /**
     * Get the [penjengukan] column value.
     *
     * @return int
     */
    public function getPenjengukan()
    {

        return $this->penjengukan;
    }

    /**
     * Get the [pengumuman] column value.
     *
     * @return int
     */
    public function getPengumuman()
    {

        return $this->pengumuman;
    }

    /**
     * Get the [tugas] column value.
     *
     * @return int
     */
    public function getTugas()
    {

        return $this->tugas;
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
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [angkatan] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setAngkatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->angkatan !== $v) {
            $this->angkatan = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::ANGKATAN;
        }


        return $this;
    } // setAngkatan()

    /**
     * Set the value of [penyegaran_pagi] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setPenyegaranPagi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->penyegaran_pagi !== $v) {
            $this->penyegaran_pagi = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::PENYEGARAN_PAGI;
        }


        return $this;
    } // setPenyegaranPagi()

    /**
     * Set the value of [baca_alkitab] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setBacaAlkitab($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->baca_alkitab !== $v) {
            $this->baca_alkitab = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::BACA_ALKITAB;
        }


        return $this;
    } // setBacaAlkitab()

    /**
     * Set the value of [doa] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setDoa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->doa !== $v) {
            $this->doa = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::DOA;
        }


        return $this;
    } // setDoa()

    /**
     * Set the value of [baca_rohani] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setBacaRohani($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->baca_rohani !== $v) {
            $this->baca_rohani = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::BACA_ROHANI;
        }


        return $this;
    } // setBacaRohani()

    /**
     * Set the value of [bersidang] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setBersidang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->bersidang !== $v) {
            $this->bersidang = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::BERSIDANG;
        }


        return $this;
    } // setBersidang()

    /**
     * Set the value of [ot] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setOt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->ot !== $v) {
            $this->ot = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::OT;
        }


        return $this;
    } // setOt()

    /**
     * Set the value of [penjengukan] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setPenjengukan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->penjengukan !== $v) {
            $this->penjengukan = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::PENJENGUKAN;
        }


        return $this;
    } // setPenjengukan()

    /**
     * Set the value of [pengumuman] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setPengumuman($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->pengumuman !== $v) {
            $this->pengumuman = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::PENGUMUMAN;
        }


        return $this;
    } // setPengumuman()

    /**
     * Set the value of [tugas] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setTugas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->tugas !== $v) {
            $this->tugas = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::TUGAS;
        }


        return $this;
    } // setTugas()

    /**
     * Set the value of [tugas_ya] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setTugasYa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->tugas_ya !== $v) {
            $this->tugas_ya = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::TUGAS_YA;
        }


        return $this;
    } // setTugasYa()

    /**
     * Set the value of [is_approved] column.
     *
     * @param  int $v new value
     * @return PdnAngkatan The current object (for fluent API support)
     */
    public function setIsApproved($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->is_approved !== $v) {
            $this->is_approved = $v;
            $this->modifiedColumns[] = PdnAngkatanPeer::IS_APPROVED;
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
        if ($this->angkatan !== 0) {
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
            $this->angkatan = ($row[$startcol + 1] !== null) ? (int)$row[$startcol + 1] : null;
            $this->penyegaran_pagi = ($row[$startcol + 2] !== null) ? (int)$row[$startcol + 2] : null;
            $this->baca_alkitab = ($row[$startcol + 3] !== null) ? (int)$row[$startcol + 3] : null;
            $this->doa = ($row[$startcol + 4] !== null) ? (int)$row[$startcol + 4] : null;
            $this->baca_rohani = ($row[$startcol + 5] !== null) ? (int)$row[$startcol + 5] : null;
            $this->bersidang = ($row[$startcol + 6] !== null) ? (int)$row[$startcol + 6] : null;
            $this->ot = ($row[$startcol + 7] !== null) ? (int)$row[$startcol + 7] : null;
            $this->penjengukan = ($row[$startcol + 8] !== null) ? (int)$row[$startcol + 8] : null;
            $this->pengumuman = ($row[$startcol + 9] !== null) ? (int)$row[$startcol + 9] : null;
            $this->tugas = ($row[$startcol + 10] !== null) ? (int)$row[$startcol + 10] : null;
            $this->tugas_ya = ($row[$startcol + 11] !== null) ? (int)$row[$startcol + 11] : null;
            $this->is_approved = ($row[$startcol + 12] !== null) ? (int)$row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 13; // 13 = PdnAngkatanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PdnAngkatan object", $e);
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
            $con = Propel::getConnection(PdnAngkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PdnAngkatanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(PdnAngkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PdnAngkatanQuery::create()
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
            $con = Propel::getConnection(PdnAngkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PdnAngkatanPeer::addInstanceToPool($this);
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

        $this->modifiedColumns[] = PdnAngkatanPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnAngkatanPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PdnAngkatanPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::ANGKATAN)) {
            $modifiedColumns[':p' . $index++] = '`angkatan`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::PENYEGARAN_PAGI)) {
            $modifiedColumns[':p' . $index++] = '`penyegaran_pagi`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::BACA_ALKITAB)) {
            $modifiedColumns[':p' . $index++] = '`baca_alkitab`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::DOA)) {
            $modifiedColumns[':p' . $index++] = '`doa`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::BACA_ROHANI)) {
            $modifiedColumns[':p' . $index++] = '`baca_rohani`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::BERSIDANG)) {
            $modifiedColumns[':p' . $index++] = '`bersidang`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::OT)) {
            $modifiedColumns[':p' . $index++] = '`ot`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::PENJENGUKAN)) {
            $modifiedColumns[':p' . $index++] = '`penjengukan`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::PENGUMUMAN)) {
            $modifiedColumns[':p' . $index++] = '`pengumuman`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::TUGAS)) {
            $modifiedColumns[':p' . $index++] = '`tugas`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::TUGAS_YA)) {
            $modifiedColumns[':p' . $index++] = '`tugas_ya`';
        }
        if ($this->isColumnModified(PdnAngkatanPeer::IS_APPROVED)) {
            $modifiedColumns[':p' . $index++] = '`is_approved`';
        }

        $sql = sprintf(
            'INSERT INTO `pdn_angkatan` (%s) VALUES (%s)',
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
                    case '`angkatan`':
                        $stmt->bindValue($identifier, $this->angkatan, PDO::PARAM_INT);
                        break;
                    case '`penyegaran_pagi`':
                        $stmt->bindValue($identifier, $this->penyegaran_pagi, PDO::PARAM_INT);
                        break;
                    case '`baca_alkitab`':
                        $stmt->bindValue($identifier, $this->baca_alkitab, PDO::PARAM_INT);
                        break;
                    case '`doa`':
                        $stmt->bindValue($identifier, $this->doa, PDO::PARAM_INT);
                        break;
                    case '`baca_rohani`':
                        $stmt->bindValue($identifier, $this->baca_rohani, PDO::PARAM_INT);
                        break;
                    case '`bersidang`':
                        $stmt->bindValue($identifier, $this->bersidang, PDO::PARAM_INT);
                        break;
                    case '`ot`':
                        $stmt->bindValue($identifier, $this->ot, PDO::PARAM_INT);
                        break;
                    case '`penjengukan`':
                        $stmt->bindValue($identifier, $this->penjengukan, PDO::PARAM_INT);
                        break;
                    case '`pengumuman`':
                        $stmt->bindValue($identifier, $this->pengumuman, PDO::PARAM_INT);
                        break;
                    case '`tugas`':
                        $stmt->bindValue($identifier, $this->tugas, PDO::PARAM_INT);
                        break;
                    case '`tugas_ya`':
                        $stmt->bindValue($identifier, $this->tugas_ya, PDO::PARAM_INT);
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


            if (($retval = PdnAngkatanPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PdnAngkatanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAngkatan();
                break;
            case 2:
                return $this->getPenyegaranPagi();
                break;
            case 3:
                return $this->getBacaAlkitab();
                break;
            case 4:
                return $this->getDoa();
                break;
            case 5:
                return $this->getBacaRohani();
                break;
            case 6:
                return $this->getBersidang();
                break;
            case 7:
                return $this->getOt();
                break;
            case 8:
                return $this->getPenjengukan();
                break;
            case 9:
                return $this->getPengumuman();
                break;
            case 10:
                return $this->getTugas();
                break;
            case 11:
                return $this->getTugasYa();
                break;
            case 12:
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
        if (isset($alreadyDumpedObjects['PdnAngkatan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PdnAngkatan'][$this->getPrimaryKey()] = true;
        $keys = PdnAngkatanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getAngkatan(),
            $keys[2] => $this->getPenyegaranPagi(),
            $keys[3] => $this->getBacaAlkitab(),
            $keys[4] => $this->getDoa(),
            $keys[5] => $this->getBacaRohani(),
            $keys[6] => $this->getBersidang(),
            $keys[7] => $this->getOt(),
            $keys[8] => $this->getPenjengukan(),
            $keys[9] => $this->getPengumuman(),
            $keys[10] => $this->getTugas(),
            $keys[11] => $this->getTugasYa(),
            $keys[12] => $this->getIsApproved(),
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
        $pos = PdnAngkatanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAngkatan($value);
                break;
            case 2:
                $this->setPenyegaranPagi($value);
                break;
            case 3:
                $this->setBacaAlkitab($value);
                break;
            case 4:
                $this->setDoa($value);
                break;
            case 5:
                $this->setBacaRohani($value);
                break;
            case 6:
                $this->setBersidang($value);
                break;
            case 7:
                $this->setOt($value);
                break;
            case 8:
                $this->setPenjengukan($value);
                break;
            case 9:
                $this->setPengumuman($value);
                break;
            case 10:
                $this->setTugas($value);
                break;
            case 11:
                $this->setTugasYa($value);
                break;
            case 12:
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
        $keys = PdnAngkatanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setAngkatan($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPenyegaranPagi($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setBacaAlkitab($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setDoa($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setBacaRohani($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBersidang($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setOt($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPenjengukan($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPengumuman($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setTugas($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setTugasYa($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setIsApproved($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PdnAngkatanPeer::DATABASE_NAME);

        if ($this->isColumnModified(PdnAngkatanPeer::ID)) $criteria->add(PdnAngkatanPeer::ID, $this->id);
        if ($this->isColumnModified(PdnAngkatanPeer::ANGKATAN)) $criteria->add(
            PdnAngkatanPeer::ANGKATAN,
            $this->angkatan
        );
        if ($this->isColumnModified(PdnAngkatanPeer::PENYEGARAN_PAGI)) $criteria->add(
            PdnAngkatanPeer::PENYEGARAN_PAGI,
            $this->penyegaran_pagi
        );
        if ($this->isColumnModified(PdnAngkatanPeer::BACA_ALKITAB)) $criteria->add(
            PdnAngkatanPeer::BACA_ALKITAB,
            $this->baca_alkitab
        );
        if ($this->isColumnModified(PdnAngkatanPeer::DOA)) $criteria->add(PdnAngkatanPeer::DOA, $this->doa);
        if ($this->isColumnModified(PdnAngkatanPeer::BACA_ROHANI)) $criteria->add(
            PdnAngkatanPeer::BACA_ROHANI,
            $this->baca_rohani
        );
        if ($this->isColumnModified(PdnAngkatanPeer::BERSIDANG)) $criteria->add(
            PdnAngkatanPeer::BERSIDANG,
            $this->bersidang
        );
        if ($this->isColumnModified(PdnAngkatanPeer::OT)) $criteria->add(PdnAngkatanPeer::OT, $this->ot);
        if ($this->isColumnModified(PdnAngkatanPeer::PENJENGUKAN)) $criteria->add(
            PdnAngkatanPeer::PENJENGUKAN,
            $this->penjengukan
        );
        if ($this->isColumnModified(PdnAngkatanPeer::PENGUMUMAN)) $criteria->add(
            PdnAngkatanPeer::PENGUMUMAN,
            $this->pengumuman
        );
        if ($this->isColumnModified(PdnAngkatanPeer::TUGAS)) $criteria->add(PdnAngkatanPeer::TUGAS, $this->tugas);
        if ($this->isColumnModified(PdnAngkatanPeer::TUGAS_YA)) $criteria->add(
            PdnAngkatanPeer::TUGAS_YA,
            $this->tugas_ya
        );
        if ($this->isColumnModified(PdnAngkatanPeer::IS_APPROVED)) $criteria->add(
            PdnAngkatanPeer::IS_APPROVED,
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
        $criteria = new Criteria(PdnAngkatanPeer::DATABASE_NAME);
        $criteria->add(PdnAngkatanPeer::ID, $this->id);

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
     * @param object $copyObj An object of PdnAngkatan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAngkatan($this->getAngkatan());
        $copyObj->setPenyegaranPagi($this->getPenyegaranPagi());
        $copyObj->setBacaAlkitab($this->getBacaAlkitab());
        $copyObj->setDoa($this->getDoa());
        $copyObj->setBacaRohani($this->getBacaRohani());
        $copyObj->setBersidang($this->getBersidang());
        $copyObj->setOt($this->getOt());
        $copyObj->setPenjengukan($this->getPenjengukan());
        $copyObj->setPengumuman($this->getPengumuman());
        $copyObj->setTugas($this->getTugas());
        $copyObj->setTugasYa($this->getTugasYa());
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
     * @return PdnAngkatan Clone of current object.
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
     * @return PdnAngkatanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PdnAngkatanPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->angkatan = null;
        $this->penyegaran_pagi = null;
        $this->baca_alkitab = null;
        $this->doa = null;
        $this->baca_rohani = null;
        $this->bersidang = null;
        $this->ot = null;
        $this->penjengukan = null;
        $this->pengumuman = null;
        $this->tugas = null;
        $this->tugas_ya = null;
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
        return (string)$this->exportTo(PdnAngkatanPeer::DEFAULT_STRING_FORMAT);
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
