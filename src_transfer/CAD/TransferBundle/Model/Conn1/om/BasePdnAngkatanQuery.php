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
use CAD\TransferBundle\Model\Conn1\PdnAngkatan;
use CAD\TransferBundle\Model\Conn1\PdnAngkatanPeer;
use CAD\TransferBundle\Model\Conn1\PdnAngkatanQuery;

/**
 * @method PdnAngkatanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnAngkatanQuery orderByAngkatan($order = Criteria::ASC) Order by the angkatan column
 * @method PdnAngkatanQuery orderByPenyegaranPagi($order = Criteria::ASC) Order by the penyegaran_pagi column
 * @method PdnAngkatanQuery orderByBacaAlkitab($order = Criteria::ASC) Order by the baca_alkitab column
 * @method PdnAngkatanQuery orderByDoa($order = Criteria::ASC) Order by the doa column
 * @method PdnAngkatanQuery orderByBacaRohani($order = Criteria::ASC) Order by the baca_rohani column
 * @method PdnAngkatanQuery orderByBersidang($order = Criteria::ASC) Order by the bersidang column
 * @method PdnAngkatanQuery orderByOt($order = Criteria::ASC) Order by the ot column
 * @method PdnAngkatanQuery orderByPenjengukan($order = Criteria::ASC) Order by the penjengukan column
 * @method PdnAngkatanQuery orderByPengumuman($order = Criteria::ASC) Order by the pengumuman column
 * @method PdnAngkatanQuery orderByTugas($order = Criteria::ASC) Order by the tugas column
 * @method PdnAngkatanQuery orderByTugasYa($order = Criteria::ASC) Order by the tugas_ya column
 * @method PdnAngkatanQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnAngkatanQuery groupById() Group by the id column
 * @method PdnAngkatanQuery groupByAngkatan() Group by the angkatan column
 * @method PdnAngkatanQuery groupByPenyegaranPagi() Group by the penyegaran_pagi column
 * @method PdnAngkatanQuery groupByBacaAlkitab() Group by the baca_alkitab column
 * @method PdnAngkatanQuery groupByDoa() Group by the doa column
 * @method PdnAngkatanQuery groupByBacaRohani() Group by the baca_rohani column
 * @method PdnAngkatanQuery groupByBersidang() Group by the bersidang column
 * @method PdnAngkatanQuery groupByOt() Group by the ot column
 * @method PdnAngkatanQuery groupByPenjengukan() Group by the penjengukan column
 * @method PdnAngkatanQuery groupByPengumuman() Group by the pengumuman column
 * @method PdnAngkatanQuery groupByTugas() Group by the tugas column
 * @method PdnAngkatanQuery groupByTugasYa() Group by the tugas_ya column
 * @method PdnAngkatanQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnAngkatanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnAngkatanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnAngkatanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnAngkatan findOne(PropelPDO $con = null) Return the first PdnAngkatan matching the query
 * @method PdnAngkatan findOneOrCreate(PropelPDO $con = null) Return the first PdnAngkatan matching the query, or a new PdnAngkatan object populated from the query conditions when no match is found
 *
 * @method PdnAngkatan findOneByAngkatan(int $angkatan) Return the first PdnAngkatan filtered by the angkatan column
 * @method PdnAngkatan findOneByPenyegaranPagi(int $penyegaran_pagi) Return the first PdnAngkatan filtered by the penyegaran_pagi column
 * @method PdnAngkatan findOneByBacaAlkitab(int $baca_alkitab) Return the first PdnAngkatan filtered by the baca_alkitab column
 * @method PdnAngkatan findOneByDoa(int $doa) Return the first PdnAngkatan filtered by the doa column
 * @method PdnAngkatan findOneByBacaRohani(int $baca_rohani) Return the first PdnAngkatan filtered by the baca_rohani column
 * @method PdnAngkatan findOneByBersidang(int $bersidang) Return the first PdnAngkatan filtered by the bersidang column
 * @method PdnAngkatan findOneByOt(int $ot) Return the first PdnAngkatan filtered by the ot column
 * @method PdnAngkatan findOneByPenjengukan(int $penjengukan) Return the first PdnAngkatan filtered by the penjengukan column
 * @method PdnAngkatan findOneByPengumuman(int $pengumuman) Return the first PdnAngkatan filtered by the pengumuman column
 * @method PdnAngkatan findOneByTugas(int $tugas) Return the first PdnAngkatan filtered by the tugas column
 * @method PdnAngkatan findOneByTugasYa(int $tugas_ya) Return the first PdnAngkatan filtered by the tugas_ya column
 * @method PdnAngkatan findOneByIsApproved(int $is_approved) Return the first PdnAngkatan filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnAngkatan objects filtered by the id column
 * @method array findByAngkatan(int $angkatan) Return PdnAngkatan objects filtered by the angkatan column
 * @method array findByPenyegaranPagi(int $penyegaran_pagi) Return PdnAngkatan objects filtered by the penyegaran_pagi column
 * @method array findByBacaAlkitab(int $baca_alkitab) Return PdnAngkatan objects filtered by the baca_alkitab column
 * @method array findByDoa(int $doa) Return PdnAngkatan objects filtered by the doa column
 * @method array findByBacaRohani(int $baca_rohani) Return PdnAngkatan objects filtered by the baca_rohani column
 * @method array findByBersidang(int $bersidang) Return PdnAngkatan objects filtered by the bersidang column
 * @method array findByOt(int $ot) Return PdnAngkatan objects filtered by the ot column
 * @method array findByPenjengukan(int $penjengukan) Return PdnAngkatan objects filtered by the penjengukan column
 * @method array findByPengumuman(int $pengumuman) Return PdnAngkatan objects filtered by the pengumuman column
 * @method array findByTugas(int $tugas) Return PdnAngkatan objects filtered by the tugas column
 * @method array findByTugasYa(int $tugas_ya) Return PdnAngkatan objects filtered by the tugas_ya column
 * @method array findByIsApproved(int $is_approved) Return PdnAngkatan objects filtered by the is_approved column
 */
