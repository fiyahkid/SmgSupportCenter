<?php


/**
 * Base class that represents a query for the 'ticketsystem' table.
 *
 * 
 *
 * @method     TicketsystemQuery orderByIdTicketsystem($order = Criteria::ASC) Order by the id_ticketsystem column
 * @method     TicketsystemQuery orderByTicketId($order = Criteria::ASC) Order by the ticket_id column
 * @method     TicketsystemQuery orderByAn($order = Criteria::ASC) Order by the an column
 * @method     TicketsystemQuery orderByDebitor($order = Criteria::ASC) Order by the debitor column
 * @method     TicketsystemQuery orderByDatum($order = Criteria::ASC) Order by the datum column
 * @method     TicketsystemQuery orderByFehlermeldung($order = Criteria::ASC) Order by the fehlermeldung column
 * @method     TicketsystemQuery orderByVon($order = Criteria::ASC) Order by the von column
 * @method     TicketsystemQuery orderByProdukt($order = Criteria::ASC) Order by the produkt column
 * @method     TicketsystemQuery orderByFehlerart($order = Criteria::ASC) Order by the fehlerart column
 * @method     TicketsystemQuery orderByFehlertext($order = Criteria::ASC) Order by the fehlertext column
 * @method     TicketsystemQuery orderByScreenshot($order = Criteria::ASC) Order by the screenshot column
 * @method     TicketsystemQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     TicketsystemQuery groupByIdTicketsystem() Group by the id_ticketsystem column
 * @method     TicketsystemQuery groupByTicketId() Group by the ticket_id column
 * @method     TicketsystemQuery groupByAn() Group by the an column
 * @method     TicketsystemQuery groupByDebitor() Group by the debitor column
 * @method     TicketsystemQuery groupByDatum() Group by the datum column
 * @method     TicketsystemQuery groupByFehlermeldung() Group by the fehlermeldung column
 * @method     TicketsystemQuery groupByVon() Group by the von column
 * @method     TicketsystemQuery groupByProdukt() Group by the produkt column
 * @method     TicketsystemQuery groupByFehlerart() Group by the fehlerart column
 * @method     TicketsystemQuery groupByFehlertext() Group by the fehlertext column
 * @method     TicketsystemQuery groupByScreenshot() Group by the screenshot column
 * @method     TicketsystemQuery groupByStatus() Group by the status column
 *
 * @method     TicketsystemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TicketsystemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TicketsystemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Ticketsystem findOne(PropelPDO $con = null) Return the first Ticketsystem matching the query
 * @method     Ticketsystem findOneOrCreate(PropelPDO $con = null) Return the first Ticketsystem matching the query, or a new Ticketsystem object populated from the query conditions when no match is found
 *
 * @method     Ticketsystem findOneByIdTicketsystem(int $id_ticketsystem) Return the first Ticketsystem filtered by the id_ticketsystem column
 * @method     Ticketsystem findOneByTicketId(int $ticket_id) Return the first Ticketsystem filtered by the ticket_id column
 * @method     Ticketsystem findOneByAn(string $an) Return the first Ticketsystem filtered by the an column
 * @method     Ticketsystem findOneByDebitor(string $debitor) Return the first Ticketsystem filtered by the debitor column
 * @method     Ticketsystem findOneByDatum(string $datum) Return the first Ticketsystem filtered by the datum column
 * @method     Ticketsystem findOneByFehlermeldung(string $fehlermeldung) Return the first Ticketsystem filtered by the fehlermeldung column
 * @method     Ticketsystem findOneByVon(string $von) Return the first Ticketsystem filtered by the von column
 * @method     Ticketsystem findOneByProdukt(string $produkt) Return the first Ticketsystem filtered by the produkt column
 * @method     Ticketsystem findOneByFehlerart(string $fehlerart) Return the first Ticketsystem filtered by the fehlerart column
 * @method     Ticketsystem findOneByFehlertext(string $fehlertext) Return the first Ticketsystem filtered by the fehlertext column
 * @method     Ticketsystem findOneByScreenshot(string $screenshot) Return the first Ticketsystem filtered by the screenshot column
 * @method     Ticketsystem findOneByStatus(string $status) Return the first Ticketsystem filtered by the status column
 *
 * @method     array findByIdTicketsystem(int $id_ticketsystem) Return Ticketsystem objects filtered by the id_ticketsystem column
 * @method     array findByTicketId(int $ticket_id) Return Ticketsystem objects filtered by the ticket_id column
 * @method     array findByAn(string $an) Return Ticketsystem objects filtered by the an column
 * @method     array findByDebitor(string $debitor) Return Ticketsystem objects filtered by the debitor column
 * @method     array findByDatum(string $datum) Return Ticketsystem objects filtered by the datum column
 * @method     array findByFehlermeldung(string $fehlermeldung) Return Ticketsystem objects filtered by the fehlermeldung column
 * @method     array findByVon(string $von) Return Ticketsystem objects filtered by the von column
 * @method     array findByProdukt(string $produkt) Return Ticketsystem objects filtered by the produkt column
 * @method     array findByFehlerart(string $fehlerart) Return Ticketsystem objects filtered by the fehlerart column
 * @method     array findByFehlertext(string $fehlertext) Return Ticketsystem objects filtered by the fehlertext column
 * @method     array findByScreenshot(string $screenshot) Return Ticketsystem objects filtered by the screenshot column
 * @method     array findByStatus(string $status) Return Ticketsystem objects filtered by the status column
 *
 * @package    propel.generator.SmgSupportCenter.om
 */
