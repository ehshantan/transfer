<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'trabsensi' table.
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
class TrabsensiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.TrabsensiTableMap';

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
        $this->setName('trabsensi');
        $this->setPhpName('Trabsensi');
        $this->setClassname('CAD\\TransferBundle\\Model\\Trabsensi');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idtrabsensi', 'Idtrabsensi', 'INTEGER', true, null, null);
        $this->addColumn('idabsensi', 'Idabsensi', 'INTEGER', true, null, null);
        $this->addColumn('sesi', 'Sesi', 'INTEGER', true, null, null);
        $this->addColumn('idtypesesi', 'Idtypesesi', 'INTEGER', true, null, null);
        $this->addColumn('waktumulai', 'Waktumulai', 'TIME', true, null, null);
        $this->addColumn('waktuselesai', 'Waktuselesai', 'TIME', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TrabsensiTableMap
