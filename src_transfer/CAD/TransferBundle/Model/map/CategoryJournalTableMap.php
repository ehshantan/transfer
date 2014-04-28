<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'category_journal' table.
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
class CategoryJournalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.CategoryJournalTableMap';

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
        $this->setName('category_journal');
        $this->setPhpName('CategoryJournal');
        $this->setClassname('CAD\\TransferBundle\\Model\\CategoryJournal');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, 1, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('reminder', 'Reminder', 'LONGVARCHAR', false, null, null);
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
            array('id' => 'category_journal_id',),
            null,
            null,
            'BatchCategoryJournals'
        );
        $this->addRelation(
            'CategoryJournalField',
            'CAD\\TransferBundle\\Model\\CategoryJournalField',
            RelationMap::ONE_TO_MANY,
            array('id' => 'category_journal_id',),
            null,
            null,
            'CategoryJournalFields'
        );
        $this->addRelation(
            'UserCategoryJournal',
            'CAD\\TransferBundle\\Model\\UserCategoryJournal',
            RelationMap::ONE_TO_MANY,
            array('id' => 'category_journal_id',),
            null,
            null,
            'UserCategoryJournals'
        );
    } // buildRelations()

} // CategoryJournalTableMap
