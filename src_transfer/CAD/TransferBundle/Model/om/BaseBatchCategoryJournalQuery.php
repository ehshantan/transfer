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
use CAD\TransferBundle\Model\BatchCategoryJournalPeer;
use CAD\TransferBundle\Model\BatchCategoryJournalQuery;
use CAD\TransferBundle\Model\CategoryJournal;

/**
 * @method BatchCategoryJournalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method BatchCategoryJournalQuery orderByBatchId($order = Criteria::ASC) Order by the batch_id column
 * @method BatchCategoryJournalQuery orderByCategoryJournalId($order = Criteria::ASC) Order by the category_journal_id column
 * @method BatchCategoryJournalQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method BatchCategoryJournalQuery groupById() Group by the id column
 * @method BatchCategoryJournalQuery groupByBatchId() Group by the batch_id column
 * @method BatchCategoryJournalQuery groupByCategoryJournalId() Group by the category_journal_id column
 * @method BatchCategoryJournalQuery groupByActive() Group by the active column
 *
 * @method BatchCategoryJournalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BatchCategoryJournalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BatchCategoryJournalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BatchCategoryJournalQuery leftJoinBatch($relationAlias = null) Adds a LEFT JOIN clause to the query using the Batch relation
 * @method BatchCategoryJournalQuery rightJoinBatch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Batch relation
 * @method BatchCategoryJournalQuery innerJoinBatch($relationAlias = null) Adds a INNER JOIN clause to the query using the Batch relation
 *
 * @method BatchCategoryJournalQuery leftJoinCategoryJournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryJournal relation
 * @method BatchCategoryJournalQuery rightJoinCategoryJournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryJournal relation
 * @method BatchCategoryJournalQuery innerJoinCategoryJournal($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryJournal relation
 *
 * @method BatchCategoryJournal findOne(PropelPDO $con = null) Return the first BatchCategoryJournal matching the query
 * @method BatchCategoryJournal findOneOrCreate(PropelPDO $con = null) Return the first BatchCategoryJournal matching the query, or a new BatchCategoryJournal object populated from the query conditions when no match is found
 *
 * @method BatchCategoryJournal findOneByBatchId(string $batch_id) Return the first BatchCategoryJournal filtered by the batch_id column
 * @method BatchCategoryJournal findOneByCategoryJournalId(string $category_journal_id) Return the first BatchCategoryJournal filtered by the category_journal_id column
 * @method BatchCategoryJournal findOneByActive(boolean $active) Return the first BatchCategoryJournal filtered by the active column
 *
 * @method array findById(string $id) Return BatchCategoryJournal objects filtered by the id column
 * @method array findByBatchId(string $batch_id) Return BatchCategoryJournal objects filtered by the batch_id column
 * @method array findByCategoryJournalId(string $category_journal_id) Return BatchCategoryJournal objects filtered by the category_journal_id column
 * @method array findByActive(boolean $active) Return BatchCategoryJournal objects filtered by the active column
 */
abstract class BaseBatchCategoryJournalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBatchCategoryJournalQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\BatchCategoryJournal';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BatchCategoryJournalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BatchCategoryJournalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BatchCategoryJournalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BatchCategoryJournalQuery) {
            return $criteria;
        }
        $query = new BatchCategoryJournalQuery(null, null, $modelAlias);

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
     * @return   BatchCategoryJournal|BatchCategoryJournal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BatchCategoryJournalPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BatchCategoryJournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BatchCategoryJournal A model object, or null if the key is not found
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
     * @return                 BatchCategoryJournal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `batch_id`, `category_journal_id`, `active` FROM `batch_category_journal` WHERE `id` = :p0';
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
            $obj = new BatchCategoryJournal();
            $obj->hydrate($row);
            BatchCategoryJournalPeer::addInstanceToPool($obj, (string)$key);
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
     * @return BatchCategoryJournal|BatchCategoryJournal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BatchCategoryJournal[]|mixed the list of results, formatted by the current formatter
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
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BatchCategoryJournalPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BatchCategoryJournalPeer::ID, $keys, Criteria::IN);
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
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(BatchCategoryJournalPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(BatchCategoryJournalPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatchCategoryJournalPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the batch_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBatchId(1234); // WHERE batch_id = 1234
     * $query->filterByBatchId(array(12, 34)); // WHERE batch_id IN (12, 34)
     * $query->filterByBatchId(array('min' => 12)); // WHERE batch_id >= 12
     * $query->filterByBatchId(array('max' => 12)); // WHERE batch_id <= 12
     * </code>
     *
     * @see       filterByBatch()
     *
     * @param     mixed $batchId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByBatchId($batchId = null, $comparison = null)
    {
        if (is_array($batchId)) {
            $useMinMax = false;
            if (isset($batchId['min'])) {
                $this->addUsingAlias(BatchCategoryJournalPeer::BATCH_ID, $batchId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($batchId['max'])) {
                $this->addUsingAlias(BatchCategoryJournalPeer::BATCH_ID, $batchId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatchCategoryJournalPeer::BATCH_ID, $batchId, $comparison);
    }

    /**
     * Filter the query on the category_journal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryJournalId(1234); // WHERE category_journal_id = 1234
     * $query->filterByCategoryJournalId(array(12, 34)); // WHERE category_journal_id IN (12, 34)
     * $query->filterByCategoryJournalId(array('min' => 12)); // WHERE category_journal_id >= 12
     * $query->filterByCategoryJournalId(array('max' => 12)); // WHERE category_journal_id <= 12
     * </code>
     *
     * @see       filterByCategoryJournal()
     *
     * @param     mixed $categoryJournalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByCategoryJournalId($categoryJournalId = null, $comparison = null)
    {
        if (is_array($categoryJournalId)) {
            $useMinMax = false;
            if (isset($categoryJournalId['min'])) {
                $this->addUsingAlias(
                    BatchCategoryJournalPeer::CATEGORY_JOURNAL_ID,
                    $categoryJournalId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($categoryJournalId['max'])) {
                $this->addUsingAlias(
                    BatchCategoryJournalPeer::CATEGORY_JOURNAL_ID,
                    $categoryJournalId['max'],
                    Criteria::LESS_EQUAL
                );
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatchCategoryJournalPeer::CATEGORY_JOURNAL_ID, $categoryJournalId, $comparison);
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
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(BatchCategoryJournalPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query by a related Batch object
     *
     * @param   Batch|PropelObjectCollection $batch The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BatchCategoryJournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBatch($batch, $comparison = null)
    {
        if ($batch instanceof Batch) {
            return $this
                ->addUsingAlias(BatchCategoryJournalPeer::BATCH_ID, $batch->getId(), $comparison);
        } elseif ($batch instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    BatchCategoryJournalPeer::BATCH_ID,
                    $batch->toKeyValue('PrimaryKey', 'Id'),
                    $comparison
                );
        } else {
            throw new PropelException('filterByBatch() only accepts arguments of type Batch or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Batch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function joinBatch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Batch');

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
            $this->addJoinObject($join, 'Batch');
        }

        return $this;
    }

    /**
     * Use the Batch relation Batch object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\BatchQuery A secondary query class using the current class as primary query
     */
    public function useBatchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBatch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Batch', '\CAD\TransferBundle\Model\BatchQuery');
    }

    /**
     * Filter the query by a related CategoryJournal object
     *
     * @param   CategoryJournal|PropelObjectCollection $categoryJournal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BatchCategoryJournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryJournal($categoryJournal, $comparison = null)
    {
        if ($categoryJournal instanceof CategoryJournal) {
            return $this
                ->addUsingAlias(BatchCategoryJournalPeer::CATEGORY_JOURNAL_ID, $categoryJournal->getId(), $comparison);
        } elseif ($categoryJournal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    BatchCategoryJournalPeer::CATEGORY_JOURNAL_ID,
                    $categoryJournal->toKeyValue('PrimaryKey', 'Id'),
                    $comparison
                );
        } else {
            throw new PropelException('filterByCategoryJournal() only accepts arguments of type CategoryJournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryJournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function joinCategoryJournal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryJournal');

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
            $this->addJoinObject($join, 'CategoryJournal');
        }

        return $this;
    }

    /**
     * Use the CategoryJournal relation CategoryJournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\CategoryJournalQuery A secondary query class using the current class as primary query
     */
    public function useCategoryJournalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryJournal($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'CategoryJournal',
                '\CAD\TransferBundle\Model\CategoryJournalQuery'
            );
    }

    /**
     * Exclude object from result
     *
     * @param   BatchCategoryJournal $batchCategoryJournal Object to remove from the list of results
     *
     * @return BatchCategoryJournalQuery The current query, for fluid interface
     */
    public function prune($batchCategoryJournal = null)
    {
        if ($batchCategoryJournal) {
            $this->addUsingAlias(BatchCategoryJournalPeer::ID, $batchCategoryJournal->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
