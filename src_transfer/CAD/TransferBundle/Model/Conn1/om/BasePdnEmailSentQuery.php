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
use CAD\TransferBundle\Model\Conn1\PdnEmailSent;
use CAD\TransferBundle\Model\Conn1\PdnEmailSentPeer;
use CAD\TransferBundle\Model\Conn1\PdnEmailSentQuery;

/**
 * @method PdnEmailSentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnEmailSentQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 * @method PdnEmailSentQuery orderByPonDetailId($order = Criteria::ASC) Order by the pon_detail_id column
 * @method PdnEmailSentQuery orderByFieldName($order = Criteria::ASC) Order by the field_name column
 * @method PdnEmailSentQuery orderByTanggalKirim($order = Criteria::ASC) Order by the tanggal_kirim column
 *
 * @method PdnEmailSentQuery groupById() Group by the id column
 * @method PdnEmailSentQuery groupByMemberId() Group by the member_id column
 * @method PdnEmailSentQuery groupByPonDetailId() Group by the pon_detail_id column
 * @method PdnEmailSentQuery groupByFieldName() Group by the field_name column
 * @method PdnEmailSentQuery groupByTanggalKirim() Group by the tanggal_kirim column
 *
 * @method PdnEmailSentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnEmailSentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnEmailSentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnEmailSent findOne(PropelPDO $con = null) Return the first PdnEmailSent matching the query
 * @method PdnEmailSent findOneOrCreate(PropelPDO $con = null) Return the first PdnEmailSent matching the query, or a new PdnEmailSent object populated from the query conditions when no match is found
 *
 * @method PdnEmailSent findOneByMemberId(int $member_id) Return the first PdnEmailSent filtered by the member_id column
 * @method PdnEmailSent findOneByPonDetailId(int $pon_detail_id) Return the first PdnEmailSent filtered by the pon_detail_id column
 * @method PdnEmailSent findOneByFieldName(string $field_name) Return the first PdnEmailSent filtered by the field_name column
 * @method PdnEmailSent findOneByTanggalKirim(string $tanggal_kirim) Return the first PdnEmailSent filtered by the tanggal_kirim column
 *
 * @method array findById(int $id) Return PdnEmailSent objects filtered by the id column
 * @method array findByMemberId(int $member_id) Return PdnEmailSent objects filtered by the member_id column
 * @method array findByPonDetailId(int $pon_detail_id) Return PdnEmailSent objects filtered by the pon_detail_id column
 * @method array findByFieldName(string $field_name) Return PdnEmailSent objects filtered by the field_name column
 * @method array findByTanggalKirim(string $tanggal_kirim) Return PdnEmailSent objects filtered by the tanggal_kirim column
 */
abstract class BasePdnEmailSentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnEmailSentQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnEmailSent';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnEmailSentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnEmailSentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnEmailSentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnEmailSentQuery) {
            return $criteria;
        }
        $query = new PdnEmailSentQuery(null, null, $modelAlias);

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
     * @return   PdnEmailSent|PdnEmailSent[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnEmailSentPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnEmailSentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnEmailSent A model object, or null if the key is not found
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
     * @return                 PdnEmailSent A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `member_id`, `pon_detail_id`, `field_name`, `tanggal_kirim` FROM `pdn_email_sent` WHERE `id` = :p0';
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
            $obj = new PdnEmailSent();
            $obj->hydrate($row);
            PdnEmailSentPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnEmailSent|PdnEmailSent[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnEmailSent[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnEmailSentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnEmailSentPeer::ID, $keys, Criteria::IN);
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
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnEmailSentPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnEmailSentPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnEmailSentPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the member_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMemberId(1234); // WHERE member_id = 1234
     * $query->filterByMemberId(array(12, 34)); // WHERE member_id IN (12, 34)
     * $query->filterByMemberId(array('min' => 12)); // WHERE member_id >= 12
     * $query->filterByMemberId(array('max' => 12)); // WHERE member_id <= 12
     * </code>
     *
     * @param     mixed $memberId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByMemberId($memberId = null, $comparison = null)
    {
        if (is_array($memberId)) {
            $useMinMax = false;
            if (isset($memberId['min'])) {
                $this->addUsingAlias(PdnEmailSentPeer::MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberId['max'])) {
                $this->addUsingAlias(PdnEmailSentPeer::MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnEmailSentPeer::MEMBER_ID, $memberId, $comparison);
    }

    /**
     * Filter the query on the pon_detail_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPonDetailId(1234); // WHERE pon_detail_id = 1234
     * $query->filterByPonDetailId(array(12, 34)); // WHERE pon_detail_id IN (12, 34)
     * $query->filterByPonDetailId(array('min' => 12)); // WHERE pon_detail_id >= 12
     * $query->filterByPonDetailId(array('max' => 12)); // WHERE pon_detail_id <= 12
     * </code>
     *
     * @param     mixed $ponDetailId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByPonDetailId($ponDetailId = null, $comparison = null)
    {
        if (is_array($ponDetailId)) {
            $useMinMax = false;
            if (isset($ponDetailId['min'])) {
                $this->addUsingAlias(PdnEmailSentPeer::PON_DETAIL_ID, $ponDetailId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ponDetailId['max'])) {
                $this->addUsingAlias(PdnEmailSentPeer::PON_DETAIL_ID, $ponDetailId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnEmailSentPeer::PON_DETAIL_ID, $ponDetailId, $comparison);
    }

    /**
     * Filter the query on the field_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldName('fooValue');   // WHERE field_name = 'fooValue'
     * $query->filterByFieldName('%fooValue%'); // WHERE field_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByFieldName($fieldName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fieldName)) {
                $fieldName = str_replace('*', '%', $fieldName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnEmailSentPeer::FIELD_NAME, $fieldName, $comparison);
    }

    /**
     * Filter the query on the tanggal_kirim column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalKirim('2011-03-14'); // WHERE tanggal_kirim = '2011-03-14'
     * $query->filterByTanggalKirim('now'); // WHERE tanggal_kirim = '2011-03-14'
     * $query->filterByTanggalKirim(array('max' => 'yesterday')); // WHERE tanggal_kirim < '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalKirim The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function filterByTanggalKirim($tanggalKirim = null, $comparison = null)
    {
        if (is_array($tanggalKirim)) {
            $useMinMax = false;
            if (isset($tanggalKirim['min'])) {
                $this->addUsingAlias(PdnEmailSentPeer::TANGGAL_KIRIM, $tanggalKirim['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalKirim['max'])) {
                $this->addUsingAlias(PdnEmailSentPeer::TANGGAL_KIRIM, $tanggalKirim['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnEmailSentPeer::TANGGAL_KIRIM, $tanggalKirim, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnEmailSent $pdnEmailSent Object to remove from the list of results
     *
     * @return PdnEmailSentQuery The current query, for fluid interface
     */
    public function prune($pdnEmailSent = null)
    {
        if ($pdnEmailSent) {
            $this->addUsingAlias(PdnEmailSentPeer::ID, $pdnEmailSent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
