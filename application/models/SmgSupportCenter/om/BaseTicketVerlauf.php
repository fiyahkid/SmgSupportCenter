<?php


/**
 * Base class that represents a row from the 'ticket_verlauf' table.
 *
 * 
 *
 * @package    propel.generator.SmgSupportCenter.om
 */
abstract class BaseTicketVerlauf extends BaseObject 
{

    /**
     * Peer class name
     */
    const PEER = 'TicketVerlaufPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TicketVerlaufPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_ticket_verlauf field.
     * @var        int
     */
    protected $id_ticket_verlauf;

    /**
     * The value for the tv_fehlermeldung field.
     * @var        string
     */
    protected $tv_fehlermeldung;

    /**
     * The value for the tv_fehlertext field.
     * @var        string
     */
    protected $tv_fehlertext;

    /**
     * The value for the tv_screenshot field.
     * @var        string
     */
    protected $tv_screenshot;

    /**
     * The value for the tv_bearbeiter field.
     * @var        string
     */
    protected $tv_bearbeiter;

    /**
     * The value for the tv_datum field.
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        string
     */
    protected $tv_datum;

    /**
     * The value for the tv_status field.
     * @var        string
     */
    protected $tv_status;

    /**
     * The value for the ticket_id field.
     * @var        int
     */
    protected $ticket_id;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of BaseTicketVerlauf object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_ticket_verlauf] column value.
     * 
     * @return   int
     */
    public function getIdTicketVerlauf()
    {

        return $this->id_ticket_verlauf;
    }

    /**
     * Get the [tv_fehlermeldung] column value.
     * 
     * @return   string
     */
    public function getTvFehlermeldung()
    {

        return $this->tv_fehlermeldung;
    }

    /**
     * Get the [tv_fehlertext] column value.
     * 
     * @return   string
     */
    public function getTvFehlertext()
    {

        return $this->tv_fehlertext;
    }

    /**
     * Get the [tv_screenshot] column value.
     * 
     * @return   string
     */
    public function getTvScreenshot()
    {

        return $this->tv_screenshot;
    }

    /**
     * Get the [tv_bearbeiter] column value.
     * 
     * @return   string
     */
    public function getTvBearbeiter()
    {

        return $this->tv_bearbeiter;
    }

    /**
     * Get the [optionally formatted] temporal [tv_datum] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *							If format is NULL, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTvDatum($format = 'Y-m-d H:i:s')
    {
        if ($this->tv_datum === null) {
            return null;
        }


        if ($this->tv_datum === '0000-00-00 00:00:00') {
            // while technically this is not a default value of NULL,
            // this seems to be closest in meaning.
            return null;
        } else {
            try {
                $dt = new DateTime($this->tv_datum);
            } catch (Exception $x) {
                throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tv_datum, true), $x);
            }
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is TRUE, we return a DateTime object.
            return $dt;
        } elseif (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        } else {
            return $dt->format($format);
        }
    }

    /**
     * Get the [tv_status] column value.
     * 
     * @return   string
     */
    public function getTvStatus()
    {

        return $this->tv_status;
    }

    /**
     * Get the [ticket_id] column value.
     * 
     * @return   int
     */
    public function getTicketId()
    {

        return $this->ticket_id;
    }

    /**
     * Set the value of [id_ticket_verlauf] column.
     * 
     * @param      int $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setIdTicketVerlauf($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_ticket_verlauf !== $v) {
            $this->id_ticket_verlauf = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::ID_TICKET_VERLAUF;
        }


        return $this;
    } // setIdTicketVerlauf()

    /**
     * Set the value of [tv_fehlermeldung] column.
     * 
     * @param      string $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvFehlermeldung($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tv_fehlermeldung !== $v) {
            $this->tv_fehlermeldung = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TV_FEHLERMELDUNG;
        }


        return $this;
    } // setTvFehlermeldung()

    /**
     * Set the value of [tv_fehlertext] column.
     * 
     * @param      string $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvFehlertext($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tv_fehlertext !== $v) {
            $this->tv_fehlertext = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TV_FEHLERTEXT;
        }


        return $this;
    } // setTvFehlertext()

    /**
     * Set the value of [tv_screenshot] column.
     * 
     * @param      string $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvScreenshot($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tv_screenshot !== $v) {
            $this->tv_screenshot = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TV_SCREENSHOT;
        }


        return $this;
    } // setTvScreenshot()

    /**
     * Set the value of [tv_bearbeiter] column.
     * 
     * @param      string $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvBearbeiter($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tv_bearbeiter !== $v) {
            $this->tv_bearbeiter = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TV_BEARBEITER;
        }


        return $this;
    } // setTvBearbeiter()

    /**
     * Sets the value of [tv_datum] column to a normalized version of the date/time value specified.
     * 
     * @param      mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as NULL.
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvDatum($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tv_datum !== null || $dt !== null) {
            $currentDateAsString = ($this->tv_datum !== null && $tmpDt = new DateTime($this->tv_datum)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tv_datum = $newDateAsString;
                $this->modifiedColumns[] = TicketVerlaufPeer::TV_DATUM;
            }
        } // if either are not null


        return $this;
    } // setTvDatum()

    /**
     * Set the value of [tv_status] column.
     * 
     * @param      string $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTvStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->tv_status !== $v) {
            $this->tv_status = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TV_STATUS;
        }


        return $this;
    } // setTvStatus()

    /**
     * Set the value of [ticket_id] column.
     * 
     * @param      int $v new value
     * @return   TicketVerlauf The current object (for fluent API support)
     */
    public function setTicketId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->ticket_id !== $v) {
            $this->ticket_id = $v;
            $this->modifiedColumns[] = TicketVerlaufPeer::TICKET_ID;
        }


        return $this;
    } // setTicketId()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_ticket_verlauf = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->tv_fehlermeldung = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->tv_fehlertext = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tv_screenshot = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tv_bearbeiter = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tv_datum = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tv_status = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->ticket_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 8; // 8 = TicketVerlaufPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TicketVerlauf object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TicketVerlaufPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TicketVerlaufQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TicketVerlaufPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TicketVerlaufPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = TicketVerlaufPeer::ID_TICKET_VERLAUF;
        if (null !== $this->id_ticket_verlauf) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . TicketVerlaufPeer::ID_TICKET_VERLAUF . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TicketVerlaufPeer::ID_TICKET_VERLAUF)) {
            $modifiedColumns[':p' . $index++]  = '`ID_TICKET_VERLAUF`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_FEHLERMELDUNG)) {
            $modifiedColumns[':p' . $index++]  = '`TV_FEHLERMELDUNG`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_FEHLERTEXT)) {
            $modifiedColumns[':p' . $index++]  = '`TV_FEHLERTEXT`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_SCREENSHOT)) {
            $modifiedColumns[':p' . $index++]  = '`TV_SCREENSHOT`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_BEARBEITER)) {
            $modifiedColumns[':p' . $index++]  = '`TV_BEARBEITER`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_DATUM)) {
            $modifiedColumns[':p' . $index++]  = '`TV_DATUM`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TV_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`TV_STATUS`';
        }
        if ($this->isColumnModified(TicketVerlaufPeer::TICKET_ID)) {
            $modifiedColumns[':p' . $index++]  = '`TICKET_ID`';
        }

        $sql = sprintf(
            'INSERT INTO `ticket_verlauf` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`ID_TICKET_VERLAUF`':
						$stmt->bindValue($identifier, $this->id_ticket_verlauf, PDO::PARAM_INT);
                        break;
                    case '`TV_FEHLERMELDUNG`':
						$stmt->bindValue($identifier, $this->tv_fehlermeldung, PDO::PARAM_STR);
                        break;
                    case '`TV_FEHLERTEXT`':
						$stmt->bindValue($identifier, $this->tv_fehlertext, PDO::PARAM_STR);
                        break;
                    case '`TV_SCREENSHOT`':
						$stmt->bindValue($identifier, $this->tv_screenshot, PDO::PARAM_STR);
                        break;
                    case '`TV_BEARBEITER`':
						$stmt->bindValue($identifier, $this->tv_bearbeiter, PDO::PARAM_STR);
                        break;
                    case '`TV_DATUM`':
						$stmt->bindValue($identifier, $this->tv_datum, PDO::PARAM_STR);
                        break;
                    case '`TV_STATUS`':
						$stmt->bindValue($identifier, $this->tv_status, PDO::PARAM_STR);
                        break;
                    case '`TICKET_ID`':
						$stmt->bindValue($identifier, $this->ticket_id, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
			$pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdTicketVerlauf($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param      mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        } else {
            $this->validationFailures = $res;

            return false;
        }
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param      array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = TicketVerlaufPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }



            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = TicketVerlaufPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdTicketVerlauf();
                break;
            case 1:
                return $this->getTvFehlermeldung();
                break;
            case 2:
                return $this->getTvFehlertext();
                break;
            case 3:
                return $this->getTvScreenshot();
                break;
            case 4:
                return $this->getTvBearbeiter();
                break;
            case 5:
                return $this->getTvDatum();
                break;
            case 6:
                return $this->getTvStatus();
                break;
            case 7:
                return $this->getTicketId();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['TicketVerlauf'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TicketVerlauf'][$this->getPrimaryKey()] = true;
        $keys = TicketVerlaufPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdTicketVerlauf(),
            $keys[1] => $this->getTvFehlermeldung(),
            $keys[2] => $this->getTvFehlertext(),
            $keys[3] => $this->getTvScreenshot(),
            $keys[4] => $this->getTvBearbeiter(),
            $keys[5] => $this->getTvDatum(),
            $keys[6] => $this->getTvStatus(),
            $keys[7] => $this->getTicketId(),
        );

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param      string $name peer name
     * @param      mixed $value field value
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = TicketVerlaufPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @param      mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdTicketVerlauf($value);
                break;
            case 1:
                $this->setTvFehlermeldung($value);
                break;
            case 2:
                $this->setTvFehlertext($value);
                break;
            case 3:
                $this->setTvScreenshot($value);
                break;
            case 4:
                $this->setTvBearbeiter($value);
                break;
            case 5:
                $this->setTvDatum($value);
                break;
            case 6:
                $this->setTvStatus($value);
                break;
            case 7:
                $this->setTicketId($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = TicketVerlaufPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdTicketVerlauf($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTvFehlermeldung($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTvFehlertext($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTvScreenshot($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTvBearbeiter($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTvDatum($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTvStatus($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTicketId($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);

        if ($this->isColumnModified(TicketVerlaufPeer::ID_TICKET_VERLAUF)) $criteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, $this->id_ticket_verlauf);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_FEHLERMELDUNG)) $criteria->add(TicketVerlaufPeer::TV_FEHLERMELDUNG, $this->tv_fehlermeldung);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_FEHLERTEXT)) $criteria->add(TicketVerlaufPeer::TV_FEHLERTEXT, $this->tv_fehlertext);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_SCREENSHOT)) $criteria->add(TicketVerlaufPeer::TV_SCREENSHOT, $this->tv_screenshot);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_BEARBEITER)) $criteria->add(TicketVerlaufPeer::TV_BEARBEITER, $this->tv_bearbeiter);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_DATUM)) $criteria->add(TicketVerlaufPeer::TV_DATUM, $this->tv_datum);
        if ($this->isColumnModified(TicketVerlaufPeer::TV_STATUS)) $criteria->add(TicketVerlaufPeer::TV_STATUS, $this->tv_status);
        if ($this->isColumnModified(TicketVerlaufPeer::TICKET_ID)) $criteria->add(TicketVerlaufPeer::TICKET_ID, $this->ticket_id);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(TicketVerlaufPeer::DATABASE_NAME);
        $criteria->add(TicketVerlaufPeer::ID_TICKET_VERLAUF, $this->id_ticket_verlauf);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return   int
     */
    public function getPrimaryKey()
    {
        return $this->getIdTicketVerlauf();
    }

    /**
     * Generic method to set the primary key (id_ticket_verlauf column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdTicketVerlauf($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdTicketVerlauf();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of TicketVerlauf (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTvFehlermeldung($this->getTvFehlermeldung());
        $copyObj->setTvFehlertext($this->getTvFehlertext());
        $copyObj->setTvScreenshot($this->getTvScreenshot());
        $copyObj->setTvBearbeiter($this->getTvBearbeiter());
        $copyObj->setTvDatum($this->getTvDatum());
        $copyObj->setTvStatus($this->getTvStatus());
        $copyObj->setTicketId($this->getTicketId());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdTicketVerlauf(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return                 TicketVerlauf Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return   TicketVerlaufPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TicketVerlaufPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_ticket_verlauf = null;
        $this->tv_fehlermeldung = null;
        $this->tv_fehlertext = null;
        $this->tv_screenshot = null;
        $this->tv_bearbeiter = null;
        $this->tv_datum = null;
        $this->tv_status = null;
        $this->ticket_id = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TicketVerlaufPeer::DEFAULT_STRING_FORMAT);
    }

} // BaseTicketVerlauf
