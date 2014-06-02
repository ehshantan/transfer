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
use CAD\TransferBundle\Model\Conn1\PdnPertanyaanUmum;
use CAD\TransferBundle\Model\Conn1\PdnPertanyaanUmumPeer;
use CAD\TransferBundle\Model\Conn1\PdnPertanyaanUmumQuery;

/**
 * @method PdnPertanyaanUmumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnPertanyaanUmumQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 * @method PdnPertanyaanUmumQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method PdnPertanyaanUmumQuery orderByPertanyaan($order = Criteria::ASC) Order by the pertanyaan column
 * @method PdnPertanyaanUmumQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method PdnPertanyaanUmumQuery orderByParentId($order = Criteria::ASC) Order by the parent_id column
 * @method PdnPertanyaanUmumQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnPertanyaanUmumQuery groupById() Group by the id column
 * @method PdnPertanyaanUmumQuery groupByMemberId() Group by the member_id column
 * @method PdnPertanyaanUmumQuery groupByJudul() Group by the judul column
 * @method PdnPertanyaanUmumQuery groupByPertanyaan() Group by the pertanyaan column
 * @method PdnPertanyaanUmumQuery groupByTanggal() Group by the tanggal column
 * @method PdnPertanyaanUmumQuery groupByParentId() Group by the parent_id column
 * @method PdnPertanyaanUmumQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnPertanyaanUmumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnPertanyaanUmumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnPertanyaanUmumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnPertanyaanUmum findOne(PropelPDO $con = null) Return the first PdnPertanyaanUmum matching the query
 * @method PdnPertanyaanUmum findOneOrCreate(PropelPDO $con = null) Return the first PdnPertanyaanUmum matching the query, or a new PdnPertanyaanUmum object populated from the query conditions when no match is found
 *
 * @method PdnPertanyaanUmum findOneByMemberId(int $member_id) Return the first PdnPertanyaanUmum filtered by the member_id column
 * @method PdnPertanyaanUmum findOneByJudul(string $judul) Return the first PdnPertanyaanUmum filtered by the judul column
 * @method PdnPertanyaanUmum findOneByPertanyaan(string $pertanyaan) Return the first PdnPertanyaanUmum filtered by the pertanyaan column
 * @method PdnPertanyaanUmum findOneByTanggal(string $tanggal) Return the first PdnPertanyaanUmum filtered by the tanggal column
 * @method PdnPertanyaanUmum findOneByParentId(int $parent_id) Return the first PdnPertanyaanUmum filtered by the parent_id column
 * @method PdnPertanyaanUmum findOneByIsApproved(int $is_approved) Return the first PdnPertanyaanUmum filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnPertanyaanUmum objects filtered by the id column
 * @method array findByMemberId(int $member_id) Return PdnPertanyaanUmum objects filtered by the member_id column
 * @method array findByJudul(string $judul) Return PdnPertanyaanUmum objects filtered by the judul column
 * @method array findByPertanyaan(string $pertanyaan) Return PdnPertanyaanUmum objects filtered by the pertanyaan column
 * @method array findByTanggal(string $tanggal) Return PdnPertanyaanUmum objects filtered by the tanggal column
 * @method array findByParentId(int $parent_id) Return PdnPertanyaanUmum objects filtered by the parent_id column
 * @method array findByIsApproved(int $is_approved) Return PdnPertanyaanUmum objects filtered by the is_approved column
 */
abstract class BasePdnPertanyaanUmumQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnPertanyaanUmumQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnPertanyaanUmum';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnPertanyaanUmumQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnPertanyaanUmumQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnPertanyaanUmumQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnPertanyaanUmumQuery) {
            return $criteria;
        }
        $query = new PdnPertanyaanUmumQuery(null, null, $modelAlias);

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
     * @return   PdnPertanyaanUmum|PdnPertanyaanUmum[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnPertanyaanUmumPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnPertanyaanUmumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnPertanyaanUmum A model object, or null if the key is not found
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
     * @return                 PdnPertanyaanUmum A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `member_id`, `judul`, `pertanyaan`, `tanggal`, `parent_id`, `is_approved` FROM `pdn_pertanyaan_umum` WHERE `id` = :p0';
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
            $obj = new PdnPertanyaanUmum();
            $obj->hydrate($row);
            PdnPertanyaanUmumPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnPertanyaanUmum|PdnPertanyaanUmum[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnPertanyaanUmum[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $keys, Criteria::IN);
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
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $id, $comparison);
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
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByMemberId($memberId = null, $comparison = null)
    {
        if (is_array($memberId)) {
            $useMinMax = false;
            if (isset($memberId['min'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberId['max'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::MEMBER_ID, $memberId, $comparison);
    }

    /**
     * Filter the query on the judul column
     *
     * Example usage:
     * <code>
     * $query->filterByJudul('fooValue');   // WHERE judul = 'fooValue'
     * $query->filterByJudul('%fooValue%'); // WHERE judul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judul)) {
                $judul = str_replace('*', '%', $judul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::JUDUL, $judul, $comparison);
    }

    /**
     * Filter the query on the pertanyaan column
     *
     * Example usage:
     * <code>
     * $query->filterByPertanyaan('fooValue');   // WHERE pertanyaan = 'fooValue'
     * $query->filterByPertanyaan('%fooValue%'); // WHERE pertanyaan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pertanyaan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByPertanyaan($pertanyaan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pertanyaan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pertanyaan)) {
                $pertanyaan = str_replace('*', '%', $pertanyaan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::PERTANYAAN, $pertanyaan, $comparison);
    }

    /**
     * Filter the query on the tanggal column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggal('2011-03-14'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal('now'); // WHERE tanggal = '2011-03-14'
     * $query->filterByTanggal(array('max' => 'yesterday')); // WHERE tanggal < '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggal The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query on the parent_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentId(1234); // WHERE parent_id = 1234
     * $query->filterByParentId(array(12, 34)); // WHERE parent_id IN (12, 34)
     * $query->filterByParentId(array('min' => 12)); // WHERE parent_id >= 12
     * $query->filterByParentId(array('max' => 12)); // WHERE parent_id <= 12
     * </code>
     *
     * @param     mixed $parentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByParentId($parentId = null, $comparison = null)
    {
        if (is_array($parentId)) {
            $useMinMax = false;
            if (isset($parentId['min'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::PARENT_ID, $parentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentId['max'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::PARENT_ID, $parentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::PARENT_ID, $parentId, $comparison);
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
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnPertanyaanUmumPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPertanyaanUmumPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnPertanyaanUmum $pdnPertanyaanUmum Object to remove from the list of results
     *
     * @return PdnPertanyaanUmumQuery The current query, for fluid interface
     */
    public function prune($pdnPertanyaanUmum = null)
    {
        if ($pdnPertanyaanUmum) {
            $this->addUsingAlias(PdnPertanyaanUmumPeer::ID, $pdnPertanyaanUmum->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
