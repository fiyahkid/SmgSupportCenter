<?php


/**
 * Base class that represents a query for the 'ticket_verlauf' table.
 *
 *
 *
 * @method TicketVerlaufQuery orderByIdTicketVerlauf($order = Criteria::ASC) Order by the id_ticket_verlauf column
 * @method TicketVerlaufQuery orderByTvFehlermeldung($order = Criteria::ASC) Order by the tv_fehlermeldung column
 * @method TicketVerlaufQuery orderByTvFehlertext($order = Criteria::ASC) Order by the tv_fehlertext column
 * @method TicketVerlaufQuery orderByTvScreenshot($order = Criteria::ASC) Order by the tv_screenshot column
 * @method TicketVerlaufQuery orderByTvBearbeiter($order = Criteria::ASC) Order by the tv_bearbeiter column
 * @method TicketVerlaufQuery orderByTvDatum($order = Criteria::ASC) Order by the tv_datum column
 * @method TicketVerlaufQuery orderByTvStatus($order = Criteria::ASC) Order by the tv_status column
 * @method TicketVerlaufQuery orderByTicketId($order = Criteria::ASC) Order by the ticket_id column
 *
 * @method TicketVerlaufQuery groupByIdTicketVerlauf() Group by the id_ticket_verlauf column
 * @method TicketVerlaufQuery groupByTvFehlermeldung() Group by the tv_fehlermeldung column
 * @method TicketVerlaufQuery groupByTvFehlertext() Group by the tv_fehlertext column
 * @method TicketVerlaufQuery groupByTvScreenshot() Group by the tv_screenshot column
 * @method TicketVerlaufQuery groupByTvBearbeiter() Group by the tv_bearbeiter column
 * @method TicketVerlaufQuery groupByTvDatum() Group by the tv_datum column
 * @method TicketVerlaufQuery groupByTvStatus() Group by the tv_status column
 * @method TicketVerlaufQuery groupByTicketId() Group by the ticket_id column
 *
 * @method TicketVerlaufQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TicketVerlaufQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TicketVerlaufQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TicketVerlauf findOne(PropelPDO $con = null) Return the first TicketVerlauf matching the query
 * @method TicketVerlauf findOneOrCreate(PropelPDO $con = null) Return the first TicketVerlauf matching the query, or a new TicketVerlauf object populated from the query conditions when no match is found
 *
 * @method TicketVerlauf findOneByIdTicketVerlauf(int $id_ticket_verlauf) Return the first TicketVerlauf filtered by the id_ticket_verlauf column
 * @method TicketVerlauf findOneByTvFehlermeldung(string $tv_fehlermeldung) Return the first TicketVerlauf filtered by the tv_fehlermeldung column
 * @method TicketVerlauf findOneByTvFehlertext(string $tv_fehlertext) Return the first TicketVerlauf filtered by the tv_fehlertext column
 * @method TicketVerlauf findOneByTvScreenshot(string $tv_screenshot) Return the first TicketVerlauf filtered by the tv_screenshot column
 * @method TicketVerlauf findOneByTvBearbeiter(string $tv_bearbeiter) Return the first TicketVerlauf filtered by the tv_bearbeiter column
 * @method TicketVerlauf findOneByTvDatum(string $tv_datum) Return the first TicketVerlauf filtered by the tv_datum column
 * @method TicketVerlauf findOneByTvStatus(string $tv_status) Return the first TicketVerlauf filtered by the tv_status column
 * @method TicketVerlauf findOneByTicketId(int $ticket_id) Return the first TicketVerlauf filtered by the ticket_id column
 *
 * @method array findByIdTicketVerlauf(int $id_ticket_verlauf) Return TicketVerlauf objects filtered by the id_ticket_verlauf column
 * @method array findByTvFehlermeldung(string $tv_fehlermeldung) Return TicketVerlauf objects filtered by the tv_fehlermeldung column
 * @method array findByTvFehlertext(string $tv_fehlertext) Return TicketVerlauf objects filtered by the tv_fehlertext column
 * @method array findByTvScreenshot(string $tv_screenshot) Return TicketVerlauf objects filtered by the tv_screenshot column
 * @method array findByTvBearbeiter(string $tv_bearbeiter) Return TicketVerlauf objects filtered by the tv_bearbeiter column
 * @method array findByTvDatum(string $tv_datum) Return TicketVerlauf objects filtered by the tv_datum column
 * @method array findByTvStatus(string $tv_status) Return TicketVerlauf objects filtered by the tv_status column
 * @method array findByTicketId(int $ticket_id) Return TicketVerlauf objects filtered by the ticket_id column
 *
 * @package    propel.generator.SmgSupportCenter.om
 */
abstract class BaseTicketVerlaufQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTicketVerlaufQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'SmgSupportCenter', $modelName = 'TicketVerlauf', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TicketVerlaufQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     TicketVerlaufQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TicketVerlaufQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TicketVerlaufQuery) {
            return $criteria;
        }
        $query = new TicketVerlaufQuery();
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
     * @return   TicketVerlauf|TicketVerlauf[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TicketVerlaufPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   TicketVerlauf A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID_TICKET_VERLAUF`, `TV_FEHLERMELDUNG`, `TV_FEHLERTEXT`, `TV_SCREENSHOT`, `TV_BEARBEITER`, `TV_DATUM`, `TV_STATUS`, `TICKET_ID` FROM `ticket_verlauf` WHERE `ID_TICKET_VERLAUF` = :p0';
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
            $obj = new TicketVerlauf();
            $obj->hydrate($row);
            TicketVerlaufPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TicketVerlauf|TicketVerlauf[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TicketVerlauf[]|mixed the list of results, formatted by the current formatter
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
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TicketVerlaufPeer::ID_TICKET_VERLAUF, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TicketVerlaufPeer::ID_TICKET_VERLAUF, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_ticket_verlauf column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTicketVerlauf(1234); // WHERE id_ticket_verlauf = 1234
     * $query->filterByIdTicketVerlauf(array(12, 34)); // WHERE id_ticket_verlauf IN (12, 34)
     * $query->filterByIdTicketVerlauf(array('min' => 12)); // WHERE id_ticket_verlauf > 12
     * </code>
     *
     * @param     mixed $idTicketVerlauf The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByIdTicketVerlauf($idTicketVerlauf = null, $comparison = null)
    {
        if (is_array($idTicketVerlauf) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(TicketVerlaufPeer::ID_TICKET_VERLAUF, $idTicketVerlauf, $comparison);
    }

    /**
     * Filter the query on the tv_fehlermeldung column
     *
     * Example usage:
     * <code>
     * $query->filterByTvFehlermeldung('fooValue');   // WHERE tv_fehlermeldung = 'fooValue'
     * $query->filterByTvFehlermeldung('%fooValue%'); // WHERE tv_fehlermeldung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tvFehlermeldung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvFehlermeldung($tvFehlermeldung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tvFehlermeldung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tvFehlermeldung)) {
                $tvFehlermeldung = str_replace('*', '%', $tvFehlermeldung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_FEHLERMELDUNG, $tvFehlermeldung, $comparison);
    }

    /**
     * Filter the query on the tv_fehlertext column
     *
     * Example usage:
     * <code>
     * $query->filterByTvFehlertext('fooValue');   // WHERE tv_fehlertext = 'fooValue'
     * $query->filterByTvFehlertext('%fooValue%'); // WHERE tv_fehlertext LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tvFehlertext The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvFehlertext($tvFehlertext = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tvFehlertext)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tvFehlertext)) {
                $tvFehlertext = str_replace('*', '%', $tvFehlertext);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_FEHLERTEXT, $tvFehlertext, $comparison);
    }

    /**
     * Filter the query on the tv_screenshot column
     *
     * Example usage:
     * <code>
     * $query->filterByTvScreenshot('fooValue');   // WHERE tv_screenshot = 'fooValue'
     * $query->filterByTvScreenshot('%fooValue%'); // WHERE tv_screenshot LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tvScreenshot The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvScreenshot($tvScreenshot = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tvScreenshot)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tvScreenshot)) {
                $tvScreenshot = str_replace('*', '%', $tvScreenshot);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_SCREENSHOT, $tvScreenshot, $comparison);
    }

    /**
     * Filter the query on the tv_bearbeiter column
     *
     * Example usage:
     * <code>
     * $query->filterByTvBearbeiter('fooValue');   // WHERE tv_bearbeiter = 'fooValue'
     * $query->filterByTvBearbeiter('%fooValue%'); // WHERE tv_bearbeiter LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tvBearbeiter The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvBearbeiter($tvBearbeiter = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tvBearbeiter)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tvBearbeiter)) {
                $tvBearbeiter = str_replace('*', '%', $tvBearbeiter);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_BEARBEITER, $tvBearbeiter, $comparison);
    }

    /**
     * Filter the query on the tv_datum column
     *
     * Example usage:
     * <code>
     * $query->filterByTvDatum('2011-03-14'); // WHERE tv_datum = '2011-03-14'
     * $query->filterByTvDatum('now'); // WHERE tv_datum = '2011-03-14'
     * $query->filterByTvDatum(array('max' => 'yesterday')); // WHERE tv_datum > '2011-03-13'
     * </code>
     *
     * @param     mixed $tvDatum The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvDatum($tvDatum = null, $comparison = null)
    {
        if (is_array($tvDatum)) {
            $useMinMax = false;
            if (isset($tvDatum['min'])) {
                $this->addUsingAlias(TicketVerlaufPeer::TV_DATUM, $tvDatum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tvDatum['max'])) {
                $this->addUsingAlias(TicketVerlaufPeer::TV_DATUM, $tvDatum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_DATUM, $tvDatum, $comparison);
    }

    /**
     * Filter the query on the tv_status column
     *
     * Example usage:
     * <code>
     * $query->filterByTvStatus('fooValue');   // WHERE tv_status = 'fooValue'
     * $query->filterByTvStatus('%fooValue%'); // WHERE tv_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tvStatus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTvStatus($tvStatus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tvStatus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tvStatus)) {
                $tvStatus = str_replace('*', '%', $tvStatus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TV_STATUS, $tvStatus, $comparison);
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
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function filterByTicketId($ticketId = null, $comparison = null)
    {
        if (is_array($ticketId)) {
            $useMinMax = false;
            if (isset($ticketId['min'])) {
                $this->addUsingAlias(TicketVerlaufPeer::TICKET_ID, $ticketId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ticketId['max'])) {
                $this->addUsingAlias(TicketVerlaufPeer::TICKET_ID, $ticketId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TicketVerlaufPeer::TICKET_ID, $ticketId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   TicketVerlauf $ticketVerlauf Object to remove from the list of results
     *
     * @return TicketVerlaufQuery The current query, for fluid interface
     */
    public function prune($ticketVerlauf = null)
    {
        if ($ticketVerlauf) {
            $this->addUsingAlias(TicketVerlaufPeer::ID_TICKET_VERLAUF, $ticketVerlauf->getIdTicketVerlauf(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
