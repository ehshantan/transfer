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
use CAD\TransferBundle\Model\CategoryJournalField;
use CAD\TransferBundle\Model\CategoryJournalFieldPeer;
use CAD\TransferBundle\Model\CategoryJournalFieldQuery;
use CAD\TransferBundle\Model\CategoryJournalFieldType;
use CAD\TransferBundle\Model\UserCategoryJournalField;

/**
 * @method CategoryJournalFieldQuery orderById($order = Criteria::ASC) Order by the id column
 * @method CategoryJournalFieldQuery orderByCategoryJournalId($order = Criteria::ASC) Order by the category_journal_id column
 * @method CategoryJournalFieldQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method CategoryJournalFieldQuery orderByPostfix($order = Criteria::ASC) Order by the postfix column
 * @method CategoryJournalFieldQuery orderByCategoryJournalFieldTypeId($order = Criteria::ASC) Order by the category_journal_field_type_id column
 * @method CategoryJournalFieldQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method CategoryJournalFieldQuery orderByActive($order = Criteria::ASC) Order by the active column
 *
 * @method CategoryJournalFieldQuery groupById() Group by the id column
 * @method CategoryJournalFieldQuery groupByCategoryJournalId() Group by the category_journal_id column
 * @method CategoryJournalFieldQuery groupByName() Group by the name column
 * @method CategoryJournalFieldQuery groupByPostfix() Group by the postfix column
 * @method CategoryJournalFieldQuery groupByCategoryJournalFieldTypeId() Group by the category_journal_field_type_id column
 * @method CategoryJournalFieldQuery groupByValue() Group by the value column
 * @method CategoryJournalFieldQuery groupByActive() Group by the active column
 *
 * @method CategoryJournalFieldQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method CategoryJournalFieldQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method CategoryJournalFieldQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method CategoryJournalFieldQuery leftJoinCategoryJournalFieldType($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryJournalFieldType relation
 * @method CategoryJournalFieldQuery rightJoinCategoryJournalFieldType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryJournalFieldType relation
 * @method CategoryJournalFieldQuery innerJoinCategoryJournalFieldType($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryJournalFieldType relation
 *
 * @method CategoryJournalFieldQuery leftJoinCategoryJournal($relationAlias = null) Adds a LEFT JOIN clause to the query using the CategoryJournal relation
 * @method CategoryJournalFieldQuery rightJoinCategoryJournal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CategoryJournal relation
 * @method CategoryJournalFieldQuery innerJoinCategoryJournal($relationAlias = null) Adds a INNER JOIN clause to the query using the CategoryJournal relation
 *
 * @method CategoryJournalFieldQuery leftJoinUserCategoryJournalField($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserCategoryJournalField relation
 * @method CategoryJournalFieldQuery rightJoinUserCategoryJournalField($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserCategoryJournalField relation
 * @method CategoryJournalFieldQuery innerJoinUserCategoryJournalField($relationAlias = null) Adds a INNER JOIN clause to the query using the UserCategoryJournalField relation
 *
 * @method CategoryJournalField findOne(PropelPDO $con = null) Return the first CategoryJournalField matching the query
 * @method CategoryJournalField findOneOrCreate(PropelPDO $con = null) Return the first CategoryJournalField matching the query, or a new CategoryJournalField object populated from the query conditions when no match is found
 *
 * @method CategoryJournalField findOneByCategoryJournalId(string $category_journal_id) Return the first CategoryJournalField filtered by the category_journal_id column
 * @method CategoryJournalField findOneByName(string $name) Return the first CategoryJournalField filtered by the name column
 * @method CategoryJournalField findOneByPostfix(string $postfix) Return the first CategoryJournalField filtered by the postfix column
 * @method CategoryJournalField findOneByCategoryJournalFieldTypeId(string $category_journal_field_type_id) Return the first CategoryJournalField filtered by the category_journal_field_type_id column
 * @method CategoryJournalField findOneByValue(int $value) Return the first CategoryJournalField filtered by the value column
 * @method CategoryJournalField findOneByActive(boolean $active) Return the first CategoryJournalField filtered by the active column
 *
 * @method array findById(string $id) Return CategoryJournalField objects filtered by the id column
 * @method array findByCategoryJournalId(string $category_journal_id) Return CategoryJournalField objects filtered by the category_journal_id column
 * @method array findByName(string $name) Return CategoryJournalField objects filtered by the name column
 * @method array findByPostfix(string $postfix) Return CategoryJournalField objects filtered by the postfix column
 * @method array findByCategoryJournalFieldTypeId(string $category_journal_field_type_id) Return CategoryJournalField objects filtered by the category_journal_field_type_id column
 * @method array findByValue(int $value) Return CategoryJournalField objects filtered by the value column
 * @method array findByActive(boolean $active) Return CategoryJournalField objects filtered by the active column
 */
abstract class BaseCategoryJournalFieldQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCategoryJournalFieldQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\CategoryJournalField';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new CategoryJournalFieldQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   CategoryJournalFieldQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return CategoryJournalFieldQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof CategoryJournalFieldQuery) {
            return $criteria;
        }
        $query = new CategoryJournalFieldQuery(null, null, $modelAlias);

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
     * @return   CategoryJournalField|CategoryJournalField[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoryJournalFieldPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(CategoryJournalFieldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 CategoryJournalField A model object, or null if the key is not found
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
     * @return                 CategoryJournalField A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `category_journal_id`, `name`, `postfix`, `category_journal_field_type_id`, `value`, `active` FROM `category_journal_field` WHERE `id` = :p0';
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
            $obj = new CategoryJournalField();
            $obj->hydrate($row);
            CategoryJournalFieldPeer::addInstanceToPool($obj, (string)$key);
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
     * @return CategoryJournalField|CategoryJournalField[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|CategoryJournalField[]|mixed the list of results, formatted by the current formatter
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoryJournalFieldPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoryJournalFieldPeer::ID, $keys, Criteria::IN);
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CategoryJournalFieldPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CategoryJournalFieldPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryJournalFieldPeer::ID, $id, $comparison);
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByCategoryJournalId($categoryJournalId = null, $comparison = null)
    {
        if (is_array($categoryJournalId)) {
            $useMinMax = false;
            if (isset($categoryJournalId['min'])) {
                $this->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID,
                    $categoryJournalId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($categoryJournalId['max'])) {
                $this->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID,
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

        return $this->addUsingAlias(CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID, $categoryJournalId, $comparison);
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
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

        return $this->addUsingAlias(CategoryJournalFieldPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the postfix column
     *
     * Example usage:
     * <code>
     * $query->filterByPostfix('fooValue');   // WHERE postfix = 'fooValue'
     * $query->filterByPostfix('%fooValue%'); // WHERE postfix LIKE '%fooValue%'
     * </code>
     *
     * @param     string $postfix The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByPostfix($postfix = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($postfix)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $postfix)) {
                $postfix = str_replace('*', '%', $postfix);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoryJournalFieldPeer::POSTFIX, $postfix, $comparison);
    }

    /**
     * Filter the query on the category_journal_field_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryJournalFieldTypeId(1234); // WHERE category_journal_field_type_id = 1234
     * $query->filterByCategoryJournalFieldTypeId(array(12, 34)); // WHERE category_journal_field_type_id IN (12, 34)
     * $query->filterByCategoryJournalFieldTypeId(array('min' => 12)); // WHERE category_journal_field_type_id >= 12
     * $query->filterByCategoryJournalFieldTypeId(array('max' => 12)); // WHERE category_journal_field_type_id <= 12
     * </code>
     *
     * @see       filterByCategoryJournalFieldType()
     *
     * @param     mixed $categoryJournalFieldTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByCategoryJournalFieldTypeId($categoryJournalFieldTypeId = null, $comparison = null)
    {
        if (is_array($categoryJournalFieldTypeId)) {
            $useMinMax = false;
            if (isset($categoryJournalFieldTypeId['min'])) {
                $this->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
                    $categoryJournalFieldTypeId['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($categoryJournalFieldTypeId['max'])) {
                $this->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
                    $categoryJournalFieldTypeId['max'],
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
            CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
            $categoryJournalFieldTypeId,
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(CategoryJournalFieldPeer::VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(CategoryJournalFieldPeer::VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoryJournalFieldPeer::VALUE, $value, $comparison);
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function filterByActive($active = null, $comparison = null)
    {
        if (is_string($active)) {
            $active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(CategoryJournalFieldPeer::ACTIVE, $active, $comparison);
    }

    /**
     * Filter the query by a related CategoryJournalFieldType object
     *
     * @param   CategoryJournalFieldType|PropelObjectCollection $categoryJournalFieldType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CategoryJournalFieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryJournalFieldType($categoryJournalFieldType, $comparison = null)
    {
        if ($categoryJournalFieldType instanceof CategoryJournalFieldType) {
            return $this
                ->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
                    $categoryJournalFieldType->getId(),
                    $comparison
                );
        } elseif ($categoryJournalFieldType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_FIELD_TYPE_ID,
                    $categoryJournalFieldType->toKeyValue('PrimaryKey', 'Id'),
                    $comparison
                );
        } else {
            throw new PropelException('filterByCategoryJournalFieldType() only accepts arguments of type CategoryJournalFieldType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CategoryJournalFieldType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function joinCategoryJournalFieldType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CategoryJournalFieldType');

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
            $this->addJoinObject($join, 'CategoryJournalFieldType');
        }

        return $this;
    }

    /**
     * Use the CategoryJournalFieldType relation CategoryJournalFieldType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \CAD\TransferBundle\Model\CategoryJournalFieldTypeQuery A secondary query class using the current class as primary query
     */
    public function useCategoryJournalFieldTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategoryJournalFieldType($relationAlias, $joinType)
            ->useQuery(
                $relationAlias ? $relationAlias : 'CategoryJournalFieldType',
                '\CAD\TransferBundle\Model\CategoryJournalFieldTypeQuery'
            );
    }

    /**
     * Filter the query by a related CategoryJournal object
     *
     * @param   CategoryJournal|PropelObjectCollection $categoryJournal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 CategoryJournalFieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCategoryJournal($categoryJournal, $comparison = null)
    {
        if ($categoryJournal instanceof CategoryJournal) {
            return $this
                ->addUsingAlias(CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID, $categoryJournal->getId(), $comparison);
        } elseif ($categoryJournal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(
                    CategoryJournalFieldPeer::CATEGORY_JOURNAL_ID,
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
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
     * @return                 CategoryJournalFieldQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserCategoryJournalField($userCategoryJournalField, $comparison = null)
    {
        if ($userCategoryJournalField instanceof UserCategoryJournalField) {
            return $this
                ->addUsingAlias(
                    CategoryJournalFieldPeer::ID,
                    $userCategoryJournalField->getCategoryJournalFieldId(),
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
     * @return CategoryJournalFieldQuery The current query, for fluid interface
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
     * @param   CategoryJournalField $categoryJournalField Object to remove from the list of results
     *
     * @return CategoryJournalFieldQuery The current query, for fluid interface
     */
    public function prune($categoryJournalField = null)
    {
        if ($categoryJournalField) {
            $this->addUsingAlias(CategoryJournalFieldPeer::ID, $categoryJournalField->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
