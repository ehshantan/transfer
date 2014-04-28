<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_pertanyaan_umum' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src_transfer.CAD.TransferBundle.Model.map
 */
class PdnPertanyaanUmumTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.PdnPertanyaanUmumTableMap';

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
        $this->setName('pdn_pertanyaan_umum');
        $this->setPhpName('PdnPertanyaanUmum');
        $this->setClassname('CAD\\TransferBundle\\Model\\PdnPertanyaanUmum');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('member_id', 'MemberId', 'INTEGER', false, null, 0);
        $this->addColumn('judul', 'Judul', 'VARCHAR', false, 200, null);
        $this->addColumn('pertanyaan', 'Pertanyaan', 'LONGVARCHAR', false, null, null);
        $this->addColumn('tanggal', 'Tanggal', 'TIMESTAMP', false, null, null);
        $this->addColumn('parent_id', 'ParentId', 'INTEGER', false, null, 0);
        $this->addColumn('is_approved', 'IsApproved', 'TINYINT', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnPertanyaanUmumTableMap
