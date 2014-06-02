<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_hari' table.
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
class PdnHariTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnHariTableMap';

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
        $this->setName('pdn_hari');
        $this->setPhpName('PdnHari');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnHari');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nama_hari', 'NamaHari', 'VARCHAR', false, 20, null);
        $this->addColumn('is_approved', 'IsApproved', 'TINYINT', false, null, 1);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnHariTableMap
