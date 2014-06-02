<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'dtabsensi' table.
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
class DtabsensiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.DtabsensiTableMap';

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
        $this->setName('dtabsensi');
        $this->setPhpName('Dtabsensi');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\Dtabsensi');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idtrabsensi', 'Idtrabsensi', 'INTEGER', true, null, null);
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('waktu', 'Waktu', 'TIME', true, null, null);
        $this->addColumn('remedial', 'Remedial', 'CHAR', true, null, null);
        $this->getColumn('remedial', false)->setValueSet(
            array(
                0 => 'true',
                1 => 'false',
            )
        );
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // DtabsensiTableMap
