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
use CAD\TransferBundle\Model\CategoryJournal;
use CAD\TransferBundle\Model\User;
use CAD\TransferBundle\Model\UserCategoryJournal;
use CAD\TransferBundle\Model\UserCategoryJournalField;
use CAD\TransferBundle\Model\UserCategoryJournalPeer;
use CAD\TransferBundle\Model\UserCategoryJournalQuery;

/**
 * @method UserCategoryJournalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UserCategoryJournalQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method UserCategoryJournalQuery orderByCategoryJournalId($order = Criteria::ASC) Order by the category_journal_id column
 * @method UserCategoryJournalQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method UserCategoryJournalQuery orderByChecked($order = Criteria::ASC) Order by the checked column
 * @method UserCategoryJournalQuery orderByNotified($order = Criteria::ASC) Order by the notified column
 *
 * @method UserCategoryJournalQuery groupById() Group by the id column
 * @method UserCategoryJournalQuery groupByUserId() Group by the user_id column
 * @method UserCategoryJournalQuery groupByCategoryJournalId() Group by the category_journal_id column
 * @method UserCategoryJournalQuery groupByDate() Group by the date column
 * @method UserCategoryJournalQuery groupByChecked() Group by the checked column
 * @method UserCategoryJournalQuery groupByNotified() Group by the notified column
 *
 * @method UserCategoryJournalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserCategoryJournalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserCategoryJournalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserCategoryJournalQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method UserCategoryJournalQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method UserCategoryJournalQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method UserCategoryJournalQuery leftJoinCategoryJournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryJournal relation
 * @method UserCategoryJournalQuery rightJoinCategoryJournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryJournal relation
 * @method UserCategoryJournalQuery innerJoinCategoryJournal($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryJournal relation
 *
 * @method UserCategoryJournalQuery leftJoinUserCategoryJournalField($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserCategoryJournalField relation
 * @method UserCategoryJournalQuery rightJoinUserCategoryJournalField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserCategoryJournalField relation
 * @method UserCategoryJournalQuery innerJoinUserCategoryJournalField($relationAlias = null) Adds a INNER JOIN clause to the query using the UserCategoryJournalField relation
 *
 * @method UserCategoryJournal findOne(PropelPDO $con = null) Return the first UserCategoryJournal matching the query
 * @method UserCategoryJournal findOneOrCreate(PropelPDO $con = null) Return the first UserCategoryJournal matching the query, or a new UserCategoryJournal object populated from the query conditions when no match is found
 *
 * @method UserCategoryJournal findOneByUserId(string $user_id) Return the first UserCategoryJournal filtered by the user_id column
 * @method UserCategoryJournal findOneByCategoryJournalId(string $category_journal_id) Return the first UserCategoryJournal filtered by the category_journal_id column
 * @method UserCategoryJournal findOneByDate(string $date) Return the first UserCategoryJournal filtered by the date column
 * @method UserCategoryJournal findOneByChecked(boolean $checked) Return the first UserCategoryJournal filtered by the checked column
 * @method UserCategoryJournal findOneByNotified(boolean $notified) Return the first UserCategoryJournal filtered by the notified column
 *
 * @method array findById(string $id) Return UserCategoryJournal objects filtered by the id column
 * @method array findByUserId(string $user_id) Return UserCategoryJournal objects filtered by the user_id column
 * @method array findByCategoryJournalId(string $category_journal_id) Return UserCategoryJournal objects filtered by the category_journal_id column
 * @method array findByDate(string $date) Return UserCategoryJournal objects filtered by the date column
 * @method array findByChecked(boolean $checked) Return UserCategoryJournal objects filtered by the checked column
 * @method array findByNotified(boolean $notified) Return UserCategoryJournal objects filtered by the notified column
 */
abstract class BaseUserCategoryJournalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserCategoryJournalQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\UserCategoryJournal';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserCategoryJournalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UserCategoryJournalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserCategoryJournalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserCategoryJournalQuery) {
            return $criteria;
        }
        $query = new UserCategoryJournalQuery(null, null, $modelAlias);

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
     * @return   UserCategoryJournal|UserCategoryJournal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserCategoryJournalPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserCategoryJournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UserCategoryJournal A model object, or null if the key is not found
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
     * @return                 UserCategoryJournal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `user_id`, `category_journal_id`, `date`, `checked`, `notified` FROM `user_category_journal` WHERE `id` = :p0';
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
            $obj = new UserCategoryJournal();
            $obj->hydrate($row);
            UserCategoryJournalPeer::addInstanceToPool($obj, (string)$key);
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
     * @return UserCategoryJournal|UserCategoryJournal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UserCategoryJournal[]|mixed the list of results, formatted by the current formatter
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserCategoryJournalPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserCategoryJournalPeer::ID, $keys, Criteria::IN);
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserCategoryJournalPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id >= 12
     * $query->filterByUserId(array('max' => 12)); // WHERE user_id <= 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserCategoryJournalPeer::USER_ID, $userId, $comparison);
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByCategoryJournalId($categoryJournalId = null, $comparison = null)
    {
        if (is_array($categoryJournalId)) {
            $useMinMax = false;
            if (isset($categoryJournalId['min'])) {
                $this->addUsingAlias(
                    UserCategoryJournalPeer::CATEGORY_JOURNAL_ID,
                    $categoryJournalId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($categoryJournalId['max'])) {
                $this->addUsingAlias(
                    UserCategoryJournalPeer::CATEGORY_JOURNAL_ID,
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

        return $this->addUsingAlias(UserCategoryJournalPeer::CATEGORY_JOURNAL_ID, $categoryJournalId, $comparison);
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(UserCategoryJournalPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserCategoryJournalPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the checked column
     *
     * Example usage:
     * <code>
     * $query->filterByChecked(true); // WHERE checked = true
     * $query->filterByChecked('yes'); // WHERE checked = true
     * </code>
     *
     * @param     boolean|string $checked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByChecked($checked = null, $comparison = null)
    {
        if (is_string($checked)) {
            $checked = in_array(strtolower($checked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserCategoryJournalPeer::CHECKED, $checked, $comparison);
    }

    /**
     * Filter the query on the notified column
     *
     * Example usage:
     * <code>
     * $query->filterByNotified(true); // WHERE notified = true
     * $query->filterByNotified('yes'); // WHERE notified = true
     * </code>
     *
     * @param     boolean|string $notified The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function filterByNotified($notified = null, $comparison = null)
    {
        if (is_string($notified)) {
            $notified = in_array(strtolower($notified), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(UserCategoryJournalPeer::NOTIFIED, $notified, $comparison);
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserCategoryJournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(UserCategoryJournalPeer::USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserCategoryJournalPeer::USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
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
     * Filter the query by a related CategoryJournal object
     *
     * @param   CategoryJournal|PropelObjectCollection $categoryJournal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserCategoryJournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryJournal($categoryJournal, $comparison = null)
    {
        if ($categoryJournal instanceof CategoryJournal) {
            return $this
                ->addUsingAlias(UserCategoryJournalPeer::CATEGORY_JOURNAL_ID, $categoryJournal->getId(), $comparison);
        } elseif ($categoryJournal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    UserCategoryJournalPeer::CATEGORY_JOURNAL_ID,
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
     * @return UserCategoryJournalQuery The current query, for fluid interface
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
     * Filter the query by a related UserCategoryJournalField object
     *
     * @param   UserCategoryJournalField|PropelObjectCollection $userCategoryJournalField the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UserCategoryJournalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserCategoryJournalField($userCategoryJournalField, $comparison = null)
    {
        if ($userCategoryJournalField instanceof UserCategoryJournalField) {
            return $this
                ->addUsingAlias(
                    UserCategoryJournalPeer::ID,
                    $userCategoryJournalField->getUserCategoryJournalId(),
                    $comparison
                );
        } elseif ($userCategoryJournalField instanceof PropelObjectCollection) {
            return $this
                ->useUserCategoryJournalFieldQuery()
                ->filterByPrimaryKeys($userCategoryJournalField->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUserCategoryJournalField() only accepts arguments of type UserCategoryJournalField or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserCategoryJournalField relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function joinUserCategoryJournalField($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserCategoryJournalField');

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
            $this->addJoinObject($join, 'UserCategoryJournalField');
        }

        return $this;
    }

    /**
     * Use the UserCategoryJournalField relation UserCategoryJournalField object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\UserCategoryJournalFieldQuery A secondary query class using the current class as primary query
     */
    public function useUserCategoryJournalFieldQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserCategoryJournalField($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'UserCategoryJournalField',
                '\CAD\TransferBundle\Model\UserCategoryJournalFieldQuery'
            );
    }

    /**
     * Exclude object from result
     *
     * @param   UserCategoryJournal $userCategoryJournal Object to remove from the list of results
     *
     * @return UserCategoryJournalQuery The current query, for fluid interface
     */
    public function prune($userCategoryJournal = null)
    {
        if ($userCategoryJournal) {
            $this->addUsingAlias(UserCategoryJournalPeer::ID, $userCategoryJournal->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