abstract class BasePdnAngkatanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnAngkatanQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnAngkatan';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnAngkatanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnAngkatanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnAngkatanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnAngkatanQuery) {
            return $criteria;
        }
        $query = new PdnAngkatanQuery(null, null, $modelAlias);

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
     * @return   PdnAngkatan|PdnAngkatan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnAngkatanPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnAngkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnAngkatan A model object, or null if the key is not found
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
     * @return                 PdnAngkatan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `angkatan`, `penyegaran_pagi`, `baca_alkitab`, `doa`, `baca_rohani`, `bersidang`, `ot`, `penjengukan`, `pengumuman`, `tugas`, `tugas_ya`, `is_approved` FROM `pdn_angkatan` WHERE `id` = :p0';
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
            $obj = new PdnAngkatan();
            $obj->hydrate($row);
            PdnAngkatanPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnAngkatan|PdnAngkatan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnAngkatan[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnAngkatanPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnAngkatanPeer::ID, $keys, Criteria::IN);
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
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the angkatan column
     *
     * Example usage:
     * <code>
     * $query->filterByAngkatan(1234); // WHERE angkatan = 1234
     * $query->filterByAngkatan(array(12, 34)); // WHERE angkatan IN (12, 34)
     * $query->filterByAngkatan(array('min' => 12)); // WHERE angkatan >= 12
     * $query->filterByAngkatan(array('max' => 12)); // WHERE angkatan <= 12
     * </code>
     *
     * @param     mixed $angkatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByAngkatan($angkatan = null, $comparison = null)
    {
        if (is_array($angkatan)) {
            $useMinMax = false;
            if (isset($angkatan['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::ANGKATAN, $angkatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($angkatan['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::ANGKATAN, $angkatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::ANGKATAN, $angkatan, $comparison);
    }

    /**
     * Filter the query on the penyegaran_pagi column
     *
     * Example usage:
     * <code>
     * $query->filterByPenyegaranPagi(1234); // WHERE penyegaran_pagi = 1234
     * $query->filterByPenyegaranPagi(array(12, 34)); // WHERE penyegaran_pagi IN (12, 34)
     * $query->filterByPenyegaranPagi(array('min' => 12)); // WHERE penyegaran_pagi >= 12
     * $query->filterByPenyegaranPagi(array('max' => 12)); // WHERE penyegaran_pagi <= 12
     * </code>
     *
     * @param     mixed $penyegaranPagi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByPenyegaranPagi($penyegaranPagi = null, $comparison = null)
    {
        if (is_array($penyegaranPagi)) {
            $useMinMax = false;
            if (isset($penyegaranPagi['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENYEGARAN_PAGI, $penyegaranPagi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penyegaranPagi['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENYEGARAN_PAGI, $penyegaranPagi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::PENYEGARAN_PAGI, $penyegaranPagi, $comparison);
    }

    /**
     * Filter the query on the baca_alkitab column
     *
     * Example usage:
     * <code>
     * $query->filterByBacaAlkitab(1234); // WHERE baca_alkitab = 1234
     * $query->filterByBacaAlkitab(array(12, 34)); // WHERE baca_alkitab IN (12, 34)
     * $query->filterByBacaAlkitab(array('min' => 12)); // WHERE baca_alkitab >= 12
     * $query->filterByBacaAlkitab(array('max' => 12)); // WHERE baca_alkitab <= 12
     * </code>
     *
     * @param     mixed $bacaAlkitab The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByBacaAlkitab($bacaAlkitab = null, $comparison = null)
    {
        if (is_array($bacaAlkitab)) {
            $useMinMax = false;
            if (isset($bacaAlkitab['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BACA_ALKITAB, $bacaAlkitab['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bacaAlkitab['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BACA_ALKITAB, $bacaAlkitab['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::BACA_ALKITAB, $bacaAlkitab, $comparison);
    }

    /**
     * Filter the query on the doa column
     *
     * Example usage:
     * <code>
     * $query->filterByDoa(1234); // WHERE doa = 1234
     * $query->filterByDoa(array(12, 34)); // WHERE doa IN (12, 34)
     * $query->filterByDoa(array('min' => 12)); // WHERE doa >= 12
     * $query->filterByDoa(array('max' => 12)); // WHERE doa <= 12
     * </code>
     *
     * @param     mixed $doa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByDoa($doa = null, $comparison = null)
    {
        if (is_array($doa)) {
            $useMinMax = false;
            if (isset($doa['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::DOA, $doa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doa['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::DOA, $doa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::DOA, $doa, $comparison);
    }

    /**
     * Filter the query on the baca_rohani column
     *
     * Example usage:
     * <code>
     * $query->filterByBacaRohani(1234); // WHERE baca_rohani = 1234
     * $query->filterByBacaRohani(array(12, 34)); // WHERE baca_rohani IN (12, 34)
     * $query->filterByBacaRohani(array('min' => 12)); // WHERE baca_rohani >= 12
     * $query->filterByBacaRohani(array('max' => 12)); // WHERE baca_rohani <= 12
     * </code>
     *
     * @param     mixed $bacaRohani The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByBacaRohani($bacaRohani = null, $comparison = null)
    {
        if (is_array($bacaRohani)) {
            $useMinMax = false;
            if (isset($bacaRohani['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BACA_ROHANI, $bacaRohani['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bacaRohani['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BACA_ROHANI, $bacaRohani['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::BACA_ROHANI, $bacaRohani, $comparison);
    }

    /**
     * Filter the query on the bersidang column
     *
     * Example usage:
     * <code>
     * $query->filterByBersidang(1234); // WHERE bersidang = 1234
     * $query->filterByBersidang(array(12, 34)); // WHERE bersidang IN (12, 34)
     * $query->filterByBersidang(array('min' => 12)); // WHERE bersidang >= 12
     * $query->filterByBersidang(array('max' => 12)); // WHERE bersidang <= 12
     * </code>
     *
     * @param     mixed $bersidang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByBersidang($bersidang = null, $comparison = null)
    {
        if (is_array($bersidang)) {
            $useMinMax = false;
            if (isset($bersidang['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BERSIDANG, $bersidang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bersidang['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::BERSIDANG, $bersidang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::BERSIDANG, $bersidang, $comparison);
    }

    /**
     * Filter the query on the ot column
     *
     * Example usage:
     * <code>
     * $query->filterByOt(1234); // WHERE ot = 1234
     * $query->filterByOt(array(12, 34)); // WHERE ot IN (12, 34)
     * $query->filterByOt(array('min' => 12)); // WHERE ot >= 12
     * $query->filterByOt(array('max' => 12)); // WHERE ot <= 12
     * </code>
     *
     * @param     mixed $ot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByOt($ot = null, $comparison = null)
    {
        if (is_array($ot)) {
            $useMinMax = false;
            if (isset($ot['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::OT, $ot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ot['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::OT, $ot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::OT, $ot, $comparison);
    }

    /**
     * Filter the query on the penjengukan column
     *
     * Example usage:
     * <code>
     * $query->filterByPenjengukan(1234); // WHERE penjengukan = 1234
     * $query->filterByPenjengukan(array(12, 34)); // WHERE penjengukan IN (12, 34)
     * $query->filterByPenjengukan(array('min' => 12)); // WHERE penjengukan >= 12
     * $query->filterByPenjengukan(array('max' => 12)); // WHERE penjengukan <= 12
     * </code>
     *
     * @param     mixed $penjengukan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByPenjengukan($penjengukan = null, $comparison = null)
    {
        if (is_array($penjengukan)) {
            $useMinMax = false;
            if (isset($penjengukan['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENJENGUKAN, $penjengukan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penjengukan['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENJENGUKAN, $penjengukan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::PENJENGUKAN, $penjengukan, $comparison);
    }

    /**
     * Filter the query on the pengumuman column
     *
     * Example usage:
     * <code>
     * $query->filterByPengumuman(1234); // WHERE pengumuman = 1234
     * $query->filterByPengumuman(array(12, 34)); // WHERE pengumuman IN (12, 34)
     * $query->filterByPengumuman(array('min' => 12)); // WHERE pengumuman >= 12
     * $query->filterByPengumuman(array('max' => 12)); // WHERE pengumuman <= 12
     * </code>
     *
     * @param     mixed $pengumuman The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByPengumuman($pengumuman = null, $comparison = null)
    {
        if (is_array($pengumuman)) {
            $useMinMax = false;
            if (isset($pengumuman['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENGUMUMAN, $pengumuman['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengumuman['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::PENGUMUMAN, $pengumuman['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::PENGUMUMAN, $pengumuman, $comparison);
    }

    /**
     * Filter the query on the tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTugas(1234); // WHERE tugas = 1234
     * $query->filterByTugas(array(12, 34)); // WHERE tugas IN (12, 34)
     * $query->filterByTugas(array('min' => 12)); // WHERE tugas >= 12
     * $query->filterByTugas(array('max' => 12)); // WHERE tugas <= 12
     * </code>
     *
     * @param     mixed $tugas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByTugas($tugas = null, $comparison = null)
    {
        if (is_array($tugas)) {
            $useMinMax = false;
            if (isset($tugas['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::TUGAS, $tugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tugas['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::TUGAS, $tugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::TUGAS, $tugas, $comparison);
    }

    /**
     * Filter the query on the tugas_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByTugasYa(1234); // WHERE tugas_ya = 1234
     * $query->filterByTugasYa(array(12, 34)); // WHERE tugas_ya IN (12, 34)
     * $query->filterByTugasYa(array('min' => 12)); // WHERE tugas_ya >= 12
     * $query->filterByTugasYa(array('max' => 12)); // WHERE tugas_ya <= 12
     * </code>
     *
     * @param     mixed $tugasYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByTugasYa($tugasYa = null, $comparison = null)
    {
        if (is_array($tugasYa)) {
            $useMinMax = false;
            if (isset($tugasYa['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::TUGAS_YA, $tugasYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tugasYa['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::TUGAS_YA, $tugasYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::TUGAS_YA, $tugasYa, $comparison);
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
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnAngkatanPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnAngkatanPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAngkatanPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnAngkatan $pdnAngkatan Object to remove from the list of results
     *
     * @return PdnAngkatanQuery The current query, for fluid interface
     */
    public function prune($pdnAngkatan = null)
    {
        if ($pdnAngkatan) {
            $this->addUsingAlias(PdnAngkatanPeer::ID, $pdnAngkatan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
