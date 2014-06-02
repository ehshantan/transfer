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
use CAD\TransferBundle\Model\Conn1\PdnTugasDetail;
use CAD\TransferBundle\Model\Conn1\PdnTugasDetailPeer;
use CAD\TransferBundle\Model\Conn1\PdnTugasDetailQuery;

/**
 * @method PdnTugasDetailQuery orderByKodeSoal($order = Criteria::ASC) Order by the kode_soal column
 * @method PdnTugasDetailQuery orderBySoal($order = Criteria::ASC) Order by the soal column
 * @method PdnTugasDetailQuery orderByJawaban($order = Criteria::ASC) Order by the jawaban column
 * @method PdnTugasDetailQuery orderByKodeTugas($order = Criteria::ASC) Order by the kode_tugas column
 *
 * @method PdnTugasDetailQuery groupByKodeSoal() Group by the kode_soal column
 * @method PdnTugasDetailQuery groupBySoal() Group by the soal column
 * @method PdnTugasDetailQuery groupByJawaban() Group by the jawaban column
 * @method PdnTugasDetailQuery groupByKodeTugas() Group by the kode_tugas column
 *
 * @method PdnTugasDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnTugasDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnTugasDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnTugasDetail findOne(PropelPDO $con = null) Return the first PdnTugasDetail matching the query
 * @method PdnTugasDetail findOneOrCreate(PropelPDO $con = null) Return the first PdnTugasDetail matching the query, or a new PdnTugasDetail object populated from the query conditions when no match is found
 *
 * @method PdnTugasDetail findOneBySoal(string $soal) Return the first PdnTugasDetail filtered by the soal column
 * @method PdnTugasDetail findOneByJawaban(string $jawaban) Return the first PdnTugasDetail filtered by the jawaban column
 * @method PdnTugasDetail findOneByKodeTugas(int $kode_tugas) Return the first PdnTugasDetail filtered by the kode_tugas column
 *
 * @method array findByKodeSoal(int $kode_soal) Return PdnTugasDetail objects filtered by the kode_soal column
 * @method array findBySoal(string $soal) Return PdnTugasDetail objects filtered by the soal column
 * @method array findByJawaban(string $jawaban) Return PdnTugasDetail objects filtered by the jawaban column
 * @method array findByKodeTugas(int $kode_tugas) Return PdnTugasDetail objects filtered by the kode_tugas column
 */
abstract class BasePdnTugasDetailQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnTugasDetailQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnTugasDetail';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnTugasDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnTugasDetailQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnTugasDetailQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnTugasDetailQuery) {
            return $criteria;
        }
        $query = new PdnTugasDetailQuery(null, null, $modelAlias);

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
     * @return   PdnTugasDetail|PdnTugasDetail[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnTugasDetailPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnTugasDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnTugasDetail A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneByKodeSoal($key, $con = null)
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
     * @return                 PdnTugasDetail A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `kode_soal`, `soal`, `jawaban`, `kode_tugas` FROM `pdn_tugas_detail` WHERE `kode_soal` = :p0';
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
            $obj = new PdnTugasDetail();
            $obj->hydrate($row);
            PdnTugasDetailPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnTugasDetail|PdnTugasDetail[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnTugasDetail[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $keys, Criteria::IN);
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
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterByKodeSoal($kodeSoal = null, $comparison = null)
    {
        if (is_array($kodeSoal)) {
            $useMinMax = false;
            if (isset($kodeSoal['min'])) {
                $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $kodeSoal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeSoal['max'])) {
                $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $kodeSoal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $kodeSoal, $comparison);
    }

    /**
     * Filter the query on the soal column
     *
     * Example usage:
     * <code>
     * $query->filterBySoal('fooValue');   // WHERE soal = 'fooValue'
     * $query->filterBySoal('%fooValue%'); // WHERE soal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $soal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterBySoal($soal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($soal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $soal)) {
                $soal = str_replace('*', '%', $soal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnTugasDetailPeer::SOAL, $soal, $comparison);
    }

    /**
     * Filter the query on the jawaban column
     *
     * Example usage:
     * <code>
     * $query->filterByJawaban('fooValue');   // WHERE jawaban = 'fooValue'
     * $query->filterByJawaban('%fooValue%'); // WHERE jawaban LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jawaban The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterByJawaban($jawaban = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jawaban)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jawaban)) {
                $jawaban = str_replace('*', '%', $jawaban);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnTugasDetailPeer::JAWABAN, $jawaban, $comparison);
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
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function filterByKodeTugas($kodeTugas = null, $comparison = null)
    {
        if (is_array($kodeTugas)) {
            $useMinMax = false;
            if (isset($kodeTugas['min'])) {
                $this->addUsingAlias(PdnTugasDetailPeer::KODE_TUGAS, $kodeTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeTugas['max'])) {
                $this->addUsingAlias(PdnTugasDetailPeer::KODE_TUGAS, $kodeTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnTugasDetailPeer::KODE_TUGAS, $kodeTugas, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnTugasDetail $pdnTugasDetail Object to remove from the list of results
     *
     * @return PdnTugasDetailQuery The current query, for fluid interface
     */
    public function prune($pdnTugasDetail = null)
    {
        if ($pdnTugasDetail) {
            $this->addUsingAlias(PdnTugasDetailPeer::KODE_SOAL, $pdnTugasDetail->getKodeSoal(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
