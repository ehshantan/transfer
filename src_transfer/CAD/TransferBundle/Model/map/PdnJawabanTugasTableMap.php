<?php

namespace CAD\TransferBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pdn_jawaban_tugas' table.
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
class PdnJawabanTugasTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src_transfer.CAD.TransferBundle.Model.map.PdnJawabanTugasTableMap';

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
        $this->setName('pdn_jawaban_tugas');
        $this->setPhpName('PdnJawabanTugas');
        $this->setClassname('CAD\\TransferBundle\\Model\\PdnJawabanTugas');
        $this->setPackage('src_transfer.CAD.TransferBundle.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('kode_member', 'KodeMember', 'INTEGER', true, null, null);
        $this->addPrimaryKey('kode_tugas', 'KodeTugas', 'INTEGER', true, null, 0);
        $this->addPrimaryKey('kode_soal', 'KodeSoal', 'INTEGER', true, null, 0);
        $this->addPrimaryKey('kode_pilihan', 'KodePilihan', 'CHAR', true, 10, '');
        $this->addColumn('status', 'Status', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PdnJawabanTugasTableMap
