<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_pon_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src_transfer.CAD.TransferBundle.Model.Conn1.map
 */
class PdnPonDetailTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnPonDetailTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pdn_pon_detail');
        $this->setPhpName('PdnPonDetail');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnPonDetail');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('pon_header_id', 'PonHeaderId', 'INTEGER', false, null, null);
        $this->addColumn('hari_id', 'HariId', 'TINYINT', false, null, null);
        $this->addColumn('pg_ya', 'PgYa', 'TINYINT', false, null, 0);
        $this->addColumn('pg_durasi', 'PgDurasi', 'VARCHAR', false, 10, null);
        $this->addColumn('pg_berkesah', 'PgBerkesah', 'TINYINT', false, null, 0);
        $this->addColumn('pg_berseru', 'PgBerseru', 'TINYINT', false, null, 0);
        $this->addColumn('pg_berkidung', 'PgBerkidung', 'TINYINT', false, null, 0);
        $this->addColumn('pg_baca_doa', 'PgBacaDoa', 'TINYINT', false, null, 0);
        $this->addColumn('pg_catatan', 'PgCatatan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ktb_ya', 'KtbYa', 'TINYINT', false, null, 0);
        $this->addColumn('ktb_pl', 'KtbPl', 'TINYINT', false, null, 0);
        $this->addColumn('ktb_pb', 'KtbPb', 'TINYINT', false, null, 0);
        $this->addColumn('ktb_durasi', 'KtbDurasi', 'VARCHAR', false, 10, null);
        $this->addColumn('ktb_ayat', 'KtbAyat', 'VARCHAR', false, 200, null);
        $this->addColumn('ktb_reading', 'KtbReading', 'VARCHAR', false, 300, null);
        $this->addColumn('ktb_center', 'KtbCenter', 'VARCHAR', false, 300, null);
        $this->addColumn('ktb_supply', 'KtbSupply', 'VARCHAR', false, 300, null);
        $this->addColumn('ktb_catatan', 'KtbCatatan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('doa_ya', 'DoaYa', 'TINYINT', false, null, 0);
        $this->addColumn('doa_durasi', 'DoaDurasi', 'VARCHAR', false, 200, null);
        $this->addColumn('doa_pribadi', 'DoaPribadi', 'TINYINT', false, null, 0);
        $this->addColumn('doa_syafaat', 'DoaSyafaat', 'TINYINT', false, null, 0);
        $this->addColumn('doa_catatan', 'DoaCatatan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('rohani_ya', 'RohaniYa', 'TINYINT', false, null, 0);
        $this->addColumn('rohani_judul_buku', 'RohaniJudulBuku', 'VARCHAR', false, 300, null);
        $this->addColumn('rohani_catatan', 'RohaniCatatan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('rohani_outline', 'RohaniOutline', 'VARCHAR', false, 100, null);
        $this->addColumn('sidang_ya', 'SidangYa', 'TINYINT', false, null, 0);
        $this->addColumn('sidang_spr', 'SidangSpr', 'TINYINT', false, null, null);
        $this->addColumn('sidang_berdoa', 'SidangBerdoa', 'TINYINT', false, null, 0);
        $this->addColumn('sidang_tutur_sabda', 'SidangTuturSabda', 'TINYINT', false, null, 0);
        $this->addColumn('sidang_doa', 'SidangDoa', 'TINYINT', false, null, null);
        $this->addColumn('sidang_kelompok', 'SidangKelompok', 'TINYINT', false, null, null);
        $this->addColumn('ot_ya', 'OtYa', 'TINYINT', false, null, 0);
        $this->addColumn('ot_tel', 'OtTel', 'TINYINT', false, null, 0);
        $this->addColumn('ot_muka', 'OtMuka', 'TINYINT', false, null, 0);
        $this->addColumn('jenguk_durasi', 'JengukDurasi', 'VARCHAR', false, 10, null);
        $this->addColumn('jenguk_injil', 'JengukInjil', 'TINYINT', false, null, 0);
        $this->addColumn('jenguk_rawat', 'JengukRawat', 'TINYINT', false, null, 0);
        $this->addColumn('jenguk_catatan', 'JengukCatatan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('tugas_ya', 'TugasYa', 'TINYINT', false, null, 0);
        $this->addColumn('perluasan_ya', 'PerluasanYa', 'TINYINT', false, null, 0);
        $this->addColumn('is_approved', 'IsApproved', 'TINYINT', false, null, 1);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnPonDetailTableMap
