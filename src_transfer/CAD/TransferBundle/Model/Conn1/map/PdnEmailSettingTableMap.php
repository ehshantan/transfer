<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_email_setting' table.
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
class PdnEmailSettingTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnEmailSettingTableMap';

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
        $this->setName('pdn_email_setting');
        $this->setPhpName('PdnEmailSetting');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnEmailSetting');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('pg_subject', 'PgSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('pg_message', 'PgMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('ktb_subject', 'KtbSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('ktb_message', 'KtbMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('doa_subject', 'DoaSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('doa_message', 'DoaMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('rohani_subject', 'RohaniSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('rohani_message', 'RohaniMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('sidang_subject', 'SidangSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('sidang_message', 'SidangMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('jenguk_subject', 'JengukSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('jenguk_message', 'JengukMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('pengumuman_subject', 'PengumumanSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('pengumuman_message', 'PengumumanMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('pengumuman_file', 'PengumumanFile', 'VARCHAR', false, 300, null);
        $this->addColumn('tugas_subject', 'TugasSubject', 'VARCHAR', false, 300, null);
        $this->addColumn('tugas_message', 'TugasMessage', 'LONGVARCHAR', false, null, null);
        $this->addColumn('tugas_file', 'TugasFile', 'VARCHAR', false, 300, null);
        $this->addColumn('email_cc', 'EmailCc', 'LONGVARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnEmailSettingTableMap
