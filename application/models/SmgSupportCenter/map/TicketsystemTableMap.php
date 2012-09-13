<?php



/**
 * This class defines the structure of the 'ticketsystem' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.SmgSupportCenter.map
 */
class TicketsystemTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'SmgSupportCenter.map.TicketsystemTableMap';

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
        $this->setName('ticketsystem');
        $this->setPhpName('Ticketsystem');
        $this->setClassname('Ticketsystem');
        $this->setPackage('SmgSupportCenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID_TICKETSYSTEM', 'IdTicketsystem', 'INTEGER', true, null, null);
        $this->addColumn('TICKET_ID', 'TicketId', 'INTEGER', true, 10, null);
        $this->addColumn('AN', 'An', 'CHAR', true, 50, null);
        $this->addColumn('DEBITOR', 'Debitor', 'VARCHAR', true, 20, null);
        $this->addColumn('DATUM', 'Datum', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('FEHLERMELDUNG', 'Fehlermeldung', 'CHAR', true, 200, null);
        $this->addColumn('VON', 'Von', 'CHAR', true, 50, null);
        $this->addColumn('PRODUKT', 'Produkt', 'CHAR', true, 100, null);
        $this->addColumn('FEHLERART', 'Fehlerart', 'CHAR', true, 100, null);
        $this->addColumn('FEHLERTEXT', 'Fehlertext', 'CLOB', true, null, null);
        $this->addColumn('SCREENSHOT', 'Screenshot', 'VARCHAR', false, 200, null);
        $this->addColumn('STATUS', 'Status', 'VARCHAR', true, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TicketsystemTableMap
