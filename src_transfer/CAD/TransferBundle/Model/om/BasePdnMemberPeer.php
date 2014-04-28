<?php

namespace CAD\TransferBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use CAD\TransferBundle\Model\PdnMember;
use CAD\TransferBundle\Model\PdnMemberPeer;
use CAD\TransferBundle\Model\map\PdnMemberTableMap;

abstract class BasePdnMemberPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'default';

    /** the table name for this class */
    const TABLE_NAME = 'pdn_member';

    /** the related Propel class for this table */
    const OM_CLASS = 'CAD\\TransferBundle\\Model\\PdnMember';

    /** the related TableMap class for this table */
    const TM_CLASS = 'CAD\\TransferBundle\\Model\\map\\PdnMemberTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the id field */
    const ID = 'pdn_member.id';

    /** the column name for the email field */
    const EMAIL = 'pdn_member.email';

    /** the column name for the password field */
    const PASSWORD = 'pdn_member.password';

    /** the column name for the realname field */
    const REALNAME = 'pdn_member.realname';

    /** the column name for the angkatan field */
    const ANGKATAN = 'pdn_member.angkatan';

    /** the column name for the hall field */
    const HALL = 'pdn_member.hall';

    /** the column name for the lokasi field */
    const LOKASI = 'pdn_member.lokasi';

    /** the column name for the telepon field */
    const TELEPON = 'pdn_member.telepon';

    /** the column name for the handphone field */
    const HANDPHONE = 'pdn_member.handphone';

    /** the column name for the handphone_2 field */
    const HANDPHONE_2 = 'pdn_member.handphone_2';

    /** the column name for the id_member field */
    const ID_MEMBER = 'pdn_member.id_member';

    /** the column name for the alamat field */
    const ALAMAT = 'pdn_member.alamat';

    /** the column name for the is_approved field */
    const IS_APPROVED = 'pdn_member.is_approved';

    /** the column name for the last_login field */
    const LAST_LOGIN = 'pdn_member.last_login';

    /** the column name for the jenis_kelamin field */
    const JENIS_KELAMIN = 'pdn_member.jenis_kelamin';

    /** the column name for the tipe_member field */
    const TIPE_MEMBER = 'pdn_member.tipe_member';

    /** the column name for the id_kelompok field */
    const ID_KELOMPOK = 'pdn_member.id_kelompok';

    /** the column name for the type field */
    const TYPE = 'pdn_member.type';

    /** the column name for the tgl_masuk field */
    const TGL_MASUK = 'pdn_member.tgl_masuk';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of PdnMember objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PdnMember[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PdnMemberPeer::$fieldNames[PdnMemberPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id',
            'Email',
            'Password',
            'Realname',
            'Angkatan',
            'Hall',
            'Lokasi',
            'Telepon',
            'Handphone',
            'Handphone2',
            'IdMember',
            'Alamat',
            'IsApproved',
            'LastLogin',
            'JenisKelamin',
            'TipeMember',
            'IdKelompok',
            'Type',
            'TglMasuk',
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id',
            'email',
            'password',
            'realname',
            'angkatan',
            'hall',
            'lokasi',
            'telepon',
            'handphone',
            'handphone2',
            'idMember',
            'alamat',
            'isApproved',
            'lastLogin',
            'jenisKelamin',
            'tipeMember',
            'idKelompok',
            'type',
            'tglMasuk',
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnMemberPeer::ID,
            PdnMemberPeer::EMAIL,
            PdnMemberPeer::PASSWORD,
            PdnMemberPeer::REALNAME,
            PdnMemberPeer::ANGKATAN,
            PdnMemberPeer::HALL,
            PdnMemberPeer::LOKASI,
            PdnMemberPeer::TELEPON,
            PdnMemberPeer::HANDPHONE,
            PdnMemberPeer::HANDPHONE_2,
            PdnMemberPeer::ID_MEMBER,
            PdnMemberPeer::ALAMAT,
            PdnMemberPeer::IS_APPROVED,
            PdnMemberPeer::LAST_LOGIN,
            PdnMemberPeer::JENIS_KELAMIN,
            PdnMemberPeer::TIPE_MEMBER,
            PdnMemberPeer::ID_KELOMPOK,
            PdnMemberPeer::TYPE,
            PdnMemberPeer::TGL_MASUK,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID',
            'EMAIL',
            'PASSWORD',
            'REALNAME',
            'ANGKATAN',
            'HALL',
            'LOKASI',
            'TELEPON',
            'HANDPHONE',
            'HANDPHONE_2',
            'ID_MEMBER',
            'ALAMAT',
            'IS_APPROVED',
            'LAST_LOGIN',
            'JENIS_KELAMIN',
            'TIPE_MEMBER',
            'ID_KELOMPOK',
            'TYPE',
            'TGL_MASUK',
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id',
            'email',
            'password',
            'realname',
            'angkatan',
            'hall',
            'lokasi',
            'telepon',
            'handphone',
            'handphone_2',
            'id_member',
            'alamat',
            'is_approved',
            'last_login',
            'jenis_kelamin',
            'tipe_member',
            'id_kelompok',
            'type',
            'tgl_masuk',
        ),
        BasePeer::TYPE_NUM => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,)
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PdnMemberPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array(
        BasePeer::TYPE_PHPNAME => array(
            'Id' => 0,
            'Email' => 1,
            'Password' => 2,
            'Realname' => 3,
            'Angkatan' => 4,
            'Hall' => 5,
            'Lokasi' => 6,
            'Telepon' => 7,
            'Handphone' => 8,
            'Handphone2' => 9,
            'IdMember' => 10,
            'Alamat' => 11,
            'IsApproved' => 12,
            'LastLogin' => 13,
            'JenisKelamin' => 14,
            'TipeMember' => 15,
            'IdKelompok' => 16,
            'Type' => 17,
            'TglMasuk' => 18,
        ),
        BasePeer::TYPE_STUDLYPHPNAME => array(
            'id' => 0,
            'email' => 1,
            'password' => 2,
            'realname' => 3,
            'angkatan' => 4,
            'hall' => 5,
            'lokasi' => 6,
            'telepon' => 7,
            'handphone' => 8,
            'handphone2' => 9,
            'idMember' => 10,
            'alamat' => 11,
            'isApproved' => 12,
            'lastLogin' => 13,
            'jenisKelamin' => 14,
            'tipeMember' => 15,
            'idKelompok' => 16,
            'type' => 17,
            'tglMasuk' => 18,
        ),
        BasePeer::TYPE_COLNAME => array(
            PdnMemberPeer::ID => 0,
            PdnMemberPeer::EMAIL => 1,
            PdnMemberPeer::PASSWORD => 2,
            PdnMemberPeer::REALNAME => 3,
            PdnMemberPeer::ANGKATAN => 4,
            PdnMemberPeer::HALL => 5,
            PdnMemberPeer::LOKASI => 6,
            PdnMemberPeer::TELEPON => 7,
            PdnMemberPeer::HANDPHONE => 8,
            PdnMemberPeer::HANDPHONE_2 => 9,
            PdnMemberPeer::ID_MEMBER => 10,
            PdnMemberPeer::ALAMAT => 11,
            PdnMemberPeer::IS_APPROVED => 12,
            PdnMemberPeer::LAST_LOGIN => 13,
            PdnMemberPeer::JENIS_KELAMIN => 14,
            PdnMemberPeer::TIPE_MEMBER => 15,
            PdnMemberPeer::ID_KELOMPOK => 16,
            PdnMemberPeer::TYPE => 17,
            PdnMemberPeer::TGL_MASUK => 18,
        ),
        BasePeer::TYPE_RAW_COLNAME => array(
            'ID' => 0,
            'EMAIL' => 1,
            'PASSWORD' => 2,
            'REALNAME' => 3,
            'ANGKATAN' => 4,
            'HALL' => 5,
            'LOKASI' => 6,
            'TELEPON' => 7,
            'HANDPHONE' => 8,
            'HANDPHONE_2' => 9,
            'ID_MEMBER' => 10,
            'ALAMAT' => 11,
            'IS_APPROVED' => 12,
            'LAST_LOGIN' => 13,
            'JENIS_KELAMIN' => 14,
            'TIPE_MEMBER' => 15,
            'ID_KELOMPOK' => 16,
            'TYPE' => 17,
            'TGL_MASUK' => 18,
        ),
        BasePeer::TYPE_FIELDNAME => array(
            'id' => 0,
            'email' => 1,
            'password' => 2,
            'realname' => 3,
            'angkatan' => 4,
            'hall' => 5,
            'lokasi' => 6,
            'telepon' => 7,
            'handphone' => 8,
            'handphone_2' => 9,
            'id_member' => 10,
            'alamat' => 11,
            'is_approved' => 12,
            'last_login' => 13,
            'jenis_kelamin' => 14,
            'tipe_member' => 15,
            'id_kelompok' => 16,
            'type' => 17,
            'tgl_masuk' => 18,
        ),
        BasePeer::TYPE_NUM => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,)
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
        $toNames = PdnMemberPeer::getFieldNames($toType);
        $key = isset(PdnMemberPeer::$fieldKeys[$fromType][$name]) ? PdnMemberPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(
                PdnMemberPeer::$fieldKeys[$fromType],
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
        if (!array_key_exists($type, PdnMemberPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PdnMemberPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PdnMemberPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PdnMemberPeer::TABLE_NAME . '.', $alias . '.', $column);
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
            $criteria->addSelectColumn(PdnMemberPeer::ID);
            $criteria->addSelectColumn(PdnMemberPeer::EMAIL);
            $criteria->addSelectColumn(PdnMemberPeer::PASSWORD);
            $criteria->addSelectColumn(PdnMemberPeer::REALNAME);
            $criteria->addSelectColumn(PdnMemberPeer::ANGKATAN);
            $criteria->addSelectColumn(PdnMemberPeer::HALL);
            $criteria->addSelectColumn(PdnMemberPeer::LOKASI);
            $criteria->addSelectColumn(PdnMemberPeer::TELEPON);
            $criteria->addSelectColumn(PdnMemberPeer::HANDPHONE);
            $criteria->addSelectColumn(PdnMemberPeer::HANDPHONE_2);
            $criteria->addSelectColumn(PdnMemberPeer::ID_MEMBER);
            $criteria->addSelectColumn(PdnMemberPeer::ALAMAT);
            $criteria->addSelectColumn(PdnMemberPeer::IS_APPROVED);
            $criteria->addSelectColumn(PdnMemberPeer::LAST_LOGIN);
            $criteria->addSelectColumn(PdnMemberPeer::JENIS_KELAMIN);
            $criteria->addSelectColumn(PdnMemberPeer::TIPE_MEMBER);
            $criteria->addSelectColumn(PdnMemberPeer::ID_KELOMPOK);
            $criteria->addSelectColumn(PdnMemberPeer::TYPE);
            $criteria->addSelectColumn(PdnMemberPeer::TGL_MASUK);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.realname');
            $criteria->addSelectColumn($alias . '.angkatan');
            $criteria->addSelectColumn($alias . '.hall');
            $criteria->addSelectColumn($alias . '.lokasi');
            $criteria->addSelectColumn($alias . '.telepon');
            $criteria->addSelectColumn($alias . '.handphone');
            $criteria->addSelectColumn($alias . '.handphone_2');
            $criteria->addSelectColumn($alias . '.id_member');
            $criteria->addSelectColumn($alias . '.alamat');
            $criteria->addSelectColumn($alias . '.is_approved');
            $criteria->addSelectColumn($alias . '.last_login');
            $criteria->addSelectColumn($alias . '.jenis_kelamin');
            $criteria->addSelectColumn($alias . '.tipe_member');
            $criteria->addSelectColumn($alias . '.id_kelompok');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.tgl_masuk');
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
        $criteria->setPrimaryTableName(PdnMemberPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PdnMemberPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PdnMemberPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return PdnMember
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PdnMemberPeer::doSelect($critcopy, $con);
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
        return PdnMemberPeer::populateObjects(PdnMemberPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PdnMemberPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PdnMemberPeer::DATABASE_NAME);

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
     * @param PdnMember $obj A PdnMember object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string)$obj->getId();
            } // if key === null
            PdnMemberPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A PdnMember object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PdnMember) {
                $key = (string)$value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string)$value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PdnMember object; got " . (is_object(
                    $value
                ) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(PdnMemberPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return PdnMember Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PdnMemberPeer::$instances[$key])) {
                return PdnMemberPeer::$instances[$key];
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
            foreach (PdnMemberPeer::$instances as $instance) {
                $instance->clearAllReferences(true);
            }
        }
        PdnMemberPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to pdn_member
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
        $cls = PdnMemberPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PdnMemberPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PdnMemberPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PdnMemberPeer::addInstanceToPool($obj, $key);
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
     * @return array (PdnMember object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PdnMemberPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PdnMemberPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PdnMemberPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PdnMemberPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PdnMemberPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(PdnMemberPeer::DATABASE_NAME)->getTable(PdnMemberPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getDatabaseMap(BasePdnMemberPeer::DATABASE_NAME);
        if (!$dbMap->hasTable(BasePdnMemberPeer::TABLE_NAME)) {
            $dbMap->addTableObject(new \CAD\TransferBundle\Model\map\PdnMemberTableMap());
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
        return PdnMemberPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PdnMember or Criteria object.
     *
     * @param      mixed $values Criteria or PdnMember object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PdnMember object
        }

        if ($criteria->containsKey(PdnMemberPeer::ID) && $criteria->keyContainsValue(PdnMemberPeer::ID)) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PdnMemberPeer::ID . ')');
        }


        // Set the correct dbName
        $criteria->setDbName(PdnMemberPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a PdnMember or Criteria object.
     *
     * @param      mixed $values Criteria or PdnMember object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PdnMemberPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PdnMemberPeer::ID);
            $value = $criteria->remove(PdnMemberPeer::ID);
            if ($value) {
                $selectCriteria->add(PdnMemberPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PdnMemberPeer::TABLE_NAME);
            }

        } else { // $values is PdnMember object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PdnMemberPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pdn_member table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PdnMemberPeer::TABLE_NAME, $con, PdnMemberPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PdnMemberPeer::clearInstancePool();
            PdnMemberPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PdnMember or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PdnMember object or primary key or array of primary keys
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
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PdnMemberPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PdnMember) { // it's a model object
            // invalidate the cache for this single object
            PdnMemberPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PdnMemberPeer::DATABASE_NAME);
            $criteria->add(PdnMemberPeer::ID, (array)$values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array)$values as $singleval) {
                PdnMemberPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PdnMemberPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            PdnMemberPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PdnMember object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param PdnMember $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PdnMemberPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PdnMemberPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PdnMemberPeer::DATABASE_NAME, PdnMemberPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PdnMember
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PdnMemberPeer::getInstanceFromPool((string)$pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PdnMemberPeer::DATABASE_NAME);
        $criteria->add(PdnMemberPeer::ID, $pk);

        $v = PdnMemberPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PdnMember[]
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PdnMemberPeer::DATABASE_NAME);
            $criteria->add(PdnMemberPeer::ID, $pks, Criteria::IN);
            $objs = PdnMemberPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePdnMemberPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePdnMemberPeer::buildTableMap();