abstract class BaseTicketsystemQuery extends ModelCriteria
{
    
    /**
     * Initializes internal state of BaseTicketsystemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'SmgSupportCenter', $modelName = 'Ticketsystem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TicketsystemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TicketsystemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TicketsystemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TicketsystemQuery) {
            return $criteria;
        }
        $query = new TicketsystemQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Ticketsystem|Ticketsystem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TicketsystemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TicketsystemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Ticketsystem A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID_TICKETSYSTEM`, `TICKET_ID`, `AN`, `DEBITOR`, `DATUM`, `FEHLERMELDUNG`, `VON`, `PRODUKT`, `FEHLERART`, `FEHLERTEXT`, `SCREENSHOT`, `STATUS` FROM `ticketsystem` WHERE `ID_TICKETSYSTEM` = :p0';
        try {
            $stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Ticketsystem();
            $obj->hydrate($row);
            TicketsystemPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Ticketsystem|Ticketsystem[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Ticketsystem[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TicketsystemPeer::ID_TICKETSYSTEM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TicketsystemPeer::ID_TICKETSYSTEM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ticketsystem column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTicketsystem(1234); // WHERE id_ticketsystem = 1234
     * $query->filterByIdTicketsystem(array(12, 34)); // WHERE id_ticketsystem IN (12, 34)
     * $query->filterByIdTicketsystem(array('min' => 12)); // WHERE id_ticketsystem > 12
     * </code>
     *
     * @param     mixed $idTicketsystem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByIdTicketsystem($idTicketsystem = null, $comparison = null)
    {
        if (is_array($idTicketsystem) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TicketsystemPeer::ID_TICKETSYSTEM, $idTicketsystem, $comparison);
    }

    /**
     * Filter the query on the ticket_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTicketId(1234); // WHERE ticket_id = 1234
     * $query->filterByTicketId(array(12, 34)); // WHERE ticket_id IN (12, 34)
     * $query->filterByTicketId(array('min' => 12)); // WHERE ticket_id > 12
     * </code>
     *
     * @param     mixed $ticketId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByTicketId($ticketId = null, $comparison = null)
    {
        if (is_array($ticketId)) {
            $useMinMax = false;
            if (isset($ticketId['min'])) {
                $this->addUsingAlias(TicketsystemPeer::TICKET_ID, $ticketId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ticketId['max'])) {
                $this->addUsingAlias(TicketsystemPeer::TICKET_ID, $ticketId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::TICKET_ID, $ticketId, $comparison);
    }

    /**
     * Filter the query on the an column
     *
     * Example usage:
     * <code>
     * $query->filterByAn('fooValue');   // WHERE an = 'fooValue'
     * $query->filterByAn('%fooValue%'); // WHERE an LIKE '%fooValue%'
     * </code>
     *
     * @param     string $an The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByAn($an = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($an)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $an)) {
                $an = str_replace('*', '%', $an);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::AN, $an, $comparison);
    }

    /**
     * Filter the query on the debitor column
     *
     * Example usage:
     * <code>
     * $query->filterByDebitor('fooValue');   // WHERE debitor = 'fooValue'
     * $query->filterByDebitor('%fooValue%'); // WHERE debitor LIKE '%fooValue%'
     * </code>
     *
     * @param     string $debitor The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByDebitor($debitor = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($debitor)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $debitor)) {
                $debitor = str_replace('*', '%', $debitor);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::DEBITOR, $debitor, $comparison);
    }

    /**
     * Filter the query on the datum column
     *
     * Example usage:
     * <code>
     * $query->filterByDatum('2011-03-14'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum('now'); // WHERE datum = '2011-03-14'
     * $query->filterByDatum(array('max' => 'yesterday')); // WHERE datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $datum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByDatum($datum = null, $comparison = null)
    {
        if (is_array($datum)) {
            $useMinMax = false;
            if (isset($datum['min'])) {
                $this->addUsingAlias(TicketsystemPeer::DATUM, $datum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datum['max'])) {
                $this->addUsingAlias(TicketsystemPeer::DATUM, $datum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::DATUM, $datum, $comparison);
    }

    /**
     * Filter the query on the fehlermeldung column
     *
     * Example usage:
     * <code>
     * $query->filterByFehlermeldung('fooValue');   // WHERE fehlermeldung = 'fooValue'
     * $query->filterByFehlermeldung('%fooValue%'); // WHERE fehlermeldung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fehlermeldung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByFehlermeldung($fehlermeldung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fehlermeldung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fehlermeldung)) {
                $fehlermeldung = str_replace('*', '%', $fehlermeldung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::FEHLERMELDUNG, $fehlermeldung, $comparison);
    }

    /**
     * Filter the query on the von column
     *
     * Example usage:
     * <code>
     * $query->filterByVon('fooValue');   // WHERE von = 'fooValue'
     * $query->filterByVon('%fooValue%'); // WHERE von LIKE '%fooValue%'
     * </code>
     *
     * @param     string $von The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByVon($von = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($von)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $von)) {
                $von = str_replace('*', '%', $von);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::VON, $von, $comparison);
    }

    /**
     * Filter the query on the produkt column
     *
     * Example usage:
     * <code>
     * $query->filterByProdukt('fooValue');   // WHERE produkt = 'fooValue'
     * $query->filterByProdukt('%fooValue%'); // WHERE produkt LIKE '%fooValue%'
     * </code>
     *
     * @param     string $produkt The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByProdukt($produkt = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($produkt)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $produkt)) {
                $produkt = str_replace('*', '%', $produkt);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::PRODUKT, $produkt, $comparison);
    }

    /**
     * Filter the query on the fehlerart column
     *
     * Example usage:
     * <code>
     * $query->filterByFehlerart('fooValue');   // WHERE fehlerart = 'fooValue'
     * $query->filterByFehlerart('%fooValue%'); // WHERE fehlerart LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fehlerart The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByFehlerart($fehlerart = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fehlerart)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fehlerart)) {
                $fehlerart = str_replace('*', '%', $fehlerart);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::FEHLERART, $fehlerart, $comparison);
    }

    /**
     * Filter the query on the fehlertext column
     *
     * Example usage:
     * <code>
     * $query->filterByFehlertext('fooValue');   // WHERE fehlertext = 'fooValue'
     * $query->filterByFehlertext('%fooValue%'); // WHERE fehlertext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fehlertext The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByFehlertext($fehlertext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fehlertext)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fehlertext)) {
                $fehlertext = str_replace('*', '%', $fehlertext);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::FEHLERTEXT, $fehlertext, $comparison);
    }

    /**
     * Filter the query on the screenshot column
     *
     * Example usage:
     * <code>
     * $query->filterByScreenshot('fooValue');   // WHERE screenshot = 'fooValue'
     * $query->filterByScreenshot('%fooValue%'); // WHERE screenshot LIKE '%fooValue%'
     * </code>
     *
     * @param     string $screenshot The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByScreenshot($screenshot = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($screenshot)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $screenshot)) {
                $screenshot = str_replace('*', '%', $screenshot);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::SCREENSHOT, $screenshot, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketsystemPeer::STATUS, $status, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Ticketsystem $ticketsystem Object to remove from the list of results
     *
     * @return TicketsystemQuery The current query, for fluid interface
     */
    public function prune($ticketsystem = null)
    {
        if ($ticketsystem) {
            $this->addUsingAlias(TicketsystemPeer::ID_TICKETSYSTEM, $ticketsystem->getIdTicketsystem(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

} // BaseTicketsystemQuery