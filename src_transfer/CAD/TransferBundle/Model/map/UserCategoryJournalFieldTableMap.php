<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user_category_journal_field' table.
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
class UserCategoryJournalFieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.UserCategoryJournalFieldTableMap';

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
        $this->setName('user_category_journal_field');
        $this->setPhpName('UserCategoryJournalField');
        $this->setClassname('CAD\\TransferBundle\\Model\\UserCategoryJournalField');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addForeignKey(
            'user_category_journal_id',
            'UserCategoryJournalId',
            'BIGINT',
            'user_category_journal',
            'id',
            true,
            null,
            null
        );
        $this->addForeignKey(
            'category_journal_field_id',
            'CategoryJournalFieldId',
            'BIGINT',
            'category_journal_field',
            'id',
            true,
            null,
            null
        );
        $this->addColumn('value', 'Value', 'INTEGER', true, 10, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'CategoryJournalField',
            'CAD\\TransferBundle\\Model\\CategoryJournalField',
            RelationMap::MANY_TO_ONE,
            array('category_journal_field_id' => 'id',),
            null,
            null
        );
        $this->addRelation(
            'UserCategoryJournal',
            'CAD\\TransferBundle\\Model\\UserCategoryJournal',
            RelationMap::MANY_TO_ONE,
            array('user_category_journal_id' => 'id',),
            null,
            null
        );
    } // buildRelations()

} // UserCategoryJournalFieldTableMap
