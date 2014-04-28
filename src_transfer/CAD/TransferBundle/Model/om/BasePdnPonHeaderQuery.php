<?php

namespace CAD\TransferBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CAD\TransferBundle\Model\PdnPonHeader;
use CAD\TransferBundle\Model\PdnPonHeaderPeer;
use CAD\TransferBundle\Model\PdnPonHeaderQuery;

/**
 * @method PdnPonHeaderQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnPonHeaderQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 * @method PdnPonHeaderQuery orderByBulan($order = Criteria::ASC) Order by the bulan column
 * @method PdnPonHeaderQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method PdnPonHeaderQuery orderByPeriode($order = Criteria::ASC) Order by the periode column
 * @method PdnPonHeaderQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnPonHeaderQuery groupById() Group by the id column
 * @method PdnPonHeaderQuery groupByMemberId() Group by the member_id column
 * @method PdnPonHeaderQuery groupByBulan() Group by the bulan column
 * @method PdnPonHeaderQuery groupByTahun() Group by the tahun column
 * @method PdnPonHeaderQuery groupByPeriode() Group by the periode column
 * @method PdnPonHeaderQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnPonHeaderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnPonHeaderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnPonHeaderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnPonHeader findOne(PropelPDO $con = null) Return the first PdnPonHeader matching the query
 * @method PdnPonHeader findOneOrCreate(PropelPDO $con = null) Return the first PdnPonHeader matching the query, or a new PdnPonHeader object populated from the query conditions when no match is found
 *
 * @method PdnPonHeader findOneByMemberId(int $member_id) Return the first PdnPonHeader filtered by the member_id column
 * @method PdnPonHeader findOneByBulan(int $bulan) Return the first PdnPonHeader filtered by the bulan column
 * @method PdnPonHeader findOneByTahun(int $tahun) Return the first PdnPonHeader filtered by the tahun column
 * @method PdnPonHeader findOneByPeriode(string $periode) Return the first PdnPonHeader filtered by the periode column
 * @method PdnPonHeader findOneByIsApproved(int $is_approved) Return the first PdnPonHeader filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnPonHeader objects filtered by the id column
 * @method array findByMemberId(int $member_id) Return PdnPonHeader objects filtered by the member_id column
 * @method array findByBulan(int $bulan) Return PdnPonHeader objects filtered by the bulan column
 * @method array findByTahun(int $tahun) Return PdnPonHeader objects filtered by the tahun column
 * @method array findByPeriode(string $periode) Return PdnPonHeader objects filtered by the periode column
 * @method array findByIsApproved(int $is_approved) Return PdnPonHeader objects filtered by the is_approved column
 */
abstract class BasePdnPonHeaderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnPonHeaderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'CAD\\TransferBundle\\Model\\PdnPonHeader';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnPonHeaderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnPonHeaderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnPonHeaderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnPonHeaderQuery) {
            return $criteria;
        }
        $query = new PdnPonHeaderQuery(null, null, $modelAlias);

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
     * @return   PdnPonHeader|PdnPonHeader[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnPonHeaderPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnPonHeaderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnPonHeader A model object, or null if the key is not found
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
     * @return                 PdnPonHeader A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `member_id`, `bulan`, `tahun`, `periode`, `is_approved` FROM `pdn_pon_header` WHERE `id` = :p0';
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
            $obj = new PdnPonHeader();
            $obj->hydrate($row);
            PdnPonHeaderPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnPonHeader|PdnPonHeader[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnPonHeader[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnPonHeaderPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnPonHeaderPeer::ID, $keys, Criteria::IN);
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
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::ID, $id, $comparison);
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
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByMemberId($memberId = null, $comparison = null)
    {
        if (is_array($memberId)) {
            $useMinMax = false;
            if (isset($memberId['min'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberId['max'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::MEMBER_ID, $memberId, $comparison);
    }

    /**
     * Filter the query on the bulan column
     *
     * Example usage:
     * <code>
     * $query->filterByBulan(1234); // WHERE bulan = 1234
     * $query->filterByBulan(array(12, 34)); // WHERE bulan IN (12, 34)
     * $query->filterByBulan(array('min' => 12)); // WHERE bulan >= 12
     * $query->filterByBulan(array('max' => 12)); // WHERE bulan <= 12
     * </code>
     *
     * @param     mixed $bulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByBulan($bulan = null, $comparison = null)
    {
        if (is_array($bulan)) {
            $useMinMax = false;
            if (isset($bulan['min'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::BULAN, $bulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bulan['max'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::BULAN, $bulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::BULAN, $bulan, $comparison);
    }

    /**
     * Filter the query on the tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByTahun(1234); // WHERE tahun = 1234
     * $query->filterByTahun(array(12, 34)); // WHERE tahun IN (12, 34)
     * $query->filterByTahun(array('min' => 12)); // WHERE tahun >= 12
     * $query->filterByTahun(array('max' => 12)); // WHERE tahun <= 12
     * </code>
     *
     * @param     mixed $tahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::TAHUN, $tahun, $comparison);
    }

    /**
     * Filter the query on the periode column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriode('fooValue');   // WHERE periode = 'fooValue'
     * $query->filterByPeriode('%fooValue%'); // WHERE periode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $periode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByPeriode($periode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($periode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $periode)) {
                $periode = str_replace('*', '%', $periode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::PERIODE, $periode, $comparison);
    }

    /**
     * Filter the query on the is_approved column
     *
     * Example usage:
     * <code>
     * $query->filterByIsApproved(1234); // WHERE is_approved = 1234
     * $query->filterByIsApproved(array(12, 34)); // WHERE is_approved IN (12, 34)
     * $query->filterByIsApproved(array('min' => 12)); // WHERE is_approved >= 12
     * $query->filterByIsApproved(array('max' => 12)); // WHERE is_approved <= 12
     * </code>
     *
     * @param     mixed $isApproved The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnPonHeaderPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonHeaderPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnPonHeader $pdnPonHeader Object to remove from the list of results
     *
     * @return PdnPonHeaderQuery The current query, for fluid interface
     */
    public function prune($pdnPonHeader = null)
    {
        if ($pdnPonHeader) {
            $this->addUsingAlias(PdnPonHeaderPeer::ID, $pdnPonHeader->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
