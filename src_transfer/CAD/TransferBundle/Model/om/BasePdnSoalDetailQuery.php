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
use CAD\TransferBundle\Model\PdnSoalDetail;
use CAD\TransferBundle\Model\PdnSoalDetailPeer;
use CAD\TransferBundle\Model\PdnSoalDetailQuery;

/**
 * @method PdnSoalDetailQuery orderByKodeSoal($order = Criteria::ASC) Order by the kode_soal column
 * @method PdnSoalDetailQuery orderByKodePilihan($order = Criteria::ASC) Order by the kode_pilihan column
 * @method PdnSoalDetailQuery orderByPilihan($order = Criteria::ASC) Order by the pilihan column
 *
 * @method PdnSoalDetailQuery groupByKodeSoal() Group by the kode_soal column
 * @method PdnSoalDetailQuery groupByKodePilihan() Group by the kode_pilihan column
 * @method PdnSoalDetailQuery groupByPilihan() Group by the pilihan column
 *
 * @method PdnSoalDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnSoalDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnSoalDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnSoalDetail findOne(PropelPDO $con = null) Return the first PdnSoalDetail matching the query
 * @method PdnSoalDetail findOneOrCreate(PropelPDO $con = null) Return the first PdnSoalDetail matching the query, or a new PdnSoalDetail object populated from the query conditions when no match is found
 *
 * @method PdnSoalDetail findOneByKodeSoal(int $kode_soal) Return the first PdnSoalDetail filtered by the kode_soal column
 * @method PdnSoalDetail findOneByKodePilihan(string $kode_pilihan) Return the first PdnSoalDetail filtered by the kode_pilihan column
 * @method PdnSoalDetail findOneByPilihan(string $pilihan) Return the first PdnSoalDetail filtered by the pilihan column
 *
 * @method array findByKodeSoal(int $kode_soal) Return PdnSoalDetail objects filtered by the kode_soal column
 * @method array findByKodePilihan(string $kode_pilihan) Return PdnSoalDetail objects filtered by the kode_pilihan column
 * @method array findByPilihan(string $pilihan) Return PdnSoalDetail objects filtered by the pilihan column
 */
abstract class BasePdnSoalDetailQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnSoalDetailQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnSoalDetail';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnSoalDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnSoalDetailQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnSoalDetailQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnSoalDetailQuery) {
            return $criteria;
        }
        $query = new PdnSoalDetailQuery(null, null, $modelAlias);

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
     * A Primary key composition: [$kode_soal, $kode_pilihan]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PdnSoalDetail|PdnSoalDetail[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnSoalDetailPeer::getInstanceFromPool(
                    serialize(array((string)$key[0], (string)$key[1]))
                ))) && !$this->formatter
        ) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnSoalDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnSoalDetail A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `kode_soal`, `kode_pilihan`, `pilihan` FROM `pdn_soal_detail` WHERE `kode_soal` = :p0 AND `kode_pilihan` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PdnSoalDetail();
            $obj->hydrate($row);
            PdnSoalDetailPeer::addInstanceToPool($obj, serialize(array((string)$key[0], (string)$key[1])));
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
     * @return PdnSoalDetail|PdnSoalDetail[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnSoalDetail[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PdnSoalDetailPeer::KODE_SOAL, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PdnSoalDetailPeer::KODE_PILIHAN, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PdnSoalDetailPeer::KODE_SOAL, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PdnSoalDetailPeer::KODE_PILIHAN, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the kode_soal column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeSoal(1234); // WHERE kode_soal = 1234
     * $query->filterByKodeSoal(array(12, 34)); // WHERE kode_soal IN (12, 34)
     * $query->filterByKodeSoal(array('min' => 12)); // WHERE kode_soal >= 12
     * $query->filterByKodeSoal(array('max' => 12)); // WHERE kode_soal <= 12
     * </code>
     *
     * @param     mixed $kodeSoal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function filterByKodeSoal($kodeSoal = null, $comparison = null)
    {
        if (is_array($kodeSoal)) {
            $useMinMax = false;
            if (isset($kodeSoal['min'])) {
                $this->addUsingAlias(PdnSoalDetailPeer::KODE_SOAL, $kodeSoal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeSoal['max'])) {
                $this->addUsingAlias(PdnSoalDetailPeer::KODE_SOAL, $kodeSoal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnSoalDetailPeer::KODE_SOAL, $kodeSoal, $comparison);
    }

    /**
     * Filter the query on the kode_pilihan column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePilihan('fooValue');   // WHERE kode_pilihan = 'fooValue'
     * $query->filterByKodePilihan('%fooValue%'); // WHERE kode_pilihan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePilihan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function filterByKodePilihan($kodePilihan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePilihan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodePilihan)) {
                $kodePilihan = str_replace('*', '%', $kodePilihan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnSoalDetailPeer::KODE_PILIHAN, $kodePilihan, $comparison);
    }

    /**
     * Filter the query on the pilihan column
     *
     * Example usage:
     * <code>
     * $query->filterByPilihan('fooValue');   // WHERE pilihan = 'fooValue'
     * $query->filterByPilihan('%fooValue%'); // WHERE pilihan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pilihan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function filterByPilihan($pilihan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pilihan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pilihan)) {
                $pilihan = str_replace('*', '%', $pilihan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnSoalDetailPeer::PILIHAN, $pilihan, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnSoalDetail $pdnSoalDetail Object to remove from the list of results
     *
     * @return PdnSoalDetailQuery The current query, for fluid interface
     */
    public function prune($pdnSoalDetail = null)
    {
        if ($pdnSoalDetail) {
            $this->addCond(
                'pruneCond0',
                $this->getAliasedColName(PdnSoalDetailPeer::KODE_SOAL),
                $pdnSoalDetail->getKodeSoal(),
                Criteria::NOT_EQUAL
            );
            $this->addCond(
                'pruneCond1',
                $this->getAliasedColName(PdnSoalDetailPeer::KODE_PILIHAN),
                $pdnSoalDetail->getKodePilihan(),
                Criteria::NOT_EQUAL
            );
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
