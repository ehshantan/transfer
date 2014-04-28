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
use CAD\TransferBundle\Model\PdnJawabanTugas;
use CAD\TransferBundle\Model\PdnJawabanTugasPeer;
use CAD\TransferBundle\Model\PdnJawabanTugasQuery;

/**
 * @method PdnJawabanTugasQuery orderByKodeMember($order = Criteria::ASC) Order by the kode_member column
 * @method PdnJawabanTugasQuery orderByKodeTugas($order = Criteria::ASC) Order by the kode_tugas column
 * @method PdnJawabanTugasQuery orderByKodeSoal($order = Criteria::ASC) Order by the kode_soal column
 * @method PdnJawabanTugasQuery orderByKodePilihan($order = Criteria::ASC) Order by the kode_pilihan column
 * @method PdnJawabanTugasQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method PdnJawabanTugasQuery groupByKodeMember() Group by the kode_member column
 * @method PdnJawabanTugasQuery groupByKodeTugas() Group by the kode_tugas column
 * @method PdnJawabanTugasQuery groupByKodeSoal() Group by the kode_soal column
 * @method PdnJawabanTugasQuery groupByKodePilihan() Group by the kode_pilihan column
 * @method PdnJawabanTugasQuery groupByStatus() Group by the status column
 *
 * @method PdnJawabanTugasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnJawabanTugasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnJawabanTugasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnJawabanTugas findOne(PropelPDO $con = null) Return the first PdnJawabanTugas matching the query
 * @method PdnJawabanTugas findOneOrCreate(PropelPDO $con = null) Return the first PdnJawabanTugas matching the query, or a new PdnJawabanTugas object populated from the query conditions when no match is found
 *
 * @method PdnJawabanTugas findOneByKodeMember(int $kode_member) Return the first PdnJawabanTugas filtered by the kode_member column
 * @method PdnJawabanTugas findOneByKodeTugas(int $kode_tugas) Return the first PdnJawabanTugas filtered by the kode_tugas column
 * @method PdnJawabanTugas findOneByKodeSoal(int $kode_soal) Return the first PdnJawabanTugas filtered by the kode_soal column
 * @method PdnJawabanTugas findOneByKodePilihan(string $kode_pilihan) Return the first PdnJawabanTugas filtered by the kode_pilihan column
 * @method PdnJawabanTugas findOneByStatus(int $status) Return the first PdnJawabanTugas filtered by the status column
 *
 * @method array findByKodeMember(int $kode_member) Return PdnJawabanTugas objects filtered by the kode_member column
 * @method array findByKodeTugas(int $kode_tugas) Return PdnJawabanTugas objects filtered by the kode_tugas column
 * @method array findByKodeSoal(int $kode_soal) Return PdnJawabanTugas objects filtered by the kode_soal column
 * @method array findByKodePilihan(string $kode_pilihan) Return PdnJawabanTugas objects filtered by the kode_pilihan column
 * @method array findByStatus(int $status) Return PdnJawabanTugas objects filtered by the status column
 */
