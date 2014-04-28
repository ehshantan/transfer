<?php

namespace CAD\TransferBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use CAD\TransferBundle\Model\Batch;
use CAD\TransferBundle\Model\BatchCategoryJournal;
use CAD\TransferBundle\Model\BatchPeer;
use CAD\TransferBundle\Model\BatchQuery;
use CAD\TransferBundle\Model\User;

/**
 * @method BatchQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BatchQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method BatchQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method BatchQuery groupById() Group by the id column
 * @method BatchQuery groupByName() Group by the name column
 * @method BatchQuery groupByActive() Group by the active column
 *
 * @method BatchQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BatchQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BatchQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BatchQuery leftJoinBatchCategoryJournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the BatchCategoryJournal relation
 * @method BatchQuery rightJoinBatchCategoryJournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BatchCategoryJournal relation
 * @method BatchQuery innerJoinBatchCategoryJournal($relationAlias = null) Adds a INNER JOIN clause to the query using the BatchCategoryJournal relation
 *
 * @method BatchQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method BatchQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method BatchQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method Batch findOne(PropelPDO $con = null) Return the first Batch matching the query
 * @method Batch findOneOrCreate(PropelPDO $con = null) Return the first Batch matching the query, or a new Batch object populated from the query conditions when no match is found
 *
 * @method Batch findOneByName(string $name) Return the first Batch filtered by the name column
 * @method Batch findOneByActive(boolean $active) Return the first Batch filtered by the active column
 *
 * @method array findById(string $id) Return Batch objects filtered by the id column
 * @method array findByName(string $name) Return Batch objects filtered by the name column
 * @method array findByActive(boolean $active) Return Batch objects filtered by the active column
 */
abstract class BaseBatchQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBatchQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Batch';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BatchQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BatchQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BatchQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BatchQuery) {
            return $criteria;
        }
        $query = new BatchQuery(null, null, $modelAlias);

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
     * @return   Batch|Batch[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BatchPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BatchPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Batch A model object, or null if the key is not found
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
     * @return                 Batch A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `name`, `active` FROM `batch` WHERE `id` = :p0';
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
            $obj = new Batch();
            $obj->hydrate($row);
            BatchPeer::addInstanceToPool($obj, (string)$key);
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
     * @return Batch|Batch[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Batch[]|mixed the list of results, formatted by the current formatter
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
     * @return BatchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BatchPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BatchPeer::ID, $keys, Criteria::IN);
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
     * @return BatchQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BatchPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BatchPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatchPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BatchPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the active column
     *
     * Example usage:
     * <code>
     * $query->filterByActive(true); // WHERE active = true
     * $query->filterByActive('yes'); // WHERE active = true
     * </code>
     *
     * @param     boolean|string $active The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BatchPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query by a related BatchCategoryJournal object
     *
     * @param   BatchCategoryJournal|PropelObjectCollection $batchCategoryJournal the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BatchQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBatchCategoryJournal($batchCategoryJournal, $comparison = null)
    {
        if ($batchCategoryJournal instanceof BatchCategoryJournal) {
            return $this
                ->addUsingAlias(BatchPeer::ID, $batchCategoryJournal->getBatchId(), $comparison);
        } elseif ($batchCategoryJournal instanceof PropelObjectCollection) {
            return $this
                ->useBatchCategoryJournalQuery()
                ->filterByPrimaryKeys($batchCategoryJournal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBatchCategoryJournal() only accepts arguments of type BatchCategoryJournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BatchCategoryJournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function joinBatchCategoryJournal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BatchCategoryJournal');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BatchCategoryJournal');
        }

        return $this;
    }

    /**
     * Use the BatchCategoryJournal relation BatchCategoryJournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\BatchCategoryJournalQuery A secondary query class using the current class as primary query
     */
    public function useBatchCategoryJournalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBatchCategoryJournal($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'BatchCategoryJournal',
                '\CAD\TransferBundle\Model\BatchCategoryJournalQuery'
            );
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BatchQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(BatchPeer::ID, $user->getBatchId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            return $this
                ->useUserQuery()
                ->filterByPrimaryKeys($user->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\CAD\TransferBundle\Model\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Batch $batch Object to remove from the list of results
     *
     * @return BatchQuery The current query, for fluid interface
     */
    public function prune($batch = null)
    {
        if ($batch) {
            $this->addUsingAlias(BatchPeer::ID, $batch->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
