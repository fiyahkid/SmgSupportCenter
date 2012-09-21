<?php


/**
 * Base static class for performing query and update operations on the 'ticket_verlauf' table.
 *
 *
 *
 * @package propel.generator.SmgSupportCenter.om
 */
abstract class BaseTicketVerlaufPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'SmgSupportCenter';

    /** the table name for this class */
    const TABLE_NAME = 'ticket_verlauf';

    /** the related Propel class for this table */
    const OM_CLASS = 'TicketVerlauf';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TicketVerlaufTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the ID_TICKET_VERLAUF field */
    const ID_TICKET_VERLAUF = 'ticket_verlauf.ID_TICKET_VERLAUF';

    /** the column name for the TV_FEHLERMELDUNG field */
    const TV_FEHLERMELDUNG = 'ticket_verlauf.TV_FEHLERMELDUNG';

    /** the column name for the TV_FEHLERTEXT field */
    const TV_FEHLERTEXT = 'ticket_verlauf.TV_FEHLERTEXT';

    /** the column name for the TV_SCREENSHOT field */
    const TV_SCREENSHOT = 'ticket_verlauf.TV_SCREENSHOT';

    /** the column name for the TV_BEARBEITER field */
    const TV_BEARBEITER = 'ticket_verlauf.TV_BEARBEITER';

    /** the column name for the TV_DATUM field */
    const TV_DATUM = 'ticket_verlauf.TV_DATUM';

    /** the column name for the TV_STATUS field */
    const TV_STATUS = 'ticket_verlauf.TV_STATUS';

    /** the column name for the TICKET_ID field */
    const TICKET_ID = 'ticket_verlauf.TICKET_ID';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TicketVerlauf objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TicketVerlauf[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TicketVerlaufPeer::$fieldNames[TicketVerlaufPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdTicketVerlauf', 'TvFehlermeldung', 'TvFehlertext', 'TvScreenshot', 'TvBearbeiter', 'TvDatum', 'TvStatus', 'TicketId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTicketVerlauf', 'tvFehlermeldung', 'tvFehlertext', 'tvScreenshot', 'tvBearbeiter', 'tvDatum', 'tvStatus', 'ticketId', ),
        BasePeer::TYPE_COLNAME => array (TicketVerlaufPeer::ID_TICKET_VERLAUF, TicketVerlaufPeer::TV_FEHLERMELDUNG, TicketVerlaufPeer::TV_FEHLERTEXT, TicketVerlaufPeer::TV_SCREENSHOT, TicketVerlaufPeer::TV_BEARBEITER, TicketVerlaufPeer::TV_DATUM, TicketVerlaufPeer::TV_STATUS, TicketVerlaufPeer::TICKET_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TICKET_VERLAUF', 'TV_FEHLERMELDUNG', 'TV_FEHLERTEXT', 'TV_SCREENSHOT', 'TV_BEARBEITER', 'TV_DATUM', 'TV_STATUS', 'TICKET_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ticket_verlauf', 'tv_fehlermeldung', 'tv_fehlertext', 'tv_screenshot', 'tv_bearbeiter', 'tv_datum', 'tv_status', 'ticket_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TicketVerlaufPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdTicketVerlauf' => 0, 'TvFehlermeldung' => 1, 'TvFehlertext' => 2, 'TvScreenshot' => 3, 'TvBearbeiter' => 4, 'TvDatum' => 5, 'TvStatus' => 6, 'TicketId' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTicketVerlauf' => 0, 'tvFehlermeldung' => 1, 'tvFehlertext' => 2, 'tvScreenshot' => 3, 'tvBearbeiter' => 4, 'tvDatum' => 5, 'tvStatus' => 6, 'ticketId' => 7, ),
        BasePeer::TYPE_COLNAME => array (TicketVerlaufPeer::ID_TICKET_VERLAUF => 0, TicketVerlaufPeer::TV_FEHLERMELDUNG => 1, TicketVerlaufPeer::TV_FEHLERTEXT => 2, TicketVerlaufPeer::TV_SCREENSHOT => 3, TicketVerlaufPeer::TV_BEARBEITER => 4, TicketVerlaufPeer::TV_DATUM => 5, TicketVerlaufPeer::TV_STATUS => 6, TicketVerlaufPeer::TICKET_ID => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TICKET_VERLAUF' => 0, 'TV_FEHLERMELDUNG' => 1, 'TV_FEHLERTEXT' => 2, 'TV_SCREENSHOT' => 3, 'TV_BEARBEITER' => 4, 'TV_DATUM' => 5, 'TV_STATUS' => 6, 'TICKET_ID' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ticket_verlauf' => 0, 'tv_fehlermeldung' => 1, 'tv_fehlertext' => 2, 'tv_screenshot' => 3, 'tv_bearbeiter' => 4, 'tv_datum' => 5, 'tv_status' => 6, 'ticket_id' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = TicketVerlaufPeer::getFieldNames($toType);
        $key = isset(TicketVerlaufPeer::$fieldKeys[$fromType][$name]) ? TicketVerlaufPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TicketVerlaufPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, TicketVerlaufPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TicketVerlaufPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. TicketVerlaufPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TicketVerlaufPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(TicketVerlaufPeer::ID_TICKET_VERLAUF);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_FEHLERMELDUNG);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_FEHLERTEXT);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_SCREENSHOT);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_BEARBEITER);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_DATUM);
            $criteria->addSelectColumn(TicketVerlaufPeer::TV_STATUS);
            $criteria->addSelectColumn(TicketVerlaufPeer::TICKET_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ID_TICKET_VERLAUF');
            $criteria->addSelectColumn($alias . '.TV_FEHLERMELDUNG');
            $criteria->addSelectColumn($alias . '.TV_FEHLERTEXT');
            $criteria->addSelectColumn($alias . '.TV_SCREENSHOT');
            $criteria->addSelectColumn($alias . '.TV_BEARBEITER');
            $criteria->addSelectColumn($alias . '.TV_DATUM');
            $criteria->addSelectColumn($alias . '.TV_STATUS');
            $criteria->addSelectColumn($alias . '.TICKET_ID');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TicketVerlaufPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TicketVerlaufPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TicketVerlaufPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 TicketVerlauf
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TicketVerlaufPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return TicketVerlaufPeer::populateObjects(TicketVerlaufPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TicketVerlaufPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TicketVerlaufPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      TicketVerlauf $obj A TicketVerlauf object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdTicketVerlauf();
            } // if key === null
            TicketVerlaufPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A TicketVerlauf object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TicketVerlauf) {
                $key = (string) $value->getIdTicketVerlauf();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TicketVerlauf object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TicketVerlaufPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TicketVerlauf Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TicketVerlaufPeer::$instances[$key])) {
                return TicketVerlaufPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        TicketVerlaufPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to ticket_verlauf
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = TicketVerlaufPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TicketVerlaufPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TicketVerlaufPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TicketVerlaufPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (TicketVerlauf object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TicketVerlaufPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TicketVerlaufPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TicketVerlaufPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TicketVerlaufPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TicketVerlaufPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(TicketVerlaufPeer::DATABASE_NAME)->getTable(TicketVerlaufPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTicketVerlaufPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTicketVerlaufPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TicketVerlaufTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return TicketVerlaufPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TicketVerlauf or Criteria object.
     *
     * @param      mixed $values Criteria or TicketVerlauf object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TicketVerlauf object
        }

        if ($criteria->containsKey(TicketVerlaufPeer::ID_TICKET_VERLAUF) && $criteria->keyContainsValue(TicketVerlaufPeer::ID_TICKET_VERLAUF) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.TicketVerlaufPeer::ID_TICKET_VERLAUF.')');
        }


        // Set the correct dbName
        $criteria->setDbName(TicketVerlaufPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a TicketVerlauf or Criteria object.
     *
     * @param      mixed $values Criteria or TicketVerlauf object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TicketVerlaufPeer::ID_TICKET_VERLAUF);
            $value = $criteria->remove(TicketVerlaufPeer::ID_TICKET_VERLAUF);
            if ($value) {
                $selectCriteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TicketVerlaufPeer::TABLE_NAME);
            }

        } else { // $values is TicketVerlauf object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TicketVerlaufPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ticket_verlauf table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TicketVerlaufPeer::TABLE_NAME, $con, TicketVerlaufPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TicketVerlaufPeer::clearInstancePool();
            TicketVerlaufPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TicketVerlauf or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TicketVerlauf object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TicketVerlaufPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TicketVerlauf) { // it's a model object
            // invalidate the cache for this single object
            TicketVerlaufPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);
            $criteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TicketVerlaufPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TicketVerlaufPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            TicketVerlaufPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TicketVerlauf object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TicketVerlauf $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TicketVerlaufPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TicketVerlaufPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(TicketVerlaufPeer::DATABASE_NAME, TicketVerlaufPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return TicketVerlauf
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TicketVerlaufPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);
        $criteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, $pk);

        $v = TicketVerlaufPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return TicketVerlauf[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);
            $criteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, $pks, Criteria::IN);
            $objs = TicketVerlaufPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTicketVerlaufPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTicketVerlaufPeer::buildTableMap();