abstract class BasePdnJawabanTugasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnJawabanTugasQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnJawabanTugas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnJawabanTugasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnJawabanTugasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnJawabanTugasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnJawabanTugasQuery) {
            return $criteria;
        }
        $query = new PdnJawabanTugasQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34, 56, 78), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
     * A Primary key composition: [$kode_member, $kode_tugas, $kode_soal, $kode_pilihan]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PdnJawabanTugas|PdnJawabanTugas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnJawabanTugasPeer::getInstanceFromPool(
                    serialize(array((string)$key[0], (string)$key[1], (string)$key[2], (string)$key[3]))
                ))) && !$this->formatter
        ) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnJawabanTugasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnJawabanTugas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `kode_member`, `kode_tugas`, `kode_soal`, `kode_pilihan`, `status` FROM `pdn_jawaban_tugas` WHERE `kode_member` = :p0 AND `kode_tugas` = :p1 AND `kode_soal` = :p2 AND `kode_pilihan` = :p3';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->bindValue(':p3', $key[3], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PdnJawabanTugas();
            $obj->hydrate($row);
            PdnJawabanTugasPeer::addInstanceToPool(
                $obj,
                serialize(array((string)$key[0], (string)$key[1], (string)$key[2], (string)$key[3]))
            );
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
     * @return PdnJawabanTugas|PdnJawabanTugas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnJawabanTugas[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PdnJawabanTugasPeer::KODE_MEMBER, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PdnJawabanTugasPeer::KODE_TUGAS, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(PdnJawabanTugasPeer::KODE_SOAL, $key[2], Criteria::EQUAL);
        $this->addUsingAlias(PdnJawabanTugasPeer::KODE_PILIHAN, $key[3], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PdnJawabanTugasPeer::KODE_MEMBER, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PdnJawabanTugasPeer::KODE_TUGAS, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(PdnJawabanTugasPeer::KODE_SOAL, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $cton3 = $this->getNewCriterion(PdnJawabanTugasPeer::KODE_PILIHAN, $key[3], Criteria::EQUAL);
            $cton0->addAnd($cton3);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the kode_member column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeMember(1234); // WHERE kode_member = 1234
     * $query->filterByKodeMember(array(12, 34)); // WHERE kode_member IN (12, 34)
     * $query->filterByKodeMember(array('min' => 12)); // WHERE kode_member >= 12
     * $query->filterByKodeMember(array('max' => 12)); // WHERE kode_member <= 12
     * </code>
     *
     * @param     mixed $kodeMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByKodeMember($kodeMember = null, $comparison = null)
    {
        if (is_array($kodeMember)) {
            $useMinMax = false;
            if (isset($kodeMember['min'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_MEMBER, $kodeMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeMember['max'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_MEMBER, $kodeMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnJawabanTugasPeer::KODE_MEMBER, $kodeMember, $comparison);
    }

    /**
     * Filter the query on the kode_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeTugas(1234); // WHERE kode_tugas = 1234
     * $query->filterByKodeTugas(array(12, 34)); // WHERE kode_tugas IN (12, 34)
     * $query->filterByKodeTugas(array('min' => 12)); // WHERE kode_tugas >= 12
     * $query->filterByKodeTugas(array('max' => 12)); // WHERE kode_tugas <= 12
     * </code>
     *
     * @param     mixed $kodeTugas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByKodeTugas($kodeTugas = null, $comparison = null)
    {
        if (is_array($kodeTugas)) {
            $useMinMax = false;
            if (isset($kodeTugas['min'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_TUGAS, $kodeTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeTugas['max'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_TUGAS, $kodeTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnJawabanTugasPeer::KODE_TUGAS, $kodeTugas, $comparison);
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
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByKodeSoal($kodeSoal = null, $comparison = null)
    {
        if (is_array($kodeSoal)) {
            $useMinMax = false;
            if (isset($kodeSoal['min'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_SOAL, $kodeSoal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeSoal['max'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::KODE_SOAL, $kodeSoal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnJawabanTugasPeer::KODE_SOAL, $kodeSoal, $comparison);
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
     * @return PdnJawabanTugasQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PdnJawabanTugasPeer::KODE_PILIHAN, $kodePilihan, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(PdnJawabanTugasPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnJawabanTugasPeer::STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnJawabanTugas $pdnJawabanTugas Object to remove from the list of results
     *
     * @return PdnJawabanTugasQuery The current query, for fluid interface
     */
    public function prune($pdnJawabanTugas = null)
    {
        if ($pdnJawabanTugas) {
            $this->addCond(
                'pruneCond0',
                $this->getAliasedColName(PdnJawabanTugasPeer::KODE_MEMBER),
                $pdnJawabanTugas->getKodeMember(),
                Criteria::NOT_EQUAL
            );
            $this->addCond(
                'pruneCond1',
                $this->getAliasedColName(PdnJawabanTugasPeer::KODE_TUGAS),
                $pdnJawabanTugas->getKodeTugas(),
                Criteria::NOT_EQUAL
            );
            $this->addCond(
                'pruneCond2',
                $this->getAliasedColName(PdnJawabanTugasPeer::KODE_SOAL),
                $pdnJawabanTugas->getKodeSoal(),
                Criteria::NOT_EQUAL
            );
            $this->addCond(
                'pruneCond3',
                $this->getAliasedColName(PdnJawabanTugasPeer::KODE_PILIHAN),
                $pdnJawabanTugas->getKodePilihan(),
                Criteria::NOT_EQUAL
            );
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2', 'pruneCond3'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
