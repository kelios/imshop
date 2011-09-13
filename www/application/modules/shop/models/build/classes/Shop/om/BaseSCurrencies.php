<?php


/**
 * Base class that represents a row from the 'shop_currencies' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSCurrencies extends ShopBaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SCurrenciesPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SCurrenciesPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the main field.
	 * @var        boolean
	 */
	protected $main;

	/**
	 * The value for the is_default field.
	 * @var        boolean
	 */
	protected $is_default;

	/**
	 * The value for the code field.
	 * @var        string
	 */
	protected $code;

	/**
	 * The value for the symbol field.
	 * @var        string
	 */
	protected $symbol;

	/**
	 * The value for the rate field.
	 * Note: this column has a database default value of: '1.000'
	 * @var        string
	 */
	protected $rate;

	/**
	 * @var        array SPaymentMethods[] Collection to store aggregation of SPaymentMethods objects.
	 */
	protected $collSPaymentMethodss;

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
		$this->rate = '1.000';
	}

	/**
	 * Initializes internal state of BaseSCurrencies object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [main] column value.
	 * 
	 * @return     boolean
	 */
	public function getMain()
	{
		return $this->main;
	}

	/**
	 * Get the [is_default] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsDefault()
	{
		return $this->is_default;
	}

	/**
	 * Get the [code] column value.
	 * 
	 * @return     string
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Get the [symbol] column value.
	 * 
	 * @return     string
	 */
	public function getSymbol()
	{
		return $this->symbol;
	}

	/**
	 * Get the [rate] column value.
	 * 
	 * @return     string
	 */
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [main] column.
	 * 
	 * @param      boolean $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setMain($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->main !== $v) {
			$this->main = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::MAIN;
		}

		return $this;
	} // setMain()

	/**
	 * Set the value of [is_default] column.
	 * 
	 * @param      boolean $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setIsDefault($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->is_default !== $v) {
			$this->is_default = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::IS_DEFAULT;
		}

		return $this;
	} // setIsDefault()

	/**
	 * Set the value of [code] column.
	 * 
	 * @param      string $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setCode($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->code !== $v) {
			$this->code = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::CODE;
		}

		return $this;
	} // setCode()

	/**
	 * Set the value of [symbol] column.
	 * 
	 * @param      string $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setSymbol($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->symbol !== $v) {
			$this->symbol = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::SYMBOL;
		}

		return $this;
	} // setSymbol()

	/**
	 * Set the value of [rate] column.
	 * 
	 * @param      string $v new value
	 * @return     SCurrencies The current object (for fluent API support)
	 */
	public function setRate($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rate !== $v || $this->isNew()) {
			$this->rate = $v;
			$this->modifiedColumns[] = SCurrenciesPeer::RATE;
		}

		return $this;
	} // setRate()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->rate !== '1.000') {
				return false;
			}

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
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->main = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
			$this->is_default = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->code = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->symbol = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->rate = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = SCurrenciesPeer::NUM_COLUMNS - SCurrenciesPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SCurrencies object", $e);
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
	 * @throws     PropelException
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
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
			$con = Propel::getConnection(SCurrenciesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SCurrenciesPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collSPaymentMethodss = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SCurrenciesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SCurrenciesQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
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
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SCurrenciesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SCurrenciesPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
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
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SCurrenciesPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SCurrenciesPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SCurrenciesPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = SCurrenciesPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collSPaymentMethodss !== null) {
				foreach ($this->collSPaymentMethodss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
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
	 * @return     boolean Whether all columns pass validation.
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
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = SCurrenciesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSPaymentMethodss !== null) {
					foreach ($this->collSPaymentMethodss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SCurrenciesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getMain();
				break;
			case 3:
				return $this->getIsDefault();
				break;
			case 4:
				return $this->getCode();
				break;
			case 5:
				return $this->getSymbol();
				break;
			case 6:
				return $this->getRate();
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
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = SCurrenciesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getMain(),
			$keys[3] => $this->getIsDefault(),
			$keys[4] => $this->getCode(),
			$keys[5] => $this->getSymbol(),
			$keys[6] => $this->getRate(),
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
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SCurrenciesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setMain($value);
				break;
			case 3:
				$this->setIsDefault($value);
				break;
			case 4:
				$this->setCode($value);
				break;
			case 5:
				$this->setSymbol($value);
				break;
			case 6:
				$this->setRate($value);
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
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SCurrenciesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMain($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIsDefault($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCode($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSymbol($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setRate($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SCurrenciesPeer::DATABASE_NAME);

		if ($this->isColumnModified(SCurrenciesPeer::ID)) $criteria->add(SCurrenciesPeer::ID, $this->id);
		if ($this->isColumnModified(SCurrenciesPeer::NAME)) $criteria->add(SCurrenciesPeer::NAME, $this->name);
		if ($this->isColumnModified(SCurrenciesPeer::MAIN)) $criteria->add(SCurrenciesPeer::MAIN, $this->main);
		if ($this->isColumnModified(SCurrenciesPeer::IS_DEFAULT)) $criteria->add(SCurrenciesPeer::IS_DEFAULT, $this->is_default);
		if ($this->isColumnModified(SCurrenciesPeer::CODE)) $criteria->add(SCurrenciesPeer::CODE, $this->code);
		if ($this->isColumnModified(SCurrenciesPeer::SYMBOL)) $criteria->add(SCurrenciesPeer::SYMBOL, $this->symbol);
		if ($this->isColumnModified(SCurrenciesPeer::RATE)) $criteria->add(SCurrenciesPeer::RATE, $this->rate);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SCurrenciesPeer::DATABASE_NAME);
		$criteria->add(SCurrenciesPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SCurrencies (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setMain($this->main);
		$copyObj->setIsDefault($this->is_default);
		$copyObj->setCode($this->code);
		$copyObj->setSymbol($this->symbol);
		$copyObj->setRate($this->rate);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getSPaymentMethodss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSPaymentMethods($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     SCurrencies Clone of current object.
	 * @throws     PropelException
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
	 * @return     SCurrenciesPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SCurrenciesPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collSPaymentMethodss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSPaymentMethodss()
	 */
	public function clearSPaymentMethodss()
	{
		$this->collSPaymentMethodss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSPaymentMethodss collection.
	 *
	 * By default this just sets the collSPaymentMethodss collection to an empty array (like clearcollSPaymentMethodss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSPaymentMethodss()
	{
		$this->collSPaymentMethodss = new PropelObjectCollection();
		$this->collSPaymentMethodss->setModel('SPaymentMethods');
	}

	/**
	 * Gets an array of SPaymentMethods objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SCurrencies is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SPaymentMethods[] List of SPaymentMethods objects
	 * @throws     PropelException
	 */
	public function getSPaymentMethodss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSPaymentMethodss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSPaymentMethodss) {
				// return empty collection
				$this->initSPaymentMethodss();
			} else {
				$collSPaymentMethodss = SPaymentMethodsQuery::create(null, $criteria)
					->filterByCurrency($this)
					->find($con);
				if (null !== $criteria) {
					return $collSPaymentMethodss;
				}
				$this->collSPaymentMethodss = $collSPaymentMethodss;
			}
		}
		return $this->collSPaymentMethodss;
	}

	/**
	 * Returns the number of related SPaymentMethods objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SPaymentMethods objects.
	 * @throws     PropelException
	 */
	public function countSPaymentMethodss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSPaymentMethodss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSPaymentMethodss) {
				return 0;
			} else {
				$query = SPaymentMethodsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCurrency($this)
					->count($con);
			}
		} else {
			return count($this->collSPaymentMethodss);
		}
	}

	/**
	 * Method called to associate a SPaymentMethods object to this object
	 * through the SPaymentMethods foreign key attribute.
	 *
	 * @param      SPaymentMethods $l SPaymentMethods
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSPaymentMethods(SPaymentMethods $l)
	{
		if ($this->collSPaymentMethodss === null) {
			$this->initSPaymentMethodss();
		}
		if (!$this->collSPaymentMethodss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSPaymentMethodss[]= $l;
			$l->setCurrency($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->main = null;
		$this->is_default = null;
		$this->code = null;
		$this->symbol = null;
		$this->rate = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collSPaymentMethodss) {
				foreach ((array) $this->collSPaymentMethodss as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collSPaymentMethodss = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SCurrenciesPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseSCurrencies
