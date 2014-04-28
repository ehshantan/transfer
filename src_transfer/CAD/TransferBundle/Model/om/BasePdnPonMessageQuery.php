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
use CAD\TransferBundle\Model\PdnPonMessage;
use CAD\TransferBundle\Model\PdnPonMessagePeer;
use CAD\TransferBundle\Model\PdnPonMessageQuery;

/**
 * @method PdnPonMessageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnPonMessageQuery orderByPonHeaderId($order = Criteria::ASC) Order by the pon_header_id column
 * @method PdnPonMessageQuery orderByTanggal($order = Criteria::ASC) Order by the tanggal column
 * @method PdnPonMessageQuery orderByMemberId($order = Criteria::ASC) Order by the member_id column
 * @method PdnPonMessageQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method PdnPonMessageQuery orderByContentMessage($order = Criteria::ASC) Order by the content_message column
 * @method PdnPonMessageQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnPonMessageQuery groupById() Group by the id column
 * @method PdnPonMessageQuery groupByPonHeaderId() Group by the pon_header_id column
 * @method PdnPonMessageQuery groupByTanggal() Group by the tanggal column
 * @method PdnPonMessageQuery groupByMemberId() Group by the member_id column
 * @method PdnPonMessageQuery groupByTitle() Group by the title column
 * @method PdnPonMessageQuery groupByContentMessage() Group by the content_message column
 * @method PdnPonMessageQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnPonMessageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnPonMessageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnPonMessageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnPonMessage findOne(PropelPDO $con = null) Return the first PdnPonMessage matching the query
 * @method PdnPonMessage findOneOrCreate(PropelPDO $con = null) Return the first PdnPonMessage matching the query, or a new PdnPonMessage object populated from the query conditions when no match is found
 *
 * @method PdnPonMessage findOneByPonHeaderId(int $pon_header_id) Return the first PdnPonMessage filtered by the pon_header_id column
 * @method PdnPonMessage findOneByTanggal(string $tanggal) Return the first PdnPonMessage filtered by the tanggal column
 * @method PdnPonMessage findOneByMemberId(int $member_id) Return the first PdnPonMessage filtered by the member_id column
 * @method PdnPonMessage findOneByTitle(string $title) Return the first PdnPonMessage filtered by the title column
 * @method PdnPonMessage findOneByContentMessage(string $content_message) Return the first PdnPonMessage filtered by the content_message column
 * @method PdnPonMessage findOneByIsApproved(int $is_approved) Return the first PdnPonMessage filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnPonMessage objects filtered by the id column
 * @method array findByPonHeaderId(int $pon_header_id) Return PdnPonMessage objects filtered by the pon_header_id column
 * @method array findByTanggal(string $tanggal) Return PdnPonMessage objects filtered by the tanggal column
 * @method array findByMemberId(int $member_id) Return PdnPonMessage objects filtered by the member_id column
 * @method array findByTitle(string $title) Return PdnPonMessage objects filtered by the title column
 * @method array findByContentMessage(string $content_message) Return PdnPonMessage objects filtered by the content_message column
 * @method array findByIsApproved(int $is_approved) Return PdnPonMessage objects filtered by the is_approved column
 */
abstract class BasePdnPonMessageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnPonMessageQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnPonMessage';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnPonMessageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnPonMessageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnPonMessageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnPonMessageQuery) {
            return $criteria;
        }
        $query = new PdnPonMessageQuery(null, null, $modelAlias);

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
     * @return   PdnPonMessage|PdnPonMessage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnPonMessagePeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnPonMessagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnPonMessage A model object, or null if the key is not found
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
     * @return                 PdnPonMessage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `pon_header_id`, `tanggal`, `member_id`, `title`, `content_message`, `is_approved` FROM `pdn_pon_message` WHERE `id` = :p0';
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
            $obj = new PdnPonMessage();
            $obj->hydrate($row);
            PdnPonMessagePeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnPonMessage|PdnPonMessage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnPonMessage[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnPonMessagePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnPonMessagePeer::ID, $keys, Criteria::IN);
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
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnPonMessagePeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnPonMessagePeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the pon_header_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPonHeaderId(1234); // WHERE pon_header_id = 1234
     * $query->filterByPonHeaderId(array(12, 34)); // WHERE pon_header_id IN (12, 34)
     * $query->filterByPonHeaderId(array('min' => 12)); // WHERE pon_header_id >= 12
     * $query->filterByPonHeaderId(array('max' => 12)); // WHERE pon_header_id <= 12
     * </code>
     *
     * @param     mixed $ponHeaderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByPonHeaderId($ponHeaderId = null, $comparison = null)
    {
        if (is_array($ponHeaderId)) {
            $useMinMax = false;
            if (isset($ponHeaderId['min'])) {
                $this->addUsingAlias(PdnPonMessagePeer::PON_HEADER_ID, $ponHeaderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ponHeaderId['max'])) {
                $this->addUsingAlias(PdnPonMessagePeer::PON_HEADER_ID, $ponHeaderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::PON_HEADER_ID, $ponHeaderId, $comparison);
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
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByTanggal($tanggal = null, $comparison = null)
    {
        if (is_array($tanggal)) {
            $useMinMax = false;
            if (isset($tanggal['min'])) {
                $this->addUsingAlias(PdnPonMessagePeer::TANGGAL, $tanggal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggal['max'])) {
                $this->addUsingAlias(PdnPonMessagePeer::TANGGAL, $tanggal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::TANGGAL, $tanggal, $comparison);
    }

    /**
     * Filter the query on the member_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMemberId(1234); // WHERE member_id = 1234
     * $query->filterByMemberId(array(12, 34)); // WHERE member_id IN (12, 34)
     * $query->filterByMemberId(array('min' => 12)); // WHERE member_id >= 12
     * $query->filterByMemberId(array('max' => 12)); // WHERE member_id <= 12
     * </code>
     *
     * @param     mixed $memberId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByMemberId($memberId = null, $comparison = null)
    {
        if (is_array($memberId)) {
            $useMinMax = false;
            if (isset($memberId['min'])) {
                $this->addUsingAlias(PdnPonMessagePeer::MEMBER_ID, $memberId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memberId['max'])) {
                $this->addUsingAlias(PdnPonMessagePeer::MEMBER_ID, $memberId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::MEMBER_ID, $memberId, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the content_message column
     *
     * Example usage:
     * <code>
     * $query->filterByContentMessage('fooValue');   // WHERE content_message = 'fooValue'
     * $query->filterByContentMessage('%fooValue%'); // WHERE content_message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contentMessage The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByContentMessage($contentMessage = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contentMessage)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $contentMessage)) {
                $contentMessage = str_replace('*', '%', $contentMessage);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::CONTENT_MESSAGE, $contentMessage, $comparison);
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
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnPonMessagePeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnPonMessagePeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonMessagePeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnPonMessage $pdnPonMessage Object to remove from the list of results
     *
     * @return PdnPonMessageQuery The current query, for fluid interface
     */
    public function prune($pdnPonMessage = null)
    {
        if ($pdnPonMessage) {
            $this->addUsingAlias(PdnPonMessagePeer::ID, $pdnPonMessage->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
