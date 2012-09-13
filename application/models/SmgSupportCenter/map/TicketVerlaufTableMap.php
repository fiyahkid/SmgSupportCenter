<?php



/**
 * This class defines the structure of the 'ticket_verlauf' table.
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
class TicketVerlaufTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'SmgSupportCenter.map.TicketVerlaufTableMap';

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
        $this->setName('ticket_verlauf');
        $this->setPhpName('TicketVerlauf');
        $this->setClassname('TicketVerlauf');
        $this->setPackage('SmgSupportCenter');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID_TICKET_VERLAUF', 'IdTicketVerlauf', 'INTEGER', true, null, null);
        $this->addColumn('TV_FEHLERMELDUNG', 'TvFehlermeldung', 'VARCHAR', true, 200, null);
        $this->addColumn('TV_FEHLERTEXT', 'TvFehlertext', 'CLOB', true, null, null);
        $this->addColumn('TV_SCREENSHOT', 'TvScreenshot', 'VARCHAR', false, 200, null);
        $this->addColumn('TV_BEARBEITER', 'TvBearbeiter', 'VARCHAR', true, 10, null);
        $this->addColumn('TV_DATUM', 'TvDatum', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('TV_STATUS', 'TvStatus', 'VARCHAR', true, 15, null);
        $this->addColumn('TICKET_ID', 'TicketId', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // TicketVerlaufTableMap
