<?php

namespace CAD\TransferBundle\Model\Conn1\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CAD\TransferBundle\Model\Conn1\PdnEmailSetting;
use CAD\TransferBundle\Model\Conn1\PdnEmailSettingPeer;
use CAD\TransferBundle\Model\Conn1\PdnEmailSettingQuery;

/**
 * @method PdnEmailSettingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnEmailSettingQuery orderByPgSubject($order = Criteria::ASC) Order by the pg_subject column
 * @method PdnEmailSettingQuery orderByPgMessage($order = Criteria::ASC) Order by the pg_message column
 * @method PdnEmailSettingQuery orderByKtbSubject($order = Criteria::ASC) Order by the ktb_subject column
 * @method PdnEmailSettingQuery orderByKtbMessage($order = Criteria::ASC) Order by the ktb_message column
 * @method PdnEmailSettingQuery orderByDoaSubject($order = Criteria::ASC) Order by the doa_subject column
 * @method PdnEmailSettingQuery orderByDoaMessage($order = Criteria::ASC) Order by the doa_message column
 * @method PdnEmailSettingQuery orderByRohaniSubject($order = Criteria::ASC) Order by the rohani_subject column
 * @method PdnEmailSettingQuery orderByRohaniMessage($order = Criteria::ASC) Order by the rohani_message column
 * @method PdnEmailSettingQuery orderBySidangSubject($order = Criteria::ASC) Order by the sidang_subject column
 * @method PdnEmailSettingQuery orderBySidangMessage($order = Criteria::ASC) Order by the sidang_message column
 * @method PdnEmailSettingQuery orderByJengukSubject($order = Criteria::ASC) Order by the jenguk_subject column
 * @method PdnEmailSettingQuery orderByJengukMessage($order = Criteria::ASC) Order by the jenguk_message column
 * @method PdnEmailSettingQuery orderByPengumumanSubject($order = Criteria::ASC) Order by the pengumuman_subject column
 * @method PdnEmailSettingQuery orderByPengumumanMessage($order = Criteria::ASC) Order by the pengumuman_message column
 * @method PdnEmailSettingQuery orderByPengumumanFile($order = Criteria::ASC) Order by the pengumuman_file column
 * @method PdnEmailSettingQuery orderByTugasSubject($order = Criteria::ASC) Order by the tugas_subject column
 * @method PdnEmailSettingQuery orderByTugasMessage($order = Criteria::ASC) Order by the tugas_message column
 * @method PdnEmailSettingQuery orderByTugasFile($order = Criteria::ASC) Order by the tugas_file column
 * @method PdnEmailSettingQuery orderByEmailCc($order = Criteria::ASC) Order by the email_cc column
 *
 * @method PdnEmailSettingQuery groupById() Group by the id column
 * @method PdnEmailSettingQuery groupByPgSubject() Group by the pg_subject column
 * @method PdnEmailSettingQuery groupByPgMessage() Group by the pg_message column
 * @method PdnEmailSettingQuery groupByKtbSubject() Group by the ktb_subject column
 * @method PdnEmailSettingQuery groupByKtbMessage() Group by the ktb_message column
 * @method PdnEmailSettingQuery groupByDoaSubject() Group by the doa_subject column
 * @method PdnEmailSettingQuery groupByDoaMessage() Group by the doa_message column
 * @method PdnEmailSettingQuery groupByRohaniSubject() Group by the rohani_subject column
 * @method PdnEmailSettingQuery groupByRohaniMessage() Group by the rohani_message column
 * @method PdnEmailSettingQuery groupBySidangSubject() Group by the sidang_subject column
 * @method PdnEmailSettingQuery groupBySidangMessage() Group by the sidang_message column
 * @method PdnEmailSettingQuery groupByJengukSubject() Group by the jenguk_subject column
 * @method PdnEmailSettingQuery groupByJengukMessage() Group by the jenguk_message column
 * @method PdnEmailSettingQuery groupByPengumumanSubject() Group by the pengumuman_subject column
 * @method PdnEmailSettingQuery groupByPengumumanMessage() Group by the pengumuman_message column
 * @method PdnEmailSettingQuery groupByPengumumanFile() Group by the pengumuman_file column
 * @method PdnEmailSettingQuery groupByTugasSubject() Group by the tugas_subject column
 * @method PdnEmailSettingQuery groupByTugasMessage() Group by the tugas_message column
 * @method PdnEmailSettingQuery groupByTugasFile() Group by the tugas_file column
 * @method PdnEmailSettingQuery groupByEmailCc() Group by the email_cc column
 *
 * @method PdnEmailSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnEmailSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnEmailSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnEmailSetting findOne(PropelPDO $con = null) Return the first PdnEmailSetting matching the query
 * @method PdnEmailSetting findOneOrCreate(PropelPDO $con = null) Return the first PdnEmailSetting matching the query, or a new PdnEmailSetting object populated from the query conditions when no match is found
 *
 * @method PdnEmailSetting findOneByPgSubject(string $pg_subject) Return the first PdnEmailSetting filtered by the pg_subject column
 * @method PdnEmailSetting findOneByPgMessage(string $pg_message) Return the first PdnEmailSetting filtered by the pg_message column
 * @method PdnEmailSetting findOneByKtbSubject(string $ktb_subject) Return the first PdnEmailSetting filtered by the ktb_subject column
 * @method PdnEmailSetting findOneByKtbMessage(string $ktb_message) Return the first PdnEmailSetting filtered by the ktb_message column
 * @method PdnEmailSetting findOneByDoaSubject(string $doa_subject) Return the first PdnEmailSetting filtered by the doa_subject column
 * @method PdnEmailSetting findOneByDoaMessage(string $doa_message) Return the first PdnEmailSetting filtered by the doa_message column
 * @method PdnEmailSetting findOneByRohaniSubject(string $rohani_subject) Return the first PdnEmailSetting filtered by the rohani_subject column
 * @method PdnEmailSetting findOneByRohaniMessage(string $rohani_message) Return the first PdnEmailSetting filtered by the rohani_message column
 * @method PdnEmailSetting findOneBySidangSubject(string $sidang_subject) Return the first PdnEmailSetting filtered by the sidang_subject column
 * @method PdnEmailSetting findOneBySidangMessage(string $sidang_message) Return the first PdnEmailSetting filtered by the sidang_message column
 * @method PdnEmailSetting findOneByJengukSubject(string $jenguk_subject) Return the first PdnEmailSetting filtered by the jenguk_subject column
 * @method PdnEmailSetting findOneByJengukMessage(string $jenguk_message) Return the first PdnEmailSetting filtered by the jenguk_message column
 * @method PdnEmailSetting findOneByPengumumanSubject(string $pengumuman_subject) Return the first PdnEmailSetting filtered by the pengumuman_subject column
 * @method PdnEmailSetting findOneByPengumumanMessage(string $pengumuman_message) Return the first PdnEmailSetting filtered by the pengumuman_message column
 * @method PdnEmailSetting findOneByPengumumanFile(string $pengumuman_file) Return the first PdnEmailSetting filtered by the pengumuman_file column
 * @method PdnEmailSetting findOneByTugasSubject(string $tugas_subject) Return the first PdnEmailSetting filtered by the tugas_subject column
 * @method PdnEmailSetting findOneByTugasMessage(string $tugas_message) Return the first PdnEmailSetting filtered by the tugas_message column
 * @method PdnEmailSetting findOneByTugasFile(string $tugas_file) Return the first PdnEmailSetting filtered by the tugas_file column
 * @method PdnEmailSetting findOneByEmailCc(string $email_cc) Return the first PdnEmailSetting filtered by the email_cc column
 *
 * @method array findById(int $id) Return PdnEmailSetting objects filtered by the id column
 * @method array findByPgSubject(string $pg_subject) Return PdnEmailSetting objects filtered by the pg_subject column
 * @method array findByPgMessage(string $pg_message) Return PdnEmailSetting objects filtered by the pg_message column
 * @method array findByKtbSubject(string $ktb_subject) Return PdnEmailSetting objects filtered by the ktb_subject column
 * @method array findByKtbMessage(string $ktb_message) Return PdnEmailSetting objects filtered by the ktb_message column
 * @method array findByDoaSubject(string $doa_subject) Return PdnEmailSetting objects filtered by the doa_subject column
 * @method array findByDoaMessage(string $doa_message) Return PdnEmailSetting objects filtered by the doa_message column
 * @method array findByRohaniSubject(string $rohani_subject) Return PdnEmailSetting objects filtered by the rohani_subject column
 * @method array findByRohaniMessage(string $rohani_message) Return PdnEmailSetting objects filtered by the rohani_message column
 * @method array findBySidangSubject(string $sidang_subject) Return PdnEmailSetting objects filtered by the sidang_subject column
 * @method array findBySidangMessage(string $sidang_message) Return PdnEmailSetting objects filtered by the sidang_message column
 * @method array findByJengukSubject(string $jenguk_subject) Return PdnEmailSetting objects filtered by the jenguk_subject column
 * @method array findByJengukMessage(string $jenguk_message) Return PdnEmailSetting objects filtered by the jenguk_message column
 * @method array findByPengumumanSubject(string $pengumuman_subject) Return PdnEmailSetting objects filtered by the pengumuman_subject column
 * @method array findByPengumumanMessage(string $pengumuman_message) Return PdnEmailSetting objects filtered by the pengumuman_message column
 * @method array findByPengumumanFile(string $pengumuman_file) Return PdnEmailSetting objects filtered by the pengumuman_file column
 * @method array findByTugasSubject(string $tugas_subject) Return PdnEmailSetting objects filtered by the tugas_subject column
 * @method array findByTugasMessage(string $tugas_message) Return PdnEmailSetting objects filtered by the tugas_message column
 * @method array findByTugasFile(string $tugas_file) Return PdnEmailSetting objects filtered by the tugas_file column
 * @method array findByEmailCc(string $email_cc) Return PdnEmailSetting objects filtered by the email_cc column
 */
