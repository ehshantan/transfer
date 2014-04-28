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
use CAD\TransferBundle\Model\PdnJawabanTugas;
use CAD\TransferBundle\Model\PdnJawabanTugasPeer;
use CAD\TransferBundle\Model\PdnJawabanTugasQuery;

abstract class BasePdnJawabanTugas extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\PdnJawabanTugasPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PdnJawabanTugasPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the kode_member field.
     * @var        int
     */
    protected $kode_member;

    /**
     * The value for the kode_tugas field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $kode_tugas;

    /**
     * The value for the kode_soal field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $kode_soal;

    /**
     * The value for the kode_pilihan field.
     * Note: this column has a database default value of: ''
     * @var        string
     */
    protected $kode_pilihan;

    /**
     * The value for the status field.
     * @var        int
     */
    protected $status;

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
        $this->kode_tugas = 0;
        $this->kode_soal = 0;
        $this->kode_pilihan = '';
    }

    /**
     * Initializes internal state of BasePdnJawabanTugas object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [kode_member] column value.
     *
     * @return int
     */
    public function getKodeMember()
    {

        return $this->kode_member;
    }

    /**
     * Get the [kode_tugas] column value.
     *
     * @return int
     */
    public function getKodeTugas()
    {

        return $this->kode_tugas;
    }

    /**
     * Get the [kode_soal] column value.
     *
     * @return int
     */
    public function getKodeSoal()
    {

        return $this->kode_soal;
    }

    /**
     * Get the [kode_pilihan] column value.
     *
     * @return string
     */
    public function getKodePilihan()
    {

        return $this->kode_pilihan;
    }

    /**
     * Get the [status] column value.
     *
     * @return int
     */
    public function getStatus()
    {

        return $this->status;
    }

    /**
     * Set the value of [kode_member] column.
     *
     * @param  int $v new value
     * @return PdnJawabanTugas The current object (for fluent API support)
     */
    public function setKodeMember($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->kode_member !== $v) {
            $this->kode_member = $v;
            $this->modifiedColumns[] = PdnJawabanTugasPeer::KODE_MEMBER;
        }


        return $this;
    } // setKodeMember()

    /**
     * Set the value of [kode_tugas] column.
     *
     * @param  int $v new value
     * @return PdnJawabanTugas The current object (for fluent API support)
     */
    public function setKodeTugas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->kode_tugas !== $v) {
            $this->kode_tugas = $v;
            $this->modifiedColumns[] = PdnJawabanTugasPeer::KODE_TUGAS;
        }


        return $this;
    } // setKodeTugas()

    /**
     * Set the value of [kode_soal] column.
     *
     * @param  int $v new value
     * @return PdnJawabanTugas The current object (for fluent API support)
     */
    public function setKodeSoal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->kode_soal !== $v) {
            $this->kode_soal = $v;
            $this->modifiedColumns[] = PdnJawabanTugasPeer::KODE_SOAL;
        }


        return $this;
    } // setKodeSoal()

    /**
     * Set the value of [kode_pilihan] column.
     *
     * @param  string $v new value
     * @return PdnJawabanTugas The current object (for fluent API support)
     */
    public function setKodePilihan($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->kode_pilihan !== $v) {
            $this->kode_pilihan = $v;
            $this->modifiedColumns[] = PdnJawabanTugasPeer::KODE_PILIHAN;
        }


        return $this;
    } // setKodePilihan()

    /**
     * Set the value of [status] column.
     *
     * @param  int $v new value
     * @return PdnJawabanTugas The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[] = PdnJawabanTugasPeer::STATUS;
        }


        return $this;
    } // setStatus()

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
        if ($this->kode_tugas !== 0) {
            return false;
        }

        if ($this->kode_soal !== 0) {
            return false;
        }

        if ($this->kode_pilihan !== '') {
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

            $this->kode_member = ($row[$startcol + 0] !== null) ? (int)$row[$startcol + 0] : null;
            $this->kode_tugas = ($row[$startcol + 1] !== null) ? (int)$row[$startcol + 1] : null;
            $this->kode_soal = ($row[$startcol + 2] !== null) ? (int)$row[$startcol + 2] : null;
            $this->kode_pilihan = ($row[$startcol + 3] !== null) ? (string)$row[$startcol + 3] : null;
            $this->status = ($row[$startcol + 4] !== null) ? (int)$row[$startcol + 4] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 5; // 5 = PdnJawabanTugasPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating PdnJawabanTugas object", $e);
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
            $con = Propel::getConnection(PdnJawabanTugasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PdnJawabanTugasPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
            $con = Propel::getConnection(PdnJawabanTugasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PdnJawabanTugasQuery::create()
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
            $con = Propel::getConnection(PdnJawabanTugasPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PdnJawabanTugasPeer::addInstanceToPool($this);
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


        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_MEMBER)) {
            $modifiedColumns[':p' . $index++] = '`kode_member`';
        }
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_TUGAS)) {
            $modifiedColumns[':p' . $index++] = '`kode_tugas`';
        }
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_SOAL)) {
            $modifiedColumns[':p' . $index++] = '`kode_soal`';
        }
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_PILIHAN)) {
            $modifiedColumns[':p' . $index++] = '`kode_pilihan`';
        }
        if ($this->isColumnModified(PdnJawabanTugasPeer::STATUS)) {
            $modifiedColumns[':p' . $index++] = '`status`';
        }

        $sql = sprintf(
            'INSERT INTO `pdn_jawaban_tugas` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`kode_member`':
                        $stmt->bindValue($identifier, $this->kode_member, PDO::PARAM_INT);
                        break;
                    case '`kode_tugas`':
                        $stmt->bindValue($identifier, $this->kode_tugas, PDO::PARAM_INT);
                        break;
                    case '`kode_soal`':
                        $stmt->bindValue($identifier, $this->kode_soal, PDO::PARAM_INT);
                        break;
                    case '`kode_pilihan`':
                        $stmt->bindValue($identifier, $this->kode_pilihan, PDO::PARAM_STR);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

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


            if (($retval = PdnJawabanTugasPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PdnJawabanTugasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKodeMember();
                break;
            case 1:
                return $this->getKodeTugas();
                break;
            case 2:
                return $this->getKodeSoal();
                break;
            case 3:
                return $this->getKodePilihan();
                break;
            case 4:
                return $this->getStatus();
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
        if (isset($alreadyDumpedObjects['PdnJawabanTugas'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['PdnJawabanTugas'][serialize($this->getPrimaryKey())] = true;
        $keys = PdnJawabanTugasPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getKodeMember(),
            $keys[1] => $this->getKodeTugas(),
            $keys[2] => $this->getKodeSoal(),
            $keys[3] => $this->getKodePilihan(),
            $keys[4] => $this->getStatus(),
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
        $pos = PdnJawabanTugasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKodeMember($value);
                break;
            case 1:
                $this->setKodeTugas($value);
                break;
            case 2:
                $this->setKodeSoal($value);
                break;
            case 3:
                $this->setKodePilihan($value);
                break;
            case 4:
                $this->setStatus($value);
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
        $keys = PdnJawabanTugasPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setKodeMember($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setKodeTugas($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKodeSoal($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKodePilihan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PdnJawabanTugasPeer::DATABASE_NAME);

        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_MEMBER)) $criteria->add(
            PdnJawabanTugasPeer::KODE_MEMBER,
            $this->kode_member
        );
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_TUGAS)) $criteria->add(
            PdnJawabanTugasPeer::KODE_TUGAS,
            $this->kode_tugas
        );
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_SOAL)) $criteria->add(
            PdnJawabanTugasPeer::KODE_SOAL,
            $this->kode_soal
        );
        if ($this->isColumnModified(PdnJawabanTugasPeer::KODE_PILIHAN)) $criteria->add(
            PdnJawabanTugasPeer::KODE_PILIHAN,
            $this->kode_pilihan
        );
        if ($this->isColumnModified(PdnJawabanTugasPeer::STATUS)) $criteria->add(
            PdnJawabanTugasPeer::STATUS,
            $this->status
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
        $criteria = new Criteria(PdnJawabanTugasPeer::DATABASE_NAME);
        $criteria->add(PdnJawabanTugasPeer::KODE_MEMBER, $this->kode_member);
        $criteria->add(PdnJawabanTugasPeer::KODE_TUGAS, $this->kode_tugas);
        $criteria->add(PdnJawabanTugasPeer::KODE_SOAL, $this->kode_soal);
        $criteria->add(PdnJawabanTugasPeer::KODE_PILIHAN, $this->kode_pilihan);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getKodeMember();
        $pks[1] = $this->getKodeTugas();
        $pks[2] = $this->getKodeSoal();
        $pks[3] = $this->getKodePilihan();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setKodeMember($keys[0]);
        $this->setKodeTugas($keys[1]);
        $this->setKodeSoal($keys[2]);
        $this->setKodePilihan($keys[3]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getKodeMember()) && (null === $this->getKodeTugas()) && (null === $this->getKodeSoal(
            )) && (null === $this->getKodePilihan());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of PdnJawabanTugas (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKodeMember($this->getKodeMember());
        $copyObj->setKodeTugas($this->getKodeTugas());
        $copyObj->setKodeSoal($this->getKodeSoal());
        $copyObj->setKodePilihan($this->getKodePilihan());
        $copyObj->setStatus($this->getStatus());
        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return PdnJawabanTugas Clone of current object.
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
     * @return PdnJawabanTugasPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PdnJawabanTugasPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->kode_member = null;
        $this->kode_tugas = null;
        $this->kode_soal = null;
        $this->kode_pilihan = null;
        $this->status = null;
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
        return (string)$this->exportTo(PdnJawabanTugasPeer::DEFAULT_STRING_FORMAT);
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
