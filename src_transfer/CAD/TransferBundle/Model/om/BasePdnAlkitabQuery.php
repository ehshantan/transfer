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
use CAD\TransferBundle\Model\PdnAlkitab;
use CAD\TransferBundle\Model\PdnAlkitabPeer;
use CAD\TransferBundle\Model\PdnAlkitabQuery;

/**
 * @method PdnAlkitabQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method PdnAlkitabQuery orderByPl($order = Criteria::ASC) Order by the pl column
 * @method PdnAlkitabQuery orderByPb($order = Criteria::ASC) Order by the pb column
 *
 * @method PdnAlkitabQuery groupByDate() Group by the date column
 * @method PdnAlkitabQuery groupByPl() Group by the pl column
 * @method PdnAlkitabQuery groupByPb() Group by the pb column
 *
 * @method PdnAlkitabQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnAlkitabQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnAlkitabQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnAlkitab findOne(PropelPDO $con = null) Return the first PdnAlkitab matching the query
 * @method PdnAlkitab findOneOrCreate(PropelPDO $con = null) Return the first PdnAlkitab matching the query, or a new PdnAlkitab object populated from the query conditions when no match is found
 *
 * @method PdnAlkitab findOneByPl(string $pl) Return the first PdnAlkitab filtered by the pl column
 * @method PdnAlkitab findOneByPb(string $pb) Return the first PdnAlkitab filtered by the pb column
 *
 * @method array findByDate(string $date) Return PdnAlkitab objects filtered by the date column
 * @method array findByPl(string $pl) Return PdnAlkitab objects filtered by the pl column
 * @method array findByPb(string $pb) Return PdnAlkitab objects filtered by the pb column
 */
abstract class BasePdnAlkitabQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnAlkitabQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnAlkitab';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnAlkitabQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnAlkitabQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnAlkitabQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnAlkitabQuery) {
            return $criteria;
        }
        $query = new PdnAlkitabQuery(null, null, $modelAlias);

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
     * @return   PdnAlkitab|PdnAlkitab[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnAlkitabPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnAlkitabPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnAlkitab A model object, or null if the key is not found
     * @throws PropelException
     */
    public function findOneByDate($key, $con = null)
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
     * @return                 PdnAlkitab A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `date`, `pl`, `pb` FROM `pdn_alkitab` WHERE `date` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PdnAlkitab();
            $obj->hydrate($row);
            PdnAlkitabPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnAlkitab|PdnAlkitab[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnAlkitab[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnAlkitabPeer::DATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnAlkitabPeer::DATE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date < '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PdnAlkitabPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PdnAlkitabPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnAlkitabPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the pl column
     *
     * Example usage:
     * <code>
     * $query->filterByPl('fooValue');   // WHERE pl = 'fooValue'
     * $query->filterByPl('%fooValue%'); // WHERE pl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function filterByPl($pl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pl)) {
                $pl = str_replace('*', '%', $pl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnAlkitabPeer::PL, $pl, $comparison);
    }

    /**
     * Filter the query on the pb column
     *
     * Example usage:
     * <code>
     * $query->filterByPb('fooValue');   // WHERE pb = 'fooValue'
     * $query->filterByPb('%fooValue%'); // WHERE pb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function filterByPb($pb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pb)) {
                $pb = str_replace('*', '%', $pb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnAlkitabPeer::PB, $pb, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnAlkitab $pdnAlkitab Object to remove from the list of results
     *
     * @return PdnAlkitabQuery The current query, for fluid interface
     */
    public function prune($pdnAlkitab = null)
    {
        if ($pdnAlkitab) {
            $this->addUsingAlias(PdnAlkitabPeer::DATE, $pdnAlkitab->getDate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
