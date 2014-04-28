<?php

namespace CAD\TransferBundle\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CAD\TransferBundle\Model\Batch;
use CAD\TransferBundle\Model\BatchCategoryJournal;
use CAD\TransferBundle\Model\BatchCategoryJournalQuery;
use CAD\TransferBundle\Model\BatchPeer;
use CAD\TransferBundle\Model\BatchQuery;
use CAD\TransferBundle\Model\User;
use CAD\TransferBundle\Model\UserQuery;

abstract class BaseBatch extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\BatchPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BatchPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id field.
     * @var        string
     */
    protected $id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $active;

    /**
     * @var        PropelObjectCollection|BatchCategoryJournal[] Collection to store aggregation of BatchCategoryJournal objects.
     */
    protected $collBatchCategoryJournals;
    protected $collBatchCategoryJournalsPartial;

    /**
     * @var        PropelObjectCollection|User[] Collection to store aggregation of User objects.
     */
    protected $collUsers;
    protected $collUsersPartial;

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
     * An array of objects scheduled for deletion.
     * @var        PropelObjectCollection
     */
    protected $batchCategoryJournalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var        PropelObjectCollection
     */
    protected $usersScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->active = true;
    }

    /**
     * Initializes internal state of BaseBatch object.
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
     * @return string
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * Get the [active] column value.
     *
     * @return boolean
     */
    public function getActive()
    {

        return $this->active;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  string $v new value
     * @return Batch The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = BatchPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return Batch The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = BatchPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Sets the value of the [active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return Batch The current object (for fluent API support)
     */
    public function setActive($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean)$v;
            }
        }

        if ($this->active !== $v) {
            $this->active = $v;
            $this->modifiedColumns[] = BatchPeer::ACTIVE;
        }


        return $this;
    } // setActive()

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
        if ($this->active !== true) {
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

            $this->id = ($row[$startcol + 0] !== null) ? (string)$row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string)$row[$startcol + 1] : null;
            $this->active = ($row[$startcol + 2] !== null) ? (boolean)$row[$startcol + 2] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 3; // 3 = BatchPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Batch object", $e);
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
            $con = Propel::getConnection(BatchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BatchPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) { // also de-associate any related objects?

            $this->collBatchCategoryJournals = null;

            $this->collUsers = null;

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
            $con = Propel::getConnection(BatchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BatchQuery::create()
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
            $con = Propel::getConnection(BatchPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BatchPeer::addInstanceToPool($this);
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

            if ($this->batchCategoryJournalsScheduledForDeletion !== null) {
                if (!$this->batchCategoryJournalsScheduledForDeletion->isEmpty()) {
                    BatchCategoryJournalQuery::create()
                        ->filterByPrimaryKeys($this->batchCategoryJournalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->batchCategoryJournalsScheduledForDeletion = null;
                }
            }

            if ($this->collBatchCategoryJournals !== null) {
                foreach ($this->collBatchCategoryJournals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->usersScheduledForDeletion !== null) {
                if (!$this->usersScheduledForDeletion->isEmpty()) {
                    UserQuery::create()
                        ->filterByPrimaryKeys($this->usersScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->usersScheduledForDeletion = null;
                }
            }

            if ($this->collUsers !== null) {
                foreach ($this->collUsers as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

        $this->modifiedColumns[] = BatchPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . BatchPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(BatchPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(BatchPeer::NAME)) {
            $modifiedColumns[':p' . $index++] = '`name`';
        }
        if ($this->isColumnModified(BatchPeer::ACTIVE)) {
            $modifiedColumns[':p' . $index++] = '`active`';
        }

        $sql = sprintf(
            'INSERT INTO `batch` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`active`':
                        $stmt->bindValue($identifier, (int)$this->active, PDO::PARAM_INT);
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


            if (($retval = BatchPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


            if ($this->collBatchCategoryJournals !== null) {
                foreach ($this->collBatchCategoryJournals as $referrerFK) {
                    if (!$referrerFK->validate($columns)) {
                        $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                    }
                }
            }

            if ($this->collUsers !== null) {
                foreach ($this->collUsers as $referrerFK) {
                    if (!$referrerFK->validate($columns)) {
                        $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                    }
                }
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
        $pos = BatchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getActive();
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
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray(
        $keyType = BasePeer::TYPE_PHPNAME,
        $includeLazyLoadColumns = true,
        $alreadyDumpedObjects = array(),
        $includeForeignObjects = false
    ) {
        if (isset($alreadyDumpedObjects['Batch'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Batch'][$this->getPrimaryKey()] = true;
        $keys = BatchPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collBatchCategoryJournals) {
                $result['BatchCategoryJournals'] = $this->collBatchCategoryJournals->toArray(
                    null,
                    true,
                    $keyType,
                    $includeLazyLoadColumns,
                    $alreadyDumpedObjects
                );
            }
            if (null !== $this->collUsers) {
                $result['Users'] = $this->collUsers->toArray(
                    null,
                    true,
                    $keyType,
                    $includeLazyLoadColumns,
                    $alreadyDumpedObjects
                );
            }
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
        $pos = BatchPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setName($value);
                break;
            case 2:
                $this->setActive($value);
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
        $keys = BatchPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setActive($arr[$keys[2]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BatchPeer::DATABASE_NAME);

        if ($this->isColumnModified(BatchPeer::ID)) $criteria->add(BatchPeer::ID, $this->id);
        if ($this->isColumnModified(BatchPeer::NAME)) $criteria->add(BatchPeer::NAME, $this->name);
        if ($this->isColumnModified(BatchPeer::ACTIVE)) $criteria->add(BatchPeer::ACTIVE, $this->active);

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
        $criteria = new Criteria(BatchPeer::DATABASE_NAME);
        $criteria->add(BatchPeer::ID, $this->id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param  string $key Primary key.
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
     * @param object $copyObj An object of Batch (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setActive($this->getActive());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getBatchCategoryJournals() as $relObj) {
                if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBatchCategoryJournal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUsers() as $relObj) {
                if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUser($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

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
     * @return Batch Clone of current object.
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
     * @return BatchPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BatchPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('BatchCategoryJournal' == $relationName) {
            $this->initBatchCategoryJournals();
        }
        if ('User' == $relationName) {
            $this->initUsers();
        }
    }

    /**
     * Clears out the collBatchCategoryJournals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Batch The current object (for fluent API support)
     * @see        addBatchCategoryJournals()
     */
    public function clearBatchCategoryJournals()
    {
        $this->collBatchCategoryJournals = null; // important to set this to null since that means it is uninitialized
        $this->collBatchCategoryJournalsPartial = null;

        return $this;
    }

    /**
     * reset is the collBatchCategoryJournals collection loaded partially
     *
     * @return void
     */
    public function resetPartialBatchCategoryJournals($v = true)
    {
        $this->collBatchCategoryJournalsPartial = $v;
    }

    /**
     * Initializes the collBatchCategoryJournals collection.
     *
     * By default this just sets the collBatchCategoryJournals collection to an empty array (like clearcollBatchCategoryJournals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBatchCategoryJournals($overrideExisting = true)
    {
        if (null !== $this->collBatchCategoryJournals && !$overrideExisting) {
            return;
        }
        $this->collBatchCategoryJournals = new PropelObjectCollection();
        $this->collBatchCategoryJournals->setModel('BatchCategoryJournal');
    }

    /**
     * Gets an array of BatchCategoryJournal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Batch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BatchCategoryJournal[] List of BatchCategoryJournal objects
     * @throws PropelException
     */
    public function getBatchCategoryJournals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBatchCategoryJournalsPartial && !$this->isNew();
        if (null === $this->collBatchCategoryJournals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBatchCategoryJournals) {
                // return empty collection
                $this->initBatchCategoryJournals();
            } else {
                $collBatchCategoryJournals = BatchCategoryJournalQuery::create(null, $criteria)
                    ->filterByBatch($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBatchCategoryJournalsPartial && count($collBatchCategoryJournals)) {
                        $this->initBatchCategoryJournals(false);

                        foreach ($collBatchCategoryJournals as $obj) {
                            if (false == $this->collBatchCategoryJournals->contains($obj)) {
                                $this->collBatchCategoryJournals->append($obj);
                            }
                        }

                        $this->collBatchCategoryJournalsPartial = true;
                    }

                    $collBatchCategoryJournals->getInternalIterator()->rewind();

                    return $collBatchCategoryJournals;
                }

                if ($partial && $this->collBatchCategoryJournals) {
                    foreach ($this->collBatchCategoryJournals as $obj) {
                        if ($obj->isNew()) {
                            $collBatchCategoryJournals[] = $obj;
                        }
                    }
                }

                $this->collBatchCategoryJournals = $collBatchCategoryJournals;
                $this->collBatchCategoryJournalsPartial = false;
            }
        }

        return $this->collBatchCategoryJournals;
    }

    /**
     * Sets a collection of BatchCategoryJournal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $batchCategoryJournals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Batch The current object (for fluent API support)
     */
    public function setBatchCategoryJournals(PropelCollection $batchCategoryJournals, PropelPDO $con = null)
    {
        $batchCategoryJournalsToDelete = $this->getBatchCategoryJournals(new Criteria(), $con)->diff(
            $batchCategoryJournals
        );


        $this->batchCategoryJournalsScheduledForDeletion = $batchCategoryJournalsToDelete;

        foreach ($batchCategoryJournalsToDelete as $batchCategoryJournalRemoved) {
            $batchCategoryJournalRemoved->setBatch(null);
        }

        $this->collBatchCategoryJournals = null;
        foreach ($batchCategoryJournals as $batchCategoryJournal) {
            $this->addBatchCategoryJournal($batchCategoryJournal);
        }

        $this->collBatchCategoryJournals = $batchCategoryJournals;
        $this->collBatchCategoryJournalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BatchCategoryJournal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BatchCategoryJournal objects.
     * @throws PropelException
     */
    public function countBatchCategoryJournals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBatchCategoryJournalsPartial && !$this->isNew();
        if (null === $this->collBatchCategoryJournals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBatchCategoryJournals) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getBatchCategoryJournals());
            }
            $query = BatchCategoryJournalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBatch($this)
                ->count($con);
        }

        return count($this->collBatchCategoryJournals);
    }

    /**
     * Method called to associate a BatchCategoryJournal object to this object
     * through the BatchCategoryJournal foreign key attribute.
     *
     * @param    BatchCategoryJournal $l BatchCategoryJournal
     * @return Batch The current object (for fluent API support)
     */
    public function addBatchCategoryJournal(BatchCategoryJournal $l)
    {
        if ($this->collBatchCategoryJournals === null) {
            $this->initBatchCategoryJournals();
            $this->collBatchCategoryJournalsPartial = true;
        }

        if (!in_array(
            $l,
            $this->collBatchCategoryJournals->getArrayCopy(),
            true
        )
        ) { // only add it if the **same** object is not already associated
            $this->doAddBatchCategoryJournal($l);

            if ($this->batchCategoryJournalsScheduledForDeletion and $this->batchCategoryJournalsScheduledForDeletion->contains(
                    $l
                )
            ) {
                $this->batchCategoryJournalsScheduledForDeletion->remove(
                    $this->batchCategoryJournalsScheduledForDeletion->search($l)
                );
            }
        }

        return $this;
    }

    /**
     * @param    BatchCategoryJournal $batchCategoryJournal The batchCategoryJournal object to add.
     */
    protected function doAddBatchCategoryJournal($batchCategoryJournal)
    {
        $this->collBatchCategoryJournals[] = $batchCategoryJournal;
        $batchCategoryJournal->setBatch($this);
    }

    /**
     * @param    BatchCategoryJournal $batchCategoryJournal The batchCategoryJournal object to remove.
     * @return Batch The current object (for fluent API support)
     */
    public function removeBatchCategoryJournal($batchCategoryJournal)
    {
        if ($this->getBatchCategoryJournals()->contains($batchCategoryJournal)) {
            $this->collBatchCategoryJournals->remove($this->collBatchCategoryJournals->search($batchCategoryJournal));
            if (null === $this->batchCategoryJournalsScheduledForDeletion) {
                $this->batchCategoryJournalsScheduledForDeletion = clone $this->collBatchCategoryJournals;
                $this->batchCategoryJournalsScheduledForDeletion->clear();
            }
            $this->batchCategoryJournalsScheduledForDeletion[] = clone $batchCategoryJournal;
            $batchCategoryJournal->setBatch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Batch is new, it will return
     * an empty collection; or if this Batch has previously
     * been saved, it will retrieve related BatchCategoryJournals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Batch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BatchCategoryJournal[] List of BatchCategoryJournal objects
     */
    public function getBatchCategoryJournalsJoinCategoryJournal(
        $criteria = null,
        $con = null,
        $join_behavior = Criteria::LEFT_JOIN
    ) {
        $query = BatchCategoryJournalQuery::create(null, $criteria);
        $query->joinWith('CategoryJournal', $join_behavior);

        return $this->getBatchCategoryJournals($query, $con);
    }

    /**
     * Clears out the collUsers collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Batch The current object (for fluent API support)
     * @see        addUsers()
     */
    public function clearUsers()
    {
        $this->collUsers = null; // important to set this to null since that means it is uninitialized
        $this->collUsersPartial = null;

        return $this;
    }

    /**
     * reset is the collUsers collection loaded partially
     *
     * @return void
     */
    public function resetPartialUsers($v = true)
    {
        $this->collUsersPartial = $v;
    }

    /**
     * Initializes the collUsers collection.
     *
     * By default this just sets the collUsers collection to an empty array (like clearcollUsers());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUsers($overrideExisting = true)
    {
        if (null !== $this->collUsers && !$overrideExisting) {
            return;
        }
        $this->collUsers = new PropelObjectCollection();
        $this->collUsers->setModel('User');
    }

    /**
     * Gets an array of User objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Batch is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|User[] List of User objects
     * @throws PropelException
     */
    public function getUsers($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUsersPartial && !$this->isNew();
        if (null === $this->collUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsers) {
                // return empty collection
                $this->initUsers();
            } else {
                $collUsers = UserQuery::create(null, $criteria)
                    ->filterByBatch($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUsersPartial && count($collUsers)) {
                        $this->initUsers(false);

                        foreach ($collUsers as $obj) {
                            if (false == $this->collUsers->contains($obj)) {
                                $this->collUsers->append($obj);
                            }
                        }

                        $this->collUsersPartial = true;
                    }

                    $collUsers->getInternalIterator()->rewind();

                    return $collUsers;
                }

                if ($partial && $this->collUsers) {
                    foreach ($this->collUsers as $obj) {
                        if ($obj->isNew()) {
                            $collUsers[] = $obj;
                        }
                    }
                }

                $this->collUsers = $collUsers;
                $this->collUsersPartial = false;
            }
        }

        return $this->collUsers;
    }

    /**
     * Sets a collection of User objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $users A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Batch The current object (for fluent API support)
     */
    public function setUsers(PropelCollection $users, PropelPDO $con = null)
    {
        $usersToDelete = $this->getUsers(new Criteria(), $con)->diff($users);


        $this->usersScheduledForDeletion = $usersToDelete;

        foreach ($usersToDelete as $userRemoved) {
            $userRemoved->setBatch(null);
        }

        $this->collUsers = null;
        foreach ($users as $user) {
            $this->addUser($user);
        }

        $this->collUsers = $users;
        $this->collUsersPartial = false;

        return $this;
    }

    /**
     * Returns the number of related User objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related User objects.
     * @throws PropelException
     */
    public function countUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUsersPartial && !$this->isNew();
        if (null === $this->collUsers || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUsers) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUsers());
            }
            $query = UserQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBatch($this)
                ->count($con);
        }

        return count($this->collUsers);
    }

    /**
     * Method called to associate a User object to this object
     * through the User foreign key attribute.
     *
     * @param    User $l User
     * @return Batch The current object (for fluent API support)
     */
    public function addUser(User $l)
    {
        if ($this->collUsers === null) {
            $this->initUsers();
            $this->collUsersPartial = true;
        }

        if (!in_array(
            $l,
            $this->collUsers->getArrayCopy(),
            true
        )
        ) { // only add it if the **same** object is not already associated
            $this->doAddUser($l);

            if ($this->usersScheduledForDeletion and $this->usersScheduledForDeletion->contains($l)) {
                $this->usersScheduledForDeletion->remove($this->usersScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param    User $user The user object to add.
     */
    protected function doAddUser($user)
    {
        $this->collUsers[] = $user;
        $user->setBatch($this);
    }

    /**
     * @param    User $user The user object to remove.
     * @return Batch The current object (for fluent API support)
     */
    public function removeUser($user)
    {
        if ($this->getUsers()->contains($user)) {
            $this->collUsers->remove($this->collUsers->search($user));
            if (null === $this->usersScheduledForDeletion) {
                $this->usersScheduledForDeletion = clone $this->collUsers;
                $this->usersScheduledForDeletion->clear();
            }
            $this->usersScheduledForDeletion[] = clone $user;
            $user->setBatch(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Batch is new, it will return
     * an empty collection; or if this Batch has previously
     * been saved, it will retrieve related Users from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Batch.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|User[] List of User objects
     */
    public function getUsersJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = UserQuery::create(null, $criteria);
        $query->joinWith('Group', $join_behavior);

        return $this->getUsers($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->active = null;
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
            if ($this->collBatchCategoryJournals) {
                foreach ($this->collBatchCategoryJournals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUsers) {
                foreach ($this->collUsers as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBatchCategoryJournals instanceof PropelCollection) {
            $this->collBatchCategoryJournals->clearIterator();
        }
        $this->collBatchCategoryJournals = null;
        if ($this->collUsers instanceof PropelCollection) {
            $this->collUsers->clearIterator();
        }
        $this->collUsers = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->exportTo(BatchPeer::DEFAULT_STRING_FORMAT);
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
