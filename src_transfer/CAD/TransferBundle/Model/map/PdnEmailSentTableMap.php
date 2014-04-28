<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_email_sent' table.
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
class PdnEmailSentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.PdnEmailSentTableMap';

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
        $this->setName('pdn_email_sent');
        $this->setPhpName('PdnEmailSent');
        $this->setClassname('CAD\\TransferBundle\\Model\\PdnEmailSent');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('member_id', 'MemberId', 'INTEGER', false, null, null);
        $this->addColumn('pon_detail_id', 'PonDetailId', 'INTEGER', false, null, null);
        $this->addColumn('field_name', 'FieldName', 'VARCHAR', false, 100, null);
        $this->addColumn('tanggal_kirim', 'TanggalKirim', 'DATE', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnEmailSentTableMap
