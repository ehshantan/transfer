<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_alkitab' table.
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
class PdnAlkitabTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnAlkitabTableMap';

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
        $this->setName('pdn_alkitab');
        $this->setPhpName('PdnAlkitab');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnAlkitab');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('pl', 'Pl', 'VARCHAR', true, 100, null);
        $this->addColumn('pb', 'Pb', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnAlkitabTableMap
