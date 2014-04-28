<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'category_journal_field_type' table.
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
class CategoryJournalFieldTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.CategoryJournalFieldTypeTableMap';

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
        $this->setName('category_journal_field_type');
        $this->setPhpName('CategoryJournalFieldType');
        $this->setClassname('CAD\\TransferBundle\\Model\\CategoryJournalFieldType');
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
            'CategoryJournalField',
            'CAD\\TransferBundle\\Model\\CategoryJournalField',
            RelationMap::ONE_TO_MANY,
            array('id' => 'category_journal_field_type_id',),
            null,
            null,
            'CategoryJournalFields'
        );
    } // buildRelations()

} // CategoryJournalFieldTypeTableMap
