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
use CAD\TransferBundle\Model\Conn1\PdnTugas;
use CAD\TransferBundle\Model\Conn1\PdnTugasPeer;
use CAD\TransferBundle\Model\Conn1\PdnTugasQuery;

/**
 * @method PdnTugasQuery orderByKodeTugas($order = Criteria::ASC) Order by the kode_tugas column
 * @method PdnTugasQuery orderBySeri($order = Criteria::ASC) Order by the seri column
 * @method PdnTugasQuery orderByBerita($order = Criteria::ASC) Order by the berita column
 * @method PdnTugasQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method PdnTugasQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 *
 * @method PdnTugasQuery groupByKodeTugas() Group by the kode_tugas column
 * @method PdnTugasQuery groupBySeri() Group by the seri column
 * @method PdnTugasQuery groupByBerita() Group by the berita column
 * @method PdnTugasQuery groupByTanggal() Group by the tanggal column
 * @method PdnTugasQuery groupByFilename() Group by the filename column
 *
 * @method PdnTugasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnTugasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnTugasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnTugas findOne(PropelPDO $con = null) Return the first PdnTugas matching the query
 * @method PdnTugas findOneOrCreate(PropelPDO $con = null) Return the first PdnTugas matching the query, or a new PdnTugas object populated from the query conditions when no match is found
 *
 * @method PdnTugas findOneBySeri(string $seri) Return the first PdnTugas filtered by the seri column
 * @method PdnTugas findOneByBerita(string $berita) Return the first PdnTugas filtered by the berita column
 * @method PdnTugas findOneByTanggal(string $tanggal) Return the first PdnTugas filtered by the tanggal column
 * @method PdnTugas findOneByFilename(string $filename) Return the first PdnTugas filtered by the filename column
 *
 * @method array findByKodeTugas(int $kode_tugas) Return PdnTugas objects filtered by the kode_tugas column
 * @method array findBySeri(string $seri) Return PdnTugas objects filtered by the seri column
 * @method array findByBerita(string $berita) Return PdnTugas objects filtered by the berita column
 * @method array findByTanggal(string $tanggal) Return PdnTugas objects filtered by the tanggal column
 * @method array findByFilename(string $filename) Return PdnTugas objects filtered by the filename column
 */
abstract class BasePdnTugasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnTugasQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnTugas';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnTugasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnTugasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnTugasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnTugasQuery) {
            return $criteria;
        }
        $query = new PdnTugasQuery(null, null, $modelAlias);

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
     * @return   PdnTugas|PdnTugas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnTugasPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnTugasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnTugas A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneByKodeTugas($key, $con = null)
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
     * @return                 PdnTugas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `kode_tugas`, `seri`, `berita`, `tanggal`, `filename` FROM `pdn_tugas` WHERE `kode_tugas` = :p0';
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
            $obj = new PdnTugas();
            $obj->hydrate($row);
            PdnTugasPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnTugas|PdnTugas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnTugas[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $keys, Criteria::IN);
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
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByKodeTugas($kodeTugas = null, $comparison = null)
    {
        if (is_array($kodeTugas)) {
            $useMinMax = false;
            if (isset($kodeTugas['min'])) {
                $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $kodeTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeTugas['max'])) {
                $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $kodeTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $kodeTugas, $comparison);
    }

    /**
     * Filter the query on the seri column
     *
     * Example usage:
     * <code>
     * $query->filterBySeri('fooValue');   // WHERE seri = 'fooValue'
     * $query->filterBySeri('%fooValue%'); // WHERE seri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $seri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterBySeri($seri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($seri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $seri)) {
                $seri = str_replace('*', '%', $seri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnTugasPeer::SERI, $seri, $comparison);
    }

    /**
     * Filter the query on the berita column
     *
     * Example usage:
     * <code>
     * $query->filterByBerita('fooValue');   // WHERE berita = 'fooValue'
     * $query->filterByBerita('%fooValue%'); // WHERE berita LIKE '%fooValue%'
     * </code>
     *
     * @param     string $berita The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByBerita($berita = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($berita)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $berita)) {
                $berita = str_replace('*', '%', $berita);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnTugasPeer::BERITA, $berita, $comparison);
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
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(PdnTugasPeer::TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(PdnTugasPeer::TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnTugasPeer::TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query on the filename column
     *
     * Example usage:
     * <code>
     * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
     * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
     * </code>
     *
     * @param     string $filename The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function filterByFilename($filename = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($filename)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $filename)) {
                $filename = str_replace('*', '%', $filename);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnTugasPeer::FILENAME, $filename, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnTugas $pdnTugas Object to remove from the list of results
     *
     * @return PdnTugasQuery The current query, for fluid interface
     */
    public function prune($pdnTugas = null)
    {
        if ($pdnTugas) {
            $this->addUsingAlias(PdnTugasPeer::KODE_TUGAS, $pdnTugas->getKodeTugas(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
