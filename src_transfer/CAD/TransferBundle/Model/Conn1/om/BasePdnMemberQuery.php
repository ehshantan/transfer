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
use CAD\TransferBundle\Model\Conn1\PdnMember;
use CAD\TransferBundle\Model\Conn1\PdnMemberPeer;
use CAD\TransferBundle\Model\Conn1\PdnMemberQuery;

/**
 * @method PdnMemberQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnMemberQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PdnMemberQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method PdnMemberQuery orderByRealname($order = Criteria::ASC) Order by the realname column
 * @method PdnMemberQuery orderByAngkatan($order = Criteria::ASC) Order by the angkatan column
 * @method PdnMemberQuery orderByHall($order = Criteria::ASC) Order by the hall column
 * @method PdnMemberQuery orderByLokasi($order = Criteria::ASC) Order by the lokasi column
 * @method PdnMemberQuery orderByTelepon($order = Criteria::ASC) Order by the telepon column
 * @method PdnMemberQuery orderByHandphone($order = Criteria::ASC) Order by the handphone column
 * @method PdnMemberQuery orderByHandphone2($order = Criteria::ASC) Order by the handphone_2 column
 * @method PdnMemberQuery orderByIdMember($order = Criteria::ASC) Order by the id_member column
 * @method PdnMemberQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method PdnMemberQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 * @method PdnMemberQuery orderByLastLogin($order = Criteria::ASC) Order by the last_login column
 * @method PdnMemberQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PdnMemberQuery orderByTipeMember($order = Criteria::ASC) Order by the tipe_member column
 * @method PdnMemberQuery orderByIdKelompok($order = Criteria::ASC) Order by the id_kelompok column
 * @method PdnMemberQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method PdnMemberQuery orderByTglMasuk($order = Criteria::ASC) Order by the tgl_masuk column
 *
 * @method PdnMemberQuery groupById() Group by the id column
 * @method PdnMemberQuery groupByEmail() Group by the email column
 * @method PdnMemberQuery groupByPassword() Group by the password column
 * @method PdnMemberQuery groupByRealname() Group by the realname column
 * @method PdnMemberQuery groupByAngkatan() Group by the angkatan column
 * @method PdnMemberQuery groupByHall() Group by the hall column
 * @method PdnMemberQuery groupByLokasi() Group by the lokasi column
 * @method PdnMemberQuery groupByTelepon() Group by the telepon column
 * @method PdnMemberQuery groupByHandphone() Group by the handphone column
 * @method PdnMemberQuery groupByHandphone2() Group by the handphone_2 column
 * @method PdnMemberQuery groupByIdMember() Group by the id_member column
 * @method PdnMemberQuery groupByAlamat() Group by the alamat column
 * @method PdnMemberQuery groupByIsApproved() Group by the is_approved column
 * @method PdnMemberQuery groupByLastLogin() Group by the last_login column
 * @method PdnMemberQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PdnMemberQuery groupByTipeMember() Group by the tipe_member column
 * @method PdnMemberQuery groupByIdKelompok() Group by the id_kelompok column
 * @method PdnMemberQuery groupByType() Group by the type column
 * @method PdnMemberQuery groupByTglMasuk() Group by the tgl_masuk column
 *
 * @method PdnMemberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnMemberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnMemberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnMember findOne(PropelPDO $con = null) Return the first PdnMember matching the query
 * @method PdnMember findOneOrCreate(PropelPDO $con = null) Return the first PdnMember matching the query, or a new PdnMember object populated from the query conditions when no match is found
 *
 * @method PdnMember findOneByEmail(string $email) Return the first PdnMember filtered by the email column
 * @method PdnMember findOneByPassword(string $password) Return the first PdnMember filtered by the password column
 * @method PdnMember findOneByRealname(string $realname) Return the first PdnMember filtered by the realname column
 * @method PdnMember findOneByAngkatan(string $angkatan) Return the first PdnMember filtered by the angkatan column
 * @method PdnMember findOneByHall(string $hall) Return the first PdnMember filtered by the hall column
 * @method PdnMember findOneByLokasi(string $lokasi) Return the first PdnMember filtered by the lokasi column
 * @method PdnMember findOneByTelepon(string $telepon) Return the first PdnMember filtered by the telepon column
 * @method PdnMember findOneByHandphone(string $handphone) Return the first PdnMember filtered by the handphone column
 * @method PdnMember findOneByHandphone2(string $handphone_2) Return the first PdnMember filtered by the handphone_2 column
 * @method PdnMember findOneByIdMember(string $id_member) Return the first PdnMember filtered by the id_member column
 * @method PdnMember findOneByAlamat(string $alamat) Return the first PdnMember filtered by the alamat column
 * @method PdnMember findOneByIsApproved(int $is_approved) Return the first PdnMember filtered by the is_approved column
 * @method PdnMember findOneByLastLogin(string $last_login) Return the first PdnMember filtered by the last_login column
 * @method PdnMember findOneByJenisKelamin(int $jenis_kelamin) Return the first PdnMember filtered by the jenis_kelamin column
 * @method PdnMember findOneByTipeMember(int $tipe_member) Return the first PdnMember filtered by the tipe_member column
 * @method PdnMember findOneByIdKelompok(int $id_kelompok) Return the first PdnMember filtered by the id_kelompok column
 * @method PdnMember findOneByType(string $type) Return the first PdnMember filtered by the type column
 * @method PdnMember findOneByTglMasuk(string $tgl_masuk) Return the first PdnMember filtered by the tgl_masuk column
 *
 * @method array findById(int $id) Return PdnMember objects filtered by the id column
 * @method array findByEmail(string $email) Return PdnMember objects filtered by the email column
 * @method array findByPassword(string $password) Return PdnMember objects filtered by the password column
 * @method array findByRealname(string $realname) Return PdnMember objects filtered by the realname column
 * @method array findByAngkatan(string $angkatan) Return PdnMember objects filtered by the angkatan column
 * @method array findByHall(string $hall) Return PdnMember objects filtered by the hall column
 * @method array findByLokasi(string $lokasi) Return PdnMember objects filtered by the lokasi column
 * @method array findByTelepon(string $telepon) Return PdnMember objects filtered by the telepon column
 * @method array findByHandphone(string $handphone) Return PdnMember objects filtered by the handphone column
 * @method array findByHandphone2(string $handphone_2) Return PdnMember objects filtered by the handphone_2 column
 * @method array findByIdMember(string $id_member) Return PdnMember objects filtered by the id_member column
 * @method array findByAlamat(string $alamat) Return PdnMember objects filtered by the alamat column
 * @method array findByIsApproved(int $is_approved) Return PdnMember objects filtered by the is_approved column
 * @method array findByLastLogin(string $last_login) Return PdnMember objects filtered by the last_login column
 * @method array findByJenisKelamin(int $jenis_kelamin) Return PdnMember objects filtered by the jenis_kelamin column
 * @method array findByTipeMember(int $tipe_member) Return PdnMember objects filtered by the tipe_member column
 * @method array findByIdKelompok(int $id_kelompok) Return PdnMember objects filtered by the id_kelompok column
 * @method array findByType(string $type) Return PdnMember objects filtered by the type column
 * @method array findByTglMasuk(string $tgl_masuk) Return PdnMember objects filtered by the tgl_masuk column
 */
