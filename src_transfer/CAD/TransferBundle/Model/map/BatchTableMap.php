<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'batch' table.
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
class BatchTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.BatchTableMap';

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
        $this->setName('batch');
        $this->setPhpName('Batch');
        $this->setClassname('CAD\\TransferBundle\\Model\\Batch');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('active', 'Active', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'BatchCategoryJournal',
            'CAD\\TransferBundle\\Model\\BatchCategoryJournal',
            RelationMap::ONE_TO_MANY,
            array('id' => 'batch_id',),
            null,
            null,
            'BatchCategoryJournals'
        );
        $this->addRelation(
            'User',
            'CAD\\TransferBundle\\Model\\User',
            RelationMap::ONE_TO_MANY,
            array('id' => 'batch_id',),
            null,
            null,
            'Users'
        );
    } // buildRelations()

} // BatchTableMap
