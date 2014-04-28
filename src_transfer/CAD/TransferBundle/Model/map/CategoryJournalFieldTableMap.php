<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'category_journal_field' table.
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
class CategoryJournalFieldTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.CategoryJournalFieldTableMap';

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
        $this->setName('category_journal_field');
        $this->setPhpName('CategoryJournalField');
        $this->setClassname('CAD\\TransferBundle\\Model\\CategoryJournalField');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
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
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('postfix', 'Postfix', 'VARCHAR', true, 50, null);
        $this->addForeignKey(
            'category_journal_field_type_id',
            'CategoryJournalFieldTypeId',
            'BIGINT',
            'category_journal_field_type',
            'id',
            true,
            null,
            null
        );
        $this->addColumn('value', 'Value', 'INTEGER', true, 3, 0);
        $this->addColumn('active', 'Active', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'CategoryJournalFieldType',
            'CAD\\TransferBundle\\Model\\CategoryJournalFieldType',
            RelationMap::MANY_TO_ONE,
            array('category_journal_field_type_id' => 'id',),
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
            array('id' => 'category_journal_field_id',),
            null,
            null,
            'UserCategoryJournalFields'
        );
    } // buildRelations()

} // CategoryJournalFieldTableMap
