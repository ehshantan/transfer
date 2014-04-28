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
use CAD\TransferBundle\Model\Dtabsensi;
use CAD\TransferBundle\Model\DtabsensiPeer;
use CAD\TransferBundle\Model\DtabsensiQuery;

/**
 * @method DtabsensiQuery orderByIdtrabsensi($order = Criteria::ASC) Order by the idtrabsensi column
 * @method DtabsensiQuery orderById($order = Criteria::ASC) Order by the id column
 * @method DtabsensiQuery orderByWaktu($order = Criteria::ASC) Order by the waktu column
 * @method DtabsensiQuery orderByRemedial($order = Criteria::ASC) Order by the remedial column
 *
 * @method DtabsensiQuery groupByIdtrabsensi() Group by the idtrabsensi column
 * @method DtabsensiQuery groupById() Group by the id column
 * @method DtabsensiQuery groupByWaktu() Group by the waktu column
 * @method DtabsensiQuery groupByRemedial() Group by the remedial column
 *
 * @method DtabsensiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DtabsensiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DtabsensiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Dtabsensi findOne(PropelPDO $con = null) Return the first Dtabsensi matching the query
 * @method Dtabsensi findOneOrCreate(PropelPDO $con = null) Return the first Dtabsensi matching the query, or a new Dtabsensi object populated from the query conditions when no match is found
 *
 * @method Dtabsensi findOneByIdtrabsensi(int $idtrabsensi) Return the first Dtabsensi filtered by the idtrabsensi column
 * @method Dtabsensi findOneById(int $id) Return the first Dtabsensi filtered by the id column
 * @method Dtabsensi findOneByWaktu(string $waktu) Return the first Dtabsensi filtered by the waktu column
 * @method Dtabsensi findOneByRemedial(string $remedial) Return the first Dtabsensi filtered by the remedial column
 *
 * @method array findByIdtrabsensi(int $idtrabsensi) Return Dtabsensi objects filtered by the idtrabsensi column
 * @method array findById(int $id) Return Dtabsensi objects filtered by the id column
 * @method array findByWaktu(string $waktu) Return Dtabsensi objects filtered by the waktu column
 * @method array findByRemedial(string $remedial) Return Dtabsensi objects filtered by the remedial column
 */
abstract class BaseDtabsensiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDtabsensiQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Dtabsensi';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DtabsensiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DtabsensiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DtabsensiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DtabsensiQuery) {
            return $criteria;
        }
        $query = new DtabsensiQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
     * A Primary key composition: [$idtrabsensi, $id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Dtabsensi|Dtabsensi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DtabsensiPeer::getInstanceFromPool(
                    serialize(array((string)$key[0], (string)$key[1]))
                ))) && !$this->formatter
        ) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DtabsensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Dtabsensi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `idtrabsensi`, `id`, `waktu`, `remedial` FROM `dtabsensi` WHERE `idtrabsensi` = :p0 AND `id` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Dtabsensi();
            $obj->hydrate($row);
            DtabsensiPeer::addInstanceToPool($obj, serialize(array((string)$key[0], (string)$key[1])));
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
     * @return Dtabsensi|Dtabsensi[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Dtabsensi[]|mixed the list of results, formatted by the current formatter
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
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DtabsensiPeer::IDTRABSENSI, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DtabsensiPeer::ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DtabsensiPeer::IDTRABSENSI, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DtabsensiPeer::ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterByIdtrabsensi($idtrabsensi = null, $comparison = null)
    {
        if (is_array($idtrabsensi)) {
            $useMinMax = false;
            if (isset($idtrabsensi['min'])) {
                $this->addUsingAlias(DtabsensiPeer::IDTRABSENSI, $idtrabsensi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idtrabsensi['max'])) {
                $this->addUsingAlias(DtabsensiPeer::IDTRABSENSI, $idtrabsensi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DtabsensiPeer::IDTRABSENSI, $idtrabsensi, $comparison);
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
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DtabsensiPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DtabsensiPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DtabsensiPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the waktu column
     *
     * Example usage:
     * <code>
     * $query->filterByWaktu('2011-03-14'); // WHERE waktu = '2011-03-14'
     * $query->filterByWaktu('now'); // WHERE waktu = '2011-03-14'
     * $query->filterByWaktu(array('max' => 'yesterday')); // WHERE waktu < '2011-03-13'
     * </code>
     *
     * @param     mixed $waktu The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterByWaktu($waktu = null, $comparison = null)
    {
        if (is_array($waktu)) {
            $useMinMax = false;
            if (isset($waktu['min'])) {
                $this->addUsingAlias(DtabsensiPeer::WAKTU, $waktu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waktu['max'])) {
                $this->addUsingAlias(DtabsensiPeer::WAKTU, $waktu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DtabsensiPeer::WAKTU, $waktu, $comparison);
    }

    /**
     * Filter the query on the remedial column
     *
     * Example usage:
     * <code>
     * $query->filterByRemedial('fooValue');   // WHERE remedial = 'fooValue'
     * $query->filterByRemedial('%fooValue%'); // WHERE remedial LIKE '%fooValue%'
     * </code>
     *
     * @param     string $remedial The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function filterByRemedial($remedial = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($remedial)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $remedial)) {
                $remedial = str_replace('*', '%', $remedial);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DtabsensiPeer::REMEDIAL, $remedial, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Dtabsensi $dtabsensi Object to remove from the list of results
     *
     * @return DtabsensiQuery The current query, for fluid interface
     */
    public function prune($dtabsensi = null)
    {
        if ($dtabsensi) {
            $this->addCond(
                'pruneCond0',
                $this->getAliasedColName(DtabsensiPeer::IDTRABSENSI),
                $dtabsensi->getIdtrabsensi(),
                Criteria::NOT_EQUAL
            );
            $this->addCond(
                'pruneCond1',
                $this->getAliasedColName(DtabsensiPeer::ID),
                $dtabsensi->getId(),
                Criteria::NOT_EQUAL
            );
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
