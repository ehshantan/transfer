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
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CAD\TransferBundle\Model\CategoryJournal;
use CAD\TransferBundle\Model\CategoryJournalQuery;
use CAD\TransferBundle\Model\User;
use CAD\TransferBundle\Model\UserCategoryJournal;
use CAD\TransferBundle\Model\UserCategoryJournalField;
use CAD\TransferBundle\Model\UserCategoryJournalFieldQuery;
use CAD\TransferBundle\Model\UserCategoryJournalPeer;
use CAD\TransferBundle\Model\UserCategoryJournalQuery;
use CAD\TransferBundle\Model\UserQuery;

abstract class BaseUserCategoryJournal extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\UserCategoryJournalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UserCategoryJournalPeer
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
     * The value for the user_id field.
     * @var        string
     */
    protected $user_id;

    /**
     * The value for the category_journal_id field.
     * @var        string
     */
    protected $category_journal_id;

    /**
     * The value for the date field.
     * @var        string
     */
    protected $date;

    /**
     * The value for the checked field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $checked;

    /**
     * The value for the notified field.
     * Note: this column has a database default value of: false
     * @var        boolean
     */
    protected $notified;

    /**
     * @var        User
     */
    protected $aUser;

    /**
     * @var        CategoryJournal
     */
    protected $aCategoryJournal;

    /**
     * @var        PropelObjectCollection|UserCategoryJournalField[] Collection to store aggregation of UserCategoryJournalField objects.
     */
    protected $collUserCategoryJournalFields;
    protected $collUserCategoryJournalFieldsPartial;

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
    protected $userCategoryJournalFieldsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->checked = false;
        $this->notified = false;
    }

    /**
     * Initializes internal state of BaseUserCategoryJournal object.
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
     * Get the [user_id] column value.
     *
     * @return string
     */
    public function getUserId()
    {

        return $this->user_id;
    }

    /**
     * Get the [category_journal_id] column value.
     *
     * @return string
     */
    public function getCategoryJournalId()
    {

        return $this->category_journal_id;
    }

    /**
     * Get the [optionally formatted] temporal [date] column value.
     *
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *                 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDate($format = null)
    {
        if ($this->date === null) {
            return null;
        }

        if ($this->date === '0000-00-00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export(
                $this->date,
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
     * Get the [checked] column value.
     *
     * @return boolean
     */
    public function getChecked()
    {

        return $this->checked;
    }

    /**
     * Get the [notified] column value.
     *
     * @return boolean
     */
    public function getNotified()
    {

        return $this->notified;
    }

    /**
     * Set the value of [id] column.
     *
     * @param  string $v new value
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = UserCategoryJournalPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [user_id] column.
     *
     * @param  string $v new value
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[] = UserCategoryJournalPeer::USER_ID;
        }

        if ($this->aUser !== null && $this->aUser->getId() !== $v) {
            $this->aUser = null;
        }


        return $this;
    } // setUserId()

    /**
     * Set the value of [category_journal_id] column.
     *
     * @param  string $v new value
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setCategoryJournalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->category_journal_id !== $v) {
            $this->category_journal_id = $v;
            $this->modifiedColumns[] = UserCategoryJournalPeer::CATEGORY_JOURNAL_ID;
        }

        if ($this->aCategoryJournal !== null && $this->aCategoryJournal->getId() !== $v) {
            $this->aCategoryJournal = null;
        }


        return $this;
    } // setCategoryJournalId()

    /**
     * Sets the value of [date] column to a normalized version of the date/time value specified.
     *
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date !== null || $dt !== null) {
            $currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format(
                'Y-m-d'
            ) : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->date = $newDateAsString;
                $this->modifiedColumns[] = UserCategoryJournalPeer::DATE;
            }
        } // if either are not null


        return $this;
    } // setDate()

    /**
     * Sets the value of the [checked] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setChecked($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean)$v;
            }
        }

        if ($this->checked !== $v) {
            $this->checked = $v;
            $this->modifiedColumns[] = UserCategoryJournalPeer::CHECKED;
        }


        return $this;
    } // setChecked()

    /**
     * Sets the value of the [notified] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setNotified($v)
    {
        if ($v !== null) {
            if (is_string($v)) {
                $v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
            } else {
                $v = (boolean)$v;
            }
        }

        if ($this->notified !== $v) {
            $this->notified = $v;
            $this->modifiedColumns[] = UserCategoryJournalPeer::NOTIFIED;
        }


        return $this;
    } // setNotified()

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
        if ($this->checked !== false) {
            return false;
        }

        if ($this->notified !== false) {
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
            $this->user_id = ($row[$startcol + 1] !== null) ? (string)$row[$startcol + 1] : null;
            $this->category_journal_id = ($row[$startcol + 2] !== null) ? (string)$row[$startcol + 2] : null;
            $this->date = ($row[$startcol + 3] !== null) ? (string)$row[$startcol + 3] : null;
            $this->checked = ($row[$startcol + 4] !== null) ? (boolean)$row[$startcol + 4] : null;
            $this->notified = ($row[$startcol + 5] !== null) ? (boolean)$row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 6; // 6 = UserCategoryJournalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating UserCategoryJournal object", $e);
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

        if ($this->aUser !== null && $this->user_id !== $this->aUser->getId()) {
            $this->aUser = null;
        }
        if ($this->aCategoryJournal !== null && $this->category_journal_id !== $this->aCategoryJournal->getId()) {
            $this->aCategoryJournal = null;
        }
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
            $con = Propel::getConnection(UserCategoryJournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UserCategoryJournalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) { // also de-associate any related objects?

            $this->aUser = null;
            $this->aCategoryJournal = null;
            $this->collUserCategoryJournalFields = null;

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
            $con = Propel::getConnection(UserCategoryJournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UserCategoryJournalQuery::create()
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
            $con = Propel::getConnection(UserCategoryJournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                UserCategoryJournalPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

            if ($this->aCategoryJournal !== null) {
                if ($this->aCategoryJournal->isModified() || $this->aCategoryJournal->isNew()) {
                    $affectedRows += $this->aCategoryJournal->save($con);
                }
                $this->setCategoryJournal($this->aCategoryJournal);
            }

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

            if ($this->userCategoryJournalFieldsScheduledForDeletion !== null) {
                if (!$this->userCategoryJournalFieldsScheduledForDeletion->isEmpty()) {
                    UserCategoryJournalFieldQuery::create()
                        ->filterByPrimaryKeys(
                            $this->userCategoryJournalFieldsScheduledForDeletion->getPrimaryKeys(false)
                        )
                        ->delete($con);
                    $this->userCategoryJournalFieldsScheduledForDeletion = null;
                }
            }

            if ($this->collUserCategoryJournalFields !== null) {
                foreach ($this->collUserCategoryJournalFields as $referrerFK) {
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

        $this->modifiedColumns[] = UserCategoryJournalPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserCategoryJournalPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserCategoryJournalPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(UserCategoryJournalPeer::USER_ID)) {
            $modifiedColumns[':p' . $index++] = '`user_id`';
        }
        if ($this->isColumnModified(UserCategoryJournalPeer::CATEGORY_JOURNAL_ID)) {
            $modifiedColumns[':p' . $index++] = '`category_journal_id`';
        }
        if ($this->isColumnModified(UserCategoryJournalPeer::DATE)) {
            $modifiedColumns[':p' . $index++] = '`date`';
        }
        if ($this->isColumnModified(UserCategoryJournalPeer::CHECKED)) {
            $modifiedColumns[':p' . $index++] = '`checked`';
        }
        if ($this->isColumnModified(UserCategoryJournalPeer::NOTIFIED)) {
            $modifiedColumns[':p' . $index++] = '`notified`';
        }

        $sql = sprintf(
            'INSERT INTO `user_category_journal` (%s) VALUES (%s)',
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
                    case '`user_id`':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_STR);
                        break;
                    case '`category_journal_id`':
                        $stmt->bindValue($identifier, $this->category_journal_id, PDO::PARAM_STR);
                        break;
                    case '`date`':
                        $stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
                        break;
                    case '`checked`':
                        $stmt->bindValue($identifier, (int)$this->checked, PDO::PARAM_INT);
                        break;
                    case '`notified`':
                        $stmt->bindValue($identifier, (int)$this->notified, PDO::PARAM_INT);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if (!$this->aUser->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
                }
            }

            if ($this->aCategoryJournal !== null) {
                if (!$this->aCategoryJournal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategoryJournal->getValidationFailures());
                }
            }


            if (($retval = UserCategoryJournalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


            if ($this->collUserCategoryJournalFields !== null) {
                foreach ($this->collUserCategoryJournalFields as $referrerFK) {
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
        $pos = UserCategoryJournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getUserId();
                break;
            case 2:
                return $this->getCategoryJournalId();
                break;
            case 3:
                return $this->getDate();
                break;
            case 4:
                return $this->getChecked();
                break;
            case 5:
                return $this->getNotified();
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
        if (isset($alreadyDumpedObjects['UserCategoryJournal'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UserCategoryJournal'][$this->getPrimaryKey()] = true;
        $keys = UserCategoryJournalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getUserId(),
            $keys[2] => $this->getCategoryJournalId(),
            $keys[3] => $this->getDate(),
            $keys[4] => $this->getChecked(),
            $keys[5] => $this->getNotified(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                $result['User'] = $this->aUser->toArray($keyType, $includeLazyLoadColumns, $alreadyDumpedObjects, true);
            }
            if (null !== $this->aCategoryJournal) {
                $result['CategoryJournal'] = $this->aCategoryJournal->toArray(
                    $keyType,
                    $includeLazyLoadColumns,
                    $alreadyDumpedObjects,
                    true
                );
            }
            if (null !== $this->collUserCategoryJournalFields) {
                $result['UserCategoryJournalFields'] = $this->collUserCategoryJournalFields->toArray(
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
        $pos = UserCategoryJournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setUserId($value);
                break;
            case 2:
                $this->setCategoryJournalId($value);
                break;
            case 3:
                $this->setDate($value);
                break;
            case 4:
                $this->setChecked($value);
                break;
            case 5:
                $this->setNotified($value);
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
        $keys = UserCategoryJournalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCategoryJournalId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setDate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setChecked($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNotified($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(UserCategoryJournalPeer::DATABASE_NAME);

        if ($this->isColumnModified(UserCategoryJournalPeer::ID)) $criteria->add(
            UserCategoryJournalPeer::ID,
            $this->id
        );
        if ($this->isColumnModified(UserCategoryJournalPeer::USER_ID)) $criteria->add(
            UserCategoryJournalPeer::USER_ID,
            $this->user_id
        );
        if ($this->isColumnModified(UserCategoryJournalPeer::CATEGORY_JOURNAL_ID)) $criteria->add(
            UserCategoryJournalPeer::CATEGORY_JOURNAL_ID,
            $this->category_journal_id
        );
        if ($this->isColumnModified(UserCategoryJournalPeer::DATE)) $criteria->add(
            UserCategoryJournalPeer::DATE,
            $this->date
        );
        if ($this->isColumnModified(UserCategoryJournalPeer::CHECKED)) $criteria->add(
            UserCategoryJournalPeer::CHECKED,
            $this->checked
        );
        if ($this->isColumnModified(UserCategoryJournalPeer::NOTIFIED)) $criteria->add(
            UserCategoryJournalPeer::NOTIFIED,
            $this->notified
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
        $criteria = new Criteria(UserCategoryJournalPeer::DATABASE_NAME);
        $criteria->add(UserCategoryJournalPeer::ID, $this->id);

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
     * @param object $copyObj An object of UserCategoryJournal (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUserId($this->getUserId());
        $copyObj->setCategoryJournalId($this->getCategoryJournalId());
        $copyObj->setDate($this->getDate());
        $copyObj->setChecked($this->getChecked());
        $copyObj->setNotified($this->getNotified());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getUserCategoryJournalFields() as $relObj) {
                if ($relObj !== $this) { // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUserCategoryJournalField($relObj->copy($deepCopy));
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
     * @return UserCategoryJournal Clone of current object.
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
     * @return UserCategoryJournalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UserCategoryJournalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a User object.
     *
     * @param                  User $v
     * @return UserCategoryJournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(User $v = null)
    {
        if ($v === null) {
            $this->setUserId(null);
        } else {
            $this->setUserId($v->getId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the User object, it will not be re-added.
        if ($v !== null) {
            $v->addUserCategoryJournal($this);
        }


        return $this;
    }


    /**
     * Get the associated User object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return User The associated User object.
     * @throws PropelException
     */
    public function getUser(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUser === null && (($this->user_id !== "" && $this->user_id !== null)) && $doQuery) {
            $this->aUser = UserQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addUserCategoryJournals($this);
             */
        }

        return $this->aUser;
    }

    /**
     * Declares an association between this object and a CategoryJournal object.
     *
     * @param                  CategoryJournal $v
     * @return UserCategoryJournal The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategoryJournal(CategoryJournal $v = null)
    {
        if ($v === null) {
            $this->setCategoryJournalId(null);
        } else {
            $this->setCategoryJournalId($v->getId());
        }

        $this->aCategoryJournal = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the CategoryJournal object, it will not be re-added.
        if ($v !== null) {
            $v->addUserCategoryJournal($this);
        }


        return $this;
    }


    /**
     * Get the associated CategoryJournal object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return CategoryJournal The associated CategoryJournal object.
     * @throws PropelException
     */
    public function getCategoryJournal(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCategoryJournal === null && (($this->category_journal_id !== "" && $this->category_journal_id !== null)) && $doQuery) {
            $this->aCategoryJournal = CategoryJournalQuery::create()->findPk($this->category_journal_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategoryJournal->addUserCategoryJournals($this);
             */
        }

        return $this->aCategoryJournal;
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
        if ('UserCategoryJournalField' == $relationName) {
            $this->initUserCategoryJournalFields();
        }
    }

    /**
     * Clears out the collUserCategoryJournalFields collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return UserCategoryJournal The current object (for fluent API support)
     * @see        addUserCategoryJournalFields()
     */
    public function clearUserCategoryJournalFields()
    {
        $this->collUserCategoryJournalFields = null; // important to set this to null since that means it is uninitialized
        $this->collUserCategoryJournalFieldsPartial = null;

        return $this;
    }

    /**
     * reset is the collUserCategoryJournalFields collection loaded partially
     *
     * @return void
     */
    public function resetPartialUserCategoryJournalFields($v = true)
    {
        $this->collUserCategoryJournalFieldsPartial = $v;
    }

    /**
     * Initializes the collUserCategoryJournalFields collection.
     *
     * By default this just sets the collUserCategoryJournalFields collection to an empty array (like clearcollUserCategoryJournalFields());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserCategoryJournalFields($overrideExisting = true)
    {
        if (null !== $this->collUserCategoryJournalFields && !$overrideExisting) {
            return;
        }
        $this->collUserCategoryJournalFields = new PropelObjectCollection();
        $this->collUserCategoryJournalFields->setModel('UserCategoryJournalField');
    }

    /**
     * Gets an array of UserCategoryJournalField objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this UserCategoryJournal is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|UserCategoryJournalField[] List of UserCategoryJournalField objects
     * @throws PropelException
     */
    public function getUserCategoryJournalFields($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collUserCategoryJournalFieldsPartial && !$this->isNew();
        if (null === $this->collUserCategoryJournalFields || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserCategoryJournalFields) {
                // return empty collection
                $this->initUserCategoryJournalFields();
            } else {
                $collUserCategoryJournalFields = UserCategoryJournalFieldQuery::create(null, $criteria)
                    ->filterByUserCategoryJournal($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collUserCategoryJournalFieldsPartial && count(
                            $collUserCategoryJournalFields
                        )
                    ) {
                        $this->initUserCategoryJournalFields(false);

                        foreach ($collUserCategoryJournalFields as $obj) {
                            if (false == $this->collUserCategoryJournalFields->contains($obj)) {
                                $this->collUserCategoryJournalFields->append($obj);
                            }
                        }

                        $this->collUserCategoryJournalFieldsPartial = true;
                    }

                    $collUserCategoryJournalFields->getInternalIterator()->rewind();

                    return $collUserCategoryJournalFields;
                }

                if ($partial && $this->collUserCategoryJournalFields) {
                    foreach ($this->collUserCategoryJournalFields as $obj) {
                        if ($obj->isNew()) {
                            $collUserCategoryJournalFields[] = $obj;
                        }
                    }
                }

                $this->collUserCategoryJournalFields = $collUserCategoryJournalFields;
                $this->collUserCategoryJournalFieldsPartial = false;
            }
        }

        return $this->collUserCategoryJournalFields;
    }

    /**
     * Sets a collection of UserCategoryJournalField objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $userCategoryJournalFields A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function setUserCategoryJournalFields(PropelCollection $userCategoryJournalFields, PropelPDO $con = null)
    {
        $userCategoryJournalFieldsToDelete = $this->getUserCategoryJournalFields(new Criteria(), $con)->diff(
            $userCategoryJournalFields
        );


        $this->userCategoryJournalFieldsScheduledForDeletion = $userCategoryJournalFieldsToDelete;

        foreach ($userCategoryJournalFieldsToDelete as $userCategoryJournalFieldRemoved) {
            $userCategoryJournalFieldRemoved->setUserCategoryJournal(null);
        }

        $this->collUserCategoryJournalFields = null;
        foreach ($userCategoryJournalFields as $userCategoryJournalField) {
            $this->addUserCategoryJournalField($userCategoryJournalField);
        }

        $this->collUserCategoryJournalFields = $userCategoryJournalFields;
        $this->collUserCategoryJournalFieldsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related UserCategoryJournalField objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related UserCategoryJournalField objects.
     * @throws PropelException
     */
    public function countUserCategoryJournalFields(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collUserCategoryJournalFieldsPartial && !$this->isNew();
        if (null === $this->collUserCategoryJournalFields || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserCategoryJournalFields) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserCategoryJournalFields());
            }
            $query = UserCategoryJournalFieldQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUserCategoryJournal($this)
                ->count($con);
        }

        return count($this->collUserCategoryJournalFields);
    }

    /**
     * Method called to associate a UserCategoryJournalField object to this object
     * through the UserCategoryJournalField foreign key attribute.
     *
     * @param    UserCategoryJournalField $l UserCategoryJournalField
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function addUserCategoryJournalField(UserCategoryJournalField $l)
    {
        if ($this->collUserCategoryJournalFields === null) {
            $this->initUserCategoryJournalFields();
            $this->collUserCategoryJournalFieldsPartial = true;
        }

        if (!in_array(
            $l,
            $this->collUserCategoryJournalFields->getArrayCopy(),
            true
        )
        ) { // only add it if the **same** object is not already associated
            $this->doAddUserCategoryJournalField($l);

            if ($this->userCategoryJournalFieldsScheduledForDeletion and $this->userCategoryJournalFieldsScheduledForDeletion->contains(
                    $l
                )
            ) {
                $this->userCategoryJournalFieldsScheduledForDeletion->remove(
                    $this->userCategoryJournalFieldsScheduledForDeletion->search($l)
                );
            }
        }

        return $this;
    }

    /**
     * @param    UserCategoryJournalField $userCategoryJournalField The userCategoryJournalField object to add.
     */
    protected function doAddUserCategoryJournalField($userCategoryJournalField)
    {
        $this->collUserCategoryJournalFields[] = $userCategoryJournalField;
        $userCategoryJournalField->setUserCategoryJournal($this);
    }

    /**
     * @param    UserCategoryJournalField $userCategoryJournalField The userCategoryJournalField object to remove.
     * @return UserCategoryJournal The current object (for fluent API support)
     */
    public function removeUserCategoryJournalField($userCategoryJournalField)
    {
        if ($this->getUserCategoryJournalFields()->contains($userCategoryJournalField)) {
            $this->collUserCategoryJournalFields->remove(
                $this->collUserCategoryJournalFields->search($userCategoryJournalField)
            );
            if (null === $this->userCategoryJournalFieldsScheduledForDeletion) {
                $this->userCategoryJournalFieldsScheduledForDeletion = clone $this->collUserCategoryJournalFields;
                $this->userCategoryJournalFieldsScheduledForDeletion->clear();
            }
            $this->userCategoryJournalFieldsScheduledForDeletion[] = clone $userCategoryJournalField;
            $userCategoryJournalField->setUserCategoryJournal(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this UserCategoryJournal is new, it will return
     * an empty collection; or if this UserCategoryJournal has previously
     * been saved, it will retrieve related UserCategoryJournalFields from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in UserCategoryJournal.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UserCategoryJournalField[] List of UserCategoryJournalField objects
     */
    public function getUserCategoryJournalFieldsJoinCategoryJournalField(
        $criteria = null,
        $con = null,
        $join_behavior = Criteria::LEFT_JOIN
    ) {
        $query = UserCategoryJournalFieldQuery::create(null, $criteria);
        $query->joinWith('CategoryJournalField', $join_behavior);

        return $this->getUserCategoryJournalFields($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->user_id = null;
        $this->category_journal_id = null;
        $this->date = null;
        $this->checked = null;
        $this->notified = null;
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
            if ($this->collUserCategoryJournalFields) {
                foreach ($this->collUserCategoryJournalFields as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aUser instanceof Persistent) {
                $this->aUser->clearAllReferences($deep);
            }
            if ($this->aCategoryJournal instanceof Persistent) {
                $this->aCategoryJournal->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collUserCategoryJournalFields instanceof PropelCollection) {
            $this->collUserCategoryJournalFields->clearIterator();
        }
        $this->collUserCategoryJournalFields = null;
        $this->aUser = null;
        $this->aCategoryJournal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->exportTo(UserCategoryJournalPeer::DEFAULT_STRING_FORMAT);
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