abstract class BasePdnMemberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnMemberQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\Conn1\\PdnMember';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnMemberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnMemberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnMemberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnMemberQuery) {
            return $criteria;
        }
        $query = new PdnMemberQuery(null, null, $modelAlias);

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
     * @return   PdnMember|PdnMember[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnMemberPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnMemberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnMember A model object, or null if the key is not found
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
     * @return                 PdnMember A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `email`, `password`, `realname`, `angkatan`, `hall`, `lokasi`, `telepon`, `handphone`, `handphone_2`, `id_member`, `alamat`, `is_approved`, `last_login`, `jenis_kelamin`, `tipe_member`, `id_kelompok`, `type`, `tgl_masuk` FROM `pdn_member` WHERE `id` = :p0';
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
            $obj = new PdnMember();
            $obj->hydrate($row);
            PdnMemberPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnMember|PdnMember[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnMember[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnMemberPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnMemberPeer::ID, $keys, Criteria::IN);
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
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnMemberPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnMemberPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the realname column
     *
     * Example usage:
     * <code>
     * $query->filterByRealname('fooValue');   // WHERE realname = 'fooValue'
     * $query->filterByRealname('%fooValue%'); // WHERE realname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $realname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByRealname($realname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($realname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $realname)) {
                $realname = str_replace('*', '%', $realname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::REALNAME, $realname, $comparison);
    }

    /**
     * Filter the query on the angkatan column
     *
     * Example usage:
     * <code>
     * $query->filterByAngkatan('fooValue');   // WHERE angkatan = 'fooValue'
     * $query->filterByAngkatan('%fooValue%'); // WHERE angkatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $angkatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByAngkatan($angkatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($angkatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $angkatan)) {
                $angkatan = str_replace('*', '%', $angkatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::ANGKATAN, $angkatan, $comparison);
    }

    /**
     * Filter the query on the hall column
     *
     * Example usage:
     * <code>
     * $query->filterByHall('fooValue');   // WHERE hall = 'fooValue'
     * $query->filterByHall('%fooValue%'); // WHERE hall LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hall The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByHall($hall = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hall)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hall)) {
                $hall = str_replace('*', '%', $hall);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::HALL, $hall, $comparison);
    }

    /**
     * Filter the query on the lokasi column
     *
     * Example usage:
     * <code>
     * $query->filterByLokasi('fooValue');   // WHERE lokasi = 'fooValue'
     * $query->filterByLokasi('%fooValue%'); // WHERE lokasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lokasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByLokasi($lokasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lokasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lokasi)) {
                $lokasi = str_replace('*', '%', $lokasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::LOKASI, $lokasi, $comparison);
    }

    /**
     * Filter the query on the telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByTelepon('fooValue');   // WHERE telepon = 'fooValue'
     * $query->filterByTelepon('%fooValue%'); // WHERE telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $telepon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByTelepon($telepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($telepon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $telepon)) {
                $telepon = str_replace('*', '%', $telepon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::TELEPON, $telepon, $comparison);
    }

    /**
     * Filter the query on the handphone column
     *
     * Example usage:
     * <code>
     * $query->filterByHandphone('fooValue');   // WHERE handphone = 'fooValue'
     * $query->filterByHandphone('%fooValue%'); // WHERE handphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $handphone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByHandphone($handphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($handphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $handphone)) {
                $handphone = str_replace('*', '%', $handphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::HANDPHONE, $handphone, $comparison);
    }

    /**
     * Filter the query on the handphone_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByHandphone2('fooValue');   // WHERE handphone_2 = 'fooValue'
     * $query->filterByHandphone2('%fooValue%'); // WHERE handphone_2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $handphone2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByHandphone2($handphone2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($handphone2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $handphone2)) {
                $handphone2 = str_replace('*', '%', $handphone2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::HANDPHONE_2, $handphone2, $comparison);
    }

    /**
     * Filter the query on the id_member column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMember('fooValue');   // WHERE id_member = 'fooValue'
     * $query->filterByIdMember('%fooValue%'); // WHERE id_member LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idMember The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByIdMember($idMember = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idMember)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idMember)) {
                $idMember = str_replace('*', '%', $idMember);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::ID_MEMBER, $idMember, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%'); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamat)) {
                $alamat = str_replace('*', '%', $alamat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::ALAMAT, $alamat, $comparison);
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
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnMemberPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnMemberPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Filter the query on the last_login column
     *
     * Example usage:
     * <code>
     * $query->filterByLastLogin('2011-03-14'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin('now'); // WHERE last_login = '2011-03-14'
     * $query->filterByLastLogin(array('max' => 'yesterday')); // WHERE last_login < '2011-03-13'
     * </code>
     *
     * @param     mixed $lastLogin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByLastLogin($lastLogin = null, $comparison = null)
    {
        if (is_array($lastLogin)) {
            $useMinMax = false;
            if (isset($lastLogin['min'])) {
                $this->addUsingAlias(PdnMemberPeer::LAST_LOGIN, $lastLogin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastLogin['max'])) {
                $this->addUsingAlias(PdnMemberPeer::LAST_LOGIN, $lastLogin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::LAST_LOGIN, $lastLogin, $comparison);
    }

    /**
     * Filter the query on the jenis_kelamin column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKelamin(1234); // WHERE jenis_kelamin = 1234
     * $query->filterByJenisKelamin(array(12, 34)); // WHERE jenis_kelamin IN (12, 34)
     * $query->filterByJenisKelamin(array('min' => 12)); // WHERE jenis_kelamin >= 12
     * $query->filterByJenisKelamin(array('max' => 12)); // WHERE jenis_kelamin <= 12
     * </code>
     *
     * @param     mixed $jenisKelamin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByJenisKelamin($jenisKelamin = null, $comparison = null)
    {
        if (is_array($jenisKelamin)) {
            $useMinMax = false;
            if (isset($jenisKelamin['min'])) {
                $this->addUsingAlias(PdnMemberPeer::JENIS_KELAMIN, $jenisKelamin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisKelamin['max'])) {
                $this->addUsingAlias(PdnMemberPeer::JENIS_KELAMIN, $jenisKelamin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the tipe_member column
     *
     * Example usage:
     * <code>
     * $query->filterByTipeMember(1234); // WHERE tipe_member = 1234
     * $query->filterByTipeMember(array(12, 34)); // WHERE tipe_member IN (12, 34)
     * $query->filterByTipeMember(array('min' => 12)); // WHERE tipe_member >= 12
     * $query->filterByTipeMember(array('max' => 12)); // WHERE tipe_member <= 12
     * </code>
     *
     * @param     mixed $tipeMember The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByTipeMember($tipeMember = null, $comparison = null)
    {
        if (is_array($tipeMember)) {
            $useMinMax = false;
            if (isset($tipeMember['min'])) {
                $this->addUsingAlias(PdnMemberPeer::TIPE_MEMBER, $tipeMember['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tipeMember['max'])) {
                $this->addUsingAlias(PdnMemberPeer::TIPE_MEMBER, $tipeMember['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::TIPE_MEMBER, $tipeMember, $comparison);
    }

    /**
     * Filter the query on the id_kelompok column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKelompok(1234); // WHERE id_kelompok = 1234
     * $query->filterByIdKelompok(array(12, 34)); // WHERE id_kelompok IN (12, 34)
     * $query->filterByIdKelompok(array('min' => 12)); // WHERE id_kelompok >= 12
     * $query->filterByIdKelompok(array('max' => 12)); // WHERE id_kelompok <= 12
     * </code>
     *
     * @param     mixed $idKelompok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByIdKelompok($idKelompok = null, $comparison = null)
    {
        if (is_array($idKelompok)) {
            $useMinMax = false;
            if (isset($idKelompok['min'])) {
                $this->addUsingAlias(PdnMemberPeer::ID_KELOMPOK, $idKelompok['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idKelompok['max'])) {
                $this->addUsingAlias(PdnMemberPeer::ID_KELOMPOK, $idKelompok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::ID_KELOMPOK, $idKelompok, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the tgl_masuk column
     *
     * Example usage:
     * <code>
     * $query->filterByTglMasuk('2011-03-14'); // WHERE tgl_masuk = '2011-03-14'
     * $query->filterByTglMasuk('now'); // WHERE tgl_masuk = '2011-03-14'
     * $query->filterByTglMasuk(array('max' => 'yesterday')); // WHERE tgl_masuk < '2011-03-13'
     * </code>
     *
     * @param     mixed $tglMasuk The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function filterByTglMasuk($tglMasuk = null, $comparison = null)
    {
        if (is_array($tglMasuk)) {
            $useMinMax = false;
            if (isset($tglMasuk['min'])) {
                $this->addUsingAlias(PdnMemberPeer::TGL_MASUK, $tglMasuk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglMasuk['max'])) {
                $this->addUsingAlias(PdnMemberPeer::TGL_MASUK, $tglMasuk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnMemberPeer::TGL_MASUK, $tglMasuk, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnMember $pdnMember Object to remove from the list of results
     *
     * @return PdnMemberQuery The current query, for fluid interface
     */
    public function prune($pdnMember = null)
    {
        if ($pdnMember) {
            $this->addUsingAlias(PdnMemberPeer::ID, $pdnMember->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
