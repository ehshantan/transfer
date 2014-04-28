<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'batch_category_journal' table.
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
class BatchCategoryJournalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.BatchCategoryJournalTableMap';

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
        $this->setName('batch_category_journal');
        $this->setPhpName('BatchCategoryJournal');
        $this->setClassname('CAD\\TransferBundle\\Model\\BatchCategoryJournal');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addForeignKey('batch_id', 'BatchId', 'BIGINT', 'batch', 'id', true, null, null);
        $this->addForeignKey(
            'category_journal_id',
            'CategoryJournalId',
            'BIGINT',
            'category_journal',
            'id',
            true,
            null,
            null
        );
        $this->addColumn('active', 'Active', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'Batch',
            'CAD\\TransferBundle\\Model\\Batch',
            RelationMap::MANY_TO_ONE,
            array('batch_id' => 'id',),
            null,
            null
        );
        $this->addRelation(
            'CategoryJournal',
            'CAD\\TransferBundle\\Model\\CategoryJournal',
            RelationMap::MANY_TO_ONE,
            array('category_journal_id' => 'id',),
            null,
            null
        );
    } // buildRelations()

} // BatchCategoryJournalTableMap
