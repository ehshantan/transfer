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
use CAD\TransferBundle\Model\Absensi;
use CAD\TransferBundle\Model\AbsensiPeer;
use CAD\TransferBundle\Model\AbsensiQuery;

/**
 * @method AbsensiQuery orderByIdabsensi($order = Criteria::ASC) Order by the idabsensi column
 * @method AbsensiQuery orderByAcara($order = Criteria::ASC) Order by the acara column
 * @method AbsensiQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method AbsensiQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 *
 * @method AbsensiQuery groupByIdabsensi() Group by the idabsensi column
 * @method AbsensiQuery groupByAcara() Group by the acara column
 * @method AbsensiQuery groupByType() Group by the type column
 * @method AbsensiQuery groupByTanggal() Group by the tanggal column
 *
 * @method AbsensiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AbsensiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AbsensiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Absensi findOne(PropelPDO $con = null) Return the first Absensi matching the query
 * @method Absensi findOneOrCreate(PropelPDO $con = null) Return the first Absensi matching the query, or a new Absensi object populated from the query conditions when no match is found
 *
 * @method Absensi findOneByAcara(string $acara) Return the first Absensi filtered by the acara column
 * @method Absensi findOneByType(string $type) Return the first Absensi filtered by the type column
 * @method Absensi findOneByTanggal(string $tanggal) Return the first Absensi filtered by the tanggal column
 *
 * @method array findByIdabsensi(int $idabsensi) Return Absensi objects filtered by the idabsensi column
 * @method array findByAcara(string $acara) Return Absensi objects filtered by the acara column
 * @method array findByType(string $type) Return Absensi objects filtered by the type column
 * @method array findByTanggal(string $tanggal) Return Absensi objects filtered by the tanggal column
 */
abstract class BaseAbsensiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAbsensiQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Absensi';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AbsensiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AbsensiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AbsensiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AbsensiQuery) {
            return $criteria;
        }
        $query = new AbsensiQuery(null, null, $modelAlias);

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
     * @return   Absensi|Absensi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AbsensiPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AbsensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Absensi A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneByIdabsensi($key, $con = null)
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
     * @return                 Absensi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idabsensi`, `acara`, `type`, `tanggal` FROM `absensi` WHERE `idabsensi` = :p0';
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
            $obj = new Absensi();
            $obj->hydrate($row);
            AbsensiPeer::addInstanceToPool($obj, (string)$key);
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
     * @return Absensi|Absensi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Absensi[]|mixed the list of results, formatted by the current formatter
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
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AbsensiPeer::IDABSENSI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AbsensiPeer::IDABSENSI, $keys, Criteria::IN);
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
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByIdabsensi($idabsensi = null, $comparison = null)
    {
        if (is_array($idabsensi)) {
            $useMinMax = false;
            if (isset($idabsensi['min'])) {
                $this->addUsingAlias(AbsensiPeer::IDABSENSI, $idabsensi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idabsensi['max'])) {
                $this->addUsingAlias(AbsensiPeer::IDABSENSI, $idabsensi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbsensiPeer::IDABSENSI, $idabsensi, $comparison);
    }

    /**
     * Filter the query on the acara column
     *
     * Example usage:
     * <code>
     * $query->filterByAcara('fooValue');   // WHERE acara = 'fooValue'
     * $query->filterByAcara('%fooValue%'); // WHERE acara LIKE '%fooValue%'
     * </code>
     *
     * @param     string $acara The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByAcara($acara = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($acara)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $acara)) {
                $acara = str_replace('*', '%', $acara);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AbsensiPeer::ACARA, $acara, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AbsensiPeer::TYPE, $type, $comparison);
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
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(AbsensiPeer::TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(AbsensiPeer::TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AbsensiPeer::TANGGAL, $tanggal, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Absensi $absensi Object to remove from the list of results
     *
     * @return AbsensiQuery The current query, for fluid interface
     */
    public function prune($absensi = null)
    {
        if ($absensi) {
            $this->addUsingAlias(AbsensiPeer::IDABSENSI, $absensi->getIdabsensi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
