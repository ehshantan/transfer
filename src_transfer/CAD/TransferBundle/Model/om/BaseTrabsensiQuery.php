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
use CAD\TransferBundle\Model\Trabsensi;
use CAD\TransferBundle\Model\TrabsensiPeer;
use CAD\TransferBundle\Model\TrabsensiQuery;

/**
 * @method TrabsensiQuery orderByIdtrabsensi($order = Criteria::ASC) Order by the idtrabsensi column
 * @method TrabsensiQuery orderByIdabsensi($order = Criteria::ASC) Order by the idabsensi column
 * @method TrabsensiQuery orderBySesi($order = Criteria::ASC) Order by the sesi column
 * @method TrabsensiQuery orderByIdtypesesi($order = Criteria::ASC) Order by the idtypesesi column
 * @method TrabsensiQuery orderByWaktumulai($order = Criteria::ASC) Order by the waktumulai column
 * @method TrabsensiQuery orderByWaktuselesai($order = Criteria::ASC) Order by the waktuselesai column
 *
 * @method TrabsensiQuery groupByIdtrabsensi() Group by the idtrabsensi column
 * @method TrabsensiQuery groupByIdabsensi() Group by the idabsensi column
 * @method TrabsensiQuery groupBySesi() Group by the sesi column
 * @method TrabsensiQuery groupByIdtypesesi() Group by the idtypesesi column
 * @method TrabsensiQuery groupByWaktumulai() Group by the waktumulai column
 * @method TrabsensiQuery groupByWaktuselesai() Group by the waktuselesai column
 *
 * @method TrabsensiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TrabsensiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TrabsensiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Trabsensi findOne(PropelPDO $con = null) Return the first Trabsensi matching the query
 * @method Trabsensi findOneOrCreate(PropelPDO $con = null) Return the first Trabsensi matching the query, or a new Trabsensi object populated from the query conditions when no match is found
 *
 * @method Trabsensi findOneByIdabsensi(int $idabsensi) Return the first Trabsensi filtered by the idabsensi column
 * @method Trabsensi findOneBySesi(int $sesi) Return the first Trabsensi filtered by the sesi column
 * @method Trabsensi findOneByIdtypesesi(int $idtypesesi) Return the first Trabsensi filtered by the idtypesesi column
 * @method Trabsensi findOneByWaktumulai(string $waktumulai) Return the first Trabsensi filtered by the waktumulai column
 * @method Trabsensi findOneByWaktuselesai(string $waktuselesai) Return the first Trabsensi filtered by the waktuselesai column
 *
 * @method array findByIdtrabsensi(int $idtrabsensi) Return Trabsensi objects filtered by the idtrabsensi column
 * @method array findByIdabsensi(int $idabsensi) Return Trabsensi objects filtered by the idabsensi column
 * @method array findBySesi(int $sesi) Return Trabsensi objects filtered by the sesi column
 * @method array findByIdtypesesi(int $idtypesesi) Return Trabsensi objects filtered by the idtypesesi column
 * @method array findByWaktumulai(string $waktumulai) Return Trabsensi objects filtered by the waktumulai column
 * @method array findByWaktuselesai(string $waktuselesai) Return Trabsensi objects filtered by the waktuselesai column
 */
abstract class BaseTrabsensiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTrabsensiQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Trabsensi';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TrabsensiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TrabsensiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TrabsensiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TrabsensiQuery) {
            return $criteria;
        }
        $query = new TrabsensiQuery(null, null, $modelAlias);

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
     * @return   Trabsensi|Trabsensi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TrabsensiPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TrabsensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Trabsensi A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneByIdtrabsensi($key, $con = null)
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
     * @return                 Trabsensi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtrabsensi`, `idabsensi`, `sesi`, `idtypesesi`, `waktumulai`, `waktuselesai` FROM `trabsensi` WHERE `idtrabsensi` = :p0';
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
            $obj = new Trabsensi();
            $obj->hydrate($row);
            TrabsensiPeer::addInstanceToPool($obj, (string)$key);
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
     * @return Trabsensi|Trabsensi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Trabsensi[]|mixed the list of results, formatted by the current formatter
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
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the idtrabsensi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtrabsensi(1234); // WHERE idtrabsensi = 1234
     * $query->filterByIdtrabsensi(array(12, 34)); // WHERE idtrabsensi IN (12, 34)
     * $query->filterByIdtrabsensi(array('min' => 12)); // WHERE idtrabsensi >= 12
     * $query->filterByIdtrabsensi(array('max' => 12)); // WHERE idtrabsensi <= 12
     * </code>
     *
     * @param     mixed $idtrabsensi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByIdtrabsensi($idtrabsensi = null, $comparison = null)
    {
        if (is_array($idtrabsensi)) {
            $useMinMax = false;
            if (isset($idtrabsensi['min'])) {
                $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $idtrabsensi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtrabsensi['max'])) {
                $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $idtrabsensi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $idtrabsensi, $comparison);
    }

    /**
     * Filter the query on the idabsensi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdabsensi(1234); // WHERE idabsensi = 1234
     * $query->filterByIdabsensi(array(12, 34)); // WHERE idabsensi IN (12, 34)
     * $query->filterByIdabsensi(array('min' => 12)); // WHERE idabsensi >= 12
     * $query->filterByIdabsensi(array('max' => 12)); // WHERE idabsensi <= 12
     * </code>
     *
     * @param     mixed $idabsensi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByIdabsensi($idabsensi = null, $comparison = null)
    {
        if (is_array($idabsensi)) {
            $useMinMax = false;
            if (isset($idabsensi['min'])) {
                $this->addUsingAlias(TrabsensiPeer::IDABSENSI, $idabsensi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idabsensi['max'])) {
                $this->addUsingAlias(TrabsensiPeer::IDABSENSI, $idabsensi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::IDABSENSI, $idabsensi, $comparison);
    }

    /**
     * Filter the query on the sesi column
     *
     * Example usage:
     * <code>
     * $query->filterBySesi(1234); // WHERE sesi = 1234
     * $query->filterBySesi(array(12, 34)); // WHERE sesi IN (12, 34)
     * $query->filterBySesi(array('min' => 12)); // WHERE sesi >= 12
     * $query->filterBySesi(array('max' => 12)); // WHERE sesi <= 12
     * </code>
     *
     * @param     mixed $sesi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterBySesi($sesi = null, $comparison = null)
    {
        if (is_array($sesi)) {
            $useMinMax = false;
            if (isset($sesi['min'])) {
                $this->addUsingAlias(TrabsensiPeer::SESI, $sesi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sesi['max'])) {
                $this->addUsingAlias(TrabsensiPeer::SESI, $sesi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::SESI, $sesi, $comparison);
    }

    /**
     * Filter the query on the idtypesesi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdtypesesi(1234); // WHERE idtypesesi = 1234
     * $query->filterByIdtypesesi(array(12, 34)); // WHERE idtypesesi IN (12, 34)
     * $query->filterByIdtypesesi(array('min' => 12)); // WHERE idtypesesi >= 12
     * $query->filterByIdtypesesi(array('max' => 12)); // WHERE idtypesesi <= 12
     * </code>
     *
     * @param     mixed $idtypesesi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByIdtypesesi($idtypesesi = null, $comparison = null)
    {
        if (is_array($idtypesesi)) {
            $useMinMax = false;
            if (isset($idtypesesi['min'])) {
                $this->addUsingAlias(TrabsensiPeer::IDTYPESESI, $idtypesesi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtypesesi['max'])) {
                $this->addUsingAlias(TrabsensiPeer::IDTYPESESI, $idtypesesi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::IDTYPESESI, $idtypesesi, $comparison);
    }

    /**
     * Filter the query on the waktumulai column
     *
     * Example usage:
     * <code>
     * $query->filterByWaktumulai('2011-03-14'); // WHERE waktumulai = '2011-03-14'
     * $query->filterByWaktumulai('now'); // WHERE waktumulai = '2011-03-14'
     * $query->filterByWaktumulai(array('max' => 'yesterday')); // WHERE waktumulai < '2011-03-13'
     * </code>
     *
     * @param     mixed $waktumulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByWaktumulai($waktumulai = null, $comparison = null)
    {
        if (is_array($waktumulai)) {
            $useMinMax = false;
            if (isset($waktumulai['min'])) {
                $this->addUsingAlias(TrabsensiPeer::WAKTUMULAI, $waktumulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waktumulai['max'])) {
                $this->addUsingAlias(TrabsensiPeer::WAKTUMULAI, $waktumulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::WAKTUMULAI, $waktumulai, $comparison);
    }

    /**
     * Filter the query on the waktuselesai column
     *
     * Example usage:
     * <code>
     * $query->filterByWaktuselesai('2011-03-14'); // WHERE waktuselesai = '2011-03-14'
     * $query->filterByWaktuselesai('now'); // WHERE waktuselesai = '2011-03-14'
     * $query->filterByWaktuselesai(array('max' => 'yesterday')); // WHERE waktuselesai < '2011-03-13'
     * </code>
     *
     * @param     mixed $waktuselesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function filterByWaktuselesai($waktuselesai = null, $comparison = null)
    {
        if (is_array($waktuselesai)) {
            $useMinMax = false;
            if (isset($waktuselesai['min'])) {
                $this->addUsingAlias(TrabsensiPeer::WAKTUSELESAI, $waktuselesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waktuselesai['max'])) {
                $this->addUsingAlias(TrabsensiPeer::WAKTUSELESAI, $waktuselesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TrabsensiPeer::WAKTUSELESAI, $waktuselesai, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Trabsensi $trabsensi Object to remove from the list of results
     *
     * @return TrabsensiQuery The current query, for fluid interface
     */
    public function prune($trabsensi = null)
    {
        if ($trabsensi) {
            $this->addUsingAlias(TrabsensiPeer::IDTRABSENSI, $trabsensi->getIdtrabsensi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