abstract class BasePdnEmailSettingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnEmailSettingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'conn1';
        }
        if (null === $modelName) {
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnEmailSetting';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnEmailSettingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnEmailSettingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnEmailSettingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnEmailSettingQuery) {
            return $criteria;
        }
        $query = new PdnEmailSettingQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PdnEmailSetting|PdnEmailSetting[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnEmailSettingPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSettingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 PdnEmailSetting A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneById($key, $con = null)
    {
        return $this->findPk($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 PdnEmailSetting A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `pg_subject`, `pg_message`, `ktb_subject`, `ktb_message`, `doa_subject`, `doa_message`, `rohani_subject`, `rohani_message`, `sidang_subject`, `sidang_message`, `jenguk_subject`, `jenguk_message`, `pengumuman_subject`, `pengumuman_message`, `pengumuman_file`, `tugas_subject`, `tugas_message`, `tugas_file`, `email_cc` FROM `pdn_email_setting` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PdnEmailSetting();
            $obj->hydrate($row);
            PdnEmailSettingPeer::addInstanceToPool($obj, (string)$key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return PdnEmailSetting|PdnEmailSetting[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|PdnEmailSetting[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnEmailSettingPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnEmailSettingPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnEmailSettingPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnEmailSettingPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the pg_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByPgSubject('fooValue');   // WHERE pg_subject = 'fooValue'
     * $query->filterByPgSubject('%fooValue%'); // WHERE pg_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pgSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPgSubject($pgSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pgSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pgSubject)) {
                $pgSubject = str_replace('*', '%', $pgSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::PG_SUBJECT, $pgSubject, $comparison);
    }

    /**
     * Filter the query on the pg_message column
     *
     * Example usage:
     * <code>
     * $query->filterByPgMessage('fooValue');   // WHERE pg_message = 'fooValue'
     * $query->filterByPgMessage('%fooValue%'); // WHERE pg_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pgMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPgMessage($pgMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pgMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pgMessage)) {
                $pgMessage = str_replace('*', '%', $pgMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::PG_MESSAGE, $pgMessage, $comparison);
    }

    /**
     * Filter the query on the ktb_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbSubject('fooValue');   // WHERE ktb_subject = 'fooValue'
     * $query->filterByKtbSubject('%fooValue%'); // WHERE ktb_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByKtbSubject($ktbSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbSubject)) {
                $ktbSubject = str_replace('*', '%', $ktbSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::KTB_SUBJECT, $ktbSubject, $comparison);
    }

    /**
     * Filter the query on the ktb_message column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbMessage('fooValue');   // WHERE ktb_message = 'fooValue'
     * $query->filterByKtbMessage('%fooValue%'); // WHERE ktb_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByKtbMessage($ktbMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbMessage)) {
                $ktbMessage = str_replace('*', '%', $ktbMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::KTB_MESSAGE, $ktbMessage, $comparison);
    }

    /**
     * Filter the query on the doa_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaSubject('fooValue');   // WHERE doa_subject = 'fooValue'
     * $query->filterByDoaSubject('%fooValue%'); // WHERE doa_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doaSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByDoaSubject($doaSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doaSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $doaSubject)) {
                $doaSubject = str_replace('*', '%', $doaSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::DOA_SUBJECT, $doaSubject, $comparison);
    }

    /**
     * Filter the query on the doa_message column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaMessage('fooValue');   // WHERE doa_message = 'fooValue'
     * $query->filterByDoaMessage('%fooValue%'); // WHERE doa_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doaMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByDoaMessage($doaMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doaMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $doaMessage)) {
                $doaMessage = str_replace('*', '%', $doaMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::DOA_MESSAGE, $doaMessage, $comparison);
    }

    /**
     * Filter the query on the rohani_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniSubject('fooValue');   // WHERE rohani_subject = 'fooValue'
     * $query->filterByRohaniSubject('%fooValue%'); // WHERE rohani_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rohaniSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByRohaniSubject($rohaniSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rohaniSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rohaniSubject)) {
                $rohaniSubject = str_replace('*', '%', $rohaniSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::ROHANI_SUBJECT, $rohaniSubject, $comparison);
    }

    /**
     * Filter the query on the rohani_message column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniMessage('fooValue');   // WHERE rohani_message = 'fooValue'
     * $query->filterByRohaniMessage('%fooValue%'); // WHERE rohani_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rohaniMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByRohaniMessage($rohaniMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rohaniMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rohaniMessage)) {
                $rohaniMessage = str_replace('*', '%', $rohaniMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::ROHANI_MESSAGE, $rohaniMessage, $comparison);
    }

    /**
     * Filter the query on the sidang_subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangSubject('fooValue');   // WHERE sidang_subject = 'fooValue'
     * $query->filterBySidangSubject('%fooValue%'); // WHERE sidang_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sidangSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterBySidangSubject($sidangSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sidangSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sidangSubject)) {
                $sidangSubject = str_replace('*', '%', $sidangSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::SIDANG_SUBJECT, $sidangSubject, $comparison);
    }

    /**
     * Filter the query on the sidang_message column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangMessage('fooValue');   // WHERE sidang_message = 'fooValue'
     * $query->filterBySidangMessage('%fooValue%'); // WHERE sidang_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sidangMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterBySidangMessage($sidangMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sidangMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sidangMessage)) {
                $sidangMessage = str_replace('*', '%', $sidangMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::SIDANG_MESSAGE, $sidangMessage, $comparison);
    }

    /**
     * Filter the query on the jenguk_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukSubject('fooValue');   // WHERE jenguk_subject = 'fooValue'
     * $query->filterByJengukSubject('%fooValue%'); // WHERE jenguk_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jengukSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByJengukSubject($jengukSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jengukSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jengukSubject)) {
                $jengukSubject = str_replace('*', '%', $jengukSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::JENGUK_SUBJECT, $jengukSubject, $comparison);
    }

    /**
     * Filter the query on the jenguk_message column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukMessage('fooValue');   // WHERE jenguk_message = 'fooValue'
     * $query->filterByJengukMessage('%fooValue%'); // WHERE jenguk_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jengukMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByJengukMessage($jengukMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jengukMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jengukMessage)) {
                $jengukMessage = str_replace('*', '%', $jengukMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::JENGUK_MESSAGE, $jengukMessage, $comparison);
    }

    /**
     * Filter the query on the pengumuman_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByPengumumanSubject('fooValue');   // WHERE pengumuman_subject = 'fooValue'
     * $query->filterByPengumumanSubject('%fooValue%'); // WHERE pengumuman_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengumumanSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPengumumanSubject($pengumumanSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengumumanSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pengumumanSubject)) {
                $pengumumanSubject = str_replace('*', '%', $pengumumanSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::PENGUMUMAN_SUBJECT, $pengumumanSubject, $comparison);
    }

    /**
     * Filter the query on the pengumuman_message column
     *
     * Example usage:
     * <code>
     * $query->filterByPengumumanMessage('fooValue');   // WHERE pengumuman_message = 'fooValue'
     * $query->filterByPengumumanMessage('%fooValue%'); // WHERE pengumuman_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengumumanMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPengumumanMessage($pengumumanMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengumumanMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pengumumanMessage)) {
                $pengumumanMessage = str_replace('*', '%', $pengumumanMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::PENGUMUMAN_MESSAGE, $pengumumanMessage, $comparison);
    }

    /**
     * Filter the query on the pengumuman_file column
     *
     * Example usage:
     * <code>
     * $query->filterByPengumumanFile('fooValue');   // WHERE pengumuman_file = 'fooValue'
     * $query->filterByPengumumanFile('%fooValue%'); // WHERE pengumuman_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengumumanFile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByPengumumanFile($pengumumanFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengumumanFile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pengumumanFile)) {
                $pengumumanFile = str_replace('*', '%', $pengumumanFile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::PENGUMUMAN_FILE, $pengumumanFile, $comparison);
    }

    /**
     * Filter the query on the tugas_subject column
     *
     * Example usage:
     * <code>
     * $query->filterByTugasSubject('fooValue');   // WHERE tugas_subject = 'fooValue'
     * $query->filterByTugasSubject('%fooValue%'); // WHERE tugas_subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tugasSubject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByTugasSubject($tugasSubject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tugasSubject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tugasSubject)) {
                $tugasSubject = str_replace('*', '%', $tugasSubject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::TUGAS_SUBJECT, $tugasSubject, $comparison);
    }

    /**
     * Filter the query on the tugas_message column
     *
     * Example usage:
     * <code>
     * $query->filterByTugasMessage('fooValue');   // WHERE tugas_message = 'fooValue'
     * $query->filterByTugasMessage('%fooValue%'); // WHERE tugas_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tugasMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByTugasMessage($tugasMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tugasMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tugasMessage)) {
                $tugasMessage = str_replace('*', '%', $tugasMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::TUGAS_MESSAGE, $tugasMessage, $comparison);
    }

    /**
     * Filter the query on the tugas_file column
     *
     * Example usage:
     * <code>
     * $query->filterByTugasFile('fooValue');   // WHERE tugas_file = 'fooValue'
     * $query->filterByTugasFile('%fooValue%'); // WHERE tugas_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tugasFile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByTugasFile($tugasFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tugasFile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tugasFile)) {
                $tugasFile = str_replace('*', '%', $tugasFile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::TUGAS_FILE, $tugasFile, $comparison);
    }

    /**
     * Filter the query on the email_cc column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailCc('fooValue');   // WHERE email_cc = 'fooValue'
     * $query->filterByEmailCc('%fooValue%'); // WHERE email_cc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailCc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function filterByEmailCc($emailCc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailCc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $emailCc)) {
                $emailCc = str_replace('*', '%', $emailCc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSettingPeer::EMAIL_CC, $emailCc, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnEmailSetting $pdnEmailSetting Object to remove from the list of results
     *
     * @return PdnEmailSettingQuery The current query, for fluid interface
     */
    public function prune($pdnEmailSetting = null)
    {
        if ($pdnEmailSetting) {
            $this->addUsingAlias(PdnEmailSettingPeer::ID, $pdnEmailSetting->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
