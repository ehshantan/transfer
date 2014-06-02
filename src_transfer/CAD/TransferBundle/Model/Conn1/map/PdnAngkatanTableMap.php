<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_angkatan' table.
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
class PdnAngkatanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnAngkatanTableMap';

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
        $this->setName('pdn_angkatan');
        $this->setPhpName('PdnAngkatan');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnAngkatan');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('angkatan', 'Angkatan', 'INTEGER', true, 4, 0);
        $this->addColumn('penyegaran_pagi', 'PenyegaranPagi', 'TINYINT', false, null, null);
        $this->addColumn('baca_alkitab', 'BacaAlkitab', 'TINYINT', false, null, null);
        $this->addColumn('doa', 'Doa', 'TINYINT', false, null, null);
        $this->addColumn('baca_rohani', 'BacaRohani', 'TINYINT', false, null, null);
        $this->addColumn('bersidang', 'Bersidang', 'TINYINT', false, null, null);
        $this->addColumn('ot', 'Ot', 'TINYINT', false, null, null);
        $this->addColumn('penjengukan', 'Penjengukan', 'TINYINT', false, null, null);
        $this->addColumn('pengumuman', 'Pengumuman', 'TINYINT', false, null, null);
        $this->addColumn('tugas', 'Tugas', 'TINYINT', false, null, null);
        $this->addColumn('tugas_ya', 'TugasYa', 'TINYINT', false, null, null);
        $this->addColumn('is_approved', 'IsApproved', 'TINYINT', false, null, 1);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnAngkatanTableMap
