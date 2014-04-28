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
use CAD\TransferBundle\Model\PdnPonDetail;
use CAD\TransferBundle\Model\PdnPonDetailPeer;
use CAD\TransferBundle\Model\PdnPonDetailQuery;

/**
 * @method PdnPonDetailQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PdnPonDetailQuery orderByPonHeaderId($order = Criteria::ASC) Order by the pon_header_id column
 * @method PdnPonDetailQuery orderByHariId($order = Criteria::ASC) Order by the hari_id column
 * @method PdnPonDetailQuery orderByPgYa($order = Criteria::ASC) Order by the pg_ya column
 * @method PdnPonDetailQuery orderByPgDurasi($order = Criteria::ASC) Order by the pg_durasi column
 * @method PdnPonDetailQuery orderByPgBerkesah($order = Criteria::ASC) Order by the pg_berkesah column
 * @method PdnPonDetailQuery orderByPgBerseru($order = Criteria::ASC) Order by the pg_berseru column
 * @method PdnPonDetailQuery orderByPgBerkidung($order = Criteria::ASC) Order by the pg_berkidung column
 * @method PdnPonDetailQuery orderByPgBacaDoa($order = Criteria::ASC) Order by the pg_baca_doa column
 * @method PdnPonDetailQuery orderByPgCatatan($order = Criteria::ASC) Order by the pg_catatan column
 * @method PdnPonDetailQuery orderByKtbYa($order = Criteria::ASC) Order by the ktb_ya column
 * @method PdnPonDetailQuery orderByKtbPl($order = Criteria::ASC) Order by the ktb_pl column
 * @method PdnPonDetailQuery orderByKtbPb($order = Criteria::ASC) Order by the ktb_pb column
 * @method PdnPonDetailQuery orderByKtbDurasi($order = Criteria::ASC) Order by the ktb_durasi column
 * @method PdnPonDetailQuery orderByKtbAyat($order = Criteria::ASC) Order by the ktb_ayat column
 * @method PdnPonDetailQuery orderByKtbReading($order = Criteria::ASC) Order by the ktb_reading column
 * @method PdnPonDetailQuery orderByKtbCenter($order = Criteria::ASC) Order by the ktb_center column
 * @method PdnPonDetailQuery orderByKtbSupply($order = Criteria::ASC) Order by the ktb_supply column
 * @method PdnPonDetailQuery orderByKtbCatatan($order = Criteria::ASC) Order by the ktb_catatan column
 * @method PdnPonDetailQuery orderByDoaYa($order = Criteria::ASC) Order by the doa_ya column
 * @method PdnPonDetailQuery orderByDoaDurasi($order = Criteria::ASC) Order by the doa_durasi column
 * @method PdnPonDetailQuery orderByDoaPribadi($order = Criteria::ASC) Order by the doa_pribadi column
 * @method PdnPonDetailQuery orderByDoaSyafaat($order = Criteria::ASC) Order by the doa_syafaat column
 * @method PdnPonDetailQuery orderByDoaCatatan($order = Criteria::ASC) Order by the doa_catatan column
 * @method PdnPonDetailQuery orderByRohaniYa($order = Criteria::ASC) Order by the rohani_ya column
 * @method PdnPonDetailQuery orderByRohaniJudulBuku($order = Criteria::ASC) Order by the rohani_judul_buku column
 * @method PdnPonDetailQuery orderByRohaniCatatan($order = Criteria::ASC) Order by the rohani_catatan column
 * @method PdnPonDetailQuery orderByRohaniOutline($order = Criteria::ASC) Order by the rohani_outline column
 * @method PdnPonDetailQuery orderBySidangYa($order = Criteria::ASC) Order by the sidang_ya column
 * @method PdnPonDetailQuery orderBySidangSpr($order = Criteria::ASC) Order by the sidang_spr column
 * @method PdnPonDetailQuery orderBySidangBerdoa($order = Criteria::ASC) Order by the sidang_berdoa column
 * @method PdnPonDetailQuery orderBySidangTuturSabda($order = Criteria::ASC) Order by the sidang_tutur_sabda column
 * @method PdnPonDetailQuery orderBySidangDoa($order = Criteria::ASC) Order by the sidang_doa column
 * @method PdnPonDetailQuery orderBySidangKelompok($order = Criteria::ASC) Order by the sidang_kelompok column
 * @method PdnPonDetailQuery orderByOtYa($order = Criteria::ASC) Order by the ot_ya column
 * @method PdnPonDetailQuery orderByOtTel($order = Criteria::ASC) Order by the ot_tel column
 * @method PdnPonDetailQuery orderByOtMuka($order = Criteria::ASC) Order by the ot_muka column
 * @method PdnPonDetailQuery orderByJengukDurasi($order = Criteria::ASC) Order by the jenguk_durasi column
 * @method PdnPonDetailQuery orderByJengukInjil($order = Criteria::ASC) Order by the jenguk_injil column
 * @method PdnPonDetailQuery orderByJengukRawat($order = Criteria::ASC) Order by the jenguk_rawat column
 * @method PdnPonDetailQuery orderByJengukCatatan($order = Criteria::ASC) Order by the jenguk_catatan column
 * @method PdnPonDetailQuery orderByTugasYa($order = Criteria::ASC) Order by the tugas_ya column
 * @method PdnPonDetailQuery orderByPerluasanYa($order = Criteria::ASC) Order by the perluasan_ya column
 * @method PdnPonDetailQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 *
 * @method PdnPonDetailQuery groupById() Group by the id column
 * @method PdnPonDetailQuery groupByPonHeaderId() Group by the pon_header_id column
 * @method PdnPonDetailQuery groupByHariId() Group by the hari_id column
 * @method PdnPonDetailQuery groupByPgYa() Group by the pg_ya column
 * @method PdnPonDetailQuery groupByPgDurasi() Group by the pg_durasi column
 * @method PdnPonDetailQuery groupByPgBerkesah() Group by the pg_berkesah column
 * @method PdnPonDetailQuery groupByPgBerseru() Group by the pg_berseru column
 * @method PdnPonDetailQuery groupByPgBerkidung() Group by the pg_berkidung column
 * @method PdnPonDetailQuery groupByPgBacaDoa() Group by the pg_baca_doa column
 * @method PdnPonDetailQuery groupByPgCatatan() Group by the pg_catatan column
 * @method PdnPonDetailQuery groupByKtbYa() Group by the ktb_ya column
 * @method PdnPonDetailQuery groupByKtbPl() Group by the ktb_pl column
 * @method PdnPonDetailQuery groupByKtbPb() Group by the ktb_pb column
 * @method PdnPonDetailQuery groupByKtbDurasi() Group by the ktb_durasi column
 * @method PdnPonDetailQuery groupByKtbAyat() Group by the ktb_ayat column
 * @method PdnPonDetailQuery groupByKtbReading() Group by the ktb_reading column
 * @method PdnPonDetailQuery groupByKtbCenter() Group by the ktb_center column
 * @method PdnPonDetailQuery groupByKtbSupply() Group by the ktb_supply column
 * @method PdnPonDetailQuery groupByKtbCatatan() Group by the ktb_catatan column
 * @method PdnPonDetailQuery groupByDoaYa() Group by the doa_ya column
 * @method PdnPonDetailQuery groupByDoaDurasi() Group by the doa_durasi column
 * @method PdnPonDetailQuery groupByDoaPribadi() Group by the doa_pribadi column
 * @method PdnPonDetailQuery groupByDoaSyafaat() Group by the doa_syafaat column
 * @method PdnPonDetailQuery groupByDoaCatatan() Group by the doa_catatan column
 * @method PdnPonDetailQuery groupByRohaniYa() Group by the rohani_ya column
 * @method PdnPonDetailQuery groupByRohaniJudulBuku() Group by the rohani_judul_buku column
 * @method PdnPonDetailQuery groupByRohaniCatatan() Group by the rohani_catatan column
 * @method PdnPonDetailQuery groupByRohaniOutline() Group by the rohani_outline column
 * @method PdnPonDetailQuery groupBySidangYa() Group by the sidang_ya column
 * @method PdnPonDetailQuery groupBySidangSpr() Group by the sidang_spr column
 * @method PdnPonDetailQuery groupBySidangBerdoa() Group by the sidang_berdoa column
 * @method PdnPonDetailQuery groupBySidangTuturSabda() Group by the sidang_tutur_sabda column
 * @method PdnPonDetailQuery groupBySidangDoa() Group by the sidang_doa column
 * @method PdnPonDetailQuery groupBySidangKelompok() Group by the sidang_kelompok column
 * @method PdnPonDetailQuery groupByOtYa() Group by the ot_ya column
 * @method PdnPonDetailQuery groupByOtTel() Group by the ot_tel column
 * @method PdnPonDetailQuery groupByOtMuka() Group by the ot_muka column
 * @method PdnPonDetailQuery groupByJengukDurasi() Group by the jenguk_durasi column
 * @method PdnPonDetailQuery groupByJengukInjil() Group by the jenguk_injil column
 * @method PdnPonDetailQuery groupByJengukRawat() Group by the jenguk_rawat column
 * @method PdnPonDetailQuery groupByJengukCatatan() Group by the jenguk_catatan column
 * @method PdnPonDetailQuery groupByTugasYa() Group by the tugas_ya column
 * @method PdnPonDetailQuery groupByPerluasanYa() Group by the perluasan_ya column
 * @method PdnPonDetailQuery groupByIsApproved() Group by the is_approved column
 *
 * @method PdnPonDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PdnPonDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PdnPonDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PdnPonDetail findOne(PropelPDO $con = null) Return the first PdnPonDetail matching the query
 * @method PdnPonDetail findOneOrCreate(PropelPDO $con = null) Return the first PdnPonDetail matching the query, or a new PdnPonDetail object populated from the query conditions when no match is found
 *
 * @method PdnPonDetail findOneByPonHeaderId(int $pon_header_id) Return the first PdnPonDetail filtered by the pon_header_id column
 * @method PdnPonDetail findOneByHariId(int $hari_id) Return the first PdnPonDetail filtered by the hari_id column
 * @method PdnPonDetail findOneByPgYa(int $pg_ya) Return the first PdnPonDetail filtered by the pg_ya column
 * @method PdnPonDetail findOneByPgDurasi(string $pg_durasi) Return the first PdnPonDetail filtered by the pg_durasi column
 * @method PdnPonDetail findOneByPgBerkesah(int $pg_berkesah) Return the first PdnPonDetail filtered by the pg_berkesah column
 * @method PdnPonDetail findOneByPgBerseru(int $pg_berseru) Return the first PdnPonDetail filtered by the pg_berseru column
 * @method PdnPonDetail findOneByPgBerkidung(int $pg_berkidung) Return the first PdnPonDetail filtered by the pg_berkidung column
 * @method PdnPonDetail findOneByPgBacaDoa(int $pg_baca_doa) Return the first PdnPonDetail filtered by the pg_baca_doa column
 * @method PdnPonDetail findOneByPgCatatan(string $pg_catatan) Return the first PdnPonDetail filtered by the pg_catatan column
 * @method PdnPonDetail findOneByKtbYa(int $ktb_ya) Return the first PdnPonDetail filtered by the ktb_ya column
 * @method PdnPonDetail findOneByKtbPl(int $ktb_pl) Return the first PdnPonDetail filtered by the ktb_pl column
 * @method PdnPonDetail findOneByKtbPb(int $ktb_pb) Return the first PdnPonDetail filtered by the ktb_pb column
 * @method PdnPonDetail findOneByKtbDurasi(string $ktb_durasi) Return the first PdnPonDetail filtered by the ktb_durasi column
 * @method PdnPonDetail findOneByKtbAyat(string $ktb_ayat) Return the first PdnPonDetail filtered by the ktb_ayat column
 * @method PdnPonDetail findOneByKtbReading(string $ktb_reading) Return the first PdnPonDetail filtered by the ktb_reading column
 * @method PdnPonDetail findOneByKtbCenter(string $ktb_center) Return the first PdnPonDetail filtered by the ktb_center column
 * @method PdnPonDetail findOneByKtbSupply(string $ktb_supply) Return the first PdnPonDetail filtered by the ktb_supply column
 * @method PdnPonDetail findOneByKtbCatatan(string $ktb_catatan) Return the first PdnPonDetail filtered by the ktb_catatan column
 * @method PdnPonDetail findOneByDoaYa(int $doa_ya) Return the first PdnPonDetail filtered by the doa_ya column
 * @method PdnPonDetail findOneByDoaDurasi(string $doa_durasi) Return the first PdnPonDetail filtered by the doa_durasi column
 * @method PdnPonDetail findOneByDoaPribadi(int $doa_pribadi) Return the first PdnPonDetail filtered by the doa_pribadi column
 * @method PdnPonDetail findOneByDoaSyafaat(int $doa_syafaat) Return the first PdnPonDetail filtered by the doa_syafaat column
 * @method PdnPonDetail findOneByDoaCatatan(string $doa_catatan) Return the first PdnPonDetail filtered by the doa_catatan column
 * @method PdnPonDetail findOneByRohaniYa(int $rohani_ya) Return the first PdnPonDetail filtered by the rohani_ya column
 * @method PdnPonDetail findOneByRohaniJudulBuku(string $rohani_judul_buku) Return the first PdnPonDetail filtered by the rohani_judul_buku column
 * @method PdnPonDetail findOneByRohaniCatatan(string $rohani_catatan) Return the first PdnPonDetail filtered by the rohani_catatan column
 * @method PdnPonDetail findOneByRohaniOutline(string $rohani_outline) Return the first PdnPonDetail filtered by the rohani_outline column
 * @method PdnPonDetail findOneBySidangYa(int $sidang_ya) Return the first PdnPonDetail filtered by the sidang_ya column
 * @method PdnPonDetail findOneBySidangSpr(int $sidang_spr) Return the first PdnPonDetail filtered by the sidang_spr column
 * @method PdnPonDetail findOneBySidangBerdoa(int $sidang_berdoa) Return the first PdnPonDetail filtered by the sidang_berdoa column
 * @method PdnPonDetail findOneBySidangTuturSabda(int $sidang_tutur_sabda) Return the first PdnPonDetail filtered by the sidang_tutur_sabda column
 * @method PdnPonDetail findOneBySidangDoa(int $sidang_doa) Return the first PdnPonDetail filtered by the sidang_doa column
 * @method PdnPonDetail findOneBySidangKelompok(int $sidang_kelompok) Return the first PdnPonDetail filtered by the sidang_kelompok column
 * @method PdnPonDetail findOneByOtYa(int $ot_ya) Return the first PdnPonDetail filtered by the ot_ya column
 * @method PdnPonDetail findOneByOtTel(int $ot_tel) Return the first PdnPonDetail filtered by the ot_tel column
 * @method PdnPonDetail findOneByOtMuka(int $ot_muka) Return the first PdnPonDetail filtered by the ot_muka column
 * @method PdnPonDetail findOneByJengukDurasi(string $jenguk_durasi) Return the first PdnPonDetail filtered by the jenguk_durasi column
 * @method PdnPonDetail findOneByJengukInjil(int $jenguk_injil) Return the first PdnPonDetail filtered by the jenguk_injil column
 * @method PdnPonDetail findOneByJengukRawat(int $jenguk_rawat) Return the first PdnPonDetail filtered by the jenguk_rawat column
 * @method PdnPonDetail findOneByJengukCatatan(string $jenguk_catatan) Return the first PdnPonDetail filtered by the jenguk_catatan column
 * @method PdnPonDetail findOneByTugasYa(int $tugas_ya) Return the first PdnPonDetail filtered by the tugas_ya column
 * @method PdnPonDetail findOneByPerluasanYa(int $perluasan_ya) Return the first PdnPonDetail filtered by the perluasan_ya column
 * @method PdnPonDetail findOneByIsApproved(int $is_approved) Return the first PdnPonDetail filtered by the is_approved column
 *
 * @method array findById(int $id) Return PdnPonDetail objects filtered by the id column
 * @method array findByPonHeaderId(int $pon_header_id) Return PdnPonDetail objects filtered by the pon_header_id column
 * @method array findByHariId(int $hari_id) Return PdnPonDetail objects filtered by the hari_id column
 * @method array findByPgYa(int $pg_ya) Return PdnPonDetail objects filtered by the pg_ya column
 * @method array findByPgDurasi(string $pg_durasi) Return PdnPonDetail objects filtered by the pg_durasi column
 * @method array findByPgBerkesah(int $pg_berkesah) Return PdnPonDetail objects filtered by the pg_berkesah column
 * @method array findByPgBerseru(int $pg_berseru) Return PdnPonDetail objects filtered by the pg_berseru column
 * @method array findByPgBerkidung(int $pg_berkidung) Return PdnPonDetail objects filtered by the pg_berkidung column
 * @method array findByPgBacaDoa(int $pg_baca_doa) Return PdnPonDetail objects filtered by the pg_baca_doa column
 * @method array findByPgCatatan(string $pg_catatan) Return PdnPonDetail objects filtered by the pg_catatan column
 * @method array findByKtbYa(int $ktb_ya) Return PdnPonDetail objects filtered by the ktb_ya column
 * @method array findByKtbPl(int $ktb_pl) Return PdnPonDetail objects filtered by the ktb_pl column
 * @method array findByKtbPb(int $ktb_pb) Return PdnPonDetail objects filtered by the ktb_pb column
 * @method array findByKtbDurasi(string $ktb_durasi) Return PdnPonDetail objects filtered by the ktb_durasi column
 * @method array findByKtbAyat(string $ktb_ayat) Return PdnPonDetail objects filtered by the ktb_ayat column
 * @method array findByKtbReading(string $ktb_reading) Return PdnPonDetail objects filtered by the ktb_reading column
 * @method array findByKtbCenter(string $ktb_center) Return PdnPonDetail objects filtered by the ktb_center column
 * @method array findByKtbSupply(string $ktb_supply) Return PdnPonDetail objects filtered by the ktb_supply column
 * @method array findByKtbCatatan(string $ktb_catatan) Return PdnPonDetail objects filtered by the ktb_catatan column
 * @method array findByDoaYa(int $doa_ya) Return PdnPonDetail objects filtered by the doa_ya column
 * @method array findByDoaDurasi(string $doa_durasi) Return PdnPonDetail objects filtered by the doa_durasi column
 * @method array findByDoaPribadi(int $doa_pribadi) Return PdnPonDetail objects filtered by the doa_pribadi column
 * @method array findByDoaSyafaat(int $doa_syafaat) Return PdnPonDetail objects filtered by the doa_syafaat column
 * @method array findByDoaCatatan(string $doa_catatan) Return PdnPonDetail objects filtered by the doa_catatan column
 * @method array findByRohaniYa(int $rohani_ya) Return PdnPonDetail objects filtered by the rohani_ya column
 * @method array findByRohaniJudulBuku(string $rohani_judul_buku) Return PdnPonDetail objects filtered by the rohani_judul_buku column
 * @method array findByRohaniCatatan(string $rohani_catatan) Return PdnPonDetail objects filtered by the rohani_catatan column
 * @method array findByRohaniOutline(string $rohani_outline) Return PdnPonDetail objects filtered by the rohani_outline column
 * @method array findBySidangYa(int $sidang_ya) Return PdnPonDetail objects filtered by the sidang_ya column
 * @method array findBySidangSpr(int $sidang_spr) Return PdnPonDetail objects filtered by the sidang_spr column
 * @method array findBySidangBerdoa(int $sidang_berdoa) Return PdnPonDetail objects filtered by the sidang_berdoa column
 * @method array findBySidangTuturSabda(int $sidang_tutur_sabda) Return PdnPonDetail objects filtered by the sidang_tutur_sabda column
 * @method array findBySidangDoa(int $sidang_doa) Return PdnPonDetail objects filtered by the sidang_doa column
 * @method array findBySidangKelompok(int $sidang_kelompok) Return PdnPonDetail objects filtered by the sidang_kelompok column
 * @method array findByOtYa(int $ot_ya) Return PdnPonDetail objects filtered by the ot_ya column
 * @method array findByOtTel(int $ot_tel) Return PdnPonDetail objects filtered by the ot_tel column
 * @method array findByOtMuka(int $ot_muka) Return PdnPonDetail objects filtered by the ot_muka column
 * @method array findByJengukDurasi(string $jenguk_durasi) Return PdnPonDetail objects filtered by the jenguk_durasi column
 * @method array findByJengukInjil(int $jenguk_injil) Return PdnPonDetail objects filtered by the jenguk_injil column
 * @method array findByJengukRawat(int $jenguk_rawat) Return PdnPonDetail objects filtered by the jenguk_rawat column
 * @method array findByJengukCatatan(string $jenguk_catatan) Return PdnPonDetail objects filtered by the jenguk_catatan column
 * @method array findByTugasYa(int $tugas_ya) Return PdnPonDetail objects filtered by the tugas_ya column
 * @method array findByPerluasanYa(int $perluasan_ya) Return PdnPonDetail objects filtered by the perluasan_ya column
 * @method array findByIsApproved(int $is_approved) Return PdnPonDetail objects filtered by the is_approved column
 */
abstract class BasePdnPonDetailQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePdnPonDetailQuery object.
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
            $modelName = 'CAD\\TransferBundle\\Model\\PdnPonDetail';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PdnPonDetailQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PdnPonDetailQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PdnPonDetailQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PdnPonDetailQuery) {
            return $criteria;
        }
        $query = new PdnPonDetailQuery(null, null, $modelAlias);

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
     * @return   PdnPonDetail|PdnPonDetail[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PdnPonDetailPeer::getInstanceFromPool((string)$key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PdnPonDetailPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PdnPonDetail A model object, or null if the key is not found
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
     * @return                 PdnPonDetail A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `pon_header_id`, `hari_id`, `pg_ya`, `pg_durasi`, `pg_berkesah`, `pg_berseru`, `pg_berkidung`, `pg_baca_doa`, `pg_catatan`, `ktb_ya`, `ktb_pl`, `ktb_pb`, `ktb_durasi`, `ktb_ayat`, `ktb_reading`, `ktb_center`, `ktb_supply`, `ktb_catatan`, `doa_ya`, `doa_durasi`, `doa_pribadi`, `doa_syafaat`, `doa_catatan`, `rohani_ya`, `rohani_judul_buku`, `rohani_catatan`, `rohani_outline`, `sidang_ya`, `sidang_spr`, `sidang_berdoa`, `sidang_tutur_sabda`, `sidang_doa`, `sidang_kelompok`, `ot_ya`, `ot_tel`, `ot_muka`, `jenguk_durasi`, `jenguk_injil`, `jenguk_rawat`, `jenguk_catatan`, `tugas_ya`, `perluasan_ya`, `is_approved` FROM `pdn_pon_detail` WHERE `id` = :p0';
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
            $obj = new PdnPonDetail();
            $obj->hydrate($row);
            PdnPonDetailPeer::addInstanceToPool($obj, (string)$key);
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
     * @return PdnPonDetail|PdnPonDetail[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PdnPonDetail[]|mixed the list of results, formatted by the current formatter
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
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PdnPonDetailPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PdnPonDetailPeer::ID, $keys, Criteria::IN);
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
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::ID, $id, $comparison);
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
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPonHeaderId($ponHeaderId = null, $comparison = null)
    {
        if (is_array($ponHeaderId)) {
            $useMinMax = false;
            if (isset($ponHeaderId['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PON_HEADER_ID, $ponHeaderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ponHeaderId['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PON_HEADER_ID, $ponHeaderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PON_HEADER_ID, $ponHeaderId, $comparison);
    }

    /**
     * Filter the query on the hari_id column
     *
     * Example usage:
     * <code>
     * $query->filterByHariId(1234); // WHERE hari_id = 1234
     * $query->filterByHariId(array(12, 34)); // WHERE hari_id IN (12, 34)
     * $query->filterByHariId(array('min' => 12)); // WHERE hari_id >= 12
     * $query->filterByHariId(array('max' => 12)); // WHERE hari_id <= 12
     * </code>
     *
     * @param     mixed $hariId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByHariId($hariId = null, $comparison = null)
    {
        if (is_array($hariId)) {
            $useMinMax = false;
            if (isset($hariId['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::HARI_ID, $hariId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($hariId['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::HARI_ID, $hariId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::HARI_ID, $hariId, $comparison);
    }

    /**
     * Filter the query on the pg_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByPgYa(1234); // WHERE pg_ya = 1234
     * $query->filterByPgYa(array(12, 34)); // WHERE pg_ya IN (12, 34)
     * $query->filterByPgYa(array('min' => 12)); // WHERE pg_ya >= 12
     * $query->filterByPgYa(array('max' => 12)); // WHERE pg_ya <= 12
     * </code>
     *
     * @param     mixed $pgYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgYa($pgYa = null, $comparison = null)
    {
        if (is_array($pgYa)) {
            $useMinMax = false;
            if (isset($pgYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_YA, $pgYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pgYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_YA, $pgYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_YA, $pgYa, $comparison);
    }

    /**
     * Filter the query on the pg_durasi column
     *
     * Example usage:
     * <code>
     * $query->filterByPgDurasi('fooValue');   // WHERE pg_durasi = 'fooValue'
     * $query->filterByPgDurasi('%fooValue%'); // WHERE pg_durasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pgDurasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgDurasi($pgDurasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pgDurasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pgDurasi)) {
                $pgDurasi = str_replace('*', '%', $pgDurasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_DURASI, $pgDurasi, $comparison);
    }

    /**
     * Filter the query on the pg_berkesah column
     *
     * Example usage:
     * <code>
     * $query->filterByPgBerkesah(1234); // WHERE pg_berkesah = 1234
     * $query->filterByPgBerkesah(array(12, 34)); // WHERE pg_berkesah IN (12, 34)
     * $query->filterByPgBerkesah(array('min' => 12)); // WHERE pg_berkesah >= 12
     * $query->filterByPgBerkesah(array('max' => 12)); // WHERE pg_berkesah <= 12
     * </code>
     *
     * @param     mixed $pgBerkesah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgBerkesah($pgBerkesah = null, $comparison = null)
    {
        if (is_array($pgBerkesah)) {
            $useMinMax = false;
            if (isset($pgBerkesah['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERKESAH, $pgBerkesah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pgBerkesah['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERKESAH, $pgBerkesah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_BERKESAH, $pgBerkesah, $comparison);
    }

    /**
     * Filter the query on the pg_berseru column
     *
     * Example usage:
     * <code>
     * $query->filterByPgBerseru(1234); // WHERE pg_berseru = 1234
     * $query->filterByPgBerseru(array(12, 34)); // WHERE pg_berseru IN (12, 34)
     * $query->filterByPgBerseru(array('min' => 12)); // WHERE pg_berseru >= 12
     * $query->filterByPgBerseru(array('max' => 12)); // WHERE pg_berseru <= 12
     * </code>
     *
     * @param     mixed $pgBerseru The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgBerseru($pgBerseru = null, $comparison = null)
    {
        if (is_array($pgBerseru)) {
            $useMinMax = false;
            if (isset($pgBerseru['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERSERU, $pgBerseru['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pgBerseru['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERSERU, $pgBerseru['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_BERSERU, $pgBerseru, $comparison);
    }

    /**
     * Filter the query on the pg_berkidung column
     *
     * Example usage:
     * <code>
     * $query->filterByPgBerkidung(1234); // WHERE pg_berkidung = 1234
     * $query->filterByPgBerkidung(array(12, 34)); // WHERE pg_berkidung IN (12, 34)
     * $query->filterByPgBerkidung(array('min' => 12)); // WHERE pg_berkidung >= 12
     * $query->filterByPgBerkidung(array('max' => 12)); // WHERE pg_berkidung <= 12
     * </code>
     *
     * @param     mixed $pgBerkidung The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgBerkidung($pgBerkidung = null, $comparison = null)
    {
        if (is_array($pgBerkidung)) {
            $useMinMax = false;
            if (isset($pgBerkidung['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERKIDUNG, $pgBerkidung['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pgBerkidung['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BERKIDUNG, $pgBerkidung['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_BERKIDUNG, $pgBerkidung, $comparison);
    }

    /**
     * Filter the query on the pg_baca_doa column
     *
     * Example usage:
     * <code>
     * $query->filterByPgBacaDoa(1234); // WHERE pg_baca_doa = 1234
     * $query->filterByPgBacaDoa(array(12, 34)); // WHERE pg_baca_doa IN (12, 34)
     * $query->filterByPgBacaDoa(array('min' => 12)); // WHERE pg_baca_doa >= 12
     * $query->filterByPgBacaDoa(array('max' => 12)); // WHERE pg_baca_doa <= 12
     * </code>
     *
     * @param     mixed $pgBacaDoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgBacaDoa($pgBacaDoa = null, $comparison = null)
    {
        if (is_array($pgBacaDoa)) {
            $useMinMax = false;
            if (isset($pgBacaDoa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BACA_DOA, $pgBacaDoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pgBacaDoa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PG_BACA_DOA, $pgBacaDoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_BACA_DOA, $pgBacaDoa, $comparison);
    }

    /**
     * Filter the query on the pg_catatan column
     *
     * Example usage:
     * <code>
     * $query->filterByPgCatatan('fooValue');   // WHERE pg_catatan = 'fooValue'
     * $query->filterByPgCatatan('%fooValue%'); // WHERE pg_catatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pgCatatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPgCatatan($pgCatatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pgCatatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pgCatatan)) {
                $pgCatatan = str_replace('*', '%', $pgCatatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PG_CATATAN, $pgCatatan, $comparison);
    }

    /**
     * Filter the query on the ktb_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbYa(1234); // WHERE ktb_ya = 1234
     * $query->filterByKtbYa(array(12, 34)); // WHERE ktb_ya IN (12, 34)
     * $query->filterByKtbYa(array('min' => 12)); // WHERE ktb_ya >= 12
     * $query->filterByKtbYa(array('max' => 12)); // WHERE ktb_ya <= 12
     * </code>
     *
     * @param     mixed $ktbYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbYa($ktbYa = null, $comparison = null)
    {
        if (is_array($ktbYa)) {
            $useMinMax = false;
            if (isset($ktbYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_YA, $ktbYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ktbYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_YA, $ktbYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_YA, $ktbYa, $comparison);
    }

    /**
     * Filter the query on the ktb_pl column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbPl(1234); // WHERE ktb_pl = 1234
     * $query->filterByKtbPl(array(12, 34)); // WHERE ktb_pl IN (12, 34)
     * $query->filterByKtbPl(array('min' => 12)); // WHERE ktb_pl >= 12
     * $query->filterByKtbPl(array('max' => 12)); // WHERE ktb_pl <= 12
     * </code>
     *
     * @param     mixed $ktbPl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbPl($ktbPl = null, $comparison = null)
    {
        if (is_array($ktbPl)) {
            $useMinMax = false;
            if (isset($ktbPl['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_PL, $ktbPl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ktbPl['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_PL, $ktbPl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_PL, $ktbPl, $comparison);
    }

    /**
     * Filter the query on the ktb_pb column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbPb(1234); // WHERE ktb_pb = 1234
     * $query->filterByKtbPb(array(12, 34)); // WHERE ktb_pb IN (12, 34)
     * $query->filterByKtbPb(array('min' => 12)); // WHERE ktb_pb >= 12
     * $query->filterByKtbPb(array('max' => 12)); // WHERE ktb_pb <= 12
     * </code>
     *
     * @param     mixed $ktbPb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbPb($ktbPb = null, $comparison = null)
    {
        if (is_array($ktbPb)) {
            $useMinMax = false;
            if (isset($ktbPb['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_PB, $ktbPb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ktbPb['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::KTB_PB, $ktbPb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_PB, $ktbPb, $comparison);
    }

    /**
     * Filter the query on the ktb_durasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbDurasi('fooValue');   // WHERE ktb_durasi = 'fooValue'
     * $query->filterByKtbDurasi('%fooValue%'); // WHERE ktb_durasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbDurasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbDurasi($ktbDurasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbDurasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbDurasi)) {
                $ktbDurasi = str_replace('*', '%', $ktbDurasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_DURASI, $ktbDurasi, $comparison);
    }

    /**
     * Filter the query on the ktb_ayat column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbAyat('fooValue');   // WHERE ktb_ayat = 'fooValue'
     * $query->filterByKtbAyat('%fooValue%'); // WHERE ktb_ayat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbAyat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbAyat($ktbAyat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbAyat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbAyat)) {
                $ktbAyat = str_replace('*', '%', $ktbAyat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_AYAT, $ktbAyat, $comparison);
    }

    /**
     * Filter the query on the ktb_reading column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbReading('fooValue');   // WHERE ktb_reading = 'fooValue'
     * $query->filterByKtbReading('%fooValue%'); // WHERE ktb_reading LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbReading The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbReading($ktbReading = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbReading)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbReading)) {
                $ktbReading = str_replace('*', '%', $ktbReading);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_READING, $ktbReading, $comparison);
    }

    /**
     * Filter the query on the ktb_center column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbCenter('fooValue');   // WHERE ktb_center = 'fooValue'
     * $query->filterByKtbCenter('%fooValue%'); // WHERE ktb_center LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbCenter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbCenter($ktbCenter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbCenter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbCenter)) {
                $ktbCenter = str_replace('*', '%', $ktbCenter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_CENTER, $ktbCenter, $comparison);
    }

    /**
     * Filter the query on the ktb_supply column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbSupply('fooValue');   // WHERE ktb_supply = 'fooValue'
     * $query->filterByKtbSupply('%fooValue%'); // WHERE ktb_supply LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbSupply The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbSupply($ktbSupply = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbSupply)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbSupply)) {
                $ktbSupply = str_replace('*', '%', $ktbSupply);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_SUPPLY, $ktbSupply, $comparison);
    }

    /**
     * Filter the query on the ktb_catatan column
     *
     * Example usage:
     * <code>
     * $query->filterByKtbCatatan('fooValue');   // WHERE ktb_catatan = 'fooValue'
     * $query->filterByKtbCatatan('%fooValue%'); // WHERE ktb_catatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ktbCatatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByKtbCatatan($ktbCatatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ktbCatatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ktbCatatan)) {
                $ktbCatatan = str_replace('*', '%', $ktbCatatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::KTB_CATATAN, $ktbCatatan, $comparison);
    }

    /**
     * Filter the query on the doa_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaYa(1234); // WHERE doa_ya = 1234
     * $query->filterByDoaYa(array(12, 34)); // WHERE doa_ya IN (12, 34)
     * $query->filterByDoaYa(array('min' => 12)); // WHERE doa_ya >= 12
     * $query->filterByDoaYa(array('max' => 12)); // WHERE doa_ya <= 12
     * </code>
     *
     * @param     mixed $doaYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByDoaYa($doaYa = null, $comparison = null)
    {
        if (is_array($doaYa)) {
            $useMinMax = false;
            if (isset($doaYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_YA, $doaYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doaYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_YA, $doaYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::DOA_YA, $doaYa, $comparison);
    }

    /**
     * Filter the query on the doa_durasi column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaDurasi('fooValue');   // WHERE doa_durasi = 'fooValue'
     * $query->filterByDoaDurasi('%fooValue%'); // WHERE doa_durasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doaDurasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByDoaDurasi($doaDurasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doaDurasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $doaDurasi)) {
                $doaDurasi = str_replace('*', '%', $doaDurasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::DOA_DURASI, $doaDurasi, $comparison);
    }

    /**
     * Filter the query on the doa_pribadi column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaPribadi(1234); // WHERE doa_pribadi = 1234
     * $query->filterByDoaPribadi(array(12, 34)); // WHERE doa_pribadi IN (12, 34)
     * $query->filterByDoaPribadi(array('min' => 12)); // WHERE doa_pribadi >= 12
     * $query->filterByDoaPribadi(array('max' => 12)); // WHERE doa_pribadi <= 12
     * </code>
     *
     * @param     mixed $doaPribadi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByDoaPribadi($doaPribadi = null, $comparison = null)
    {
        if (is_array($doaPribadi)) {
            $useMinMax = false;
            if (isset($doaPribadi['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_PRIBADI, $doaPribadi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doaPribadi['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_PRIBADI, $doaPribadi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::DOA_PRIBADI, $doaPribadi, $comparison);
    }

    /**
     * Filter the query on the doa_syafaat column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaSyafaat(1234); // WHERE doa_syafaat = 1234
     * $query->filterByDoaSyafaat(array(12, 34)); // WHERE doa_syafaat IN (12, 34)
     * $query->filterByDoaSyafaat(array('min' => 12)); // WHERE doa_syafaat >= 12
     * $query->filterByDoaSyafaat(array('max' => 12)); // WHERE doa_syafaat <= 12
     * </code>
     *
     * @param     mixed $doaSyafaat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByDoaSyafaat($doaSyafaat = null, $comparison = null)
    {
        if (is_array($doaSyafaat)) {
            $useMinMax = false;
            if (isset($doaSyafaat['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_SYAFAAT, $doaSyafaat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($doaSyafaat['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::DOA_SYAFAAT, $doaSyafaat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::DOA_SYAFAAT, $doaSyafaat, $comparison);
    }

    /**
     * Filter the query on the doa_catatan column
     *
     * Example usage:
     * <code>
     * $query->filterByDoaCatatan('fooValue');   // WHERE doa_catatan = 'fooValue'
     * $query->filterByDoaCatatan('%fooValue%'); // WHERE doa_catatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $doaCatatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByDoaCatatan($doaCatatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($doaCatatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $doaCatatan)) {
                $doaCatatan = str_replace('*', '%', $doaCatatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::DOA_CATATAN, $doaCatatan, $comparison);
    }

    /**
     * Filter the query on the rohani_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniYa(1234); // WHERE rohani_ya = 1234
     * $query->filterByRohaniYa(array(12, 34)); // WHERE rohani_ya IN (12, 34)
     * $query->filterByRohaniYa(array('min' => 12)); // WHERE rohani_ya >= 12
     * $query->filterByRohaniYa(array('max' => 12)); // WHERE rohani_ya <= 12
     * </code>
     *
     * @param     mixed $rohaniYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByRohaniYa($rohaniYa = null, $comparison = null)
    {
        if (is_array($rohaniYa)) {
            $useMinMax = false;
            if (isset($rohaniYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::ROHANI_YA, $rohaniYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rohaniYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::ROHANI_YA, $rohaniYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::ROHANI_YA, $rohaniYa, $comparison);
    }

    /**
     * Filter the query on the rohani_judul_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniJudulBuku('fooValue');   // WHERE rohani_judul_buku = 'fooValue'
     * $query->filterByRohaniJudulBuku('%fooValue%'); // WHERE rohani_judul_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rohaniJudulBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByRohaniJudulBuku($rohaniJudulBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rohaniJudulBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rohaniJudulBuku)) {
                $rohaniJudulBuku = str_replace('*', '%', $rohaniJudulBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::ROHANI_JUDUL_BUKU, $rohaniJudulBuku, $comparison);
    }

    /**
     * Filter the query on the rohani_catatan column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniCatatan('fooValue');   // WHERE rohani_catatan = 'fooValue'
     * $query->filterByRohaniCatatan('%fooValue%'); // WHERE rohani_catatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rohaniCatatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByRohaniCatatan($rohaniCatatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rohaniCatatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rohaniCatatan)) {
                $rohaniCatatan = str_replace('*', '%', $rohaniCatatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::ROHANI_CATATAN, $rohaniCatatan, $comparison);
    }

    /**
     * Filter the query on the rohani_outline column
     *
     * Example usage:
     * <code>
     * $query->filterByRohaniOutline('fooValue');   // WHERE rohani_outline = 'fooValue'
     * $query->filterByRohaniOutline('%fooValue%'); // WHERE rohani_outline LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rohaniOutline The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByRohaniOutline($rohaniOutline = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rohaniOutline)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rohaniOutline)) {
                $rohaniOutline = str_replace('*', '%', $rohaniOutline);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::ROHANI_OUTLINE, $rohaniOutline, $comparison);
    }

    /**
     * Filter the query on the sidang_ya column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangYa(1234); // WHERE sidang_ya = 1234
     * $query->filterBySidangYa(array(12, 34)); // WHERE sidang_ya IN (12, 34)
     * $query->filterBySidangYa(array('min' => 12)); // WHERE sidang_ya >= 12
     * $query->filterBySidangYa(array('max' => 12)); // WHERE sidang_ya <= 12
     * </code>
     *
     * @param     mixed $sidangYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangYa($sidangYa = null, $comparison = null)
    {
        if (is_array($sidangYa)) {
            $useMinMax = false;
            if (isset($sidangYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_YA, $sidangYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sidangYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_YA, $sidangYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_YA, $sidangYa, $comparison);
    }

    /**
     * Filter the query on the sidang_spr column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangSpr(1234); // WHERE sidang_spr = 1234
     * $query->filterBySidangSpr(array(12, 34)); // WHERE sidang_spr IN (12, 34)
     * $query->filterBySidangSpr(array('min' => 12)); // WHERE sidang_spr >= 12
     * $query->filterBySidangSpr(array('max' => 12)); // WHERE sidang_spr <= 12
     * </code>
     *
     * @param     mixed $sidangSpr The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangSpr($sidangSpr = null, $comparison = null)
    {
        if (is_array($sidangSpr)) {
            $useMinMax = false;
            if (isset($sidangSpr['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_SPR, $sidangSpr['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sidangSpr['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_SPR, $sidangSpr['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_SPR, $sidangSpr, $comparison);
    }

    /**
     * Filter the query on the sidang_berdoa column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangBerdoa(1234); // WHERE sidang_berdoa = 1234
     * $query->filterBySidangBerdoa(array(12, 34)); // WHERE sidang_berdoa IN (12, 34)
     * $query->filterBySidangBerdoa(array('min' => 12)); // WHERE sidang_berdoa >= 12
     * $query->filterBySidangBerdoa(array('max' => 12)); // WHERE sidang_berdoa <= 12
     * </code>
     *
     * @param     mixed $sidangBerdoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangBerdoa($sidangBerdoa = null, $comparison = null)
    {
        if (is_array($sidangBerdoa)) {
            $useMinMax = false;
            if (isset($sidangBerdoa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_BERDOA, $sidangBerdoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sidangBerdoa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_BERDOA, $sidangBerdoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_BERDOA, $sidangBerdoa, $comparison);
    }

    /**
     * Filter the query on the sidang_tutur_sabda column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangTuturSabda(1234); // WHERE sidang_tutur_sabda = 1234
     * $query->filterBySidangTuturSabda(array(12, 34)); // WHERE sidang_tutur_sabda IN (12, 34)
     * $query->filterBySidangTuturSabda(array('min' => 12)); // WHERE sidang_tutur_sabda >= 12
     * $query->filterBySidangTuturSabda(array('max' => 12)); // WHERE sidang_tutur_sabda <= 12
     * </code>
     *
     * @param     mixed $sidangTuturSabda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangTuturSabda($sidangTuturSabda = null, $comparison = null)
    {
        if (is_array($sidangTuturSabda)) {
            $useMinMax = false;
            if (isset($sidangTuturSabda['min'])) {
                $this->addUsingAlias(
                    PdnPonDetailPeer::SIDANG_TUTUR_SABDA,
                    $sidangTuturSabda['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($sidangTuturSabda['max'])) {
                $this->addUsingAlias(
                    PdnPonDetailPeer::SIDANG_TUTUR_SABDA,
                    $sidangTuturSabda['max'],
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

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_TUTUR_SABDA, $sidangTuturSabda, $comparison);
    }

    /**
     * Filter the query on the sidang_doa column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangDoa(1234); // WHERE sidang_doa = 1234
     * $query->filterBySidangDoa(array(12, 34)); // WHERE sidang_doa IN (12, 34)
     * $query->filterBySidangDoa(array('min' => 12)); // WHERE sidang_doa >= 12
     * $query->filterBySidangDoa(array('max' => 12)); // WHERE sidang_doa <= 12
     * </code>
     *
     * @param     mixed $sidangDoa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangDoa($sidangDoa = null, $comparison = null)
    {
        if (is_array($sidangDoa)) {
            $useMinMax = false;
            if (isset($sidangDoa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_DOA, $sidangDoa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sidangDoa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_DOA, $sidangDoa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_DOA, $sidangDoa, $comparison);
    }

    /**
     * Filter the query on the sidang_kelompok column
     *
     * Example usage:
     * <code>
     * $query->filterBySidangKelompok(1234); // WHERE sidang_kelompok = 1234
     * $query->filterBySidangKelompok(array(12, 34)); // WHERE sidang_kelompok IN (12, 34)
     * $query->filterBySidangKelompok(array('min' => 12)); // WHERE sidang_kelompok >= 12
     * $query->filterBySidangKelompok(array('max' => 12)); // WHERE sidang_kelompok <= 12
     * </code>
     *
     * @param     mixed $sidangKelompok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterBySidangKelompok($sidangKelompok = null, $comparison = null)
    {
        if (is_array($sidangKelompok)) {
            $useMinMax = false;
            if (isset($sidangKelompok['min'])) {
                $this->addUsingAlias(
                    PdnPonDetailPeer::SIDANG_KELOMPOK,
                    $sidangKelompok['min'],
                    Criteria::GREATER_EQUAL
                );
                $useMinMax = true;
            }
            if (isset($sidangKelompok['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::SIDANG_KELOMPOK, $sidangKelompok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::SIDANG_KELOMPOK, $sidangKelompok, $comparison);
    }

    /**
     * Filter the query on the ot_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByOtYa(1234); // WHERE ot_ya = 1234
     * $query->filterByOtYa(array(12, 34)); // WHERE ot_ya IN (12, 34)
     * $query->filterByOtYa(array('min' => 12)); // WHERE ot_ya >= 12
     * $query->filterByOtYa(array('max' => 12)); // WHERE ot_ya <= 12
     * </code>
     *
     * @param     mixed $otYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByOtYa($otYa = null, $comparison = null)
    {
        if (is_array($otYa)) {
            $useMinMax = false;
            if (isset($otYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_YA, $otYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($otYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_YA, $otYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::OT_YA, $otYa, $comparison);
    }

    /**
     * Filter the query on the ot_tel column
     *
     * Example usage:
     * <code>
     * $query->filterByOtTel(1234); // WHERE ot_tel = 1234
     * $query->filterByOtTel(array(12, 34)); // WHERE ot_tel IN (12, 34)
     * $query->filterByOtTel(array('min' => 12)); // WHERE ot_tel >= 12
     * $query->filterByOtTel(array('max' => 12)); // WHERE ot_tel <= 12
     * </code>
     *
     * @param     mixed $otTel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByOtTel($otTel = null, $comparison = null)
    {
        if (is_array($otTel)) {
            $useMinMax = false;
            if (isset($otTel['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_TEL, $otTel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($otTel['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_TEL, $otTel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::OT_TEL, $otTel, $comparison);
    }

    /**
     * Filter the query on the ot_muka column
     *
     * Example usage:
     * <code>
     * $query->filterByOtMuka(1234); // WHERE ot_muka = 1234
     * $query->filterByOtMuka(array(12, 34)); // WHERE ot_muka IN (12, 34)
     * $query->filterByOtMuka(array('min' => 12)); // WHERE ot_muka >= 12
     * $query->filterByOtMuka(array('max' => 12)); // WHERE ot_muka <= 12
     * </code>
     *
     * @param     mixed $otMuka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByOtMuka($otMuka = null, $comparison = null)
    {
        if (is_array($otMuka)) {
            $useMinMax = false;
            if (isset($otMuka['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_MUKA, $otMuka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($otMuka['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::OT_MUKA, $otMuka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::OT_MUKA, $otMuka, $comparison);
    }

    /**
     * Filter the query on the jenguk_durasi column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukDurasi('fooValue');   // WHERE jenguk_durasi = 'fooValue'
     * $query->filterByJengukDurasi('%fooValue%'); // WHERE jenguk_durasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jengukDurasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByJengukDurasi($jengukDurasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jengukDurasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jengukDurasi)) {
                $jengukDurasi = str_replace('*', '%', $jengukDurasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::JENGUK_DURASI, $jengukDurasi, $comparison);
    }

    /**
     * Filter the query on the jenguk_injil column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukInjil(1234); // WHERE jenguk_injil = 1234
     * $query->filterByJengukInjil(array(12, 34)); // WHERE jenguk_injil IN (12, 34)
     * $query->filterByJengukInjil(array('min' => 12)); // WHERE jenguk_injil >= 12
     * $query->filterByJengukInjil(array('max' => 12)); // WHERE jenguk_injil <= 12
     * </code>
     *
     * @param     mixed $jengukInjil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByJengukInjil($jengukInjil = null, $comparison = null)
    {
        if (is_array($jengukInjil)) {
            $useMinMax = false;
            if (isset($jengukInjil['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::JENGUK_INJIL, $jengukInjil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jengukInjil['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::JENGUK_INJIL, $jengukInjil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::JENGUK_INJIL, $jengukInjil, $comparison);
    }

    /**
     * Filter the query on the jenguk_rawat column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukRawat(1234); // WHERE jenguk_rawat = 1234
     * $query->filterByJengukRawat(array(12, 34)); // WHERE jenguk_rawat IN (12, 34)
     * $query->filterByJengukRawat(array('min' => 12)); // WHERE jenguk_rawat >= 12
     * $query->filterByJengukRawat(array('max' => 12)); // WHERE jenguk_rawat <= 12
     * </code>
     *
     * @param     mixed $jengukRawat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByJengukRawat($jengukRawat = null, $comparison = null)
    {
        if (is_array($jengukRawat)) {
            $useMinMax = false;
            if (isset($jengukRawat['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::JENGUK_RAWAT, $jengukRawat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jengukRawat['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::JENGUK_RAWAT, $jengukRawat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::JENGUK_RAWAT, $jengukRawat, $comparison);
    }

    /**
     * Filter the query on the jenguk_catatan column
     *
     * Example usage:
     * <code>
     * $query->filterByJengukCatatan('fooValue');   // WHERE jenguk_catatan = 'fooValue'
     * $query->filterByJengukCatatan('%fooValue%'); // WHERE jenguk_catatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jengukCatatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByJengukCatatan($jengukCatatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jengukCatatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jengukCatatan)) {
                $jengukCatatan = str_replace('*', '%', $jengukCatatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::JENGUK_CATATAN, $jengukCatatan, $comparison);
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
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByTugasYa($tugasYa = null, $comparison = null)
    {
        if (is_array($tugasYa)) {
            $useMinMax = false;
            if (isset($tugasYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::TUGAS_YA, $tugasYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tugasYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::TUGAS_YA, $tugasYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::TUGAS_YA, $tugasYa, $comparison);
    }

    /**
     * Filter the query on the perluasan_ya column
     *
     * Example usage:
     * <code>
     * $query->filterByPerluasanYa(1234); // WHERE perluasan_ya = 1234
     * $query->filterByPerluasanYa(array(12, 34)); // WHERE perluasan_ya IN (12, 34)
     * $query->filterByPerluasanYa(array('min' => 12)); // WHERE perluasan_ya >= 12
     * $query->filterByPerluasanYa(array('max' => 12)); // WHERE perluasan_ya <= 12
     * </code>
     *
     * @param     mixed $perluasanYa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByPerluasanYa($perluasanYa = null, $comparison = null)
    {
        if (is_array($perluasanYa)) {
            $useMinMax = false;
            if (isset($perluasanYa['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PERLUASAN_YA, $perluasanYa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($perluasanYa['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::PERLUASAN_YA, $perluasanYa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::PERLUASAN_YA, $perluasanYa, $comparison);
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
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function filterByIsApproved($isApproved = null, $comparison = null)
    {
        if (is_array($isApproved)) {
            $useMinMax = false;
            if (isset($isApproved['min'])) {
                $this->addUsingAlias(PdnPonDetailPeer::IS_APPROVED, $isApproved['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isApproved['max'])) {
                $this->addUsingAlias(PdnPonDetailPeer::IS_APPROVED, $isApproved['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PdnPonDetailPeer::IS_APPROVED, $isApproved, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   PdnPonDetail $pdnPonDetail Object to remove from the list of results
     *
     * @return PdnPonDetailQuery The current query, for fluid interface
     */
    public function prune($pdnPonDetail = null)
    {
        if ($pdnPonDetail) {
            $this->addUsingAlias(PdnPonDetailPeer::ID, $pdnPonDetail->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
