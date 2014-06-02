<?php

namespace CAD\TransferBundle\Model\Conn1\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_member' table.
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
class PdnMemberTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.Conn1.map.PdnMemberTableMap';

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
        $this->setName('pdn_member');
        $this->setPhpName('PdnMember');
        $this->setClassname('CAD\\TransferBundle\\Model\\Conn1\\PdnMember');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model.Conn1');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'CHAR', false, 100, null);
        $this->addColumn('password', 'Password', 'CHAR', false, 100, null);
        $this->addColumn('realname', 'Realname', 'CHAR', false, 100, null);
        $this->addColumn('angkatan', 'Angkatan', 'CHAR', false, 10, null);
        $this->addColumn('hall', 'Hall', 'CHAR', false, 10, null);
        $this->addColumn('lokasi', 'Lokasi', 'CHAR', false, 100, null);
        $this->addColumn('telepon', 'Telepon', 'CHAR', false, 20, null);
        $this->addColumn('handphone', 'Handphone', 'CHAR', false, 20, null);
        $this->addColumn('handphone_2', 'Handphone2', 'CHAR', false, 20, null);
        $this->addColumn('id_member', 'IdMember', 'CHAR', false, 20, null);
        $this->addColumn('alamat', 'Alamat', 'CHAR', false, 200, null);
        $this->addColumn('is_approved', 'IsApproved', 'TINYINT', false, null, null);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('jenis_kelamin', 'JenisKelamin', 'TINYINT', false, null, 0);
        $this->addColumn('tipe_member', 'TipeMember', 'TINYINT', false, null, null);
        $this->addColumn('id_kelompok', 'IdKelompok', 'INTEGER', true, null, 0);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 20, 'AKM');
        $this->addColumn('tgl_masuk', 'TglMasuk', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnMemberTableMap
