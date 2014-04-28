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
use CAD\TransferBundle\Model\CategoryJournalField;
use CAD\TransferBundle\Model\UserCategoryJournal;
use CAD\TransferBundle\Model\UserCategoryJournalField;
use CAD\TransferBundle\Model\UserCategoryJournalFieldPeer;
use CAD\TransferBundle\Model\UserCategoryJournalFieldQuery;

/**
 * @method UserCategoryJournalFieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UserCategoryJournalFieldQuery orderByUserCategoryJournalId($order = Criteria::ASC) Order by the user_category_journal_id column
 * @method UserCategoryJournalFieldQuery orderByCategoryJournalFieldId($order = Criteria::ASC) Order by the category_journal_field_id column
 * @method UserCategoryJournalFieldQuery orderByValue($order = Criteria::ASC) Order by the value column
 *
 * @method UserCategoryJournalFieldQuery groupById() Group by the id column
 * @method UserCategoryJournalFieldQuery groupByUserCategoryJournalId() Group by the user_category_journal_id column
 * @method UserCategoryJournalFieldQuery groupByCategoryJournalFieldId() Group by the category_journal_field_id column
 * @method UserCategoryJournalFieldQuery groupByValue() Group by the value column
 *
 * @method UserCategoryJournalFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserCategoryJournalFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserCategoryJournalFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserCategoryJournalFieldQuery leftJoinCategoryJournalField($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryJournalField relation
 * @method UserCategoryJournalFieldQuery rightJoinCategoryJournalField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryJournalField relation
 * @method UserCategoryJournalFieldQuery innerJoinCategoryJournalField($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryJournalField relation
 *
 * @method UserCategoryJournalFieldQuery leftJoinUserCategoryJournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserCategoryJournal relation
 * @method UserCategoryJournalFieldQuery rightJoinUserCategoryJournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserCategoryJournal relation
 * @method UserCategoryJournalFieldQuery innerJoinUserCategoryJournal($relationAlias = null) Adds a INNER JOIN clause to the query using the UserCategoryJournal relation
 *
 * @method UserCategoryJournalField findOne(PropelPDO $con = null) Return the first UserCategoryJournalField matching the query
 * @method UserCategoryJournalField findOneOrCreate(PropelPDO $con = null) Return the first UserCategoryJournalField matching the query, or a new UserCategoryJournalField object populated from the query conditions when no match is found
 *
 * @method UserCategoryJournalField findOneByUserCategoryJournalId(string $user_category_journal_id) Return the first UserCategoryJournalField filtered by the user_category_journal_id column
 * @method UserCategoryJournalField findOneByCategoryJournalFieldId(string $category_journal_field_id) Return the first UserCategoryJournalField filtered by the category_journal_field_id column
 * @method UserCategoryJournalField findOneByValue(int $value) Return the first UserCategoryJournalField filtered by the value column
 *
 * @method array findById(string $id) Return UserCategoryJournalField objects filtered by the id column
 * @method array findByUserCategoryJournalId(string $user_category_journal_id) Return UserCategoryJournalField objects filtered by the user_category_journal_id column
 * @method array findByCategoryJournalFieldId(string $category_journal_field_id) Return UserCategoryJournalField objects filtered by the category_journal_field_id column
 * @method array findByValue(int $value) Return UserCategoryJournalField objects filtered by the value column
 */
abstract class BaseUserCategoryJournalFieldQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserCategoryJournalFieldQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\UserCategoryJournalField';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserCategoryJournalFieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UserCategoryJournalFieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserCategoryJournalFieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserCategoryJournalFieldQuery) {
            return $criteria;
        }
        $query = new UserCategoryJournalFieldQuery(null, null, $modelAlias);

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
     * @return   UserCategoryJournalField|UserCategoryJournalField[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserCategoryJournalFieldPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserCategoryJournalFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UserCategoryJournalField A model object, or null if the key is not found
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
     * @return                 UserCategoryJournalField A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `user_category_journal_id`, `category_journal_field_id`, `value` FROM `user_category_journal_field` WHERE `id` = :p0';
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
            $obj = new UserCategoryJournalField();
            $obj->hydrate($row);
            UserCategoryJournalFieldPeer::addInstanceToPool($obj, (string)$key);
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
     * @return UserCategoryJournalField|UserCategoryJournalField[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UserCategoryJournalField[]|mixed the list of results, formatted by the current formatter
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
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserCategoryJournalFieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserCategoryJournalFieldPeer::ID, $keys, Criteria::IN);
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
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserCategoryJournalFieldPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserCategoryJournalFieldPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserCategoryJournalFieldPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_category_journal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserCategoryJournalId(1234); // WHERE user_category_journal_id = 1234
     * $query->filterByUserCategoryJournalId(array(12, 34)); // WHERE user_category_journal_id IN (12, 34)
     * $query->filterByUserCategoryJournalId(array('min' => 12)); // WHERE user_category_journal_id >= 12
     * $query->filterByUserCategoryJournalId(array('max' => 12)); // WHERE user_category_journal_id <= 12
     * </code>
     *
     * @see       filterByUserCategoryJournal()
     *
     * @param     mixed $userCategoryJournalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByUserCategoryJournalId($userCategoryJournalId = null, $comparison = null)
    {
        if (is_array($userCategoryJournalId)) {
            $useMinMax = false;
            if (isset($userCategoryJournalId['min'])) {
                $this->addUsingAlias(
                    UserCategoryJournalFieldPeer::USER_CATEGORY_JOURNAL_ID,
                    $userCategoryJournalId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($userCategoryJournalId['max'])) {
                $this->addUsingAlias(
                    UserCategoryJournalFieldPeer::USER_CATEGORY_JOURNAL_ID,
                    $userCategoryJournalId['max'],
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

        return $this->addUsingAlias(
            UserCategoryJournalFieldPeer::USER_CATEGORY_JOURNAL_ID,
            $userCategoryJournalId,
            $comparison
        );
    }

    /**
     * Filter the query on the category_journal_field_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryJournalFieldId(1234); // WHERE category_journal_field_id = 1234
     * $query->filterByCategoryJournalFieldId(array(12, 34)); // WHERE category_journal_field_id IN (12, 34)
     * $query->filterByCategoryJournalFieldId(array('min' => 12)); // WHERE category_journal_field_id >= 12
     * $query->filterByCategoryJournalFieldId(array('max' => 12)); // WHERE category_journal_field_id <= 12
     * </code>
     *
     * @see       filterByCategoryJournalField()
     *
     * @param     mixed $categoryJournalFieldId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByCategoryJournalFieldId($categoryJournalFieldId = null, $comparison = null)
    {
        if (is_array($categoryJournalFieldId)) {
            $useMinMax = false;
            if (isset($categoryJournalFieldId['min'])) {
                $this->addUsingAlias(
                    UserCategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_ID,
                    $categoryJournalFieldId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($categoryJournalFieldId['max'])) {
                $this->addUsingAlias(
                    UserCategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_ID,
                    $categoryJournalFieldId['max'],
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

        return $this->addUsingAlias(
            UserCategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_ID,
            $categoryJournalFieldId,
            $comparison
        );
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value >= 12
     * $query->filterByValue(array('max' => 12)); // WHERE value <= 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(UserCategoryJournalFieldPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(UserCategoryJournalFieldPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserCategoryJournalFieldPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query by a related CategoryJournalField object
     *
     * @param   CategoryJournalField|PropelObjectCollection $categoryJournalField The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserCategoryJournalFieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryJournalField($categoryJournalField, $comparison = null)
    {
        if ($categoryJournalField instanceof CategoryJournalField) {
            return $this
                ->addUsingAlias(
                    UserCategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_ID,
                    $categoryJournalField->getId(),
                    $comparison
                );
        } elseif ($categoryJournalField instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    UserCategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_ID,
                    $categoryJournalField->toKeyValue('PrimaryKey', 'Id'),
                    $comparison
                );
        } else {
            throw new PropelException('filterByCategoryJournalField() only accepts arguments of type CategoryJournalField or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryJournalField relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function joinCategoryJournalField($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryJournalField');

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
            $this->addJoinObject($join, 'CategoryJournalField');
        }

        return $this;
    }

    /**
     * Use the CategoryJournalField relation CategoryJournalField object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\CategoryJournalFieldQuery A secondary query class using the current class as primary query
     */
    public function useCategoryJournalFieldQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryJournalField($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'CategoryJournalField',
                '\CAD\TransferBundle\Model\CategoryJournalFieldQuery'
            );
    }

    /**
     * Filter the query by a related UserCategoryJournal object
     *
     * @param   UserCategoryJournal|PropelObjectCollection $userCategoryJournal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserCategoryJournalFieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserCategoryJournal($userCategoryJournal, $comparison = null)
    {
        if ($userCategoryJournal instanceof UserCategoryJournal) {
            return $this
                ->addUsingAlias(
                    UserCategoryJournalFieldPeer::USER_CATEGORY_JOURNAL_ID,
                    $userCategoryJournal->getId(),
                    $comparison
                );
        } elseif ($userCategoryJournal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    UserCategoryJournalFieldPeer::USER_CATEGORY_JOURNAL_ID,
                    $userCategoryJournal->toKeyValue('PrimaryKey', 'Id'),
                    $comparison
                );
        } else {
            throw new PropelException('filterByUserCategoryJournal() only accepts arguments of type UserCategoryJournal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserCategoryJournal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function joinUserCategoryJournal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserCategoryJournal');

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
            $this->addJoinObject($join, 'UserCategoryJournal');
        }

        return $this;
    }

    /**
     * Use the UserCategoryJournal relation UserCategoryJournal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\UserCategoryJournalQuery A secondary query class using the current class as primary query
     */
    public function useUserCategoryJournalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserCategoryJournal($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'UserCategoryJournal',
                '\CAD\TransferBundle\Model\UserCategoryJournalQuery'
            );
    }

    /**
     * Exclude object from result
     *
     * @param   UserCategoryJournalField $userCategoryJournalField Object to remove from the list of results
     *
     * @return UserCategoryJournalFieldQuery The current query, for fluid interface
     */
    public function prune($userCategoryJournalField = null)
    {
        if ($userCategoryJournalField) {
            $this->addUsingAlias(
                UserCategoryJournalFieldPeer::ID,
                $userCategoryJournalField->getId(),
                Criteria::NOT_EQUAL
            );
        }

        return $this;
    }

}
