<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user_category_journal' table.
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
class UserCategoryJournalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.UserCategoryJournalTableMap';

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
        $this->setName('user_category_journal');
        $this->setPhpName('UserCategoryJournal');
        $this->setClassname('CAD\\TransferBundle\\Model\\UserCategoryJournal');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addForeignKey('user_id', 'UserId', 'BIGINT', 'user', 'id', true, null, null);
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
        $this->addColumn('date', 'Date', 'DATE', true, null, null);
        $this->addColumn('checked', 'Checked', 'BOOLEAN', true, 1, false);
        $this->addColumn('notified', 'Notified', 'BOOLEAN', true, 1, false);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'User',
            'CAD\\TransferBundle\\Model\\User',
            RelationMap::MANY_TO_ONE,
            array('user_id' => 'id',),
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
        $this->addRelation(
            'UserCategoryJournalField',
            'CAD\\TransferBundle\\Model\\UserCategoryJournalField',
            RelationMap::ONE_TO_MANY,
            array('id' => 'user_category_journal_id',),
            null,
            null,
            'UserCategoryJournalFields'
        );
    } // buildRelations()

} // UserCategoryJournalTableMap
