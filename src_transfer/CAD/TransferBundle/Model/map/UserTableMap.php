<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user' table.
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
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.UserTableMap';

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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setClassname('CAD\\TransferBundle\\Model\\User');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'BIGINT', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 100, null);
        $this->addForeignKey('batch_id', 'BatchId', 'BIGINT', 'batch', 'id', true, null, null);
        $this->addColumn('birthdate', 'Birthdate', 'DATE', false, null, null);
        $this->addColumn('birthplace', 'Birthplace', 'VARCHAR', false, 50, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 100, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('address', 'Address', 'LONGVARCHAR', false, null, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 50, null);
        $this->addColumn('handphone', 'Handphone', 'VARCHAR', false, 50, null);
        $this->addColumn('hall', 'Hall', 'VARCHAR', false, 50, null);
        $this->addForeignKey('group_id', 'GroupId', 'BIGINT', 'group', 'id', true, null, null);
        $this->addColumn('roles', 'Roles', 'LONGVARCHAR', true, null, null);
        $this->addColumn('active', 'Active', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation(
            'Group',
            'CAD\\TransferBundle\\Model\\Group',
            RelationMap::MANY_TO_ONE,
            array('group_id' => 'id',),
            null,
            null
        );
        $this->addRelation(
            'Batch',
            'CAD\\TransferBundle\\Model\\Batch',
            RelationMap::MANY_TO_ONE,
            array('batch_id' => 'id',),
            null,
            null
        );
        $this->addRelation(
            'UserCategoryJournal',
            'CAD\\TransferBundle\\Model\\UserCategoryJournal',
            RelationMap::ONE_TO_MANY,
            array('id' => 'user_id',),
            null,
            null,
            'UserCategoryJournals'
        );
    } // buildRelations()

} // UserTableMap
