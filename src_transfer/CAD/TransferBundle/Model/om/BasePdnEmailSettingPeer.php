<?php

namespace CAD\TransferBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\PdnEmailSetting;
use CAD\TransferBundle\Model\PdnEmailSettingPeer;
use CAD\TransferBundle\Model\map\PdnEmailSettingTableMap;

abstract class BasePdnEmailSettingPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'default';

    /** the table name for this class */
    const TABLE_NAME = 'pdn_email_setting';

    /** the related Propel class for this table */
    const OM_CLASS = 'CAD\\TransferBundle\\Model\\PdnEmailSetting';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CAD\\TransferBundle\\Model\\map\\PdnEmailSettingTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the id field */
    const ID = 'pdn_email_setting.id';

    /** the column name for the pg_subject field */
    const PG_SUBJECT = 'pdn_email_setting.pg_subject';

    /** the column name for the pg_message field */
    const PG_MESSAGE = 'pdn_email_setting.pg_message';

    /** the column name for the ktb_subject field */
    const KTB_SUBJECT = 'pdn_email_setting.ktb_subject';

    /** the column name for the ktb_message field */
    const KTB_MESSAGE = 'pdn_email_setting.ktb_message';

    /** the column name for the doa_subject field */
    const DOA_SUBJECT = 'pdn_email_setting.doa_subject';

    /** the column name for the doa_message field */
    const DOA_MESSAGE = 'pdn_email_setting.doa_message';

    /** the column name for the rohani_subject field */
    const ROHANI_SUBJECT = 'pdn_email_setting.rohani_subject';

    /** the column name for the rohani_message field */
    const ROHANI_MESSAGE = 'pdn_email_setting.rohani_message';

    /** the column name for the sidang_subject field */
    const SIDANG_SUBJECT = 'pdn_email_setting.sidang_subject';

    /** the column name for the sidang_message field */
    const SIDANG_MESSAGE = 'pdn_email_setting.sidang_message';

    /** the column name for the jenguk_subject field */
    const JENGUK_SUBJECT = 'pdn_email_setting.jenguk_subject';

    /** the column name for the jenguk_message field */
    const JENGUK_MESSAGE = 'pdn_email_setting.jenguk_message';

    /** the column name for the pengumuman_subject field */
    const PENGUMUMAN_SUBJECT = 'pdn_email_setting.pengumuman_subject';

    /** the column name for the pengumuman_message field */
    const PENGUMUMAN_MESSAGE = 'pdn_email_setting.pengumuman_message';

    /** the column name for the pengumuman_file field */
    const PENGUMUMAN_FILE = 'pdn_email_setting.pengumuman_file';

    /** the column name for the tugas_subject field */
    const TUGAS_SUBJECT = 'pdn_email_setting.tugas_subject';

    /** the column name for the tugas_message field */
    const TUGAS_MESSAGE = 'pdn_email_setting.tugas_message';

    /** the column name for the tugas_file field */
    const TUGAS_FILE = 'pdn_email_setting.tugas_file';

    /** the column name for the email_cc field */
    const EMAIL_CC = 'pdn_email_setting.email_cc';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of PdnEmailSetting objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PdnEmailSetting[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PdnEmailSettingPeer::$fieldNames[PdnEmailSettingPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id',
            'PgSubject',
            'PgMessage',
            'KtbSubject',
            'KtbMessage',
            'DoaSubject',
            'DoaMessage',
            'RohaniSubject',
            'RohaniMessage',
            'SidangSubject',
            'SidangMessage',
            'JengukSubject',
            'JengukMessage',
            'PengumumanSubject',
            'PengumumanMessage',
            'PengumumanFile',
            'TugasSubject',
            'TugasMessage',
            'TugasFile',
            'EmailCc',
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id',
            'pgSubject',
            'pgMessage',
            'ktbSubject',
            'ktbMessage',
            'doaSubject',
            'doaMessage',
            'rohaniSubject',
            'rohaniMessage',
            'sidangSubject',
            'sidangMessage',
            'jengukSubject',
            'jengukMessage',
            'pengumumanSubject',
            'pengumumanMessage',
            'pengumumanFile',
            'tugasSubject',
            'tugasMessage',
            'tugasFile',
            'emailCc',
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnEmailSettingPeer::ID,
            PdnEmailSettingPeer::PG_SUBJECT,
            PdnEmailSettingPeer::PG_MESSAGE,
            PdnEmailSettingPeer::KTB_SUBJECT,
            PdnEmailSettingPeer::KTB_MESSAGE,
            PdnEmailSettingPeer::DOA_SUBJECT,
            PdnEmailSettingPeer::DOA_MESSAGE,
            PdnEmailSettingPeer::ROHANI_SUBJECT,
            PdnEmailSettingPeer::ROHANI_MESSAGE,
            PdnEmailSettingPeer::SIDANG_SUBJECT,
            PdnEmailSettingPeer::SIDANG_MESSAGE,
            PdnEmailSettingPeer::JENGUK_SUBJECT,
            PdnEmailSettingPeer::JENGUK_MESSAGE,
            PdnEmailSettingPeer::PENGUMUMAN_SUBJECT,
            PdnEmailSettingPeer::PENGUMUMAN_MESSAGE,
            PdnEmailSettingPeer::PENGUMUMAN_FILE,
            PdnEmailSettingPeer::TUGAS_SUBJECT,
            PdnEmailSettingPeer::TUGAS_MESSAGE,
            PdnEmailSettingPeer::TUGAS_FILE,
            PdnEmailSettingPeer::EMAIL_CC,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID',
            'PG_SUBJECT',
            'PG_MESSAGE',
            'KTB_SUBJECT',
            'KTB_MESSAGE',
            'DOA_SUBJECT',
            'DOA_MESSAGE',
            'ROHANI_SUBJECT',
            'ROHANI_MESSAGE',
            'SIDANG_SUBJECT',
            'SIDANG_MESSAGE',
            'JENGUK_SUBJECT',
            'JENGUK_MESSAGE',
            'PENGUMUMAN_SUBJECT',
            'PENGUMUMAN_MESSAGE',
            'PENGUMUMAN_FILE',
            'TUGAS_SUBJECT',
            'TUGAS_MESSAGE',
            'TUGAS_FILE',
            'EMAIL_CC',
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id',
            'pg_subject',
            'pg_message',
            'ktb_subject',
            'ktb_message',
            'doa_subject',
            'doa_message',
            'rohani_subject',
            'rohani_message',
            'sidang_subject',
            'sidang_message',
            'jenguk_subject',
            'jenguk_message',
            'pengumuman_subject',
            'pengumuman_message',
            'pengumuman_file',
            'tugas_subject',
            'tugas_message',
            'tugas_file',
            'email_cc',
        ),
        BasePeer::TYPE_NUM => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,)
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PdnEmailSettingPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id' => 0,
            'PgSubject' => 1,
            'PgMessage' => 2,
            'KtbSubject' => 3,
            'KtbMessage' => 4,
            'DoaSubject' => 5,
            'DoaMessage' => 6,
            'RohaniSubject' => 7,
            'RohaniMessage' => 8,
            'SidangSubject' => 9,
            'SidangMessage' => 10,
            'JengukSubject' => 11,
            'JengukMessage' => 12,
            'PengumumanSubject' => 13,
            'PengumumanMessage' => 14,
            'PengumumanFile' => 15,
            'TugasSubject' => 16,
            'TugasMessage' => 17,
            'TugasFile' => 18,
            'EmailCc' => 19,
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id' => 0,
            'pgSubject' => 1,
            'pgMessage' => 2,
            'ktbSubject' => 3,
            'ktbMessage' => 4,
            'doaSubject' => 5,
            'doaMessage' => 6,
            'rohaniSubject' => 7,
            'rohaniMessage' => 8,
            'sidangSubject' => 9,
            'sidangMessage' => 10,
            'jengukSubject' => 11,
            'jengukMessage' => 12,
            'pengumumanSubject' => 13,
            'pengumumanMessage' => 14,
            'pengumumanFile' => 15,
            'tugasSubject' => 16,
            'tugasMessage' => 17,
            'tugasFile' => 18,
            'emailCc' => 19,
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnEmailSettingPeer::ID => 0,
            PdnEmailSettingPeer::PG_SUBJECT => 1,
            PdnEmailSettingPeer::PG_MESSAGE => 2,
            PdnEmailSettingPeer::KTB_SUBJECT => 3,
            PdnEmailSettingPeer::KTB_MESSAGE => 4,
            PdnEmailSettingPeer::DOA_SUBJECT => 5,
            PdnEmailSettingPeer::DOA_MESSAGE => 6,
            PdnEmailSettingPeer::ROHANI_SUBJECT => 7,
            PdnEmailSettingPeer::ROHANI_MESSAGE => 8,
            PdnEmailSettingPeer::SIDANG_SUBJECT => 9,
            PdnEmailSettingPeer::SIDANG_MESSAGE => 10,
            PdnEmailSettingPeer::JENGUK_SUBJECT => 11,
            PdnEmailSettingPeer::JENGUK_MESSAGE => 12,
            PdnEmailSettingPeer::PENGUMUMAN_SUBJECT => 13,
            PdnEmailSettingPeer::PENGUMUMAN_MESSAGE => 14,
            PdnEmailSettingPeer::PENGUMUMAN_FILE => 15,
            PdnEmailSettingPeer::TUGAS_SUBJECT => 16,
            PdnEmailSettingPeer::TUGAS_MESSAGE => 17,
            PdnEmailSettingPeer::TUGAS_FILE => 18,
            PdnEmailSettingPeer::EMAIL_CC => 19,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID' => 0,
            'PG_SUBJECT' => 1,
            'PG_MESSAGE' => 2,
            'KTB_SUBJECT' => 3,
            'KTB_MESSAGE' => 4,
            'DOA_SUBJECT' => 5,
            'DOA_MESSAGE' => 6,
            'ROHANI_SUBJECT' => 7,
            'ROHANI_MESSAGE' => 8,
            'SIDANG_SUBJECT' => 9,
            'SIDANG_MESSAGE' => 10,
            'JENGUK_SUBJECT' => 11,
            'JENGUK_MESSAGE' => 12,
            'PENGUMUMAN_SUBJECT' => 13,
            'PENGUMUMAN_MESSAGE' => 14,
            'PENGUMUMAN_FILE' => 15,
            'TUGAS_SUBJECT' => 16,
            'TUGAS_MESSAGE' => 17,
            'TUGAS_FILE' => 18,
            'EMAIL_CC' => 19,
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id' => 0,
            'pg_subject' => 1,
            'pg_message' => 2,
            'ktb_subject' => 3,
            'ktb_message' => 4,
            'doa_subject' => 5,
            'doa_message' => 6,
            'rohani_subject' => 7,
            'rohani_message' => 8,
            'sidang_subject' => 9,
            'sidang_message' => 10,
            'jenguk_subject' => 11,
            'jenguk_message' => 12,
            'pengumuman_subject' => 13,
            'pengumuman_message' => 14,
            'pengumuman_file' => 15,
            'tugas_subject' => 16,
            'tugas_message' => 17,
            'tugas_file' => 18,
            'email_cc' => 19,
        ),
        BasePeer::TYPE_NUM => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,)
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
        $toNames = PdnEmailSettingPeer::getFieldNames($toType);
        $key = isset(PdnEmailSettingPeer::$fieldKeys[$fromType][$name]) ? PdnEmailSettingPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(
                PdnEmailSettingPeer::$fieldKeys[$fromType],
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
        if (!array_key_exists($type, PdnEmailSettingPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PdnEmailSettingPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PdnEmailSettingPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PdnEmailSettingPeer::TABLE_NAME . '.', $alias . '.', $column);
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
            $criteria->addSelectColumn(PdnEmailSettingPeer::ID);
            $criteria->addSelectColumn(PdnEmailSettingPeer::PG_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::PG_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::KTB_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::KTB_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::DOA_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::DOA_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::ROHANI_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::ROHANI_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::SIDANG_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::SIDANG_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::JENGUK_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::JENGUK_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::PENGUMUMAN_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::PENGUMUMAN_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::PENGUMUMAN_FILE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::TUGAS_SUBJECT);
            $criteria->addSelectColumn(PdnEmailSettingPeer::TUGAS_MESSAGE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::TUGAS_FILE);
            $criteria->addSelectColumn(PdnEmailSettingPeer::EMAIL_CC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.pg_subject');
            $criteria->addSelectColumn($alias . '.pg_message');
            $criteria->addSelectColumn($alias . '.ktb_subject');
            $criteria->addSelectColumn($alias . '.ktb_message');
            $criteria->addSelectColumn($alias . '.doa_subject');
            $criteria->addSelectColumn($alias . '.doa_message');
            $criteria->addSelectColumn($alias . '.rohani_subject');
            $criteria->addSelectColumn($alias . '.rohani_message');
            $criteria->addSelectColumn($alias . '.sidang_subject');
            $criteria->addSelectColumn($alias . '.sidang_message');
            $criteria->addSelectColumn($alias . '.jenguk_subject');
            $criteria->addSelectColumn($alias . '.jenguk_message');
            $criteria->addSelectColumn($alias . '.pengumuman_subject');
            $criteria->addSelectColumn($alias . '.pengumuman_message');
            $criteria->addSelectColumn($alias . '.pengumuman_file');
            $criteria->addSelectColumn($alias . '.tugas_subject');
            $criteria->addSelectColumn($alias . '.tugas_message');
            $criteria->addSelectColumn($alias . '.tugas_file');
            $criteria->addSelectColumn($alias . '.email_cc');
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
        $criteria->setPrimaryTableName(PdnEmailSettingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PdnEmailSettingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PdnEmailSettingPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return PdnEmailSetting
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PdnEmailSettingPeer::doSelect($critcopy, $con);
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
        return PdnEmailSettingPeer::populateObjects(PdnEmailSettingPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PdnEmailSettingPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PdnEmailSettingPeer::DATABASE_NAME);

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
     * @param PdnEmailSetting $obj A PdnEmailSetting object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string)$obj->getId();
            } // if key === null
            PdnEmailSettingPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A PdnEmailSetting object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PdnEmailSetting) {
                $key = (string)$value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string)$value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PdnEmailSetting object; got " . (is_object(
                    $value
                ) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(PdnEmailSettingPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return PdnEmailSetting Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PdnEmailSettingPeer::$instances[$key])) {
                return PdnEmailSettingPeer::$instances[$key];
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
            foreach (PdnEmailSettingPeer::$instances as $instance) {
                $instance->clearAllReferences(true);
            }
        }
        PdnEmailSettingPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pdn_email_setting
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
        $cls = PdnEmailSettingPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PdnEmailSettingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PdnEmailSettingPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PdnEmailSettingPeer::addInstanceToPool($obj, $key);
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
     * @return array (PdnEmailSetting object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PdnEmailSettingPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PdnEmailSettingPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PdnEmailSettingPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PdnEmailSettingPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PdnEmailSettingPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(PdnEmailSettingPeer::DATABASE_NAME)->getTable(PdnEmailSettingPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getDatabaseMap(BasePdnEmailSettingPeer::DATABASE_NAME);
        if (!$dbMap->hasTable(BasePdnEmailSettingPeer::TABLE_NAME)) {
            $dbMap->addTableObject(new \CAD\TransferBundle\Model\map\PdnEmailSettingTableMap());
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
        return PdnEmailSettingPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PdnEmailSetting or Criteria object.
     *
     * @param      mixed $values Criteria or PdnEmailSetting object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PdnEmailSetting object
        }

        if ($criteria->containsKey(PdnEmailSettingPeer::ID) && $criteria->keyContainsValue(PdnEmailSettingPeer::ID)) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnEmailSettingPeer::ID . ')');
        }


        // Set the correct dbName
        $criteria->setDbName(PdnEmailSettingPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a PdnEmailSetting or Criteria object.
     *
     * @param      mixed $values Criteria or PdnEmailSetting object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PdnEmailSettingPeer::ID);
            $value = $criteria->remove(PdnEmailSettingPeer::ID);
            if ($value) {
                $selectCriteria->add(PdnEmailSettingPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PdnEmailSettingPeer::TABLE_NAME);
            }

        } else { // $values is PdnEmailSetting object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PdnEmailSettingPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pdn_email_setting table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(
                PdnEmailSettingPeer::TABLE_NAME,
                $con,
                PdnEmailSettingPeer::DATABASE_NAME
            );
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PdnEmailSettingPeer::clearInstancePool();
            PdnEmailSettingPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PdnEmailSetting or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PdnEmailSetting object or primary key or array of primary keys
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
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PdnEmailSettingPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PdnEmailSetting) { // it's a model object
            // invalidate the cache for this single object
            PdnEmailSettingPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);
            $criteria->add(PdnEmailSettingPeer::ID, (array)$values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array)$values as $singleval) {
                PdnEmailSettingPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PdnEmailSettingPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PdnEmailSettingPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PdnEmailSetting object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param PdnEmailSetting $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PdnEmailSettingPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PdnEmailSettingPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PdnEmailSettingPeer::DATABASE_NAME, PdnEmailSettingPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PdnEmailSetting
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PdnEmailSettingPeer::getInstanceFromPool((string)$pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);
        $criteria->add(PdnEmailSettingPeer::ID, $pk);

        $v = PdnEmailSettingPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PdnEmailSetting[]
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PdnEmailSettingPeer::DATABASE_NAME);
            $criteria->add(PdnEmailSettingPeer::ID, $pks, Criteria::IN);
            $objs = PdnEmailSettingPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePdnEmailSettingPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePdnEmailSettingPeer::buildTableMap();

