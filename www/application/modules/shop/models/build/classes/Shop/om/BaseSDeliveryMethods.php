<?php


/**
 * Base class that represents a row from the 'shop_delivery_methods' table.
 *
 * 
 *
 * @package    propel.generator.Shop.om
 */
abstract class BaseSDeliveryMethods extends ShopBaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SDeliveryMethodsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SDeliveryMethodsPeer
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
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the price field.
	 * @var        string
	 */
	protected $price;

	/**
	 * The value for the free_from field.
	 * @var        string
	 */
	protected $free_from;

	/**
	 * The value for the enabled field.
	 * @var        boolean
	 */
	protected $enabled;

	/**
	 * @var        array ShopDeliveryMethodsSystems[] Collection to store aggregation of ShopDeliveryMethodsSystems objects.
	 */
	protected $collShopDeliveryMethodsSystemss;

	/**
	 * @var        array SOrders[] Collection to store aggregation of SOrders objects.
	 */
	protected $collSOrderss;

	/**
	 * @var        array SPaymentMethods[] Collection to store aggregation of SPaymentMethods objects.
	 */
	protected $collPaymentMethodss;

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
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [price] column value.
	 * 
	 * @return     string
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [free_from] column value.
	 * 
	 * @return     string
	 */
	public function getFreeFrom()
	{
		return $this->free_from;
	}

	/**
	 * Get the [enabled] column value.
	 * 
	 * @return     boolean
	 */
	public function getEnabled()
	{
		return $this->enabled;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [price] column.
	 * 
	 * @param      string $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [free_from] column.
	 * 
	 * @param      string $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setFreeFrom($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->free_from !== $v) {
			$this->free_from = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::FREE_FROM;
		}

		return $this;
	} // setFreeFrom()

	/**
	 * Set the value of [enabled] column.
	 * 
	 * @param      boolean $v new value
	 * @return     SDeliveryMethods The current object (for fluent API support)
	 */
	public function setEnabled($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->enabled !== $v) {
			$this->enabled = $v;
			$this->modifiedColumns[] = SDeliveryMethodsPeer::ENABLED;
		}

		return $this;
	} // setEnabled()

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
			$this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->price = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->free_from = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->enabled = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = SDeliveryMethodsPeer::NUM_COLUMNS - SDeliveryMethodsPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SDeliveryMethods object", $e);
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
			$con = Propel::getConnection(SDeliveryMethodsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SDeliveryMethodsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collShopDeliveryMethodsSystemss = null;

			$this->collSOrderss = null;

			$this->collPaymentMethodss = null;
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
			$con = Propel::getConnection(SDeliveryMethodsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				SDeliveryMethodsQuery::create()
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
			$con = Propel::getConnection(SDeliveryMethodsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SDeliveryMethodsPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = SDeliveryMethodsPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(SDeliveryMethodsPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.SDeliveryMethodsPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = SDeliveryMethodsPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collShopDeliveryMethodsSystemss !== null) {
				foreach ($this->collShopDeliveryMethodsSystemss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSOrderss !== null) {
				foreach ($this->collSOrderss as $referrerFK) {
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


			if (($retval = SDeliveryMethodsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collShopDeliveryMethodsSystemss !== null) {
					foreach ($this->collShopDeliveryMethodsSystemss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSOrderss !== null) {
					foreach ($this->collSOrderss as $referrerFK) {
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
		$pos = SDeliveryMethodsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescription();
				break;
			case 3:
				return $this->getPrice();
				break;
			case 4:
				return $this->getFreeFrom();
				break;
			case 5:
				return $this->getEnabled();
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
		$keys = SDeliveryMethodsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getPrice(),
			$keys[4] => $this->getFreeFrom(),
			$keys[5] => $this->getEnabled(),
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
		$pos = SDeliveryMethodsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescription($value);
				break;
			case 3:
				$this->setPrice($value);
				break;
			case 4:
				$this->setFreeFrom($value);
				break;
			case 5:
				$this->setEnabled($value);
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
		$keys = SDeliveryMethodsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrice($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFreeFrom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEnabled($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SDeliveryMethodsPeer::DATABASE_NAME);

		if ($this->isColumnModified(SDeliveryMethodsPeer::ID)) $criteria->add(SDeliveryMethodsPeer::ID, $this->id);
		if ($this->isColumnModified(SDeliveryMethodsPeer::NAME)) $criteria->add(SDeliveryMethodsPeer::NAME, $this->name);
		if ($this->isColumnModified(SDeliveryMethodsPeer::DESCRIPTION)) $criteria->add(SDeliveryMethodsPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(SDeliveryMethodsPeer::PRICE)) $criteria->add(SDeliveryMethodsPeer::PRICE, $this->price);
		if ($this->isColumnModified(SDeliveryMethodsPeer::FREE_FROM)) $criteria->add(SDeliveryMethodsPeer::FREE_FROM, $this->free_from);
		if ($this->isColumnModified(SDeliveryMethodsPeer::ENABLED)) $criteria->add(SDeliveryMethodsPeer::ENABLED, $this->enabled);

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
		$criteria = new Criteria(SDeliveryMethodsPeer::DATABASE_NAME);
		$criteria->add(SDeliveryMethodsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SDeliveryMethods (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setName($this->name);
		$copyObj->setDescription($this->description);
		$copyObj->setPrice($this->price);
		$copyObj->setFreeFrom($this->free_from);
		$copyObj->setEnabled($this->enabled);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getShopDeliveryMethodsSystemss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addShopDeliveryMethodsSystems($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSOrderss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSOrders($relObj->copy($deepCopy));
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
	 * @return     SDeliveryMethods Clone of current object.
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
	 * @return     SDeliveryMethodsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SDeliveryMethodsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collShopDeliveryMethodsSystemss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addShopDeliveryMethodsSystemss()
	 */
	public function clearShopDeliveryMethodsSystemss()
	{
		$this->collShopDeliveryMethodsSystemss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collShopDeliveryMethodsSystemss collection.
	 *
	 * By default this just sets the collShopDeliveryMethodsSystemss collection to an empty array (like clearcollShopDeliveryMethodsSystemss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initShopDeliveryMethodsSystemss()
	{
		$this->collShopDeliveryMethodsSystemss = new PropelObjectCollection();
		$this->collShopDeliveryMethodsSystemss->setModel('ShopDeliveryMethodsSystems');
	}

	/**
	 * Gets an array of ShopDeliveryMethodsSystems objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SDeliveryMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ShopDeliveryMethodsSystems[] List of ShopDeliveryMethodsSystems objects
	 * @throws     PropelException
	 */
	public function getShopDeliveryMethodsSystemss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collShopDeliveryMethodsSystemss || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopDeliveryMethodsSystemss) {
				// return empty collection
				$this->initShopDeliveryMethodsSystemss();
			} else {
				$collShopDeliveryMethodsSystemss = ShopDeliveryMethodsSystemsQuery::create(null, $criteria)
					->filterBySDeliveryMethods($this)
					->find($con);
				if (null !== $criteria) {
					return $collShopDeliveryMethodsSystemss;
				}
				$this->collShopDeliveryMethodsSystemss = $collShopDeliveryMethodsSystemss;
			}
		}
		return $this->collShopDeliveryMethodsSystemss;
	}

	/**
	 * Returns the number of related ShopDeliveryMethodsSystems objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ShopDeliveryMethodsSystems objects.
	 * @throws     PropelException
	 */
	public function countShopDeliveryMethodsSystemss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collShopDeliveryMethodsSystemss || null !== $criteria) {
			if ($this->isNew() && null === $this->collShopDeliveryMethodsSystemss) {
				return 0;
			} else {
				$query = ShopDeliveryMethodsSystemsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySDeliveryMethods($this)
					->count($con);
			}
		} else {
			return count($this->collShopDeliveryMethodsSystemss);
		}
	}

	/**
	 * Method called to associate a ShopDeliveryMethodsSystems object to this object
	 * through the ShopDeliveryMethodsSystems foreign key attribute.
	 *
	 * @param      ShopDeliveryMethodsSystems $l ShopDeliveryMethodsSystems
	 * @return     void
	 * @throws     PropelException
	 */
	public function addShopDeliveryMethodsSystems(ShopDeliveryMethodsSystems $l)
	{
		if ($this->collShopDeliveryMethodsSystemss === null) {
			$this->initShopDeliveryMethodsSystemss();
		}
		if (!$this->collShopDeliveryMethodsSystemss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collShopDeliveryMethodsSystemss[]= $l;
			$l->setSDeliveryMethods($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this SDeliveryMethods is new, it will return
	 * an empty collection; or if this SDeliveryMethods has previously
	 * been saved, it will retrieve related ShopDeliveryMethodsSystemss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in SDeliveryMethods.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ShopDeliveryMethodsSystems[] List of ShopDeliveryMethodsSystems objects
	 */
	public function getShopDeliveryMethodsSystemssJoinPaymentMethods($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ShopDeliveryMethodsSystemsQuery::create(null, $criteria);
		$query->joinWith('PaymentMethods', $join_behavior);

		return $this->getShopDeliveryMethodsSystemss($query, $con);
	}

	/**
	 * Clears out the collSOrderss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSOrderss()
	 */
	public function clearSOrderss()
	{
		$this->collSOrderss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSOrderss collection.
	 *
	 * By default this just sets the collSOrderss collection to an empty array (like clearcollSOrderss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initSOrderss()
	{
		$this->collSOrderss = new PropelObjectCollection();
		$this->collSOrderss->setModel('SOrders');
	}

	/**
	 * Gets an array of SOrders objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SDeliveryMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SOrders[] List of SOrders objects
	 * @throws     PropelException
	 */
	public function getSOrderss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSOrderss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderss) {
				// return empty collection
				$this->initSOrderss();
			} else {
				$collSOrderss = SOrdersQuery::create(null, $criteria)
					->filterBySDeliveryMethods($this)
					->find($con);
				if (null !== $criteria) {
					return $collSOrderss;
				}
				$this->collSOrderss = $collSOrderss;
			}
		}
		return $this->collSOrderss;
	}

	/**
	 * Returns the number of related SOrders objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SOrders objects.
	 * @throws     PropelException
	 */
	public function countSOrderss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSOrderss || null !== $criteria) {
			if ($this->isNew() && null === $this->collSOrderss) {
				return 0;
			} else {
				$query = SOrdersQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySDeliveryMethods($this)
					->count($con);
			}
		} else {
			return count($this->collSOrderss);
		}
	}

	/**
	 * Method called to associate a SOrders object to this object
	 * through the SOrders foreign key attribute.
	 *
	 * @param      SOrders $l SOrders
	 * @return     void
	 * @throws     PropelException
	 */
	public function addSOrders(SOrders $l)
	{
		if ($this->collSOrderss === null) {
			$this->initSOrderss();
		}
		if (!$this->collSOrderss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collSOrderss[]= $l;
			$l->setSDeliveryMethods($this);
		}
	}

	/**
	 * Clears out the collPaymentMethodss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPaymentMethodss()
	 */
	public function clearPaymentMethodss()
	{
		$this->collPaymentMethodss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPaymentMethodss collection.
	 *
	 * By default this just sets the collPaymentMethodss collection to an empty collection (like clearPaymentMethodss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPaymentMethodss()
	{
		$this->collPaymentMethodss = new PropelObjectCollection();
		$this->collPaymentMethodss->setModel('SPaymentMethods');
	}

	/**
	 * Gets a collection of SPaymentMethods objects related by a many-to-many relationship
	 * to the current object by way of the shop_delivery_methods_systems cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this SDeliveryMethods is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array SPaymentMethods[] List of SPaymentMethods objects
	 */
	public function getPaymentMethodss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPaymentMethodss || null !== $criteria) {
			if ($this->isNew() && null === $this->collPaymentMethodss) {
				// return empty collection
				$this->initPaymentMethodss();
			} else {
				$collPaymentMethodss = SPaymentMethodsQuery::create(null, $criteria)
					->filterBySDeliveryMethods($this)
					->find($con);
				if (null !== $criteria) {
					return $collPaymentMethodss;
				}
				$this->collPaymentMethodss = $collPaymentMethodss;
			}
		}
		return $this->collPaymentMethodss;
	}

	/**
	 * Gets the number of SPaymentMethods objects related by a many-to-many relationship
	 * to the current object by way of the shop_delivery_methods_systems cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related SPaymentMethods objects
	 */
	public function countPaymentMethodss($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPaymentMethodss || null !== $criteria) {
			if ($this->isNew() && null === $this->collPaymentMethodss) {
				return 0;
			} else {
				$query = SPaymentMethodsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterBySDeliveryMethods($this)
					->count($con);
			}
		} else {
			return count($this->collPaymentMethodss);
		}
	}

	/**
	 * Associate a SPaymentMethods object to this object
	 * through the shop_delivery_methods_systems cross reference table.
	 *
	 * @param      SPaymentMethods $sPaymentMethods The ShopDeliveryMethodsSystems object to relate
	 * @return     void
	 */
	public function addPaymentMethods($sPaymentMethods)
	{
		if ($this->collPaymentMethodss === null) {
			$this->initPaymentMethodss();
		}
		if (!$this->collPaymentMethodss->contains($sPaymentMethods)) { // only add it if the **same** object is not already associated
			$shopDeliveryMethodsSystems = new ShopDeliveryMethodsSystems();
			$shopDeliveryMethodsSystems->setPaymentMethods($sPaymentMethods);
			$this->addShopDeliveryMethodsSystems($shopDeliveryMethodsSystems);

			$this->collPaymentMethodss[]= $sPaymentMethods;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->description = null;
		$this->price = null;
		$this->free_from = null;
		$this->enabled = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collShopDeliveryMethodsSystemss) {
				foreach ((array) $this->collShopDeliveryMethodsSystemss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSOrderss) {
				foreach ((array) $this->collSOrderss as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collShopDeliveryMethodsSystemss = null;
		$this->collSOrderss = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SDeliveryMethodsPeer::DEFAULT_STRING_FORMAT);
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

} // BaseSDeliveryMethods
