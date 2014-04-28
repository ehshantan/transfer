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
use CAD\TransferBundle\Model\CategoryJournal;
use CAD\TransferBundle\Model\CategoryJournalField;
use CAD\TransferBundle\Model\CategoryJournalFieldPeer;
use CAD\TransferBundle\Model\CategoryJournalFieldQuery;
use CAD\TransferBundle\Model\CategoryJournalFieldType;
use CAD\TransferBundle\Model\CategoryJournalFieldTypeQuery;
use CAD\TransferBundle\Model\CategoryJournalQuery;
use CAD\TransferBundle\Model\UserCategoryJournalField;
use CAD\TransferBundle\Model\UserCategoryJournalFieldQuery;

abstract class BaseCategoryJournalField extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'CAD\\TransferBundle\\Model\\CategoryJournalFieldPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        CategoryJournalFieldPeer
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
     * The value for the category_journal_id field.
     * @var        string
     */
    protected $category_journal_id;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the postfix field.
     * @var        string
     */
    protected $postfix;

    /**
     * The value for the category_journal_field_type_id field.
     * @var        string
     */
    protected $category_journal_field_type_id;

    /**
     * The value for the value field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $value;

    /**
     * The value for the active field.
     * Note: this column has a database default value of: true
     * @var        boolean
     */
    protected $active;

    /**
     * @var        CategoryJournalFieldType
     */
    protected $aCategoryJournalFieldType;

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
        $this->value = 0;
        $this->active = true;
    }

    /**
     * Initializes internal state of BaseCategoryJournalField object.
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
     * Get the [category_journal_id] column value.
     *
     * @return string
     */
    public function getCategoryJournalId()
    {

        return $this->category_journal_id;
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
     * Get the [postfix] column value.
     *
     * @return string
     */
    public function getPostfix()
    {

        return $this->postfix;
    }

    /**
     * Get the [category_journal_field_type_id] column value.
     *
     * @return string
     */
    public function getCategoryJournalFieldTypeId()
    {

        return $this->category_journal_field_type_id;
    }

    /**
     * Get the [value] column value.
     *
     * @return int
     */
    public function getValue()
    {

        return $this->value;
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
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::ID;
        }


        return $this;
    } // setId()

    /**
     * Set the value of [category_journal_id] column.
     *
     * @param  string $v new value
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setCategoryJournalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->category_journal_id !== $v) {
            $this->category_journal_id = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID;
        }

        if ($this->aCategoryJournal !== null && $this->aCategoryJournal->getId() !== $v) {
            $this->aCategoryJournal = null;
        }


        return $this;
    } // setCategoryJournalId()

    /**
     * Set the value of [name] column.
     *
     * @param  string $v new value
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [postfix] column.
     *
     * @param  string $v new value
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setPostfix($v)
    {
        if ($v !== null) {
            $v = (string)$v;
        }

        if ($this->postfix !== $v) {
            $this->postfix = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::POSTFIX;
        }


        return $this;
    } // setPostfix()

    /**
     * Set the value of [category_journal_field_type_id] column.
     *
     * @param  string $v new value
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setCategoryJournalFieldTypeId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string)$v;
        }

        if ($this->category_journal_field_type_id !== $v) {
            $this->category_journal_field_type_id = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID;
        }

        if ($this->aCategoryJournalFieldType !== null && $this->aCategoryJournalFieldType->getId() !== $v) {
            $this->aCategoryJournalFieldType = null;
        }


        return $this;
    } // setCategoryJournalFieldTypeId()

    /**
     * Set the value of [value] column.
     *
     * @param  int $v new value
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setValue($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int)$v;
        }

        if ($this->value !== $v) {
            $this->value = $v;
            $this->modifiedColumns[] = CategoryJournalFieldPeer::VALUE;
        }


        return $this;
    } // setValue()

    /**
     * Sets the value of the [active] column.
     * Non-boolean arguments are converted using the following rules:
     *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     *
     * @param boolean|integer|string $v The new value
     * @return CategoryJournalField The current object (for fluent API support)
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
            $this->modifiedColumns[] = CategoryJournalFieldPeer::ACTIVE;
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
        if ($this->value !== 0) {
            return false;
        }

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
            $this->category_journal_id = ($row[$startcol + 1] !== null) ? (string)$row[$startcol + 1] : null;
            $this->name = ($row[$startcol + 2] !== null) ? (string)$row[$startcol + 2] : null;
            $this->postfix = ($row[$startcol + 3] !== null) ? (string)$row[$startcol + 3] : null;
            $this->category_journal_field_type_id = ($row[$startcol + 4] !== null) ? (string)$row[$startcol + 4] : null;
            $this->value = ($row[$startcol + 5] !== null) ? (int)$row[$startcol + 5] : null;
            $this->active = ($row[$startcol + 6] !== null) ? (boolean)$row[$startcol + 6] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 7; // 7 = CategoryJournalFieldPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating CategoryJournalField object", $e);
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

        if ($this->aCategoryJournal !== null && $this->category_journal_id !== $this->aCategoryJournal->getId()) {
            $this->aCategoryJournal = null;
        }
        if ($this->aCategoryJournalFieldType !== null && $this->category_journal_field_type_id !== $this->aCategoryJournalFieldType->getId(
            )
        ) {
            $this->aCategoryJournalFieldType = null;
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
            $con = Propel::getConnection(CategoryJournalFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = CategoryJournalFieldPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) { // also de-associate any related objects?

            $this->aCategoryJournalFieldType = null;
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
            $con = Propel::getConnection(CategoryJournalFieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = CategoryJournalFieldQuery::create()
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
            $con = Propel::getConnection(CategoryJournalFieldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                CategoryJournalFieldPeer::addInstanceToPool($this);
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

            if ($this->aCategoryJournalFieldType !== null) {
                if ($this->aCategoryJournalFieldType->isModified() || $this->aCategoryJournalFieldType->isNew()) {
                    $affectedRows += $this->aCategoryJournalFieldType->save($con);
                }
                $this->setCategoryJournalFieldType($this->aCategoryJournalFieldType);
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

        $this->modifiedColumns[] = CategoryJournalFieldPeer::ID;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . CategoryJournalFieldPeer::ID . ')');
        }

        // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(CategoryJournalFieldPeer::ID)) {
            $modifiedColumns[':p' . $index++] = '`id`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID)) {
            $modifiedColumns[':p' . $index++] = '`category_journal_id`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::NAME)) {
            $modifiedColumns[':p' . $index++] = '`name`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::POSTFIX)) {
            $modifiedColumns[':p' . $index++] = '`postfix`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID)) {
            $modifiedColumns[':p' . $index++] = '`category_journal_field_type_id`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::VALUE)) {
            $modifiedColumns[':p' . $index++] = '`value`';
        }
        if ($this->isColumnModified(CategoryJournalFieldPeer::ACTIVE)) {
            $modifiedColumns[':p' . $index++] = '`active`';
        }

        $sql = sprintf(
            'INSERT INTO `category_journal_field` (%s) VALUES (%s)',
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
                    case '`category_journal_id`':
                        $stmt->bindValue($identifier, $this->category_journal_id, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`postfix`':
                        $stmt->bindValue($identifier, $this->postfix, PDO::PARAM_STR);
                        break;
                    case '`category_journal_field_type_id`':
                        $stmt->bindValue($identifier, $this->category_journal_field_type_id, PDO::PARAM_STR);
                        break;
                    case '`value`':
                        $stmt->bindValue($identifier, $this->value, PDO::PARAM_INT);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aCategoryJournalFieldType !== null) {
                if (!$this->aCategoryJournalFieldType->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategoryJournalFieldType->getValidationFailures());
                }
            }

            if ($this->aCategoryJournal !== null) {
                if (!$this->aCategoryJournal->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aCategoryJournal->getValidationFailures());
                }
            }


            if (($retval = CategoryJournalFieldPeer::doValidate($this, $columns)) !== true) {
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
        $pos = CategoryJournalFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getCategoryJournalId();
                break;
            case 2:
                return $this->getName();
                break;
            case 3:
                return $this->getPostfix();
                break;
            case 4:
                return $this->getCategoryJournalFieldTypeId();
                break;
            case 5:
                return $this->getValue();
                break;
            case 6:
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
        if (isset($alreadyDumpedObjects['CategoryJournalField'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['CategoryJournalField'][$this->getPrimaryKey()] = true;
        $keys = CategoryJournalFieldPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getCategoryJournalId(),
            $keys[2] => $this->getName(),
            $keys[3] => $this->getPostfix(),
            $keys[4] => $this->getCategoryJournalFieldTypeId(),
            $keys[5] => $this->getValue(),
            $keys[6] => $this->getActive(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aCategoryJournalFieldType) {
                $result['CategoryJournalFieldType'] = $this->aCategoryJournalFieldType->toArray(
                    $keyType,
                    $includeLazyLoadColumns,
                    $alreadyDumpedObjects,
                    true
                );
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
        $pos = CategoryJournalFieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setCategoryJournalId($value);
                break;
            case 2:
                $this->setName($value);
                break;
            case 3:
                $this->setPostfix($value);
                break;
            case 4:
                $this->setCategoryJournalFieldTypeId($value);
                break;
            case 5:
                $this->setValue($value);
                break;
            case 6:
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
        $keys = CategoryJournalFieldPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) $this->setCategoryJournalId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPostfix($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCategoryJournalFieldTypeId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setValue($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setActive($arr[$keys[6]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(CategoryJournalFieldPeer::DATABASE_NAME);

        if ($this->isColumnModified(CategoryJournalFieldPeer::ID)) $criteria->add(
            CategoryJournalFieldPeer::ID,
            $this->id
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID)) $criteria->add(
            CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID,
            $this->category_journal_id
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::NAME)) $criteria->add(
            CategoryJournalFieldPeer::NAME,
            $this->name
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::POSTFIX)) $criteria->add(
            CategoryJournalFieldPeer::POSTFIX,
            $this->postfix
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID)) $criteria->add(
            CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
            $this->category_journal_field_type_id
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::VALUE)) $criteria->add(
            CategoryJournalFieldPeer::VALUE,
            $this->value
        );
        if ($this->isColumnModified(CategoryJournalFieldPeer::ACTIVE)) $criteria->add(
            CategoryJournalFieldPeer::ACTIVE,
            $this->active
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
        $criteria = new Criteria(CategoryJournalFieldPeer::DATABASE_NAME);
        $criteria->add(CategoryJournalFieldPeer::ID, $this->id);

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
     * @param object $copyObj An object of CategoryJournalField (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setCategoryJournalId($this->getCategoryJournalId());
        $copyObj->setName($this->getName());
        $copyObj->setPostfix($this->getPostfix());
        $copyObj->setCategoryJournalFieldTypeId($this->getCategoryJournalFieldTypeId());
        $copyObj->setValue($this->getValue());
        $copyObj->setActive($this->getActive());

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
     * @return CategoryJournalField Clone of current object.
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
     * @return CategoryJournalFieldPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new CategoryJournalFieldPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a CategoryJournalFieldType object.
     *
     * @param                  CategoryJournalFieldType $v
     * @return CategoryJournalField The current object (for fluent API support)
     * @throws PropelException
     */
    public function setCategoryJournalFieldType(CategoryJournalFieldType $v = null)
    {
        if ($v === null) {
            $this->setCategoryJournalFieldTypeId(null);
        } else {
            $this->setCategoryJournalFieldTypeId($v->getId());
        }

        $this->aCategoryJournalFieldType = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the CategoryJournalFieldType object, it will not be re-added.
        if ($v !== null) {
            $v->addCategoryJournalField($this);
        }


        return $this;
    }


    /**
     * Get the associated CategoryJournalFieldType object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return CategoryJournalFieldType The associated CategoryJournalFieldType object.
     * @throws PropelException
     */
    public function getCategoryJournalFieldType(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aCategoryJournalFieldType === null && (($this->category_journal_field_type_id !== "" && $this->category_journal_field_type_id !== null)) && $doQuery) {
            $this->aCategoryJournalFieldType = CategoryJournalFieldTypeQuery::create()->findPk(
                $this->category_journal_field_type_id,
                $con
            );
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aCategoryJournalFieldType->addCategoryJournalFields($this);
             */
        }

        return $this->aCategoryJournalFieldType;
    }

    /**
     * Declares an association between this object and a CategoryJournal object.
     *
     * @param                  CategoryJournal $v
     * @return CategoryJournalField The current object (for fluent API support)
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
            $v->addCategoryJournalField($this);
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
                $this->aCategoryJournal->addCategoryJournalFields($this);
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
     * @return CategoryJournalField The current object (for fluent API support)
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
     * If this CategoryJournalField is new, it will return
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
                    ->filterByCategoryJournalField($this)
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
     * @return CategoryJournalField The current object (for fluent API support)
     */
    public function setUserCategoryJournalFields(PropelCollection $userCategoryJournalFields, PropelPDO $con = null)
    {
        $userCategoryJournalFieldsToDelete = $this->getUserCategoryJournalFields(new Criteria(), $con)->diff(
            $userCategoryJournalFields
        );


        $this->userCategoryJournalFieldsScheduledForDeletion = $userCategoryJournalFieldsToDelete;

        foreach ($userCategoryJournalFieldsToDelete as $userCategoryJournalFieldRemoved) {
            $userCategoryJournalFieldRemoved->setCategoryJournalField(null);
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
                ->filterByCategoryJournalField($this)
                ->count($con);
        }

        return count($this->collUserCategoryJournalFields);
    }

    /**
     * Method called to associate a UserCategoryJournalField object to this object
     * through the UserCategoryJournalField foreign key attribute.
     *
     * @param    UserCategoryJournalField $l UserCategoryJournalField
     * @return CategoryJournalField The current object (for fluent API support)
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
        $userCategoryJournalField->setCategoryJournalField($this);
    }

    /**
     * @param    UserCategoryJournalField $userCategoryJournalField The userCategoryJournalField object to remove.
     * @return CategoryJournalField The current object (for fluent API support)
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
            $userCategoryJournalField->setCategoryJournalField(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this CategoryJournalField is new, it will return
     * an empty collection; or if this CategoryJournalField has previously
     * been saved, it will retrieve related UserCategoryJournalFields from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in CategoryJournalField.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|UserCategoryJournalField[] List of UserCategoryJournalField objects
     */
    public function getUserCategoryJournalFieldsJoinUserCategoryJournal(
        $criteria = null,
        $con = null,
        $join_behavior = Criteria::LEFT_JOIN
    ) {
        $query = UserCategoryJournalFieldQuery::create(null, $criteria);
        $query->joinWith('UserCategoryJournal', $join_behavior);

        return $this->getUserCategoryJournalFields($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id = null;
        $this->category_journal_id = null;
        $this->name = null;
        $this->postfix = null;
        $this->category_journal_field_type_id = null;
        $this->value = null;
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
            if ($this->collUserCategoryJournalFields) {
                foreach ($this->collUserCategoryJournalFields as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aCategoryJournalFieldType instanceof Persistent) {
                $this->aCategoryJournalFieldType->clearAllReferences($deep);
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
        $this->aCategoryJournalFieldType = null;
        $this->aCategoryJournal = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string)$this->exportTo(CategoryJournalFieldPeer::DEFAULT_STRING_FORMAT);
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
