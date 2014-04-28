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
use CAD\TransferBundle\Model\PdnHari;
use CAD\TransferBundle\Model\PdnHariPeer;
use CAD\TransferBundle\Model\PdnHariQuery;

/**
 * @method PdnHariQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnHariQuery orderByNamaHari($order = Criteria::ASC) Order by the nama_hari column
 * @method PdnHariQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnHariQuery groupById() Group by the id column
 * @method PdnHariQuery groupByNamaHari() Group by the nama_hari column
 * @method PdnHariQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnHariQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnHariQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnHariQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnHari findOne(PropelPDO $con = null) Return the first PdnHari matching the query
 * @method PdnHari findOneOrCreate(PropelPDO $con = null) Return the first PdnHari matching the query, or a new PdnHari object populated from the query conditions when no match is found
 *
 * @method PdnHari findOneByNamaHari(string $nama_hari) Return the first PdnHari filtered by the nama_hari column
 * @method PdnHari findOneByIsApproved(int $is_approved) Return the first PdnHari filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnHari objects filtered by the id column
 * @method array findByNamaHari(string $nama_hari) Return PdnHari objects filtered by the nama_hari column
 * @method array findByIsApproved(int $is_approved) Return PdnHari objects filtered by the is_approved column
 */
abstract class BasePdnHariQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnHariQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnHari';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnHariQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnHariQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnHariQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnHariQuery) {
            return $criteria;
        }
        $query = new PdnHariQuery(null, null, $modelAlias);

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
     * @return   PdnHari|PdnHari[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnHariPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnHariPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnHari A model object, or null if the key is not found
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
     * @return                 PdnHari A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nama_hari`, `is_approved` FROM `pdn_hari` WHERE `id` = :p0';
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
            $obj = new PdnHari();
            $obj->hydrate($row);
            PdnHariPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnHari|PdnHari[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnHari[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnHariPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnHariPeer::ID, $keys, Criteria::IN);
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
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnHariPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnHariPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnHariPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nama_hari column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaHari('fooValue');   // WHERE nama_hari = 'fooValue'
     * $query->filterByNamaHari('%fooValue%'); // WHERE nama_hari LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaHari The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function filterByNamaHari($namaHari = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaHari)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaHari)) {
                $namaHari = str_replace('*', '%', $namaHari);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnHariPeer::NAMA_HARI, $namaHari, $comparison);
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
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnHariPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnHariPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnHariPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnHari $pdnHari Object to remove from the list of results
     *
     * @return PdnHariQuery The current query, for fluid interface
     */
    public function prune($pdnHari = null)
    {
        if ($pdnHari) {
            $this->addUsingAlias(PdnHariPeer::ID, $pdnHari->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
